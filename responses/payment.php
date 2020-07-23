<?php

require("../includes/autoload.php");
require("../includes/functions.php");

$pay = new \Includes\Payment\Payment;
$expiration = explode("/",$_POST['vencimento']);
$logradouro = explode(",",$_POST['logradouro']);
$rua = $logradouro[0];
$numero = preg_replace('/\D/', '',$logradouro[1]);
$email = $_POST['email'];
$email = explode("@",$email);//SANDBOX
$email = $email[0]."@sandbox.pagseguro.com.br";//SANDBOX

$plan = $pay->getPlan($_POST['planCode']);

$errors = [
    '10003' => "E-mail inválido",
    '10005' => "As contas do fornecedor e do comprador não podem ser relacionadas entre si.",
    '10009' => "Método de pagamento indisponível no momento.",
    '10020' => "Forma de pagamento inválida.",
    '10023' => "Forma de pagamento indisponível.",
    '10025' => "Nome não pode ficar em branco.",
    '10026' => "E-mail não pode ficar em branco.",
    '10049' => "Nome é obrigatório.",
    '10050' => "E-mail é obrigatório.",
    '11002' => "E-mail inválido",
    '11013' => "Telefone inválido.",
    '11014' => "Telefone inválido.",
    '17078' => "Cartão vencido.",
    '19001' => "CEP inválido.",
    '19002' => "Endereço inválido.",
    '19003' => "Endereço inválido.",
    '19005' => "Bairro inválido.",
    '19006' => "Cidade inválida.",
    '19007' => "Estado inválido.",
    '19014' => "Telefone inválido",
    '61011' => "CPF inválido.",
    '53048' => "Vencimento informado é inválido."
];

$user = [
    'user_name' => $_POST['nome'],
    'user_document' => preg_replace('/\D/', '',$_POST['cpf']),
    'user_phone' => preg_replace('/\D/', '',$_POST['celular']),
    'user_email' => $email,
    'user_addr_street' => $rua,
    'user_addr_number' => $numero,
    'user_addr_complement' => "",
    'user_addr_district' => $_POST['bairro'],
    'user_addr_city' => $_POST['cidade'],
    'user_addr_state' => $_POST['estado'],
    'user_addr_country' => 'BRA',
    'user_addr_postalcode' => $_POST['cep'],
];

$card = [
    'card_number' => preg_replace('/\D/', '',$_POST['numeroCartao']),
    'card_brand' => $_POST['cardBrand'],
    'card_token' => $_POST['token'],
    'card_cvv' => $_POST['cvv'],
    'card_expiration_month' => $expiration[0],
    'card_expiration_year' => $expiration[1],
    'card_holder_name' => $_POST['nome'],
    'card_holder_birth' => $_POST['dataDeNascimento'],
    'card_holder_phone' => preg_replace('/\D/', '',$_POST['celular'])
];

// Chamada do método de adesão
$pay->createMemberShip(
    $plan['plan_code_pagseguro'],
    $plan['plan_id'],
    $user['user_name'],
    $user['user_email'],
    $user['user_document'],
    $user['user_phone'],
    $user['user_addr_street'],
    $user['user_addr_number'],
    $user['user_addr_complement'],
    $user['user_addr_district'],
    $user['user_addr_city'],
    $user['user_addr_state'],
    $user['user_addr_country'],
    $user['user_addr_postalcode'],
    $card['card_token'],
    $card['card_holder_name'],
    $card['card_holder_birth'],
    $card['card_holder_phone']
);

$paymentStatus = $pay->getCallback();

if(isset($paymentStatus->errors)) {
    foreach($paymentStatus->errors as $key=>$error) {
        if($errors[$key]) {
            echo json_response(400,array("code"=>$key,"msg"=>$errors[$key]));
        }
        else {
            echo json_response(400,"Ocorreu um erro, tente novamente mais tarde.");
        }
    }
}
else {
    $code = $paymentStatus->code;

    $params = array(
        "id" => $_POST['idClient'],
        "plano" => $_POST['planCode'],
        "cardNumber" => substr(preg_replace('/\D/', '',$_POST['numeroCartao']),-4),
        "preApprovalCode" => $code,
    );

    $bdConnection = new Includes\Crud\bdConnection();

    if($bdConnection->update("users",$params)==true) {
        session_start();
        date_default_timezone_set('America/Sao_Paulo');
        $actualDate = new DateTime();
        $actualDate = $actualDate->getTimestamp();

        $_SESSION["id_usuario"] = $_POST['idClient'];
        $_SESSION["time_session"] = $actualDate;

        echo json_response(200,"Sucesso");
    }
    else {
        echo json_response(400,"Ocorreu um erro, fale com o Administrador.");
    }
}

