<div id="content-header">
  <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Common elements</a> </div>
  <h1>Update Design</h1>
</div>
<div class="container-fluid">
  <hr>
<form action="" method="post" enctype="multipart/form-data">
  <div class="row-fluid">
    <?php $count=0;
        $querying = $model->edit_designIdeas($_GET['ide']);  //FROM MODEL
        if( $resulting = $model->fetch($querying) ){ ?>
<div class="span6">
    <div class="widget-box">

      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Design Information</h5>
      </div>
        <?php
       
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
              <label class="control-label">Design Name *</label>
              <div class="controls">
                  <input value="<?php echo $resulting['design_title']; ?>"type="text" placeholder="Design Name" name="design_title" class="span12" required>
                  <input value="<?php echo $resulting['design_id']; ?>" type="hidden" name="proID"  />
              </div>
            </div>
          <div class="control-group">
              <label class="control-label">Building Classification *</label>
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
              <label class="control-label">Building Subclassification *</label>
              <div class="controls" id="subcat_div">
                <select class="span12" name="subcat_id" id="subcat_id" disabled> 
                    <option>--Select Subclassification--</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Specialization *</label>
              <div class="controls">
                <select class="span12" name="specialization_id" required> 
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
            </div>
            
            <div class="control-group">
              <label class="control-label">Design Cost *</label>
              <div class="controls">
                  <input value="<?php echo $resulting['design_cost']; ?>"type="text" placeholder="Design Cost" class="span6" name="design_cost" onkeypress="return isNumber(event)">
              </div>
            </div>
        </div>
        <?php 
        ?>

    </div>
  </div>


<div class="span6">
    <div class="widget-box">

      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>More Info</h5>
      </div>
        <div class="widget-content">
            <!--div class="control-group">
              <label class="control-label">File upload input</label>
              <div class="controls">
                <div class="fileupload fileupload-new" data-provides="fileupload">         
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input name="image_filess" type="file" required></span>
                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div>
              </div>
            </div-->
            <div class="control-group">
              <label class="control-label">Design Details *</label><br/>
              <div class="controls">
                <textarea class="textarea_editor span12" value="" name="design_details" rows="6" required><?php echo $resulting['design_details']; ?></textarea>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="editDesignIdeas" class="btn btn-success">Save Changes</button>
            </div>
        </div>
    </div>
  </div>
  <?php } ?>
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