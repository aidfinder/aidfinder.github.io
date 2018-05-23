<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Project Leads Tables</a> </div>
    <h1>Project Leads</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5>Project Leads</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Client</th>
                  <th>Designer</th>
                  <th>Building Category(s)</th>
                  <th>Project Title</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = $model->all_projectleads();  //FROM MODEL
                if( $result = $model->fetch($query) ){
                do{
                ?> 
                  <tr class="gradeX">
                    <td><?php echo $result['user_lname'].'&nbsp;,&nbsp;'.$result['user_fname'].'&nbsp;&nbsp;'.$result['user_mname']; ?></td>
                    <td><?php echo $result['b_lname'].'&nbsp;,&nbsp;'.$result['b_fname'].'&nbsp;&nbsp;'.$result['b_mname']; ?></td>
                    <td><?php echo $result['building_category']; ?></td>
                    <td><?php echo $result['project_title']; ?></td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-info">Action</button>
                        <button data-toggle="dropdown" class="btn btn-info dropdown-toggle"><span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="admin.php?page=projectDetails&id=<?php echo $result['clientproject_id']; ?>"><i class="icon-search"></i>View Details</a></li>
                          <!--li><a href="admin.php?page=postBid&id=<?php echo $result['clientproject_id']; ?>"><i class="icon-tag"></i>Bid</a></li-->
                        </ul>
                      </div>
                    </td>
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
</div>
