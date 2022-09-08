<?php

namespace App\DesignPatterns\FactoryMethod\SocialNetworkEX\SocialNetworks;

class Instagram implements SocialNetworkInterface
{
    private string $login, $password;

    /**
     * @param string $login
     * @param string $password
     */
    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }


    public function login(): void
    {
        echo "<p>This Is a $this->login Method</p>";
    }

    public function logout(): void
    {
        echo "<p>This Is a Logout Method</p>";
    }

    public function createPost(string $content): void
    {
        echo "<h2>$content</h2>";
    }
}
