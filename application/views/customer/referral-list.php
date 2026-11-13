<?php $this->load->view('customer/includes/header-apply'); ?>

<div class="subvisual-block subvisual-theme-1 bg-dark-green d-flex pt-60 pt-md-90 pt-lg-150 pb-30 text-white">
	<div class="pattern-image"><img src="<?php echo base_url('assets/images/img/pages-2.jpg'); ?>" width="1920" height="570" alt="Pattern"></div>
	<div class="container position-relative text-center">
		<div class="row">
			<div class="col-12">
				<div class="subvisual-textbox">
					<h1 class="text-dark">My Customers</h1>
				</div>
				<nav class="breadcrumb-nav text-blue d-flex justify-content-center">
					<ul class="breadcrumb mb-0">
						<li class="breadcrumb-item">Customers</li>
						<li class="breadcrumb-item text-green active">My Customers</li>
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
									<th>Registration</th>
									<th>Name</th>
									<th>Mobile</th>
									<th>Email Id</th>
									<th>City</th>
									<th>Payout</th>
									<th>Pay Date</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$cnt = 1;
								foreach ($refuserlist as $row) {
									echo "<tr>";
									echo "<td>" . $cnt . "</td>";
									echo "<td>" . displayDate($row->rec_date) . "</td>";
									echo "<td class='text-capitalize'>" . htmlentities($row->fullname) . "</td>";
									echo "<td>" . htmlentities($row->mobile) . "</td>";
									echo "<td>" . htmlentities($row->email) . "</td>";
									echo "<td>" . htmlentities($row->city) . "</td>";

									if ($row->payout == 1) {
										echo "<td class='text-success'>Approved</td>";
									} else if ($row->payout == 2) {
										echo "<td class='text-danger'>Rejected</td>";
									} else if ($row->payout == 3) {
										echo "<td class='text-info'>Pending</td>";
									} else if ($row->payout == 4) {
										echo "<td class='text-warning'>Hold</td>";
									} else {
										echo "<td>-</td>";
									}

									echo "<td>";
									if ($row->payout_date != NULL) {
										echo displayDate($row->payout_date);
									}
									echo "</td>";

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