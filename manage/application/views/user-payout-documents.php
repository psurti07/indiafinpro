<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("107").className += " active";
      document.getElementById("1070").className += " active";
      document.getElementById("7007").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-8 col-12 mb-1">
        <div class="badge badge-pill badge-light badge-square">Customer</div>
  	    <h1 class="content-header-title text-uppercase">Payout Documents</h1>
        <h1 class="text-primary text-uppercase"><?php echo $userdata['fullname']." - ".$userdata['mobile']; ?></h1>
	  </div>

	  <div class="content-header-right btn-group-sm text-right col-md-4 col-12">
            <button onclick="window.history.back();" class="btn btn-outline-dark"><i class="la la-chevron-left"></i> Back</button>
      </div>
	</div>


	<div class="content-body">
      <section>
        <div class="row">
          <?php
              include_once(APPPATH.'views/includes/user-menu.php');
          ?>

          <div class="col-lg-9 col-md-9">
            <div class="card">
              <div class="card-content collapse show">
                <div class="card-body">
                  <?php
                  if(empty($documentlist)) {
                    echo "<h4>No document uploaded.</h4>";
                  } 
                  else {
                  ?>
                      <dl class="row">
                        <?php
                          if($payoutstatus == 1) {
                            echo '<dd class="col-md-6 text-left"><div class="alert alert-success mb-2" role="alert">All documents are verified.</div></dd>';

                            echo '<dt class="col-md-6 text-right"><a href="'.site_url('users/payoutdocverification/0/'.$userdata['id']).'" class="btn btn-outline-danger">Click to Unverified</a></dt>';
                          }
                          else {
                            echo '<dd class="col-md-6 text-left"><div class="alert alert-danger mb-2" role="alert">Documents are not verified yet.</div></dd>';

                            echo '<dt class="col-md-6 text-right"><a href="'.site_url('users/payoutdocverification/1/'.$userdata['id']).'" class="btn btn-outline-success">Click to Verified</a></dt>';
                          }
                        ?>
                      </dl>
                      <hr/>
              
                      <dl class="row">
                        <dt class="col-md-6">GST Document :</dt>
                        <dd class="col-md-6">
                          <?php
                          if($documentlist->gstdoc == NULL) {
                            echo "No document found.";
                          }
                          else {
                            echo "<p><strong>".$documentlist->gstdoc_number."</strong></p>";

                            echo anchor("users/downloadpayoutdoc/{$userdata['id']}/{$documentlist->gstdoc}",'<i class="la la-download"></i> Download','class="btn btn-icon btn-outline-dark btn-sm"');

                            echo anchor("users/reuploadpayoutdoc/gstdoc/{$userdata['id']}",'<i class="la la-exclamation-triangle"></i> Reupload','class="btn btn-icon btn-outline-success btn-sm ml-1"');
                          }
                          ?>
                        </dd>
                      </dl>
                      <hr/>

                      <dl class="row">
                        <dt class="col-md-6">Aadhar Card :</dt>
                        <dd class="col-md-6">
                          <?php
                          if($documentlist->aadharcard == NULL) {
                            echo "No document found.";
                          }
                          else {
                            echo "<p><strong>".$documentlist->aadharcard_number."</strong></p>";

                            echo anchor("users/downloadpayoutdoc/{$userdata['id']}/{$documentlist->aadharcard}",'<i class="la la-download"></i> Download','class="btn btn-icon btn-outline-dark btn-sm"');

                            echo anchor("users/reuploadpayoutdoc/aadharcard/{$userdata['id']}",'<i class="la la-exclamation-triangle"></i> Reupload','class="btn btn-icon btn-outline-success btn-sm ml-1"');
                          }
                          ?>
                        </dd>
                      </dl>
                      <hr/>

                      <dl class="row">
                        <dt class="col-md-6">PAN Card :</dt>
                        <dd class="col-md-6">
                          <?php
                          if($documentlist->pancard == NULL) {
                            echo "No document found.";
                          }
                          else {
                            echo "<p><strong>".$documentlist->pancard_number."</strong></p>";

                            echo anchor("users/downloadpayoutdoc/{$userdata['id']}/{$documentlist->pancard}",'<i class="la la-download"></i> Download','class="btn btn-icon btn-outline-dark btn-sm"');

                            echo anchor("users/reuploadpayoutdoc/pancard/{$userdata['id']}",'<i class="la la-exclamation-triangle"></i> Reupload','class="btn btn-icon btn-outline-success btn-sm ml-1"');
                          }
                          ?>
                        </dd>
                      </dl>
                      <hr/>

                      <dl class="row">
                        <dt class="col-md-6">Cancel Cheque :</dt>
                        <dd class="col-md-6">
                          <?php
                          if($documentlist->cancelcheque == NULL) {
                            echo "No document found.";
                          }
                          else {
                            echo anchor("users/downloadpayoutdoc/{$userdata['id']}/{$documentlist->cancelcheque}",'<i class="la la-download"></i> Download','class="btn btn-icon btn-outline-dark btn-sm"');

                            echo anchor("users/reuploadpayoutdoc/cancelcheque/{$userdata['id']}",'<i class="la la-exclamation-triangle"></i> Reupload','class="btn btn-icon btn-outline-success btn-sm ml-1"');
                          }
                          ?>
                        </dd>
                      </dl>
                   
                    <hr/>
                    <dl class="row">
                      <dt class="col-md-6">Remarks :</dt>
                      <dd class="col-md-6">
                        <?php echo $documentlist->remarks; ?>
                      </dd>
                    </dl>

                  <?php } ?>

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
