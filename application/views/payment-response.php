<?php $this->load->view('includes/header-apply'); ?>

<main class="main">
    <section class="section section-theme-1 packages-block pt-130 cust-height d-flex align-items-center bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-8 mb-15 mb-md-30">
                    <div class="block-holder form-condidates bg-white shadow">
                        <div class="subhead text-center mb-0">
                            <?php if($responsedata == "true") { ?>
                            <div class="text-center mb-15">
                              <i class="fa-regular fa-circle-check fs-1 text-success"></i>
                              
</div>
                            <h2 class="text-dark">Congratulations!</h2>
                            <p>A dedicated loan expert will reach out to complete <br> documentation and bank
                                verification.</p>

                            

                            <div class="mb-20"> 
                                <a href="<?php echo site_url(); ?>"
                                    class="btn btn-green btn-sm">Goto Home Page</a>
                                <a href="<?php echo site_url(); ?>customer"
                                    class="btn btn-green btn-sm">Customer Login</a>
                                    
                            </div>
                            <div>

                                <a href="<?php echo site_url('support/request'); ?>" class="text-dark">Start a new application<i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                            <?php } 
              else if($responsedata == "false") { ?>
               <div class="text-center mb-15">
                             <i class="fa-regular fa-circle-xmark text-danger fs-1"></i>
                              
</div>
                            <h2 class="text-danger">Payment Unsuccessful</h2>
                            <p>Sorry! Your Payment For The Subscription Plan Was Unsuccessful.</p>
                            <a href="<?php echo site_url('cardpay'); ?>" class="btn btn-green btn-sm">Try Another
                                Payment Method</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php $this->load->view('includes/footer-apply');   ?>