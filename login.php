<?php
$title = "Entre em sua conta";
$cssFiles = "source/css/login.css";
$description = "";
$keywords = "";
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
				<li><span>Ainda não possui conta?</span> <a href="join" class="btn-testar">Criar uma Conta</a></li>
			</ul>
		</nav>
	</div>
    <div class="fluid-container bg-comments">
        <div class="container login">
            <h1>Acesse sua Conta</h1>
            <form action="javascript:logon()" id="loginData">
                <p><input type="email" name="email" id="email" placeholder="E-mail"></p>
                <p><input type="password" name="senha" id="senha" placeholder="Senha"><a href="recover" class="recover-bt" title="Esqueci minha Senha">Esqueci</a></p>
                <p class="text-right"><button type="submit" id="logonBtn">ENTRAR</button></p>
            </form>
        </div>
    </div>
    <script src="source/js/script.js"></script>
</body>
</html>