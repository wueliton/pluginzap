<?php

session_start();

require("../includes/autoload.php");

$enterprise = new \Includes\Enterprises\Enterprise();
$enterprisesList = $_POST['enterprises'];
$valuesEnterprises = array();

if($_POST['enterprises']!="all") {
    $enterprisesList = explode(",",$_POST['enterprises']);

    foreach($enterprisesList as $key=>$item) {
        if(!empty($item)) {
            $valuesEnterprises[$key] = $item;
        }
    }

    $enterprisesList = array("idEnterprise"=>$valuesEnterprises);
}
else {
    $enterprisesList = "all";
}

if(isset($_POST['order'])) {
    if($_POST['order']=="BETWEEN") {

        $enterprise->listMessages($_SESSION['id_usuario'],$enterprisesList,$_POST['page'],10,"DESC",$_POST['between'],$_POST['andBetween']);
    }
    else {
        $enterprise->listMessages($_SESSION['id_usuario'],$enterprisesList,$_POST['page'],10,$_POST['order']);
    }
}
else {
    $enterprise->listMessages($_SESSION['id_usuario'],$enterprisesList,$_POST['page']);
}

