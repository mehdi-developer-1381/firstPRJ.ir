<?php

namespace App\DesignPatterns\Creational\BuilderPattern\EX02;

interface SQLQueryBuilder
{
    public function select(string $table, array $fields): SQLQueryBuilder;

    public function where(string $field, string $operator , string $value): SQLQueryBuilder;

    public function limit(int $start, int $offset): SQLQueryBuilder;

    // +100 other SQL syntax methods...

    public function getSQL(): string;
}
