<?php
$this->load->view('includes/header-offer.php');
?>

    <main class="main">
      <section class="section section-theme-1 section-how-works pt-40">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 offset-lg-4 d-block d-sm-none d-md-none d-lg-none">
              <?php $lendingimages = array('myf-icon-1.png', 'myf-icon-2.png', 'myf-icon-3.png', 'myf-icon-4.png') ?>
              <div class="bankoffers" data-slick='{"arrows": false}'>
                <?php foreach ($lendingimages as $row) { ?>
                  <div class="image d-flex justify-content-center"><img
                      src="<?php echo base_url() ?>assets/images/lending_img/<?php echo $row ?>" alt=""></div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="matched-jobs-block d-flex justify-content-center">
              <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="account-box"> 
                  <?php if ($processstep == 'step1') { ?>
                    <div class="account-box-frame text-dark">
                      <div class="">
                        <h4 style="line-height: 34px;font-size:24px;">Get <div class="range" style="display: inline-block;">
                          <div class="range__value">
                            <span style="color: #3a3b97;font-weight: 800;"></span>
                          </div>
                        </div> Personal Loan in Minutes!</h4>
                      
                      </div>
                      <?php echo form_open('onlineprocess/sendotpCode', array('id' => 'submitForm1', 'class' => 'contac-form mb-0', 'novalidate' => 'novalidate')); ?>
                      <div class="row">
                        <div class="col-12 mb-15">
                          <div class="form-group">
                            <div class="range">
                              <div class="range__slider">
                                <input type="range" name="loanamount" step="10000">
                              </div>
                              <div class="mt-3 mb-2"><small>Estimated EMI based on interest rate of 11.5% and tenure of 72
                                  months.</small></div>
                              <div class="range__emi">
                                <label>EMI Amount : </label>
                                <span class="fs-5"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 mb-25">
                          <div class="form-group error">
                            <input class="form-control" type="text" placeholder="Enter Your Mobile No" id="mobile"
                              name="mobile" required minlength="10" maxlength="10" inputmode="numeric"
                              data-validation-regex-regex="^[6789]\d{9}$"
                              data-validation-regex-message="Enter valid mobile number">
                            <div class="help-block"></div>
                          </div>
                        </div>
                        <div class="text-danger mt-3 mb-3" id="mobilenoError1"></div>
                        <div class="col-12 mb-25">
                          <button type="submit" id="formsubmit1" class="btn btn-green btn-sm"><span class="btn-text">Apply Now</span></button>
                        </div>

                        <div class="col-12 mb-2">
                          <div class="form-group mb-0 ps-0">
                            <input type="checkbox" name="tandc" id="tandc" class="custom-control-input mb-0" value="1"
                              style="width:auto;height:auto" checked required>
                            <label class="custom-control-label" for="tandc"
                              style="display:unset;font-size:70%;color:#000;letter-spacing: 0.7px;">By submitting the
                              form and proceeding, you agree to the <a href="<?= base_url('terms-conditions') ?>"
                                target="_blank" style="text-decoration: none;" class="text-dark">Terms of Use</a>
                              and <a href="<?= base_url('privacy-policy') ?>" target="_blank"
                                style="text-decoration: none;" class="text-dark">Privacy Policy</a> of
                              indiafinproo.</label>
                            <div class="help-block ms-0 ps-0 mb-2"></div>
                          </div>
                        </div>
                        <div class="col-12 mb-2">
                          <div class="form-group mb-3 ps-0">
                            <input type="checkbox" name="promotion" id="promotion" class="custom-control-input mb-0"
                              value="1" style="width:auto;height:auto" checked required>
                            <label class="custom-control-label" for="promotion"
                              style="display:unset;font-size:70%;color:#000;letter-spacing: 0.7px;">I agree to receive
                              promotional & informational communications from indiafinproo through Emails, calls or SMS
                              Services.</label>
                            <div class="help-block ms-0 ps-0 mb-2"></div>
                          </div>
                        </div>
                      </div>
                      <?php echo form_close(); ?>
                      <div class="bankoffer" data-slick='{"arrows": false}'>
                        <?php foreach ($banklist as $row) { ?>
                          <div class="image d-flex justify-content-center" style="padding: 10px;"><img
                              src="<?= base_url('assets/images/bank/' . $row->bank_image) ?>" alt="<?= $row->bank_name ?>"></div>
                        <?php } ?>
                      </div>
                    </div>
                  <?php } else if ($processstep == 'step2') { ?>
                      <div class="account-box-frame text-dark">
                        <div class="">
                          <h6>Please enter the received OTP</h6>
                          <p>Mobile No. : <?php echo $userdetails['mobile']; ?></p>
                        </div>
                      <?php echo form_open('onlineprocess/checkotpCode', array('id' => 'submitForm2', 'class' => 'contac-form', 'novalidate' => 'novalidate')); ?>
                        <div class="row">
                          <input type="hidden" name="otpmobile" id="otpmobile" value="<?php echo $userdetails['mobile']; ?>">
                          <input type="hidden" name="loanamount" id="loanamount"
                            value="<?php echo $userdetails['loanamount']; ?>">
                          <div class="col-12 mb-15 mb-md-20">
                            <div class="form-group error">
                              <input class="form-control" type="text" id="otpcode" name="otpcode" placeholder="- - - -"
                                maxlength="4" required inputmode="numeric" data-validation-regex-regex="(\d)+"
                                data-validation-regex-message="Enter valid OTP">
                              <div class="help-block"></div>
                            </div>
                          </div>
                          <div class="col-12 mb-15 mb-md-20">
                            <div class="form-group">
                            <div class="p-countdown" data-delay="30">
                              <div class="p-countdown-count" id="counttime">
                                <code>New OTP code will generate in <span id="timer">30</span> Sec</code>
                              </div>
                              <div id="resendBtn" class="d-none">
                                <code>Didn’t receive OTP? <a href="javascript:resendotp()">Resend OTP</a></code>
                              </div>
                              <code id="resend-message"></code>
                              <div class="custom-error" id="otpcodeError"></div>
                            </div>
                            <div class="custom-error" id="otpcodeError"></div>
                            </div>
                          </div>
                          <div class="col-12">
                            <button type="submit" id="formsubmit2" class="btn btn-green btn-sm"><span class="btn-text">Verify
                                OTP</span></button>
                          </div>
                        </div>
                      <?php echo form_close(); ?>
                      </div>
                  <?php } else if ($processstep == 'step3') { ?>
                        <div class="account-box-frame text-dark">
                          <div class="">
                            <h6>Choose your profile and fill-in details</h6>
                            <p class="mb-0" style="font-size:14px"> <strong>Loan Amount. : <?php echo formatePriceIndia($userdetails['loanamount']); ?></strong></p>
                            <p style="font-size:14px"> <strong> Mobile No. : <?php echo $userdetails['mobile']; ?></strong></p>
                          </div>
                      <?php echo form_open('onlineprocess/registeredUser', array('id' => 'submitForm3', 'class' => 'contac-form', 'novalidate' => 'novalidate')); ?>
                          <div class="row">
                            <input type="hidden" id="loanamount" name="loanamount"
                              value="<?php echo $userdetails['loanamount']; ?>">
                            <input type="hidden" id="referralcode" name="referralcode"
                              value="<?php echo $userdetails['referralcode']; ?>">
                            <input type="hidden" id="usermobile" name="usermobile" value="<?php echo $userdetails['mobile']; ?>">

                            <div class="size-details">
                              <ul class="nav form-tabs mb-15 mb-md-20" id="mylist">
                                <li data-value="1">
                                  <button class="nav-link active-size active" data-bs-toggle="tab" data-bs-target="#nav-tab01"
                                    type="button">Salaried</button>
                                </li>
                                <li data-value="2">
                                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-tab02"
                                    type="button">Self-Employed</button>
                                </li>
                              </ul>
                              <input type="hidden" id="usertype" name="usertype" value="1">
                            </div>

                            <div class="col-12 mb-15 mb-md-20">
                              <div class="form-group">
                                <input class="form-control" type="text" id="username" name="username"
                                  placeholder="Bank Registered Name" required data-validation-regex-regex="^[a-zA-Z ]*$">
                                <div class="help-block"></div>
                              </div>
                            </div>
                            <div class="col-12 mb-15 mb-md-20">
                              <div class="form-group">
                                <input class="form-control" type="email" id="useremail" name="useremail" placeholder="Email Id"
                                  required>
                                <div class="help-block"></div>
                              </div>
                            </div>
                            <div class="col-12">
                              <button type="submit" id="formsubmit3" class="btn btn-green btn-sm"><span
                                  class="btn-text">Process</span></button>
                            </div>
                          </div>
                      <?php echo form_close(); ?>
                        </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>
        <section class="testi_home_area pb-4">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 offset-lg-4 d-block d-sm-none d-md-none d-lg-none">
                 <?php $testimoniallists = array('offer1.png', 'offer2.png', 'offer5.png', 'offer6.png', 'offer7.png', 'offer9.png') ?>
                <div class="companies-slider" data-slick='{"arrows": false, "dots":false}'>
                  <?php foreach ($testimoniallists as $row) { ?>
                    <div class="image d-flex justify-content-center"><img
                        src="<?php echo base_url() ?>assets/images/lending_img/<?php echo $row ?>" alt=""></div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </section>
      <section class="top_companies_block section-theme-7 pb-5">
        <div class="container">
          <header>
            <h4 class="text-center">NBFC Personal Loan Criteria</h4>
            <p class="text-center">Check if you meet the following basic requirements before applying.</p>
          </header>
          <div class="top_talent_holder mb-0">
            <div class="left_align">
              <div class="detail_box candidate">
                <div class="text_wrap">
                  <strong class="h5">Salaried Employees</strong>
                  <ul class="list-unstyled list">
                    <li><img src="<?= base_url('assets/img/icons/check.svg') ?>" alt=""> Minimum Age - 21 Years
                    </li>
                    <li><img src="<?= base_url('assets/img/icons/check.svg') ?>" alt=""> Minimum Salary - Rs. 15,000/month</li>
                    <li><img src="<?= base_url('assets/img/icons/check.svg') ?>" alt=""> 1 Year Job Stability</li>
                  </ul>
                </div>
                <div class="img_wrap">
                  <img src="<?php echo base_url('assets/images/img/lending-3.png'); ?>" alt="img">
                </div>
              </div>
            </div>
            <div class="right_align">
              <div class="detail_box candidate">
                <div class="text_wrap">
                  <strong class="h5">Self-employed Individuals</strong>
                  <ul class="list-unstyled list">
                    <li><img src="<?= base_url('assets/img/icons/check.svg') ?>" alt=""> Minimum Age - 21 Years</li>
                    <li><img src="<?= base_url('assets/img/icons/check.svg') ?>" alt=""> Income Tax Return of Minimum 1 Year</li>
                    <li><img src="<?= base_url('assets/img/icons/check.svg') ?>" alt=""> 1 Year Business Stability</li>
                  </ul>
                </div>
                <div class="img_wrap">
                  <img src="<?php echo base_url('assets/images/img/lending-4.png'); ?>" alt="img">
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section section-contact section-theme-1 bg-light-gray">
        <div class="container">
          <p class="mb-0"><strong>Disclaimer : </strong>Loan tenure ranging up to 72 months with Annual Interest Rates ranging between 11.5% - 36%. Processing fee up
            to 2%. For Example: Considering a personal loan of Rs.1,00,000 availed at 11.5% interest rate for a tenure of 6
            years with 2% processing fee, the APR will be 12.26%. *T&C Apply. All these numbers are tentative/indicative,
            the final loan specifics may vary depending upon the customer profile and NBFCs' criteria, rules & regulations,
            and terms & conditions. The amount paid is only for the service charge. We are not lenders and do not guarantee any loan approval.</p>

          <p class="mb-0"><strong>Important Note : </strong>BE AWARE! We ask our customers to make payments ONLY on our website <a class="text-dark" href="<?php echo COMPANY_SITE; ?>">indiafinproo.com</a> and NOT through any other source, directly or indirectly. Thanks!</p>

          <p class="mb-0"><strong>Company Address : </strong><?php echo COMPANY_ADDRESS; ?></p>
        </div>
      </section>

    </main>
    
    <?php $this->load->view('includes/footer-apply'); ?>

    <script src="<?php echo base_url('assets/js/loanscript.js'); ?>" type="text/javascript"></script>

    <script type="text/javascript">
      $('#mylist li').click(function () {
        $('#usertype').val($(this).data('value'));
      });

      function resendotp() {
        loanamount = document.getElementById('loanamount').value;
        mobile = document.getElementById('otpmobile').value;

        $.ajax({
          url: '<?php echo base_url("onlineprocess/resendotpCode"); ?>',
          type: "POST",
          data: 'mobile=' + mobile + '&loanamount=' + loanamount,
          dataType: "JSON",
          cache: false,
          processData: false,
          success: function (response) {
            if (response['success'] == true) {
              $('#resend-message2').html(response['message']);
              toastr.success(response['message']);
            } else {
              toastr.error(response['message']);
            }
          },
          error: function (jXHR, textStatus, errorThrown) {
            toastr.error(errorThrown, 'ERROR');
          }
        });
      }

      $(function () {
        $('#submitForm1').on('submit', function (e) {
          e.preventDefault();

          $.ajax({
            url: $(this).attr('action') || window.location.pathname,
            type: "POST",
            data: $(this).serialize(),
            dataType: "JSON",
            cache: false,
            processData: false,
            beforeSend: function () {
              $('#formsubmit1').html('Applying... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>');
              $('#formsubmit1').attr('disabled', true);
            },
            success: function (response) {
              if (response['success'] == true) {
                if (response['redirect_url'] != "") {
                  window.location.href = response['redirect_url'];
                } else {
                  window.location = "./applynow/s2/" + response['mobile'];
                }
              } else {
                $('#mobilenoError1').html(response['message']);
                toastr.error(response['message']);
              }

              $('#formsubmit1').html('Apply Now');
              $('#formsubmit1').attr('disabled', false);
            },
            error: function (jXHR, textStatus, errorThrown) {
              toastr.error(errorThrown, 'ERROR');
              $('#formsubmit1').html('Apply Now');
              $('#formsubmit1').attr('disabled', false);
            }
          });
        });

        $('#submitForm2').on('submit', function (e) {
          e.preventDefault();
          $('#resend-message2').html('');
          $('#otpcodeError').html('');

          $.ajax({
            url: $(this).attr('action') || window.location.pathname,
            type: "POST",
            data: $(this).serialize(),
            dataType: "JSON",
            cache: false,
            processData: false,
            beforeSend: function () {
              $('#formsubmit2').html('Verifying... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>');
              $('#formsubmit2').attr('disabled', true);
            },
            success: function (response) {
              if (response['success'] == true) {
                window.location = "../../applynow/s3/" + response['mobile'];
              } else {
                $('#otpcodeError').html(response['message']);
                toastr.error(response['message']);
              }

              $('#formsubmit2').html('Verify OTP');
              $('#formsubmit2').attr('disabled', false);
            },
            error: function (jXHR, textStatus, errorThrown) {
              toastr.error(errorThrown, 'ERROR');
              $('#formsubmit2').html('Verify OTP');
              $('#formsubmit2').attr('disabled', false);
            }
          });
        });


        $('#submitForm3').on('submit', function (e) {
          e.preventDefault();
          $('#resend-message2').html('');
          $('#otpcodeError').html('');

          $.ajax({
            url: $(this).attr('action') || window.location.pathname,
            type: "POST",
            data: $(this).serialize(),
            dataType: "JSON",
            cache: false,
            processData: false,
            beforeSend: function () {
              $('#formsubmit3').html('Processing... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>');
              $('#formsubmit3').attr('disabled', true);
            },
            success: function (response) {
              if (response['success'] == true) {
                window.location.href = response['redirect_url'];
              } else {
                $('#otpcodeError').html(response['message']);
                toastr.error(response['message']);
              }

              $('#formsubmit3').html('Process');
              $('#formsubmit3').attr('disabled', false);
            },
            error: function (jXHR, textStatus, errorThrown) {
              toastr.error(errorThrown, 'ERROR');
              $('#formsubmit3').html('Process');
              $('#formsubmit3').attr('disabled', false);
            }
          });
        });
      });
      const color = $(".size-details li");

      color.on("click", function () {
        $(".size-details ul li").removeClass("active-size");
        $(this).addClass("active-size");
      });
    </script>

    

<script>

   document.addEventListener("DOMContentLoaded", function () {

    let resendBtn = document.getElementById('resendBtn');
    let counttime = document.getElementById('counttime'); 
    let timerDisplay = document.getElementById('timer');
    let countdown = 30;

    let interval = setInterval(() => {
        countdown--;
        timerDisplay.textContent = countdown;

        if (countdown <= 0) {
            clearInterval(interval);
            resendBtn.classList.remove('d-none');
            counttime.classList.add('d-none');
            timerDisplay.textContent = '';
        }
    }, 1000);

    resendBtn.addEventListener('click', function () {
        resendBtn.classList.add('d-none');
        counttime.classList.remove('d-none');
        countdown = 30;
        timerDisplay.textContent = countdown;

        interval = setInterval(() => {
            countdown--;
            timerDisplay.textContent = countdown;

            if (countdown <= 0) {
                clearInterval(interval);
                resendBtn.classList.remove('d-none');
                counttime.classList.add('d-none');
                timerDisplay.textContent = '';
            }
        }, 1000);
    });
});

  </script>
