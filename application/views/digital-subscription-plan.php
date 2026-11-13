<?php
$this->load->view('includes/header-apply.php');
//$today = date("Y-m-d", strtotime($userdetails['rec_date']));
//$last30 = date('Y-m-d', strtotime('-30 days'));
//if ($today <= $last30) {
  //$eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']) + 100000;
//} else {
  $eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);
//}
$eligibilityamtindia = formatePriceIndia($eligibilityamt);
?>
<section class="visual-block visual-theme-5 bg-dark hero-section text-black pt-60 pt-md-60 pt-xl-100">
    <div class="container">
        <div class="row justify-content-between align-items-end">
            <div class="col-12 col-md-5 col-lg-5 col-xl-5 order-2">

                <div class="visual-textbox pt-0">
                    <h2 class="text-light">Your Loan Search Starts Here </h2>
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
            <div class="col-12 col-md-7 col-lg-7 col-xl-7 mb-15 mb-md-30 order-md-2 order-1">
                <div class="account-box">
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

                            <div class="process-step-item active">
                                <div class="process-step-number">3</div>
                                <span>Eligibility</span>
                            </div>

                            <div class="process-step-item active">
                                <div class="process-step-number">4</div>
                                <span>Membership</span>
                            </div>
                        </div>
                        <div class="account-box-frame text-dark bg-white">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <h5 class="mb-5">Premium Subscription Offer</h5>
                                    <p class="fa-xs lh-lg">Your pre-approved loan is waiting. Purchase a subscription to
                                        proceed <span class="text-danger"> - Offer Valid till 12 am only!</span></p>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="subscription-card bg-transparent overflow-hidden border">
                                        <?php echo form_open('onlineprocess/checkoutDigital', array('id' => 'submitForm3', 'class' => '', 'novalidate' => 'novalidate')); ?>
                                        <input type="hidden" name="loantype" id="loantype"
                                            value="<?php echo $userdetails['loantype']; ?>" class="form-control"
                                            required>
                                        <input type="hidden" name="applyid"
                                            value="<?php echo $userdetails['applyid']; ?>" class="form-control"
                                            required>
                                        <input type="hidden" name="userid" value="<?php echo $userdetails['userid']; ?>"
                                            class="form-control" required>
                                        <input type="hidden" name="fullname" id="fullname"
                                            value="<?php echo $userdetails['fullname']; ?>" class="form-control"
                                            required>
                                        <input type="hidden" name="mobile" id="mobile"
                                            value="<?php echo $userdetails['mobile']; ?>" class="form-control" required>
                                        <input type="hidden" name="email" id="email"
                                            value="<?php echo $userdetails['email']; ?>" class="form-control" required>
                                        <input type="hidden" name="cardtype"
                                            value="<?php echo $userdetails['cardtype']; ?>" class="form-control"
                                            required>


                                        <div class="block-holder p-0 overflow-auto">
                                            <div>
                                                <?php if ($productdata['inOffer'] == 1) { ?>
                                                <p
                                                    class="mb-0 bg-warning text-white px-10 py-5 pb-0 text-center fw-bold">
                                                    <?php echo calPercentage($productdata['amount'], $productdata['offeramount']); ?>
                                                    OFF</p>
                                                <?php } ?>
                                            </div>
                                            <div class="block-holder p-20 subscription-card">
                                                <div class="d-flex align-items-start justify-content-between mb-10">
                                                    <div class="plan-details border-0 p-0">
                                                        <span class="fw-bold text-dark mb-0">Subscription Plan</span>

                                                    </div>
                                                    <div>
                                                    </div>
                                                </div>
                                                <?php
                        if ($productdata['inOffer'] == 1) {
                          echo '<div class="d-flex align-items-end justify-content-center"><h5><del class="text-danger pe-10">&#8377; ' . formatePrice($productdata['amount']) . '</del></h5>';
                          echo '<h3><span class="text-dark"><strong> &#8377; ' . formatePrice($productdata['offeramount']) . '/-</strong> </span></h3> </div>';
                          $subtotal = $productdata['offeramount'];
                        } else {
                          echo '<h5 class="text-dark">&#8377; ' . formatePrice($productdata['amount']) . '</h5>';
                          $subtotal = $productdata['amount'];
                        }
                        ?>

                                                <ul class="list-unstyled features-list pt-20">

                                                    <li class="d-flex justify-content-between mb-10"><span>Amount
                                                        </span><span
                                                            class="fw-bold"><?php echo formatePriceIndia($subtotal); ?></span>
                                                    </li>
                                                    <li
                                                        class="d-flex justify-content-between mb-10 border-bottom pb-10">
                                                        <span>GST (18%) :</span> <span class="fw-bold"><?php $gst = $subtotal * 0.18;
                          echo formatePriceIndia($gst); ?></span>
                                                    </li>
                                                    <li class="d-flex justify-content-between mb-10"><span
                                                            class="fw-bold">Grand
                                                            Total : </span><span class="fw-bold"><?php $grandtotal = $subtotal + $gst;
                          echo formatePriceIndia($grandtotal); ?></span></li>
                                                </ul>
                                                <button type="submit" class="btn btn-green btn-sm w-100"
                                                    id="formsubmit3"><span class="btn-text">Buy Now <i
                                                            class="fa-solid fa-arrow-right"></i></span></button>

                                            </div>

                                            <?php echo form_close(); ?>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div
                                        class="block-holder form-condidates bg-white p-20 border subscription-benefits-card">
                                        <h6 class="fs-6 mb-20 text-dark"> Subscription Benefits</h6>
                                        <ul class="list-unstyled features-list mb-0">
                                            <li class="ps-0 d-flex mb-5">
                                                <div class="feature-img"> <i
                                                        class="fas fa-check-circle text-success"></i>
                                                </div><small class="ms-10">Loan Process in Multiple NBFCs</small>

                                            </li>
                                            <li class="ps-0 d-flex mb-5">
                                                <div class="feature-img"> <i
                                                        class="fas fa-check-circle text-success"></i>
                                                </div><small class="ms-10">100% Online Financial
                                                    Consultation</small>
                                            </li>
                                            <li class="ps-0 d-flex mb-5">
                                                <div class="feature-img"> <i
                                                        class="fas fa-check-circle text-success"></i>
                                                </div><small class="ms-10">Access Personalized
                                                    Tracking Portal</small>
                                            </li>
                                            <li class="ps-0 d-flex mb-5">
                                                <div class="feature-img"> <i
                                                        class="fas fa-check-circle text-success"></i>
                                                </div><small class="ms-10">Dedicated Loan Expert
                                                    Assigned</small>
                                            </li>
                                            <li class="ps-0 d-flex mb-5">
                                                <div class="feature-img"> <i
                                                        class="fas fa-check-circle text-success"></i>
                                                </div><small class="ms-10">Subscription Validity: 9
                                                    Months</small>
                                            </li>
                                            <li class="ps-0 d-flex mb-5">
                                                <div class="feature-img"> <i
                                                        class="fas fa-check-circle text-success"></i>
                                                </div><small class="ms-10">Loan Processing Time: 48
                                                    Hours</small>
                                            </li>
                                        </ul>
                                        <div class="col-lg-8 col-6 m-auto">
                                            <div class="text-center">
                                                <div class="banner__img-two">
                                                    <img src="<?= base_url('assets/images/google.png'); ?>" alt=""
                                                        class="img-fluid">
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="rates-review mb-0">
                                                        <i class="fas fa-star text-warning fa-xs"></i>
                                                        <i class="fas fa-star text-warning fa-xs"></i>
                                                        <i class="fas fa-star text-warning fa-xs"></i>
                                                        <i class="fas fa-star text-warning fa-xs"></i>
                                                        <i class="fas fa-star text-warning fa-xs"></i>
                                                    </div>
                                                    <span class="card-position mb-0 lh-sm fa-xs ms-5">4.95/5</span>
                                                </div>


                                            </div>
                                        </div>
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


                                <!-- </div> -->



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
                                    <img src="<?php echo base_url() ?>assets/images/lending_img/<?php echo $row ?>"
                                        alt="">
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

<script type="text/javascript">
$(document).ready(function() {
    var windowWidth = $(window).width();
    if (windowWidth <= 1024) { //for iPad & smaller devices
        $('#userCollapse').removeClass('show');
    }
});

$(function() {
    $('#submitForm3').on('submit', function(e) {
        $('#form-submit3').html(
            'Processing... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>'
        );
    });
});
</script>

<?php
$this->load->view('includes/footer-apply');
?>