<div id="content-header">
    <div id="breadcrumb"> <a href="admin.php?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Accomplished Project</a> </div>
    <h1>Accomplished Project</h1>
</div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Accomplished Design</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  
                  <th>Action</th>
                  <th>Image</th> 
                  <th>Design Title</th> 
                  <th>Room Type</th>
                  <th>Style</th>
                  <th>Project Amount</th>
                  <th>Service Paid<th>
                </tr>
              </thead>

              <tbody>
                <?php
                $count=0;
                $query = $model->interior_accomplished();  //FROM MODEL
                if( $result = $model->fetch($query) ){
                do{
                $count++;
                ?> 
                <tr class="gradeX">
                  
                  <td>
                  <div class="btn-group">
                  <?php if($result['accproj_status']==1){ ?>
                      <button type="button"class="btn btn-success btn-xs"><i class="icon-legal"></i></button>
                      <button type="button"class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="admin.php?page=viewAccomProj&deactAccomplished=<?php echo $result['ID_accomp_id']; ?>">Deactivate</a></li>
                        <li><a href="admin.php?page=editAccomplished&ide=<?php echo $result['ID_accomp_id']; ?>">Edit</a></li>
                      </ul>
                  </div>
                  <div class="btn-group">
                  <?php }else{ ?>
                      <button type="button"class="btn btn-danger btn-xs"><i class="icon-legal"></i></button>
                      <button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="admin.php?page=viewAccomProj&actAccomplished=<?php echo $result['ID_accomp_id']; ?>">Activate</a></li>
                        <li><a href="admin.php?page=editAccomplished&ide=<?php echo $result['ID_accomp_id']; ?>">Edit</a></li>
                      </ul>
                   <?php } ?>
                   </div>
                  </td>
                  <td><img alt=" " class="img-responsive" style="width:200px;height:150px" src="interior_accomplished_img/<?php echo $result['ID_accomp_id']; ?>.jpg" /></td>
                  <td><?php echo $result['accproj_title']; ?></td> 
                  <td><?php echo $model->roomtypereturn($result['id_descat_id']);?></td> 
                  <!--td><?php echo $result['b_lname'].', '.$result['b_fname'].'&nbsp;&nbsp;'.$result['b_mname']; ?></td-->
                  <td><?php echo $model->style_name($result['style_id']);?></td>
                  <td><?php echo $result['accproj_duration']; ?></td>
                  <td>Php.&nbsp;&nbsp;<?php echo number_format($result['accproj_amount']); ?></td>
                  <td>Php.&nbsp;&nbsp;<?php echo number_format($result['accproj_service_paid']); ?></td>
                </tr>
                <?php }while($result = $model->fetch($query)); }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>