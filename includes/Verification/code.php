<?php

namespace Includes\Verification;

use \Includes\Payment\Payment;

class Code {
    private $fullKey;
    private $email;
    private $date;
    private $id;
    private $query;
    private $pay;
    private $sessionPayment;
    private $whatsapp;

    function __construct($key) {
        $this->fullKey = $key;
        $this->query = new \Includes\Crud\bdConnection();
        date_default_timezone_set('America/Sao_Paulo');

        $key = base64_decode($this->fullKey);
        $key = explode("|",$key);
        $this->email = $key[1];
        $this->date = new \DateTime(date("Y/m/d H:i",$key[0]));
        $this->pay = new \Includes\Payment\Payment;
        $this->sessionPayment = $this->pay->getSessionId();
    }

    function validateKey() {
        $actualDate = new \DateTime(date("Y/m/d H:i"));
        $dateDiff = $this->date->diff($actualDate, true);

        $verificationCodeStatus = $this->query->select("users",array("email"=>$this->email),"verificationcode,cpf,id,plano,whatsapp");

        $this->id = $verificationCodeStatus["id"];
        $this->whatsapp = $verificationCodeStatus["whatsapp"];

        if($dateDiff->format("%d") == 0 && $dateDiff->format("%H") <= 3 && $this->fullKey==$verificationCodeStatus["verificationcode"] || $verificationCodeStatus["verificationcode"]=="verified" && $verificationCodeStatus["plano"]=="0") {
            if($verificationCodeStatus["cpf"]=="") {
                return 1;
            }
            if($verificationCodeStatus["cpf"]!="" && $verificationCodeStatus["verificationcode"]!="verified") {
                return 2;
            }

            if($verificationCodeStatus["verificationcode"]=="verified") {
                return 3;
            }
        }
        else if($dateDiff->format("%d") > 0 && $this->fullKey==$verificationCodeStatus["verificationcode"] || $dateDiff->format("%H") > 3 && $this->fullKey==$verificationCodeStatus["verificationcode"]) {
            return 4;
        }
        else if($verificationCodeStatus["verificationcode"]=="recover") {
            return 6;
        }
        else {
            return 5;
        }
    }

    function getFullKey() {
        return $this->fullKey;
    }

    function getEmail() {
        return $this->email;
    }

    function getId() {
        return $this->id;
    }

    function getWhatsApp() {
        return $this->whatsapp;
    }
}
