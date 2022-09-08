<?php

namespace App\SOLID\DIP\Example2\DBProviders;

use App\SOLID\DIP\Example2\Databases\MySQLConnection;

class MySQLProvider implements DatabaseProviderInterface
{
    private MySQLConnection $connection;

    /**
     * @param MySQLConnection $connection
     */

    public function __construct(MySQLConnection $connection)
    {
        $this->connection = $connection;
    }

    public function findUser(string $user_name):string
    {
        return $this->connection->findUser($user_name);
    }
}
