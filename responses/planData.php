<?php

require_once "../includes/autoload.php";

$user = new Includes\Users\User();
echo json_response(200,array("plano"=>$user->getPlanDetails(),"valor"=>$user->getValorPlano()));
