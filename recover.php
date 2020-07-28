<?php
$title = "Recuperar Senha";
$cssFiles = "source/css/login.css";
include("includes/head.php");

$verifyLogin = new Includes\Users\User();
$verifyLogin->verifySession("login");
?>
<body>
    <div class="fluid-container bg-comments">
		<nav>
			<button class="toggle-nav"><img src="source/images/open-menu.svg" alt="Abrir Menu" title="Abrir Menu"></button>
			<a href="index"><img src="source/images/logo.png" alt="GerenciaZap" title="GerenciaZap" class="logo"></a>
			<ul>
				<li><span>Já possui uma conta?</span> <a href="login" class="btn-testar">Entrar</a></li>
			</ul>
		</nav>
	</div>
    <div class="fluid-container bg-comments">
        <div class="container login">
            <h1>Recuperar Senha</h1>
            <form action="javascript:recoverPass()" id="recoverPass">
                <p><input type="email" name="email" id="email" placeholder="E-mail" required></p>
                <p class="text-right"><button>RECUPERAR SENHA</button></p>
            </form>
        </div>
    </div>
    <div class="windowAll" id="emailConfirm">
        <div class="conteudoWindow">
            <h1>Cadastre uma nova Senha</h1>
            <p>Enviamos um e-mail para <strong id="emailAccount">{email}</strong>, siga as instruções do e-mail para cadastrar uma nova senha de acesso à sua Conta.</p><br/>
            <span class="aviso">O código de confirmação é válido por até 3 horas.</span>
        </div>
    </div>
    <script src="source/js/script.js"></script>
</body>
</html>