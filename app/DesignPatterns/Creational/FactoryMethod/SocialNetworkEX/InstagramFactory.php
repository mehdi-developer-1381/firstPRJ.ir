<?php

namespace App\DesignPatterns\Creational\FactoryMethod\SocialNetworkEX;

use App\DesignPatterns\Creational\FactoryMethod\SocialNetworkEX\SocialNetworks\Instagram;
use App\DesignPatterns\Creational\FactoryMethod\SocialNetworkEX\SocialNetworks\SocialNetworkInterface;

class InstagramFactory extends SocialNetworkCreator
{
    private string $login, $password;
    private $connector;

    /**
     * @param string $login
     * @param string $password
     */
    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }


    public function getSocialNetwork():SocialNetworkInterface
    {
        if(!$this->connector instanceof SocialNetworkInterface){
            $this->connector= new Instagram($this->login,$this->password);
        }
        return $this->connector;
    }




}
