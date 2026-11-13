<?php
$this->load->view('includes/header-offer.php');
$today = date("Y-m-d", strtotime($userdetails['rec_date']));
$last30 = date('Y-m-d', strtotime('-30 days'));
if ($today <= $last30) {
  $eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']) + 100000;
} else {
  $eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);
}
$eligibilityamtindia = formatePriceIndia($eligibilityamt);
?>

<main class="main d-flex flex-column min-vh-100">
  <section class="section section-theme-1 packages-block pt-40">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-8 mb-15 mb-md-30">
          <div class="block-holder form-condidates">
            <div class="subhead">
              <h4><?php echo $userdetails['loanname']; ?></h4>
              <p class="mb-0">Pre-Approved Offer : Congratulations! You're Eligible For <strong class="text-success">Rs. <?php echo $eligibilityamtindia; ?></strong> Pre-Approval Offered By Our Partnered NBFCs.</p>
              <p class="mb-0">Choose your suitable EMI option:</p>
            </div>
            <?php echo form_open('onlineprocess/getpreApproval', array('id' => 'submitForm2', 'class' => '', 'novalidate' => 'novalidate')); ?>
            <div class="row">

              <input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>" class="form-control"
                required>
              <input type="hidden" name="userid" value="<?php echo $userdetails['userid']; ?>" class="form-control"
                required>
              <input type="hidden" name="mobile" value="<?php echo $userdetails['mobile']; ?>" class="form-control"
                required>
              <input type="hidden" name="cardtype" value="<?php echo $userdetails['cardtype']; ?>" class="form-control"
                required>
              <input type="hidden" name="tenure" id="tenure" value="36" class="form-control" required>
              <input type="hidden" name="eligibilityamt" value="<?php echo $eligibilityamt; ?>" class="form-control"
                required>

              <div class="col-6 col-md-6 col-lg-4 mb-15">
                <fieldset class="picker1">
                  <label class="card" for="plan-1">
                    <input type="radio" name="tenure" id="plan-1" value="12" class="radio" checked="">
                    <span class="plan-details">
                      <span class="plan-type">12 months</span>
                      <p class="mb-0 fs-16"><small>Monthly EMI</small><br>Rs.
                        <?php echo calPMT($userdetails['apr'], 1, $eligibilityamt); ?>
                      </p>
                    </span></label>
                </fieldset>
              </div>

              <div class="col-6 col-md-6 col-lg-4 mb-15">
                <fieldset class="picker1">
                  <label class="card" for="plan-2">
                    <input type="radio" name="tenure" id="plan-2" value="24" class="radio">
                    <span class="plan-details">
                      <span class="plan-type">24 months</span>
                      <p class="mb-0 fs-16"><small>Monthly EMI</small><br>Rs.
                        <?php echo calPMT($userdetails['apr'], 2, $eligibilityamt); ?>
                      </p>
                    </span></label>
                </fieldset>
              </div>

              <div class="col-6 col-md-6 col-lg-4 mb-15">
                <fieldset class="picker1">
                  <label class="card" for="plan-3">
                    <input type="radio" name="tenure" id="plan-3" value="36" class="radio">
                    <span class="plan-details">
                      <span class="plan-type">36 months</span>
                      <p class="mb-0 fs-16"><small>Monthly EMI</small><br>Rs.
                        <?php echo calPMT($userdetails['apr'], 3, $eligibilityamt); ?>
                      </p>
                    </span></label>
                </fieldset>
              </div>

              <div class="col-6 col-md-6 col-lg-4 mb-15">
                <fieldset class="picker1">
                  <label class="card" for="plan-4">
                    <input type="radio" name="tenure" id="plan-4" value="48" class="radio">
                    <span class="plan-details">
                      <span class="plan-type">48 months</span>
                      <p class="mb-0 fs-16"><small>Monthly EMI</small><br>Rs.
                        <?php echo calPMT($userdetails['apr'], 4, $eligibilityamt); ?>
                      </p>
                    </span></label>
                </fieldset>
              </div>

              <div class="col-6 col-md-6 col-lg-4 mb-15">
                <fieldset class="picker1">
                  <label class="card" for="plan-5">
                    <input type="radio" name="tenure" id="plan-5" value="60" class="radio">
                    <span class="plan-details">
                      <span class="plan-type">60 months</span>
                      <p class="mb-0 fs-16"><small>Monthly EMI</small><br>Rs.
                        <?php echo calPMT($userdetails['apr'], 5, $eligibilityamt); ?>
                      </p>
                    </span></label>
                </fieldset>
              </div>

              <div class="col-6 col-md-6 col-lg-4 mb-15">
                <fieldset class="picker1">
                  <label class="card" for="plan-6">
                    <input type="radio" name="tenure" id="plan-6" value="72" class="radio">
                    <span class="plan-details">
                      <span class="plan-type">72 months</span>
                      <p class="mb-0 fs-16"><small>Monthly EMI</small><br>Rs.
                        <?php echo calPMT($userdetails['apr'], 6, $eligibilityamt); ?>
                      </p>
                    </span>
                  </label>
                </fieldset>
              </div>

              <div class="col-12 pt-10 text-center">
                <button type="submit" class="btn btn-green btn-sm js-confetti" id="formsubmit2"><span class="btn-text">Get
                    Offer</span></button>
              </div>
            </div>
             <div class="text-center m-b-0">
                                    <hr />
                                    <p class="m-b-0"><small>How is pre-approved loan offer calculated? <a
                                                class="text-success" data-bs-target="#modal" data-bs-toggle="modal"
                                                href="#">Know Here</a></small></p>
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
                      <span class="step-number">2/4</span>
                      <svg>
                        <circle class="step-2" cx="30" cy="30" r="28" stroke-width="4" fill="none" role="slider"
                          aria-orientation="vertical" aria-valuemin="0" aria-valuemax="100" aria-valuenow="50"></circle>
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

  <section class="section section-theme-10 latest-candidates-block bg-light-sky pt-30 pt-md-40 pt-lg-50 pt-xxl-50 pb-30 pb-md-50 pb-lg-60 pb-xxl-60">
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
            <div class="border-bottom text-center pb-20"><img src="<?php echo base_url('assets/images/bank/' . $row->bank_image); ?>" alt="nbfcs offer"></div>
            <div>
              <h6 class="mt-20"><?php echo $row->bank_name; ?></h6>
              <p class="">Rs. <?php echo formatePriceIndia($eligibilityamt); ?></p>
              <p class="">EMI : Rs. <?php echo calPMT($row->roi, $row->termsyears, $eligibilityamt); ?></p>
              <p class="">ROI : <?php echo $row->roi."%"; ?></p>
              <p class="">Terms : <?php echo $row->termsmonths." months"; ?></p>
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
  <div class="modal fade auto-off" id="modal" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none;">
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
                            'Pre-Approved Loan Offer' is tentative and not the final loan approval – as the final loan
                            approval is given by the bank only, based on the bank's rules and regulations and the
                            customer profile.</p>

                        <p><strong>Reference Calculation:</strong>
                            <br />Consider a person who has entered the following details –
                            <br />Monthly Income: Rs.1,00,000
                            <br />Current Monthly EMI: Rs.30,000
                        </p>

                        <p>Based on these details, the person is left with Rs.70,000 in hand (deducting current EMI)
                            every month. So, according to the general rules of the banks, the EMI of 50% of the in-hand
                            amount can be approved - in this example, it's 35,000. And based on the EMI and rate of
                            interest (12.5% tentatively), the eligible amount is shown in the Pre-Approved Loan Offer -
                            considering the mentioned calculation.</p>

                        <p>Note: Pre-approved loan offer is tentative. It should not be considered as the final loan
                            approval. The final loan approval is given by the bank only, according to their rules and
                            criteria and the customer profile.</p>

                        <p class="m-b-0">Note: As per the details/information entered by the user, even if the actual
                            pre-approved amount is lesser than 2 Lakhs, the pre-approved amount shown on the website
                            will be Rs.2 Lakhs (minimum). And, even if the actual pre-approved amount is more than 8.5
                            Lakhs, the pre-approved amount shown on the website will be Rs.8.5 Lakhs (maximum). The
                            pre-approved amount/pre-approved loan offers are tentative – the final loan approval, loan
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
</main>

<script type="text/javascript">
  $(document).ready(function () {
    var windowWidth = $(window).width();
    if (windowWidth <= 1024) { //for iPad & smaller devices
      $('#userCollapse').removeClass('show');
    }
  });

  $(function () {
    $('#submitForm2').on('submit', function (e) {
      $('#formsubmit2').attr('disabled', true);
      $('#formsubmit2').html('Processing... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>');
    });
  });
</script>
<script src="<?php echo base_url('assets/celebration/confetti-script.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/celebration/confetti.browser.min.js'); ?>"type="text/javascript"></script>
<?php
$this->load->view('includes/footer-apply');
?>