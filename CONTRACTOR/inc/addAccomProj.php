<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Common elements</a> </div>
  <h1>Add Accomplished Project</h1>
</div>
<div class="container-fluid">
  <hr>
<form action="" method="post" enctype="multipart/form-data">
  <div class="row-fluid">
<div class="span6">
    <div class="widget-box">

      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Accomplished Project Information</h5>
      </div>
        <div class="widget-content">
          <div class="control-group">
              <label class="control-label">Project Defined Title *</label>
              <div class="controls">
                  <input type="text" placeholder="Project Title" name="p_title" class="span12" required>
              </div>
            </div>
          <div class="control-group">
              <label class="control-label">Building Type *</label>
              <div class="controls">
                <select class="span12" name="buildCat" id="buildCat" onchange="filtered_type()"> 
                  <?php $querkd = $model->all_buildingcategory();
                  if( $quer2ks = $model->fetch($querkd) ){
                    do{ ?>
                      <option value="<?php echo $quer2ks['build_cat_id']; ?>">
                        <?php echo $quer2ks['building_category']; ?>
                      </option>
                    <?php 
                      }while($quer2ks = mysql_fetch_assoc($querkd)); 
                    } 
                  ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Building Subcategory *</label>
              <div class="controls" id="subcat_div">
                <select class="span12" name="subcat" id="subcat" disabled> 
                    <option>--Select Subcategory--</option>
                </select>
              </div>
            </div>
            <!--div class="control-group">
              <label class="control-label">Specialization *</label>
              <div class="controls">
                <select class="span12" name="p_spec" required> 
                  <option value="">--Select Specialization--</option>
                  <?php $querkd = $model->all_specialization();
                  if( $quer2ks = $model->fetch($querkd) ){
                    do{ ?>
                      <option value="<?php echo $quer2ks['specialization_id']; ?>"><?php echo $quer2ks['specialization']; ?></option>
                    <?php 
                      }while($quer2ks = mysql_fetch_assoc($querkd)); 
                    } 
                  ?>
                </select>
              </div>
            </div-->
            
            <div class="control-group">
              <label class="control-label">Province *</label>
              <div class="controls">
                <select class="span12" name="provincess" id="provincess" onchange="filtered_municipality()"> 
                  <?php $querkd = $model->all_provinces();
                  if( $quer2ks = $model->fetch($querkd) ){
                    do{ ?>
                      <option value="<?php echo $quer2ks['prov_id']; ?>">
                        <?php echo $quer2ks['name']; ?>
                      </option>
                    <?php 
                      }while($quer2ks = mysql_fetch_assoc($querkd)); 
                    } 
                  ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Municipality *</label>
              <div class="controls" id="mun_div">
                <select class="span12" name="municipality" id="municipalityz" disabled> 
                    <option>--Select Municipality--</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Barangay *</label>
              <div class="controls" id="bar_div">
                <select class="span12" name="barangay" id="barangay" disabled> 
                    <option>--Select Barangay--</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Project Overall Cost *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Project Service Fee Cost *</label>
              <div class="controls">
                  <input type="text" placeholder="Overall" class="span6" name="p_cost" onkeypress="return isNumber(event)">
                  <input type="text" placeholder="Service fee" class="span6" name="p_service" onkeypress="return isNumber(event)">
              </div>
            </div>
        </div>


    </div>
  </div>

<?php 
$queryActivities = $model->getAccomplishedID(); 
if( $resultActivities = $model->fetch($queryActivities) ){
?>
<input type="hidden" value="<?php echo $resultActivities['max(t.accomp_id)+1']; ?>" name="accompID"/>

<?php 
    }
?>
<div class="span6">
    <div class="widget-box">

      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>More Info</h5>
      </div>
        <div class="widget-content">

            <div class="control-group">
              <label class="control-label">Project Duration *</label>
              <div class="controls">
                  <input type="text" placeholder="# of Days/Weeks/Months" name="p_duration" class="span6" onkeypress="return isNumber(event)" required>
                  <select name="p_period" class="span6">
                    <option value="Month(s)">Month(s)</option>
                    <option value="Week(s)">Week(s)</option>
                    <option value="Day(s)">Day(s)</option>
                  </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Date Started (mm-dd) *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date Finished (mm-dd) *</label>
              <div class="controls">
                  <input type="date" value="12-02-2012" name="p_start" class="span6" >
                  <input type="date" value="12-02-2012" name="p_finish" class="span6" >
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">File upload input</label>
              <div class="controls">
                <div class="fileupload fileupload-new" data-provides="fileupload">         
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input name="image_file"type="file" required></span>
                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Accomplished Project Details *</label>
              <div class="controls">
                <textarea class="textarea_editor span12" name="p_detail" rows="6" placeholder="Enter text ..." required></textarea>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="p_save" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
  </div>
  </div>
</form>




</div>
<script type="text/javascript">
    function isNumber(evt){
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
      }
      return true;
    }
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (p) {
            //var LatLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
            $('#us2').locationpicker({
              location: {
                  latitude: p.coords.latitude,
                  longitude: p.coords.longitude
              },
              radius: 50,
              inputBinding: {
                  latitudeInput: $('#latitude'),
                  longitudeInput: $('#longitude'),
                  radiusInput: $('#us2-radius'),
                  locationNameInput: $('#address')
              },
              enableAutocomplete: true
          });
        });
    } else {
        alert('Geo Location feature is not supported in this browser.');
    }
</script>