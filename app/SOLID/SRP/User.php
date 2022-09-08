<?php

namespace App\SOLID\SRP;

use Illuminate\Support\Facades\Auth;

class User
{

    public function getConfirmCode():string
    {
        return "ljaskjdroiiu92w83u2wrehr2we4234";
    }

    public function getEmailAddress():string
    {
        return Auth::user()->email;
    }
}
