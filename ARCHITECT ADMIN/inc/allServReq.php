<div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">All</a> </div>
    <h1>All Appointment Request(s)</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <!-- request details -->
      <?php if(isset($_GET['request'])){ ?>
          <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Request Details</h5>
          </div>
          <?php 
            $queryts = $model->request_details($_GET['request']);
              if( $resultas = $model->fetch($queryts) ){
          ?>
          <div class="widget-content">
            <?php 
              $queryt = $model->user_parameter($resultas['user_id']);
                if( $resulta = $model->fetch($queryt) ){
            ?>
                <p><h5>Client Address *</h5></p>
                <div class="well well-lg"><?php echo $resulta['user_address']; ?></div>
                <p><h5>Client Email Address *</h5></p>
                <div class="well well-lg"><?php echo $resulta['user_email']; ?></div>
                <p><h5>Request Details *</h5></p>
                <div class="well well-lg"><?php echo $resultas['req_details']; ?></div>
            <?php } ?> 
          </div>
          <?php } ?> 
        </div>
      </div>
      <?php } ?>
      <!-- request details -->
      <div <?php if(isset($_GET['request'])){ ?>class="span6"<?php }else{ ?>class="span12"<?php } ?>>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>All Request(s)</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <?php if(!isset($_GET['request'])){ ?>
                    <th>Date Req.</th>
                    <th>Date Approved</th>
                  <?php } ?>
                  <th>Client Name</th>
                  <th>Contact Info.</th>
                  <?php if(!isset($_GET['request'])){ ?>
                    <th>Building Type</th>
                    
                  <?php } ?>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $queryt = $model->all_request();
                      if( $resulta = $model->fetch($queryt) ){
                        do{
                ?>
                  <tr class="gradeX">
                    <?php if(!isset($_GET['request'])){ ?>
                      <td><?php echo $resulta['date_requested']; ?></td>
                      <td><?php echo $resulta['date_approved']; ?></td>
                    <?php } ?>
                      <?php 
                        $queryts = $model->user_parameter($resulta['user_id']);
                          if( $resultas = $model->fetch($queryts) ){
                      ?>
                    <td><?php echo $resultas['user_lname']; ?>, <?php echo $resultas['user_fname']; ?></td>
                    <td><?php echo $resultas['user_contact']; ?></td>
                    <?php } ?> 
                    <?php if(!isset($_GET['request'])){ ?>
                      <?php 
                        $queryts = $model->category_parameter($resulta['subcat_id']);
                          if( $resultas = $model->fetch($queryts) ){
                      ?>
                      <td><?php echo $resultas['building_category']; ?></td>
                      <?php } ?> 
                      
                    <?php } ?>
                    <td>
                      <div class="btn-group">
                        <?php if($resulta['req_status']==0){ ?>
                        <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Pending <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="admin.php?page=allServReq&approveReq_userID=<?php echo $resulta['user_id']; ?>&approveReq_dateReq=<?php echo $resulta['date_requested']; ?>">Approve</a></li>
                          <li><a href="admin.php?page=allServReq&allDisapproveReq_userID=<?php echo $resulta['user_id']; ?>&disapproveReq_dateReq=<?php echo $resulta['date_requested']; ?>">Disapprove</a></li>
                          <li><a href="admin.php?page=allServReq&request=<?php echo $resulta['request_id']; ?>">View More Details</a></li>
                        </ul>
                        <?php }else if($resulta['req_status']==1){ ?> 
                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Approved <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="admin.php?page=allServReq&cateredReq_userID=<?php echo $resulta['user_id']; ?>&caterReq_dateReq=<?php echo $resulta['date_requested']; ?>">Mark as Catered</a></li>
                          <li><a href="admin.php?page=allServReq&request=<?php echo $resulta['request_id']; ?>">View More Details</a></li>
                        </ul>
                        <?php }else if($resulta['req_status']==2){ ?> 
                        <button class="btn btn-danger dropdown-toggle">Disapproved <span class="caret"></span></button>
                        <?php }else if($resulta['req_status']==3){ ?> 
                        <button class="btn btn-inverse dropdown-toggle">Cancelled <span class="caret"></span></button>
                        <?php }else if($resulta['req_status']==4){ ?> 
                        <button class="btn btn-success dropdown-toggle">Catered <span class="caret"></span></button>
                        <?php } ?> 
                      </div>
                    </td>
                  </tr>
                <?php }while(($resulta = mysql_fetch_assoc($queryt))); }?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>