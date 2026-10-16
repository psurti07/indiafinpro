<?php
    $this->load->view('includes/header-apply');
?>
  
    
  
<main class="main">
  <section class="section section-theme-1 packages-block pt-130 cust-height d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-8 mb-15 mb-md-30">
          <div class="block-holder form-condidates">
            <div class="subhead text-center">
                <!-- START : SUCCESS -->
                    <?php if($status == "true") { ?>
                        <img src="<?php echo base_url('assets/img/icons/lineal/handshake.svg'); ?>" class="svg-inject icon-svg icon-svg-md text-green mb-3" alt="" width="100px" />
                        <h2 class="display-4 mb-5 text-success">Congratulations!</h2>
                        <p>Your loan application has been successfully submitted. Our Customer Executive will call you shortly.</p>
                        <p><small><strong>In case you've any query or issue, you can raise a request here: <a href="<?php echo site_url('support/request'); ?>" class="hover text-dark">Click Here</a></strong></small></p>
                    
                        <a href="<?php echo site_url(); ?>" class="hover more btn btn-green btn-sm">Go to Homepage</a>
                    <?php } ?>
                    <!-- END : SUCCESS -->

                    <!-- START : FAIL -->
                    <?php if($status == "false") { ?>
                        <img src="<?php echo base_url('assets/img/icons/lineal/handshake.svg'); ?>" class="svg-inject icon-svg icon-svg-md text-red mb-3" alt="" width="100px" />
                        <h2 class="display-4 mb-5 text-danger">Payment Unsuccessful</h2>
                        <p>Your payment process has failed. Please try again. If you have any questions you can contact on our customer care number: <?php echo COMPANY_MOBILE ?>.</p>
                        <p><small><strong>In case you've any query or issue, you can raise a request here: <a href="<?php echo site_url('support/request'); ?>" class="hover text-dark">Click Here</a></strong></small></p>
                    
                        <a href="<?php echo site_url('cardoffer'); ?>" class="hover more btn btn-green btn-sm">Try Another Payment Method</a>
                    <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
    <!-- /section -->


<?php
    $this->load->view('includes/footer-apply');
?>
