<div id="content-header">
  <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="" class="tip-bottom">Service</a></div>
  <h1>Add Service</h1>
</div>
<div class="container-fluid">
  <hr>
<form action="" method="post">
  <div class="row-fluid">
<div class="span12">
    <div class="widget-box">

      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>My Service Information</h5>
      </div>
        <?php if(isset($_POST['error']['exist'])){ ?>
          <div class="alert alert-warning">                            
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
            <label class="control-label">Service *</label>
            <div class="controls">
              <select class="span12" name="service_id" required> 
                <option value="">--Select Service--</option>
                <?php $querkd = $model->service_list();
                if( $quer2ks = $model->fetch($querkd) ){
                  do{ ?>
                  <option value="<?php echo $quer2ks['service_id']; ?>"><?php echo $quer2ks['service_type']; ?></option>
                <?php }while($quer2ks = mysql_fetch_assoc($querkd)); 
                    } 
                  ?>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Service Cost *</label>
            <div class="controls">
                <input type="text" placeholder="Input Cost" name="cost" class="span12" onkeypress="return isNumber(event)" required>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Details *</label>
            <div class="controls">
              <textarea class="textarea_editor span12" name="cost_details" rows="6" placeholder="Enter text ..." required></textarea>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" name="addMyService" class="btn btn-success">Save</button>
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