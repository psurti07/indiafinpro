<?php
include_once (APPPATH . 'views/includes/header.php');

$barlabel1 = $bardata1 = $barlabel2 = $bardata2 = "";
if($userrole == 0 || $userrole == 1){

if (count($custlist)) {
	foreach ($custlist as $row) {
		$barlabel1 .= "'" . $row->recday . " - " . $row->recmonth . "',";
		$bardata1 .= $row->totaluser . ",";
	}
}

if (count($leadlist)) {
	foreach ($leadlist as $row) {
		$barlabel2 .= "'" . $row->recday . " - " . $row->recmonth . "',";
		$bardata2 .= $row->totaluser . ",";
	}
}
}
?>

<script type="text/javascript">
	window.onload = function () {
		document.getElementById("101").className += " active";
	}
</script>
<?php
if($userrole == 0 || $userrole == 1){
	?>

<div class="content-body">
	<section id="configuration">
		<div class="row">
			<div class="col-12">
				<?php
				if (!empty($ac_data)) {
					?>
					<div class="alert alert-<?php echo $ac_data['ac_class'] ?> fade show" role="alert">
						<h4><?php echo $ac_data['ac_title'] ?></h4>
						<p><?php echo $ac_data['ac_msg'] ?></p>
					</div>
					<?php
				}
				?>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-content collapse show">
						<h2 class="text-center pt-1">Customer Registrations</h2>

						<div class="card-body">
							<canvas id="column-chart-customer" height="300"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-content collapse show">
						<h2 class="text-center pt-1">Customer Leads</h2>

						<div class="card-body">
							<canvas id="column-chart-leads" height="300"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
</div>
<?php } ?>

<?php
include_once (APPPATH . 'views/includes/footer.php');
?>

<script type="text/javascript">
	$(document).ready(function () {
		var ctx1 = $("#column-chart-customer");
		var ctx2 = $("#column-chart-leads");

		var chartOptions = {
			elements: {
				rectangle: {
					borderWidth: 2,
					borderColor: 'rgb(0, 255, 0)',
					borderSkipped: 'bottom'
				}
			},
			responsive: true,
			maintainAspectRatio: false,
			responsiveAnimationDuration: 500,
			legend: {
				position: 'top',
			},
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						color: "#f3f3f3",
						drawTicks: false,
					},
					scaleLabel: {
						display: true,
					}
				}],
				yAxes: [{
					display: true,
					gridLines: {
						color: "#f3f3f3",
						drawTicks: false,
					},
					scaleLabel: {
						display: true,
					}
				}]
			},
		};

		// Chart Data Customer
		var chartData1 = {
			labels: [<?php echo $barlabel1; ?>],
			datasets: [{
				label: "Registrations",
				data: [<?php echo $bardata1; ?>],
				backgroundColor: "#20ca6f",
				hoverBackgroundColor: "#41d285",
				borderColor: "transparent"
			}]
		};

		var config1 = {
			type: 'bar',
			options: chartOptions,
			data: chartData1
		};

		var lineChart = new Chart(ctx1, config1);

		// Chart Data Leads
		var chartData2 = {
			labels: [<?php echo $barlabel2; ?>],
			datasets: [{
				label: "Leads",
				data: [<?php echo $bardata2; ?>],
				backgroundColor: "#343c94",
				hoverBackgroundColor: "#2c3383",
				borderColor: "transparent"
			}]
		};

		var config2 = {
			type: 'bar',
			options: chartOptions,
			data: chartData2
		};

		var lineChart = new Chart(ctx2, config2);
	});
</script>
