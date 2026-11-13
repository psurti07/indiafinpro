<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("141").className += " active";
      document.getElementById("1415").className += " active";
      applicationdata();
  }
</script>

  <div class="content-body">
	<div class="row">
		<div class="col-12">
	      <h2 class="text-bold-600 text-center">Application Statistics - <?php echo date('d M, Y'); ?></h2><hr/>
	  	</div>
	</div>

	<div class="row">
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-purple bg-darken-2">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="<?php echo site_url('loan/application?dt_to='.date('Y-m-d')); ?>">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="userapplication"></h3>
			          <span>Loan Applications - New</span>
			        </div>
			        <div><i class="la la-list text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-purple bg-darken-2">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="<?php echo site_url('loan/reapplyhistory?dt_to='.date('Y-m-d')); ?>">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="reapplyapplication"></h3>
			          <span>Loan Applications - Reapply</span>
			        </div>
			        <div><i class="la la-list text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-purple bg-darken-2">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="<?php echo site_url('loan/oldapplication?d=21'); ?>">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="oldapplication"></h3>
			          <span>Loan Applications - 21 Days older</span>
			        </div>
			        <div><i class="la la-list text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>
    </div>
  </div>

<script type="text/javascript">
function applicationdata(){
  	$.ajax({
      url: "<?php echo base_url('dashboard/applicationdata'); ?>",
      method: "POST",
      dataType: "JSON",
      cache: false,
      contentType: false,
	  processData: false,
      beforeSend:function(){
          document.getElementById('userapplication').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('reapplyapplication').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('oldapplication').innerHTML = "<i class='la la-spinner spinner'></i>";
      },
      success: function(response) {
          if(response['success'] == true) {
            document.getElementById('userapplication').innerHTML = response['statistics']['userapplication'];
            document.getElementById('reapplyapplication').innerHTML = response['statistics']['reapplyapplication'];
            document.getElementById('oldapplication').innerHTML = response['statistics']['oldapplication'];
          }
      }
    });

    setTimeout(applicationdata, 300000);
}
</script>

<?php
    include_once(APPPATH.'views/includes/footer.php');
?>
