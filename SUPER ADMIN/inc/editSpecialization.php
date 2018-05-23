

<div class="container-fluid">
    <div class="side-body">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <div class="col-md-8">
                            <form method="post" role="form">
                                <h3><i class="fa fa-edit"></i>&nbsp;&nbsp;Update [ Specialization ]</h3>
                                <br/><br/>
                                 <?php
                                  $count=0;
                                  $query = $model->edit_specialization();  //FROM MODEL
                                  if( $result = $model->fetch($query) ){
                                  do{
                                  $count++;
                                  ?>
                               
                                <div class="form-group">
                                  <label>Specialization</label>&nbsp;&nbsp;<span style="color:red"> *</span>
                                  <br/>
                                  <textarea value=""type="text"class="form-control" name="specialization" required><?php echo $result['specialization']; ?></textarea>
                                  <input value="<?php echo $result['specialization_id']; ?>" type="hidden" name="proID"  />
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
                                 <button name="editSpecialization"type="submit" class="btn btn-success">&nbsp;&nbsp;Save Changes&nbsp;&nbsp;</button>
                                 <?php 
                                  }while($result = $model->fetch($query));
                                  } 
                                  ?>
                                <!--div class="x_content bs-example-popovers">
                                      <div style="display: none" class="alert alert-dismissible fade in" role="alert">
                                        <span class="message"></span>
                                      </div>
                                    </div-->
                                
                               
                              </form> 
                            </div>
                           
                                
                                
                            
                       
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->

