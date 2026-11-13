<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("147").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-12 col-12 mb-1">
	    <h1 class="content-header-title text-uppercase">TDS Data</h1>
	  </div>
	</div>


	<div class="content-body">
      <section id="configuration">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <div class="heading-elements">
                    <?php echo form_open('report/tdsdata', array('id'=>'filterForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>
                      <fieldset class="form-group row">
                      From: <input name="dt_to" type="date" class="input-sm form-control col-md-4" id="datepicker" value="<?php echo $dt_to; ?>" style="display: inline;" />
                      &nbsp; &nbsp;
                        To: <input name="dt_from" type="date" class="input-sm form-control col-md-4" id="datepicker1" value="<?php echo $dt_from; ?>" style="display: inline;" />
                        &nbsp; &nbsp;
                        <button class="btn btn-outline-primary btn-sm" name="submit" type="submit">Show</button>
                      </fieldset>
                    <?php echo form_close(); ?> 
                </div>
              </div>

              <div class="card-content collapse show">
                <div class="card-body">
                  <table class="table table-striped table-bordered table-sm responsive dataex-html5-export">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>User Type</th>
                        <th>Fullname</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th class='text-right'>Order Amount</th>
                        <!-- <th class='text-right'>Pay+TDS Amount</th> -->
                        <th class='text-right'>Pay Amount</th>
                        <th class='text-right'>Payout Date</th>
                        <th>GST No</th>
                        <th>PAN No</th>
                        <th>Aadhar Card No</th>
                        <th>City</th>
                        <th>State</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                        $orderamount = $payamount = $tdsamount = 0;

                        if(count($tdslist)) {
                        	$cnt=1; 
                        	foreach ($tdslist as $row) {
                            $tdsamt = 0;
                            
                        		echo "<tr>";

                        		echo "<td width='50'>".htmlentities($cnt)."</td>";
                            
                            echo "<td>";
                            if($row['refferaltype'] == 1) {
                              echo "Customer";
                            }
                            echo "</td>";

                            echo "<td class='text-capitalize'>".htmlentities($row['fullname'])."</td>";

                            echo "<td>".htmlentities($row['mobile'])."</td>";

                            echo "<td width='250' class='dont-break-out'>".htmlentities($row['email'])."</td>";

                            echo "<td class='text-right'>".formatePriceIndia($row['order_amount'])."</td>";
                            $orderamount += $row['order_amount'];

                            echo "<td class='text-right'>".formatePriceIndia($row['payout_amount'])."</td>";
                            $payamount += $row['payout_amount'];

                            /* $tdsamt = $row['payout_amount'] - ($row['payout_amount'] * 0.05);
                            echo "<td class='text-right'>".formatePriceIndia($tdsamt)."</td>";
                            $tdsamount += $tdsamt; */

                            echo "<td>".displayDate($row['payout_date'])."</td>";

                            echo "<td width='250' class='dont-break-out'>".htmlentities($row['gstno'])."</td>";
                            
                            echo "<td width='250' class='dont-break-out'>".htmlentities($row['panno'])."</td>";
                            
                            echo "<td width='250' class='dont-break-out'>".htmlentities($row['aadharno'])."</td>";

                            echo "<td>".htmlentities($row['city'])."</td>";

                            echo "<td>".htmlentities($row['state'])."</td>";

                          	echo "</tr>";
                          	$cnt++;
                        	}
                        }

                        echo "<tr class='text-right text-bold-800'>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "<td>TOTAL</td>";
                          echo "<td>AMOUNT</td>";
                          echo "<td>".formatePriceIndia($orderamount)."</td>";
                          echo "<td>".formatePriceIndia($payamount)."</td>";
                          /* echo "<td>".formatePriceIndia($tdsamount)."</td>"; */
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                        echo "</tr>";
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
