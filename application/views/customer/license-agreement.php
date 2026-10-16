<?php $this->load->view('customer/includes/header-apply'); ?>

<div class="subvisual-block subvisual-theme-1 bg-dark-green d-flex pt-60 pt-md-90 pt-lg-150 pb-30 text-white">
	<div class="pattern-image"><img src="<?php echo base_url('assets/images/img/pages-2.jpg'); ?>" width="1920"
			height="570" alt="Pattern"></div>
	<div class="container position-relative text-center">
		<div class="row">
			<div class="col-12">
				<div class="subvisual-textbox">
					<h1 class="cstm-font text-dark">License Agreement</h1>
				</div>
			</div>
		</div>
	</div>
</div>

<main class="main">
	<section
		class="section section-accounts section-theme-1 pt-35 pt-md-50 pt-lg-75 pt-xl-100 pt-xxl-120 pb-35 pb-md-50 pb-lg-75 pb-xl-100 pb-xxl-120">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="form-head">
						<p><?php echo $contentdetails->option_value; ?></p>
					</div>
					<div class="account-box">
						<?php echo form_open('customer/dashboard/acceptlicence', array('id' => 'submitForm1', 'class' => 'contac-form', 'novalidate' => 'novalidate')); ?>
						<div class="row">
							<input type="hidden" name="customerid" id="customerid"
								value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
							<p class="mt-5">If you accept the terms of the agreement, click "I Agree" to continue.</p>
							<div class="form-group col-12 col-lg-12 mb-25">
								<label class="custom-checkbox mt-5 ms-10">
									<input type="checkbox" id="agree" name="agree" value="1" required>
									<span class="fake-checkbox"></span>
									<span class="label-text">I accept the terms in the License Agreement.</span>
								</label>
								<div class="help-block font-small-3"></div>
							</div>
							<div class="col-4">
								<button type="submit" class="btn btn-green btn-sm" id="submit-btn2"><span
										class="btn-text">I Agree</span></button>
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php $this->load->view('customer/includes/footer-apply'); ?>