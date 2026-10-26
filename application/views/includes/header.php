<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1, user-scalable=0, user-scalable=no, user-scalable=0" />
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

    <meta property="og:title" content="indiafinpro: Your Trusted Source for Quick and Easy Financing">
    <meta property="og:site_name" content="indiafinpro">
    <meta property="og:url" content="<?php echo site_url(); ?>">
    <meta property="og:description"
        content="indiafinpro Expert Financial Consultation company provides fast and easy financing solutions to individuals and businesses in need of financial assistance.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo base_url('assets/img/logo/logo-lg.png'); ?>">
    <meta property="og:locale" content="en_IN">

    <link rel="canonical" href="<?php echo base_url(uri_string()); ?>" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="author" content="vw-team">

    <link rel="shortcut icon" href="<?php echo base_url('assets/img/logo/favicon.png'); ?>">
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo base_url('assets/img/logo/apple-icon-180x180.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/img/logo/favicon-16x16.png'); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/logo/favicon.ico'); ?>">

    <!--=====CSS=======-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <?php echo link_tag('assets/css/vendors.css'); ?>
    <?php echo link_tag('assets/css/bootstrap.css'); ?>
    <?php echo link_tag('assets/css/main.css'); ?>
    <?php echo link_tag('assets/css/custom.css'); ?>
    <?php echo link_tag('assets/css/plugins/form-validation.css'); ?>
    <?php echo link_tag('assets/css/plugins/toastr.css'); ?>
    <?php echo link_tag('assets/css/plugins/fontawesome.css'); ?>

    <script src="<?= base_url('assets/js/plugins/jquery-3-6-0.min.js'); ?>"></script>
    <!-- Facebook Domain + Pixel Code -->
    <?php
  $fbdomain = getFacebookDomain();
  if ($fbdomain != Null) {
    echo '<meta name="facebook-domain-verification" content="' . $fbdomain . '" />';
  }

  $fbpixel = getFacebookPixel();
  if ($fbpixel != Null) {
?>

    <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '<?php echo $fbpixel; ?>');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=<?php echo $fbpixel; ?>&ev=PageView&noscript=1" /></noscript>
    <?php } ?>
    <!-- End Facebook Domain + Pixel Code -->

    <script>
    const base_url = '<?php echo base_url(); ?>'
    </script>

</head>



<body>

    <!-- main container of all the page elements -->
    <div id="wrapper">
        <!--=====HEADER START=======-->
        <header class="header header-theme-1">
            <div class="container">
                <div class="text-start">
                <strong class="logo">
                    <a href="<?php echo site_url(); ?>">
                        <img class="normal-logo" src="<?php echo base_url('assets/images/logo/logo-light.png'); ?>"
                            alt="indiafinpro">
                        <img class="sticky-logo" src="<?php echo base_url('assets/images/logo/logo-img.png'); ?>"
                            alt="indiafinpro">
                    </a>
                </strong>
</div>
                <div class="header-right">
                <a class="btn btn-green btn-sm mobile-btn"
                    href="<?php echo site_url('onlineprocess/applynow'); ?>"><span class="btn-text">+ Apply
                        Now</span></a>
                <div class="main-nav ms-10 header-menu">
                    <a href="<?php echo site_url(); ?>" class="nav-opener d-flex d-lg-none"><span></span></a>
                    <div class="nav-drop d-lg-flex align-items-center justify-content-between">
                        <a href="<?php echo site_url(); ?>" class="nav-close d-flex d-lg-none"><span></span></a>

                        <ul class="navigation">
                            <li><a href="<?php echo site_url(); ?>">Home</a></li>
                            <li><a href="javascript:;" onclick="goToMenu('aboutus')">About Us</a></li>
                      
                            <li><a href="javascript:;" onclick="goToMenu('how-it-works')">How It Works</a></li>
                                     <li><a href="javascript:;" onclick="goToMenu('emi-calculator')">EMI Calculator</a></li>
                                           <li><a href="javascript:;" onclick="goToMenu('faq')">Faq   </a></li>
                                  <li><a href="javascript:;" onclick="goToMenu('contactus')">Contact</a></li>
                            <li><a href="<?php echo site_url('customer'); ?>">Customer Login</a></li>

                        </ul>

                    </div>

                </div>
</div>
                <div>

                    <a class="btn btn-green desktop-btn btn-sm"
                        href="<?php echo site_url('onlineprocess/applynow'); ?>"><span class="btn-text">+ Apply
                            Now</span></a>

                </div>
            </div>
        </header>
        <!--=====HEADER END=======-->