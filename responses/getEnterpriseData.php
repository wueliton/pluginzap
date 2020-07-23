<?php

require_once "../includes/autoload.php";

if(isset($_POST['id'])) {
    $idEmpresa = preg_replace('/\D/', '',$_POST['id']);
    $enterpriseData = new Includes\Enterprises\Enterprise();
    $enterpriseData->getEnterpriseData($idEmpresa);
}
else {
    echo \json_response(400,"Houve um erro ao tentar recuperar os dados da Empresa.");
}

