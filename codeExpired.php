<?php
$title = "Solicitar novo Código";
$cssFiles = "source/css/getstart.css";
include("includes/head.php");
$pay = new \Includes\Payment\Payment; ?>
<body>
    <div class="fluid-container header">
        <img src="source/images/logo.png" alt="GerenciaZap" title="GerenciaZap" class="logo">
    </div>
    <div class="container">
        <h1>Link Expirado</h1>
        <p>O link utilizado <strong>Expirou</strong>, solicite um novo link preenchendo o formulário abaixo:</p><br/>
        <form action="javascript:newVerificationCode()" id="newVerificationCode">
            <label for="emailNewToken">
            <span>Email de cadastro</span>
            <input type="email" name="emailNewToken" id="emailNewToken" required>
            </label>
            <input type="text" name="tokenValidate" value="<?=$fullkey?>" hidden>
            <p class="text-right"><button class="btn-primary" id="newTokenBtn">Solicitar novo Código</button></p>
        </form>
    </div>
    <div class="windowAll" id="emailConfirm">
        <div class="conteudoWindow">
            <h1>Confirme sua conta</h1>
            <p>Enviamos um e-mail para <strong id="emailAccount">{email}</strong>, clique no botão de confirmar sua conta para finalizar o seu cadastro.</p>
            <span class="aviso">O código de confirmação é válido por até 3 horas.</span>
        </div>
    </div>
    <script src="source/js/script.js"></script>
    <script src="source/js/croppie.js"></script>
</body>
</html>