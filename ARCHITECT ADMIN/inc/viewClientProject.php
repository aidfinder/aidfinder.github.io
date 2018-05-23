<div id="content-header">
    <div id="breadcrumb"> <a href="admin.php?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Client Project</a> </div>
    <h1>Client Project</h1>
</div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Client Project</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Action</th>
                  <th>Image</th> 
                  <th>Project Title</th> 
                  <th>Bid Deadline</th>
                  <th>Project Date Posted</th>
                  <th>Project Estimated Cost<th>
                </tr>
              </thead>

              <tbody>
                <?php
                $count=0;
                $query = $model->all_clientproject();  //FROM MODEL
                if( $result = $model->fetch($query) ){
                do{
                $count++;
                ?> 
                <tr class="gradeX">
                  
                  <td>
                  <div class="btn-group">
                  <?php if($result['project_status']==1){ ?>
                      <button type="button"class="btn btn-success btn-xs"><i class="icon-legal"></i></button>
                      <button type="button"class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="admin.php?page=viewClientProject&deactClientProject=<?php echo $result['clientproject_id']; ?>">Deactivate</a></li>
                        
                      </ul>
                  </div>
                  <div class="btn-group">
                  <?php }else{ ?>
                      <button type="button"class="btn btn-danger btn-xs"><i class="icon-legal"></i></button>
                      <button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="admin.php?page=viewClientProject&actClientProject=<?php echo $result['clientproject_id']; ?>">Activate</a></li>
                        
                      </ul>
                   <?php } ?>
                   </div>
                  </td>
                  <td><img alt=" " class="img-responsive" style="width:250px;height:200px" src="clientproject_img/<?php echo $result['clientproject_id']; ?>.jpg" /></td>
                  <td><?php echo $result['project_title']; ?></td> 
                  <td><?php echo $result['bid_deadline']; ?></td>
                  <td><?php echo $result['project_date_posted']; ?></td>
                  <td>Php.&nbsp;&nbsp;<?php echo $result['project_estimated_cost']; ?></td>
                  
                </tr>
                <?php }while($result = $model->fetch($query)); }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
