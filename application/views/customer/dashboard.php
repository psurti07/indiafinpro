<?php $this->load->view('customer/includes/header-apply'); ?>

<div class="subvisual-block subvisual-theme-1 bg-dark-green d-flex pt-60 pt-md-90 pt-lg-150 pb-30 text-white">
	<div class="pattern-image"><img src="<?php echo base_url('assets/images/img/pages-2.jpg'); ?>" width="1920"
			height="570" alt="Pattern"></div>
	<div class="container position-relative text-center">
		<div class="row">
			<div class="col-12">
				<div class="subvisual-textbox">
					<h1 class="text-dark">Dashboard</h1>
				</div>
			</div>
		</div>
	</div>
</div>

<main class="main">
	<section class="section section-accounts section-theme-1">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-12">
					<?php if ($kycstatus == 0) { ?>
						<div class="alert alert-danger alert-icon" role="alert">
							<i class="fa fa-times-circle"></i>
							Your documents need to upload for KYC and verify your account.
							<a href="<?php echo site_url('customer/profile/documents'); ?>" class="alert-link hover">Upload
								Now</a>.
						</div>
					<?php } ?>

					<?php if ($reapplystatus >= 90) { ?>
						<div class="alert alert-info alert-icon" role="alert">
							<i class="fa fa-times-hexagon"></i>
							As it has been 6 months since your last loan application,
							<strong>you're eligible to reapply</strong> for a loan.
							<a href="<?php echo site_url('customer/offers/preapproved'); ?>" class="alert-link hover">Apply
								Now</a>.
						</div>
					<?php } ?>

					<?php if ($accountmsg->option_value != "" && strlen($accountmsg->option_value) > 0) { ?>
						<div class="alert alert-info alert-icon" role="alert">
							<span class="badge bg-primary text-dark">Important Update</span>
							<?php echo $accountmsg->option_value; ?>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

	<section class="section section-theme-9">
		<div class="container">
			<div class="row mb-50">
				<div class="col-12 mb-30 mb-lg-0 col-lg-4">
					<div class="works_info_column" style="display: block;">
						<div class="wrap">
							<strong class="title"><?php echo $statestics['personalloan']; ?></strong>
							<p>Personal Loan Applications</p>
						</div>
					</div>
				</div>
				<div class="col-12 mb-30 mb-lg-0 col-lg-4">
					<div class="works_info_column" style="display: block;">
						<div class="wrap">
							<strong class="title"><?php echo $statestics['businessloan']; ?></strong>
							<p>Business Loan Applications</p>
						</div>
					</div>
				</div>
				<?php $hidedata = 0; // 0 = show, 1 = Hide
            	if ($hidedata == 0) {?>
				<div class="col-12 mb-30 mb-lg-0 col-lg-4">
					<div class="works_info_column" style="display: block;">
						<div class="wrap">
							<strong class="title"><?php echo $statestics['referalusers']; ?></strong>
							<p>Total Referral Customers</p>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>

</main>

<div class="subvisual-block subvisual-theme-1 bg-light-sky d-flex pt-60 pt-md-90 pt-lg-150 pb-50 text-white">
	<?php $hidedata = 0; // 0 = show, 1 = Hide
    if ($hidedata == 0) { ?>
	<div class="container position-relative text-center">
		<div class="row">
			<div class="col-12">
				<div class="subvisual-textbox text-dark pb-30">
					<h1>Refer and Earn up to Rs 1 Lac per month</h1>
				</div>
				<form class="form-newsletter" action="#">
					<input type="text" class="form-control" name="referrallink" value="<?php echo base_url('onlineprocess/referral/' . $profiledata->refcode); ?>" readonly style="background-color: #ffffff;">
				</form>
			</div>
		</div>
	</div>
	<?php } ?>
</div>

<?php echo link_tag('assets/css/plugins/bootstrap.min.css'); ?>
<?php $this->load->view('customer/includes/footer-apply'); ?>