

<div class="container-fluid">
    <div class="side-body">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <div class="col-md-8">
                            <form method="post" role="form">
                                <h3><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Form [ Specialization ]</h3>
                                <br/><br/>
                                
                                
                                  <div class="form-group">
                                  <label>Specialization</label>&nbsp;&nbsp;<span style="color:red"> *</span>
                                  <br/>
                                  <textarea style="height:50px" name="specialization"type="text" class="form-control" required></textarea>
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
                                <!--div class="x_content bs-example-popovers">
                                      <div style="display: none" class="alert alert-dismissible fade in" role="alert">
                                        <span class="message"></span>
                                      </div>
                                    </div-->
                                
                                <button name="addSpecialization"type="submit" class="btn btn-success">&nbsp;&nbsp;Submit&nbsp;&nbsp;</button>
                                
                            </div>
                           
                                
                                
                            
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->

