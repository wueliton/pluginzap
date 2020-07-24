<?php

require("../includes/autoload.php");

$pay = new Includes\Payment\Payment();
$user = new Includes\Users\User();

$userData = $user->getUserData($_SESSION['id_usuario']);
$preApprovalCode = $userData['preApprovalCode'];

$pay->getMemberShip($preApprovalCode);
$planData = $pay->getCallback();

$cpf = preg_replace('/\D/', '',$_POST['cpf']);

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
    '53048' => "Vencimento informado é inválido.",
    '53017' => "CPF inválido.",
    '53085' => "Método de pagamento não suportado.",
    '53044' => "Verifique os dados do cartão",
    '401' => "Não autorizado"
];

$params = [
    "",
    "",
    $_POST['nome'],
    $planData->sender->email,
    $cpf,
    $planData->sender->phone->areaCode.$planData->sender->phone->number,
    $planData->sender->address->street,
    $planData->sender->address->number,
    "",
    $planData->sender->address->district,
    $planData->sender->address->city,
    $planData->sender->address->state,
    $planData->sender->address->country,
    $planData->sender->address->postalCode,
    $_POST['token'],
    $_POST['nome'],
    $_POST['dataDeNascimento'],
    $planData->sender->phone->areaCode.$planData->sender->phone->number
];

$desconto = $_POST['descount']+0.09;
$planDetails = $pay->getPlan($_POST['plan']);
$valor = $planDetails['plan_price'];
$valor = $valor - $desconto;
$valor = number_format($valor,2,'.','');

$senderHash = $_POST['senderHash'];
$cardToken = $_POST['token'];

$pay->adesaoPayment(
    $planData->sender->name, //$senderName
    $_POST['dataDeNascimento'], //$senderBirthDate
    $planData->sender->email, //$senderEmail
    $senderHash, //$senderHash
    $planData->sender->phone->areaCode.$planData->sender->phone->number, //$phone
    $cpf, //$senderCPF
    $valor, //$valorAdesao
    $cardToken, //$cardToken
    $planData->sender->address->street, //$street
    $planData->sender->address->number, //$number
    $planData->sender->address->district, //$district
    $planData->sender->address->city, //$city
    $planData->sender->address->state, //$state
    'BRA', //$country
    $planData->sender->address->postalCode //$postalCode
);

$status = $pay->getCallback();
$status = json_decode($status,TRUE);


if(isset($status['code'])) {
    if($pay->cancelSignature($preApprovalCode)) {
        $pay->createMemberShip(
            $planDetails['plan_code_pagseguro'],
            $planDetails['plan_id'],
            $_POST['nome'],
            $planData->sender->email,
            $cpf,
            $planData->sender->phone->areaCode.$planData->sender->phone->number,
            $planData->sender->address->street,
            $planData->sender->address->number,
            "",
            $planData->sender->address->district,
            $planData->sender->address->city,
            $planData->sender->address->state,
            $planData->sender->address->country,
            $planData->sender->address->postalCode,
            $_POST['token'],
            $_POST['nome'],
            $_POST['dataDeNascimento'],
            $planData->sender->phone->areaCode.$planData->sender->phone->number
        );

        $callback = $pay->getCallback();
        
        if(isset($callback->code)) {
            if($user->changePlanCode($_SESSION['id_usuario'],$callback->code,$_POST['plan'],substr(preg_replace('/\D/', '',$_POST['numeroCartao']),-4))) {
                echo json_response(200,"Assinatura atualizada com sucesso.");
            }  
            else {
                echo json_response(400,'Erro ao tentar salvar');
            }
        }
        else {
            echo json_response(400,array("code"=>$key,"msg"=>$callback));
        }

    }
    else {
        echo json_response(400,"Houve um erro ao tentar alterar a Assinatura, envie um email para nosso Suporte.<br/><a href='mailto:suporte@pluginzap.com.br'>suporte@pluginzap.com.br</a>'");
    }
}
else {
    if(isset($status['error'])) {
        $erro = $status['error'][0]['code'];
        echo json_response(400,array("code"=>$erro,"msg"=>$errors[$erro]));
    }
    else {
        echo json_response(400,"Pagamento não autorizado.");
    }
}

