<?php

declare(strict_types=1);

namespace App\Doctrine\Dql;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\AST\Node;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;
use Doctrine\ORM\Query\TokenType;

/**
 * DATE_FORMAT(date, format) — MySQL/MariaDB, for DQL ORDER BY / SELECT.
 */
final class DateFormatFunction extends FunctionNode
{
    public Node $date;

    public Node $format;

    public function parse(Parser $parser): void
    {
        $parser->match(TokenType::T_IDENTIFIER);
        $parser->match(TokenType::T_OPEN_PARENTHESIS);
        $this->date = $parser->ArithmeticPrimary();
        $parser->match(TokenType::T_COMMA);
        $this->format = $parser->StringPrimary();
        $parser->match(TokenType::T_CLOSE_PARENTHESIS);
    }

    public function getSql(SqlWalker $sqlWalker): string
    {
        return 'DATE_FORMAT('
            .$this->date->dispatch($sqlWalker).', '
            .$this->format->dispatch($sqlWalker)
            .')';
    }
}
