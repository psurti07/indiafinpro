<?php
$this->load->view('includes/header-apply.php');
?>

    <section class="visual-block visual-theme-5 bg-dark hero-section text-black pt-60 pt-md-60 pt-xl-100">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-md-6 col-lg-6 col-xl-6 order-2">
                    
                    <div class="visual-textbox pt-0">
                        <h2 class="text-light">Your Loan Search Starts Here </h2>
                        <p class="text-light">Access Options Up to <span style="background: linear-gradient(167.62deg, #2052B6 9%, #F4DECA 428%); padding: 9px; border-radius: 22px;"> ₹10 Lakhs*</span></p>
                        <p class="text-light">Get your business loan approved quickly with minimal paperwork, transparent terms and a simple 100% online process.</p>
                    </div>
                    <div class="banner__img-two">
                        <img src="<?= base_url('assets/images/image_30.png'); ?>" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6 order-md-2 order-1">
                    <div class="account-box">
                        <?php if ($processstep == 'step1') { ?>
                        <div class="account-box-frame text-dark bg-white shadow">
                            <div class="section-header mb-0">
                                <span class="text-dark text-left fw-bold" style="font-size:14px">Loan Application</span>
                                <span class="text-dark text-right fw-bold" style="float:right;font-size:14px;margin-top: 12px;">Step 1 to 4</span>

                                <hr>
                                <h5 class="text-black text-center">Apply For <div class="range"
                                        style="display: inline-block;">
                                        <div class="">
                                            <span class="text-success fs-5 text-color-blue">₹10 Lakhs</span> Loan in Minutes!  
                                        </div>
                                    </div></h5>

                            </div>
                            <?php echo form_open('onlineprocess/sendotpCode', array('id' => 'submitForm1', 'class' => 'contac-form mb-0', 'novalidate' => 'novalidate')); ?>
                            <div class="row">
                                <div class="col-12 mb-15">
                                    <div class="form-group">
                                        <div class="range">
                                            
                                            <div class="d-flex justify-content-between required-amount mt-20">
                                                <h6 class="text-uppercase mb-0 frmtext">Enter Required Amount</h6>
                                                <h6 class="text-uppercase mb-0">
                                                    <div class="range__value">
                                                <span class="fs-4 text-color-blue fw-bold"></span>
                                            </div></h6>
                                            </div>
                                            <div class="range__slider">
                                                <input type="range" name="loanamount" step="10000">
                                            </div>
                                            <div class="d-flex justify-content-between required-price mb-10">
                                                <h6 class="text-uppercase mb-0">₹10,000</h6>
                                                <h6 class="text-uppercase mb-0">₹10,00,000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group error">
                                        <label class="text-uppercase mb-10 frmtext">Mobile number</label>
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
                                <div class="col-12 mb-2">
                                    <div class="form-group mb-10 ps-0">
                                        <div class="d-flex align-items-start "> <input type="checkbox" name="tandc"
                                                id="tandc" class="custom-control-input mb-0 mt-5" value="1" checked
                                                required>
                                            <label class="custom-control-label" for="tandc"><small
                                                    class="ms-10 d-block fw-normal" style="font-size:12px">By
                                                    submitting the
                                                    form and proceeding, you agree to the <a
                                                        href="<?= base_url('terms-conditions') ?>" target="_blank"
                                                        style="text-decoration: none;" class="text-dark">Terms of
                                                        Use</a>
                                                    and <a href="<?= base_url('privacy-policy') ?>" target="_blank"
                                                        style="text-decoration: none;" class="text-dark">Privacy
                                                        Policy</a>
                                                    of
                                                    indiafinpro.</small></label>

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
                                <div class="text-danger mt-3 mb-3" id="mobilenoError1"></div>
                                <div class="col-12 mb-3">
                                    <button type="submit" id="formsubmit1"
                                        class="btn btn-green btn-sm text-uppercase"><span class="btn-text">Start
                                            Process <i
                                        class="fa-solid fa-arrow-right"></i></span></button>
                                </div>
                                <h6 class="text-center mt-md-20 mb-md-20">Our NBFC Partners</h6>
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
                        <div class="account-box-frame text-dark bg-white card shadow-sm border">
                            <div class="">
                                <h5 class="mb-10 text-start fw-bold">Verify your mobile</h5>
                                <h6 class="fw-normal">We've sent a 4-digit OTP to
                                    <strong><?php echo $userdetails['mobile']; ?></strong>
                                </h6>

                            </div>
                            <?php echo form_open('onlineprocess/checkotpCode', array('id' => 'submitForm2', 'class' => 'contac-form', 'novalidate' => 'novalidate')); ?>
                            <div class="row">
                                <input type="hidden" name="otpmobile" id="otpmobile"
                                    value="<?php echo $userdetails['mobile']; ?>">
                                <input type="hidden" name="loanamount" id="loanamount"
                                    value="<?php echo $userdetails['loanamount']; ?>">
                                <div class="col-12 mb-15 mb-md-20">
                                    <div class="form-group error">
                                        <label class="text-uppercase mb-10 frmtext">Enter OTP</label>
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
                                <div class="row justify-content-between align-items-center mb-20">
                                    <div class="col-lg-8">
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
                                    <div class="col-lg-4">
                                        <div class="title-text d-flex justify-content-md-end justify-content-start">

                                            <h6 class="fw-light mb-0 ms-5"><i
                                                    class="fa-solid fa-lock me-10 text-success"></i>Encrypted</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" id="formsubmit2" class="btn btn-green btn-sm"><span
                                            class="btn-text">Verify
                                            OTP <i class="fa-solid fa-arrow-right"></i></span></button>
                                </div>
                                <h6 class="text-center mt-md-20 mb-md-20">Our NBFC Partners</h6>
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
                                <div class="col-12">
                                    <div class="card otp-velidation-text shadow-none bg-light border mt-15">
                                        <div class="card-body p-10 ">
                                            <div class="d-flex align-items-center">

                                                <i class="fa-solid fa-shield text-success"></i>

                                                <div class="ms-10">
                                                    <p class="mb-0 fw-light h6 lh-2">indiafinprooo will never
                                                        call you for your
                                                        OTP. Treat your OTP like a password — do not share it with
                                                        anyone. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        <?php } else if ($processstep == 'step3') { ?>
                        <div class="account-box-frame text-dark card shadow bg-white">
                            <div class="text-start section-header">
                                <span class="text-success text-uppercase text-outlined text-top mb-15 d-block">Tell us
                                    about you</span>
                                <h5 class="mb-10 text-start fw-bold text-dark">Select your profile & enter details</h5>
                                <p>This helps us tailor the best NBFC offers for you.</p>
                                <!-- <p class="mb-0" style="font-size:14px"> <strong>Loan Amount. :
                                        <?php echo formatePriceIndia($userdetails['loanamount']); ?></strong></p>
                                <p style="font-size:14px"> <strong> Mobile No. :
                                        <?php echo $userdetails['mobile']; ?></strong></p> -->
                            </div>
                            <?php echo form_open('onlineprocess/registeredUser', array('id' => 'submitForm3', 'class' => 'contac-form', 'novalidate' => 'novalidate')); ?>
                            <div class="row gx-10 mb-15">
                                <input type="hidden" id="loanamount" name="loanamount"
                                    value="<?php echo $userdetails['loanamount']; ?>">
                                <input type="hidden" id="referralcode" name="referralcode"
                                    value="<?php echo $userdetails['referralcode']; ?>">
                                <input type="hidden" id="usermobile" name="usermobile"
                                    value="<?php echo $userdetails['mobile']; ?>">

                                <label class="text-uppercase mb-10 frmtext">Employment type</label>
                                <div class="col-md-6 col-lg-6 col-sm-6 col-12 mb-md-0 mb-10">
                                    <fieldset class="picker1">
                                        <label for="personalloan" class="w-100">
                                            <input type="radio" name="usertype" id="personalloan" value="1"
                                                class="radio" checked>
                                            <span class="plan-details p-15 bg-light">
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
                                            <span class="plan-details p-15 bg-light">
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
                                <div class="col-12 mb-15 mb-md-20 mt-20">
                                    <div class="form-group">
                                        <label class="text-uppercase mb-10 frmtext">Full name</label>
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
                                        <label class="text-uppercase mb-10 frmtext">Email address</label>
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
                            </div>
                            
                            <?php echo form_close(); ?>
                            <h6 class="text-center mt-md-20 mb-md-20">Our NBFC Partners</h6>
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
                                <div class="col-12">
                                    <div class="card otp-velidation-text shadow-none bg-light border mt-15">
                                        <div class="card-body p-10 ">
                                            <div class="d-flex align-items-center">

                                                <i class="fa-solid fa-shield text-success"></i>

                                                <div class="ms-10">
                                                    <p class="mb-0 fw-light h6 lh-2">indiafinprooo will never
                                                        call you for your
                                                        OTP. Treat your OTP like a password — do not share it with
                                                        anyone. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section
        class="section section-theme-5 how-work-block pt-60 pt-md-60 pt-xl-100 pb-60 pb-xl-100 pb-md-60 bg-light-sky">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-12 m-auto">

                    <header class="section-header text-center text-lg-center">
                        <span class="text-uppercase text-outlined text-top mb-15 d-block text-color-blue">Our
                            Process</span>
                        <h2>How It <span class="text-color-blue">Works !</span></h2>

                    </header>



                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-12 col-12">
                    <div class="row process-boxes">
                        <div class="col-md-6 col-sm-6 mb-10">

                            <div class="categories-item">
                               
                                    <div class="categories-image">
                                        <span class="icon">
                                            <img src="<?php echo base_url('assets/images/icons/s1.png'); ?>" alt="icon" style="max-width: unset;">
                                        </span>
                                    </div>
                               
                                <div class="text-start ms-20">
                                    <p class="mb-0">Start by entering your mobile number and bank-registered name.</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-6 mb-10">

                            <div class="categories-item">
                               
                                    <div class="categories-image">
                                        <span class="icon">
                                            <img src="<?php echo base_url('assets/images/icons/s2.png'); ?>" alt="icon" style="max-width: unset;">
                                        </span>
                                    </div>
                                
                                <div class="text-start ms-20">
                                    <p class="mb-0">Fill in the required information to let our automated system assess your eligibility and show your pre-approved loan offer(s). This is not the final offer.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 mb-10">

                            <div class="categories-item">
                                <div>
                                    <div class="categories-image">
                                        <span class="icon">
                                            <img src="<?php echo base_url('assets/images/icons/s3.png'); ?>" alt="icon" style="max-width: unset;">
                                        </span>
                                    </div>
                                </div>
                                <div class="text-start ms-20">
                                    <p class="mb-0">Subscribe to unlock access to your displayed pre-approved loan offer(s).</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 mb-10">

                            <div class="categories-item">
                                <div>
                                    <div class="categories-image">
                                        <span class="icon">
                                            <img src="<?php echo base_url('assets/images/icons/s4.png'); ?>" alt="icon" style="max-width: unset;">
                                        </span>
                                    </div>
                                </div>
                                <div class="text-start ms-20">
                                    <p class="mb-0">Within 24-48 hours, our login team will reach out for verification and guide you through the document submission process.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 mb-10">

                            <div class="categories-item">
                                <div>
                                    <div class="categories-image">
                                        <span class="icon">
                                            <img src="<?php echo base_url('assets/images/icons/s5.png'); ?>" alt="icon" style="max-width: unset;">
                                        </span>
                                    </div>
                                </div>
                                <div class="text-start ms-20">
                                    <p class="mb-0">Your documents and profile will be verified by the NBFC in accordance with its terms and conditions.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 mb-10">

                            <div class="categories-item">
                                <div>
                                    <div class="categories-image">
                                        <span class="icon">
                                            <img src="<?php echo base_url('assets/images/icons/s6.png'); ?>" alt="icon" style="max-width: unset;">
                                        </span>
                                    </div>
                                </div>
                                <div class="text-start ms-20">
                                    <p class="mb-0">The NBFC will determine loan sanction, approval, and disbursement in accordance with its rules and regulations.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    
    <section class="section section-theme-12 how-we-help-block pt-60 pt-md-60 pt-xl-100 pb-60 pb-xl-100 pb-md-60">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 txt-col mb-20 text-center">

                    <p class="mb-10 mb-lg-15 title-text text-color-blue text-uppercase">Why Apply With Us</p>
                    <h2 class="mb-15">Benefits & Features</h2>
                    
                </div>
                <div class="col-12 col-md-12 col-lg-12 img-col">
                    <div class="row gap-25">
                        <div class="col-md-3 commmon-box">
                            <div class="text-start mb-10">

                                <div class="icon">
                                    <img src="<?php echo base_url('assets/images/icons/icon_1.png'); ?>" alt="icon" class="icon-img">
                                </div>
                            </div>
                            <div class="text-start">
                                <h6 class="fs-6">Interest rate starting at 11%</h6>
                                <p class="mt-10">Benefit from low interest rates, ensuring affordability and savings.</p>
                            </div>
                        </div>
                        <div class="col-md-3 commmon-box">
                            <div class="text-start mb-10">
                                <div class="icon">
                                    <img src="<?php echo base_url('assets/images/icons/icon_2.png'); ?>"
                                        alt="icon" class="icon-img">
                                </div>
                            </div>
                            <div class="text-start">
                                <h6 class="fs-6">100% Digital Process</h6>
                                <p class="mt-10">Effortlessly manage your loan with our paperless digital process.</p>
                            </div>
                        </div>
                        <div class="col-md-3 commmon-box">
                            <div class="text-start mb-10">
                                <div class="icon">
                                    <img src="<?php echo base_url('assets/images/icons/icon_3.png'); ?>" alt="icon" class="icon-img">
                                </div>
                            </div>
                            <div class="text-start">
                                <h6 class="fs-6">Flexible Tenure upto 60 Months</h6>
                                <p class="mt-10">Tailored repayment options up to 60 months for your convenience.</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="top_companies_block section-theme-7 pt-0 pt-60 pt-md-60 pt-xl-100 pb-60 pb-xl-100 pb-md-60 bg-light-sky">
        <div class="container">
            <header>
                <h4 class="text-center">NBFC Personal Loan Criteria</h4>
                <p class="text-center">Check if you meet the following basic requirements before applying.</p>
            </header>
            <div class="top_talent_holder mb-0">
                <div class="left_align">
                    <div class="detail_box candidate">
                        <div class="p-20">
                            <strong class="h5">For Salaried</strong>
                            <hr>
                            <ul class="list-unstyled list mt-10">
                                <li><img src="<?= base_url('assets/img/icons/check.svg') ?>" alt=""> Minimum Age - 21
                                    Years
                                </li>
                                <hr>
                                <li><img src="<?= base_url('assets/img/icons/check.svg') ?>" alt=""> Minimum Salary -
                                    Rs. 15,000/month</li>
                                <hr>
                                <li><img src="<?= base_url('assets/img/icons/check.svg') ?>" alt=""> 1 Year Job
                                    Stability</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <div class="right_align">
                    <div class="detail_box candidate">
                        <div class="p-20">
                            <strong class="h5">For Self-Employed</strong>
                            <hr>
                            <ul class="list-unstyled list mt-10">
                                <li><img src="<?= base_url('assets/img/icons/check.svg') ?>" alt=""> Minimum Age - 21
                                    Years</li>
                                <hr>
                                <li><img src="<?= base_url('assets/img/icons/check.svg') ?>" alt=""> Income Tax Return
                                    of Minimum 1 Year</li>
                                <hr>
                                <li><img src="<?= base_url('assets/img/icons/check.svg') ?>" alt=""> 1 Year Business
                                    Stability</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
     <section
        class="section section-theme-1 section-faqs pt-35 pt-md-50 pt-lg-75 pt-xl-100 pt-xxl-125 pb-35 pb-md-50 pb-lg-75 pb-xl-100 pb-xxl-125 ">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <p class="mb-10 mb-lg-15 title-text text-success text-uppercase">FAQ</p>
                    <h2 class="mb-15">Frequently Asked <span class="text-color-blue">Questions</span></h2>
                    <p>Got questions? We’ve got answers. Here’s everything you need to know about applying for a loan
                        with indiafinpro.</p>

                </div>
                <div class="col-md-8">
                    <div class="accordion" id="faq-accordion-2">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
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
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
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
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
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
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
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
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
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

    <section class="section section-contact section-theme-1 bg-light-gray">
        <div class="container">
            <p class="mb-0"><strong>Disclaimer: </strong>Akshar Finance Solutions LLP is not a lender or financial institution. We do not provide loans or make credit decisions. All loan approvals, interest rates, fees, and disbursal are handled by third-party lenders/NBFCs. We do not guarantee loan approval, disbursal, or specific loan terms. The amount paid is only for the service charge. We are not lenders and do not guarantee any loan approval. Loan approval, disbursement/sanction is entirely dependent on NBFC criteria.</p>

            <p class="mb-0"><strong>Important Note: </strong>We ask our customers to make payments ONLY on our website <a class="text-dark" href="<?php echo COMPANY_SITE; ?>">indiafinprooooooo.com</a>  and NOT through any other source, directly or indirectly.</p>

            <p class="mb-0"><strong>Pre-application NOTE: </strong>Users are advised to read our terms and conditions and policies before proceeding/applying/registration.
            </p>
            <p class="mb-0"><strong>Disclosure:</strong> Loan tenure minimum 6 months & maximum 60 months; Maximum APR: 34% p.a.; processing fee: up to 2%. Representative example: ₹1,00,000 at 11.5% for 60 months with ₹2,000 processing fee — EMI ₹2,301, total interest ₹38,059, total repayment ₹1,38,059, indicative APR 14.41%.</p>

            <p class="mb-0"><strong>Registered Office Address : </strong><?php echo COMPANY_ADDRESS; ?></p>

            <p class="mb-0"><strong>Mobile : </strong><?php echo COMPANY_MOBILE; ?> | <strong>Email : </strong><?php echo COMPANY_EMAIL; ?></p>

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