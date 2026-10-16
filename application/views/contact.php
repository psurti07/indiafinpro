<?php
    $this->load->view('includes/header');
?>
    
    <section class="wrapper bg-pale-primary">
      <div class="container pt-10 pt-md-10 pb-8 pb-md-8 text-center">
        <div class="row">
          <div class="col-md-12 col-12">
            <h1 class="display-3 mb-2">Help us serve you better</h1>
            <p class="lead">Easy Access | Dedicated Team</p>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    
    <section class="wrapper bg-light">
      <div class="container counter-wrapper mb-5">
        <div class="row py-10 align-items-center">
          <div class="col-xl-10 mx-auto">
            <div class="card">
              <div class="row gx-0">
                <div class="col-lg-6 align-self-stretch">
                  <div class="map map-full rounded-top rounded-lg-start">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.846339769304!2d72.79357421424828!3d21.19826228734747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04de179e808f1%3A0xeaf8653dd409d900!2sGreen%20Elina!5e0!3m2!1sen!2sin!4v1661768158131!5m2!1sen!2sin" style="width:100%; height: 100%; border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
                  <!-- /.map -->
                </div>
                <!--/column -->
                <div class="col-lg-6">
                  <div class="p-5">
                    <h2 class="mb-2"><?php echo PROJECT_NAME; ?></h2>

                    <div class="d-flex flex-row mb-3">
                      <div>
                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-location-pin-alt"></i> </div>
                      </div>
                      <div class="align-self-start justify-content-start">
                        <h5 class="mb-1">Address</h5>
                        <p><?php echo COMPANY_ADDRESS; ?></p>
                      </div>
                    </div>
                    <!--/div -->

                    <div class="d-flex flex-row mb-3">
                      <div>
                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-asterisk"></i> </div>
                      </div>
                      <div>
                        <h5 class="mb-1">CIN No.</h5>
                        <p><?php echo COMPANY_CIN; ?></p>
                      </div>
                    </div>
                    <!--/div -->

                    <div class="d-flex flex-row mb-3">
                      <div>
                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-phone-volume"></i> </div>
                      </div>
                      <div>
                        <h5 class="mb-1">Phone</h5>
                        <p><?php echo COMPANY_MOBILE; ?></p>
                      </div>
                    </div>
                    <!--/div -->

                    <div class="d-flex flex-row mb-3">
                      <div>
                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-envelope"></i> </div>
                      </div>
                      <div>
                        <h5 class="mb-1">E-mail</h5>
                        <p class="mb-0"><a href="mailto:<?php echo COMPANY_EMAIL; ?>" class="link-body"><?php echo COMPANY_EMAIL; ?></a></p>
                        <p><a href="mailto:<?php echo COMPANY_CP_EMAIL; ?>" class="link-body"><?php echo COMPANY_CP_EMAIL; ?></a></p>
                      </div>
                    </div>
                    <!--/div -->
                    
                    <div class="d-flex flex-row mt-4">
                      <div>
                        <nav class="nav social text-md-end">
                            <?php if(SM_FACEBOOK != '#') { ?>
                              <a href="<?php echo SM_FACEBOOK; ?>" class="btn btn-circle btn-sm btn-facebook"><i class="uil uil-facebook-f"></i></a>
                            <?php } ?>

                            <?php if(SM_INSTAGRAM != '#') { ?>
                              <a href="<?php echo SM_INSTAGRAM; ?>" class="btn btn-circle btn-sm btn-instagram"><i class="uil uil-instagram"></i></a>
                            <?php } ?>

                            <?php if(SM_TWITTER != '#') { ?>
                              <a href="<?php echo SM_TWITTER; ?>" class="btn btn-circle btn-sm btn-twitter"><i class="uil uil-twitter"></i></a>
                            <?php } ?>

                            <?php if(SM_LINKEDIN != '#') { ?>
                              <a href="<?php echo SM_LINKEDIN; ?>" class="btn btn-circle btn-sm btn-linkedin"><i class="uil uil-linkedin"></i></a>
                            <?php } ?>

                            <?php if(SM_YOUTUBE != '#') { ?>
                              <a href="<?php echo SM_YOUTUBE; ?>" class="btn btn-circle btn-sm btn-youtube"><i class="uil uil-youtube"></i></a>
                            <?php } ?>
                        </nav>
                        <!-- /.social -->
                      </div>
                    </div>
                    <!--/div -->
                  </div>
                  <!--/div -->
                </div>
                <!--/column -->
              </div>
              <!--/.row -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->

    <section class="wrapper bg-link-water">
      <div class="container">
        <div class="row py-10">
          <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
            <h3 class="display-5 mb-3 text-center">Drop Us a Line</h3>
            <p class="lead text-center mb-10">Reach out to us from our contact form and we will get back to you shortly.</p>

            <?php echo form_open('infopage/contactsubmission', array('id'=>'contactForm', 'class'=>'', 'novalidate'=>'novalidate')); ?>
              <div class="messages"></div>

              <div class="row gx-4">
                <div class="col-md-6">
                  <div class="form-group form-floating mb-4">
                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Your Name" required data-validation-regex-regex="^[a-zA-Z ]*$">
                    <label for="form_name">Full Name *</label>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                  <div class="form-group form-floating mb-4">
                    <input id="form_mobile" type="text" name="mobile" class="form-control" placeholder="Your Mobile" required minlength="10" maxlength="10" inputmode="numeric" data-validation-regex-regex="^[6789]\d{9}$" data-validation-regex-message="Enter valid mobile number">
                    <label for="form_mobile">Mobile *</label>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                  <div class="form-group form-floating mb-4">
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Your Email Id" required>
                    <label for="form_email">Email *</label>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                  <div class="form-group form-floating mb-4">
                    <input id="form_subject" type="text" name="subject" class="form-control" placeholder="Your subject" required>
                    <label for="form_subject">Subject *</label>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-12">
                  <div class="form-group form-floating mb-4">
                    <textarea id="form_message" name="message" class="form-control" placeholder="Your message" style="height: 150px" required></textarea>
                    <label for="form_message">Message *</label>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-12 text-center">
                  <input type="submit" id="submit-btn" class="btn btn-primary btn-sm rounded btn-send mb-3" value="Send message">
                  <p class="text-muted"><strong>*</strong> These fields are required.</p>
                </div>
                <!-- /column -->
              </div>
              <!-- /.row -->
            <?php echo form_close(); ?> 
            <!-- /form -->
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

<script type="text/javascript">
  $(function(){
      $('#contactForm').on('submit', function(e) {
          e.preventDefault();
          
          $.ajax({
              url : $(this).attr('action'),
              type: "POST",
              data: $(this).serialize(),
              dataType: "JSON",
              cache: false,
              processData: false,
              beforeSend: function(){
                  $('#submit-btn').html("SUBMITTING... <span class='spinner-border spinner-border-sm ms-1' role='status' aria-hidden='true'></span>");
                  $('#submit-btn').attr('disabled', true);
              },
              success: function (response) {
                if(response['success'] == true) {
                    document.getElementById("contactForm").reset();
                    toastr.success(response['message']);
                } else {
                    toastr.error(response['message']);
                }

                $('#submit-btn').html('Send Message');
                $('#submit-btn').attr('disabled', false);
              },
              error: function (jXHR, textStatus, errorThrown) {
                toastr.error(errorThrown, 'ERROR');
                $('#submit-btn').html('Send Message');
                $('#submit-btn').attr('disabled', false);
              }
          });
      });
  });
</script> 