<?php

namespace App\SOLID\SRP\Email;

use App\SOLID\SRP\Message;
use App\SOLID\SRP\User;


class ConfirmationMailMailer
{
    private ConfirmationMailMailerFactory $confirmationMailerFactory;
    private MailerClass $mailer;

    public function __construct
    (
        ConfirmationMailMailerFactory $confirmationMailerFactory,
        MailerClass $mailer
    )
    {
        $this->confirmationMailerFactory= $confirmationMailerFactory;
        $this->mailer= $mailer;
    }

    public function createMessage(User $user):Message
    {
        return $this->confirmationMailerFactory->createMessageFor($user);
    }

    public function sendMessage(User $user)
    {
        $message= $this->createMessage($user);
        return $this->mailer->send($message);

    }



}
