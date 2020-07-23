<?php

require("../includes/autoload.php");

$pay = new Includes\Payment\Payment();
$user = new Includes\Users\User();

$userData = $user->getUserData();
$preApprovalCode = $userData['preApprovalCode'];

$pay->getMemberShip($preApprovalCode);
$planData = $pay->getCallback();

$params = [
    "",
    "",
    $planData->sender->name,
    $planData->sender->email,
    $_POST['cpf'],
    $planData->sender->phone->areaCode.$planData->sender->phone->number,
    $planData->sender->address->street,
    $planData->sender->address->number,
    "",
    $planData->sender->address->district,
    $planData->sender->address->city,
    $planData->sender->address->state,
    $planData->sender->address->country,
    $planData->sender->address->postalCode,
    $_POST['token'],
    $_POST['nome'],
    $_POST['dataDeNascimento'],
    $planData->sender->phone->areaCode.$planData->sender->phone->number
];

print_r($_POST['descount']);

/*
if($pay->cancelSignature($preApprovalCode)) {
    if($user->cancellPlan()) {
        $pay->createMemberShip(
            $plan,
            $ref,
            $planData->sender->name,
            $planData->sender->email,
            $_POST['cpf'],
            $planData->sender->phone->areaCode.$planData->sender->phone->number,
            $planData->sender->address->street,
            $planData->sender->address->number,
            "",
            $planData->sender->address->district,
            $planData->sender->address->city,
            $planData->sender->address->state,
            $planData->sender->address->country,
            $planData->sender->address->postalCode,
            $_POST['token'],
            $_POST['nome'],
            $_POST['dataDeNascimento'],
            $planData->sender->phone->areaCode.$planData->sender->phone->number
        );
    }
    else {

    }
}
else {

}*/
