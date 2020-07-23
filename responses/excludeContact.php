<?php

require("../includes/autoload.php");

$enterprises = new \Includes\Enterprises\Enterprise();

$id = $_POST['id'];

if($enterprises->exclude($id)) {
    echo json_response(200,"Excluido com sucesso.");
}
else {
    echo json_response(400,"Erro ao tentar excluir registros, contate o administrador.");
}
