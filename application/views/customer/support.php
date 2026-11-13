<?php $this->load->view('customer/includes/header-apply'); ?>

<div class="subvisual-block subvisual-theme-1 bg-dark-green d-flex pt-60 pt-md-90 pt-lg-150 pb-30 text-white">
	<div class="pattern-image"><img src="<?php echo base_url('assets/images/img/pages-2.jpg'); ?>" width="1920"
			height="570" alt="Pattern"></div>
	<div class="container position-relative text-center">
		<div class="row">
			<div class="col-12">
				<div class="subvisual-textbox">
					<h1 class="cstm-font text-dark">Support</h1>
				</div>
				<nav class="breadcrumb-nav text-blue d-flex justify-content-center">
					<ul class="breadcrumb mb-0">
						<li class="breadcrumb-item">Profile</li>
						<li class="breadcrumb-item text-green active">Support</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>

<main class="main">
	<section class="section section-contact section-theme-1 pt-35 pt-md-50 pt-lg-75 pt-xl-100 pt-xxl-120 pb-35 pb-md-50 pb-lg-75 pb-xl-100 pb-xxl-120">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-12 col-md-6 mb-40 mb-md-0">
					<header class="section-header">
						<h2>Profile Details</h2>
					</header>
					<?php echo form_open('customer/support/submitrequest', array('id' => 'submitForm', 'class' => 'contac-form', 'novalidate' => 'novalidate')); ?>
						<div class="row">
							<input type="hidden" name="userid" id="userid" value="<?php echo $userid; ?>" required>
							<div class="form-group col-12 mb-15 mb-md-20">
                                  <select class="form-select" id="issuetype" name="issuetype"  required>
                                      <option value="">Query Related To *</option>
                                      <option value="Service Problem">Service Problem</option>
                                      <option value="Payment Issue">Payment Issue</option>
                                      <option value="Technical Problem">Technical Problem</option>
                                      <option value="Eligibility or Pre-Approval Query">Eligibility or Pre-Approval Query</option>
                                      <option value="GST Return Query">GST Return Query</option>
                                      <option value="Other">Other</option>
                                  </select>
                                  <div class="help-block font-small-3"></div>
                              </div>
                              <div class="form-group col-12 mb-15 mb-md-20">
                                  <textarea class="form-control" id="message" name="message" cols="30" rows="10" placeholder="Request Message *" style="height: 150px" required minlength="50"></textarea>
                                  <div class="help-block font-small-3"></div>
                              </div>
							<div class="col-12">
								<button type="submit" id="form-submit" class="btn btn-green btn-sm"><span class="btn-text">Submit Request</span></button>
							</div>
						</div>
					<?php echo form_close(); ?>
				</div>
				<div class="col-12 col-md-6 col-xl-5">
					<ul class="contact-support bg-light-sky">
						<h6><strong><?php echo COMPANY_NAME; ?></strong></h6>
						<li>
							<div class="contact-box">
								<div class="icon-holder">
									<i class="icon-phone"></i>
								</div>
								<div class="textbox">
									<h3 class="h4">Mobile No.:</h3>
									<p><?php echo COMPANY_MOBILE; ?></p>
								</div>
							</div>
						</li>
						<li>
							<div class="contact-box">
								<div class="icon-holder">
									<i class="icon-mail1"></i>
								</div>
								<div class="textbox">
									<h3 class="h4">Email Id:</h3>
									<p><?php echo COMPANY_EMAIL; ?></p>
								</div>
							</div>
						</li>
						<li>
							<div class="contact-box">
								<div class="icon-holder">
									<i class="icon-clock"></i>
								</div>
								<div class="textbox">
									<h3 class="h4">Business Hours:</h3>
									<p><?php echo COMPANY_TIMING; ?></p>
								</div>
							</div>
						</li>
						<li>
							<div class="contact-box">
								<div class="icon-holder">
									<i class="icon-map-pin"></i>
								</div>
								<div class="textbox">
									<h3 class="h4">Address:</h3>
									<address><?php echo COMPANY_ADDRESS; ?></address>
								</div>
							</div>
						</li>
						<li>
							<div class="contact-box">
								<div class="icon-holder">
									<i class="icon-handshake"></i>
								</div>
								<div class="textbox">
									<h3 class="h4">CIN No.:</h3>
									<p><?php echo COMPANY_CIN; ?></p>
								</div>
							</div>
						</li>
					</ul>
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
					}
					else {
						toastr.error(response['message']);
					}

					$('#responsemessage').html(response['message']);

					setTimeout(function () {
						location.reload();
					}, 5000);
				},
				error: function (jXHR, textStatus, errorThrown) {
					$('#form-submit').html('SUBMIT REQUEST');
					$('#form-submit').attr('disabled', false);
					toastr.error(errorThrown, 'ERROR');
				}
			});
		});
	});
</script>