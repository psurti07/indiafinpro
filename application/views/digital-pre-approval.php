<?php
$this->load->view('includes/header-apply.php');
$today = date("Y-m-d", strtotime($userdetails['rec_date']));
$last30 = date('Y-m-d', strtotime('-30 days'));
if ($today <= $last30) {
  $eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']) + 100000;
} else {
  $eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);
}
$eligibilityamtindia = formatePriceIndia($eligibilityamt);
?>

<section class="visual-block visual-theme-5 bg-dark hero-section packages-block text-black pt-60 pt-md-60 pt-xl-100">
    <div class="container">
        <div class="row justify-content-between align-items-end">
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

                            <div class="process-step-item active">
                                <div class="process-step-number">3</div>
                                <span>Eligibility</span>
                            </div>

                            <div class="process-step-item">
                                <div class="process-step-number">4</div>
                                <span>Membership</span>
                            </div>
                        </div>
                        <div class="account-box-frame text-dark bg-white pt-0">
                            <div class="d-flex align-items-lg-center align-items-start my-20">
                                <div>
                                    <div class="salaried-img">
                                        <img src="<?php echo base_url('assets/images/icons/Salarised.png'); ?>"
                                            alt="image" class="">
                                    </div>
                                </div>
                                <div class="subhead ms-15">
                                    <h5 class="mb-5 text-dark"><?php echo $userdetails['loanname']; ?></h5>
                                    <p class="mb-0 small">Selecting the Right EMI Options for Your Financial Goals</p>
                                </div>

                            </div>

                            <?php echo form_open('onlineprocess/getpreApproval', array('id' => 'submitForm2', 'class' => '', 'novalidate' => 'novalidate')); ?>
                            <div class="row gx-10">

                                <input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>"
                                    class="form-control" required>
                                <input type="hidden" name="userid" value="<?php echo $userdetails['userid']; ?>"
                                    class="form-control" required>
                                <input type="hidden" name="mobile" value="<?php echo $userdetails['mobile']; ?>"
                                    class="form-control" required>
                                <input type="hidden" name="cardtype" value="<?php echo $userdetails['cardtype']; ?>"
                                    class="form-control" required>
                                <input type="hidden" name="tenure" id="tenure" value="36" class="form-control" required>
                                <input type="hidden" name="eligibilityamt" value="<?php echo $eligibilityamt; ?>"
                                    class="form-control" required>

                                <div class="col-6 col-md-6 col-lg-4 mb-15">
                                    <fieldset class="picker1">
                                        <label class="card" for="plan-1">
                                            <input type="radio" name="tenure" id="plan-1" value="12" class="radio"
                                                checked="">
                                            <span class="plan-details">
                                                <span class="plan-type text-uppercase mb-10 text-success">12
                                                    months</span>
                                                <h5 class="mb-0 fs-16 text-dark">₹
                                                    <?php echo calPMT($userdetails['apr'], 1, $eligibilityamt); ?><br>

                                                </h5>
                                                <div class="d-flex justify-content-between mt-5">

                                                    <p class="mb-0 small">Per Month </p>
                                                    <i class="fa-regular fa-calendar-days fs-5"></i>
                                                </div>
                                            </span></label>
                                    </fieldset>
                                </div>

                                <div class="col-6 col-md-6 col-lg-4 mb-15">
                                    <fieldset class="picker1">
                                        <label class="card" for="plan-2">
                                            <input type="radio" name="tenure" id="plan-2" value="24" class="radio">
                                            <span class="plan-details">
                                                <span class="plan-type h6 text-uppercase mb-10 text-success">24
                                                    months</span>
                                                <h5 class="mb-0 fs-16 text-dark">₹
                                                    <?php echo calPMT($userdetails['apr'], 2, $eligibilityamt); ?>
                                                </h5>
                                                <div class="d-flex justify-content-between mt-5">

                                                    <p class="mb-0 small">Per Month</p>
                                                    <i class="fa-regular fa-calendar-days fs-5"></i>
                                                </div>
                                            </span></label>
                                    </fieldset>
                                </div>

                                <div class="col-6 col-md-6 col-lg-4 mb-15">
                                    <fieldset class="picker1">
                                        <label class="card" for="plan-3">
                                            <input type="radio" name="tenure" id="plan-3" value="36" class="radio">
                                            <span class="plan-details">
                                                <span class="plan-type h6 text-uppercase mb-10 text-success">36
                                                    months</span>
                                                <h5 class="mb-0 fs-16 text-dark">₹
                                                    <?php echo calPMT($userdetails['apr'], 3, $eligibilityamt); ?>
                                                </h5>
                                                <div class="d-flex justify-content-between mt-5">

                                                    <p class="mb-0 small">Per Month</p>
                                                    <i class="fa-regular fa-calendar-days fs-5"></i>
                                                </div>
                                            </span></label>
                                    </fieldset>
                                </div>

                                <div class="col-6 col-md-6 col-lg-4 mb-15">
                                    <fieldset class="picker1">
                                        <label class="card" for="plan-4">
                                            <input type="radio" name="tenure" id="plan-4" value="48" class="radio">
                                            <span class="plan-details">
                                                <span class="plan-type h6 text-uppercase mb-10 text-success">48
                                                    months</span>
                                                <h5 class="mb-0 fs-16 text-dark">₹
                                                    <?php echo calPMT($userdetails['apr'], 4, $eligibilityamt); ?>
                                                </h5>
                                                <div class="d-flex justify-content-between mt-5">

                                                    <p class="mb-0 small">Per Month</p>
                                                    <i class="fa-regular fa-calendar-days fs-5"></i>
                                                </div>
                                            </span></label>
                                    </fieldset>
                                </div>

                                <div class="col-6 col-md-6 col-lg-4 mb-15">
                                    <fieldset class="picker1">
                                        <label class="card" for="plan-5">
                                            <input type="radio" name="tenure" id="plan-5" value="60" class="radio">
                                            <span class="plan-details">
                                                <span class="plan-type h6 text-uppercase mb-10 text-success">60
                                                    months</span>
                                                <h5 class="mb-0 fs-16 text-dark">₹
                                                    <?php echo calPMT($userdetails['apr'], 5, $eligibilityamt); ?>
                                                </h5>
                                                <div class="d-flex justify-content-between mt-5">

                                                    <p class="mb-0 small">Per Month</p>
                                                    <i class="fa-regular fa-calendar-days fs-5"></i>
                                                </div>
                                            </span></label>
                                    </fieldset>
                                </div>

                                <div class="col-6 col-md-6 col-lg-4 mb-15">
                                    <fieldset class="picker1">
                                        <label class="card" for="plan-6">
                                            <input type="radio" name="tenure" id="plan-6" value="72" class="radio">
                                            <span class="plan-details">
                                                <span class="plan-type h6 text-uppercase mb-10 text-success">72
                                                    months</span>
                                                <h5 class="mb-0 fs-16 text-dark">₹
                                                    <?php echo calPMT($userdetails['apr'], 6, $eligibilityamt); ?>
                                                </h5>
                                                <div class="d-flex justify-content-between">

                                                    <p class="mb-0 small">Per Month</p>
                                                    <i class="fa-regular fa-calendar-days fs-5"></i>
                                                </div>
                                            </span>
                                        </label>
                                    </fieldset>
                                </div>

                                <div class="col-lg-12 mb-25">


                                    <button type="submit" class="btn btn-green btn-sm js-confetti w-100"
                                        id="formsubmit2"><span class="btn-text">
                                            Choose offer <i class="fa-solid fa-arrow-right"></i></span></button>



                                </div>
                             
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

 <section
    class="section section-theme-10 latest-candidates-block pt-30 pt-md-40 pt-lg-50 pt-xxl-50 pb-30 pb-md-50 pb-lg-60 pb-xxl-60">
    <div class="container">
        <div class="mb-30 mb-md-40">
            <div class="col-12">
                <h4 class="text-center">Loan facility is provided by Our NBFC Partners.</h4>
                <p class="text-center">Your Pre-Approved Loan Offers From</p>
            </div>
        </div>
        <div class="latest-candidates-holder">
            <?php 
          $cnt=1; 
          foreach($roipackages as $row) {
        ?>
            <div class="candidate-frame bg-white">
                <div class="border-bottom text-center pb-20"><img
                        src="<?php echo base_url('assets/images/bank/' . $row->bank_image); ?>" alt="nbfcs offer">
                </div>
                <div>
                    <h6 class="mt-20"><?php echo $row->bank_name; ?></h6>
                    <hr>
                    <p class="" style="margin-bottom: 0.2rem;">Rs. <?php echo formatePriceIndia($eligibilityamt); ?></p>
                    <p class="" style="margin-bottom: 0.2rem;">EMI : Rs.
                        <?php echo calPMT($row->roi, $row->termsyears, $eligibilityamt); ?></p>
                    <p class="" style="margin-bottom: 0.2rem;">ROI : <?php echo $row->roi."%"; ?></p>
                    <p class="" style="margin-bottom: 0.2rem;">Terms : <?php echo $row->termsmonths." months"; ?></p>
                </div>
            </div>
            <?php
        $cnt++;
        } ?>
        </div>
        <div class="text-left mt-5">
            <p class="pt-5"><small>Disclaimer - The above data is tentative and purely on the information provided
                    by
                    you. Final EMI, loan sanction, loan approval, and loan amount depend on customer profile and
                    NBFCs
                    criteria and rules & regulations.</small></p>
        </div>
    </div>

</section>
<div class="modal fade auto-off" id="modal" role="modal" aria-labelledby="modal-label" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-label">How is pre-approved loan offer calculated?</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-justify p-4">
                        <p>The Pre-Approved Loan Offer and the amount mentioned in it are solely shown based on the
                            software calculation done on Monthly Income and Current Monthly EMI entered by you. This
                            'Pre-Approved Loan Offer' is tentative and not the final loan approval – as the final
                            loan
                            approval is given by the bank only, based on the bank's rules and regulations and the
                            customer profile.</p>

                        <p><strong>Reference Calculation:</strong>
                            <br />Consider a person who has entered the following details –
                            <br />Monthly Income: Rs.1,00,000
                            <br />Current Monthly EMI: Rs.30,000
                        </p>

                        <p>Based on these details, the person is left with Rs.70,000 in hand (deducting current EMI)
                            every month. So, according to the general rules of the banks, the EMI of 50% of the
                            in-hand
                            amount can be approved - in this example, it's 35,000. And based on the EMI and rate of
                            interest (12.5% tentatively), the eligible amount is shown in the Pre-Approved Loan
                            Offer -
                            considering the mentioned calculation.</p>

                        <p>Note: Pre-approved loan offer is tentative. It should not be considered as the final loan
                            approval. The final loan approval is given by the bank only, according to their rules
                            and
                            criteria and the customer profile.</p>

                        <p class="m-b-0">Note: As per the details/information entered by the user, even if the
                            actual
                            pre-approved amount is lesser than 2 Lakhs, the pre-approved amount shown on the website
                            will be Rs.2 Lakhs (minimum). And, even if the actual pre-approved amount is more than
                            8.5
                            Lakhs, the pre-approved amount shown on the website will be Rs.8.5 Lakhs (maximum). The
                            pre-approved amount/pre-approved loan offers are tentative – the final loan approval,
                            loan
                            sanction, and disbursement depend on the customer profile and the NBFCs’ rules and
                            regulations.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-green btn-sm mt-10" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    var windowWidth = $(window).width();
    if (windowWidth <= 1024) { //for iPad & smaller devices
        $('#userCollapse').removeClass('show');
    }
});

$(function() {
    $('#submitForm2').on('submit', function(e) {
        $('#formsubmit2').attr('disabled', true);
        $('#formsubmit2').html(
            'Processing... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>'
        );
    });
});
</script>
<script src="<?php echo base_url('assets/celebration/confetti-script.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/celebration/confetti.browser.min.js'); ?>" type="text/javascript"></script>
<?php
$this->load->view('includes/footer-apply');
?>