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
	    <h1 class="content-header-title text-uppercase">Customer Partner Referrals Details</h1>
	  </div>
	</div>

	<div class="content-body">
      <section>
        
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-content collapse show">
                <div class="card-body">
                    <h3><strong>Refferal Customer Details</strong></h3>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Fullname :</dd>
                      <dt class="col-md-8">
                        <a href="<?php echo site_url('users/userdetails/'.$referraldetails['refferaldetails']->id); ?>" class="text-capitalize" target="_blank">
                        <?php echo $referraldetails['refferaldetails']->fullname; ?>
                        </a>
                      </dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Mobile :</dd>
                      <dt class="col-md-8"><?php echo $referraldetails['refferaldetails']->mobile; ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Refferal code :</dd>
                      <dt class="col-md-8"><?php echo $referraldetails['refferaldetails']->refcode; ?></dt>
                    </dl>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-content collapse show">
                <div class="card-body">
                    <h3><strong>Customer Details</strong></h3>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Fullname :</dd>
                      <dt class="col-md-8">
                        <a href="<?php echo site_url('users/userdetails/'.$referraldetails['customerdetails']->id); ?>" class="text-capitalize" target="_blank">
                        <?php echo $referraldetails['customerdetails']->fullname; ?>
                        </a>
                      </dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Mobile :</dd>
                      <dt class="col-md-8"><?php echo $referraldetails['customerdetails']->mobile; ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">City :</dd>
                      <dt class="col-md-8"><?php echo $referraldetails['customerdetails']->city; ?></dt>
                    </dl>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-content collapse show">
                <div class="card-body">
                    <h3><strong>Subscription Plan Payout</strong></h3>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-5">Reg. Date :</dd>
                      <dt class="col-md-7"><?php echo displayDate($referraldetails['usertree']->rec_date); ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-5">Amount :</dd>
                      <dt class="col-md-7"><?php echo ($referraldetails['usertree']->order_amount != NULL) ? formatePriceIndia($referraldetails['usertree']->order_amount) : '-'; ?></dt>
                    </dl>
                    <hr/>

                   <!-- <dl class="row">
                      <dd class="col-md-5">Payout Amount <small>(Including TDS)</small> :</dd>
                      <dt class="col-md-7"><?php echo ($referraldetails['usertree']->payout_amount != NULL) ? formatePriceIndia($referraldetails['usertree']->payout_amount) : '-'; ?></dt>
                    </dl>
                    <hr/> -->

                    <dl class="row">
                      <dd class="col-md-5">Pay Amount :</dd>
                      <dt class="col-md-7"><?php 
                      if($referraldetails['usertree']->payout_amount != NULL) {
                          // $payamt = $referraldetails['usertree']->payout_amount - ($referraldetails['usertree']->payout_amount * TDS_RATIO);
                          echo formatePriceIndia($referraldetails['usertree']->payout_amount);
                      }
                      else {
                        echo "-";
                      } 
                      ?></dt>
                    </dl>
                    <hr/>

                    <?php
                    if($referraldetails['usertree']->payout == 1) { 
                      $paylabel = "<span class='text-success'>Payout Approved</span>"; 
                      $paydate = displayDate($referraldetails['usertree']->payout_date); 
                      $payinvoice = anchor("users/referralinvoice/{$referraldetails['usertree']->id}",'<i class="la la-print"></i>','class="btn btn-outline-dark btn-sm" target="_blank"');
                    }
                    else if($referraldetails['usertree']->payout == 2) { 
                      $paylabel = "<span class='text-danger'>Payout Rejected</span>"; 
                      $paydate = displayDate($referraldetails['usertree']->payout_date);
                      $payinvoice = "-";
                    }
                    else if($referraldetails['usertree']->payout == 3) { 
                      $paylabel = "<span class='text-info'>Payout Pending</span>"; 
                      $paydate = displayDate($referraldetails['usertree']->payout_date);
                      $payinvoice = "-";
                    }
                    else if($referraldetails['usertree']->payout == 4) { 
                      $paylabel = "<span class='text-warning'>Payout Hold</span>"; 
                      $paydate = displayDate($referraldetails['usertree']->payout_date);
                      $payinvoice = "-";
                    }
                    else {
                      $paylabel = "-"; 
                      $paydate = "-";
                      $payinvoice = "-";
                    }
                    ?>

                    <dl class="row">
                      <dd class="col-md-4">Payout Status :</dd>
                      <dt class="col-md-8"><?php echo $paylabel; ?></dt>
                    </dl>
                    <hr/>

                  
                    <dl class="row">
                      <dd class="col-md-4">Payout Date :</dd>
                      <dt class="col-md-8"><?php echo $paydate; ?></dt>
                    </dl>
                    <hr/>
                   
                    <dl class="row">
                      <dd class="col-md-4">Invoice :</dd>
                      <dt class="col-md-8"><?php echo $payinvoice; ?></dt>
                    </dl>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-12">
            <div class="btn-group" role="group" aria-label="Button group">
              <?php 
               if($referraldetails['usertree']->payout == 1) { 
                  echo anchor("users/payoutstatus/3/{$referraldetails['usertree']->id}",'PENDING','class="btn btn-info"');
                  echo anchor("users/payoutstatus/4/{$referraldetails['usertree']->id}",'HOLD','class="btn btn-warning"');
                  echo anchor("users/payoutstatus/2/{$referraldetails['usertree']->id}",'REJECT','class="btn btn-danger"');
               }
               else if($referraldetails['usertree']->payout == 2) { 
                  echo anchor("users/payoutstatus/1/{$referraldetails['usertree']->id}",'APPROVED','class="btn btn-success"');
                  echo anchor("users/payoutstatus/3/{$referraldetails['usertree']->id}",'PENDING','class="btn btn-info"');
                  echo anchor("users/payoutstatus/4/{$referraldetails['usertree']->id}",'HOLD','class="btn btn-warning"');
               }
               else if($referraldetails['usertree']->payout == 3) { 
                  echo anchor("users/payoutstatus/1/{$referraldetails['usertree']->id}",'APPROVED','class="btn btn-success"');
                  echo anchor("users/payoutstatus/4/{$referraldetails['usertree']->id}",'HOLD','class="btn btn-warning"');
                  echo anchor("users/payoutstatus/2/{$referraldetails['usertree']->id}",'REJECT','class="btn btn-danger"');
               }
               else if($referraldetails['usertree']->payout == 4) { 
                  echo anchor("users/payoutstatus/1/{$referraldetails['usertree']->id}",'APPROVED','class="btn btn-success"');
                  echo anchor("users/payoutstatus/3/{$referraldetails['usertree']->id}",'PENDING','class="btn btn-info"');
                  echo anchor("users/payoutstatus/2/{$referraldetails['usertree']->id}",'REJECT','class="btn btn-danger"');
               }
               else {
                  echo anchor("users/payoutstatus/1/{$referraldetails['usertree']->id}",'APPROVED','class="btn btn-success"');
                  echo anchor("users/payoutstatus/3/{$referraldetails['usertree']->id}",'PENDING','class="btn btn-info"');
                  echo anchor("users/payoutstatus/4/{$referraldetails['usertree']->id}",'HOLD','class="btn btn-warning"');
                  echo anchor("users/payoutstatus/2/{$referraldetails['usertree']->id}",'REJECT','class="btn btn-danger"');
               }
              ?>
            </div>

            <div class="pt-2">
              <?php echo form_open('users/addRemarks', array('id'=>'submitForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>
                <input type="hidden" name="treeid" id="treeid" value="<?php echo $referraldetails['usertree']->id; ?>">

                <fieldset>
                  <div class="input-group">
                    <textarea class="form-control" name="remarks" id="remarks" placeholder="Remarks" aria-describedby="button-addon6"></textarea>
                    <div class="input-group-append">
                      <button type="submit" id="submit-btn" class="btn btn-primary bg-info border-info"><i class="la la-check"></i></button>
                    </div>
                  </div>
                </fieldset>
              <?php echo form_close(); ?>
            </div>

            <div class="pt-2">
                <?php 
                if(count($referraldetails['payoutremarks'])) {
                  foreach ($referraldetails['payoutremarks'] as $payrow) {
                ?>
                <blockquote class="pl-1 border-left-red border-left-3 mt-1">
                  <p class="mb-0"><?php echo $payrow->notetext; ?></p>
                  <footer class="blockquote-footer"><?php echo fetchRecDate($payrow->rec_date); ?></footer>
                </blockquote>
                <?php 
                  }
                }
                ?>
            </div>

          </div>
        </div>

      </section>
  </div>
    
<?php
    include_once(APPPATH.'views/includes/footer.php');
?>
