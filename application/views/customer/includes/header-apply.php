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

  <meta property="og:title" content="indiafinpro Trusted Source for Quick and Easy Financing">
  <meta property="og:site_name" content="indiafinpro
  <meta property="og:url" content="<?php echo site_url(); ?>">
  <meta property="og:description"
    content="indiafinpro Consultation company provides fast and easy financing solutions to individuals and businesses in need of financial assistance.">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?php echo base_url('assets/img/logo-dark@2x.png'); ?>">
  <meta property="og:locale" content="en_IN">

  <link rel="canonical" href="<?php echo base_url(uri_string()); ?>" />
  <meta name="robots" content="index, follow" />
  <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
  <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
  <meta name="author" content="vw-team">


  <link rel="shortcut icon" href="<?php echo base_url('assets/img/logo/indiafinpro.png'); ?>">
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
  
  <!-- Datatables CSS -->
  <?php echo link_tag('assets/css/plugins/datatables.min.css'); ?>
  <?php echo link_tag('assets/css/plugins/responsive.dataTables.min.css'); ?>
  <?php echo link_tag('assets/css/plugins/buttons.dataTables.min.css'); ?>
  <?php echo link_tag('assets/css/plugins/buttons.bootstrap4.min.css'); ?>

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
		<!--=====HEADER START=======-->
		<header class="header header-theme-1">
			<div class="container">
				<strong class="logo">
					<a href="<?php echo site_url(); ?>">
						<img class="normal-logo" src="<?php echo base_url('assets/images/logo/logo-lg.png'); ?>" width="175" height="43" alt="indiafinpro
						<img class="sticky-logo" src="<?php echo base_url('assets/images/logo/logo-lg.png'); ?>" width="175" height="43" alt="indiafinpro">
					</a>
				</strong>
				<!-- main menu -->
				<div class="main-nav">
					<a href="<?php echo site_url(); ?>" class="nav-opener d-flex d-lg-none"><span></span></a>
					<div class="nav-drop">
						<a href="<?php echo site_url(); ?>" class="nav-close d-flex d-lg-none"><span></span></a>
						<!-- navigation -->
						<ul class="navigation">
              <li><a href="<?= base_url('customer/dashboard') ?>">Dashboard</a></li>
              <li>
								<a class="dropdown-toggle" href="javascript:;" role="button" data-bs-toggle="dropdown" aria-expanded="false">My Loan</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="<?= base_url('customer/offers') ?>">Apply Now</a></li>
									<li><a class="dropdown-item" href="<?= base_url('customer/offers/preapproved') ?>">Pre-Approval Loan</a></li>
									<li><a class="dropdown-item" href="<?= base_url('customer/loan/history') ?>">My Loan History</a></li>
								</ul>
							</li>
              <!-- <li><a href="<?= base_url('customer/offers/cardoffers') ?>">Card Offers</a></li> -->
              <?php $hidedata = 0; // 0 = show, 1 = Hide
              if ($hidedata == 0) { ?>
              <li>
								<a class="dropdown-toggle" href="javascript:;" role="button" data-bs-toggle="dropdown" aria-expanded="false">Customers</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="<?= base_url('customer/referral') ?>">My Customers</a></li>
									<li><a class="dropdown-item" href="<?= base_url('customer/referral/history') ?>">My Customers Loans</a></li>
								</ul>
							</li>
              <?php } ?>
              <li>
								<a class="dropdown-toggle" href="javascript:;" role="button" data-bs-toggle="dropdown" aria-expanded="false">Documents</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="<?= base_url('customer/profile/documents') ?>">KYC Documents</a></li>
									<li><a class="dropdown-item" href="<?= base_url('customer/profile/payoutdocuments') ?>">Payout Documents</a></li>
								</ul>
							</li>
              <li>
								<a class="dropdown-toggle" href="javascript:;" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="<?= base_url('customer/profile') ?>">My Profile</a></li>
									<li><a class="dropdown-item" href="<?= base_url('customer/profile/subscription') ?>">Subscription Plan</a></li>
                  <li><a class="dropdown-item" href="<?= base_url('customer/support') ?>">Support</a></li>
                  <li><a class="dropdown-item" href="<?= base_url('customer/login/logout') ?>">Logout</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</header>
    <!--=====HEADER END=======-->