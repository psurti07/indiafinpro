<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("129").className += " active";
  }
</script>

  <div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-1">
      <h1 class="content-header-title text-uppercase">Remarketing Log Details</h1>
    </div>

    <div class="content-header-right btn-group-sm text-right col-md-4 col-12">
      <button onclick="window.history.back();" class="btn btn-outline-dark"><i class="la la-chevron-left"></i> Back</button>
    </div>
  </div>


	<div class="content-body">
      <section>
        <div class="row">
          <div class="col-lg-12 col-md-12">

            <div class="card">
              <div class="card-content collapse show">
                <div class="card-body">
                    <dl class="row">
                      <dd class="col-md-4">Date - Time :</dd>
                      <dt class="col-md-8"><?php echo DateFormatDisplay($logdetails->rec_date); ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Msg For :</dd>
                      <dt class="col-md-8"><?php echo $logdetails->crontype; ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Job Name :</dd>
                      <dt class="col-md-8"><?php echo $logdetails->cronname; ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Total Messages :</dd>
                      <dt class="col-md-8"><?php echo $logdetails->msgcount; ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-12">Response :</dd>
                      <dt class="col-md-12">
                          <code>
                            <?php echo $logdetails->msgresponse; ?>
                          </code>
                      </dt>
                    </dl>
                   
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>

  </div>
    
<?php
    include_once(APPPATH.'views/includes/footer.php');
?>
