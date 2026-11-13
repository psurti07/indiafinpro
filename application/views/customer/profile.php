<?php $this->load->view('customer/includes/header-apply'); ?>

<div class="subvisual-block subvisual-theme-1 bg-dark-green d-flex pt-60 pt-md-90 pt-lg-150 pb-30 text-white">
	<div class="pattern-image"><img src="<?php echo base_url('assets/images/img/pages-2.jpg'); ?>" width="1920"
			height="570" alt="Pattern"></div>
	<div class="container position-relative text-center">
		<div class="row">
			<div class="col-12">
				<div class="subvisual-textbox">
					<h1 class="cstm-font text-dark">My Profile</h1>
				</div>
				<nav class="breadcrumb-nav text-blue d-flex justify-content-center">
					<ul class="breadcrumb mb-0">
						<li class="breadcrumb-item">Profile</li>
						<li class="breadcrumb-item text-green active">My Profile</li>
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
				<div class="col-md-6 pt-35 pt-md-0">
					<div class="form-condidates">
						<div class="company-info-head">
							<div class="textbox">
								<h4>Profile Details</h4>
								<p>Registration On - <?php echo displayDate($profiledata->rec_date); ?></p>
								<p>Mobile No - <?php echo $profiledata->mobile; ?></p>
							</div>
						</div>
						<div class="company-info-job">
							<?php echo form_open('customer/profile/changeprofile', array('id' => 'submitForm1', 'class' => 'contac-form', 'novalidate' => 'novalidate')); ?>
							<div class="row">
								<input type="hidden" name="customerid" id="customerid"
									value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
								<div class="form-group col-12 mb-15">
									<input class="form-control" type="text" id="fullname" name="fullname"
										placeholder="Full Name" value="<?php echo $profiledata->fullname; ?>" required>
									<div class="help-block font-small-3"></div>
								</div>
								<div class="form-group col-12 mb-15">
									<input class="form-control" type="email" id="emailid" name="emailid"
										placeholder="Email Id *" value="<?php echo $profiledata->email; ?>" required>
									<div class="help-block font-small-3"></div>
								</div>
								<div class="form-group col-12 mb-15">
									<input class="form-control" type="text" id="city" name="city" placeholder="City *"
										aria-invalid="false" value="<?php echo $profiledata->city; ?>" required>
									<div class="help-block font-small-3"></div>
								</div>
								<div class="form-group col-12 mb-15">
									<select class="form-control form-select" id="state" name="state" aria-required="true" required>
										<option value="">State</option>
										<?php echo getStateOption($profiledata->state); ?>
									</select>
									<div class="help-block font-small-3"></div>
								</div>
								<div class="col-12 pt-10">
									<button type="submit" id="form-submit1" class="btn btn-green btn-sm"><span class="btn-text">CHANGE</span></button>
								</div>
							</div>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
				<div class="col-md-6 pt-35 pt-md-0">
					<div class="form-condidates">
						<div class="company-info-head">
							<div class="textbox">
								<h4>Change Password</h4>
							</div>
						</div>
						<div class="company-info-job">
							<?php echo form_open('customer/profile/changepassword', array('id' => 'submitForm', 'class' => 'contac-form', 'novalidate' => 'novalidate')); ?>
							<div class="row">
								<input type="hidden" name="customerid" id="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
								<div class="form-group col-12 mt-15 mb-15">
									<input class="form-control" type="password" id="password" name="password"
										placeholder="New Password *" required>
									<div class="help-block font-small-3"></div>
								</div>
								<div class="form-group col-12 mb-15">
									<input class="form-control" type="password" id="retypepassword" name="retypepassword"
										placeholder="Retype Password *" required>
									<div class="help-block font-small-3"></div>
								</div>
								<div class="col-12 pt-10">
									<button type="submit" id="form-submit" class="btn btn-green btn-sm"><span class="btn-text">CHANGE</span></button>
								</div>
							</div>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php $this->load->view('customer/includes/footer-apply'); ?>

<script type="text/javascript">
	$(function () {
		$('#submitForm').on('submit', function (e) {
			e.preventDefault();
			$.ajax({
				url: $(this).attr('action') || window.location.pathname,
				type: "POST",
				data: $(this).serialize(),
				dataType: "JSON",
				cache: false,
				processData: false,
				beforeSend: function () {
					$('#form-submit').html('SUBMITTING... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>');
					$('#form-submit').attr('disabled', true);
				},
				success: function (response) {
					if (response['success'] == true) {
						toastr.success(response['message']);
						setTimeout(function () {
							location.reload();
						}, 2000);
					}
					else {
						toastr.error(response['message']);
					}
					$('#form-submit').html('CHANGE');
					$('#form-submit').attr('disabled', false);
				},
				error: function (jXHR, textStatus, errorThrown) {
					toastr.error(errorThrown, 'ERROR');
					$('#form-submit').html('CHANGE');
					$('#form-submit').attr('disabled', false);
				}
			});
		});


		$('#submitForm1').on('submit', function (e) {
			e.preventDefault();
			$.ajax({
				url: $(this).attr('action') || window.location.pathname,
				type: "POST",
				data: $(this).serialize(),
				dataType: "JSON",
				cache: false,
				processData: false,
				beforeSend: function () {
					$('#form-submit1').html('SUBMITTING... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>');
					$('#form-submit1').attr('disabled', true);
				},
				success: function (response) {
					if (response['success'] == true) {
						toastr.success(response['message']);
						setTimeout(function () {
							location.reload();
						}, 2000);
					}
					else {
						toastr.error(response['message']);
					}
					$('#form-submit1').html('CHANGE');
					$('#form-submit1').attr('disabled', false);
				},
				error: function (jXHR, textStatus, errorThrown) {
					toastr.error(errorThrown, 'ERROR');
					$('#form-submit1').html('CHANGE');
					$('#form-submit1').attr('disabled', false);
				}
			});
		});
	});
</script>