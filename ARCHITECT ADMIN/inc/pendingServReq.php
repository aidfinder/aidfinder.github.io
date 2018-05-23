<div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Pending</a> </div>
    <h1>Pending Service Requests</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <!-- request details>
    <?php if(isset($_GET['request'])){ ?>
    <div class="row-fluid">
      <div class="span12">
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
    </div>
    <?php } ?>
    < request details -->
    <div class="row-fluid">
      <!-- request details -->
      <?php if(isset($_GET['request'])){ ?>
          <div class="span3">
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
      <div <?php if(isset($_GET['request'])){ ?>class="span9"<?php }else{ ?>class="span12"<?php } ?>>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Pending table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Date Req.</th>
                  <th>Client Name</th>
                  <th>Contact Info.</th>
                  <th>Building Type</th>
                  <th>Specialization</th>
                  <th>Service(s)</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $queryt = $model->pending_request();
                      if( $resulta = $model->fetch($queryt) ){
                        do{
                ?>
                  <tr class="gradeX">
                    <td><?php echo $resulta['date_requested']; ?></td>
                      <?php 
                        $queryts = $model->user_parameter($resulta['user_id']);
                          if( $resultas = $model->fetch($queryts) ){
                      ?>
                    <td><?php echo $resultas['user_lname']; ?>, <?php echo $resultas['user_fname']; ?></td>
                    <td><?php echo $resultas['user_contact']; ?></td>
                    <?php } ?> 
                    <?php 
                      $queryts = $model->category_parameter($resulta['subcat_id']);
                        if( $resultas = $model->fetch($queryts) ){
                    ?>
                    <td><?php echo $resultas['building_category']; ?></td>
                    <?php } ?> 
                    <?php 
                      $queryts = $model->specialization_parameter($resulta['specialization_id']);
                        if( $resultas = $model->fetch($queryts) ){
                    ?>
                    <td><?php echo $resultas['specialization']; ?></td>
                    <?php } ?> 
                    <td>
                      <?php 
                        $queryts = $model->services_parameter($resulta['user_id']);
                          if( $resultas = $model->fetch($queryts) ){
                            do{
                      ?>
                        <p class="badge badge-info">*
                          <?php echo $resultas['service_type']; ?>
                        </p>
                      <?php }while(($resultas = mysql_fetch_assoc($queryts))); }?> 
                    </td>
                    <td>
                      <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="admin.php?page=pendingServReq&approveReq_userID=<?php echo $resulta['user_id']; ?>&approveReq_dateReq=<?php echo $resulta['date_requested']; ?>">Approve</a></li>
                          <li><a href="admin.php?page=pendingServReq&disapproveReq_userID=<?php echo $resulta['user_id']; ?>&disapproveReq_dateReq=<?php echo $resulta['date_requested']; ?>">Disapprove</a></li>
                          <li><a href="admin.php?page=pendingServReq&request=<?php echo $resulta['request_id']; ?>">View More Details</a></li>
                        </ul>
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

