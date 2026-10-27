<?php
$this->load->view('includes/header-apply.php');
?>

<section class="visual-block visual-theme-5 bg-dark hero-section text-black pt-40 pt-md-40 pt-xl-40">
    <div class="container">
        <div class="row justify-content-between align-items-lg-center  align-items-md-end">
            <div class="col-12 col-md-6 col-lg-7 col-xl-7 order-2">

                <div class="visual-textbox pt-0">
                    <h2 class="text-light">Your Loan Search <br> Starts Here </h2>
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
            <div class="col-12 col-md-6 col-lg-5 col-xl-5 order-md-2 order-1 mb-lg-0 mb-15">
                <div class="account-box">
                    <?php if ($processstep == 'step1') { ?>
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

                        <div class="account-box-frame text-dark bg-white pt-10 ">
                            <div class="text-center">
                                <h6 class="text-black">Apply For <div class="range d-inline-block">
                                        <div class="">
                                            <span class="text-success fs-5 text-color-blue">₹10 Lakhs</span> Loan in
                                            Minutes!
                                        </div>
                                    </div>
                                </h6>
                                <small>Start off the process with just a few details</small>
                            </div>
                            <?php echo form_open('onlineprocess/sendotpCode', array('id' => 'submitForm1', 'class' => 'contac-form mb-0', 'novalidate' => 'novalidate')); ?>
                            <div class="row">
                                <div class="col-12 mb-15">
                                    <div class="form-group">
                                        <div class="range">

                                            <div
                                                class="d-flex justify-content-between required-amount mt-20 align-items-center">
                                                <span class="text-uppercase mb-0 fa-xs lh-normal">Enter Required
                                                    Amount</span>
                                                <h6 class="text-uppercase mb-0">
                                                    <div class="range__value pt-0">
                                                        <span class="fs-5 text-color-blue fw-bold"></span>
                                                    </div>
                                                </h6>
                                            </div>
                                            <div class="range__slider">
                                                <input type="range" name="loanamount" step="10000">
                                            </div>
                                            <div class="d-flex justify-content-between required-price mb-10 mt-10">

                                                <span class="text-uppercase mb-0 fa-xs lh-normal">₹10,000</span>
                                                <span class="text-uppercase mb-0 fa-xs lh-normal">₹10,00,000</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group error">
                                        <label class="text-uppercase mb-20 fa-xs fw-bold">Mobile number</label>
                                        <div class="input-group mb-15">
                                            <span class="input-group-text text-dark fw-bold rounded-0 py-0 px-15"
                                                id="basic-addon1">+91</span>
                                            <input class="form-control" type="text" placeholder="Bank-registered number"
                                                id="mobile" name="mobile" required minlength="10" maxlength="10"
                                                inputmode="numeric" data-validation-regex-regex="^[6789]\d{9}$"
                                                data-validation-regex-message="Enter valid mobile number">
                                        </div>
                                        <div class="help-block"></div>

                                    </div>
                                </div>

                                <div class="text-danger mt-3 mb-3" id="mobilenoError1"></div>
                                <div class="col-12 mb-3">
                                    <button type="submit" id="formsubmit1"
                                        class="btn btn-green btn-sm text-uppercase"><span class="btn-text">Start
                                            Process <i class="fa-solid fa-arrow-right"></i></span></button>
                                </div>
                                <div class="col-12 mt-20">
                                    <div class="form-group mb-10 ps-0">
                                        <div class="d-flex align-items-start "> <input type="checkbox" name="tandc"
                                                id="tandc" class="custom-control-input mb-0 mt-5" value="1" checked
                                                required>
                                            <label class="custom-control-label" for="tandc"><small
                                                    class="ms-10 d-block fw-normal" style="font-size:12px">By submitting
                                                    the
                                                    form & proceeding, you agree to the <a
                                                        href="<?= base_url('terms-conditions') ?>" target="_blank"
                                                        style="text-decoration: none;" class="text-dark">Terms of
                                                        Use</a>
                                                    and <a href="<?= base_url('privacy-policy') ?>" target="_blank"
                                                        style="text-decoration: none;" class="text-dark">Privacy
                                                        Policy</a></small></label>

                                        </div>
                                        <div class="help-block ms-0 ps-0 mb-2"></div>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-group mb-15 ps-0">
                                        <div class="d-flex align-items-start ">
                                            <input type="checkbox" name="promotion" id="promotion"
                                                class="custom-control-input mb-0 mt-5" value="1" checked required>
                                            <label class="custom-control-label" for="promotion"><small
                                                    class="ms-10 d-block fw-normal" style="font-size:12px">
                                                    I
                                                    agree to receive
                                                    promotional & informational communications from indiafinproo
                                                    through
                                                    Emails, calls or SMS
                                                    Services.
                                                </small></label>
                                        </div>
                                        <div class="help-block ms-0 ps-0 mb-2"></div>
                                    </div>
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
                        </div>
                        <?php echo form_close(); ?>

                    </div>
                    <?php } else if ($processstep == 'step2') { ?>
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
                            <div class="">
                                <h5 class="mb-10 text-start fw-bold">Verify your mobile</h5>
                                <p class="fw-normal"><small>We've sent a 4-digit OTP to
                                        <strong><?php echo $userdetails['mobile']; ?></strong></small>
                                </p>

                            </div>
                            <?php echo form_open('onlineprocess/checkotpCode', array('id' => 'submitForm2', 'class' => 'contac-form', 'novalidate' => 'novalidate')); ?>
                            <div class="row">
                                <input type="hidden" name="otpmobile" id="otpmobile"
                                    value="<?php echo $userdetails['mobile']; ?>">
                                <input type="hidden" name="loanamount" id="loanamount"
                                    value="<?php echo $userdetails['loanamount']; ?>">
                                <div class="col-12 mb-15 mb-md-20">
                                    <div class="form-group error">
                                        <label class="text-uppercase mb-20 fa-xs fw-bold">Enter OTP</label>
                                        <div class="input-field text-center">
                                            <input type="number" maxlength="1" inputmode="numeric" pattern="[0-9]*"
                                                id="otpcode" name="otpcode[]" class="me-md-0 me-2 otp-input">
                                            <input type="number" maxlength="1" inputmode="numeric" pattern="[0-9]*"
                                                id="otpcode" name="otpcode[]" class="me-md-0 me-2 otp-input">
                                            <input type="number" maxlength="1" inputmode="numeric" pattern="[0-9]*"
                                                id="otpcode" name="otpcode[]" class="me-md-0 me-2 otp-input">
                                            <input type="number" maxlength="1" inputmode="numeric" pattern="[0-9]*"
                                                id="otpcode" name="otpcode[]" class="me-md-0 me-2 otp-input">
                                        </div>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="col-lg-8 col-md-6 col-6">
                                        <div class="form-group">
                                            <div class="p-countdown" data-delay="30">
                                                <div class="p-countdown-count" id="counttime">
                                                    <code>New OTP in <span id="timer">30</span> Sec</code>
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
                                    <div class="col-lg-4 col-md-6 col-6">
                                        <div
                                            class="title-text d-flex justify-content-md-end justify-content-start align-items-center">

                                            <h6 class="fw-light mb-0 ms-5 d-flex text-success"><i
                                                    class="fa-solid fa-lock me-10 text-success"></i><small
                                                    class="fa-xs lh-1">Encrypted</small>
                                            </h6>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 mt-10">
                                    <button type="submit" id="formsubmit2" class="btn btn-green btn-sm"><span
                                            class="btn-text">Verify
                                            OTP <i class="fa-solid fa-arrow-right"></i></span></button>
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
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <?php } else if ($processstep == 'step3') { ?>
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
                            <div class="text-start section-header">

                                <h5 class="mb-10 text-start fw-bold text-dark">Enter Following Details</h5>
                                <p class="fw-normal"><small>Kindly enter your details for personalized offers.</small>
                                </p>
                                <!-- <p class="mb-0" style="font-size:14px"> <strong>Loan Amount. :
                                        <?php echo formatePriceIndia($userdetails['loanamount']); ?></strong></p>
                                <p style="font-size:14px"> <strong> Mobile No. :
                                        <?php echo $userdetails['mobile']; ?></strong></p> -->
                            </div>
                            <?php echo form_open('onlineprocess/registeredUser', array('id' => 'submitForm3', 'class' => 'contac-form', 'novalidate' => 'novalidate')); ?>
                            <div class="row">
                                <input type="hidden" id="loanamount" name="loanamount"
                                    value="<?php echo $userdetails['loanamount']; ?>">
                                <input type="hidden" id="referralcode" name="referralcode"
                                    value="<?php echo $userdetails['referralcode']; ?>">
                                <input type="hidden" id="usermobile" name="usermobile"
                                    value="<?php echo $userdetails['mobile']; ?>">

                                <label class="text-uppercase mb-20 fa-xs fw-bold">Employment type</label>
                                <div class="row g-10">
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-12 mb-md-0 mb-10">
                                        <fieldset class="picker1">
                                            <label for="personalloan" class="w-100">
                                                <input type="radio" name="usertype" id="personalloan" value="1"
                                                    class="radio" checked>
                                                <span class="plan-details p-15 bg-light-gray">
                                                    <div class="d-flex mb-0 align-items-center">
                                                        <div>
                                                            <div class="salaried-img">
                                                                <img src="<?php echo base_url('assets/images/icons/Salarised.png'); ?>"
                                                                    alt="image" class="">
                                                            </div>
                                                        </div>
                                                        <div class="ms-10 employment-content">
                                                            <h6 class="employment-title mb-0">Salaried</h6>

                                                        </div>
                                                    </div>
                                                </span>
                                            </label>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                                        <fieldset class="picker1">
                                            <label for="businessloan" class="w-100">
                                                <input type="radio" name="usertype" id="businessloan" value="2"
                                                    class="radio">
                                                <span class="plan-details p-15 bg-light-gray">
                                                    <div class="d-flex mb-0 align-items-center">
                                                        <div>
                                                            <div class="salaried-img bg-dark">
                                                                <img src="<?php echo base_url('assets/images/icons/self-employed.png'); ?>"
                                                                    alt="image" class="">
                                                            </div>
                                                        </div>
                                                        <div class="ms-10 employment-content">
                                                            <h6 class="employment-title mb-0">Self-Employed
                                                            </h6>

                                                        </div>
                                                    </div>
                                                </span>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="col-12 mb-15 mb-md-20 mt-20">
                                    <div class="form-group">
                                        <label class="text-uppercase mb-20 fa-xs fw-bold">Full name</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text text-dark fw-bold rounded-0 py-0 px-20"
                                                id="basic-addon1"> <i class="fa-regular fa-user"></i></span>
                                            <input class="form-control" type="text" id="username" name="username"
                                                placeholder="Bank Registered Name" required
                                                data-validation-regex-regex="^[a-zA-Z ]*$">
                                        </div>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-12 mb-15 mb-md-20">
                                    <div class="form-group">
                                        <label class="text-uppercase mb-20 fa-xs fw-bold">Email address</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text text-dark fw-bold rounded-0 py-0 px-20"
                                                id="basic-addon1"> <i class="fa-regular fa-envelope"></i></span>
                                            <input class="form-control" type="email" id="useremail" name="useremail"
                                                placeholder="Email Id" required>
                                        </div>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" id="formsubmit3" class="btn btn-green btn-sm"><span
                                            class="btn-text">Process <i
                                                class="fa-solid fa-arrow-right"></i></span></button>
                                </div>
                                <!-- </div> -->
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
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
</section>

<section
    class="section section-theme-5 how-work-block pt-40 pt-md-50 pt-lg-75 pt-xl-80 pt-xxl-80 pb-40 pb-md-50 pb-lg-75 pb-xl-70 pb-xxl-80  bg-light-sky">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-12 m-auto">
                <header class="section-header text-center text-lg-center">
                    <span class="text-uppercase text-outlined text-top mb-15 d-block text-color-blue">APPLY nOW IN 6
                        EASY STEPS</span>
                    <h3 class="display-6 fw-bold text-dark mb-0">How It <span class="text-color-blue">Works !</span>
                    </h3>
                </header>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-12 col-12">
                <div class="categories-list bg-transparent p-0">
                    <div class="row g-15">
                        <div class="col-md-6 col-sm-6">

                            <div class="categories-item shadow h-100">
                                <div>
                                    <div class="categories-image">
                                        <h6 class="icon mb-0 text-white">
                                            01
                                        </h6>
                                    </div>
                                </div>
                                <div class="text-start ms-20 content-text">
                                    <p class="mb-0">Start by entering your mobile number and bank-registered name.
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-6">

                            <div class="categories-item shadow h-100">
                                <div>
                                    <div class="categories-image">
                                        <h6 class="icon mb-0 text-white">
                                            02
                                        </h6>
                                    </div>
                                </div>
                                <div class="text-start ms-20 content-text">
                                    <p class="mb-0">Fill in the required information to let our automated system
                                        assess
                                        your eligibility and show your pre-approved loan offer(s). This is not the
                                        final
                                        offer.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">

                            <div class="categories-item shadow h-100">
                                <div>
                                    <div class="categories-image">
                                        <h6 class="icon mb-0 text-white">
                                            03
                                        </h6>
                                    </div>
                                </div>
                                <div class="text-start ms-20 content-text">
                                    <p class="mb-0">Subscribe to unlock access to your displayed pre-approved loan
                                        offer(s).</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">

                            <div class="categories-item shadow h-100">
                                <div>
                                    <div class="categories-image">
                                        <h6 class="icon mb-0 text-white">
                                            04
                                        </h6>
                                    </div>
                                </div>
                                <div class="text-start ms-20 content-text">
                                    <p class="mb-0">Within 24-48 hours, our login team will reach out for
                                        verification
                                        and guide you through the document submission process.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">

                            <div class="categories-item shadow h-100">
                                <div>
                                    <div class="categories-image">
                                        <h6 class="icon mb-0 text-white">
                                            05
                                        </h6>
                                    </div>
                                </div>
                                <div class="text-start ms-20 content-text">
                                    <p class="mb-0">Your documents and profile will be verified by the NBFC in
                                        accordance with its terms and conditions.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">

                            <div class="categories-item shadow h-100">
                                <div>
                                    <div class="categories-image">
                                        <h6 class="icon mb-0 text-white">
                                            06
                                        </h6>
                                    </div>
                                </div>
                                <div class="text-start ms-20 content-text">
                                    <p class="mb-0">The NBFC will determine loan sanction, approval, and
                                        disbursement in
                                        accordance with its rules and regulations.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section
    class="section how-we-help-block pt-40 pt-md-50 pt-lg-75 pt-xl-80 pt-xxl-80 pb-40 pb-md-50 pb-lg-75 pb-xl-70 pb-xxl-80 ">
    <div class="container">
        <div class="row">
        </div>
        <div class="col-xl-12 col-12 m-auto">
            <header class="section-header text-center text-lg-center">
                <span class="text-uppercase text-outlined text-top mb-15 d-block text-color-blue">Why Apply With
                    Us</span>
                <h3 class="display-6 fw-bold text-dark mb-0">Benefits & Features <span
                        class="text-color-blue">Features</span></h3>
            </header>
        </div>
        <div class="row g-15 mt-0">
            <div class="col-md-4 col-12 mt-0">
                <div class="commmon-box bg-transparent common-box-main h-100">
                    <div class="text-start mb-10">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center bg-light-sky">
                                <i class="fas fa-percentage fs-4 text-color-blue"></i>
                            </div>

                        </div>
                    </div>
                    <div class="text-start">
                        <h6>Enriching Collaboration</h6>
                        <p class="mt-10 mb-0">Explore multiple financial services backed by our leading NBFC
                            network.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="commmon-box bg-transparent common-box-main h-100">
                    <div class="text-start mb-10">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center bg-light-sky">
                                <i class="far fa-hand-pointer text-color-blue fs-4"></i>
                            </div>

                        </div>
                    </div>
                    <div class="text-start">
                        <h6>100% Online Process</h6>
                        <p class="mt-10 mb-0">Enjoy a smooth and hassle-free loan experience without stepping
                            out
                            of
                            your home.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="commmon-box bg-transparent common-box-main h-100">
                    <div class="text-start mb-10">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center bg-light-sky">
                                <i class="fas fa-hand-holding-usd text-color-blue fs-4"></i>
                            </div>

                        </div>
                    </div>
                    <div class="text-start">
                        <h6>Self-Apply Feature</h6>
                        <p class="mt-10 mb-0">Enjoy the freedom to make smarter financial decisions with
                            expert
                            support.</p>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>


<section class="bg-light-sky top_companies_block pt-40 pt-md-50 pt-lg-75 pt-xl-80 pt-xxl-80 pb-40 pb-md-50 pb-lg-75 pb-xl-70 pb-xxl-80 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <header class="section-header text-center text-lg-center">
                    <span class="text-uppercase text-outlined text-top mb-15 d-block text-color-blue">Our Network</span>
                    <h3 class="display-6 fw-bold text-dark mb-0">Trusted <span class="text-color-blue">NBFC Partners
                        </span></h3>

                </header>
            </div>
            <div class="col-lg-12">
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
        </div>
</section>
<section
    class="top_companies_block pt-40 pt-md-50 pt-lg-75 pt-xl-80 pt-xxl-80 pb-40 pb-md-50 pb-lg-75 pb-xl-70 pb-xxl-80 ">
    <div class="container">
        <div class="row">

            <div class="col-xl-12 col-12 m-auto">
                <header class="section-header text-center text-lg-center">
                    <h3 class="display-6 fw-bold text-dark mb-0">NBFC Personal <span class="text-color-blue">Loan
                            Criteria </span> </h3>
                    <p class="text-center">Check if you meet the following basic requirements before applying.</p>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="top_talent_holder mb-0">
                    <div class="left_align">
                        <div class="detail_box candidate border p-0">
                            <div class="p-20">
                                <div class="commmon-box card-box-main p-0 border-0 card-wrap d-flex align-items-center mb-25">
                                    <div class="icon d-flex align-items-center justify-content-center bg-light-sky">
                                        <i class="fas fa-briefcase text-color-blue fs-4"></i>
                                    </div>
                                    <h5 class="text-dark ms-10 mb-0">For Salaried</h5>
                                </div>
                                <hr>
                                <ul class="list-unstyled list m-0">
                                    <li class="ps-0 text-dark mb-20 mt-20">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fa-sm"> <i
                                                    class="far fa-check-circle text-color-blue me-10"></i>Age</span>
                                            <span class="fw-bold fa-sm">21 Years</span>
                                        </div>

                                    </li>
                                    <hr>
                                    <li class="ps-0 text-dark mb-20 mt-20">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fa-sm"> <i
                                                    class="far fa-check-circle text-color-blue me-10"></i>Minimum
                                                Salary</span>
                                            <span class="fw-bold fa-sm">Rs. 15,000/month</span>
                                        </div>
                                    </li>

                                    <hr>
                                    <li class="ps-0 text-dark mb-20 mt-20">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fa-sm"> <i
                                                    class="far fa-check-circle text-color-blue me-10"></i>Job
                                                Duration</span>
                                            <span class="fw-bold fa-sm">Min. 1 Year</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="right_align">
                        <div class="detail_box candidate border p-0">
                            <div class="p-20">
                                <div class="commmon-box card-box-main p-0 border-0 card-wrap d-flex align-items-center mb-25">
                                    <div class="icon d-flex align-items-center justify-content-center">

                                        <i class="fas fa-calculator text-color-blue fs-4"></i>
                                    </div>
                                    <h5 class="text-dark ms-10 mb-0">For Self-Employed</h5>
                                </div>
                                <hr>
                                <ul class="list-unstyled list m-0">
                                    <li class="ps-0 text-dark mb-20 mt-20">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fa-sm"> <i
                                                    class="far fa-check-circle text-color-blue me-10"></i>Minimum
                                                Age</span>
                                            <span class="fw-bold fa-sm">21 Years</span>
                                        </div>
                                    </li>
                                    <hr>

                                    <li class="ps-0 text-dark mb-20 mt-20">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fa-sm"> <i
                                                    class="far fa-check-circle text-color-blue me-10"></i>Minimum
                                                Salary</span>
                                            <span class="fw-bold fa-sm">Rs. 15,000/month</span>
                                        </div>
                                    </li>
                                    <hr>

                                    <li class="ps-0 text-dark mb-20 mt-20">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fa-sm"> <i
                                                    class="far fa-check-circle text-color-blue me-10"></i>Job
                                                Stability</span>
                                            <span class="fw-bold fa-sm">1 Year</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section
    class="section section-theme-1 section-faqs pt-40 pt-md-50 pt-lg-75 pt-xl-80 pt-xxl-80 pb-40 pb-md-50 pb-lg-75 pb-xl-70 pb-xxl-80   bg-light-sky">
    <div class="container">
        <div class="row">
            <div class="col-md-4">

                <p class="mb-10 mb-lg-15 title-text text-color-blue text-uppercase">FAQ</p>
                <h3 class="display-6 fw-bold text-dark mb-15">Frequently Asked <span
                        class="text-color-blue">Questions</span></h3>
                <p>Got questions? We’ve got answers. Here’s everything you need to know about applying for a loan
                    with indiafinpro.</p>

            </div>
            <div class="col-md-8">
                <div class="accordion" id="faq-accordion-2">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed bg-white border" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                aria-controls="collapseOne">
                                <span class="bullet"></span>
                                <span class="title">What purposes can a personal loan be used for?</span>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#faq-accordion-1">
                            <div class="accordion-body">
                                <p>A personal loan can be used for any personal expenses, including paying-off
                                    unexpected bills, debt consolidation, wedding expenses, higher education, home
                                    renovation, travel, shopping, covering a business cost, etc.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed bg-white border" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                <span class="bullet"></span>
                                <span class="title">Do I have to pledge any assets to avail a personal loan?</span>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#faq-accordion-1">
                            <div class="accordion-body">
                                <p>A personal loan is an unsecured type of credit, which means you do not have to
                                    pledge any assets as collateral.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed bg-white border" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                <span class="bullet"></span>
                                <span class="title">How do I know if I am eligible for a personal loan?</span>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#faq-accordion-1">
                            <div class="accordion-body">
                                <p>
                                    Here are the common eligibility criteria for a personal loan:<br>
                                    <strong>Salaried Professionals</strong><br>
                                <ul>
                                    <li>Minimum Age: 21 years</li>
                                    <li>Minimum Monthly Income: Rs. 15,000 (should reflect in the bank)s</li>
                                    <li>Minimum Job Stability: 1 Year</li>
                                </ul>
                                <strong>Self-employed Individuals</strong><br>
                                <ul>
                                    <li>Minimum Age: 21 years</li>
                                    <li>Minimum ITR: 1 Year</li>
                                    <li>Minimum Business Stability: 1 Year</li>
                                </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed bg-white border" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                aria-controls="collapseFour">
                                <span class="bullet"></span>
                                <span class="title">What are the documents required for applying for a personal
                                    loan?</span>
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#faq-accordion-1">
                            <div class="accordion-body">
                                <p>
                                    When applying for a personal loan, the following general documents are needed:
                                    <br>
                                    <strong>For Salaried:</strong> <br>
                                <ul>
                                    <li>Aadhaar Card</li>
                                    <li>PAN Card</li>
                                    <li>Residence Proof</li>
                                    <li>Bank Statement</li>
                                    <li>Income Proof</li>
                                </ul>
                                <strong>For Self-Employed:</strong> <br>
                                <ul>
                                    <li>Aadhaar Card</li>
                                    <li>PAN Card</li>
                                    <li>Residence Proof</li>
                                    <li>Bank Statement</li>
                                    <li>Income Computation</li>
                                    <li>Profit & Loss Account Statement</li>
                                    <li>Balance Sheet</li>
                                    <li>Service Tax Registration, License, Registration Certificate</li>
                                    <li>Clearance Certificate/IT Assessment</li>
                                    <li>Income Tax Returns</li>
                                </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed bg-white border" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                aria-controls="collapseFive">
                                <span class="bullet"></span>
                                <span class="title">Can I get tax benefits on personal loans?</span>
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#faq-accordion-1">
                            <div class="accordion-body">
                                <p>Personal loans do not have any direct tax benefits. However, if you use the funds
                                    to renovate your house or to incur business expenses, you may get tax benefits
                                    under the Income Tax Act of India.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed bg-white border" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                                aria-controls="collapseSix">
                                <span class="bullet"></span>
                                <span class="title">Why is having a good credit score so important?</span>
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#faq-accordion-2">
                            <div class="accordion-body">
                                <p>Your credit score represents your creditworthiness and repayment ability. Your
                                    chances of obtaining a loan with favourable terms and a low interest rate are
                                    very high if your credit score is high.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-contact section-theme-1 bg-dark-blue">
    <div class="container">
        <p class="mb-0 text-white"><strong>Disclaimer: </strong><small class="fa-xs"> Loan Tenure ranges from minimum 6
                months to maximum of 60 months, with annual interest rates starting at 11% and going up to 34%. A
                processing fee up to 2% may be applicable. Representative Example: If a loan of ₹1,00,000 is availed at
                an interest rate of 12.5% per annum for a tenure of 12 months, and a processing fee of 2% is applied:
                Interest Payable: ₹6,720 approx. Processing Fee: ₹2,000. Total Loan Cost (including interest + fee)
                ₹1,08,720. APR (Annual Percentage Rate): 14.27% approx. *T&C Apply. All these numbers are
                tentative/indicative, the final loan specifics may vary depending upon the customer profile and NBFCs'
                criteria, rules & regulations, and terms & conditions. The amount paid is only for the service charge.
                We are not lenders and do not guarantee any loan approval. </small></p>

        <p class="mb-0 text-white"><strong>Important Note: </strong><small class="fa-xs">We ask our customers to make
                payments ONLY on our website <a class="text-white"
                    href="<?php echo COMPANY_SITE; ?>">indiafinpro.com</a> and NOT through any other
                source, directly or indirectly.</small></p>

        <p class="mb-0 text-white"><strong>Pre-application NOTE: </strong><small class="fa-xs">Users are advised to read
                our terms and conditions and
                policies before proceeding/applying/registration. </small>
        </p>
        <p class="mb-0 text-white"><strong>Disclosure:</strong><small class="fa-xs"> Loan tenure minimum 6 months &
                maximum 60 months; Maximum APR: 34%
                p.a.; processing fee: up to 2%. Representative example: ₹1,00,000 at 11.5% for 60 months with ₹2,000
                processing fee — EMI ₹2,301, total interest ₹38,059, total repayment ₹1,38,059, indicative APR 14.41%.
            </small></p>

        <p class="mb-0 text-white"><strong>Registered Office Address : </strong><small
                class="fa-xs"><?php echo COMPANY_ADDRESS; ?></small></p>

        <p class="mb-0 text-white"><strong>Mobile : </strong><small class="fa-xs"><?php echo COMPANY_MOBILE; ?>
            </small>| <strong>Email :
            </strong><small class="fa-xs"><?php echo COMPANY_EMAIL; ?></small></p>

    </div>
</section>

<?php $this->load->view('includes/footer-apply'); ?>

<script src="<?php echo base_url('assets/js/loanscript.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
$('#mylist li').click(function() {
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
        success: function(response) {
            if (response['success'] == true) {
                $('#resend-message2').html(response['message']);
                toastr.success(response['message']);
            } else {
                toastr.error(response['message']);
            }
        },
        error: function(jXHR, textStatus, errorThrown) {
            toastr.error(errorThrown, 'ERROR');
        }
    });
}

$(function() {
    $('#submitForm1').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action') || window.location.pathname,
            type: "POST",
            data: $(this).serialize(),
            dataType: "JSON",
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#formsubmit1').html(
                    'Applying... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>'
                );
                $('#formsubmit1').attr('disabled', true);
            },
            success: function(response) {
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
            error: function(jXHR, textStatus, errorThrown) {
                toastr.error(errorThrown, 'ERROR');
                $('#formsubmit1').html('Apply Now');
                $('#formsubmit1').attr('disabled', false);
            }
        });
    });

    $('#submitForm2').on('submit', function(e) {
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
            beforeSend: function() {
                $('#formsubmit2').html(
                    'Verifying... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>'
                );
                $('#formsubmit2').attr('disabled', true);
            },
            success: function(response) {
                if (response['success'] == true) {
                    window.location = "../../applynow/s3/" + response['mobile'];
                } else {
                    $('#otpcodeError').html(response['message']);
                    toastr.error(response['message']);
                }

                $('#formsubmit2').html('Verify OTP');
                $('#formsubmit2').attr('disabled', false);
            },
            error: function(jXHR, textStatus, errorThrown) {
                toastr.error(errorThrown, 'ERROR');
                $('#formsubmit2').html('Verify OTP');
                $('#formsubmit2').attr('disabled', false);
            }
        });
    });


    $('#submitForm3').on('submit', function(e) {
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
            beforeSend: function() {
                $('#formsubmit3').html(
                    'Processing... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>'
                );
                $('#formsubmit3').attr('disabled', true);
            },
            success: function(response) {
                if (response['success'] == true) {
                    window.location.href = response['redirect_url'];
                } else {
                    $('#otpcodeError').html(response['message']);
                    toastr.error(response['message']);
                }

                $('#formsubmit3').html('Process');
                $('#formsubmit3').attr('disabled', false);
            },
            error: function(jXHR, textStatus, errorThrown) {
                toastr.error(errorThrown, 'ERROR');
                $('#formsubmit3').html('Process');
                $('#formsubmit3').attr('disabled', false);
            }
        });
    });
});
const color = $(".size-details li");

color.on("click", function() {
    $(".size-details ul li").removeClass("active-size");
    $(this).addClass("active-size");
});
</script>



<script>
document.addEventListener("DOMContentLoaded", function() {

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

    resendBtn.addEventListener('click', function() {
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

$('.otp-input').on('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
    if (this.value.length === 1) {
        $(this).next('.otp-input').focus();
    }
});
$('.otp-input').on('keydown', function(e) {
    if (e.key === "Backspace" && this.value === '') {
        $(this).prev('.otp-input').focus();
    }
});
</script>