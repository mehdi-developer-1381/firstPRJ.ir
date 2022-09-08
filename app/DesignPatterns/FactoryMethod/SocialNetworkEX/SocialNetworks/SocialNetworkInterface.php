<?php

namespace App\DesignPatterns\FactoryMethod\SocialNetworkEX\SocialNetworks;

interface SocialNetworkInterface
{
    public function login():void;

    public function logout():void;

    public function createPost(string $content):void;
}
