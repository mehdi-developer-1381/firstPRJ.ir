<?php

namespace App\SOLID\DIP\Example2\Databases;

class MongoConnection implements ConnectionInterface
{

    public function findUser(string $user_name): string
    {
        return $user_name. "<span style='padding: 5px 5px 5px 5px; margin-left: 5px; background-color: darkcyan; border-radius: 20px; color: white;'>MongoDB Provided</span>";
    }
}
