<?php

require("../includes/autoload.php");

$pay = new \Includes\Payment\Payment();

$senderHash = $_POST['senderHash'];
$cardToken = $_POST['token'];

$pay->adesaoPayment(
    'Paulo Wueliton', //$senderName
    '10/04/1994', //$senderBirthDate
    'paulo.wueliton@sandbox.pagseguro.com.br', //$senderEmail
    $senderHash, //$senderHash
    '11940043902', //$phone
    '44517345841', //$senderCPF
    '29.90', //$valorAdesao
    $cardToken, //$cardToken
    'Viela Particular', //$street
    56, //$number
    'Jd São Luís', //$district
    'Guarulhos', //$city
    'SP', //$state
    'BRA', //$country
    '07075170' //$postalCode
);

echo($pay->getCallback());

