<?php

namespace App\SOLID\DIP\Example2\DBProviders;

use App\SOLID\DIP\Example2\Databases\MongoConnection;

class MongoProvider implements DatabaseProviderInterface
{

    private MongoConnection $connection;

    /**
     * @param MongoConnection $connection
     */

    public function __construct(MongoConnection $connection)
    {
        $this->connection = $connection;
    }

    public function findUser(string $user_name):string
    {
        return $this->connection->findUser($user_name);
    }
}
