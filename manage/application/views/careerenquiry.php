<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("105").className += " active";
      document.getElementById("1052").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-12 col-12 mb-1">
	    <h1 class="content-header-title text-uppercase">Career Enquiry</h1>
	  </div>
	</div>

	<div class="content-body">
      <section id="configuration">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <div class="heading-elements">
                    <?php echo form_open('career/enquiry', array('id'=>'filterForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>
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
                  <table class="table table-striped table-bordered table-sm responsive dataex-res-configuration">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Apply For</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Qualifications</th>
                        <th>Experience</th>
                        <th>Key Skills</th>
                        <th>Resume</th>
                        <th class='text-center'>Delete</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        if(count($enquirylist)) {
                        	$cnt=1; 
                        	foreach ($enquirylist as $row) {
                        		echo "<tr>";
                            echo "<td width='50'>".htmlentities($cnt)."</td>";
                            echo "<td>".fetchRecDate($row->rec_date)."</td>";
                            echo "<td>".htmlentities($row->title)."</td>";
                            echo "<td>".htmlentities($row->firstname)."</td>";
                            echo "<td>".htmlentities($row->lastname)."</td>";
                            echo "<td>".htmlentities($row->mobile)."</td>";
                            echo "<td width='320' class='dont-break-out'>".htmlentities($row->email)."</td>";
                            echo "<td>".htmlentities($row->city)."</td>";
                            echo "<td>".htmlentities($row->qualifications)."</td>";
                            echo "<td>".htmlentities($row->experience)."</td>";
                            echo "<td>".htmlentities($row->keyskills)."</td>";

                            echo "<td>";
                            if($row->resume!="") {
                              echo anchor("career/resumedownload/{$row->resume}",'<i class="la la-download"></i> Download','class="btn btn-icon btn-outline-success btn-sm"');
                            } else {
                              echo "-";
                            }
                            echo "</td>";

                            echo "<td class='text-center' width='50'>".anchor("career/deletecareerenq/{$row->id}",'<i class="la la-trash"></i>','class="btn btn-icon btn-outline-danger btn-sm"')."</td>";
                     
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
