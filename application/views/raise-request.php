<?php
$this->load->view('includes/header-apply');
?>

<div class="subvisual-block subvisual-theme-1 bg-light-sky d-flex pt-50 pt-md-50 pt-lg-50 pb-30 text-white">
  <div class="pattern-image"></div>
  <div class="container position-relative text-center">
    <div class="row">
      <div class="col-12">
        <div class="subvisual-textbox text-dark pb-0">
          <h1 class="text-white">Raise a Request</h1>
          <p>Useful and Helpful Question & Answers</p>
        </div>
      </div>
    </div>
  </div>
</div>

<main class="main">
  <section class="section section-theme-1 section-faqs pt-35 pt-md-50 pt-lg-75 pt-xl-100 pt-xxl-125 pb-35 pb-md-50 pb-lg-75 pb-xl-100 pb-xxl-125">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="accordion" id="faq-accordion">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <span class="bullet"></span>
                  <span class="title">I paid, but the account has not been created. What should I do?</span>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faq-accordion">
                <div class="accordion-body">
                  <p>This could happen if the payment gateway holds your funds and has yet to credit the company's account. When the funds are credited to the company's account, your account will be created and you will be notified by email. Otherwise, the payment gateway will refund your funds according to their policies.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <span class="bullet"></span>
                  <span class="title">Even after so many days, I have yet to receive my refund. What should I do?</span>
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faq-accordion">
                <div class="accordion-body">
                  <p>This could happen if your funds are held by a bank or payment gateway. It will be refunded in accordance with the bank/payment gateway's rules and regulations.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <span class="bullet"></span>
                  <span class="title">I misunderstood the company’s service/made payment by mistake. Is it possible to receive a refund?</span>
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faq-accordion">
                <div class="accordion-body">
                  <p>The subscription plan payment is only refundable according to the company's cancellation and refund policy. <a href="<?php echo base_url("refund-policy");?>">Click here to know more.</a></p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <span class="bullet"></span>
                  <span class="title">I received pre-approved loan offers based on my eligibility, but I did not receive an actual loan. Why?</span>
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faq-accordion">
                <div class="accordion-body">
                  <p>Please read the terms and conditions to get a clear understanding of what a pre-approval loan offer is.<a href="<?php echo base_url("terms-conditions");?>">Click here</a></p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  <span class="bullet"></span>
                  <span class="title">Who qualifies for a GST return?</span>
                </button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faq-accordion">
                <div class="accordion-body">
                  <p>Anyone who updates their GST information in the portal will receive a GST return.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                  <span class="bullet"></span>
                  <span class="title">I changed my mind and no longer want to use the company's services. Can I get the refund?</span>
                </button>
              </h2>
              <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faq-accordion">
                <div class="accordion-body">
                  <p>The subscription plan payment is only refundable under the company's cancellation and refund policy.<a href="<?php echo base_url("refund-policy");?>">Click here to know more.</a></p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingSeven">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                  <span class="bullet"></span>
                  <span class="title">I am not satisfied with the company's service. What should I do?</span>
                </button>
              </h2>
              <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faq-accordion">
                <div class="accordion-body">
                  <p>We request you to kindly call the company at +91-63682-46433 between 10 AM to 5 PM- Monday to Saturday (only business days). Allow us to discuss your concerns, and we will ensure that you receive the best solutions possible.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingEight">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                  <span class="bullet"></span>
                  <span class="title">What happens if I accidentally make more than one payment? Am I eligible for a refund?</span>
                </button>
              </h2>
              <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#faq-accordion">
                <div class="accordion-body">
                  <p>If a customer makes multiple payments, they are eligible for a refund. You can request a refund within 48 hours of making the payment by visiting the website's Raising A Request section or calling the company's registered phone number.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingNine">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                  <span class="bullet"></span>
                  <span class="title">Can I get a refund if I purchase subscriptions/memberships from multiple companies in your group of companies?</span>
                </button>
              </h2>
              <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#faq-accordion">
                <div class="accordion-body">
                  <p>If a customer purchased subscriptions/memberships from more than one company in our group, they are eligible for a refund. You can request a refund within 48 hours of making the payment by visiting the website's Raising A Request section or calling the company's registered phone number.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <?php if (count($faqlist)) {
                  $cnt = 1;
                  foreach ($faqlist as $row) {
                    $acc_heading = "headingSimple" . $cnt;
                    $acc_collapse = "collapseSimple" . $cnt;
                ?>
                <h2 class="accordion-header" id="<?php echo $acc_heading; ?>">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $acc_collapse; ?>" aria-expanded="false" aria-controls="<?php echo $acc_collapse; ?>">
                    <span class="bullet"></span>
                    <span class="title"><?php echo $row->faq_question; ?></span>
                  </button>
                </h2>
                <div id="<?php echo $acc_collapse; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo $acc_heading; ?>" data-bs-parent="#faq-accordion">
                  <div class="accordion-body">
                    <p><?php echo $row->faq_answer; ?></p>
                  </div>
                </div>
                <?php
                  $cnt++;
                }
              } ?>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="account-box">
              <span class="icon">
                  <img src="<?php echo base_url('assets/images/icons/user-icon.svg'); ?>" alt="user">
              </span>
              <div class="account-box-frame">
                  <div class="form-head">
                      <p>I am,</p>
                  </div>
                  <div class="tab-content">
                      <ul class="nav form-tabs mb-15 mb-md-20">
                          <li>
                              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#nav-tab01" type="button">Customer</button>
                          </li>
                          <li>
                              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-tab02" type="button">Guest User</button>
                          </li>
                      </ul>
                      <div class="tab-pane fade show active" id="nav-tab01">
                          <?php echo form_open('support/submitrequest', array('id' => 'submitFormCustomer', 'class' => 'contact-form', 'novalidate' => 'novalidate')); ?>
                          <div class="row">
                              <input type="hidden" id="usertype" name="usertype" value="1">
                              <div class="form-group col-12 mb-15 mb-md-20">
                                  <input class="form-control" type="text" name="fullname" placeholder="Full Name *" required pattern="^[a-zA-Z ]*$">
                                  <div class="help-block font-small-3"></div>
                              </div>
                              <div class="form-group col-12 mb-15 mb-md-20">
                                  <input class="form-control" type="email" name="emailid" placeholder="Email *" required>
                                  <div class="help-block font-small-3"></div>
                              </div>
                              <div class="form-group col-12 mb-15 mb-md-20">
                                  <input class="form-control" type="text" name="mobile" placeholder="Mobile *" required minlength="10" maxlength="10" inputmode="numeric" data-validation-regex-regex="^[789]\d{9}$" data-validation-regex-message="Enter valid mobile number">
                                  <div class="help-block font-small-3"></div>
                              </div>
                              <div class="col-12 mb-15 mb-md-20">
                                  <input class="form-control" type="text" name="cardnumber" placeholder="Subscription Number" inputmode="numeric">
                              </div>
                              <div class="form-group col-12 mb-15 mb-md-20">
                                  <select class="form-select" name="issuetype" data-placeholder="Query Related To *" required>
                                      <option value="">Query Related To *</option>
                                      <option value="Service Problem">Service Problem</option>
                                      <option value="Payment Issue">Payment Issue</option>
                                      <option value="Technical Problem">Technical Problem</option>
                                      <option value="Eligibility or Pre-Approval Query">Eligibility or Pre-Approval Query</option>
                                      <option value="GST Return Query">GST Return Query</option>
                                      <option value="Other">Other</option>
                                  </select>
                                  <div class="help-block font-small-3"></div>
                              </div>
                              <div class="form-group col-12 mb-15 mb-md-20">
                                  <textarea class="form-control" name="message" cols="30" rows="10" placeholder="Request Message *" style="height: 150px" required minlength="50"></textarea>
                                  <div class="help-block font-small-3"></div>
                              </div>
                              <div class="col-12">
                                  <button class="btn btn-green btn-sm" type="submit" id="form-submitCustomer"><span class="btn-text">SUBMIT REQUEST</span></button>
                              </div>
                              <p class="mb-0" id="responsemessageCustomer"></p>
                          </div>
                          <?php echo form_close(); ?>
                      </div>
                      <div class="tab-pane fade" id="nav-tab02">
                          <?php echo form_open('support/submitrequest', array('id' => 'submitFormGuest', 'class' => 'contact-form', 'novalidate' => 'novalidate')); ?>
                          <div class="row">
                              <input type="hidden" id="usertype" name="usertype" value="0">
                              <div class="form-group col-12 mb-15 mb-md-20">
                                  <input class="form-control" type="text" name="fullname" placeholder="Full Name *" required pattern="^[a-zA-Z ]*$">
                                  <div class="help-block font-small-3"></div>
                              </div>
                              <div class="form-group col-12 mb-15 mb-md-20">
                                  <input class="form-control" type="email" name="emailid" placeholder="Email *" required>
                                  <div class="help-block font-small-3"></div>
                              </div>
                              <div class="form-group col-12 mb-15 mb-md-20">
                                  <input class="form-control" type="text" name="mobile" placeholder="Mobile *" required minlength="10" maxlength="10" inputmode="numeric" data-validation-regex-regex="^[789]\d{9}$" data-validation-regex-message="Enter valid mobile number">
                                  <div class="help-block font-small-3"></div>
                              </div>
                              <div class="col-12 mb-15 mb-md-20">
                                  <input class="form-control" type="text" name="cardnumber" placeholder="Subscription Number" inputmode="numeric">
                              </div>
                              <div class="form-group col-12 mb-15 mb-md-20">
                                  <select class="form-select" name="issuetype"  required>
                                      <option value="">Query Related To *</option>
                                      <option value="Service Problem">Service Problem</option>
                                      <option value="Payment Issue">Payment Issue</option>
                                      <option value="Technical Problem">Technical Problem</option>
                                      <option value="Eligibility or Pre-Approval Query">Eligibility or Pre-Approval Query</option>
                                      <option value="GST Return Query">GST Return Query</option>
                                      <option value="Other">Other</option>
                                  </select>
                                  <div class="help-block font-small-3"></div>
                              </div>
                              <div class="form-group col-12 mb-15 mb-md-20">
                                  <textarea class="form-control" name="message" cols="30" rows="10" placeholder="Request Message *" style="height: 150px" required minlength="50"></textarea>
                                  <div class="help-block font-small-3"></div>
                              </div>
                              <div class="col-12">
                                  <button class="btn btn-green btn-sm" type="submit" id="form-submitGuest"><span class="btn-text">SUBMIT REQUEST</span></button>
                              </div>
                              <p class="mb-0" id="responsemessageGuest"></p>
                          </div>
                          <?php echo form_close(); ?>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
$this->load->view('includes/footer');
?>

<script type="text/javascript">
  $(function () {
      $('#submitFormCustomer').on('submit', function (e) {
          e.preventDefault();
          submitForm($(this), '#form-submitCustomer', '#responsemessageCustomer');
      });

      $('#submitFormGuest').on('submit', function (e) {
          e.preventDefault();
          submitForm($(this), '#form-submitGuest', '#responsemessageGuest');
      });

      function submitForm(form, submitButtonId, responseMessageId) {
          $.ajax({
              url: form.attr('action') || window.location.pathname,
              type: "POST",
              data: form.serialize(),
              dataType: "JSON",
              cache: false,
              processData: false,
              beforeSend: function () {
                  $(submitButtonId).html('SUBMITTING... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>');
                  $(submitButtonId).attr('disabled', true);
              },
              success: function (response) {
                  if (response['success'] == true) {
                      toastr.success(response['message']);
                  } else {
                      toastr.error(response['message']);
                  }
                  $(responseMessageId).html(response['message']);
                  setTimeout(function () {
                      location.reload();
                  }, 10000);
              },
              error: function (jXHR, textStatus, errorThrown) {
                  $(submitButtonId).html('SUBMIT REQUEST');
                  $(submitButtonId).attr('disabled', false);
                  toastr.error(errorThrown, 'ERROR');
              }
          });
      }
  });
</script>