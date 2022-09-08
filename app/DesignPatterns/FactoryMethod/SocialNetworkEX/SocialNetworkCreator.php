<?php

namespace App\DesignPatterns\FactoryMethod\SocialNetworkEX;

use App\DesignPatterns\FactoryMethod\SocialNetworkEX\SocialNetworks\SocialNetworkInterface;

abstract class SocialNetworkCreator
{
    abstract public function getSocialNetwork():SocialNetworkInterface;

    public function doSomethingToSocialNetwork($content):void
    {
        $connect= $this->getSocialNetwork();
        $connect->login();
    }
}
