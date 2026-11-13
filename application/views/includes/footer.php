	<!--=====footer-start=======-->
	<footer class="footer footer-theme-1">
	    <div class="pri-footer text-gray pt-35 pt-lg-50 pt-xxl-80 pb-35 pb-md-20">
	        <div class="container">
	            <div class="row">
	                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-35 mb-md-45 mb-lg-0">
	                    <div class="finder-theme-1">
	                        <img src="<?php echo base_url('assets/images/logo/logo-light.png'); ?>" alt="indiafinpro"
	                            class="mb-20 img-fluid" width="170">

	                        <div class="footer-info">
	                            <div class="form-subscribe mb-20">
	                                <p>IndiaFinPro provides clear guidance on loan options, application steps and documentation, helping you make informed financial decisions.</p>
	                            </div>

	                            <ul class="social-networks no-bg d-flex flex-wrap">
	                                <?php if (SM_FACEBOOK != '#') { ?>
	                                <li><a href="<?php echo SM_FACEBOOK; ?>"> <img
	                                            src="<?php echo base_url('assets/images/icons/facebook.png'); ?>"
	                                            alt="indiafinpro" class="img-fluid"></a></li>
	                                <?php } ?>
	                                <?php if (SM_INSTAGRAM != '#') { ?>
	                                <li><a href="<?php echo SM_INSTAGRAM; ?>"> <img
	                                            src="<?php echo base_url('assets/images/icons/instagram.png'); ?>"
	                                            alt="indiafinpro" class="img-fluid"></a></li>
	                                <?php } ?>
	                                <?php if (SM_TWITTER != '#') { ?>
	                                <li><a href="<?php echo SM_TWITTER; ?>"> <img
	                                            src="<?php echo base_url('assets/images/icons/twitter.png'); ?>"
	                                            alt="indiafinpro" class="img-fluid"></a></li>
	                                <?php } ?>
	                                <?php if (SM_LINKEDIN != '#') { ?>
	                                <li><a href="<?php echo SM_LINKEDIN; ?>"> <img
	                                            src="<?php echo base_url('assets/images/icons/linkdin.png'); ?>"
	                                            alt="indiafinpro" class="img-fluid"></a></li>
	                                <?php } ?>
	                                <?php if (SM_YOUTUBE != '#') { ?>
	                                <li><a href="<?php echo SM_YOUTUBE; ?>"> <img
	                                            src="<?php echo base_url('assets/images/icons/youtube.png'); ?>"
	                                            alt="indiafinpro" class="img-fluid"></a></li>
	                                <?php } ?>

	                            </ul>
	                        </div>
	                    </div>
	                </div>


	                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-15 mb-md-0">
	                    <h6>Useful Links</h6>
	                    <ul class="footer-links">
	                        <li><a href="<?php echo site_url(); ?>">Home</a></li>
	                        <li><a href="javascript:;" onclick="goToMenu('aboutus')">About Us</a></li>
	                        <li><a href="javascript:;" onclick="goToMenu('contactus')">Contact</a></li>
	                        <li><a href="<?php echo site_url('faqs'); ?>">FAQs</a></li>
							
	                    </ul>
	                </div>
	                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-15 mb-md-0">
	                    <h6>Useful Links</h6>
	                    <ul class="footer-links">
	                        <li><a href="<?php echo site_url('privacy-policy'); ?>">Privacy Policy</a></li>
							<li><a href="<?php echo site_url('terms-conditions'); ?>">Terms &amp; Conditions</a></li>
							<li><a href="<?php echo site_url('refund-policy'); ?>">Refund Policy</a></li>
							<li><a href="<?php echo site_url('disclaimer'); ?>">Disclaimer</a></li>
	                        </li>
	                      
	                    </ul>
	                </div>
	                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-15 mb-md-0">
	                    <h6>Contact Us</h6>
	                    <ul class="contact-list">
	                       
	                        <li>
	                            <img src="<?php echo base_url('assets/images/icons/map-icon.png'); ?>" alt="indiafinpro"
	                            class="mb-20 img-fluid">

	                            <span class="text ms-10"><?php echo COMPANY_ADDRESS; ?></span>
	                        </li>
	                        <li>
	                             <img src="<?php echo base_url('assets/images/icons/call-icon.png'); ?>" alt="indiafinpro"
	                            class="mb-20 img-fluid">

	                            <span class="text ms-10"><a
	                                    href="tel:<?php echo COMPANY_MOBILE; ?>"><?php echo COMPANY_MOBILE; ?></a></span>
	                        </li>
	                        <li>
	                               <img src="<?php echo base_url('assets/images/icons/envelope-icon.png'); ?>" alt="indiafinpro"
	                            class="mb-20 img-fluid">

	                            <span class="text ms-10"><a
	                                    href="mailto:<?php echo COMPANY_EMAIL; ?>"><?php echo COMPANY_EMAIL; ?></a></span>
	                        </li>
	                    </ul>
	                </div>


	            </div>
	        </div>
	    </div>
		<hr style="color:rgba(255, 255, 255, 0.15) !important">
	    <div class="sec-footer pt-0 pb-10 py-md-10 py-lg-10">
	        <div class="container">
	            <div class="row align-items-center">
	                <div class="col-12 col-md-12 text-center">
	                    <p class="small"><?php echo date('Y') . ' &copy; ' . COMPANY_NAME; ?>. All rights reserved.</p>
	                </div>
					
	            </div>
	        </div>
	    </div>
	</footer>
	<!--=====footer-end=======-->
	</div>

	<!--=====JS=======-->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

	<script src="<?php echo base_url('assets/js/jquery-3.6.4.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/vendor.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/jquery.main.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/custom.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/plugins/jqBootstrapValidation.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/plugins/form-validation.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/plugins/toastr.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/plugins/fontawesome.js'); ?>" type="text/javascript"></script>

	<script type="text/javascript">
$(function() {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: $(this).serialize(),
            dataType: "JSON",
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#submit-btn').html(
                    "SUBMITTING... <span class='spinner-border spinner-border-sm ms-1' role='status' aria-hidden='true'></span>"
                    );
                $('#submit-btn').attr('disabled', true);
            },
            success: function(response) {
                if (response['success'] == true) {
                    document.getElementById("contactForm").reset();
                    toastr.success(response['message']);
                } else {
                    toastr.error(response['message']);
                }

                $('#submit-btn').html('Send Message');
                $('#submit-btn').attr('disabled', false);
            },
            error: function(jXHR, textStatus, errorThrown) {
                toastr.error(errorThrown, 'ERROR');
                $('#submit-btn').html('Send Message');
                $('#submit-btn').attr('disabled', false);
            }
        });
    });
});
	</script>
	</body>

	</html>