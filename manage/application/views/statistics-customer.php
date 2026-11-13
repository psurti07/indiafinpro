<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("141").className += " active";
      document.getElementById("1413").className += " active";
      customerdata();
  }
</script>

  <div class="content-body">
	<div class="row">
		<div class="col-12">
	      <h2 class="text-bold-600 text-center">Customer Statistics - <?php echo date('d M, Y'); ?></h2><hr/>
	  	</div>
	</div>

	<div class="row">
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-purple bg-lighten-1">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="#">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="customerleadsall"></h3>
			          <span>Customer's Leads - All</span>
			        </div>
			        <div><i class="la la-server text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-purple bg-lighten-1">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="#">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="customerleadspl"></h3>
			          <span>Customer's Leads - PL</span>
			        </div>
			        <div><i class="la la-server text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-purple bg-lighten-1">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="#">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="customerleadsbl"></h3>
			          <span>Customer's Leads - BL</span>
			        </div>
			        <div><i class="la la-server text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-info bg-darken-1">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="#">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="customersellall"></h3>
			          <span>Customer's Sell - All</span>
			        </div>
			        <div><i class="la la-credit-card text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-info bg-darken-1">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="#">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="customersellpl"></h3>
			          <span>Customer's Sell - PL</span>
			        </div>
			        <div><i class="la la-credit-card text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-info bg-darken-1">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="#">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="customersellbl"></h3>
			          <span>Customer's Sell - BL</span>
			        </div>
			        <div><i class="la la-credit-card text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>
    </div>

    <div class="row">
		<div class="col-12">
	      <h2 class="text-bold-600 text-center">All time Statistics</h2><hr/>
	  	</div>
	</div>

	<div class="row">
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-teal bg-lighten-1">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="<?php echo site_url('users/referral?dt_to='.date('Y-m-d')); ?>">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="refcustomerpayoutpending"></h3>
			          <span>Customer Payout - Pending</span>
			        </div>
			        <div><i class="la la-sitemap text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-teal bg-lighten-1">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="<?php echo site_url('users/referral?dt_to='.date('Y-m-d')); ?>">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="refcustomerpayoutapproved"></h3>
			          <span>Customer Payout - Approved</span>
			        </div>
			        <div><i class="la la-sitemap text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-teal bg-lighten-1">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="<?php echo site_url('users/referral?dt_to='.date('Y-m-d')); ?>">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="refcustomerpayoutrejected"></h3>
			          <span>Customer Payout - Rejected</span>
			        </div>
			        <div><i class="la la-sitemap text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-teal bg-lighten-1">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="<?php echo site_url('users/payoutunverifieddocs'); ?>">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="payoutunverifieddocs"></h3>
			          <span>Payout Unverified Documents</span>
			        </div>
			        <div><i class="la la-files-o text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-teal bg-lighten-1">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="<?php echo site_url('users/kycunverifieddocs'); ?>">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="kycunverifieddocs"></h3>
			          <span>KYC Unverified Documents</span>
			        </div>
			        <div><i class="la la-files-o text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>
	</div>
  </div>

<script type="text/javascript">
function customerdata(){
  	$.ajax({
      url: "<?php echo base_url('dashboard/customerdata'); ?>",
      method: "POST",
      dataType: "JSON",
      cache: false,
      contentType: false,
	  processData: false,
      beforeSend:function(){
          document.getElementById('customerleadsall').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('customerleadspl').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('customerleadsbl').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('customersellall').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('customersellpl').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('customersellbl').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('refcustomerpayoutpending').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('refcustomerpayoutapproved').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('refcustomerpayoutrejected').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('kycunverifieddocs').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('payoutunverifieddocs').innerHTML = "<i class='la la-spinner spinner'></i>";
      },
      success: function(response) {
          if(response['success'] == true) {
            document.getElementById('customerleadsall').innerHTML = response['statistics']['customerleadsall'];
            document.getElementById('customerleadspl').innerHTML = response['statistics']['customerleadspl'];
            document.getElementById('customerleadsbl').innerHTML = response['statistics']['customerleadsbl'];
            document.getElementById('customersellall').innerHTML = response['statistics']['customersellall'];
            document.getElementById('customersellpl').innerHTML = response['statistics']['customersellpl'];
            document.getElementById('customersellbl').innerHTML = response['statistics']['customersellbl'];
            document.getElementById('refcustomerpayoutpending').innerHTML = response['statistics']['refcustomerpayoutpending'];
            document.getElementById('refcustomerpayoutapproved').innerHTML = response['statistics']['refcustomerpayoutapproved'];
            document.getElementById('refcustomerpayoutrejected').innerHTML = response['statistics']['refcustomerpayoutrejected'];
            document.getElementById('kycunverifieddocs').innerHTML = response['statistics']['kycunverifieddocs'];
            document.getElementById('payoutunverifieddocs').innerHTML = response['statistics']['payoutunverifieddocs'];
          }
      }
    });

    setTimeout(customerdata, 300000);
}
</script>

<?php
    include_once(APPPATH.'views/includes/footer.php');
?>
