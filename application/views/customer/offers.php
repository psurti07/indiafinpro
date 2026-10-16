<?php $this->load->view('customer/includes/header-apply'); ?>

<div class="subvisual-block subvisual-theme-1 bg-dark-green d-flex pt-60 pt-md-90 pt-lg-150 pb-30 text-white">
	<div class="pattern-image"><img src="<?php echo base_url('assets/images/img/pages-2.jpg'); ?>" width="1920" height="570" alt="Pattern"></div>
	<div class="container position-relative text-center">
		<div class="row">
			<div class="col-12">
				<div class="subvisual-textbox">
					<h1 class="cstm-font text-dark">Apply Now</h1>
				</div>
				<nav class="breadcrumb-nav text-blue d-flex justify-content-center">
					<ul class="breadcrumb mb-0">
						<li class="breadcrumb-item">My Loan</li>
						<li class="breadcrumb-item text-green active">Apply Now</li>
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
				<div class="col-12 col-md-6 col-lg-6">
					<div class="works_info_column" style="display: block;">
						<div class="wrap">
							<strong class="title">Personal Loan</strong>
							<div class="img_holder">
								<img src="<?php echo base_url('assets/images/icons/Benefits.svg'); ?>" alt="Personal Loan">
							</div>
							<p><a href="<?= base_url('customer/loan/reapplypersonal') ?>" class="btn btn-green btn-sm" role="button">REAPPLY NOW <span><i class="fa-solid fa-circle-arrow-right"></i></a></p>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-6">
					<div class="works_info_column" style="display: block;">
						<div class="wrap">
							<strong class="title">Business Loan</strong>
							<div class="img_holder">
								<img src="<?php echo base_url('assets/images/icons/collaboration.svg'); ?>" alt="Business Loan">
							</div>
							<p><a href="<?= base_url('customer/loan/reapplybusiness') ?>" class="btn btn-green btn-sm" role="button">REAPPLY NOW <span><i class="fa-solid fa-circle-arrow-right"></i></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php $this->load->view('customer/includes/footer-apply'); ?>