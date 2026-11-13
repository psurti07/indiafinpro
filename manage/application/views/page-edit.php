<?php
    include_once(APPPATH.'views/includes/header.php');

	if($pagename == 'privacy-policy') {
		$pageid = 1;
	}
	else if($pagename == 'refund-policy') {
		$pageid = 11;
	}
	else if($pagename == 'disclaimer'){
		$pageid = 5;
	}
	else if($pagename == 'terms-conditions'){
		$pageid = 2;
	}
	else if($pagename == 'customer-legal-agreement'){
		$pageid = 12;
	}
	else if($pagename == 'welcome-message'){
		$pageid = 4;
	}

?>

<script type="text/javascript">
	let pageName = `<?php echo $pagename ?>`;
	if(pageName != 'welcome-message'){
		window.onload = function(){
			document.getElementById("117").className += " active";
			document.getElementById("117" + <?php echo $pageid; ?>).className += " active";
		}
	} else {
		window.onload = function(){
			document.getElementById("106").className += " active";
			document.getElementById("106" + <?php echo $pageid; ?>).className += " active";
		}
	}
</script>
    <div class="content-header row">
      <div class="content-header-left col-md-12 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Page - <span class="text-uppercase"><?php echo $pagedetails->option_key; ?></span></h1>
      </div>
    </div>

    <div class="content-body">
        <!-- Input Validation start -->
        <section class="input-validation">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                
                <div class="card-content collapse show">
                  <div class="card-body">

                    <?php echo form_open('site/updatePage', array('id'=>'submitForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>
                        <input type="hidden" name="id" value="<?php echo $pagedetails->id; ?>" required>
                        <input type="hidden" name="page" value="<?php echo $pagedetails->option_key; ?>" required>

                        <div class="form-body">
                          <div class="form-group">
                            <div class="controls">
                              <textarea name="content" class="ckeditor"><?php echo $pagedetails->option_value; ?></textarea>
                            </div>
                          </div>
                        </div>

                        <div class="form-actions text-right">
                          <button type="submit" id="submit-btn" class="btn btn-primary btn-min-width">UPDATE</button>
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
