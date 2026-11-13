<?php $this->load->view('customer/includes/header-apply'); ?>

<div class="subvisual-block subvisual-theme-1 bg-dark-green d-flex pt-60 pt-md-90 pt-lg-150 pb-30 text-white">
	<div class="pattern-image"><img src="<?php echo base_url('assets/images/img/pages-2.jpg'); ?>" width="1920" height="570" alt="Pattern"></div>
	<div class="container position-relative text-center">
		<div class="row">
			<div class="col-12">
				<div class="subvisual-textbox">
					<h1 class="cstm-font text-dark">Pre-Approved Loan Offers</h1>
				</div>
				<nav class="breadcrumb-nav text-blue d-flex justify-content-center">
					<ul class="breadcrumb mb-0">
						<li class="breadcrumb-item">My Loan</li>
						<li class="breadcrumb-item text-green active">Pre-Approved Loan Offers</li>
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
				<?php if (count($directlinks)) {
					foreach ($directlinks as $row) { ?>
					<div class="col-12 col-md-6 col-lg-4 mt-5">
						<div class="works_info_column" style="display: block;">
							<div class="wrap">
								<strong class="title">Personal Loan</strong>
								<div class="img_holder">
									<img src="<?php echo base_url('assets/images/bank/' . $row->bank_image); ?>" alt="Loan">
								</div>
								<p><a href="<?php echo $row->applyurl; ?>" class="btn btn-green btn-sm" role="button">APPLY NOW <span><i class="fa-solid fa-circle-arrow-right"></i></a></p>
							</div>
						</div>
					</div>
				<?php } } ?>
			</div>
		</div>
	</section>

</main>

<?php $this->load->view('customer/includes/footer-apply'); ?>