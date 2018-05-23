<div id="content-header">
  <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="" class="tip-bottom">Service Rate</a></div>
  <h1>Add Service Rate</h1>
</div>
<div class="container-fluid">
  <hr>
<form action="" method="post">
  <div class="row-fluid">
<div class="span12">
    <div class="widget-box">

      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Service Rate Information</h5>
      </div>
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
              <label class="control-label">Package Cost *</label>
              <div class="controls">
                  <input type="text" placeholder="Package Cost" name="package_cost" class="span12" onkeypress="return isNumber(event)">
              </div>
            </div>
            
              <div class="controls">
                <select class="span12" name="package_no"> 
                   <option value="">Choose Package No.</option>
                  <?php for($x=1;$x<=10;$x++){ ?>
                    <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                  <?php } ?>
                </select>
              </div>
              <label class="containerz">Basic Services
                <input type="checkbox" name="check_list[]" value="0" checked="checked">
                <span class="checkmarkz"></span>
              </label>
            <?php $query = $model->service_list();  //FROM MODEL
                if( $result = $model->fetch($query) ){
                    do{ ?>
                <label class="containerz"><?php echo $result['service_type']; ?>
                  <input type="checkbox" name="check_list[]" value="<?php echo $result['service_id']; ?>">
                  <span class="checkmarkz"></span>
                </label>
                  <?php 
                      }while($result = $model->fetch($query));
                    } 
              ?>

            <!--div class="control-group">
              <label class="control-label">Service Cost Range To *</label>
              <div class="controls">
                  <input type="text" placeholder="Cost Range To" name="service_cost_rangeto" class="span12" onkeypress="return isNumber(event)" required>
              </div>
            </div-->
          
            <!--div class="control-group">
              <label class="control-label">Service *</label>
              <div class="controls">
                <select class="span12" name="tier_id" required> 
                  <option value="">--Select Service Tier--</option>
                  <?php $querkd = $model->all_tiers();
                  if( $quer2ks = $model->fetch($querkd) ){
                    do{ $gottcha='0';  ?> 
                         <?php $querkds = $model->all_service();
                        if( $quer2kss = $model->fetch($querkds) ){
                          do{ $fafa=$quer2ks['tier_id'];$mama=($quer2kss['tier_id']);
                            if($fafa==$mama){$gottcha='1'; }
                              }while(($quer2kss = mysql_fetch_assoc($querkds))&&$gottcha=='0'); 
                            } 
                            if($gottcha=='0'){ ?>
                            <option value="<?php echo $quer2ks['tier_id']; ?>"><?php echo $quer2ks['tier_name']; ?></option>
                      <?php 
                          }
                        }while($quer2ks = mysql_fetch_assoc($querkd)); 
                      } 
                    ?>
                </select>
              </div>
            </div>
            
            
            <div class="control-group">
              <label class="control-label">Details *</label>
              <div class="controls">
                <textarea class="textarea_editor span12" name="builder_service_details" rows="6" placeholder="Enter text ..." required></textarea>
              </div>
            </div-->
            <div class="form-actions">
              <button type="submit" name="addServiceRates" class="btn btn-success">Save</button>
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