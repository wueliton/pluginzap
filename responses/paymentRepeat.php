<?php

require("../includes/autoload.php");
require("../includes/functions.php");

$pay = new \Includes\Payment\Payment;
$expiration = explode("/",$_POST['vencimento']);
$logradouro = explode(",",$_POST['logradouro']);
$rua = $logradouro[0];
$numero = preg_replace('/\D/', '',$logradouro[1]);
$email = $_POST['email'];
//$email = explode("@",$email);//SANDBOX
//$email = $email[0]."@sandbox.pagseguro.com.br";//SANDBOX

$plan[1] = [
    'plan_id' => 2,
    'plan_code_pagseguro' => '56B76F71BABA0E899466FFB86FF7B090',
    'plan_title' => 'Inicial',
    'plan_price' => '15.90',
    'plan_active' => 1,
    'plan_recurrency' => 'MONTHLY'
];
$plan[2] = [
    'plan_id' => 2,
    'plan_code_pagseguro' => '1651A7395E5EB61EE472BFB7A7988BD4',
    'plan_title' => 'Meu Plano Teste',
    'plan_price' => '250.00',
    'plan_active' => 1,
    'plan_recurrency' => 'MONTHLY'
];
$plan[3] = [
    'plan_id' => 1,
    'plan_code_pagseguro' => '1651A7395E5EB61EE472BFB7A7988BD4',
    'plan_title' => 'Meu Plano Teste',
    'plan_price' => '250.00',
    'plan_active' => 1,
    'plan_recurrency' => 'MONTHLY'
];

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
$pay->paymentRepeat(
    $_POST['preApprovalCode'],
    $plan[$_POST['planCode']]['plan_code_pagseguro'],
    $plan[$_POST['planCode']]['plan_id'],
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

print_r($paymentStatus);

/*
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

}
*/

