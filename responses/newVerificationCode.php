<?php

require_once "../includes/autoload.php";
require_once "../includes/functions.php";

if(isset($_POST['emailNewToken']) && isset($_POST['tokenValidate'])) {
    $email = filter_var($_POST['emailNewToken'],FILTER_SANITIZE_EMAIL);
    date_default_timezone_set('America/Sao_Paulo');

    if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $token = $_POST['tokenValidate'];
        $key = base64_decode($token);
        $key = explode("|",$key);

        if($key[1] == $email) {
            $bdConnection = new Includes\Crud\bdConnection();
            $query = $bdConnection->select("users",array("email"=>$email),"id,nome");

            if(!empty($query)) {
                $actualDate = new DateTime();
                $actualDate = $actualDate->getTimestamp();
                $dataCode = base64_encode($actualDate."|".$email);
                $dataCode = str_replace("=","",$dataCode);

                $params = array(
                    "id" => $query["id"],
                    "verificationcode" => $dataCode,
                );
                
                if($bdConnection->update("users",$params)==true) {
                    $emailSender = new Includes\EmailSender\email();
                    if($emailSender->sendJoin($email,$query["nome"],"novotoken",$dataCode)==true){
                        echo json_response(200,$email);
                    }
                    else {
                        echo json_response(400,"Houve um erro, contate o suporte.");
                    }
                }
                else {
                    echo json_response(400,"Erro ao tentar gerar novo código");
                }
            }
            else {
                echo json_response(400,"E-mail não localizado no banco de dados.");
            }
        }
        else {
            echo json_response(400,"E-mail divergente do cadastrado.");
        }
    }
    else {
        echo json_response(400,"Formato de dado Inválido");
    }
}
else {
    echo json_response(400,"Parâmetros Inválidos");
}
