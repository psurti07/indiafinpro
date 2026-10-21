	<!--=====footer-start=======-->
	<footer class="footer footer-theme-1">
	    <div class="sec-footer bg-dark-green text-white pt-20 pb-20">
	        <div class="container">
	            <div class="row align-items-center">
	                <div class="col-12 col-md-6 text-center text-md-start">
	                    <p class="small mb-0 text-white"><?php echo date('Y') . ' &copy; ' . COMPANY_NAME; ?>. All rights reserved.</p>
	                </div>
	                <div class="col-12 col-md-6 text-center text-md-end">
	                    <p class="small mb-0 text-white">CIN No: <?php echo COMPANY_CIN; ?> | Call Support: <?php echo COMPANY_MOBILE; ?>
	                    </p>
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
$(document).ready(function() {
    $('#loanamount, #monincome, #monemi, #monthlyincome, #cardamount').on('input', function() {
        var inputVal = $(this).val();
        inputVal = inputVal.replace(/\D/g, '');
        inputVal = inputVal.slice(0, 8);
        $(this).val(inputVal);
    });

    $('#mobileno, #mobile').on('input', function() {
        var inputVal = $(this).val();
        inputVal = inputVal.replace(/\D/g, '');
        inputVal = inputVal.slice(0, 10);
        $(this).val(inputVal);
    });

    $('#cardnumber').on('input', function() {
        var inputVal = $(this).val();
        inputVal = inputVal.replace(/\D/g, '');
        inputVal = inputVal.slice(0, 16);
        $(this).val(inputVal);
    });
});
	</script>
	</body>

	</html>