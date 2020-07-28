    <div class="windowAll" id="enterpriseDetails">
		<a href="javascript:void(0)" class="closeAll">X</a>
		<div class="conteudoWindow">
			<h1>Wule</h1>
			<p></p>
			<div class="tabs">
				<a href="javascript:void(0)" class="active" data-tab="dadosEmpresa">Dados da Empresa</a>
				<a href="javascript:void(0)" data-tab="themeSelect">Tema</a>
				<a href="javascript:void(0)" data-tab="copyPaste">Integração</a>
			</div>
			<div class="formWindow tab active" id="dadosEmpresa">
				<form action="javascript:changeEnterpriseData()" id="changeEnterpriseData">
                	<div>
						<div class="imageProfile">
							<img src="" alt="">
							<div class="preview-pane">
								
							</div>
							<a href="javascript:void(0)">Alterar Imagem</a>
							<input type="file" name="image" id="image_upload" hidden>
							<input type="text" name="imageName" hidden>
						</div>
						<div>
							<label for="">
								<span>* Nome da sua Empresa</span>
								<input type="text" placeholder="Nome Empresa" name="nome">
							</label>
							<label for="">
								<span>* Seu Site</span>
								<input type="text" name="site" placeholder="www.example.com.br">
							</label>
							<label for="">
								<span>* WhatsApp</span>
								<input type="text" placeholder="(19) 00000-0000" class="maskWhatsApp" name="whatsapp">
							</label>
						</div>
						<input type="text" name="id" id="enterpriseId" hidden>
					</div>
				</form>
                <p class="text-right"><a href="javascript:updateEnterpriseData();" id="saveEnterpriseData" class="btn-primary">Salvar</a> <button class="btn-primary danger">Remover Empresa</button></p>
			</div>
			<div class="tab" id="themeSelect">
				<div>
					<div class="theme themeOne active" id="theme1">
						<img src="source/images/themeone.gif" alt="">
					</div>
					<div class="theme themeTwo" id="theme2">
						<img src="source/images/themetwo.gif" alt="">
					</div>
				</div>
				<div id="messagePers">
					<h3>Mensagem Personalizada</h3>
					<p class="aviso">Este tema permite utilizar uma Mensagem Personalizada, digite abaixo:</p>
					<textarea name="mensagem" class="persoMsg" placeholder="" id="" cols="30" rows="2">Olá, tudo bem?
Como podemos ajudar?</textarea>
				</div>
				<p class="text-right"><a href="javascript:saveTheme()" class="btn-primary">Gerar Código de Integração</a></p>
			</div>
			<div class="tab" id="copyPaste">
				<p>Seu botão está configurado, agora só falta adicionar o código abaixo em todas as páginas que você deseja que o botão apareça.</p><br/>
				<h3>Copie o código abaixo e insira em seu Site</h3>
				<div class="code">
				<pre id="codeUrl"></pre>
				</div><br/>
				<div class="question">
				Não sabe como inserir em seu site?<br/>
				<a href="/blog/como-adicionar-pluginzap-site" target="_blank">Veja como inserir em seu Site</a><br/>
				ou entre em contato com nosso suporte.
				</div><br/>
				<p class="aviso">Seu código de integração não muda, após inserir em seu site, você não precisará mais alterá-lo.</p><br/>
			</div>
		</div>
	</div>