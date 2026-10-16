<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, height=device-height,  initial-scale=1.0, user-scalable=no;user-scalable=0;"/>
        <title><?php if(isset($meta->title)) { echo $meta->title; } else { echo "Apply for Instant Personal Loan Online approvals | indiafinpro"; } ?></title>
        <meta name="description" content="<?php if(isset($meta->descriptions)) { echo $meta->descriptions; } ?>" />
        <meta name="keywords" content="<?php if(isset($meta->keywords)) { echo $meta->keywords; } ?>" />

        <link rel="canonical" href="<?php echo base_url(uri_string()); ?>" />
        <meta name="robots" content="index, follow" />
        <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
        <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
        <meta name="author" content="vw-team">

        <link rel="shortcut icon" href="<?php echo base_url('assets/img/indiafinproicon.png'); ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/img/apple-icon-180x180.png'); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/img/favicon-16x16.png'); ?>">
        <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>">

        <?php echo link_tag('assets/css/plugins.css'); ?>
        <?php echo link_tag('assets/css/style.css'); ?>
        <?php echo link_tag('assets/css/colors/green.css'); ?>
        <?php echo link_tag('assets/css/fonts/thicccboi.css'); ?>

        <?php echo link_tag('assets/plugins/validation/form-validation.css'); ?>
        <?php echo link_tag('assets/plugins/toastr/toastr.css'); ?>
    </head>
    <body>
        <section class="wrapper bg-white">
            <div class="container pb-12 pb-md-14" style="margin-top:80px">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 offset-md-3">
                        <div class="card shadow-lg">
                            <div class="row gx-0">
                                <div class="col-lg-12 col-md-12">
                                    <div class="p-5 p-md-6 p-lg-7">
                                        <?php echo form_open('infopage/sendotpCode', array('id'=>'submitForm1', 'class'=>'form-transparent-grey', 'novalidate'=>'novalidate')); ?>
                                            <h3 class="fw-lighter"><span class="fw-bold">Unsubscribe</span></h3>
                                            <p>Seeing you go really makes us sad…We hope to cross paths with you soon!</p>
                                            
                                            <div class="row gx-4">
                                                <div class="col-md-12">
                                                    <p>Please Enter Your Registered Number To Unsubscribe From Receiving Our Service Messages.</p>
                                                    <div class="form-group form-floating mt-2 mb-4">
                                                        <input id="mobileno" type="tel" onkeypress="return isNumberKey(event)" name="mobileno" class="form-control" placeholder="Registred Mobile *" required minlength="10" maxlength="10" inputmode="numeric" pattern="[6789][0-9]{9}">
                                                        <label for="mobileno">Registred Mobile No *</label>
                                                        <div class="help-block font-small-3"></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label>Please help us in knowing your reason to leave:</label>
                                                    <div class="form-group">
                                                        <div class="form-check mt-0">
                                                            <input class="form-check-input" type="radio" name="reason" id="reason1" value="I receive too many messages" checked>
                                                            <label class="form-check-label" for="reason1"> I receive too many messages </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="reason" id="reason2" value="Not interested in Subscription">
                                                            <label class="form-check-label" for="reason2"> Not interested in subscription </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="reason" id="reason3" value="Services are no longer relevant">
                                                            <label class="form-check-label" for="reason3"> Services are no longer relevant </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="reason" id="reason4" value="Service Pricing is too high!">
                                                            <label class="form-check-label" for="reason4"> Service Pricing is too high! </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="reason" id="reason5" value="Got a loan from other sources">
                                                            <label class="form-check-label" for="reason5"> Got a loan from other sources </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="reason" id="reason6" value="Others">
                                                            <label class="form-check-label" for="reason6"> Others </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-danger" id="mobilenoError"></div>
                                                
                                                <div class="col-md-12 text-left mt-3">
                                                    <div class="form-group">
                                                        <button type="submit" id="form-submit1" class="btn btn-primary btn-sm rounded btn-send">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                            <!--/.row -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /section -->
        <!-- modal -->
        <div class="modal fade" id="modalotp" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content text-center">
                    <div class="modal-body">
                        <p class="lead mb-3 text-start">Please enter the OTP you received on: <span id="modelotpmobileno"></span></p>

                        <?php echo form_open('#', array('id'=>'submitForm2', 'class'=>'text-center', 'novalidate'=>'novalidate')); ?>
                        <input type="hidden" name="mobileno" id="otpmobileno" value="">
                        <input type="hidden" name="reason" id="otpreason" value="">
                        
                        <div class="form-group form-floating mb-4">
                            <input id="otpcode" type="text" name="otpcode" class="form-control optnumber text-center" placeholder="Enter OTP" maxlength="4" inputmode="numeric" required>
                            <label for="mobile">Enter OTP</label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your OTP code.</div>
                        </div>

                        <div class="form-group form-floating mb-4">
                            <code id="resend-message">Didn't receive OTP? <a href="javascript:resendotp()">Resend OTP</a></code>
                            <div class="custom-error" id="otpcodeError"></div>
                        </div>

                        <button type="button" id="btn-verify" class="btn btn-primary rounded btn-login w-100 mb-2">Unsubscribe Now</button>
                        <?php echo form_close(); ?>
                        <!-- /form -->
                    </div>
                    <!--/.modal-content -->
                </div>
                <!--/.modal-body -->
            </div>
            <!--/.modal-dialog -->
        </div>


        <!-- modal ends -->
        <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/plugins.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/theme.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/validation/jqBootstrapValidation.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/plugins/validation/form-validation.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js'); ?>" type="text/javascript"></script>
        <script>
            function isNumberKey(evt)
            {
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode != 46 && charCode > 31 
                && (charCode < 48 || charCode > 57))
                    return false;

                return true;
            }
            $(document).ready(function() {
                $(window).keydown(function(event){
                    if(event.keyCode == 13) {
                        event.preventDefault();
                        return false;
                    }
                });
            })
            $(function(){
                $('#submitForm1').on('submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                        url : $(this).attr('action') || window.location.pathname,
                        type: "POST",
                        data: $(this).serialize(),
                        dataType: "JSON",
                        cache: false,
                        processData:false,
                        beforeSend: function(){
                            $('#form-submit1').html('Applying... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>');
                            $('#form-submit1').attr('disabled', true);
                        },
                        success: function (response) {
                            if(response['success'] == true) {
                                $('#modalotp').modal({backdrop: 'static', keyboard: false});
                                $('#otpmobileno').val(response['regdata']['mobileno']);
                                $('#otpreason').val(response['regdata']['reason']);
                                $('#modelotpmobileno').html(response['regdata']['mobileno']);
                                $('#modalotp').modal('show'); 
                                $('#form-submit1').html('Submit');
                                $('#form-submit1').attr('disabled', false);
                            }
                            else {
                                $('#mobilenoError').html(response['message']);
                                toastr.error(response['message']);
                                $('#form-submit1').html('Submit');
                                $('#form-submit1').attr('disabled', false);
                            }
                        },
                        error: function (jXHR, textStatus, errorThrown) {
                            toastr.error(errorThrown, 'ERROR');
                            $('#form-submit1').html('Submit');
                            $('#form-submit1').attr('disabled', false);
                        }
                    });
                });

                $('#btn-verify').on('click', function() {
                    $('#modalotp').modal({backdrop: 'static', keyboard: false});
                    $.ajax({
                        url : '<?php echo base_url('infopage/checkotpCode'); ?>',
                        type: "POST",
                        data: $('#submitForm2').serialize(),
                        dataType: "JSON",
                        cache: false,
                        processData:false,
                        beforeSend: function(){
                            $('#btn-verify').html('Verifying... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>');
                            $('#btn-verify').attr('disabled', true);
                        },
                        success: function (response) {
                            if(response['success'] == true) {
                                toastr.success(response['message']);
                                setTimeout(() => {
                                    $('#submitForm2').attr('action', '<?php echo base_url('infopage/unsubscribed'); ?>');
                                    $('#submitForm2').submit();    
                                }, 3000);
                            }
                            else {
                                $('#otpcodeError').html(response['message']);
                                $('#btn-verify').html('Unsubscribe Now');
                                $('#btn-verify').attr('disabled', false);
                                toastr.error(response['message']);
                            }
                        },
                        error: function (jXHR, textStatus, errorThrown) {
                            toastr.error(errorThrown, 'ERROR');
                            $('#btn-verify').html('Unsubscribe Now');
                            $('#btn-verify').attr('disabled', false);
                        }
                    });
                });
            });
        </script>
    </body>
</html>