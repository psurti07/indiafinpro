<?php $this->load->view('customer/includes/header-apply');
$isall = 0;
if ($profiledata->cardtype == 12) {
	$loantype = "bl";
} else {
	$loantype = "pl";
}
?>
<div class="subvisual-block subvisual-theme-1 bg-dark-green d-flex pt-60 pt-md-90 pt-lg-150 pb-30 text-white">
    <div class="pattern-image"><img src="<?php echo base_url('assets/images/img/pages-2.jpg'); ?>" width="1920"
            height="570" alt="Pattern"></div>
    <div class="container position-relative text-center">
        <div class="row">
            <div class="col-12">
                <div class="subvisual-textbox">
                    <h1 class="text-dark">Payout Documents</h1>
                </div>
                <nav class="breadcrumb-nav text-blue d-flex justify-content-center">
                    <ul class="breadcrumb mb-0">
                        <li class="breadcrumb-item">Documents</li>
                        <li class="breadcrumb-item text-green active">Payout Documents</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<main class="main">
    <section class="section section-theme-9 mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-3">
                    <div class="jobs-card p-20 flex-column">
                        <h4>Document List</h4>
                        <ul class="footer-links">
                            <li><img src="<?= $docflags['gstdoc'] == 1 ? base_url('assets/images/icons/check.jpg') : base_url('assets/images/icons/uncheck.jpg') ?>"
                                    alt="" height="20px" width="20px"> GST Documents</li>

                            <li><img src="<?= $docflags['aadharcard'] == 1 ? base_url('assets/images/icons/check.jpg') : base_url('assets/images/icons/uncheck.jpg') ?>"
                                    alt="" height="20px" width="20px"> Aadhar Card</li>

                            <li><img src="<?= $docflags['pancard'] == 1 ? base_url('assets/images/icons/check.jpg') : base_url('assets/images/icons/uncheck.jpg') ?>"
                                    alt="" height="20px" width="20px"> PAN Card</li>

                            <li><img src="<?= $docflags['cancelcheque'] == 1 ? base_url('assets/images/icons/check.jpg') : base_url('assets/images/icons/uncheck.jpg') ?>"
                                    alt="" height="20px" width="20px"> Cancel Cheque</li>
                        </ul>
                        <p class="text-danger mt-3">Note : All of the above documents are mandatory.</p>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-9">
                    <div class="row">
                        <!-- GST Number start -->
                        <?php if ($docflags['gstdoc'] == 0) { ?>
                        <div class="col-lg-6">
                            <div class="jobs-card p-20">
                                <form action="<?= base_url('customer/profile/uploadpayoutdocument'); ?>"
                                    id="submitForm11" class="" enctype="multipart/form-data" novalidate="novalidate"
                                    method="post" accept-charset="utf-8">
                                    <input type="hidden" name="doc" value="gstdoc" required>
                                    <input type="hidden" name="customerid" value="<?php echo $profiledata->id; ?>"
                                        required>
                                    <h6 class="mb-3">GST Document *</h6>
                                    <div class="form-group input-group">
                                        <input id="user_gstdoc_number" type="text" name="userfile_number"
                                            class="mb-4 form-control" placeholder="GST Number *"
                                            value="<?php echo ($docflags['gstdoc_number'] != 0) ? $docflags['gstdoc_number'] : ''; ?>"
                                            required>
                                    </div>
                                    <div class="form-group input-group">
                                        <input type="file" name="userfile" id="user_gstdoc" class="form-control"
                                            aria-required="true" required accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
                                        <div class="input-group-append">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-success">UPLOAD</button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php $isall += 1;
						} ?>
                        <!-- GST Number end -->
                        <!-- Aadhaar card start -->
                        <?php if ($docflags['aadharcard'] == 0) { ?>
                        <div class="col-lg-6">
                            <div class="jobs-card p-20">
                                <form action="<?= base_url('customer/profile/uploadpayoutdocument'); ?>"
                                    id="submitForm12" class="" enctype="multipart/form-data" novalidate="novalidate"
                                    method="post" accept-charset="utf-8">
                                    <input type="hidden" name="doc" value="aadharcard" required>
                                    <input type="hidden" name="customerid" value="<?php echo $profiledata->id; ?>"
                                        required>
                                    <h6 class="mb-3">Aadhaar Card *</h6>
                                    <div class="form-group input-group">
                                        <input id="user_aadharcard_number" type="text" name="userfile_number"
                                            class="mb-4 form-control" placeholder="Aadhar Card Number *"
                                            value="<?php echo ($docflags['aadharcard_number'] != 0) ? $docflags['aadharcard_number'] : ''; ?>"
                                            required>
                                    </div>
                                    <div class="form-group input-group">
                                        <input type="file" name="userfile" id="user_aadharcard" class="form-control"
                                            aria-required="true" required accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
                                        <div class="input-group-append">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-success">UPLOAD</button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php $isall += 1;
						} ?>
                        <!-- Aadhaar card end -->
                        <!-- Pan card start -->
                        <?php if ($docflags['pancard'] == 0) { ?>
                        <div class="col-lg-6">
                            <div class="jobs-card p-20">
                                <form action="<?= base_url('customer/profile/uploadpayoutdocument'); ?>"
                                    id="submitForm13" class="" enctype="multipart/form-data" novalidate="novalidate"
                                    method="post" accept-charset="utf-8">
                                    <input type="hidden" name="doc" value="pancard" required>
                                    <input type="hidden" name="customerid" value="<?php echo $profiledata->id; ?>"
                                        required>
                                    <h6 class="mb-3">PAN Card *</h6>
                                    <div class="form-group input-group">
                                        <input id="user_pancard_number" type="text" name="userfile_number"
                                            class="mb-4 form-control" placeholder="PAN Card Number *"
                                            value="<?php echo ($docflags['pancard_number'] != 0) ? $docflags['pancard_number'] : ''; ?>"
                                            required>
                                    </div>
                                    <div class="form-group input-group">
                                        <input type="file" name="userfile" id="user_pancard" class="form-control"
                                            aria-required="true" required accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
                                        <div class="input-group-append">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-success">UPLOAD</button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php $isall += 1;
						} ?>
                        <!-- Pan card end -->
                        <!-- Cancel Cheque start -->
                        <?php if ($docflags['cancelcheque'] == 0) { ?>
                        <div class="col-lg-6">
                            <div class="jobs-card p-20">
                                <form action="<?= base_url('customer/profile/uploadpayoutdocument'); ?>"
                                    id="submitForm15" class="" enctype="multipart/form-data" novalidate="novalidate"
                                    method="post" accept-charset="utf-8">
                                    <input type="hidden" name="doc" value="cancelcheque" required>
                                    <input type="hidden" name="customerid" value="<?php echo $profiledata->id; ?>"
                                        required>
                                    <h6 class="mb-3">Cancel Cheque *</h6>
                                    <div class="form-group input-group">
                                        <input type="file" name="userfile" id="user_cheque" class="form-control"
                                            aria-required="true" required accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
                                        <div class="input-group-append">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-success">UPLOAD</button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php $isall += 1;
						} ?>
                        <!-- Cancel Cheque end -->
                    </div>
                    <?php if($isall == 0 && $docflags['isVerified'] == 0) { ?>
                    <div class="col-lg-12">
                        <div class="jobs-card p-20 flex-column">
                            <h4>Upload Successful</h4>
                            <p class="mb-0">Your documents are successfully submitted. Our Company Executive will verify
                                the documents and contact you shortly.</p>
                        </div>
                    </div>
                    <?php } else if($isall == 0 && $docflags['isVerified'] == 1) { ?>
                    <div class="col-lg-12">
                        <div class="jobs-card p-20 flex-column">
                            <h4>Verification Successful</h4>
                            <p class="mb-0">Dear Customer, your documents are successfully verified. Our Company
                                Executive will contact you soon for your loan process.</p>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($docflags['gstdoc_number'] != '' || $docflags['aadharcard_number'] != '' || $docflags['pancard_number'] != '') { ?>
                    <div class="col-lg-12">
                        <div class="jobs-card p-20 flex-column">
                            <?php
								if ($docflags['gstdoc_number'] != '') {
									echo "<h6 class='mb-3'>GST Number - " . $docflags['gstdoc_number'] . "</h6>";
								}
								if ($docflags['aadharcard_number'] != '') {
									echo "<h6 class='mb-3'>Aadhar Card Number - " . $docflags['aadharcard_number'] . "</h6>";
								}
								if ($docflags['pancard_number'] != '') {
									echo "<h6 class='mb-3'>PAN Card Number - " . $docflags['pancard_number'] . "</h6>";
								}
							?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php echo form_open('customer/profile/payoutdocumentmsg', array('id' => 'submitForm21', 'class' => '', 'novalidate' => 'novalidate')); ?>
                    <div class="col-lg-12">
                        <div class="jobs-card p-20 flex-column">
                            <input type="hidden" name="customerid" value="<?php echo $profiledata->id; ?>" required>
                            <textarea id="remarks" name="remarks" class="form-control" required
                                placeholder="Your Experience"
                                style="height: 100px"><?php echo $docflags['remarks']; ?></textarea>
                            <button type="form-submit1" class="btn btn-success mt-3 btn-next">Submit</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php echo link_tag('assets/css/plugins/bootstrap.min.css'); ?>
<?php $this->load->view('customer/includes/footer-apply'); ?>