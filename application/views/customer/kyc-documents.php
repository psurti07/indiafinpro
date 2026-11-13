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
                    <h1 class="text-dark">KYC Documents</h1>
                </div>
                <nav class="breadcrumb-nav text-blue d-flex justify-content-center">
                    <ul class="breadcrumb mb-0">
                        <li class="breadcrumb-item">Documents</li>
                        <li class="breadcrumb-item text-green active">KYC Documents</li>
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
                            <li><img src="<?= $docflags['profilephoto'] == 1 ? base_url('assets/images/icons/check.jpg') : base_url('assets/images/icons/uncheck.jpg') ?>"
                                    alt="" height="20px" width="20px"> Profile Photo</li>

                            <li><img src="<?= $docflags['aadharcard'] == 1 ? base_url('assets/images/icons/check.jpg') : base_url('assets/images/icons/uncheck.jpg') ?>"
                                    alt="" height="20px" width="20px"> Aadhaar Card</li>

                            <li><img src="<?= $docflags['pancard'] == 1 ? base_url('assets/images/icons/check.jpg') : base_url('assets/images/icons/uncheck.jpg') ?>"
                                    alt="" height="20px" width="20px"> PAN Card</li>

                            <li><img src="<?= $docflags['lightbill'] == 1 ? base_url('assets/images/icons/check.jpg') : base_url('assets/images/icons/uncheck.jpg') ?>"
                                    alt="" height="20px" width="20px"> Address Proof - Light bill</li>

                            <li><img src="<?= $docflags['cancelcheque'] == 1 ? base_url('assets/images/icons/check.jpg') : base_url('assets/images/icons/uncheck.jpg') ?>"
                                    alt="" height="20px" width="20px"> Cancel Cheque</li>

                            <li><img src="<?= $docflags['bankstatement'] == 1 ? base_url('assets/images/icons/check.jpg') : base_url('assets/images/icons/uncheck.jpg') ?>"
                                    alt="" height="20px" width="20px"> Bank Statement - Last 6 months</li>

                            <?php if ($profiledata->cardtype == 11) { ?>
                            <li><img src="<?= $docflags['formsixteen'] == 1 ? base_url('assets/images/icons/check.jpg') : base_url('assets/images/icons/uncheck.jpg') ?>"
                                    alt="" height="20px" width="20px"> Form 16</li>

                            <li><img src="<?= $docflags['salaryslip'] == 1 ? base_url('assets/images/icons/check.jpg') : base_url('assets/images/icons/uncheck.jpg') ?>"
                                    alt="" height="20px" width="20px"> Salary Slip</li>
                            <?php } ?>

                            <?php if ($profiledata->cardtype == 12) { ?>
                            <li><img src="<?= $docflags['businessproof'] == 1 ? base_url('assets/images/icons/check.jpg') : base_url('assets/images/icons/uncheck.jpg') ?>"
                                    alt="" height="20px" width="20px"> Business Proof</li>

                            <li><img src="<?= $docflags['itreturn'] == 1 ? base_url('assets/images/icons/check.jpg') : base_url('assets/images/icons/uncheck.jpg') ?>"
                                    alt="" height="20px" width="20px"> IT Return</li>
                            <?php } ?>
                        </ul>
                        <p class="text-danger mt-3">Note : All of the above documents are not mandatory, provide what
                            you have.</p>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-9">
                    <div class="row">
                        <!-- Profile Photo start -->
                        <?php if ($docflags['profilephoto'] == 0) { ?>
                        <div class="col-lg-6">
                            <div class="jobs-card p-20">
                                <form action="<?= base_url('customer/profile/uploaddocument'); ?>" id="submitForm11"
                                    class="" enctype="multipart/form-data" novalidate="novalidate" method="post"
                                    accept-charset="utf-8">
                                    <input type="hidden" name="doc" value="profilephoto" required>
                                    <input type="hidden" name="customerid"
                                        value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
                                    <h6 class="mb-3">Profile Photo *</h6>
                                    <div class="form-group input-group">
                                        <input type="file" name="userfile" id="user_photo" class="form-control"
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
                        <!-- Profile Photo End -->
                        <!-- Aadhaar card start -->
                        <?php if ($docflags['aadharcard'] == 0) { ?>
                        <div class="col-lg-6">
                            <div class="jobs-card p-20">
                                <form action="<?= base_url('customer/profile/uploaddocument'); ?>" id="submitForm12"
                                    class="" enctype="multipart/form-data" novalidate="novalidate" method="post"
                                    accept-charset="utf-8">
                                    <input type="hidden" name="doc" value="aadharcard" required>
                                    <input type="hidden" name="customerid"
                                        value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
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
                                <form action="<?= base_url('customer/profile/uploaddocument'); ?>" id="submitForm13"
                                    class="" enctype="multipart/form-data" novalidate="novalidate" method="post"
                                    accept-charset="utf-8">
                                    <input type="hidden" name="doc" value="pancard" required>
                                    <input type="hidden" name="customerid"
                                        value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
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
                        <!-- Light Bill start -->
                        <?php if ($docflags['lightbill'] == 0) { ?>
                        <div class="col-lg-6">
                            <div class="jobs-card p-20">
                                <form action="<?= base_url('customer/profile/uploaddocument'); ?>" id="submitForm14"
                                    class="" enctype="multipart/form-data" novalidate="novalidate" method="post"
                                    accept-charset="utf-8">
                                    <input type="hidden" name="doc" value="lightbill" required>
                                    <input type="hidden" name="customerid"
                                        value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
                                    <h6 class="mb-3">Address Proof - Light bill *</h6>
                                    <div class="form-group input-group">
                                        <input type="file" name="userfile" id="user_lightbill" class="form-control"
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
                        <!-- Light Bill end -->
                        <!-- Cancel Cheque start -->
                        <?php if ($docflags['cancelcheque'] == 0) { ?>
                        <div class="col-lg-6">
                            <div class="jobs-card p-20">
                                <form action="<?= base_url('customer/profile/uploaddocument'); ?>" id="submitForm15"
                                    class="" enctype="multipart/form-data" novalidate="novalidate" method="post"
                                    accept-charset="utf-8">
                                    <input type="hidden" name="doc" value="cancelcheque" required>
                                    <input type="hidden" name="customerid"
                                        value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
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
                        <!-- Bank statement start -->
                        <?php if ($docflags['bankstatement'] == 0) { ?>
                        <div class="col-lg-6">
                            <div class="jobs-card p-20">
                                <form action="<?= base_url('customer/profile/uploaddocument'); ?>" id="submitForm16"
                                    class="" enctype="multipart/form-data" novalidate="novalidate" method="post"
                                    accept-charset="utf-8">
                                    <input type="hidden" name="doc" value="bankstatement" required>
                                    <input type="hidden" name="customerid"
                                        value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
                                    <h6 class="mb-3">Bank Statement - Last 6 months *</h6>
                                    <div class="form-group input-group">
                                        <input type="file" name="userfile" id="user_bankstatement" class="form-control"
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
                        <!-- Bank Statement end -->
                        <?php if ($profiledata->cardtype == 11) { ?>
                        <!-- form sixteen start -->
                        <?php if ($docflags['formsixteen'] == 0) { ?>
                        <div class="col-lg-6">
                            <div class="jobs-card p-20">
                                <form action="<?= base_url('customer/profile/uploaddocument'); ?>" id="submitForm17"
                                    class="" enctype="multipart/form-data" novalidate="novalidate" method="post"
                                    accept-charset="utf-8">
                                    <input type="hidden" name="doc" value="formsixteen" required>
                                    <input type="hidden" name="customerid"
                                        value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
                                    <h6 class="mb-3">Form 16</h6>
                                    <div class="form-group input-group">
                                        <input type="file" name="userfile" id="user_formsixteen" class="form-control"
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
                        <!-- form sixteen end -->
                        <!-- salary slip start -->
                        <?php if ($docflags['salaryslip'] == 0) { ?>
                        <div class="col-lg-6">
                            <div class="jobs-card p-20">
                                <form action="<?= base_url('customer/profile/uploaddocument'); ?>" id="submitForm18"
                                    class="" enctype="multipart/form-data" novalidate="novalidate" method="post"
                                    accept-charset="utf-8">
                                    <input type="hidden" name="doc" value="salaryslip" required>
                                    <input type="hidden" name="customerid"
                                        value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
                                    <h6 class="mb-3">Salary Slip</h6>
                                    <div class="form-group input-group">
                                        <input type="file" name="userfile" id="user_salaryslip" class="form-control"
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
                        <!-- salary slip end -->
                        <?php } ?>
                        <?php if ($profiledata->cardtype == 12) { ?>
                        <!-- business proof start -->
                        <?php if ($docflags['businessproof'] == 0) { ?>
                        <div class="col-lg-6">
                            <div class="jobs-card p-20">
                                <form action="<?= base_url('customer/profile/uploaddocument'); ?>" id="submitForm19"
                                    class="" enctype="multipart/form-data" novalidate="novalidate" method="post"
                                    accept-charset="utf-8">
                                    <input type="hidden" name="doc" value="businessproof" required>
                                    <input type="hidden" name="customerid"
                                        value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
                                    <div class="form-group input-group">
                                        <input type="file" name="userfile" id="user_businessproof" class="form-control"
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
                        <!-- business proof end -->
                        <!-- it return start -->
                        <?php if ($docflags['itreturn'] == 0) { ?>
                        <div class="col-lg-6">
                            <div class="jobs-card p-20">
                                <form action="<?= base_url('customer/profile/uploaddocument'); ?>" id="submitForm20"
                                    class="" enctype="multipart/form-data" novalidate="novalidate" method="post"
                                    accept-charset="utf-8">
                                    <input type="hidden" name="doc" value="itreturn" required>
                                    <input type="hidden" name="customerid"
                                        value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
                                    <div class="form-group input-group">
                                        <input type="file" name="userfile" id="user_itreturn" class="form-control"
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
                        <!-- it return end -->
                        <?php } ?>
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
                    <?php if($docflags['aadharcard_number'] != '' || $docflags['pancard_number'] != '') { ?>
                    <div class="col-lg-12">
                        <div class="jobs-card p-20 flex-column">
                            <?php
								if($docflags['aadharcard_number'] != '') {
									echo "<h6 class='mb-3'>Aadhar Card Number - ".$docflags['aadharcard_number']."</h6>";
								}
								if($docflags['pancard_number'] != '') {
									echo "<h6 class='mb-3'>PAN Card Number - ".$docflags['pancard_number']."</h6>";
								}
							?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php echo form_open('customer/profile/documentmsg', array('id'=>'submitForm21', 'class'=>'', 'novalidate'=>'novalidate')); ?>
                    <div class="col-lg-12">
                        <div class="jobs-card p-20 flex-column">
                            <input type="hidden" name="customerid"
                                value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
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


<script>
$('#user_photo, #user_aadharcard, #user_pancard, #user_lightbill, #user_cheque, #user_bankstatement, #user_formsixteen, #user_salaryslip, #user_businessproof, #user_itreturn')
    .bind('change', function() {
        if (this.files[0].size > 4096000) {
            $(this).val('');
            toastr.error('Please upload file less then 4 MB');
        }
    });
</script>

<?php echo link_tag('assets/css/plugins/bootstrap.min.css'); ?>
<?php $this->load->view('customer/includes/footer-apply'); ?>