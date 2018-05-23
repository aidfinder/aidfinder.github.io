

<div class="container-fluid">
    <div class="side-body">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <div class="col-md-8">
                            <form method="post" role="form">
                                <h3><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Form [ Sub Category ]</h3>
                                <br/><br/>
                                <div class="form-group">
                                    <label>Category</label>&nbsp;&nbsp;<span style="color:red"> *</span>
                                    <br/>
                                    <select class="form-control" name="build_cat_id" required>
                                    <option value="0">Select Category *</option>  
                                    <?php
                                      $count=0;
                                      $query = $model->all_buildingcategory();  //FROM MODEL
                                      if( $result = $model->fetch($query) ){
                                      do{
                                      $count++;
                                      ?> 
                                    <option value="<?php echo $result['build_cat_id']; ?>"><?php echo $result['building_category']; ?></option>
                                    <?php }while($result = $model->fetch($query));}?>
                                    </select>
                                </div>
                                
                                  <div class="form-group">
                                  <label>Sub Category</label>&nbsp;&nbsp;<span style="color:red"> *</span>
                                  <br/>
                                  <textarea style="height:100px" name="subcategory"type="text" class="form-control" required></textarea>
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
                                <button name="addsubcategory"type="submit" class="btn btn-success">&nbsp;&nbsp;Submit&nbsp;&nbsp;</button>
                                
                            </div>
                           
                                
                                
                            
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->

