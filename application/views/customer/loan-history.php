<?php $this->load->view('customer/includes/header-apply'); ?>

<div class="subvisual-block subvisual-theme-1 bg-dark-green d-flex pt-60 pt-md-90 pt-lg-150 pb-30 text-white">
	<div class="pattern-image"><img src="<?php echo base_url('assets/images/img/pages-2.jpg'); ?>" width="1920" height="570" alt="Pattern"></div>
	<div class="container position-relative text-center">
		<div class="row">
			<div class="col-12">
				<div class="subvisual-textbox">
					<h1 class="text-dark">My Loan Applications History</h1>
				</div>
				<nav class="breadcrumb-nav text-blue d-flex justify-content-center">
					<ul class="breadcrumb mb-0">
						<li class="breadcrumb-item">My Loan</li>
						<li class="breadcrumb-item text-green active">My Loan Applications History</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>

<main class="main">
	<section class="section section-theme-9 mt-50 mb-50">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="jobs-card p-20">
						<table id="myDatatable" class="table table-hover dt-responsive">
							<thead>
								<tr>
									<th>#</th>
									<th>Date</th>
									<th>Loan Type</th>
									<th>Amount</th>
									<th>CIBIL Score</th>
									<th>Loan Purpose</th>
									<th>Tenure</th>
									<th>Details</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$cnt = 1;
								foreach ($loanhistory as $row) {
									echo "<tr>";
									echo "<td>" . $cnt . "</td>";
									echo "<td>" . displayDate($row->rec_date) . "</td>";

									if ($row->loantype == 11) {
										echo "<td>Personal Loan</td>";
									} else if ($row->loantype == 12) {
										echo "<td>Business Loan</td>";
									} else {
										echo "<td>-</td>";
									}
									$enc_id = '';
									$enc_id = stringCrypt($row->id, 'encrypt');
									echo "<td>" . formatePriceIndia($row->loanamount) . "</td>";
									echo "<td>" . htmlentities($row->cibilscore) . "</td>";
									echo "<td>" . htmlentities($row->loanpurpose) . "</td>";
									echo "<td>" . htmlentities($row->loantenure) . "</td>";

									echo "<td class='text-center' width='50'>" . anchor("customer/loan/appdetails/{$enc_id}", '<i class="fa-solid fa-info-circle"></i>', 'class="btn btn-circle btn-soft-primary"') . "</td>";

									echo "</tr>";
									$cnt++;
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php echo link_tag('assets/css/plugins/bootstrap.min.css'); ?>
<?php $this->load->view('customer/includes/footer-apply'); ?>

<script>
	$(document).ready(function () {
		$('#myDatatable').DataTable({
			dom: 'Bfrtip',
			responsive: true,
			buttons: [
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5'
			]
		});
	});
</script>