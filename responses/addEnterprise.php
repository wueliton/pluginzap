<?php

require_once "../includes/autoload.php";

$enterpriseData = new Includes\Enterprises\Enterprise();
session_start();

if(isset($_POST['site']) && isset($_POST['empresa']) && isset($_POST['whatsapp']) && isset($_FILES['image'])) {
    $enterpriseData->newEnterprise($_SESSION['id_usuario'],$_FILES,$_POST['site'],$_POST['empresa'],$_POST['whatsapp'],false);
}