<?php 

require_once "../includes/autoload.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$whatsapp = $_POST['whatsapp'];

$novoUsuario = new \Includes\Users\User();
$novoUsuario->addUser($nome,$email,$whatsapp);
