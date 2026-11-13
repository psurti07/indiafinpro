<?php
    $this->load->view('includes/header');
?>
    <section class="wrapper bg-pale-primary">
      <div class="container pt-10 pt-md-10 pb-14 pb-md-15 text-center">
        <div class="row">
          <div class="col-md-12 col-12">
            <h1 class="display-3 mb-2">Sitemap</h1>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->

    <section class="wrapper bg-white">
      <div class="container pb-14 pb-md-14">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="blog single mt-n12">
              <div class="card shadow-lg">
                <div class="card-body">

                  <div class="row">
                    <div class="col-md-6 col-12">
                        <h6>Company Pages</h6>
                        <ul class="unordered-list bullet-primary">
                          <li><a href="<?php echo site_url(); ?>" class="hover link-body">Home</a></li>
                          <li><a href="<?php echo site_url('company'); ?>" class="hover link-body">Company</a></li>
                          <li><a href="<?php echo site_url('contact'); ?>" class="hover link-body">Contact Us</a></li>
                          <li><a href="<?php echo site_url('career'); ?>" class="hover link-body">Career</a></li>
                          <li><a href="<?php echo site_url('faqs'); ?>" class="hover link-body">FAQs</a></li>
                          <li><a href="<?php echo site_url('loan/calculator'); ?>" class="hover link-body">Loan EMI Calculator</a></li>
                          <li><a href="<?php echo site_url('important-update'); ?>" class="hover link-body">Important Update</a></li>
                          <li><a href="<?php echo site_url('privacy-policy'); ?>" class="hover link-body">Privacy Policy</a></li>
                          <li><a href="<?php echo site_url('refund-policy'); ?>" class="hover link-body">Cancellation & Refund Policy</a></li>
                          <li><a href="<?php echo site_url('disclaimer'); ?>" class="hover link-body">Disclaimer</a></li>
                          <li><a href="<?php echo site_url('terms-conditions'); ?>" class="hover link-body">Terms & Conditions</a></li>
                          <li><a href="<?php echo site_url('support/request'); ?>" class="hover link-body">Raise a request</a></li>
                        </ul>
                    </div>

                    <div class="col-md-6 col-12">
                      <h6>Our Plans</h6>
                      <ul class="unordered-list bullet-primary">
                        <li><a href="<?php echo site_url('personal-subscription'); ?>" class="hover link-body">Personal Subscription Plan</a></li>
                        <li><a href="<?php echo site_url('business-subscription'); ?>" class="hover link-body">Business Subscription Plan</a></li>
                      </ul>

                      <h6>Apply Now</h6>
                      <ul class="unordered-list bullet-primary">
                        <li><a href="<?php echo site_url('onlineprocess/applynow'); ?>" class="hover link-body">Plan Apply</a></li>
                      </ul>
                      
                      <h6>Login</h6>
                      <ul class="unordered-list bullet-primary">
                        <li><a href="<?php echo site_url('customer'); ?>" class="hover link-body">Customer Login</a></li>
                      </ul>

                      
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.blog -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    
<?php
    $this->load->view('includes/footer');
?>