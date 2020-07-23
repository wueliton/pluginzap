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
								<input type="text" placeholder="(19) 00000-0000" name="whatsapp">
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
				<h3>Copie o código abaixo</h3>
				<div class="code">
				<pre id="codeUrl"></pre>
				<a href="" class="copyCode"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBpZD0iYm9sZCIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMjQgMjQiIGhlaWdodD0iNTEycHgiIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjUxMnB4Ij48cGF0aCBkPSJtNCA2Ljc1YzAtMi42MTkgMi4xMzEtNC43NSA0Ljc1LTQuNzVoOS4xMzNjLS4zMjktMS4xNTEtMS4zNzgtMi0yLjYzMy0yaC0xMS41Yy0xLjUxNyAwLTIuNzUgMS4yMzMtMi43NSAyLjc1djE1LjVjMCAxLjUxNyAxLjIzMyAyLjc1IDIuNzUgMi43NWguMjV6IiBmaWxsPSIjMDAwMDAwIi8+PHBhdGggZD0ibTIwLjI1IDRoLTExLjVjLTEuNTE3IDAtMi43NSAxLjIzMy0yLjc1IDIuNzV2MTQuNWMwIDEuNTE3IDEuMjMzIDIuNzUgMi43NSAyLjc1aDExLjVjMS41MTcgMCAyLjc1LTEuMjMzIDIuNzUtMi43NXYtMTQuNWMwLTEuNTE3LTEuMjMzLTIuNzUtMi43NS0yLjc1em0tMiAxN2gtNy41Yy0uNDE0IDAtLjc1LS4zMzYtLjc1LS43NXMuMzM2LS43NS43NS0uNzVoNy41Yy40MTQgMCAuNzUuMzM2Ljc1Ljc1cy0uMzM2Ljc1LS43NS43NXptMC00aC03LjVjLS40MTQgMC0uNzUtLjMzNi0uNzUtLjc1cy4zMzYtLjc1Ljc1LS43NWg3LjVjLjQxNCAwIC43NS4zMzYuNzUuNzVzLS4zMzYuNzUtLjc1Ljc1em0wLTMuNWgtNy41Yy0uNDE0IDAtLjc1LS4zMzYtLjc1LS43NXMuMzM2LS43NS43NS0uNzVoNy41Yy40MTQgMCAuNzUuMzM2Ljc1Ljc1cy0uMzM2Ljc1LS43NS43NXptMC00aC03LjVjLS40MTQgMC0uNzUtLjMzNi0uNzUtLjc1cy4zMzYtLjc1Ljc1LS43NWg3LjVjLjQxNCAwIC43NS4zMzYuNzUuNzVzLS4zMzYuNzUtLjc1Ljc1eiIgZmlsbD0iIzAwMDAwMCIvPjwvc3ZnPgo=" alt="Copiar" title="Copiar Código" /></a></div><br/>
				<p class="aviso">Seu código de integração não muda, após inserir em seu site, você não precisará mais alterá-lo.</p><br/><br/>
				<h2>Insira em seu Site</h2>
			</div>
		</div>
	</div>