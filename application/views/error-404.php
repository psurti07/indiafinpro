<?php
    $this->load->view('includes/header');
?>
    <section class="wrapper bg-pale-primary">
      <div class="container pt-100 pb-100">
        <div class="row">
          <div class="col-lg-9 col-xl-8 mx-auto">
            <figure class="mb-10"><img class="img-fluid" src="<?php echo base_url('assets/img/banner/404.png'); ?>" srcset="<?php echo base_url('assets/img/banner/404@2x.png 2x'); ?>" alt=""></figure>
          </div>
          <!-- /column -->
          <div class="col-lg-8 col-xl-7 col-xxl-6 mx-auto text-center">
            <h1 class="mb-3">Oops! .Page Not Found</h1>
            <p class="lead mb-7 px-md-12 px-lg-5 px-xl-7">The page you are looking for is not available or has been moved. Try a different page or go to homepage with the button below.</p>
            <a href="<?php echo site_url(); ?>" class="btn btn-green btn-sm">Go to Homepage</a>
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