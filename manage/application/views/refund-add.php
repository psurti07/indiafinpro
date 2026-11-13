<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("137").className += " active";
  }
</script>

    <div class="content-header row">
      <div class="content-header-left col-md-8 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Add Refund</h1>
      </div>
      <div class="content-header-right btn-group-sm text-right col-md-4 col-12 mb-1">
          <a href="<?php echo site_url('account/refund'); ?>" target="_self" class="btn btn-outline-primary"><i class="la la-list-ol"></i> Refund List</a>
      </div>
    </div>


    <div class="content-body">
        <!-- Input Validation start -->
        <section class="input-validation">
          <div class="row">
            <div class="col-lg-8 col-md-12">
              <div class="card">
                
                <div class="card-content collapse show">
                  <div class="card-body">
                    <p><small class="text-muted">Fill the information to continue</small></p>

                    <?php echo form_open_multipart('account/addRefund', array('id'=>'submitForm', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data', 'novalidate'=>'novalidate')); ?>
                        <div class="form-body">
                          
                          <div class="form-group">
                            <h5>Invoice Number <span class="required">*</span></h5>
                            <div class="controls">
                              <input type="text" name="bank_name" class="form-control" required data-validation-required-message="Bank name is required">
                              <div class="help-block font-small-3"></div>
                            </div>
                          </div>

                        </div>

                        <div class="form-actions text-right">
                          <a href="<?php echo site_url('account/refund'); ?>" class="btn btn-outline-light">CANCEL</a>
                          <button type="submit" id="submit-btn" class="btn btn-primary btn-min-width">ADD</button>
                        </div>
                    <?php echo form_close(); ?>

                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </section>
        <!-- Input Validation end -->
    </div>
    
<?php
    include_once(APPPATH.'views/includes/footer.php');
?>
