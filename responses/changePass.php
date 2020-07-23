<?php

require("../includes/autoload.php");

$user = new \Includes\Users\User();
$id = $_SESSION['id_usuario'];

$user->changePassProfile($id,$_POST['oldPassword'],$_POST['newPassword']);
