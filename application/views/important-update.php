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
          <h1>Important Update</h1>
          <p>Latest Media and News Updates</p>
        </div>
      </div>
    </div>
  </div>
</div>

<main class="main">
  <section class="section section-theme-1 section-popular-jobs pt-35 pt-md-50 pt-lg-65 pb-35 pb-md-50 pb-lg-65">
    <div class="container">
      <div class="row">
        <?php
        if (count($noteslist)) {
          foreach ($noteslist as $row) {
            ?>
            <div class="col-12 col-md-12 col-lg-12 mb-15 mb-md-30">
              <a class="featured-category-box alt2 pb-0">
                <div class="wrap">
                  <div class="textbox">
                    <strong class="h6"><?php echo $row->descriptions; ?></strong>
                    <address class="location">
                      <span class="text"><?php echo displayDate($row->rec_date); ?></span>
                      <span class="ms-20"><?php echo $row->tags; ?></span>
                    </address>
                  </div>
                </div>
              </a>
            </div>
          <?php }
        } else { ?>
          <div class="col-12 col-md-12 col-lg-12 mb-15 mb-md-30">
            <a class="featured-category-box alt2 pb-20">
              <div class="wrap">
                <div class="textbox text-center">
                  <strong class="h6">No update as of now!</strong>
                </div>
              </div>
            </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
$this->load->view('includes/footer');
?>