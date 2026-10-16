<?php
$this->load->view('includes/header-offer');
?>

<main class="jobplugin__main">
	<div class="container">
		<div class="jobplugin__main-holder">
			<span class="jobplugin__pattern default-right"></span>
			<span class="jobplugin__pattern default-left"></span>
		 
			<div class="jobplugin__container">
				<div class="row">
					<div class="jobplugin__settings-head">
						<h5 class="fs-4">Purchase Plan To View Your Pre-Approved Loan Offers</h5>
						
						<p class="jobplugin__settings-head__text">Instant Pre-Approval | Multiple NBFCs Offers | 100%
							Paperless Process</p>
					</div>
					<div class="col-12 col-md-6 col-lg-6">
						<div class="jobplugin__userbox bg-light-sky">
						 
							<h6 class="jobplugin__text-secondary fs-6">Subscription Plan</h6>
							<div class="jobplugin__settings-card bg-white">
								<header class="jobplugin__settings-card__head d-flex justify-content-start bg-white">
									<h3 class="h6"><?php
													if ($productdata['inOffer'] == 1) {
														echo '<h5 class="mb-0"><span class="text-danger"><del>&#8377; ' . formatePrice($productdata['amount']) . ' </del></span> ';
														echo '<strong class="text-success">&#8377; ' . formatePrice($productdata['offeramount']) . '/-</strong> <span>Only</span></h5>';
														$subtotal = $productdata['offeramount'];
													} else {
														echo '<h3 class="text-success">&#8377; ' . formatePrice($productdata['amount']) . '</h3>';
														$subtotal = $productdata['amount'];
													}
													?></h3>
								</header>
								<div class="jobplugin__settings-card__body">
									<?php if ($productdata['inOffer'] == 1) { ?>
										<div class="jobplugin__settings-card__subbox">
											<ul class="jobplugin__settings-card__subbox-list">
												<li>
													<strong
														class="jobplugin__settings-card__subbox-subtitle text-success"><?php echo calPercentage($productdata['amount'], $productdata['offeramount']); ?>
														OFF</strong>
												</li>
											</ul>
										</div>
									<?php } ?>
									<div class="jobplugin__settings-card__subbox">
										<ul class="jobplugin__settings-card__subbox-list">
											<li>
												<strong class="jobplugin__settings-card__subbox-subtitle"><strong>Subtotal :
													</strong><?php echo formatePriceIndia($subtotal); ?></strong>
											</li>
										</ul>
									</div>
									<div class="jobplugin__settings-card__subbox">
										<ul class="jobplugin__settings-card__subbox-list">
											<li>
												<strong class="jobplugin__settings-card__subbox-subtitle"><strong>GST (18%)
														:
													</strong><?php $gst = $subtotal * 0.18;
																echo formatePriceIndia($gst); ?></strong>
											</li>
										</ul>
									</div>
									<div class="jobplugin__settings-card__subbox">
										<ul class="jobplugin__settings-card__subbox-list">
											<li>
												<strong class="jobplugin__settings-card__subbox-subtitle"><strong>Grand
														Total :
													</strong><?php $grandtotal = $subtotal + $gst;
																echo formatePriceIndia($grandtotal); ?></strong>
											</li>
										</ul>
									</div>
									<div class="jobplugin__settings-card__subbox">
										<ul class="jobplugin__settings-card__subbox-list">
											<li>
												<strong class="jobplugin__settings-card__subbox-subtitle"><strong>Plan
														Validity : </strong>6 months</strong>
											</li>
										</ul>
									</div>
									<div class="jobplugin__settings-card__subbox">
										<ul class="jobplugin__settings-card__subbox-list">
											<li>
												<strong class="jobplugin__settings-card__subbox-subtitle"><strong>Loan
														Process Time :</strong> 72 Hours</strong>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6">
						<div class="jobplugin__userbox bg-light-sky">
						 
							<h5 class="jobplugin__text-secondary fs-6">Please Fill Basic Detail</h5>
							<?php
							if ($this->session->flashdata('danger')): ?>
								<div id="flash-message" class="alert alert-danger alert-dismissible fade show text-danger" role="alert">
									<?= $this->session->flashdata('danger'); ?>
									<?= $this->session->unset_userdata('danger'); ?>
								</div>
							<?php endif; ?>
							<?php echo form_open('pay/getfestivalpay', array('id' => 'submitForm1', 'class' => '', 'novalidate' => 'novalidate')); ?>
							<div class="jobplugin__form">
								<div class="form-group">
									<div class="jobplugin__form-row">
										<div class="jobplugin__form-field">
											<input type="text" id="fullname" name="fullname" placeholder="Full Name *"
												required data-validation-regex-regex="^[a-zA-Z ]*$"
												data-validation-regex-message="Enter valid fullname" />
										</div>
									</div>
									<div class="help-block font-small-3"></div>
								</div>

								<div class="form-group">
									<div class="jobplugin__form-row">
										<div class="jobplugin__form-field">
											<input type="text" id="mobileno" name="mobileno" placeholder="Mobile no. *"
												required minlength="10" maxlength="10" inputmode="numeric"
												data-validation-regex-regex="^[6789]\d{9}$"
												data-validation-regex-message="Enter valid mobile number" />
										</div>
									</div>
									<div class="help-block font-small-3"></div>
								</div>

								<div class="form-group">
									<div class="jobplugin__form-row">
										<div class="jobplugin__form-field">
											<input type="email" id="emailid" name="emailid" placeholder="Email Id *"
												required />
										</div>
									</div>
									<div class="help-block font-small-3"></div>
								</div>
							</div>
							<div class="jobplugin__userbox-button">
								<button type="submit" id="form-submit1"
									class="jobplugin__button large jobplugin__bg-primary hover:jobplugin__bg-secondary">Process
									to Pay</button>
							</div>
							<?php echo form_close(); ?>
							<p class="jobplugin__userbox-textinfo text-start small">By submitting the form & proceeding, you agree to the <a
									href="<?php echo site_url('terms-conditions'); ?>" target="_blank"
									class="text-dark">Terms of Use</a> and <a
									href="<?php echo site_url('privacy-policy'); ?>" target="_blank"
									class="text-dark">Privacy Policy</a> of indiafinpro.com</p>
						</div>
					</div>
					<div class=" mt-50 section-theme-9">
						<header class="section-header">
							<h4 class="text-center">Our NBFC Partners</h4>
							<p class="text-center">Your Bridge to Smarter Financial Opportunities</p>
						</header>
						<div class="jobplugin__slider jobplugin__slider--four-items">
							<?php foreach ($banklist as $row) { ?>
								<div class="jobplugin__slider-slide">
									<article class="">
										<div class="jobplugin__article-image d-flex justify-content-center jobplugin__userbox p-0">
											<a href="#"><img src="<?= base_url('assets/images/bank/' . $row->bank_image) ?>"
													alt="<?= $row->bank_name ?>" style="width: 200px;"></a>
										</div>
									</article>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</main>

<?php
$this->load->view('includes/footer-apply');
?>

<script type="text/javascript">
	$(function() {
		$('#submitForm1').on('submit', function(e) {
			$('#form-submit1').attr('disabled', true);
			$('#form-submit1').html('Processing... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>');
		});
	});
	setTimeout(function() {
		const msg = document.getElementById('flash-message');
		if (msg) {
			msg.style.transition = "opacity 0.5s ease-out";
			msg.style.opacity = 0;
			setTimeout(() => {
				msg.style.display = "none";
			}, 500); // Wait for fade out to complete before hiding
		}
	}, 5000); // Adjusted comment to match the actual delay
</script>