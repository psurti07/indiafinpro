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
            <div class="row justify-content-between">
                <div class="col-12 col-md-5 col-lg-5 col-xl-5">
                    
                    <div class="visual-textbox pt-0">
                        <h2 class="text-light">Your Loan Search Starts Here </h2>
                        <p class="text-light">Access Options Up to <span style="background: linear-gradient(167.62deg, #2052B6 9%, #F4DECA 428%); padding: 9px; border-radius: 22px;"> ₹10 Lakhs*</span></p>
                        <p class="text-light">Get your business loan approved quickly with minimal paperwork, transparent terms and a simple 100% online process.</p>
                    </div>
                    <div class="banner__img-two">
                        <img src="<?= base_url('assets/images/image_30.png'); ?>" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-7 mb-15 mb-md-30">
                    <div class="block-holder form-condidates bg-white shadow p-0 border">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6 p-0">
                                <div class="subscription-card bg-transparent">
                                    <?php echo form_open('onlineprocess/checkoutDigital', array('id' => 'submitForm3', 'class' => '', 'novalidate' => 'novalidate')); ?>
                                    <input type="hidden" name="loantype" id="loantype"
                                        value="<?php echo $userdetails['loantype']; ?>" class="form-control" required>
                                    <input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>"
                                        class="form-control" required>
                                    <input type="hidden" name="userid" value="<?php echo $userdetails['userid']; ?>"
                                        class="form-control" required>
                                    <input type="hidden" name="fullname" id="fullname"
                                        value="<?php echo $userdetails['fullname']; ?>" class="form-control" required>
                                    <input type="hidden" name="mobile" id="mobile"
                                        value="<?php echo $userdetails['mobile']; ?>" class="form-control" required>
                                    <input type="hidden" name="email" id="email"
                                        value="<?php echo $userdetails['email']; ?>" class="form-control" required>
                                    <input type="hidden" name="cardtype" value="<?php echo $userdetails['cardtype']; ?>"
                                        class="form-control" required>


                                    <div class="box-inner p-30">
                                        <div class="d-flex align-items-start justify-content-between mb-20">
                                            <div class="plan-details border-0 p-0">
                                                <span class="fw-bold text-uppercase mb-10 text-success">Premium
                                                    Subscription</span>
                                                <h6 class="mb-0">Limited-time offer</h6>
                                            </div>
                                            <div>

                                                <?php if ($productdata['inOffer'] == 1) { ?>
                                                <p class="mb-0 bg-success text-white px-10 py-5 h6 rounded-pill pb-0">
                                                    <?php echo calPercentage($productdata['amount'], $productdata['offeramount']); ?>
                                                    OFF</p>
                                                <?php } ?>

                                            </div>
                                        </div>

                                        <?php
                        if ($productdata['inOffer'] == 1) {
                          echo '<div class="d-flex align-items-end justify-content-center"><h5><del class="text-danger pe-10">&#8377; ' . formatePrice($productdata['amount']) . '</del></h5>';
                          echo '<h3><span class="text-success"><strong> &#8377; ' . formatePrice($productdata['offeramount']) . '/-</strong> </span></h3> </div>';
                          $subtotal = $productdata['offeramount'];
                        } else {
                          echo '<h5 class="text-success">&#8377; ' . formatePrice($productdata['amount']) . '</h5>';
                          $subtotal = $productdata['amount'];
                        }
                        ?>
                                        <p class="text-center">One-time fee, GST extra</p>
                                        <ul class="list-unstyled features-list pt-20">

                                            <li class="d-flex justify-content-between mb-10"><span>Amount </span><span
                                                    class="fw-bold"><?php echo formatePriceIndia($subtotal); ?></span>
                                            </li>
                                            <li class="d-flex justify-content-between mb-10 border-bottom pb-10">
                                                <span>GST (18%) :</span> <span class="fw-bold"><?php $gst = $subtotal * 0.18;
                          echo formatePriceIndia($gst); ?></span>
                                            </li>
                                            <li class="d-flex justify-content-between mb-10"><span class="fw-bold">Grand
                                                    Total : </span><span class="fw-bold"><?php $grandtotal = $subtotal + $gst;
                          echo formatePriceIndia($grandtotal); ?></span></li>
                                        </ul>
                                        <button type="submit" class="btn btn-green btn-sm w-100" id="formsubmit3"><span
                                                class="btn-text">Buy Now <i
                                                    class="fa-solid fa-arrow-right"></i></span></button>
                                        <p class="h6 fw-normal mt-15 mb-0 text-center">Secured by 256-bit SSL · UPI /
                                            Cards / Net
                                            Banking</p>
                                    </div>

                                    <?php echo form_close(); ?>
                                </div>

                            </div>
                            <div class="col-12 col-md-6 col-lg-6 p-30 pt-md-30 pt-0 border-start">
                                <div class="box-inner pt-md-30 pt-0 pb-15 border-bottom">
                                    <h6 class="fs-6 mb-20 text-dark"> Subscription Benefits</h6>
                                    <ul class="list-unstyled features-list mb-0">
                                        <li class="ps-0 d-flex mb-10">
                                            <div class="feature-img"> <i class="fa-solid fa-check text-success"></i>
                                            </div><span class="ms-15">Loan Process in Multiple NBFCs</span>

                                        </li>
                                        <li class="ps-0 d-flex mb-10">
                                            <div class="feature-img"> <i class="fa-solid fa-check text-success"></i>
                                            </div><span class="ms-15">100% Online Financial
                                                Consultation</span>
                                        </li>
                                        <li class="ps-0 d-flex mb-10">
                                            <div class="feature-img"> <i class="fa-solid fa-check text-success"></i>
                                            </div><span class="ms-15">Access Personalized
                                                Tracking Portal</span>
                                        </li>
                                        <li class="ps-0 d-flex mb-10">
                                            <div class="feature-img"> <i class="fa-solid fa-check text-success"></i>
                                            </div><span class="ms-15">Dedicated Loan Expert
                                                Assigned</span>
                                        </li>
                                        <li class="ps-0 d-flex mb-10">
                                            <div class="feature-img"> <i class="fa-solid fa-check text-success"></i>
                                            </div><span class="ms-15">Subscription Validity: 9
                                                Months</span>
                                        </li>
                                        <li class="ps-0 d-flex mb-10">
                                            <div class="feature-img"> <i class="fa-solid fa-check text-success"></i>
                                            </div><span class="ms-15">Loan Processing Time: 48
                                                Hours</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="section-theme-6 pt-20 pb-0">
                                    <div class="counters-block pb-0">
                                        <div class="row justify-content-center justify-content-md-between gx-10">
                                            <div class="col-lg-6 col-6">
                                                <div class="counter-box d-block text-center mb-0">
                                                    <div class="icon-wrap mb-10 justify-content-center">
                                                        <i class="fa-regular fa-user text-success"></i>
                                                    </div>
                                                    <div class="counter-stats">
                                                        <strong class="numbers h4 mb-5 text-black">
                                                            <span data-purecounter-duration="1"
                                                                data-purecounter-start="0" data-purecounter-end="10"
                                                                data-purecounter-once="true"
                                                                class="purecounter">10</span>k+
                                                        </strong>
                                                        <span class="subtext text-uppercase">Satisfied
                                                            Customers</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-6">
                                                <div class="counter-box d-block text-center mb-0">
                                                    <div class="icon-wrap mb-10 justify-content-center">
                                                        <i class="fa-solid fa-wallet text-success"></i>
                                                    </div>

                                                    <div class="counter-stats">
                                                        <strong class="numbers h4 mb-5 text-black">
                                                            <span data-purecounter-duration="1"
                                                                data-purecounter-start="0" data-purecounter-end="12"
                                                                data-purecounter-once="true"
                                                                class="purecounter">₹12</span>cr+
                                                        </strong>
                                                        <span class="subtext text-uppercase">Loan Disbursed</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="col-12 col-md-12 mb-15 mb-md-30">
                    <div class="block-holder form-condidates bg-white shadow p-30 border">
                        <span class="text-uppercase fw-normal sub-title mb-5 d-block text-gray-alt h6">Desired
                            Loan
                            Amount</span>
                        <div class="text-start mb-15 border-bottom pb-5">
                            <h4 class="text-dark mb-5">₹<?php echo number_format($userdetails['loanamount'], 2); ?></h4>
                            <p class="mb-0 h6 fw-normal">Tenure: up to 60 months · ROI from 11%*</p>
                        </div>
                        <p class="text-uppercase fw-bold">Customer details</p>
                        <div class="user-details-table mb-0">
                            <div class="d-flex mb-10">
                                <div class="icon-col">
                                    <div class="m-auto">
                                        <div
                                            class="d-flex align-items-center justify-content-center bg-light-gray image-wrap">
                                            <i class="fa-regular fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-10">
                                    <small class="text-uppercase d-block h6 fw-normal">Name</small>
                                    <p class="h6"><?php echo $userdetails['fullname']; ?></p>
                                </div>
                            </div>
                            <div class="d-flex mb-10">
                                <div class="icon-col">
                                    <div class="m-auto">
                                        <div
                                            class="d-flex align-items-center justify-content-center bg-light-gray image-wrap">
                                            <i class="fa-solid fa-phone"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-10">
                                    <small class="text-uppercase d-block h6 fw-normal">Mobile :</small>
                                    <p class="h6"><?php echo $userdetails['mobile']; ?></p>
                                </div>
                            </div>
                            <!-- <div class="d-flex mb-10">
                                <div class="icon-col">
                                    <div class="m-auto">
                                        <div
                                            class="d-flex align-items-center justify-content-center bg-light-gray image-wrap">
                                            <i class="fa-regular fa-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-10">
                                    <small class="text-uppercase d-block h6 fw-normal">Loan Amount :</small>
                                    <p class="h6"><?php echo formatePriceIndia($userdetails['loanamount']); ?></p>
                                </div>
                            </div> -->
                            <div class="d-flex mb-10">
                                <div class="icon-col">
                                    <div class="m-auto">
                                        <div
                                            class="d-flex align-items-center justify-content-center bg-light-gray image-wrap">
                                            <i class="fa-regular fa-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-10">
                                    <small class="text-uppercase d-block h6 fw-normal">Email</small>
                                    <p class="h6"><?php echo $userdetails['email']; ?></p>
                                </div>
                            </div>
                            <div class="d-flex mb-10">
                                <div class="icon-col">
                                    <div class="fbox-ico ico-16 m-auto">
                                        <div
                                            class="d-flex align-items-center justify-content-center bg-light-gray image-wrap">
                                            <i class="fa-regular fa-file"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-10">
                                    <small class="text-uppercase d-block h6 fw-normal">Loan Type</small>
                                    <p class="h6">Personal Loan</p>
                                </div>
                            </div>

                        </div>
                        <div class="otp-velidation-text-wrap border border-success bg-light p-10">

                            <div class="d-flex align-items-start">

                                <div>
                                    <i class="fa-solid fa-shield text-success"></i>
                                </div>
                                <p class="mb-0 ms-10 mt-0 h6 fw-normal">Your data is
                                    256-bit encrypted and never
                                    shared
                                    without your consent.</p>

                            </div>
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