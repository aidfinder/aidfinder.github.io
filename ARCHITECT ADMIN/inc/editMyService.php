<div id="content-header">
  <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Update My Service</a></div>
  <h1>Update My Service</h1>
</div>
<div class="container-fluid">
  <hr>
<form action="" method="post" enctype="multipart/form-data">
  <div class="row-fluid">
<div class="span12">
    <div class="widget-box">

      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Service Information</h5>
      </div>
        <?php
        $count=0;
        $query = $model->edit_myservice();  //FROM MODEL
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
              <label class="control-label">Service Type *</label>
              <div class="controls">
                  <input value="<?php echo $result['service_type']; ?>"type="text"class="span12" name="service_type"disabled>
              </div>
            </div>
          
          <div class="control-group">
              <label class="control-label">Service Cost Range From*</label>
              <div class="controls">
                  <input value="<?php echo $result['cost']; ?>"type="text"class="span12" name="cost" onkeypress="return isNumber(event)" required>
              </div>
            </div>
          <div class="control-group">
              <label class="control-label">Details *</label>
              <div class="controls">
                  <textarea value=""type="text"class="span12" name="cost_details" required><?php echo $result['cost_details']; ?></textarea>
                  <input value="<?php echo $result['myserve_id']; ?>" type="hidden" name="proID"  />
              </div>
            </div>
        </div>
       
        <div class="form-actions">
          <button type="submit" name="editMyService" class="btn btn-success">Save Changes</button>
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