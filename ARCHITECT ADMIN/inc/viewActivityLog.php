<div id="content-header">
    <div id="breadcrumb"> <a href="admin.php?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Activity Log</a> </div>
    <h1>Activity Log</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Activity Log</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                 
                  <th>Activity</th>
                  <th>Login Date</th>
                  <th>Login Time</th>
                  <th>Logout Date</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $count=0;
                $query = $model->list_activityLog();  //FROM MODEL
                if( $result = $model->fetch($query) ){
                do{
                $count++;
                ?> 
                <tr class="gradeX">
                 
                
                  <td><?php echo $result['activity']; ?></td> 
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