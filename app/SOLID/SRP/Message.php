<?php

namespace App\SOLID\SRP;

class Message
{
    private $subject;
    private $body;
    private $emailAddress;

    /**
     * @param $subject
     * @param $body
     * @param $emailAddress
     */

    public function __construct($subject, $body, $emailAddress)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return mixed
     */
    public function getSubject():string
    {
        return $this->subject;
    }

    /**
     * @return mixed
     */
    public function getBody():string
    {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getEmailAddress():string
    {
        return $this->emailAddress;
    }




}
