<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("141").className += " active";
      document.getElementById("1411").className += " active";
      digitalstatistics();
  }
</script>

  <div class="content-body">
	<div class="row">
		<div class="col-12">
	      <h2 class="text-bold-600 text-center">Digital Loan Enquiry Statistics - <?php echo date('d M, Y'); ?></h2><hr/>
	  	</div>
	</div>

	<div class="row">
		<!-- Digital Loan -->
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-primary bg-darken-4">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="<?php echo site_url('users/digitalleads?dt_to='.date('Y-m-d')); ?>">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="digitalloans"></h3>
			          <span>Digital Loan Enquiry - All</span>
			        </div>
			        <div><i class="la la-server text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-primary bg-darken-4">
			  <div class="card-content">
			    <div class="card-body">
			   	<a href="<?php echo site_url('users/digitalleads/pl?dt_to='.date('Y-m-d')); ?>">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="digitalpersonal"></h3>
			          <span>Digital Loan Enquiry - Personal</span>
			        </div>
			        <div><i class="la la-server text-white font-large-1 float-right"></i></div>
			      </div>
			  	</a>
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-primary bg-darken-4">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="<?php echo site_url('users/digitalleads/bl?dt_to='.date('Y-m-d')); ?>">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="digitalbusiness"></h3>
			          <span>Digital Loan Enquiry - Business</span>
			        </div>
			        <div><i class="la la-server text-white font-large-1 float-right"></i></div>
			      </div>
			  	</a>
			    </div>
			  </div>
			</div>
		</div>
		<!-- Digital Loan -->

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-red bg-darken-1">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="<?php echo site_url('sms/sentotps?dt_to='.date('Y-m-d')); ?>">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="otpmessage"></h3>
			          <span>Today OTPs</span>
			        </div>
			        <div><i class="la la-asterisk text-white font-large-1 float-right"></i></div>
			      </div>
			  	</a>
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-red bg-darken-1">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="<?php echo site_url('support/ticket'); ?>">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="openticket"></h3>
			          <span>Support Request - Open</span>
			        </div>
			        <div><i class="la la-life-ring text-white font-large-1 float-right"></i></div>
			      </div>
			  	</a>
			    </div>
			  </div>
			</div>
		</div>

    </div>


  </div>

<script type="text/javascript">
function digitalstatistics(){
  	$.ajax({
      url: "<?php echo base_url('dashboard/digitalstatistics'); ?>",
      method: "POST",
      dataType: "JSON",
      cache: false,
      contentType: false,
	  processData: false,
      beforeSend:function(){
          document.getElementById('digitalloans').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('digitalpersonal').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('digitalbusiness').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('otpmessage').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('openticket').innerHTML = "<i class='la la-spinner spinner'></i>";
      },
      success: function(response) {
          if(response['success'] == true) {
            document.getElementById('digitalloans').innerHTML = response['statistics']['digitalloans'];
            document.getElementById('digitalpersonal').innerHTML = response['statistics']['digitalpersonal'];
            document.getElementById('digitalbusiness').innerHTML = response['statistics']['digitalbusiness'];
            document.getElementById('otpmessage').innerHTML = response['statistics']['otpmessage'];
            document.getElementById('openticket').innerHTML = response['statistics']['openticket'];
          }
      }
    });
    setTimeout(digitalstatistics, 300000);
}
</script>

<?php
    include_once(APPPATH.'views/includes/footer.php');
?>
