<?php

require_once "../includes/autoload.php";

$id =  $_POST['id'];
$enterprise = new \Includes\Enterprises\Enterprise();

if($enterprise->readConfirmation($id)==true) {
    echo json_response(200,"Salvo");
}
else {
    echo json_response(400,"Erro ao tentar salvar");
}