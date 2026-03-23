<?php

declare(strict_types=1);

$dsn = 'mysql:host=db;port=3306;dbname=app;charset=utf8mb4';
$user = 'app';
$pass = 'app_password';

$pdo = new PDO($dsn, $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

$tables = $pdo->query("
    SELECT TABLE_NAME
    FROM information_schema.TABLES
    WHERE TABLE_SCHEMA = 'app' AND TABLE_NAME <> 'doctrine_migration_versions'
    ORDER BY TABLE_NAME
")->fetchAll();

$targetDir = dirname(__DIR__).'/src/Entity/Legacy';
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0775, true);
}

foreach (glob($targetDir.'/*.php') ?: [] as $file) {
    unlink($file);
}

$mapType = static function (string $dataType): array {
    $dataType = strtolower($dataType);
    return match ($dataType) {
        'tinyint' => ['bool', 'boolean'],
        'smallint', 'mediumint', 'int', 'integer' => ['int', 'integer'],
        'bigint' => ['string', 'bigint'],
        'decimal', 'numeric' => ['string', 'decimal'],
        'float', 'double', 'real' => ['float', 'float'],
        'date' => ['DateTimeInterface', 'date'],
        'datetime', 'timestamp' => ['DateTimeInterface', 'datetime'],
        'time' => ['DateTimeInterface', 'time'],
        'json' => ['array', 'json'],
        'text', 'mediumtext', 'longtext' => ['string', 'text'],
        'blob', 'mediumblob', 'longblob', 'binary', 'varbinary' => ['string', 'blob'],
        default => ['string', 'string'],
    };
};

$toClass = static function (string $name): string {
    $clean = preg_replace('/[^a-zA-Z0-9_]+/', '_', $name) ?? $name;
    $parts = array_filter(explode('_', strtolower($clean)));
    $class = implode('', array_map(static fn(string $p): string => ucfirst($p), $parts));
    if ($class === '') {
        $class = 'GeneratedEntity';
    }
    if (ctype_digit($class[0])) {
        $class = 'T'.$class;
    }
    return $class;
};

$toProp = static function (string $name): string {
    $clean = preg_replace('/[^a-zA-Z0-9_]+/', '_', $name) ?? $name;
    $parts = array_filter(explode('_', strtolower($clean)));
    if ($parts === []) {
        return 'field';
    }
    $base = array_shift($parts);
    $prop = $base.implode('', array_map(static fn(string $p): string => ucfirst($p), $parts));
    if (ctype_digit($prop[0])) {
        $prop = 'f'.$prop;
    }
    return $prop;
};

$written = 0;
foreach ($tables as $tableRow) {
    $tableName = $tableRow['TABLE_NAME'];
    $className = $toClass($tableName);

    $columnsStmt = $pdo->prepare("
        SELECT COLUMN_NAME, DATA_TYPE, IS_NULLABLE, COLUMN_KEY, EXTRA, CHARACTER_MAXIMUM_LENGTH
        FROM information_schema.COLUMNS
        WHERE TABLE_SCHEMA = 'app' AND TABLE_NAME = :table
        ORDER BY ORDINAL_POSITION
    ");
    $columnsStmt->execute(['table' => $tableName]);
    $columns = $columnsStmt->fetchAll();

    $usesDateTime = false;
    $lines = [];
    $lines[] = '<?php';
    $lines[] = '';
    $lines[] = 'namespace App\\Entity\\Legacy;';
    $lines[] = '';
    $lines[] = 'use Doctrine\\ORM\\Mapping as ORM;';

    foreach ($columns as $col) {
        [$phpType] = $mapType($col['DATA_TYPE']);
        if ($phpType === 'DateTimeInterface') {
            $usesDateTime = true;
            break;
        }
    }
    if ($usesDateTime) {
        $lines[] = 'use DateTimeInterface;';
    }
    $lines[] = '';
    $lines[] = '#[ORM\Entity]';
    $lines[] = sprintf("#[ORM\\Table(name: '%s')]", str_replace("'", "\\'", $tableName));
    $lines[] = sprintf('class %s', $className);
    $lines[] = '{';

    foreach ($columns as $col) {
        $colName = $col['COLUMN_NAME'];
        $prop = $toProp($colName);
        [$phpType, $ormType] = $mapType($col['DATA_TYPE']);
        $nullable = $col['IS_NULLABLE'] === 'YES';
        $isId = $col['COLUMN_KEY'] === 'PRI';
        $isAuto = str_contains((string) $col['EXTRA'], 'auto_increment');

        if ($isId) {
            $lines[] = '    #[ORM\Id]';
            if ($isAuto) {
                $lines[] = '    #[ORM\GeneratedValue]';
            }
        }

        $parts = [sprintf("type: '%s'", $ormType)];
        if ($col['CHARACTER_MAXIMUM_LENGTH'] !== null && in_array($ormType, ['string', 'binary'], true)) {
            $parts[] = 'length: '.(int) $col['CHARACTER_MAXIMUM_LENGTH'];
        }
        if ($nullable) {
            $parts[] = 'nullable: true';
        }
        if ($prop !== $colName) {
            $parts[] = sprintf("name: '%s'", str_replace("'", "\\'", $colName));
        }

        $lines[] = sprintf('    #[ORM\Column(%s)]', implode(', ', $parts));
        if ($nullable) {
            $lines[] = sprintf('    private ?%s $%s = null;', $phpType, $prop);
        } else {
            $lines[] = sprintf('    private %s $%s;', $phpType, $prop);
        }
        $lines[] = '';
    }

    foreach ($columns as $col) {
        $colName = $col['COLUMN_NAME'];
        $prop = $toProp($colName);
        [$phpType] = $mapType($col['DATA_TYPE']);
        $nullable = $col['IS_NULLABLE'] === 'YES';
        $method = ucfirst($prop);

        if ($phpType === 'array') {
            $lines[] = '    /**';
            $lines[] = '     * @return array<string, mixed>|null';
            $lines[] = '     */';
        }
        $lines[] = sprintf('    public function get%s(): %s%s', $method, $nullable ? '?' : '', $phpType);
        $lines[] = '    {';
        $lines[] = sprintf('        return $this->%s;', $prop);
        $lines[] = '    }';
        $lines[] = '';

        if ($phpType === 'array') {
            $lines[] = '    /**';
            $lines[] = '     * @param array<string, mixed>|null $'.$prop;
            $lines[] = '     */';
        }
        $lines[] = sprintf('    public function set%s(%s%s $%s): self', $method, $nullable ? '?' : '', $phpType, $prop);
        $lines[] = '    {';
        $lines[] = sprintf('        $this->%s = $%s;', $prop, $prop);
        $lines[] = '';
        $lines[] = '        return $this;';
        $lines[] = '    }';
        $lines[] = '';
    }

    $lines[] = '}';
    $lines[] = '';

    file_put_contents($targetDir.'/'.$className.'.php', implode("\n", $lines));
    $written++;
}

echo "Generated {$written} entities in src/Entity/Legacy\n";
