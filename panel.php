<?php
$title = "Painel";
$cssFiles = "source/css/panel.css";
$page = "panel";
include("includes/head-panel.php");
$enterpriseData = $User->showEnterprises();
$pay = new \Includes\Payment\Payment;
?>

<body>
		<!--<div class="windowAll" id="addEnterprise">
			<a href="javascript:void(0)" class="closeAll">X</a>
			<div class="conteudoWindow">
				<h1>Nova Empresa</h1>
				<p></p>
				<div class="tabs">
					<a href="javascript:void(0)" class="active" data-tab="newEnterprise">Dados da Empresa</a><a href="javascript:void(0)" data-tab="newTheme">Tema</a><a href="javascript:void(0)" data-tab="newCode">Integração</a>
				</div>
				<div class="formWindow tab active" id="newEnterprise">
					<div>
						<div class="imageProfile">
							<img src="" alt="">
							<a href="javascript:void()">Alterar Imagem</a>
						</div>
						<div>
							<label for="">
								<span>* Nome da sua Empresa</span>
								<input type="text" placeholder="Nome Empresa">
							</label>
							<label for="">
								<span>* Seu Site</span>
								<input type="text" placeholder="www.example.com.br">
							</label>
							<label for="">
								<span>* WhatsApp</span>
								<input type="text" placeholder="(19) 00000-0000">
							</label>
						</div>
						<p><a href="" class="btn-primary">Próximo</a></p>
					</div>
				</div>
				<div class="tab" id="newTheme">
					<div>
						<div class="theme themeOne active">
							<img src="source/images/themeone.gif" alt="">
						</div>
						<div class="theme themeTwo">
							<img src="source/images/themetwo.gif" alt="">
						</div>
					</div>
					<p>
						<h3>Mensagem Personalizada</h3>
						<textarea name="" class="persoMsg" placeholder="" id="" cols="30" rows="2">Olá, tudo bem?
Como podemos ajudar?</textarea>
					</p>
					<p><a href="" class="btn-primary">Próximo</a></p>
				</div>
				<div class="tab" id="newCode">
					<p>Seu botão está configurado, agora só falta adicionar em seu Site.</p><br />
					<h3>Copie o código abaixo</h3>
					<div class="code">
						<pre>&lt;div id="gerenciazap" license-key="mivl8fiwvns" company="Wule"&gt;
	&lt;script src="http://192.168.0.102:3000/scripts/theme1.js"&gt;&lt;/script&gt;
&lt;/div&gt;</pre>
						<a href="" class="copyCode"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBpZD0iYm9sZCIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMjQgMjQiIGhlaWdodD0iNTEycHgiIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjUxMnB4Ij48cGF0aCBkPSJtNCA2Ljc1YzAtMi42MTkgMi4xMzEtNC43NSA0Ljc1LTQuNzVoOS4xMzNjLS4zMjktMS4xNTEtMS4zNzgtMi0yLjYzMy0yaC0xMS41Yy0xLjUxNyAwLTIuNzUgMS4yMzMtMi43NSAyLjc1djE1LjVjMCAxLjUxNyAxLjIzMyAyLjc1IDIuNzUgMi43NWguMjV6IiBmaWxsPSIjMDAwMDAwIi8+PHBhdGggZD0ibTIwLjI1IDRoLTExLjVjLTEuNTE3IDAtMi43NSAxLjIzMy0yLjc1IDIuNzV2MTQuNWMwIDEuNTE3IDEuMjMzIDIuNzUgMi43NSAyLjc1aDExLjVjMS41MTcgMCAyLjc1LTEuMjMzIDIuNzUtMi43NXYtMTQuNWMwLTEuNTE3LTEuMjMzLTIuNzUtMi43NS0yLjc1em0tMiAxN2gtNy41Yy0uNDE0IDAtLjc1LS4zMzYtLjc1LS43NXMuMzM2LS43NS43NS0uNzVoNy41Yy40MTQgMCAuNzUuMzM2Ljc1Ljc1cy0uMzM2Ljc1LS43NS43NXptMC00aC03LjVjLS40MTQgMC0uNzUtLjMzNi0uNzUtLjc1cy4zMzYtLjc1Ljc1LS43NWg3LjVjLjQxNCAwIC43NS4zMzYuNzUuNzVzLS4zMzYuNzUtLjc1Ljc1em0wLTMuNWgtNy41Yy0uNDE0IDAtLjc1LS4zMzYtLjc1LS43NXMuMzM2LS43NS43NS0uNzVoNy41Yy40MTQgMCAuNzUuMzM2Ljc1Ljc1cy0uMzM2Ljc1LS43NS43NXptMC00aC03LjVjLS40MTQgMC0uNzUtLjMzNi0uNzUtLjc1cy4zMzYtLjc1Ljc1LS43NWg3LjVjLjQxNCAwIC43NS4zMzYuNzUuNzVzLS4zMzYuNzUtLjc1Ljc1eiIgZmlsbD0iIzAwMDAwMCIvPjwvc3ZnPgo=" alt="Copiar" title="Copiar Código" /></a></div><br />
					<h2>Insira em seu Site</h2>
				</div>
			</div>
		</div>-->
		<div class="windowAll" id="addEnterprise">
			<a href="javascript:void(0)" class="closeAll">X</a>
			<div class="conteudoWindow">
				<h2>Por favor, aguarde...</h2>
				<!--<h1>Quer adicionar novas Empresas?</h1>
				<p>
					Atualmente seu Plano é o <strong>Inicial</strong>, que permite a integração de apenas uma <strong>Empresa</strong>.
				</p>
				<p class="aviso">
					Mude de Plano e adicione a quantidade de empresas que precisar.
				</p>
				<div class="plans">
					<div class="disabled">
						<h1>Iniciante</h1>
						<h2>1 Site</h2>
						<p>Desejo instalar somente em um Site.</p>
						<h2>R$15,90</h2>
						<a href="javascript:void(0)" class="btn-primary disabled">Plano Atual</a>
					</div>
					<div class="scale">
						<h1>Pro</h1>
						<h2>3 Sites</h2>
						<p>Possuo 3 sites e desejo instalar em todos.</p>
						<h2>R$39,99</h2>
						<a href="javascript:changePlan(2)" class="btn-primary">Escolher Plano</a>
					</div>
					<div>
						<h1>Enterprise</h1>
						<h2>Ilimitado</h2>
						<p>Possuo muitos sites e desejo instalar em todos.</p>
						<h2>R$69,99</h2>
						<a href="javascript:changePlan(3)" class="btn-primary">Escolher Plano</a>
					</div>
				</div>-->
			</div>
		</div>
	<?php include("includes/enterpriseDetails.php"); ?>
	<?php include("includes/panel-navbar.php"); ?>
	<div class="homeOptions">
		<!--
		<a href="#edit" class="option">
			<h2>Wule</h2>
			<p>https://wule.com.br</p>
			<span class="statusOk">Configurado!</span>
		</a>
		<a href="#edit" class="option">
			<h2>Rabelo</h2>
			<p>https://rabelo.com.br</p>
			<span class="statusPendente">Gere seu Código!</span>
		</a>
	-->
		<?php
		foreach ($enterpriseData as $enterprise) {
		?>
			<a href="javascript:void(0)" data-id="<?= $enterprise['id']; ?>" class="option">
				<h2><?= $enterprise['nome']; ?></h2>
				<p><?= $enterprise['site']; ?></p>
				<?php if ($enterprise['btn_template'] == 0) { ?>
					<span class="statusPendente">Gere seu Código!</span>
				<?php } else { ?>
					<span class="statusOk">Configurado!</span>
				<?php } ?>
			</a>
		<?php
		}
		?>
		<a href="javascript:void(0)" class="addOption">
			<p>Adicione novos Sites</p>
		</a>
	</div>
	<?php include("includes/panel-footer.php"); ?>
	<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script>
        PagSeguroDirectPayment.setSessionId('<?= $pay->getSessionId(); ?>');
    </script>