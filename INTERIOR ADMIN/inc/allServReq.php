<div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">All</a> </div>
    <h1>All Appointment Request(s)</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Client Name</th>
                  <th>Date Request Range</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $queryt = $model->all_my_appointments();
                      if( $resulta = $model->fetch($queryt) ){
                        do{
                ?>
                <tr class="gradeX">
                  <td>
                    <?php $query = $model->getClientName($resulta['user_id']);
                    if( $result = $model->fetch($query) ){ echo $result['user_lname'].', '.$result['user_fname']; } ?>
                  </td>
                  <td>
                    <?php
                      $date=date_create($resulta['expect_from']);
                      echo $resulta['monthname(expect_from)'].' '.date_format($date,"d").', '.date_format($date,"Y");
                    ?>
                    to
                    <?php
                      $dates=date_create($resulta['expect_to']);
                      echo $resulta['monthname(expect_to)'].' '.date_format($dates,"d").', '.date_format($dates,"Y"); 
                    ?>
                  </td>
                  <td><?php echo $resulta['appointment_address']; ?></td>
                  <td>
                    <div class="btn-group">
                    <?php if($resulta['appointment_status']==3){ ?>
                    <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Pending <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="admin.php?page=allServReq&allApproveReq_userID=<?php echo $resulta['user_id']; ?>">Approve</a></li>
                      <li><a href="admin.php?page=allServReq&allDisapproveReq_userID=<?php echo $resulta['user_id']; ?>">Disapprove</a></li>
                      <li><a href="admin.php?page=allServReq&request=<?php echo $resulta['appointment_id']; ?>">View More Details</a></li>
                    </ul>
                    <?php }else if($resulta['appointment_status']==1){ ?> 
                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Approved <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="admin.php?page=allServReq&cateredReq_userID=<?php echo $resulta['user_id']; ?>&caterReq_dateReq=<?php echo $resulta['date_requested']; ?>">Mark as Catered</a></li>
                      <li><a href="admin.php?page=allServReq&request=<?php echo $resulta['request_id']; ?>">View More Details</a></li>
                    </ul>
                    <?php }else if($resulta['appointment_status']==2){ ?> 
                    <button class="btn btn-danger dropdown-toggle">Disapproved <span class="caret"></span></button>
                    <?php }else if($resulta['appointment_status']==0){ ?> 
                    <button class="btn btn-inverse dropdown-toggle">Cancelled <span class="caret"></span></button>
                    <?php }else if($resulta['appointment_status']==4){ ?> 
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