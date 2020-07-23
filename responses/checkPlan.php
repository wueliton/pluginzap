<?php

require_once "../includes/autoload.php";

$user = new Includes\Users\User();
$enterprise = new Includes\Enterprises\Enterprise();
$pay = new Includes\Payment\Payment();
$planDetails = $user->enterprisesLimit();


    $countEnterprise = $enterprise->quantEnterprise();
    if(intval($countEnterprise) < intval($planDetails)) {
        $diff = $planDetails - $countEnterprise;
        echo json_response(200,$diff);
    }
    else {
        $userData = $user->getUserData();
        $pay->getTransaction($userData['preApprovalCode']);
        $data = $pay->getCallback();
        $list = (array)$data->paymentOrders;
        $lastPayment = array_key_first($list);
        $pay->getMemberShip($userData['preApprovalCode']);
        $userPlan = $pay->getCallback();

        echo json_response(200,array("msg"=>"Limite Atingido","plan"=>$planDetails,"dataAssinatura"=>$userPlan->lastEventDate,"proximaParcela"=>$list[$lastPayment]->schedulingDate));
    }
