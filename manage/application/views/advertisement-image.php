<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("132").className += " active";
      document.getElementById("1322").className += " active";
  }
</script>

  <div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-1">
      <h1 class="content-header-title text-uppercase">Advertisement - Images</h1>
    </div>
    <div class="content-header-right btn-group-sm text-right col-md-4 col-12 mb-1">
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-keyboard="false" data-target="#addimageads"><i class="la la-plus"></i> Add Ads Image</button>
    </div>
  </div>

  <div class="content-body">
      <section id="configuration">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-content collapse show">
                <div class="card-body">
                  <table class="table table-bordered table-sm dataex-res-configuration">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Images</th>
                        <th class='text-center'>Delete</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        if(count($adslist)) {
                          $cnt=1; 
                          foreach ($adslist as $row) {
                            echo "<tr>";
                            echo "<td width='50'>".htmlentities($cnt)."</td>";

                            echo "<td>".displayDate($row->rec_date)."</td>";

                            echo "<td>";
                              echo "<a href='".COMPANY_SITE."/assets/img/adsimages/".$row->ad_content."' target='_blank'>";
                                echo "<img src='".COMPANY_SITE."/assets/img/adsimages/thumbs/".$row->ad_content."' alt='' class='img-thumbnail img-fluid'>";
                              echo "</a>";
                            echo "</td>";
                            
                            echo "<td class='text-center' width='50'>".anchor("site/deleteads/img/{$row->id}",'<i class="la la-trash"></i>','class="btn btn-icon btn-outline-danger btn-sm"')."</td>";
                            
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


<!-- Modal -->
<div class="modal text-left" id="addimageads" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">Add Advertisement Data</h4>
      </div>
      <div class="modal-body">
          <?php echo form_open_multipart('site/addAdsimg', array('id'=>'submitForm', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data', 'novalidate'=>'novalidate')); ?>
            <input type="hidden" name="adtype" value="2" class="form-control" required>

            <div class="form-body">
              <div class="form-group">
                <h5>Advertisement Image <span class="required">*</span></h5>
                <div class="controls">
                  <input type="file" name="adimage" class="form-control" required data-validation-required-message="Image is required" accept="image/*">
                  <div class="help-block font-small-3"></div>
                  <p class="text-muted font-small-2 mt-1">Upload file format jpg & png only.</p>
                </div>
              </div>
            </div>

            <div class="form-actions text-right pb-0">
              <button type="button" class="btn grey btn-outline-light btn-min-width" data-dismiss="modal">Close</button>
              <button type="submit" id="submit-btn" class="btn btn-primary btn-min-width">Submit</button>
            </div>
          <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

<?php
    include_once(APPPATH.'views/includes/footer.php');
?>

