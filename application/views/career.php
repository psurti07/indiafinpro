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
          <h1>Join Our Team</h1>
          <p>Thank you for expressing an interest in working with indiafinpro>
        </div>
      </div>
    </div>
  </div>
</div>

<main class="main">
  <section
    class="section section-theme-5 trending-block bg-white pt-35 pt-md-50 pt-lg-75 pt-xxl-120 pb-35 pb-md-50 pb-lg-65 pb-xxl-100">
    <div class="container">
      <table>
        <tr>
          <th>Job Title</th>
          <th>Job Time</th>
          <th>Job Code</th>
          <th>Apply</th>
        </tr>
        <?php if(count($openinglist)) { $cnt = 1; foreach ($openinglist as $row) { ?>
          <tr>
            <td><?php echo $row->title; ?></td>
            <td>Full time</td>
            <td><?php echo $row->slug; ?></td>
            <td><a class="btn btn-green btn-sm" href="<?php echo site_url('apply/career/'.$row->slug); ?>" class="text-light">Apply Now</a></td>
          </tr>
        <?php $cnt++; } } else { ?>
          <tr>
            <td colspan="4">
              <div class="text-center">
                <span>Unfortunately, we do not currently have any openings. Please send your updated CV to: <a class="text-dark" href='mailto:hr@indiafinpro.com'>hr@indiafinpro.com</a> <br/> We will contact you if your qualifications match any of our future requirements.</span>
              </div>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </section>
</main>

<?php
$this->load->view('includes/footer');
?>