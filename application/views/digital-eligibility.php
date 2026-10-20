<?php
$this->load->view('includes/header-apply.php');
?>

<section class="visual-block visual-theme-5 bg-dark hero-section text-black pt-60 pt-md-60 pt-xl-100">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-md-5 col-lg-5 col-xl-5">

                <div class="visual-textbox pt-0">
                    <h2 class="text-light">Your Loan Search Starts Here </h2>
                    <p class="text-light">Access Options Up to <span
                            style="background: linear-gradient(167.62deg, #2052B6 9%, #F4DECA 428%); padding: 9px; border-radius: 22px;">
                            ₹10 Lakhs*</span></p>
                    <p class="text-light">Get your business loan approved quickly with minimal paperwork, transparent
                        terms and a simple 100% online process.</p>
                </div>
                <div class="banner__img-two">
                    <img src="<?= base_url('assets/images/image_30.png'); ?>" alt="">
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-7 mb-15 mb-md-30">
                <div class="block-holder form-condidates bg-white shadow">
                    <div class="d-flex">
                        <div>
                            <div class="categories-image">
                                <span class="icon">
                                    <img src="<?php echo base_url('assets/images/icons/Salarised.png'); ?>" alt="image"
                                        class="">
                                </span>
                            </div>
                        </div>
                        <div class="subhead ms-15">
                            <h5 class="mb-5 text-dark"><?php echo $userdetails['loanname']; ?></h5>
                            <p class="mb-0">Get pre-approved offers instantly — just fill in your details.</p>
                        </div>
                    </div>
                    <?php echo form_open('onlineprocess/userApply', array('id' => 'submitForm1', 'class' => '', 'novalidate' => 'novalidate')); ?>
                    <div class="row">
                        <input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>"
                            class="form-control" required>
                        <input type="hidden" name="userid" value="<?php echo $userdetails['userid']; ?>"
                            class="form-control" required>
                        <input type="hidden" name="cardtype" value="<?php echo $userdetails['cardtype']; ?>"
                            class="form-control" required>

                        <div class="form-group col-12 col-lg-6 mb-15">
                            <label class="text-uppercase h6 mb-10 frmtext">CIBIL Score</label>
                            <select class="form-select" id="cibilscore" name="cibilscore" required>
                                <option value="">CIBIL Score *</option>
                                <option value="Below 650">Below 650</option>
                                <option value="650 - 700">650 - 700</option>
                                <option value="700 - 750">700 - 750</option>
                                <option value="750 - 800">750 - 800</option>
                                <option value="800 - 850">800 - 850</option>
                                <option value="850 - 900">850 - 900</option>
                            </select>
                            <div class="help-block font-small-3"></div>
                        </div>

                        <div class="form-group col-12 col-lg-6 mb-15">
                            <label class="text-uppercase h6 mb-10 frmtext">Monthly Income (₹)</label>
                            <input class="form-control" type="text" id="monincome" name="monincome"
                                placeholder="Monthly Income *" required inputmode="numeric">
                            <div class="help-block font-small-3"></div>
                        </div>

                        <div class="form-group col-12 col-lg-6 mb-15">
                            <label class="text-uppercase h6 mb-10 frmtext">Current Monthly EMI (₹)</label>
                            <input class="form-control" type="text" id="monemi" name="monemi"
                                placeholder="Current Monthly EMI *" required inputmode="numeric">
                            <div class="help-block font-small-3"></div>
                        </div>

                        <div class="form-group col-12 col-lg-6 mb-15">
                            <label class="text-uppercase h6 mb-10 frmtext">Loan Purpose</label>
                            <select class="form-select" id="loanpurpose" name="loanpurpose" required>
                                <option value="">Select Loan Purpose *</option>
                                <?php if ($userdetails['loantype'] == 12) { ?>
                                <option value="Business Expansion">Business Expansion</option>
                                <option value="Maintain Cash Flow">Maintain Cash Flow</option>
                                <option value="Supplier Payments">Supplier Payments</option>
                                <option value="Setup Manufacturing Unit">Setup Manufacturing Unit</option>
                                <option value="Hiring Budget">Hiring Budget</option>
                                <option value="Other">Other</option>
                                <?php } else { ?>
                                <option value="Personal Use">Personal Use</option>
                                <option value="Property Renovation">Property Renovation</option>
                                <option value="Marriage Purpose">Marriage Purpose</option>
                                <option value="Education Purpose">Education Purpose</option>
                                <option value="Medical Emergency">Medical Emergency</option>
                                <option value="Other">Other</option>
                                <?php } ?>
                            </select>
                            <div class="help-block font-small-3"></div>
                        </div>

                        <div class="form-group col-12 col-lg-6 mb-15">
                            <label class="text-uppercase h6 mb-10 frmtext">Pincode</label>
                            <input type="text" name="pincode" id="pincode" maxlength="6" minlength="6"
                                inputmode="numeric" class="form-control mb-2" placeholder="Pincode*" required>
                            <div class="help-block font-small-3"></div>
                            <span class="pincode error text-danger text-start"></span>
                        </div>

                        <div class="form-group col-12 col-lg-6 mb-15">
                            <label class="text-uppercase h6 mb-10 frmtext">City</label>
                            <input type="text" name="city" id="city" class="form-control mb-2" placeholder="City*"
                                required>
                            <div class="help-block font-small-3"></div>
                        </div>

                        <div class="form-group col-12 col-lg-6 mb-15">
                            <label class="text-uppercase h6 mb-10 frmtext">State</label>
                            <input type="text" name="state" id="state" class="form-control mb-2" placeholder="State*"
                                required>
                            <div class="help-block font-small-3"></div>
                        </div>


                        <div class="col-lg-12">
                            <div class="otp-velidation-text border px-25 py-15 bg-light-gray">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="d-flex align-items-center mb-md-10 mb-5">
                                                <i class="fa-solid fa-bullseye text-success"></i>
                                                <div>
                                                    <p class="mb-0 fw-light ms-10 h6">Soft check only — won't impact
                                                        your credit
                                                        score. </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-12 text-end">
                                            <button type="submit" class="btn btn-green btn-sm w-100"
                                                id="formsubmit1"><span class="btn-text">Check Your Eligibility <i
                                                        class="fa-solid fa-arrow-right"></i></span></button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="pt-md-25 mt-md-0 mt-5">
                            
                            <span class="text-uppercase fw-boldsub-title mb-5 d-block">Desired Loan
                                Amount</span>
                            <div class="text-start mb-15 border-bottom pb-5">
                                <h4 class="text-dark mb-5">₹<?php echo formatePriceIndia($userdetails['loanamount']); ?>
                                </h4>
                                <p class="mb-0">Tenure: up to 60 months · ROI from 11%*</p>
                            </div>
                            <p class="text-uppercase fw-bold">Customer details</p>
                            <div class="user-details-table mb-0">
                                <div class="d-flex mb-10">
                                    <div class="icon-col">
                                        <div class="m-auto">
                                            <div
                                                class="d-flex align-items-center justify-content-center bg-light-gray image-wrap">
                                                <i class="fa-regular fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ms-10">
                                        <small class="text-uppercase d-block s-12">Name</small>
                                        <p class="h6"><?php echo $userdetails['fullname']; ?></p>
                                    </div>
                                </div>
                                <div class="d-flex mb-10">
                                    <div class="icon-col">
                                        <div class="m-auto">
                                            <div
                                                class="d-flex align-items-center justify-content-center bg-light-gray image-wrap">
                                                <i class="fa-solid fa-phone"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ms-10">
                                        <small class="text-uppercase d-block s-12">Mobile :</small>
                                        <p class="h6"><?php echo $userdetails['mobile']; ?></p>
                                    </div>
                                </div>
                                <!-- <div class="d-flex mb-10">
                                <div class="icon-col">
                                    <div class="m-auto">
                                        <div
                                            class="d-flex align-items-center justify-content-center bg-light-gray image-wrap">
                                            <span class="flaticon-user lh-1"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-10">
                                    <small class="text-uppercase d-block s-12">Loan Amount :</small>
                                    <p class="h6"><?php echo formatePriceIndia($userdetails['loanamount']); ?></p>
                                </div>
                            </div> -->
                                <div class="d-flex mb-10">
                                    <div class="icon-col">
                                        <div class="m-auto">
                                            <div
                                                class="d-flex align-items-center justify-content-center bg-light-gray image-wrap">
                                                <i class="fa-regular fa-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ms-10">
                                        <small class="text-uppercase d-block s-12">Email</small>
                                        <p class="h6"><?php echo $userdetails['email']; ?></p>
                                    </div>
                                </div>
                                <div class="d-flex mb-10">
                                    <div class="icon-col">
                                        <div class="fbox-ico ico-16 m-auto">
                                            <div
                                                class="d-flex align-items-center justify-content-center bg-light-gray image-wrap">
                                                <i class="fa-regular fa-file"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ms-10">
                                        <small class="text-uppercase d-block s-12">Loan Type</small>
                                        <p class="h6">Personal Loan</p>
                                    </div>
                                </div>

                            </div>
                            <div class="otp-velidation-text-wrap border border-success bg-light p-10">

                                <div class="d-flex align-items-start">

                                    <div>
                                        <i class="fa-solid fa-shield text-success"></i>
                                    </div>
                                    <p class="mb-0 ms-10 mt-0 h6 fw-normal">Your data is
                                        256-bit encrypted and never
                                        shared
                                        without your consent.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </div>
    </div>
</section>

<script type="text/javascript">
$(document).ready(function() {
    var windowWidth = $(window).width();
    if (windowWidth <= 1024) { //for iPad & smaller devices
        $('#userCollapse').removeClass('show');
    }
});

$(function() {
    $('#submitForm1').on('submit', function(e) {
        $('#formsubmit1').attr('disabled', true);
        $('#formsubmit1').html(
            'Processing... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>'
        );
    });
});
</script>

<script>
$('#pincode').on('input', function() {

    var pincode = $(this).val();

    if (pincode.length === 6) {

        $.ajax({
            url: "<?= base_url('onlineprocess/geoLocation') ?>",
            type: "POST",
            data: {
                pincode: pincode
            },
            dataType: "json",

            success: function(response) {

                if (response.status === 'success') {
                    $('#city').val(response.city);
                    $('#state').val(response.state);
                    $('.pincode').text('');
                } else {
                    $('#city').val('');
                    $('#state').val('');
                    $('.pincode').text('Enter valid pincode.');
                }
            },

            error: function() {
                $('.pincode').text('Enter valid pincode.');
            }
        });

    } else {
        $('#city').val('');
        $('#state').val('');
    }
});
</script>

<?php
$this->load->view('includes/footer-apply');
?>