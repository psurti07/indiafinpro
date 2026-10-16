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
          <h1>Privacy Policy</h1>
        </div>
      </div>
    </div>
  </div>
</div>

<main class="main">
  <section
    class="section section-job-details add-styles section-theme-1 pt-35 pt-md-50 pt-lg-75 pt-xl-100 pb-35 pb-md-50 pb-xl-100">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="text-holder">
            <?php echo $contentdetails->option_value; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
$this->load->view('includes/footer');
?>