<div id="content-header">
    <div id="breadcrumb"> <a href="admin.php?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">View Logged</a> </div>
    <h1>View Logged</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Logged</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Status</th> 
                  <th>Logger Type</th>
                  <th>Login Date</th>
                  <th>Login Time</th>
                  <th>Logout Date</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $count=0;
                $query = $model->list_Logs();  //FROM MODEL
                if( $result = $model->fetch($query) ){
                do{
                $count++;
                ?> 
                <tr class="gradeX">
                  <td>
                    <?php if($result['logs_status']==1){ ?>
                      <button class="btn btn-success btn-mini"><i class="icon-user"></i>&nbsp;&nbsp;&nbsp;Active&nbsp;&nbsp;&nbsp; </button>
                    <?php }else{ ?>
                       <button class="btn btn-danger btn-mini"><i class="icon-user"></i>&nbsp;&nbsp;&nbsp;Inactive</button>
                     <?php } ?>
                
                  <td><?php echo $result['logger_type']; ?></td> 
                  <td><?php echo $result['login_date']; ?></td>
                  <td><?php echo $result['login_time']; ?></td>
                  <td><?php echo $result['logout_date']; ?></td>
                </tr>
                <?php 
                }while($result = $model->fetch($query));
                } 
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>