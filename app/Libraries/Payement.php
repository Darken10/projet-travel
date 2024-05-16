<?php

namespace App\Libraries;

class Payement
{

    public static  $NUMERO = 12345678;
    public static  $OTP = 123456;
    private int $numero;
    private int $otp;
    public int $prix;
    public string $monais = "XOF";

    private string $moyenPayment = "orange";
    public string $codeTransfert;



    function __construct(array $credential)
    {
        ['numero' => $this->numero, 'otp' => $this->otp, 'prix' => $this->prix] = $credential;
        $this->codeTransfert = uniqid('OM-');
        //dd($this->codeTransfert);

    }

    function payement(): bool
    {
        return $this->numero == static::$NUMERO && $this->otp == static::$OTP;
    }

    function getCodeTransfert(): string
    {
        return $this->codeTransfert;
    }

    function getNumero():int | string{
        return $this->numero;
    }
    function getOTP():int | string{
        return $this->otp;
    }
    function getPrix():int | string{
        return $this->prix;
    }
    function getMonais(): string{
        return $this->monais;
    }
    function getMoyenPayement():string{
        return $this->moyenPayment;
    }
}
