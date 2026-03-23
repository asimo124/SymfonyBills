<?php

namespace App\Command;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\Table;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(name: 'app:generate-legacy-entities', description: 'Generate Doctrine entities from current database tables')]
class GenerateLegacyEntitiesCommand extends Command
{
    public function __construct(private readonly Connection $connection)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $schemaManager = $this->connection->createSchemaManager();
        $projectDir = dirname(__DIR__, 2);
        $targetDir = $projectDir.'/src/Entity/Legacy';

        if (!is_dir($targetDir) && !mkdir($targetDir, 0775, true) && !is_dir($targetDir)) {
            $io->error('Could not create target entity directory.');

            return Command::FAILURE;
        }

        $tableNames = $schemaManager->listTableNames();
        sort($tableNames);

        $written = 0;
        foreach ($tableNames as $tableName) {
            if ($tableName === 'doctrine_migration_versions') {
                continue;
            }

            $table = $schemaManager->introspectTable($tableName);
            $className = $this->buildClassName($tableName);
            $filePath = sprintf('%s/%s.php', $targetDir, $className);
            file_put_contents($filePath, $this->buildEntityCode($table, $className));
            $written++;
        }

        $io->success(sprintf('Generated %d legacy entities in src/Entity/Legacy.', $written));

        return Command::SUCCESS;
    }

    private function buildEntityCode(Table $table, string $className): string
    {
        $uses = [
            'use Doctrine\ORM\Mapping as ORM;',
        ];

        $phpDocTypes = [];
        $lines = [];
        $lines[] = '<?php';
        $lines[] = '';
        $lines[] = 'namespace App\\Entity\\Legacy;';
        $lines[] = '';

        $primaryKeyColumns = $table->getPrimaryKey()?->getColumns() ?? [];

        foreach ($table->getColumns() as $column) {
            [$phpType] = $this->mapColumnType($column);
            if ($phpType === '\\DateTimeInterface') {
                $uses['DateTimeInterface'] = 'use DateTimeInterface;';
            }
        }

        foreach ($uses as $useLine) {
            $lines[] = $useLine;
        }
        $lines[] = '';
        $lines[] = sprintf("#[ORM\\Entity]");
        $lines[] = sprintf("#[ORM\\Table(name: '%s')]", str_replace("'", "\\'", $table->getName()));
        $lines[] = sprintf('class %s', $className);
        $lines[] = '{';

        foreach ($table->getColumns() as $column) {
            $columnName = $column->getName();
            $propertyName = $this->buildPropertyName($columnName);
            [$phpType, $ormType] = $this->mapColumnType($column);
            $nullable = $column->getNotnull() ? 'false' : 'true';

            if (in_array($columnName, $primaryKeyColumns, true)) {
                $lines[] = '    #[ORM\Id]';
                if ($column->getAutoincrement()) {
                    $lines[] = '    #[ORM\GeneratedValue]';
                }
            }

            $attrParts = [sprintf("type: '%s'", $ormType)];
            if ($column->getLength() !== null && in_array($ormType, ['string', 'binary'], true)) {
                $attrParts[] = sprintf('length: %d', $column->getLength());
            }
            if ($nullable === 'true') {
                $attrParts[] = 'nullable: true';
            }
            if ($columnName !== $propertyName) {
                $attrParts[] = sprintf("name: '%s'", str_replace("'", "\\'", $columnName));
            }

            $lines[] = sprintf('    #[ORM\Column(%s)]', implode(', ', $attrParts));
            if ($nullable === 'true') {
                $lines[] = sprintf('    private ?%s $%s = null;', $phpType, $propertyName);
            } else {
                $lines[] = sprintf('    private %s $%s;', $phpType, $propertyName);
            }
            $lines[] = '';

            if ($phpType === 'array') {
                $phpDocTypes[$propertyName] = true;
            }
        }

        foreach ($table->getColumns() as $column) {
            $columnName = $column->getName();
            $propertyName = $this->buildPropertyName($columnName);
            [$phpType] = $this->mapColumnType($column);
            $nullable = $column->getNotnull() ? '' : '?';
            $methodSuffix = ucfirst($propertyName);

            if ($phpType === 'array') {
                $lines[] = '    /**';
                $lines[] = '     * @return array<string, mixed>';
                $lines[] = '     */';
            }
            $lines[] = sprintf('    public function get%s(): %s%s', $methodSuffix, $nullable, $phpType);
            $lines[] = '    {';
            $lines[] = sprintf('        return $this->%s;', $propertyName);
            $lines[] = '    }';
            $lines[] = '';

            if ($phpType === 'array') {
                $lines[] = '    /**';
                $lines[] = '     * @param array<string, mixed> $'.$propertyName;
                $lines[] = '     */';
            }
            $lines[] = sprintf('    public function set%s(%s%s $%s): self', $methodSuffix, $nullable, $phpType, $propertyName);
            $lines[] = '    {';
            $lines[] = sprintf('        $this->%s = $%s;', $propertyName, $propertyName);
            $lines[] = '';
            $lines[] = '        return $this;';
            $lines[] = '    }';
            $lines[] = '';
        }

        $lines[] = '}';
        $lines[] = '';

        return implode("\n", $lines);
    }

    private function mapColumnType(Column $column): array
    {
        $type = $column->getType();

        return match (true) {
            $type instanceof \Doctrine\DBAL\Types\SmallIntType,
            $type instanceof \Doctrine\DBAL\Types\IntegerType => ['int', 'integer'],
            $type instanceof \Doctrine\DBAL\Types\BigIntType => ['string', 'bigint'],
            $type instanceof \Doctrine\DBAL\Types\BooleanType => ['bool', 'boolean'],
            $type instanceof \Doctrine\DBAL\Types\FloatType => ['float', 'float'],
            $type instanceof \Doctrine\DBAL\Types\DecimalType => ['string', 'decimal'],
            $type instanceof \Doctrine\DBAL\Types\DateType => ['DateTimeInterface', 'date'],
            $type instanceof \Doctrine\DBAL\Types\DateTimeType,
            $type instanceof \Doctrine\DBAL\Types\DateTimeTzType,
            $type instanceof \Doctrine\DBAL\Types\DateTimeImmutableType,
            $type instanceof \Doctrine\DBAL\Types\DateTimeTzImmutableType => ['DateTimeInterface', 'datetime'],
            $type instanceof \Doctrine\DBAL\Types\TimeType,
            $type instanceof \Doctrine\DBAL\Types\TimeImmutableType => ['DateTimeInterface', 'time'],
            $type instanceof \Doctrine\DBAL\Types\JsonType => ['array', 'json'],
            $type instanceof \Doctrine\DBAL\Types\TextType => ['string', 'text'],
            $type instanceof \Doctrine\DBAL\Types\BlobType,
            $type instanceof \Doctrine\DBAL\Types\BinaryType => ['string', 'blob'],
            default => ['string', 'string'],
        };
    }

    private function buildClassName(string $tableName): string
    {
        $clean = preg_replace('/[^a-zA-Z0-9_]+/', '_', $tableName) ?? $tableName;
        $parts = array_filter(explode('_', strtolower($clean)));
        $name = implode('', array_map(static fn (string $part): string => ucfirst($part), $parts));

        if ($name === '') {
            return 'GeneratedEntity';
        }

        if (ctype_digit($name[0])) {
            return 'T'.$name;
        }

        return $name;
    }

    private function buildPropertyName(string $columnName): string
    {
        $clean = preg_replace('/[^a-zA-Z0-9_]+/', '_', $columnName) ?? $columnName;
        $parts = array_filter(explode('_', strtolower($clean)));
        if ($parts === []) {
            return 'field';
        }

        $base = array_shift($parts);
        $suffix = implode('', array_map(static fn (string $part): string => ucfirst($part), $parts));
        $name = $base.$suffix;

        if (ctype_digit($name[0])) {
            return 'f'.$name;
        }

        return $name;
    }
}
