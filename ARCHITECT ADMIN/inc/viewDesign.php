<div id="content-header">
    <div id="breadcrumb"> <a href="admin.php?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="" class="tip-bottom">View Design Ideas</a></div>
    <h1>Design Ideas</h1>
</div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Design Ideas</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  
                  <th>Action</th>
                  <th>Image</th> 
                  <th>Design Title</th> 
                 
                  <th>Specialization</th>
                  <th>Design Details</th>
                  <th>Design Cost</th>
                  <th>Date Posted</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $count=0;
                $query = $model->all_design_ideas();  //FROM MODEL
                if( $result = $model->fetch($query) ){
                do{
                $count++;
                ?> 
                <tr class="gradeX">
                  
                  <td>
                  <div class="btn-group">
                  <?php if($result['design_status']==1){ ?>
                      <button type="button"class="btn btn-success btn-xs"><i class="icon-legal"></i></button>
                      <button type="button"class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="admin.php?page=viewDesign&deactDesignIdeas=<?php echo $result['design_id']; ?>">Deactivate</a></li>
                         <li><a href="admin.php?page=editDesignIdeas&ide=<?php echo $result['design_id']; ?>">Edit</a></li>
                      </ul>
                  </div>
                  <div class="btn-group">
                  <?php }else{ ?>
                      <button type="button"class="btn btn-danger btn-xs"><i class="icon-legal"></i></button>
                      <button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="admin.php?page=viewDesign&actDesignIdeas=<?php echo $result['design_id']; ?>">Activate</a></li>
                        <li><a href="admin.php?page=editDesignIdeas&ide=<?php echo $result['design_id']; ?>">Edit</a></li>
                      </ul>
                   <?php } ?>
                   </div>
                  </td>
                  <td><img alt=" " class="img-responsive" style="width:200px;height:150px" src="design_img/<?php echo $result['design_id']; ?>.jpg" /></td>
                  
                  <td><?php echo $result['design_title']; ?></td>
                  <td><?php echo $result['specialization']; ?></td>
                  <td><?php echo $result['design_details']; ?></td>
                  <td>Php.&nbsp;&nbsp;<?php echo number_format($result['design_cost']); ?></td>
                  <td><?php echo $result['date_posted']; ?></td>
                </tr>
                <?php }while($result = $model->fetch($query)); }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>