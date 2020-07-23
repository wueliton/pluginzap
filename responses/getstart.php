<?php

require_once "../includes/autoload.php";
require_once "../includes/functions.php";

if(isset($_POST) && isset($_POST['password']) && isset($_POST['cpf']) && isset($_POST['email'])) {
    $user = new \Includes\Users\User();
    $user->validateUserData($_POST['password'], $_POST['email'], $_POST['cpf']);
}
else if(isset($_POST['site']) && isset($_POST['empresa']) && isset($_POST['whatsapp']) && isset($_FILES['image']) && isset($_POST['idClient'])) {
    $enterprise = new \Includes\Enterprises\Enterprise();
    $enterprise->newEnterprise($_POST['idClient'],$_FILES,$_POST['site'],$_POST['empresa'],$_POST['whatsapp']);
}
