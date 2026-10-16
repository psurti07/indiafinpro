<?php
    include_once(APPPATH.'views/includes/header.php');

    if($loan == 'pl'){
      $activemenu = 1081;
      $activesubmenu = 10811;
      $headertitle = "Personal Loan - Company Leads";
    } 
    else if($loan == 'bl'){
      $activemenu = 1082;
      $activesubmenu = 10821;
      $headertitle = "Business Loan - Company Leads";
    }
    else {
      $headertitle = "Digital Loan - Company Leads";
    }
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("<?php echo $activemenu; ?>").className += " active";
    document.getElementById("<?php echo $activesubmenu; ?>").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">
            <?php echo $headertitle; ?>
        </h1>
    </div>
</div>


<div class="content-body">
    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <div class="heading-elements">
                            <?php 
                      $attributes = array('class' => 'email', 'id' => 'myform');
                      echo form_open('users/digitalleads/'.$loan, array('id'=>'filterForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>
                            <fieldset class="form-group row">
                                From: <input name="dt_to" type="date" class="input-sm form-control col-md-4"
                                    id="datepicker" value="<?php echo $dt_to; ?>" style="display: inline;" />
                                &nbsp; &nbsp;
                                To: <input name="dt_from" type="date" class="input-sm form-control col-md-4"
                                    id="datepicker1" value="<?php echo $dt_from; ?>" style="display: inline;" />
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
                                        <th>Date</th>
                                        <th>Full Name</th>
                                        <th>Mobile</th>
                                        <th>Email Id</th>
                                        <th>Pincode</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th class='text-center'>Details</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                        if(count($userlist)) {
                        	$cnt=1; 
                        	foreach ($userlist as $row) {
                        		echo "<tr>";
                        		echo "<td width='50'>".htmlentities($cnt)."</td>";
                            echo "<td width='150'>".DateFormatDisplay($row->update_date)."</td>";
                            echo "<td class='text-capitalize'>".htmlspecialchars($row->fullname ?? '')."</td>";
                        		echo "<td>".htmlspecialchars($row->mobile ?? '')."</td>";
                            echo "<td width='320' class='dont-break-out'>".htmlspecialchars($row->email ?? '')."</td>";
                            echo "<td>".htmlspecialchars($row->pincode ?? '')."</td>";
                            echo "<td>".htmlspecialchars($row->city ?? '')."</td>";
                            echo "<td>".htmlentities($row->state ?? '')."</td>";
                        	  echo "<td class='text-center' width='50'>".anchor("users/leaddetails/{$row->id}",'<i class="la la-info"></i>','class="btn btn-icon btn-outline-dark btn-sm"')."</td>";
                        		
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