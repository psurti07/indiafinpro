<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=0, user-scalable=no, user-scalable=0" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#194ba2">

    <title>
        <?php if (isset($meta->title)) {
            echo $meta->title;
        } else {
            echo "Apply for Instant Personal Loan Online approvals | indiafinpro";
        } ?>
    </title>
    <meta name="description" content="<?php if (isset($meta->descriptions)) {
        echo $meta->descriptions;
    } ?>" />
    <meta name="keywords" content="<?php if (isset($meta->keywords)) {
        echo $meta->keywords;
    } ?>" />

    <meta property="og:title" content="indiafinprour Trusted Source for Quick and Easy Financing">
    <meta property="og:site_name" content="indiafinpro
    <meta property="og:url" content="<?php echo site_url(); ?>">
    <meta property="og:description" content="indiafinpro Financial Consultation company provides fast and easy financing solutions to individuals and businesses in need of financial assistance.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo base_url('assets/img/logo-dark@2x.png'); ?>">
    <meta property="og:locale" content="en_IN">

    <link rel="canonical" href="<?php echo base_url(uri_string()); ?>" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="author" content="vw-team">

    <link rel="shortcut icon" href="<?php echo base_url('assets/img/logo/indiafinproicon.png'); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/img/logo/apple-icon-180x180.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/img/logo/favicon-16x16.png'); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/logo/favicon.ico'); ?>">

    <!--=====CSS=======-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <?php echo link_tag('assets/css/vendors.css'); ?>
    <?php echo link_tag('assets/css/bootstrap.css'); ?>
    <?php echo link_tag('assets/css/main.css'); ?>
    <?php echo link_tag('assets/css/custom.css'); ?>
    <?php echo link_tag('assets/css/plugins/form-validation.css'); ?>
    <?php echo link_tag('assets/css/plugins/toastr.css'); ?>
    <?php echo link_tag('assets/css/plugins/fontawesome.css'); ?>
    <script src="<?= base_url('assets/js/plugins/jquery-3-6-0.min.js'); ?>"></script>
    <script>
        const base_url = '<?php echo base_url(); ?>'
    </script>
</head>

<body>

    <!-- main container of all the page elements -->
    <div id="wrapper">
        <div class="page-loader">
            <div class="loader-animmte"></div>
            <div class="loader-logo">
                <img src="<?php echo base_url('assets/images/logo/favicon.png'); ?>" alt="Favicon">
            </div>
        </div>

        <main class="main">
      <section
        class="section section-accounts section-theme-1 pt-35 pt-md-50 pt-lg-75 pt-xl-100 pt-xxl-120 pb-35 pb-md-50 pb-lg-75 pb-xl-100 pb-xxl-120 bg-dark">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-6 m-auto">
              <div class="account-box">
                                <div class="account-box-frame text-dark bg-white">
                <div class="text-center pb-30" style="margin:auto">
                  <img src="<?php echo base_url('assets/images/logo/logo-lg.png'); ?>" alt="user" class="img-fluid" width="200px">
                </div>
                <div class="">
                  <div class="form-head">
                    <h5>Password Reset</h5>
                  </div>
                  <?php echo form_open('customer/login/sendForgetmessage', array('id' => 'submitForm1', 'class' => 'contac-form', 'novalidate' => 'novalidate')); ?>
                    <div class="row mt-10">
                        <div class="col-12 mb-15 mb-md-20">
                            <input class="form-control" type="text" id="mobile" name="mobile"
                                placeholder="Mobile No" id="mobile" required minlength="10"
                                maxlength="10" inputmode="numeric"
                                data-validation-regex-regex="^[6789]\d{9}$"
                                data-validation-regex-message="Enter valid mobile number">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-green btn-sm"><span class="btn-text">SEND</span></button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                  <div class="social-login">
                    <strong class="title mt-10">Don't have an account? <a href="<?php echo site_url('customer'); ?>" class="text-success">Login Now</a></strong>
                  </div>
                </div>
</div>
              </div>
            </div>
            
          </div>
        </div>
      </section>
    </main>

        <!--=====footer-start=======-->
        <footer class="footer footer-theme-1">
      <div class="sec-footer bg-dark-green text-white pt-20 pb-20">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-7 mb-15 mb-md-0">
                            <p class="text-white">CIN No: <?php echo COMPANY_CIN; ?> | Call Support: <?php echo COMPANY_MOBILE; ?></p>
                        </div>
                        <div class="col-12 col-md-5">
                            <p class="text-white"><?php echo date('Y') . ' &copy; ' . COMPANY_NAME; ?> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--=====footer-end=======-->

    </div>

    <!--=====JS=======-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/jquery-3.6.4.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/vendor.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/jquery.main.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/plugins/jqBootstrapValidation.js'); ?>" type="text javascript"></script>
    <script src="<?php echo base_url('assets/js/plugins/form-validation.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/plugins/toastr.min.js'); ?>" type="text/javascript"></script>

    <script type="text/javascript">
        $(function () {
            $('#submitForm1').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action') || window.location.pathname,
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: "JSON",
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $('#form-submit1').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> SENDING...');
                        $('#form-submit1').attr('disabled', true);
                    },
                    success: function (response) {
                        if (response['success'] == true) {
                            document.getElementById("submitForm1").reset();
                            toastr.success(response['message']);
                            setTimeout(function () {
                                window.location.href = `<?php echo base_url('customer') ?>`;
                            }, 2000);
                        }
                        else {
                            toastr.error(response['message']);
                        }
                        $('#form-submit1').html('SEND');
                        $('#form-submit1').attr('disabled', false);
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        $('#form-submit1').html('SEND');
                        $('#form-submit1').attr('disabled', false);
                        toastr.error(errorThrown, 'ERROR');
                    }
                });
            });
        });
    </script>

</body>

</html>