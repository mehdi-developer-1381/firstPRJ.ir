<?php

namespace App\SOLID\SRP\Email;


use App\Contracts\SOLID\SRP\Email\MailerInterface;
use App\SOLID\SRP\Message;


class MailerClass implements MailerInterface
{

    public function send(Message $message)
    {
        if($message->getBody() == "email.confirm.blade"){
            return $message->getEmailAddress();
        }

    }


}
