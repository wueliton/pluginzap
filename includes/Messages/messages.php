<?php

namespace Includes\Messages;

date_default_timezone_set('America/Sao_Paulo');

class Messages {
    private $bdConnection;
    private $params;
    private $idEnterprise;
    private $numberEnterprise;
    private $nomeEmpresa;
    private $imagemEmpresa;

    function __construct($idEnterprise,$urlOrigin,$nome,$whatsapp,$email,$message) {
        $this->bdConnection = new \Includes\Crud\bdConnection();
        $date = new \Datetime('now');

        $this->params = array(
            "id" => "",
            "idEnterprise" => $idEnterprise,
            "urlOrigem" => $urlOrigin,
            "nome" => $nome,
            "whatsapp" => preg_replace('/\D/', '', $whatsapp),
            "email" => $email,
            "mensagem" => $message,
            "lido" => 0,
            "data" => $date->format('Y-m-d H:i:s')
        );

        $this->idEnterprise = $idEnterprise;
    }

    function saveMessage() {
        $userData = $this->bdConnection->select("enterprise",array("id"=>$this->idEnterprise),"id_usuario,whatsapp,nome,imagem");
        $this->nomeEmpresa = $userData['nome'];
        $this->imagemEmpresa = $userData['imagem'];

        if($this->bdConnection->insert("mensagem",$this->params)) {
            $planDetails = new \Includes\Users\User();
            $this->numberEnterprise = $userData['whatsapp'];
            $signature = $planDetails->getPlanDetails($userData['id_usuario']);
            $status = $signature->status;
            if($status!="ACTIVE") {
                return false;
            }
            else {
                return true;
            }
        }
    }

    function getNumber() {
        return $this->numberEnterprise;
    }

    function getImagem() {
        return $this->imagemEmpresa;
    }
    function getEnterpriseName() {
        return $this->nomeEmpresa;
    }
}