<?php
$this->load->view('includes/header-offer');
?>

<main class="jobplugin__main">
	<div class="container">
		<div class="jobplugin__main-holder bg-light-sky">
			<span class="jobplugin__pattern default-right"></span>
			<span class="jobplugin__pattern default-left"></span>
			<div class="jobplugin__visual-pattern">
				<img src="<?php echo base_url('assets/images/visual-pattern.png'); ?>" alt="Image Description">
			</div>
			<div class="jobplugin__container">
				<div class="row">
					<div class="jobplugin__settings-head">
						<h2 class="h5">Purchase Plan To View Your Pre-Approved Loan Offers</h2>
						<span class="jobplugin__settings-head__bar jobplugin__bg-primary"></span>
						<p class="jobplugin__settings-head__text">Instant Pre-Approval | Multiple NBFCs Offers | 100%
							Paperless Process</p>
					</div>
					<div class="col-12 col-md-6 col-lg-6">
						<div class="jobplugin__userbox">
							<span class="jobplugin__userbox-bar jobplugin__bg-primary"></span>
							<h1 class="jobplugin__text-secondary h3">Standard Subscription Plan</h1>
							<div class="jobplugin__settings-card">
								<header class="jobplugin__settings-card__head d-flex justify-content-center">
									<h3 class="h6"><?php
													if ($productdata['inOffer'] == 1) {
														echo '<h3><span class="text-danger"><del>&#8377; ' . formatePrice($productdata['amount']) . ' </del></span> ';
														echo '<strong class="text-success">&#8377; ' . formatePrice($productdata['offeramount']) . '/-</strong> <span>Only</span></h3>';
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
						<div class="jobplugin__userbox">
							<span class="jobplugin__userbox-bar jobplugin__bg-primary"></span>
							<h1 class="jobplugin__text-secondary h3">Please Fill Basic Detail</h1>
							<?php
							if ($this->session->flashdata('danger')): ?>
								<div id="flash-message" class="alert alert-danger alert-dismissible fade show text-danger" role="alert">
									<?= $this->session->flashdata('danger'); ?>
									<?= $this->session->unset_userdata('danger'); ?>
								</div>
							<?php endif; ?>
							<?php echo form_open('pay/getfestivaloffer', array('id' => 'submitForm1', 'class' => '', 'novalidate' => 'novalidate')); ?>
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
							<p class="jobplugin__userbox-textinfo">By submitting the form & proceeding, you agree to the <a
									href="<?php echo site_url('terms-conditions'); ?>" target="_blank"
									class="text-dark">Terms of Use</a> and <a
									href="<?php echo site_url('privacy-policy'); ?>" target="_blank"
									class="text-dark">Privacy Policy</a> of indiafinpro.com</p>
						</div>
					</div>
					<div class="jobplugin__container mt-50">
						<header class="jobplugin__section-header">
							<h2 class="jobplugin__text-secondary h3">Partnered With Leading NBFCs</h2>
						</header>
						<div class="jobplugin__slider jobplugin__slider--four-items">
							<?php foreach ($banklist as $row) { ?>
								<div class="jobplugin__slider-slide">
									<article class="">
										<div class="jobplugin__article-image d-flex justify-content-center">
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

	<section class="section section-theme-9 featured_Jobs_Block">
		<div class="container">
			<div class="client_testimonials">
				<header class="section-header">
					<p>Here Is What Our Clients Have To Say About Us</p>
					<h2>Clients Testimonial</h2>
				</header>
				<div class="client_testimonials_slider">
					<div>
						<div class="client_review">
							<div class="heading_bar">
								<div class="text_wrap">
									<strong class="h5">Satyajeet Singh</strong>
								</div>
								<div class="img_wrap">
									<img src="<?php echo base_url('assets/images/customers/placeholder.jpg'); ?>" alt="img">
								</div>
							</div>
							<div class="stars_bar">
								<div class="stars_wrap">
									<i class="icon icon-star"></i>
									<i class="icon icon-star"></i>
									<i class="icon icon-star"></i>
									<i class="icon icon-star"></i>
									<i class="icon icon-star"></i>
								</div>
							</div>
							<p>I am extremely satisfied with the indiafinpro team's services. They took care of all of my financial needs and provided me with unbiased, timely assistance. Thank you so much, guys. Keep it up!!</p>
						</div>
					</div>
					<div>
						<div class="client_review">
							<div class="heading_bar">
								<div class="text_wrap">
									<strong class="h5">Nikhil Kumar</strong>
								</div>
								<div class="img_wrap">
									<img src="<?php echo base_url('assets/images/customers/placeholder.jpg'); ?>" alt="img">
								</div>
							</div>
							<div class="stars_bar">
								<div class="stars_wrap">
									<i class="icon icon-star"></i>
									<i class="icon icon-star"></i>
									<i class="icon icon-star"></i>
									<i class="icon icon-star"></i>
									<i class="icon icon-star"></i>
								</div>
							</div>
							<p>I am glad I decided to purchase indiafinpro's subscription plan when I was in need of a loan. The process is completely online and extremely simple. The team was knowledgeable and friendly. They assisted me perfectly at each and every stage of my process. Overall, it was an amazing experience.</p>
						</div>
					</div>
					<div>
						<div class="client_review">
							<div class="heading_bar">
								<div class="text_wrap">
									<strong class="h5">Mohammed Iqbal</strong>
								</div>
								<div class="img_wrap">
									<img src="<?php echo base_url('assets/images/customers/placeholder.jpg'); ?>" alt="img">
								</div>
							</div>
							<div class="stars_bar">
								<div class="stars_wrap">
									<i class="icon icon-star"></i>
									<i class="icon icon-star"></i>
									<i class="icon icon-star"></i>
									<i class="icon icon-star"></i>
									<i class="icon icon-star"></i>
								</div>
							</div>
							<p>I am very thankful to indiafinpro for a fast and transparent process. Everything was crystal clear and service was first class. I strongly recommend it to everyone who is looking for a loan.</p>
						</div>
					</div>
					<div>
						<div class="client_review">
							<div class="heading_bar">
								<div class="text_wrap">
									<strong class="h5">Durai Gowtham</strong>
								</div>
								<div class="img_wrap">
									<img src="<?php echo base_url('assets/images/customers/placeholder.jpg'); ?>" alt="img">
								</div>
							</div>
							<div class="stars_bar">
								<div class="stars_wrap">
									<i class="icon icon-star"></i>
									<i class="icon icon-star"></i>
									<i class="icon icon-star"></i>
									<i class="icon icon-star"></i>
									<i class="icon icon-star"></i>
								</div>
							</div>
							<p>indiafinproo is the best place to apply for a loan. The team is pro. They invest their time in understanding their customer’s needs and give solutions according to that.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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