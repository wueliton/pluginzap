<?php
$title = "Cadastre-se";
$cssFiles = "source/css/login.css";
include("includes/head.php");

$verifyLogin = new Includes\Users\User();
$verifyLogin->verifySession();
 ?>
<body>
    <div class="fluid-container bg-comments">
		<nav>
			<button class="toggle-nav"><img src="source/images/open-menu.svg" alt="Abrir Menu" title="Abrir Menu"></button>
			<a href="index"><img src="source/images/logo.png" alt="GerenciaZap" title="GerenciaZap" class="logo"></a>
			<ul>
				<li><span>Já possui uma conta?</span> <a href="login" class="btn-testar">Faça login</a></li>
			</ul>
		</nav>
	</div>
    <div class="fluid-container bg-comments">
        <div class="container login">
            <h1>Crie sua Conta</h1>
            <p>Cadastre-se e ganhe <strong>1 mês gratuito</strong> para testar!</p><br/>
            <form action="javascript:createAccount()" id="join">
                <p><input type="text" name="nome" id="nome" placeholder="Seu Nome" required></p>
                <p><input type="email" name="email" id="emailJoin" placeholder="Seu melhor E-mail" required></p>
                <p><input type="text" name="whatsapp" id="whatsapp" placeholder="Seu WhatsApp" class="maskWhatsApp" required></p>
                <p class="text-right"><button id="joinBtn">CADASTRAR</button></p>
            </form>
        </div>
    </div>
    <div class="windowAll" id="emailConfirm">
        <div class="conteudoWindow">
            <h1>Confirme sua conta</h1>
            <p>Enviamos um e-mail para <strong id="emailAccount">{email}</strong>, clique no botão de confirmar sua conta para finalizar o seu cadastro.</p>
            <span class="aviso">O código de confirmação é válido por até 3 horas.</span>
        </div>
    </div>
    <script src="source/js/script.js"></script>
</body>
</html>