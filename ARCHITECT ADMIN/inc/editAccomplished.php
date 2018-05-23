<div id="content-header">
  <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Update Accomplished Project</a></div>
  <h1>Update Accomplished Project</h1>
</div>
<div class="container-fluid">
  <hr>
<form action="" method="post">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">

        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Accomplished Project Information</h5>
        </div>
          <?php
          $count=0;
          $query = $model->edit_accomplished();  //FROM MODEL
          if( $result = $model->fetch($query) ){
          do{
          $count++;
          ?>
          <?php if(isset($_POST['error']['exist'])){ ?>
          <div class="alert alert-default">                            
            <strong>OOOPss!</strong> <?php echo $_POST['error']['exist']; ?>
          </div>
            <?php }else if(isset($_POST['ok'])){ ?>
          <div class="alert alert-success">                           
            <strong>Well done!</strong> <?php echo $_POST['ok']; ?>
          </div>
          <?php } ?>
          <br/>
          <div class="widget-content">
            <div class="control-group">
                <label class="control-label">Project Defined Title *</label>
                <div class="controls">
                    <input value="<?php echo $result['accproj_title']; ?>"type="text" placeholder="Project Title" name="accproj_title" class="span12" required>
                    <input value="<?php echo $result['accomp_id']; ?>" type="hidden" name="proID"  />
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
              <div class="control-group">
                <label class="control-label">Specialization *</label>
                <div class="controls">
                  <select class="span12" name="specialization_id"> 
                    
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
              </div>
              
              
              <div class="control-group">
                <label class="control-label">Project Overall Cost *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Project Service Fee Cost *</label>
                <div class="controls">
                    <input value="<?php echo $result['accproj_projectamount']; ?>"type="text" placeholder="Overall" class="span6" name="accproj_projectamount" onkeypress="return isNumber(event)" required>
                    <input value="<?php echo $result['accproj_servicefee_paid']; ?>"type="text" placeholder="Service fee" class="span6" name="accproj_servicefee_paid" onkeypress="return isNumber(event)" required>
                </div>
              </div>
               <?php 
                }while($result = $model->fetch($query));
                } 
                ?>
          </div>


      </div>
    </div>

  <div class="span6">
      <div class="widget-box">

        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>More Info</h5>
        </div>
          <div class="widget-content">

              <div class="control-group">
                <label class="control-label">Project Duration *</label>
                <div class="controls">
                    <input type="number" placeholder="# of Days/Weeks/Months" value="<?php echo $result['accproj_duration']; ?>"name="accproj_duration" class="span6" required>
                    <select value="<?php echo $result['accproj_duration']; ?>"name="accproj_duration" class="span6" required>
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
                    <input value="<?php echo $result['accproj_date_started']; ?>"type="date" value="12-02-2012" name="accproj_date_started" class="span6" required>
                    <input value="<?php echo $result['accproj_date_finished']; ?>"type="date" value="12-02-2012" name="accproj_date_finished" class="span6" required>
                </div>
              </div>
              
              <div class="form-actions">
                <button type="submit" name="editAccomplished" class="btn btn-success">Save Changes</button>
              </div>
              <br/><br/><br/><br/><br/><br/><br/>
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