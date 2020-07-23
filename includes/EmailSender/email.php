<?php

namespace Includes\EmailSender;

require '../vendor/autoload.php';

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\Exception;

class email {
    private $host;
    private $username;
    private $password;
    private $port;
    private $from;
    private $nameFrom;
    private $mail;


    function __construct() {
        $this->host = "ssl://smtp.gmail.com";
        $this->username = "wueliton.horacio@gmail.com";
        $this->password = "arbngqgfqborkytb";
        $this->port = 465;
        $this->from = "wueliton.horacio@gmail.com";
        $this->nameFrom = "Paulo - GerenciaZap";
        $this->mail = new PHPMailer(true);
    }

    function sendJoin($to,$name,$templateName,$token=false,$title="Bem Vindo(a) ao GerenciaZap") {
        $baseDir = __DIR__."/";
        $baseDir = str_replace("\includes\EmailSender/","",$baseDir)."/";

        if(\file_exists($baseDir."email-examples/".$templateName.".html")) {
            $template = \file_get_contents($baseDir."email-examples/".$templateName.".html");
            $template = str_replace("{User}",$name,$template);
            $template = str_replace("{urlValidate}",$token,$template);
            $this->mail->isSMTP();
            $this->mail->Host       = $this->host;
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = $this->username;
            $this->mail->Password   = $this->password;
            $this->mail->Port       = $this->port;
            $this->mail->SMTPDebug  = false;
            $this->mail->CharSet    = 'UTF-8';
            
            $this->mail->setFrom($this->from, $this->nameFrom);
            $this->mail->addAddress($to,$name);
            $this->mail->addReplyTo($this->from, $this->nameFrom);
            
            $this->mail->isHTML(true);
            $this->mail->Subject = $title;
            $this->mail->Body    = $template;

            if(!$this->mail->send()) {
                return $this->mail->ErrorInfo;
            }
            return true;
        }
        else {
            return false;
        }
    }
}