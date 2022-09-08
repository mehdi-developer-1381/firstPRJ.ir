<?php

namespace App\SOLID\DIP\Example2\DBProviders;

interface DatabaseProviderInterface
{
    public function findUser(string $user_name);
}
