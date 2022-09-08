<?php

namespace App\DesignPatterns\Creational\FactoryMethod\SocialNetworkEX\SocialNetworks;

interface SocialNetworkInterface
{
    public function login():void;

    public function logout():void;

    public function createPost(string $content):void;
}
