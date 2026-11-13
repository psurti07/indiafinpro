<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("107").className += " active";
      document.getElementById("1070").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-12 col-12 mb-1">
	    <h1 class="content-header-title text-uppercase">Customers - Payout Unverified Documents</h1>
	  </div>
	</div>

	<div class="content-body">
      <section id="configuration">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-content collapse show">
                <div class="card-body">
                  <table class="table table-striped table-bordered table-sm responsive dataex-html5-export">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Full Name</th>
                        <th>Mobile</th>
                        <th>Email Id</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Referrals</th>
                        <th class='text-center'>Details</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        if(count($userlist)) {
                        	$cnt=1; 
                        	foreach ($userlist as $row) {
                            if($row->isActive == 0) {
                              echo "<tr class='bg-danger bg-lighten-1 white'>";
                            }
                            else {
                              echo "<tr>";
                            }
                        		echo "<td width='50'>".htmlentities($cnt)."</td>";
                            echo "<td>".displayDate($row->rec_date)."</td>";
                            echo "<td class='text-capitalize'>".htmlentities($row->fullname)."</td>";
                        		echo "<td>".htmlentities($row->mobile)."</td>";
                            echo "<td width='320' class='dont-break-out'>".htmlentities($row->email)."</td>";
                            echo "<td>".htmlentities($row->city)."</td>";
                            echo "<td>".htmlentities($row->state)."</td>";
                            echo "<td>".htmlentities($row->refusers)."</td>";
                        		echo "<td class='text-center' width='50'>".anchor("users/payoutdocuments/{$row->id}",'<i class="la la-info"></i>','class="btn btn-icon btn-outline-dark btn-sm"')."</td>";
                        		
                          	echo "</tr>";
                          	$cnt++;
                        	}
                        }
                      ?>

                    </tbody>
                  </table>
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
