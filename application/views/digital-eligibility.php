<?php
$this->load->view('includes/header-apply.php');
?>

<section class="visual-block visual-theme-5 bg-dark hero-section text-black pt-60 pt-md-60 pt-xl-100">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-md-5 col-lg-5 col-xl-5 order-2">

                <div class="visual-textbox pt-0">
                    <h2 class="text-light">Your Loan Search Starts Here </h2>
                    <p class="text-light">Access Options Up to <span class="d-inline-block"
                            style="background: linear-gradient(167.62deg, #2052B6 9%, #F4DECA 428%); padding: 9px; border-radius: 22px;">
                            ₹10 Lakhs*</span></p>
                    <p class="text-light">Get your business loan approved quickly with minimal paperwork, transparent
                        terms and a simple 100% online process.</p>
                </div>
                <div class="banner__img-two">
                    <img src="<?= base_url('assets/images/image_30.png'); ?>" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-7 col-xl-7 mb-15 mb-md-30 order-md-2 order-1">
                <div class="account-box">
                    <div class="account-box-frame text-dark bg-white p-0">
                        <div class="mb-0 d-flex justify-content-between p-15 border-bottom">
                            <span class="text-dark fw-bold"><small>Loan Application</small></span>
                            <span class="text-gray"><small>Step 1 to 4</small></span>
                        </div>
                        <div class="process-step">
                            <div class="process-step-line"></div>

                            <div class="process-step-item active">
                                <div class="process-step-number">1</div>
                                <span>Loan</span>
                            </div>

                            <div class="process-step-item active">
                                <div class="process-step-number">2</div>
                                <span>Personal</span>
                            </div>

                            <div class="process-step-item">
                                <div class="process-step-number">3</div>
                                <span>Eligibility</span>
                            </div>

                            <div class="process-step-item">
                                <div class="process-step-number">4</div>
                                <span>Membership</span>
                            </div>
                        </div>
                        <div class="account-box-frame text-dark bg-white pt-0">
                            <?php echo form_open('onlineprocess/userApply', array('id' => 'submitForm1', 'class' => '', 'novalidate' => 'novalidate')); ?>
                            <div class="row">
                                <input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>"
                                    class="form-control" required>
                                <input type="hidden" name="userid" value="<?php echo $userdetails['userid']; ?>"
                                    class="form-control" required>
                                <input type="hidden" name="cardtype" value="<?php echo $userdetails['cardtype']; ?>"
                                    class="form-control" required>

                                <div class="form-group col-12 col-lg-6 mb-15">
                                    <label class="text-uppercase mb-20 fa-xs fw-bold">CIBIL Score</label>
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
                                    <label class="text-uppercase mb-20 fa-xs fw-bold">Monthly Income (₹)</label>
                                    <input class="form-control" type="text" id="monincome" name="monincome"
                                        placeholder="Monthly Income *" required inputmode="numeric">
                                    <div class="help-block font-small-3"></div>
                                </div>

                                <div class="form-group col-12 col-lg-6 mb-15">
                                    <label class="text-uppercase mb-20 fa-xs fw-bold">Current Monthly EMI (₹)</label>
                                    <input class="form-control" type="text" id="monemi" name="monemi"
                                        placeholder="Current Monthly EMI *" required inputmode="numeric">
                                    <div class="help-block font-small-3"></div>
                                </div>

                                <div class="form-group col-12 col-lg-6 mb-15">
                                    <label class="text-uppercase mb-20 fa-xs fw-bold">Loan Purpose</label>
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

                                <div class="form-group col-12 col-lg-4 mb-15">
                                    <label class="text-uppercase mb-20 fa-xs fw-bold">Pincode</label>
                                    <input type="text" name="pincode" id="pincode" maxlength="6" minlength="6"
                                        inputmode="numeric" class="form-control mb-2" placeholder="Pincode*" required>
                                    <div class="help-block font-small-3"></div>
                                    <span class="pincode error text-danger text-start"></span>
                                </div>

                                <div class="form-group col-12 col-lg-4 mb-15">
                                    <label class="text-uppercase mb-20 fa-xs fw-bold">City</label>
                                    <input type="text" name="city" id="city" class="form-control mb-2"
                                        placeholder="City*" required>
                                    <div class="help-block font-small-3"></div>
                                </div>

                                <div class="form-group col-12 col-lg-4 mb-15">
                                    <label class="text-uppercase mb-20 fa-xs fw-bold">State</label>
                                    <input type="text" name="state" id="state" class="form-control mb-2"
                                        placeholder="State*" required>
                                    <div class="help-block font-small-3"></div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-end">
                                    <button type="submit" class="btn btn-green btn-sm w-100" id="formsubmit1"><span
                                            class="btn-text">Check Your Eligibility <i
                                                class="fa-solid fa-arrow-right"></i></span></button>
                                </div>

                                <span class="text-center 
    text-success fa-xs fw-normal text-uppercase mb-30 mt-20">Our Lending Partners</span>
                                <p class="text-center mb-20 text-dark fa-xs fw-bold">Meet Our NBFC Partners</p>
                                <div class="lending-bank-slider">
                                    <?php foreach ($banklist as $row) { ?>
                                    <div class="wrap text-center">
                                        <div class="justify-content-center categories-image m-1">
                                            <img src="<?php echo base_url('assets/images/bank/' . $row->bank_image); ?>"
                                                alt="<?= $row->bank_name ?>" class="m-auto img-fluid">
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>

                            </div>
                            <?php echo form_close(); ?>
                        </div>
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