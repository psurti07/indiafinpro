<?php $this->load->view('customer/includes/header-apply'); ?>

<div class="subvisual-block subvisual-theme-1 bg-dark-green d-flex pt-60 pt-md-90 pt-lg-150 pb-30 text-white">
	<div class="pattern-image"><img src="<?php echo base_url('assets/images/img/pages-2.jpg'); ?>" width="1920" height="570" alt="Pattern"></div>
	<div class="container position-relative text-center">
		<div class="row">
			<div class="col-12">
				<div class="subvisual-textbox">
					<h1 class="text-dark">My Loan Applications Details</h1>
				</div>
				<nav class="breadcrumb-nav text-blue d-flex justify-content-center">
					<ul class="breadcrumb mb-0">
						<li class="breadcrumb-item">Home</li>
						<li class="breadcrumb-item">My Loan Applications History</li>
						<li class="breadcrumb-item text-green active">My Loan Applications Details</li>
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
					<?php
						switch ($appdetails->status) {
							case "5":
								echo '<div role="alert" class="alert alert-info"> Your application is reopen again for process. Please contact customer care for more details.</div>';
								break;

							case "4":
								echo '<div role="alert" class="alert alert-warning"> Your application is under query processing. Please contact customer care for more details.</div>';
								break;

							case "3":
								echo '<div role="alert" class="alert alert-danger"> Your application has been completely rejected. Please contact customer care for more details.</div>';
								break;

							case "2":
								echo '<div role="alert" class="alert alert-success"> Your application has been approved. Please contact customer care for more details.</div>';
								break;

							default:
								break;
						}
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-12 col-lg-6">
					<div class="jobs-card p-20">
						<ul class="footer-links">
							<li>Loan Date : <strong><?php echo displayDate($appdetails->rec_date); ?></strong></li>
							<li>Loan Type : <strong><?php
							if ($appdetails->loantype == 11) {
								echo 'Personal Loan';
							} else if ($appdetails->loantype == 12) {
								echo 'Business Loan';
							}
							?></strong></li>
							<li>Loan Amount : <strong><?php echo formatePriceIndia($appdetails->loanamount); ?></strong></li>
							<li>Loan Tenure : <strong><?php echo $appdetails->loantenure; ?></strong></li>
							<li>Loan Purpose : <strong><?php echo $appdetails->loanpurpose; ?></strong></li>
						</ul>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-6">
					<div class="jobs-card p-20">
						<ul class="footer-links">
							<li>CIBIL Score : <strong><?php echo $appdetails->cibilscore; ?></strong></li>
							<li>Income : <strong><?php echo formatePriceIndia($appdetails->income); ?></strong></li>
							<li>Current EMI : <strong><?php echo $appdetails->currentemi; ?></strong></li>
							<li>EMI Bounce : <strong>
								<?php
								if ($appdetails->emibounce == 0) {
									echo 'No';
								} else if ($appdetails->emibounce == 1) {
									echo 'Yes';
								} else {
									echo '-';
								} ?>
							</strong></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="jobs-card p-20">
						<table id="myDatatable" class="table table-hover dt-responsive">
							<thead>
								<tr>
									<th>Status</th>
									<th>Date</th>
									<th>Bank</th>
									<th>Remarks</th>
									<th>Details</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (count($statuslist)) {
									foreach ($statuslist as $row) {
										echo "<tr class='table-" . $row->colorclass . "'>";

										echo "<td><strong>" . htmlentities($row->statusname) . "</strong></td>";
										echo "<td>" . displayDate($row->statusdate) . ' ' . displayTime($row->rec_date) . "</td>";
										echo "<td>" . htmlentities($row->bank_name) . "</td>";
										echo "<td>" . htmlentities($row->remarks) . "</td>";

										echo "<td width='200'>";
										if ($row->loanamount > 0) {
											echo "Loan Amount - " . formatePriceIndia($row->loanamount);
										}

										if ($row->loanroi != "") {
											echo "<br/>ROI - " . htmlentities($row->loanroi);
										}

										if ($row->loanterms != "") {
											echo "<br/>Terms - " . htmlentities($row->loanterms);
										}

										if ($row->processfees > 0) {
											echo "<br/>Process Fees - " . htmlentities($row->processfees);
										}

										if ($row->insurance != "") {
											echo "<br/>Insurance - " . htmlentities($row->insurance);
										}

										if ($row->monthlyemi > 0) {
											echo "<br/>Monthly EMI - " . htmlentities($row->monthlyemi);
										}
										echo "</td>";

										echo "</tr>";
									}
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