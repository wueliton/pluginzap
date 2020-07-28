<?php
$title = "Painel";
$cssFiles = "source/css/panel.css";
$page = "panel";
$description = "";
$keywords = "";
include("includes/head-panel.php");
$enterpriseData = $User->showEnterprises();
$pay = new \Includes\Payment\Payment;
?>

<body>
		<div class="windowAll" id="addEnterprise">
			<a href="javascript:void(0)" class="closeAll">X</a>
			<div class="conteudoWindow">
				<h2>Por favor, aguarde...</h2>
			</div>
		</div>
	<?php include("includes/enterpriseDetails.php"); ?>
	<?php include("includes/panel-navbar.php"); ?>
	<div class="homeOptions">
		<?php
		if(isset($enterpriseData) && !empty($enterpriseData)) {
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