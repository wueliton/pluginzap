<?php

date_default_timezone_set('America/Sao_Paulo');

require "../includes/autoload.php";

$mensagem = new Includes\Messages\Messages($_POST['idEnterprise'],$_POST['url'],$_POST['name'],$_POST['whatsapp'],$_POST['mail'],$_POST['message']);
if($mensagem->saveMessage()==false) {
    $mensagemClient = urlencode($_POST['message']);
    $numero = $mensagem->getNumber();
    header("Location: https://api.whatsapp.com/send?phone=+55{$numero}&text={$mensagemClient}");
}
else {
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Obrigado por sua Mensagem! | PluginZap</title>
    <meta name="title" content="Painel" />
    <meta name="author" content="Wule Agência Digital" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Muli:wght@200;400;700;900&display=swap');
        body {background:#d7dbd8 no-repeat;font-family: "Muli";}
        body h1 {font-weight: 900;font-size: 20pt;}
        .barra {
            position: absolute;left: 0;top:0;width: 100vw;height: 150px;background:#009688;
        }
        .balaoWts {position: fixed;left:0;top:0;width: 100%;height: 100%;display: flex;align-items: flex-start;justify-content: center;padding:0px 0px;padding-top: 80px;}
        .janelaWts {max-width: 1200px;background: white;    box-shadow: 0 1px 1px 0 rgba(0,0,0,.06),0 2px 5px 0 rgba(0,0,0,.2);max-width: 1200px;width: 100%;}
        .ballon {
            padding: 15px 30px;
            border-radius: 0 9px 9px 9px;
            box-shadow: 0 2px 4px #aaa;
            display: inline-block;
            background: #fff;
            max-width: 50%;
            margin-right: 40px;
            margin-left: 40px;
            align-self: flex-end;
        }
        .ballon:before {
            content: "";
            position: absolute;
            border-top: 0 solid transparent;
            border-bottom: 30px solid transparent;
            border-right: 30px solid #fff;
            margin-left: -50px;
            margin-top: -15px;
        }
        .header {
            display: grid;
            grid-template-areas: "imagem nomeEmpresa" "imagem status";
            grid-template-columns: 50px 1fr;
            align-items: center;
            padding: 10px 20px;
            background: #ededed;
        }
        .header img {
            grid-area: imagem;
            height: 40px;
            width: 40px;
        }
        .header h2 {
            grid-area: nomeEmpresa;
            margin: 0px;
            padding: 0px;
        }
        .header p {
            grid-area: status;
            margin: 0px;
            padding: 0px;
        }
        .conversa {
            background: #ded6ce;
            padding: 30px;
            padding-top: 100px;
            display: flex;
            justify-content: end;
            align-items: end;
        }
        .logoPluginZap {
            position: fixed;
            bottom: 5px;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        @media(max-width: 1200px) {
            .balaoWts {padding: 15px!important;}
            .janelaWts {width: calc(100% - 30px);margin-left: -30px;}
        }
    </style>
</head>
<body>
<div class="barra"></div>
<div class="balaoWts">
    <div class="janelaWts">
        <div class="header">
            <img src="http://localhost/gerencia-zap/uploads/<?=$mensagem->getImagem()?>" alt="Empresa">
            <h2><?=$mensagem->getEnterpriseName()?></h2>
            <p>Online</p>
        </div>
        <div class="conversa">
            <div class="ballon">
                <h1>Recebemos sua mensagem!</h1>
                <p>Obrigado por entrar em contato conosco!</p>
                <p>Em breve entraremos em contato no número informado.</p>
            </div>
        </div>
    </div>
</div>
<div class="logoPluginZap"><a href="http://localhost/gerencia-zap/"><img src="http://localhost/gerencia-zap/source/images/logo.png" alt="PluginZap"></a></div>

</body>
</html>
<?php
}

?>