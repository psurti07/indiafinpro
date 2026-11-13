<?php
$this->load->view('includes/header-offer.php');
?>

<main class="main d-flex flex-column min-vh-100">
    <section class="section section-theme-1 packages-block pt-40 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-8 mb-15 mb-md-30">
                    <div class="block-holder form-condidates">
                        <div class="subhead">
                            <h4><?php echo $userdetails['loanname']; ?></h4>
                            <p class="mb-0">Just a few more details to get pre-approved loan offer from our Partnered
                                NBFCs</p>
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
                                <input class="form-control" type="text" id="monincome" name="monincome"
                                    placeholder="Monthly Income *" required inputmode="numeric">
                                <div class="help-block font-small-3"></div>
                            </div>

                            <div class="form-group col-12 col-lg-6 mb-15">
                                <input class="form-control" type="text" id="monemi" name="monemi"
                                    placeholder="Current Monthly EMI *" required inputmode="numeric">
                                <div class="help-block font-small-3"></div>
                            </div>

                            <div class="form-group col-12 col-lg-6 mb-15">
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
                                <input type="text" name="pincode" id="pincode" maxlength="6" minlength="6"
                                    inputmode="numeric" class="form-control mb-2" placeholder="Pincode*" required>
                                <div class="help-block font-small-3"></div>
                                <span class="pincode error text-danger text-start"></span>
                            </div>

                            <div class="form-group col-12 col-lg-6 mb-15">
                                <input type="text" name="city" id="city" class="form-control mb-2" placeholder="City*"
                                    required readonly>
                                <div class="help-block font-small-3"></div>
                            </div>

                            <div class="form-group col-12 col-lg-6 mb-15">
                                <input type="text" name="state" id="state" class="form-control mb-2"
                                    placeholder="State*" required readonly>
                                <div class="help-block font-small-3"></div>
                            </div>

                            <div class="col-12 pt-10 text-center">
                                <button type="submit" class="btn btn-green btn-sm" id="formsubmit1"><span
                                        class="btn-text">Check
                                        Eligibility</span></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-15 mb-md-30">
                    <div class="package-box" style="height: auto;">
                        <div class="box-head"></div>
                        <div class="box-inner">
                            <div class="icon">
                                <div class="rupmon-test-wrap test-step active">
                                    <div class="test-progress">
                                        <div class="test-progress-step">
                                            <span class="step-number">1/4</span>
                                            <svg>
                                                <circle class="step-1" cx="30" cy="30" r="28" stroke-width="4"
                                                    fill="none" role="slider" aria-orientation="vertical"
                                                    aria-valuemin="0" aria-valuemax="100" aria-valuenow="50"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-unstyled features-list">
                                <li>Loan Amount : ₹ <?php echo formatePriceIndia($userdetails['loanamount']); ?></li>
                                <li>Loan : <?php echo $userdetails['loanname']; ?></li>
                                <li>Fullname : <?php echo $userdetails['fullname']; ?></li>
                                <li>Mobile No. : <?php echo $userdetails['mobile']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

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