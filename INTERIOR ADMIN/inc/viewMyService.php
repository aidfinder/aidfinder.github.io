<div id="content-header">
    <div id="breadcrumb"> <a href="admin.php?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="" class="tip-bottom">View My Service</a></div>
    <h1>View My Service</h1>
</div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>My Service Information</h5>
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