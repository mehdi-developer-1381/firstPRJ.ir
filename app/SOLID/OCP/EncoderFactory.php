<?php

namespace App\SOLID\OCP;

use App\Contracts\SOLID\OCP\Encode\EncodeInterface;
use App\SOLID\OCP\Encode\JsonEncoder;
use App\SOLID\OCP\Encode\XMLEncoder;


class EncoderFactory
{
    public function encode(string $format):EncodeInterface
    {
        $encoder="";

        if($format == "Json"){
            $encoder = new JsonEncoder();

        }elseif($format == "XML"){
            $encoder = new XMLEncoder();
        }

        return $encoder;
    }
}
