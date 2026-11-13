<?php $this->load->view('customer/includes/header-apply'); ?>

<div class="subvisual-block subvisual-theme-1 bg-dark-green d-flex pt-60 pt-md-90 pt-lg-150 pb-30 text-white">
	<div class="pattern-image"><img src="<?php echo base_url('assets/images/img/pages-2.jpg'); ?>" width="1920"
			height="570" alt="Pattern"></div>
	<div class="container position-relative text-center">
		<div class="row">
			<div class="col-12">
				<div class="subvisual-textbox">
					<h1 class="cstm-font text-dark">Subscription Plan</h1>
				</div>
				<nav class="breadcrumb-nav text-blue d-flex justify-content-center">
					<ul class="breadcrumb mb-0">
						<li class="breadcrumb-item">Profile</li>
						<li class="breadcrumb-item text-green active">Subscription Plan</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>

<main class="main">
	<section class="section section-theme-9 section-theme-7 mt-50 mb-50">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-12 col-lg-6">
					<div class="jobs-card p-20 flex-column">
						<h4>Subscription Details</h4>
						<ul class="footer-links">
							<li><b>Plan :</b>
								<?php echo ($plandata->cardtype == 12) ? 'Business Subscription Plan' : 'Personal Subscription Plan'; ?>
							</li>
							<li><b>Registration Date :</b> <?php echo displayDate($plandata->registration_date); ?></li>
							<li><b>Expiry Date :</b> <?php echo displayDate($plandata->expiry_date); ?></li>
							<li><b>Subscription Id :</b> <?php echo $plandata->card_number; ?></li>
						</ul>
						<div class="text-center">
							<a href="<?php echo base_url('customer/profile/invoice/' . stringCrypt($plandata->id, 'encrypt')); ?>" target="_blank" class="btn btn-success btn-sm"><span class="btn-text">Download Invoice</span></a>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-6">
					<div class="jobs-card p-20 flex-column">
						<h4>Plan Benefits</h4>
						<ul class="list-unstyled list">
							<li>100% Online Process</li>
							<li>Get Personalized Tracking Portal</li>
							<li>On-Call Expert Consultation</li>
							<li>Dedicated Loan Expert Assigned</li>
							<li>CIBIL Remains Unaffected</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php $this->load->view('customer/includes/footer-apply'); ?>