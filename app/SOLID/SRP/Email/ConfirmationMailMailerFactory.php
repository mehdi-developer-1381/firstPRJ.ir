<?php

namespace App\SOLID\SRP\Email;


use App\SOLID\SRP\Message;
use App\SOLID\SRP\Template\TemplateEngineClass;
use App\SOLID\SRP\Translating\TranslatorClass;
use App\SOLID\SRP\User;

class ConfirmationMailMailerFactory
{
    private TemplateEngineClass $templateEngine;
    private TranslatorClass $translator;

    public function __construct
    (
        TemplateEngineClass $templateEngine,
        TranslatorClass $translator
    )
    {
        $this->templateEngine= $templateEngine;
        $this->translator= $translator;
    }

    public function createMessageFor(User $user): Message
    {
        $subject= $this->translator->translate("Please Make You Decision");
        $body= $this->templateEngine->render("email.confirm.blade",[
            "confirmationCode" => $user->getConfirmCode()
        ]);

        return new Message($subject,$body,$user->getEmailAddress());
    }

}
