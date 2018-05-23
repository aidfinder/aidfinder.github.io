<div id="content-header">
  <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Update Service Rate</a></div>
  <h1>Update Service Rate</h1>
</div>
<div class="container-fluid">
  <hr>
<form action="" method="post" enctype="multipart/form-data">
  <div class="row-fluid">
<div class="span12">
    <div class="widget-box">

      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Service Rates Information</h5>
      </div>
        <?php
        $count=0;
        $query = $model->edit_serviceRates();  //FROM MODEL
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
        <div class="widget-content">
          <div class="control-group">
              <label class="control-label">Service Tier *</label>
              <div class="controls">
                  <input value="<?php echo $result['tier_name']; ?>"type="text"class="span12" name="service_type"disabled>
              </div>
            </div>
          
          <div class="control-group">
              <label class="control-label">Service Cost Range From*</label>
              <div class="controls">
                  <input value="<?php echo $result['service_cost_rangefrom']; ?>"type="text"class="span12" name="service_cost_rangefrom" onkeypress="return isNumber(event)" required>
              </div>
            </div>
          <div class="control-group">
              <label class="control-label">Service Cost Range To*</label>
              <div class="controls">
                  <textarea value=""type="text"class="span12" name="service_cost_rangeto" required><?php echo $result['service_cost_rangeto']; ?></textarea>
                  <input value="<?php echo $result['builder_service_id']; ?>" type="hidden" name="proID"  />
              </div>
            </div>
        </div>
       
        <div class="form-actions">
          <button type="submit" name="editServiceRate" class="btn btn-success">Save Changes</button>
        </div>
    </div>
  </div>
   <?php 
    }while($result = $model->fetch($query));
    } 
    ?>        
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
</script>