<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("1121").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-12 col-12 mb-1">
	    <h1 class="content-header-title text-uppercase">Customer Referrals</h1>
	  </div>
	</div>


	<div class="content-body">
      <section>
        <div class="row">

          <div class="col-md-12">
            <div class="card">

              <div class="card-header">
                <div class="heading-elements">
                    <?php echo form_open('users/referral', array('id'=>'filterForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>
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
                        <th>Reg. Date</th>
                        <th>Customer</th>
                        <th>Mobile</th>
                        <th class='text-right'>Amount</th>
                        <th class='text-right'>Payout</th>
                        <th>Referal Customer</th>
                        <th>Referal Mobile</th>
                        <th>Payout</th>
                        <th class='text-center'>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if(count($reflist)) {
                          $cnt=1; 
                          foreach ($reflist as $row) {
                            echo "<tr>";
                            echo "<td>".$cnt."</td>";

                            echo "<td>".displayDate($row->rec_date)."</td>";
                            echo "<td>".anchor("users/userdetails/{$row->customerid}",$row->customer,'class="text-capitalize"')."</td>";
                            echo "<td>".$row->customermobile."</td>";
                           
                            echo "<td class='text-right'>";
                            echo ($row->order_amount != NULL) ? formatePriceIndia($row->order_amount) : '-';
                            echo "</td>";

                            echo "<td class='text-right'>";
                            echo ($row->payout_amount != NULL) ? formatePriceIndia($row->payout_amount) : '-';
                            echo "</td>";

                            echo "<td>".anchor("users/referrallist/{$row->referalid}",$row->referal,'class="text-capitalize"')."</td>";
                            echo "<td>".$row->refmobile."</td>";

                            if($row->payout == 1) {
                              echo "<td class='text-success'>APPROVED</td>";
                            }
                            else if($row->payout == 2) {
                              echo "<td class='text-danger'>REJECTED</td>";
                            }
                            else if($row->payout == 3) {
                              echo "<td class='text-info'>PENDING</td>";
                            }
                            else if($row->payout == 4) {
                              echo "<td class='text-warning'>Hold</td>";
                            }
                            else {
                              echo "<td>-</td>";
                            }

                            echo "<td class='text-center' width='50'>".anchor("users/referraldetails/{$row->id}",'<i class="la la-info"></i>','class="btn btn-icon btn-outline-dark btn-sm"')."</td>";
                            
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
