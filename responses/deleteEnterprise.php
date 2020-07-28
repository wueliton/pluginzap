<?php

require_once "../includes/autoload.php";

$enterpriseData = new Includes\Enterprises\Enterprise();
if($enterpriseData->delete($_POST['id'])) {
    echo json_response(200,"Excluído com Sucesso.");
}
else {
    echo json_response(400,"Falha ao tentar excluir, tente novamente mais tarde.");
}
