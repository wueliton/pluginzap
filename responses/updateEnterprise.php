<?php

require_once "../includes/autoload.php";

$enterprise = new \Includes\Enterprises\Enterprise();
$enterprise->updateEnterpriseData($_POST['idEnterprise'],$_POST['site'],$_POST['empresa'],$_POST['whatsapp'],$_POST['imageName'],$_FILES);

