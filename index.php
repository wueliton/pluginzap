<?php
$title = "Não perca mais nenhuma";
$cssFiles = "source/css/home.css";
$description = "";
$keywords = "";
include("includes/head.php");
 ?>
<body>
	<div class="fluid-container bg-comments">
		<nav>
			<button class="toggle-nav"><img src="source/images/open-menu.svg" alt="Abrir Menu" title="Abrir Menu"></button>
			<img src="source/images/logo.png" alt="PluginZap" title="PluginZap" class="logo">
			<ul>
				<li><a href="#functionalities">Funcionalidades</a></li>
				<li><a href="#signature">Assinatura</a></li>
				<li><a href="#how-to">Integração</a></li>
				<li><a href="#support">Suporte</a></li>
				<li><a href="/blog">Blog</a></li>
				<li><a href="login">Login</a></li>
				<li><a href="join" class="btn-testar">Ganhe 1 mês para Testar</a></li>
			</ul>
		</nav>
		<div class="painel">
			<h1>Não perca nenhuma mensagem!</h1>
			<p>O <strong>PluginZap</strong> é uma ferramenta de captura de contatos completa! Não perca nenhuma mensagem enviada em seu Site, acesse sua lista de contatos e muito mais!</p>
			<a href="join" class="btn-primary">GANHE 1 MÊS PARA TESTAR</a>
		</div>
	</div>
	<section class="fluid-container complete" id="functionalities">
		<div class="container">
			<div>
				<div>
					<h1>Obtenha uma ferramenta completa!</h1>
					<p class="subtitle">Com o <strong>PluginZap</strong> você poderá acessar todas as mensagens, até mesmo as que não foram enviadas pelo WhatsApp Web, podendo responder a todas as solicitações de seus Clientes.</p>
					<p>Além disso, utilize sua lista de Contatos para realizar suas Campanhas de E-mail Marketing com o público alvo certo!</p>
					<a href="join" class="btn-primary center">GANHE 1 MÊS PARA TESTAR</a>
				</div>
			</div>
			<div>
				<img src="source/images/flat-mobile.png" alt="Obtenha uma ferramenta completa!" title="Obtenha uma ferramenta completa!">
			</div>
		</div>
	</section>
	<section class="container functionalities">
		<div>
			<img src="source/images/whatsapp-icon.svg" alt="WhatsApp Web" title="WhatsApp Web">
			<h2>WhatsApp Web</h2>
			<p>A mensagem é salva no seu perfil mesmo que o usuário não conclua o envio no WhatsApp Web</p>
		</div>
		<div>
			<img src="source/images/phonebook.svg" alt="Lista de Contatos" title="Lista de Contatos">
			<h2>Lista de Contatos</h2>
			<p>Todos os números são salvos em uma lista de contatos para você utilizar em suas Campanhas de Marketing</p>
		</div>
		<div>
			<img src="source/images/file.svg" alt="Relatório" title="Relatório">
			<h2>Relatório</h2>
			<p>Geramos um relatório informando a frequencia das mensagens e quais as páginas do seu site que atraíram mais contatos</p>
		</div>
	</section>
	<section class="container-fluid signature" id="signature">
		<div class="container">
			<h2>Assine e receba 1 mês para testar</h2>
			<p>E só pague à partir do Segundo Mês de uso! Assim você garante uma lista completa de Contatos e não perde mais nenhuma Mensagem!</p>
			<form action="javascript:void(0)" method="post" class="form" id="signature-form">
				<div><input type="text" placeholder="Seu Nome" name="nome" required></div>
				<div><input type="email" placeholder="Seu melhor E-mail" name="email" required></div>
				<div><input type="tel" placeholder="Seu WhatsApp" name="whatsapp" class="maskWhatsApp" required></div>
				<div><button type="submit" id="joinBtn">ASSINAR</button></div>
			</form>
		</div>
	</section>
	<section class="container how-to" id="how-to">
		<h2>COMO INTEGRAR?</h2>
		<p>Com apenas três passos você consegue integrar em seu Site e começar a captar novos clientes!</p>
		<div>
			<div>
				<img src="source/images/select-option.png" alt="Personalize" title="Personalize">
				<h3>Personalize</h3>
				<p>Escolha e configure um tema.</p>
			</div>
			<div>
				<img src="source/images/generate-link.png" alt="Link" title="Link">
				<h3>Link</h3>
				<p>Gere o link do seu Script.</p>
			</div>
			<div>
				<img src="source/images/add-site.png" alt="Adicione" title="Adicione">
				<h3>Adicione</h3>
				<p>Adicione o Script em seu Site.</p>
			</div>
		</div>
	</section>
	<section class="fluid-container help-us" id="support">
		<div class="container">
			<div>
				<span>
					<h2>E SE PRECISAR DE AJUDA..</h2>
					<p>É só chamar no Zap! Aqui tem GENTE disposta a te ajudar sempre!</p>
				</span>
			</div>
			<div>
				<img src="source/images/support.png" alt="É só chamar no Zap! Aqui tem GENTE disposta a te ajudar sempre!" title="É só chamar no Zap! Aqui tem GENTE disposta a te ajudar sempre!">
			</div>
		</div>
		<div>
			
		</div>
	</section>
	<section class="container signature-container">
		<h2>Assine e ganhe 1 mês para testar</h2>
		<p>Comece a receber mensagens de seus clientes agora mesmo!</p>
		<p>Cadastre-se e ganhe 1 mês gratuito para testar!</p>
		<a href="join" class="btn-primary center">GANHE 1 MÊS PARA TESTAR</a>
	</section>
	<footer class="fluid-container">
		<div class="container link-footer">
			<div>
				<img src="source/images/logo.png" alt="">
			</div>
			<div class="links-map">
				<a href="#functionalities">Funcionalidades</a> <a href="join">Assinatura</a> <a href="#how-to">Integração</a> <a href="#support">Suporte</a> <a href="#">Login</a> <a href="#">Cadastre-se</a> <a href="blog/">Blog</a>
			</div>
		</div>
		<div class="container copyright">
			Copyright @ 2020 - Todos os Direitos Reservados - Agência Digital Wule
		</div>
	</footer>
	<script src="source/js/script.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-019V70SFVV"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-019V70SFVV');
	</script>
	<script src="https://www.pluginzap.com/application/application.php?code=VGVtYToyfElkRW50ZXJwcmlzZTo1"></script>
</body>
</html>