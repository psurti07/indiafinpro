<?php
$this->load->view('includes/header-apply');
?>

<div class="subvisual-block subvisual-theme-1 bg-dark-green d-flex pt-60 pt-md-90 pt-lg-150 pb-30 text-white">
  <div class="pattern-image"><img src="<?php echo base_url('assets/images/img/pages-2.jpg'); ?>" width="1920"
      height="570" alt="Pattern"></div>
  <div class="container position-relative text-center">
    <div class="row">
      <div class="col-12">
        <div class="subvisual-textbox text-dark">
          <h1 class="mb-2"><?php echo $jobdetails->title; ?></h1>
          <p><i class="far fa-bookmark me-1"></i> <?php echo $jobdetails->slug; ?> <i class="far fa-clock me-1"></i>
            Full time</p>
        </div>
      </div>
    </div>
  </div>
</div>

<main class="main">
  <section
    class="section section-contact section-theme-1 pt-35 pt-md-50 pt-lg-75 pt-xl-100 pt-xxl-120 pb-35 pb-md-50 pb-lg-75 pb-xl-100 pb-xxl-120">
    <div class="container">
      <header class="section-header">
        <h2>Apply Now</h2>
      </header>
      <div class="row justify-content-between">
        <div class="col-12 col-md-6 mb-40 mb-md-0">
          <?php echo form_open_multipart('apply/careerSubmission', array('id' => 'submitForm2', 'class' => '', 'enctype' => 'multipart/form-data', 'novalidate' => 'novalidate')); ?>
          <div class="row">
            <input type="hidden" name="id" value="<?php echo $jobdetails->id; ?>" class="form-control" required>
            <input type="hidden" name="slug" value="<?php echo $jobdetails->slug; ?>" class="form-control" required>
            <div class="form-group col-6 mb-15 mb-md-20 mb-lg-25">
              <input class="form-control" type="text" id="firstname" name="firstname" placeholder="First Name *"
                required data-validation-regex-regex="^[a-zA-Z ]*$">
              <div class="help-block font-small-3"></div>
            </div>
            <div class="form-group col-6 mb-15 mb-md-20 mb-lg-25">
              <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Last Name *" required
                data-validation-regex-regex="^[a-zA-Z ]*$">
              <div class="help-block font-small-3"></div>
            </div>
            <div class="form-group col-6 mb-15 mb-md-20 mb-lg-25">
              <input class="form-control" type="email" id="emailid" name="emailid" placeholder="Email *" required>
              <div class="help-block font-small-3"></div>
            </div>
            <div class="form-group col-6 mb-15 mb-md-20 mb-lg-25">
              <input class="form-control" type="text" id="mobile" name="mobile" placeholder="Mobile *" required
                minlength="10" maxlength="10" inputmode="numeric" data-validation-regex-regex="^[6789]\d{9}$"
                data-validation-regex-message="Enter valid mobile number">
              <div class="help-block font-small-3"></div>
            </div>
            <div class="form-group col-6 mb-15 mb-md-20 mb-lg-25">
              <input class="form-control" type="text" id="city" name="city" placeholder="City *" required>
              <div class="help-block font-small-3"></div>
            </div>
            <div class="form-group col-6 mb-15 mb-md-20 mb-lg-25">
              <input class="form-control" type="text" id="qualifications" name="qualifications"
                placeholder="Qualifications *" required>
              <div class="help-block font-small-3"></div>
            </div>
            <div class="form-group col-12 mb-15 mb-md-20 mb-lg-25">
              <textarea class="form-control" cols="30" rows="3" id="experience" name="experience"
                placeholder="Your Experience" required></textarea>
              <div class="help-block font-small-3"></div>
            </div>
            <div class="form-group col-12 mb-15 mb-md-20 mb-lg-25">
              <textarea class="form-control" cols="30" rows="3" id="keyskills" name="keyskills"
                placeholder="Your Key Skills" required></textarea>
              <div class="help-block font-small-3"></div>
            </div>
            <div class="form-group col-12 mb-15 mb-md-20 mb-lg-25">
              <input class="form-control" type="file" id="resume" name="resume" placeholder="Upload Resume *" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf" required>
              <div class="help-block font-small-3"></div>
            </div>
            <div class="form-group col-12 mb-15 mb-md-20 mb-lg-25">
              <p>By submitting the form & proceeding, you agree to the <a
                  href="<?php echo site_url('terms-conditions'); ?>" target="_blank" class="text-dark"><strong>Terms of
                    Use</strong></a> and <a href="<?php echo site_url('privacy-policy'); ?>" target="_blank"
                  class="text-dark"><strong>Privacy Policy</strong></a> of indiafinpro.com</p>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-green btn-sm" id="submit-btn2"><span class="btn-text">APPLY
                  NOW</span></button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
        <div class="col-12 col-md-6 col-xl-5">
          <ul class="contact-support">
            <li>
              <div class="contact-box">
                <div class="textbox">
                  <h2 class="mb-20">Job Description:</h2>
                  <address><?php echo $jobdetails->descriptions; ?></address>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
$this->load->view('includes/footer');
?>

<script type="text/javascript">
  $(function () {
    $('#submitForm2').on('submit', function (e) {
      e.preventDefault();
      var formData = new FormData($(this)[0]);

      $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        data: formData,
        async: true,
        dataType: "JSON",
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $('#submit-btn2').html('Applying... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>');
          $('#submit-btn2').attr('disabled', true);
        },
        success: function (response) {
          if (response['success'] == true) {
            document.getElementById("submitForm2").reset();
            toastr.success(response['message']);
          }
          else {
            toastr.error(response['message']);
          }
          $('#submit-btn2').html('APPLY NOW');
          $('#submit-btn2').attr('disabled', false);
        },
        error: function (jXHR, textStatus, errorThrown) {
          toastr.error(errorThrown, 'ERROR');
          $('#submit-btn2').html('APPLY NOW');
          $('#submit-btn2').attr('disabled', false);
        }
      });
    });
  });
</script>