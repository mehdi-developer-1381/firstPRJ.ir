<?php

namespace App\SOLID\DIP\Example2;

use App\SOLID\DIP\Example2\DBProviders\DatabaseProviderInterface;

class Authentication
{
    private DatabaseProviderInterface $databaseProvider;

    /**
     * @param DatabaseProviderInterface $databaseProvider
     */

    public function __construct(DatabaseProviderInterface $databaseProvider)
    {
        $this->databaseProvider = $databaseProvider;
    }

    public function findUser(string $user_name):string
    {
        return $this->databaseProvider->findUser($user_name);
    }
}
