
<div id="content-header">
    <div id="breadcrumb"> <a href="admin.php?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="" class="tip-bottom">View My Service</a></div>
    <h1>View My Service</h1>
</div>
<!--Minimum Rate-->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog sm">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Input Minimum Rate (PHP)</h4>
              </div>
              <div class="modal-body">
                <div class="control-group">
                <div class="controls">
                    <input type="hidden" id="myID" value="<?php echo $_SESSION['architectlogged']['builder_id']; ?>"/>
                    <center><input type="text" name="myminimum" id="min_rate" class="span4" onkeypress="return isNumber(event)"></center>
                </div>
              </div>
              <div class="message"></div>
              </div>
              <div class="modal-footer">
                <button type="button" id="addMyMinimum" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            
          </div>
        </div>


        <div id="myModalMinimumEdit" class="modal fade" role="dialog">
          <div class="modal-dialog sm">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Minimum Rate (PHP)</h4>
              </div>
              <div class="modal-body">
                <div class="control-group">
                <div class="controls">
                    <?php $querkd = $model->myMinimumExistence();$myCurrentMinimum=0;
                          $myUpdateID=0;
                          if( $quer2ks = $model->fetch($querkd) )
                          {
                            $myCurrentMinimum=$quer2ks['myminimum'];
                            $myUpdateID=$quer2ks['min_id'];
                          } ?>
                    <input type="hidden" id="myUpdateID" value="<?php echo $myUpdateID; ?>"/>
                    <center>
                        <input type="text" id="myCurrentMinimum" value="<?php echo $myCurrentMinimum; ?>" class="span4" onkeypress="return isNumber(event)">
                    </center>

                </div>
              </div>
              <div class="message"></div>
              </div>
              <div class="modal-footer">
                <button type="button" id="updateMyMinimum" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            
          </div>
        </div>
        <!--Minimum Rate-->
  <div class="container-fluid">
    <hr>
    
    <div class="row-fluid">
      <form method="post">
      <div class="span4">
    <div class="widget-box">

      <div class="widget-title"> 
        <span class="icon"> 
          
          <?php $querkd = $model->myMinimumExistence();
              if( $quer2ks = $model->fetch($querkd) ){ ?>
              <a data-toggle="modal" data-target="#myModalMinimumEdit" title="Update Minimum Rate">
                <i class="icon-pencil"></i>
              </a>
          <?php }else{ ?>
              <a data-toggle="modal" data-target="#myModal" title="Add Minimum Rate">
                <i class="icon-plus-sign"></i>
              </a>
          <?php } ?>
           
        </span>
        <h5>Add Service Rate</h5>
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
            <label class="control-label">Service Rate *</label>
            <div class="controls">
                <input type="text" placeholder="Input Rate" name="cost" class="span12" onkeypress="return isNumber(event)" required>
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
</form>
      <div class="span8">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>My Service Rates</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  
                  <th>Action</th>
                  <th>Service type</th>
                  <th>Cost</th>
                  <th>Details</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $count=0;
                $query = $model->all_myservice();  //FROM MODEL
                if( $result = $model->fetch($query) ){
                do{
                $count++;
                ?> 
                <tr class="gradeX">
                  
                  <td>
                  <div class="btn-group">
                  <?php if($result['my_status']==1){ ?>
                      <button type="button"class="btn btn-success btn-xs"><i class="icon-legal"></i></button>
                      <button type="button"class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="admin.php?page=viewMyService&deactMyService=<?php echo $result['myserve_id']; ?>">Deactivate</a></li>
                         <li><a href="admin.php?page=editMyService&ide=<?php echo $result['myserve_id']; ?>">Edit</a></li>
                      </ul>
                  </div>
                  <div class="btn-group">
                  <?php }else{ ?>
                      <button type="button"class="btn btn-danger btn-xs"><i class="icon-legal"></i></button>
                      <button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="admin.php?page=viewMyService&actMyService=<?php echo $result['myserve_id']; ?>">Activate</a></li>
                        <li><a href="admin.php?page=editMyService&ide=<?php echo $result['myserve_id']; ?>">Edit</a></li>
                      </ul>
                   <?php } ?>
                   </div>
                  </td>
                   
                  <td><?php echo $result['service_type']; ?></td>
                  <td><?php echo number_format($result['cost']); ?></td>
                  <td><?php echo $result['cost_details']; ?></td>
                  
                </tr>
                <?php }while($result = $model->fetch($query)); }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


