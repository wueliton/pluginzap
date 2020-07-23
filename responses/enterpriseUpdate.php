<?php

require_once "../includes/autoload.php";

$message = isset($_POST['mensagem']) ? $_POST['mensagem'] : "";

$enterpriseData = new Includes\Enterprises\Enterprise();
if($enterpriseData->updateEnterprise($_POST['id'],$message,$_POST['theme']) == true) {
    echo json_response(200,"Dados salvos com sucesso.");
}
else {
    echo json_response(400,"Houve um erro ao tentar salvar.");
}
