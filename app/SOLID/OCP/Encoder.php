<?php

namespace App\SOLID\OCP;



use App\Contracts\SOLID\OCP\Encode\EncodeInterface;

class Encoder
{
    private EncoderFactory $encoderFactory;

    /**
     * @param EncoderFactory $encoderFactory
     */
    public function __construct(EncoderFactory $encoderFactory)
    {
        $this->encoderFactory = $encoderFactory;
    }


    public function encode(string $format):EncodeInterface
    {
        return $this->encoderFactory->encode($format);
    }
}
