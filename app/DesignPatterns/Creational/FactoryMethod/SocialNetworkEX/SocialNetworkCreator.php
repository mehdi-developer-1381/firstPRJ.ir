<?php

namespace App\DesignPatterns\Creational\FactoryMethod\SocialNetworkEX;

use App\DesignPatterns\Creational\FactoryMethod\SocialNetworkEX\SocialNetworks\SocialNetworkInterface;

abstract class SocialNetworkCreator
{
    abstract public function getSocialNetwork():SocialNetworkInterface;

    public function doSomethingToSocialNetwork($content):void
    {
        $connect= $this->getSocialNetwork();
        $connect->login();
    }
}
