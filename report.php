<?php
$title = "Mensagens";
$cssFiles = "source/css/panel.css";
$page = "report";
include("includes/head-panel.php");
$enterprises = new \Includes\Enterprises\Enterprise();
?>
<body>
	<?php include("includes/panel-navbar.php"); ?>
	<div class="titleHeader">
		<h1>Relatórios</h1>
		<div class="tabs">
			<a href="javascript:void(0)" class="active" data-id="allReports">Este Mês</a>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
	<div id="allReports">
		<div class="contentPage active chart">
			<?php
				$allData = $enterprises->generateReport();
				$labels = array();
				$allResult = array();

				foreach($allData as $key=>$enterprise) {
					$labels[] = "'".$key."'";
					$allResult[$key] = 0;
					foreach($enterprise as $data) {
						$allResult[$key] = $allResult[$key]+$data['contagem'];
					}
				}

				$allResultData = implode(",",$allResult);
				$sumAll = array_sum($allResult);
				$labels = implode(",",$labels);
			?>
			<div>
				<div class="graph"><canvas id="myChart"></canvas></div>
			</div>
			<div>
				<h2><?=$sumAll?></h2>
				<p>Mensagens Recebidas</p>
				<h2>250</h2>
				<p>Contatos</p>
			</div>
		</div>
		<?php
			foreach($allData as $key=>$enterprise) {
				if($allResult[$key] > 0) {
					$labelsGraph = array();
					$page = array();
					$nameChart = str_replace(" ","",$key);
	?>
		<div class="contentPage active">
			<div class="list">
				<h2><?=$key?></h2>
				<div class="graph"><canvas id="<?=$nameChart?>Chart" height="100"></canvas></div>
			</div>
				<table class="reportTable">
					<tbody>
						<?php
							foreach($enterprise as $data) {
								$labelsGraph[] = $data['contagem'];
								$page[] = "'".substr($data['url'],strrpos($data['url'],"/"),strlen($data['url']))."'";
						?>
						<tr>
							<td><a href="<?=$data['url']?>" target="_blank"><?=substr($data['url'],strrpos($data['url'],"/"),strlen($data['url']))?></a></td>
							<td><?=$data['contagem']?> mensagens</td>
						</tr>
						<?php
							}
							$labelsGraph = array_slice($labelsGraph, 0, 3);
							$labelsGraph = implode(",",$labelsGraph);
							$page = array_slice($page,0,3);
							$page = implode(",",$page);
						?>
					</tbody>
				</table>
				<script>
					var ctx = document.getElementById('<?=$nameChart?>Chart').getContext('2d');
						window.myBar = new Chart(ctx, {
							type: 'bar',
							data: {
								labels: [<?=$page?>],
								datasets: [{
									label: 'Mensagens Recebidas',
									data: [<?=$labelsGraph?>],
									backgroundColor: [
										'rgba(52, 152, 219,1.0)',
										'rgba(26, 188, 156,1.0)',
										'rgba(232, 65, 24,1.0)',
										'rgba(155, 89, 182,1.0)',
										'rgba(52, 73, 94,1.0)',
										'rgba(241, 196, 15,1.0)',
										'rgba(230, 126, 34,1.0)',
										'rgba(231, 76, 60,1.0)',
										'rgba(72, 126, 176,1.0)',
										'rgba(53, 59, 72,1.0)',
									]
								}]
							},
							options: {
								responsive: true,
								fullWidth: true
							}
						});
				</script>
		</div>
	<?php
				}
			}

		?>
	</div>
	<script>
		var ctx = document.getElementById('myChart').getContext('2d');

		window.onload = function() {
			window.myBar = new Chart(ctx, {
				type: 'doughnut',
				data: {
					labels: [<?=$labels?>],
					datasets: [{
						label: 'Mensagens Recebidas (jul)',
						data: [<?=$allResultData?>],
						backgroundColor: [
							'rgba(26, 188, 156,1.0)',
							'rgba(52, 152, 219,1.0)',
							'rgba(155, 89, 182,1.0)',
							'rgba(52, 73, 94,1.0)',
							'rgba(241, 196, 15,1.0)',
							'rgba(230, 126, 34,1.0)',
							'rgba(231, 76, 60,1.0)',
							'rgba(72, 126, 176,1.0)',
							'rgba(232, 65, 24,1.0)',
							'rgba(53, 59, 72,1.0)',
						]
					}]
				},
				options: {
					responsive: true,
					fullWidth: true
				}
			});
		}
	</script>
	<?php include("includes/panel-footer.php"); ?>