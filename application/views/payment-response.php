<?php $this->load->view('includes/header-apply'); ?>

<main class="main">
    <section class="section section-theme-1 packages-block pt-130 pb-50 d-flex align-items-center bg-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-7 col-12 m-auto">
                    <div class="account-box">
                        <div class="block-holder form-condidates bg-white shadow">
                            <div class="subhead text-center mb-0">
                                <?php if($responsedata == "true") { ?>
                                <div class="text-center mb-15">
                                    <i class="fa-regular fa-circle-check fs-1 text-success"></i>

                                </div>
                                <h3 class="text-dark">Congratulations! <br> <span class="text-success"> Payment Successful</span></h3>
                                <p>Your payment has been successfully processed. <br>   
You can now access your pre-approved offers</p>
  <div class="row g-15 mt-10 payment-card-content mb-10">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="px-10 py-10 bg-light-gray h-100 card-block-main">
                                                <p class="fw-bold mb-5">Customer Portal</p>
                                                <p class="text-gray">Your service is active. Log in to the portal.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="px-10 py-10 bg-light-gray h-100 card-block-main">
                                                <p class="fw-bold mb-5">invoice</p>
                                                <p class="text-gray">Invoice is available for download in portal.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="px-10 py-10 bg-light-gray h-100 card-block-main">
                                                <p class="fw-bold mb-5">Consultant</p>
                                                <p class="text-gray">Our team will contact you within 24 hrs.
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                <div class="mb-20">
                                    <a href="<?php echo site_url(); ?>" class="btn btn-green btn-sm  me-sm-5 mb-sm-0 mb-10">Goto Home Page</a>
                                    <a href="<?php echo site_url(); ?>customer" class="btn btn-green btn-sm">Customer
                                        Login</a>

                                </div>
                                <div>

                                    <a href="<?php echo site_url('support/request'); ?>" class="text-dark">Start a new
                                        application<i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                                <?php } 
                                
              else if($responsedata == "false") { ?>
                                <div class="text-center mb-15">
                                    <i class="fa-regular fa-circle-xmark text-danger fs-1"></i>

                                </div>
                                <h3 class="text-dark">Payment <br> <span class="text-danger">Unsuccessful</span></h3>
                                <p>We're sorry, but your payment could not be processed. <br> Please try again or
                                    contact our support team for assistance.</p>
                                <p>
                                    हमें खेद है, लेकिन आपका भुगतान प्रोसेस नहीं हो सका। कृपया पुनः प्रयास करें <br> या
                                    सहायता के लिए हमारी सपोर्ट टीम से संपर्क करें।
                                </p>
                                <hr>
                                <div class="text-center mb-20">
                                    <p class="text-dark">Common Reasons for Payment Failure:</p>
                                    <div class="row g-15 mt-10 payment-card-content">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="px-10 py-10 card-block h-100">
                                                <p class="fw-bold mb-5">Card Issue</p>
                                                <p class="text-gray">Your service is active. Log in to the
                                                    portal.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="px-10 py-10 card-block h-100">
                                                <p class="fw-bold mb-5">Network</p>
                                                <p class="text-gray">Invoice is available for download in
                                                    portal.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="px-10 py-10 card-block h-100">
                                                <p class="fw-bold mb-5">Cancelled</p>
                                                <p class="text-gray">Our team will contact you within 24
                                                    hrs.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <p
                                        class="mt-20 mb-0 small text-success border border-success rounded-pill px-10 py-2 d-inline-block">
                                        Don't worry! No amount has been deducted from your account.</p>
                                </div>

                                <a href="<?php echo site_url('cardpay'); ?>" class="btn btn-green btn-sm">Try Another
                                    Payment Method</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php $this->load->view('includes/footer-apply');   ?>