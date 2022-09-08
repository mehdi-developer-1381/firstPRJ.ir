<?php

namespace App\DesignPatterns\Creational\BuilderPattern\EX02;

class PostgresQueryBuilder extends MysqlQueryBuilder
{


    public function limit(int $start, int $offset): SQLQueryBuilder
    {
        parent::limit($start, $offset);

        $this->query->limit = " LIMIT " . $start . " OFFSET " . $offset;

        return $this;
    }

    function clientCode(SQLQueryBuilder $queryBuilder)
    {

        $query = $queryBuilder
            ->select("users", ["name", "email", "password"])
            ->where("age", ">" , 18)
            ->where("age", "<" ,30)
            ->limit(10, 20)
            ->getSQL();

        echo $query;


    }

}
