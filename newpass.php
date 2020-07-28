<?php
$title = "Vamos começar";
$cssFiles = "source/css/getstart.css";
$description = "";
$keywords = "";
include("includes/head.php");

if(isset($_GET)) {
    $verifyLogin = new Includes\Users\User();
    $verifyLogin->verifySession();

    $codeVerification = new Includes\Verification\Code(array_key_first($_GET));
    $case = $codeVerification->validateKey();

    if($case == 6) {
?>
<body>
    <div class="fluid-container header">
        <img src="source/images/logo.png" alt="GerenciaZap" title="GerenciaZap" class="logo">
    </div>
    <div class="container tabs">
        <h1>Recuperação de Senha</h1>
        <form action="javascript:changePass();" id="personalData">
            <div class="passwordRg">
                <div>
                    <p>E-mail de login: <strong><?=$codeVerification->getEmail();?></strong></p>
                </div>
                <div>
                    <label for="senha">
                        <span>* Nova Senha</span>
                        <input type="password" name="password" placeholder="Sua Senha" id="senha" required>
                    </label>
                </div>
                <div>
                    <label for="senhaConfirm">
                        <span>* Repita a Nova Senha</span>
                        <input type="password" name="passwordConfirm" placeholder="Confirmação de Senha" id="senhaConfirm" required>
                    </label>
                </div>
                <input type="text" name="id" value="<?=$codeVerification->getId();?>" hidden>
                <input type="text" name="email" value="<?=$codeVerification->getEmail();?>" hidden>
            </div>
            <p class="text-right"><button class="btn-primary" type="submit" id="btnPersonalData">Próximo</button></p>
        </form>
    </div>
    <script src="source/js/script.js"></script>
</body>
<?php
    }
    else {
        header('Location: login');
    }
}
else {
    header('Location: login');
}
?>
</html>