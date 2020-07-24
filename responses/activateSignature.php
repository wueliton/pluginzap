<?php

require_once "../includes/autoload.php";

$pay = new \Includes\Payment\Payment();
$user = new \Includes\Users\User();
$bdConnection = new Includes\Crud\bdConnection();
$data = $user->getUserData($_SESSION['id_usuario']);
$logradouro = explode(",", $_POST['logradouro']);
$idUser = $_SESSION['id_usuario'];


$pay->paymentRepeat(
    $data['preApprovalCode'],
    preg_replace('/\D/', '', $_POST['cpf']),
    $logradouro[0],
    preg_replace('/\D/', '', $logradouro[1]),
    "",
    $_POST['bairro'],
    $_POST['cidade'],
    $_POST['estado'],
    "BRA",
    $_POST['cep'],
    $_POST['token'],
    $_POST['nome'],
    $_POST['dataDeNascimento'],
    $data['whatsapp']
);

$paymentStatus = $pay->getCallback();

if (isset($paymentStatus->errors)) {
    $error = (array)$paymentStatus->errors;
    $firstKey = array_key_first($error);
    $error = $error[$firstKey];
    echo \json_response(400, array("code" => $firstKey, "msg" => $error));
} else {
    $idUser = $_SESSION['id_usuario'];
    $finalCartao = substr(preg_replace('/\D/', '', $_POST['numeroCartao']), -4);

    if ($bdConnection->update("users", array("id" => $idUser, "cardNumber" => $finalCartao)) == true) {
        echo \json_response(200, "Salvo com Sucesso");
        unset($_SESSION['signature']);
    } else {
        echo \json_response(400, "Erro ao tentar salvar no banco de dados");
    }
}
