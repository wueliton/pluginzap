<?php

require_once "../includes/autoload.php";

$user = new Includes\Users\User();
$user->logon($_POST['email'],$_POST['senha']);
