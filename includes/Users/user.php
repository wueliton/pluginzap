<?php

namespace Includes\Users;

session_start();

date_default_timezone_set('America/Sao_Paulo');

class User {
    private $bdConnection;
    private $table = "users";
    private $keyJWT = "gerenciazap";
    private $id;
    private $userData;
    private $userPlan;

    function __construct() {
        $this->bdConnection = new \Includes\Crud\bdConnection();
    }

    function addUser($nome,$email,$whatsapp) {
        $email = filter_var($email,FILTER_SANITIZE_EMAIL);

        if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $exitsEmail = $this->bdConnection->select($this->table,array("email" => $email),"email");

            if($exitsEmail == "") {
                $actualDate = new \DateTime();
                $actualDate = $actualDate->getTimestamp();
                $dataCode = base64_encode($actualDate."|".$email);
                $dataCode = str_replace("=","",$dataCode);

                $params = array(
                    "id" => null,
                    "nome" => $nome,
                    "email" => $email,
                    "cpf" => "",
                    "whatsapp" => preg_replace('/\D/', '',$whatsapp),
                    "senha" => "",
                    "plano" => "",
                    "verificationcode" => $dataCode,
                    "cardNumber" => "",
                    "preApprovalCode" => "",
                );
                
                if($this->bdConnection->insert($this->table,$params)) {
                    $emailSender = new \Includes\EmailSender\email();
                    if($emailSender->sendJoin($email,$nome,"cadastro",$dataCode)){
                        echo \json_response(200,$email);
                    }
                    else {
                        echo \json_response(400,"Houve um erro, contate o suporte.");
                    }
                }
                else {
                    echo \json_response(400,"Consulta Inválida");
                }
            }
            else {
                echo \json_response(400,"Endereço de E-mail já existe");
            }
        }
        else {
            echo \json_response(400,"Parâmetros Inválidos");
        }
    }

    function validateUserData($senha, $email, $cpf) {
        $cpf = preg_replace('/\D/', '', $cpf);

        if($this->validaCPF($cpf)==true) {
            $sql = $this->bdConnection->select($this->table,array("cpf"=>$cpf),"id,cpf");

            if(empty($sql)) {
                $sql = $this->bdConnection->select($this->table,array("email"=>$email),"id");
                $password = password_hash($senha,PASSWORD_DEFAULT);

                $params = array(
                    "id" => $sql["id"],
                    "cpf" => $cpf,
                    "senha" => $password
                );

                if($this->bdConnection->update($this->table,$params)==true) {
                    echo \json_response(200,$sql["id"]);
                }
                else {
                    echo \json_response(400,"Erro no sistema, contate o Administrador.");
                }
            }
            else {
                echo \json_response(400,"CPF já existe, acesse ou recupere os dados de login.");
            }
        }
        else {
            echo \json_response(400,"CPF informado é inválido.");
        }
    }

    function logon($email,$senha) {
        $email = str_replace(" ","",$email);

        $data = $this->bdConnection->select($this->table,array("email"=>$email),"senha,id,preApprovalCode,verificationcode");

        if(!empty($data)) {
            if($data["verificationcode"]=="verified") {
                if(password_verify($senha,$data["senha"])) {
                    $signatureStatus = new \Includes\Payment\Payment();
                    $signatureStatus->getMemberShip($data['preApprovalCode']);
                    $signature = $signatureStatus->getCallback();
    
                    if($signature->status=="PAYMENT_METHOD_CHANGE") {
                        $actualDate = new \DateTime();
                        $actualDate = $actualDate->getTimestamp();
    
                        $_SESSION["id_usuario"] = $data["id"];
                        $_SESSION["time_session"] = $actualDate;
                        $_SESSION["signature"] = $signature->status;
                        
                        echo \json_response(200,"Login realizado com sucesso");
                    }
                    else {
                        $actualDate = new \DateTime();
                        $actualDate = $actualDate->getTimestamp();
    
                        $_SESSION["id_usuario"] = $data["id"];
                        $_SESSION["time_session"] = $actualDate;
                        
                        echo \json_response(200,"Login realizado com sucesso");
                    }
                }
                else {
                    echo \json_response(400,array("id"=>2,"msg"=>"Senha incorreta."));
                }
            }
            else {
                echo \json_response(400,"Sua conta ainda não foi verificada, solicite um novo email de confirmação.");
            }
        }
        else {
            echo \json_response(400,array("id"=>1,"msg"=>"E-mail não localizado."));
        }
    }

    function recoverPass($email) {
        $email = str_replace(" ","",$email);

        $data = $this->bdConnection->select($this->table,array("email"=>$email),"email,id,nome");

        if(!empty($data)) {
            $actualDate = new \DateTime();
            $actualDate = $actualDate->getTimestamp();
            $dataCode = base64_encode($actualDate."|".$email);
            $dataCode = str_replace("=","",$dataCode);

            if($this->bdConnection->update($this->table,array("id"=>$data['id'],"verificationcode"=>"recover"))) {
                $emailSender = new \Includes\EmailSender\email();
                if($emailSender->sendJoin($email,$data["nome"],"recoverpass",$dataCode,"Recuperação de Senha")){
                    echo \json_response(200,"E-mail enviado com sucesso");
                }
            }
        }
        else {
            echo \json_response(400,"E-mail não localizado.");
        }
    }

    function changePass($email,$id,$senha) {
        $email = str_replace(" ","",$email);
        $verifyUser = $this->bdConnection->select($this->table,array("id" => $id,"email" => $email));

        if(!empty($verifyUser)) {
            $password = password_hash($senha,PASSWORD_DEFAULT);

            $params = array(
                "id" => $id,
                "senha" => $password,
                "verificationcode" => "verified"
            );

            if($this->bdConnection->update($this->table,$params)) {
                $actualDate = new \DateTime();
                $actualDate = $actualDate->getTimestamp();

                $_SESSION["id_usuario"] = $id;
                $_SESSION["time_session"] = $actualDate;
                
                echo \json_response(200,"Login realizado com sucesso");
            }
            else {
                echo \json_response(400,"Dados incorretos.");
            }
        }
        else {
            echo \json_response(400,"Dados informados estão incorretos.");
        }
    }

    function changePassProfile($id,$oldPass,$newPass) {
        $data = $this->bdConnection->select($this->table,array("id"=>$id),"senha");

        if(password_verify($oldPass,$data["senha"])) {
            $newPass = password_hash($newPass,PASSWORD_DEFAULT);
            if($this->bdConnection->update("users",array("id"=>$id,"senha"=>$newPass))) {
                echo \json_response(200,"Senha alterada com sucesso.");
            }
            else {
                echo \json_response(400,"Erro ao tentar alterar a senha.");
            }
        }
        else {
            echo \json_response(400,"Senha não confere com a Atual.");
        }

    }

    function verifySession($internal=null) {
        $actualDir = str_replace("gerencia-zap/","",$_SERVER['REQUEST_URI']);
        $actualDir = strrpos($actualDir,"?") ? explode("?",$actualDir) : $actualDir;

        if(isset($_SESSION['id_usuario']) && isset($_SESSION['time_session']) && isset($_SESSION['signature']) || isset($_SESSION['id_usuario']) && isset($_SESSION['time_session'])) {
            $id = $_SESSION['id_usuario'];
            $data = $_SESSION['time_session'];
            $data = new \DateTime(date("Y/m/d H:i",$data));
            $actualDate = new \DateTime(date("Y/m/d H:i"));
            $dateDiff = $data->diff($actualDate, true);

            if($dateDiff->format("%d") >=1) {
                session_unset();
                session_destroy();
            }
            else {
                if(isset($_SESSION['signature']) && $_SESSION['signature'] == "PAYMENT_METHOD_CHANGE") {
                    if($actualDir != "/cancelled") {
                        header("Location: cancelled");
                    }
                }
                else if($actualDir == "/login" || $actualDir == "/join" || $actualDir[0] == "/newpass" || $actualDir == "/recover") {
                    header('Location: panel');
                }

                $data = $this->bdConnection->select($this->table,array("id"=>$id),"nome,email,preApprovalCode,verificationcode,cardNumber,plano");
                $this->userData = $data;

                    /*

                    $code = $data['preApprovalCode'];

                    $payment = new \Includes\Payment\Payment();
                    $payment->getMemberShip($code);
                    $this->userPlan = $payment->getCallback();

                    if($this->userPlan->status=="CANCELLED") {
                        $actualDir = str_replace("gerencia-zap/","",$_SERVER['REQUEST_URI']);
                        $actualDir = strrpos($actualDir,"?") ? explode("?",$actualDir) : $actualDir;

                        if($actualDir != "/cancelled") {
                            header("Location: cancelled");
                        }
                    }*/
            }
        }
        else {
            if($internal!="login") {
                header("Location: login");
            }
        }
    }

    function cancellPlan() {
        $id = $_SESSION['id_usuario'];

        if($this->bdConnection->update($this->table,array("id"=>$id,"plano"=>"0"))) {
            return true;
        }
        else {
            return false;
        }
    }

    function verifyUser() {
        if(isset($_SESSION['id_usuario']) && isset($_SESSION['time_session'])) {
            $id = $_SESSION['id_usuario'];
            $data = $_SESSION['time_session'];
            $data = new \DateTime(date("Y/m/d H:i",$data));
            $actualDate = new \DateTime(date("Y/m/d H:i"));
            $dateDiff = $data->diff($actualDate, true);
            $this->id = $id;

            if($dateDiff->format("%d") >=1) {
                session_unset();
                session_destroy();
                
                return false;
            }
            else {
                $this->id = $id;
                return true;
            }
        }
    }

    function getUserData($id="") {
        $id = $id !="" ? $id : $_SESSION['id'];
        $data = $this->bdConnection->select($this->table,array("id" => $_SESSION['id_usuario']),'nome,whatsapp,email,id,preApprovalCode');
        return $data;
    }

    function getUserName() {
        if($this->verifyUser()==true) {
            return $this->userData["nome"];
        }
    }

    function getUserEmail() {
        if($this->verifyUser()==true) {
            return $this->userData["email"];
        }
    }

    function getUserWhatsApp() {
        if($this->verifyUser()==true) {
            return $this->userData["whatsapp"];
        }
    }

    function getPlanDetails($id=null) {
        $id = $id!=null ? $id : $_SESSION['id_usuario'];
        $data = $this->bdConnection->select($this->table,array("id"=>$id),"nome,email,preApprovalCode,verificationcode,cardNumber,plano");
        $this->userData = $data;
        
        $approvalCode = $data['preApprovalCode'];
        $payment = new \Includes\Payment\Payment();
        $payment->getMemberShip($approvalCode);
        $this->userPlan = $payment->getCallback();

        return $this->userPlan;
    }

    function getValorPlano($id=null) {
        $id = $id!=null ? $id : $_SESSION['id_usuario'];
        $data = $this->bdConnection->select($this->table,array("id"=>$id),"nome,email,preApprovalCode,verificationcode,cardNumber,plano");
        $pay = new \Includes\Payment\Payment();
        $plano = $pay->getPlan($data['plano']);
        return $plano['plan_price'];
    }

    function getCreditCardCode() {
        if($this->verifyUser()==true) {
            return $this->userData["cardNumber"];
        }
    }

    function getUserId() {
        if($this->verifyUser()==true) {
            return $this->id;
        }
    }

    function getPlanCode() {
        return $this->userData['plano'];
    }

    function logout() {
        session_unset();
        session_destroy();

        echo \json_response(200,"Sucesso");
    }

    function enterprisesLimit() {
        $planDetails = $this->bdConnection->select($this->table,array("id"=>$_SESSION['id_usuario']),"plano");
        switch ($planDetails['plano']) {
            case "1" :
                return 1;
            break;
            case "2" :
                return 3;
            break;
            case "3" :
                return 10;
            break;
        } 
    }

    function validaCPF($cpf) {
        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    function showEnterprises() {
        if($this->verifyUser()==true) {
            $enterpriseData = new \Includes\Enterprises\Enterprise;
            return $enterpriseData->getEnterprises($this->id);
        }
    }

    function changePlanCode($id,$preApprovalCode,$planCode,$cardNumber) {
        if($this->bdConnection->update($this->table,array("id"=>$id,"preApprovalCode"=>$preApprovalCode,"plano"=>$planCode,"cardNumber"=>$cardNumber))) {
            return true;
        }
        else {
            return false;
        }
    }
}
