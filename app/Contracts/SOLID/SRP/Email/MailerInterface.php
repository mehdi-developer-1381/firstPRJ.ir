<?php

namespace App\Contracts\SOLID\SRP\Email;


use App\SOLID\SRP\Message;
use App\SOLID\SRP\User;
use Illuminate\View\View;

interface MailerInterface
{

     public function send(Message $message);
}
