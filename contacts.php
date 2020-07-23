<?php
$title = "Mensagens";
$cssFiles = "source/css/panel.css";
$page = "contacts";
include("includes/head-panel.php");
$enterprises = new \Includes\Enterprises\Enterprise();
?>
<body>
	<?php include("includes/panel-navbar.php"); ?>
	<div class="titleHeader">
		<h1>Contatos</h1>
		<div class="tabs">
			<a href="javascript:void(0)" class="active" data-id="contactData">Lista de Contatos</a>
			<a href="javascript:void(0)" data-id="exportContacts">Exportar Contatos</a>
		</div>
	</div>
	<div class="contentsPages">
		<div class="contentPage active" id="contactData">
			<div class="queryContent">
				<span class="query"><input type="text" placeholder="Buscar"></span>
				<ul class="filter">
                <li><a href="javascript:void(0)" class="filterBtn">Filtrar Resultados</a>
                    <ul>
                        <li>
                            <span class="title">Empresas</span>
                            <ul class="group">
                                <li><label><input type="checkbox" id="all" checked> Todas</label></li>
                                <?php
                                    $enterprises->listEnterprises();
                                ?>
                                <!--<li><label><input type="checkbox" data-id="20" checked> PluginZap</label></li>
                                <li><label><input type="checkbox" data-id="21" checked> Casas Bahia</label></li>-->
                            </ul>
                        </li>
                        <li class="apply"><a href="javascript:void(0)" id="applyFilter" class="btn-primary">Aplicar</a></li>
                    </ul>
                </li>
            </ul>
			</div>
			<table class="contatos" id="contactList">
				<thead>
					<tr>
						<td></td>
						<td>
							Nome
						</td>
						<td>
							E-mail
						</td>
						<td>
							WhatsApp
						</td>
						<td></td>
						<td></td>
					</tr>
				</thead>
				<?php
                	$enterprises->listContacts();
            	?>
				<!--<tbody>
					<tr>
						<td><img src="source/images/no-image.png" alt=""></td>
						<td>Teddy</td>
						<td>teddy@gmail.com</td>
						<td>11940043902</td>
						<td><div class="contactOptions"><a href="javascript:void(0)" class="close">fechar</a> <button class="btn-primary">Excluir</button></div></td>
					</tr>
					<tr>
						<td><img src="source/images/no-image.png" alt=""></td>
						<td>Teddy</td>
						<td>teddy@gmail.com</td>
						<td>11940043902</td>
						<td><div class="contactOptions"><a href="javascript:void(0)" class="close">fechar</a> <button class="btn-primary">Excluir</button></div></td>
					</tr>
					<tr>
						<td><img src="source/images/no-image.png" alt=""></td>
						<td>Teddy</td>
						<td>teddy@gmail.com</td>
						<td>11940043902</td>
						<td><div class="contactOptions"><a href="javascript:void(0)" class="close">fechar</a> <button class="btn-primary">Excluir</button></div></td>
					</tr>
					<tr>
						<td><img src="source/images/no-image.png" alt=""></td>
						<td>Teddy</td>
						<td>teddy@gmail.com</td>
						<td>11940043902</td>
						<td><div class="contactOptions"><a href="javascript:void(0)" class="close">fechar</a> <button class="btn-primary">Excluir</button></div></td>
					</tr>
				</tbody>-->
			</table>
		</div>

		<div class="contentPage" id="exportContacts">
			<div class="content">
				<h2>Selecione as Empresas que deseja exportar os contatos:</h2>
				<ul class="enterprisesList">
					<?php
						$enterprises->listEnterprises();
					?>
				</ul>
				<p class="text-right"><button class="btn-primary" id="exportBtn">Exportar Contatos</button></p>
			</div>
		</div>
	</div>
	<?php include("includes/panel-footer.php"); ?>