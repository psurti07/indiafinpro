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

<main class="main">
  <section class="section section-theme-1 packages-block pt-40">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-8 mb-15 mb-md-30">
          <div class="block-holder form-condidates">
            <div class="subhead mb-0">
              <h4><?php echo $userdetails['loanname']; ?></h4>
              <p>Buy Subscription Plan & Get Your <strong class="text-success">Rs. <?php echo $eligibilityamtindia; ?> </strong> Pre-Approved Loan Offer Processed Instantly. <span class='text-danger'>Offer Valid Till 12 am Only.</span></p>
            </div>

            <div class="row">
              <div class="col-12 col-md-6 col-lg-6 mb-15">
                <?php echo form_open('onlineprocess/checkoutDigital', array('id' => 'submitForm3', 'class' => '', 'novalidate' => 'novalidate')); ?>
                    <input type="hidden" name="loantype" id="loantype" value="<?php echo $userdetails['loantype']; ?>"
                      class="form-control" required>
                    <input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>" class="form-control"
                      required>
                    <input type="hidden" name="userid" value="<?php echo $userdetails['userid']; ?>" class="form-control"
                      required>
                    <input type="hidden" name="fullname" id="fullname" value="<?php echo $userdetails['fullname']; ?>"
                      class="form-control" required>
                    <input type="hidden" name="mobile" id="mobile" value="<?php echo $userdetails['mobile']; ?>"
                      class="form-control" required>
                    <input type="hidden" name="email" id="email" value="<?php echo $userdetails['email']; ?>" class="form-control"
                      required>
                    <input type="hidden" name="cardtype" value="<?php echo $userdetails['cardtype']; ?>" class="form-control"
                      required>

                    <div class="package-box p-0" style="height: auto;">
                      <div class="box-inner py-30">
                        <p><strong>Subscription Plan</strong></p>
                        <?php
                        if ($productdata['inOffer'] == 1) {
                          echo '<h5><del class="text-danger pe-10">&#8377; ' . formatePrice($productdata['amount']) . '</del>';
                          echo '<span class="text-success"><strong> &#8377; ' . formatePrice($productdata['offeramount']) . '/-</strong> Only</span></h5>';
                          $subtotal = $productdata['offeramount'];
                        } else {
                          echo '<h5 class="text-success">&#8377; ' . formatePrice($productdata['amount']) . '</h5>';
                          $subtotal = $productdata['amount'];
                        }
                        ?>

                        <ul class="list-unstyled features-list pt-20">
                          <?php if ($productdata['inOffer'] == 1) { ?>
                            <li><?php echo calPercentage($productdata['amount'], $productdata['offeramount']); ?> OFF</li>
                          <?php } ?>
                          <li>Subtotal : <?php echo formatePriceIndia($subtotal); ?></li>
                          <li>GST (18%) : <?php $gst = $subtotal * 0.18;
                          echo formatePriceIndia($gst); ?></li>
                          <li>Grand Total : <?php $grandtotal = $subtotal + $gst;
                          echo formatePriceIndia($grandtotal); ?></li>
                        </ul>
                        <button type="submit" class="btn btn-green btn-sm" id="formsubmit3"><span class="btn-text">Subscribe
                            Now</span></button>
                      </div>
                    </div>
                  <?php echo form_close(); ?>
              </div>

              <div class="col-12 col-md-6 col-lg-6">
                <div class="package-box p-0" style="height: auto;">
                  <div class="box-inner py-30">
                    <p><strong>Subscription Plan Benefits</strong></strong>
                    <ul class="list-unstyled features-list mb-0">
                      <li>100% Online Process</li>
                      <li>Get Personalized Tracking Portal</li>
                      <li>On-Call Expert Consultation</li>
                      <li>Easy to Use</li>
                      <li>CIBIL Remains Unaffected</li>
                      <li>Plan Validity: 6 months</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
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
                      <span class="step-number">3/4</span>
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
 <section class="pb-4">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 offset-lg-4 d-block d-sm-none d-md-none d-lg-none">
                 <?php $testimoniallists = array('offer1.png', 'offer2.png', 'offer5.png', 'offer6.png', 'offer7.png', 'offer9.png') ?>
                <div class="companies-slider" data-slick='{"dots": false}'>
                  <?php foreach ($testimoniallists as $row) { ?>
                    <div class="slick-slide">
                      <article>
                        <div class="wrap">
                          <div class="">
                            <img src="<?php echo base_url() ?>assets/images/lending_img/<?php echo $row ?>" alt="">
                          </div>
                        </div>
                      </article>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </section>
  <!--<section class="section section-theme-10 latest-candidates-block bg-light-sky pt-30 pt-md-40 pt-lg-50 pt-xxl-50 pb-30 pb-md-50 pb-lg-60 pb-xxl-60">
    <div class="container">
      <div class="row mb-30 mb-md-40">
        <div class="col-12">
          <h4 class="text-center">Our Customers Testimonials</h4>
          <p class="text-center">Here Is What Our Clients Have To Say About Us</p>
        </div>
      </div>

      <div class="top_companies_holder">
        <?php $testimoniallist = array('1.png', '2.png', '3.png', '4.png', '5.png', '6.png') ?>
        <div class="companies-slider">
          <?php foreach ($testimoniallist as $row) { ?>
            <div class="slick-slide">
              <article>
                <div class="wrap">
                  <div class="">
                    <img src="<?php echo base_url() ?>assets/images/testimonial/<?php echo $row ?>" alt="customer img">
                  </div>
                </div>
              </article>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>-->
</main>

<script type="text/javascript">
  $(document).ready(function () {
    var windowWidth = $(window).width();
    if (windowWidth <= 1024) { //for iPad & smaller devices
      $('#userCollapse').removeClass('show');
    }
  });

  $(function () {
    $('#submitForm3').on('submit', function (e) {
      $('#form-submit3').html('Processing... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>');
    });
  });
</script>

<?php
$this->load->view('includes/footer-apply');
?>