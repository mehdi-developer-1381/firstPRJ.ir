<?php

namespace App\SOLID\DIP\Example2\Databases;

interface ConnectionInterface
{
    public function findUser(string $user_name):string;
}
