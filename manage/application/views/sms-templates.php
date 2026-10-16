<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("145").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-12 col-12 mb-1">
			<h1 class="content-header-title text-uppercase">SMS Templates List</h1>
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
                        <th>Portal</th>
                        <th>Modules</th>
                        <th>Title</th>
                        <th>Message</th>
                        <th class='text-center'>Working</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        if(count($smslist)) {
                        	$cnt=1; 
                        	foreach ($smslist as $row) {
                        		echo "<tr>";
                        		echo "<td width='50'>".htmlentities($row->id)."</td>";

                            echo "<td class='text-capitalize'>".htmlentities($row->portal)."</td>";
                            echo "<td width='150' class='dont-break-out' class='text-lowercase'>".htmlentities($row->module)."</td>";
                        		echo "<td>".htmlentities($row->title)."</td>";
                            echo "<td>".htmlentities($row->message)."</td>";

                            echo "<td class='text-center'>";
                            if($row->isActive == 1) {
                              echo "<i class='la la-check-circle text-success'></i>";
                            }
                            else {
                              echo "<i class='la la-times-circle text-danger'></i>";
                            }
                            echo "</td>";
                            
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
