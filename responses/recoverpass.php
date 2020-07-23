<?php

require_once "../includes/autoload.php";

$novoUsuario = new \Includes\Users\User();
$novoUsuario->recoverPass($_POST['email']);

