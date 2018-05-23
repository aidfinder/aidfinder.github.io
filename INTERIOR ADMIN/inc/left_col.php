<ul style="font-family:Century Gothic;">
    <li class="active"><a href="admin.php?page=dashboard"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <!--li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Service Request</span> <span class="label label-important">6</span></a>
      <ul>
        <li><a href="admin.php?page=allServReq">All Service Requests</a></li>
        <li><a href="admin.php?page=pendingServReq">Pending Service Requests</a></li>
        <li><a href="admin.php?page=approvedServReq">Approved Service Requests</a></li>
        <li><a href="admin.php?page=disapprovedServReq">Disapproved Service Requests</a></li>
        <li><a href="admin.php?page=cancelledServReq">Cancelled Service Requests</a></li>
        <li><a href="admin.php?page=cateredServReq">Catered Service Requests</a></li>
      </ul>
    </li-->
    <li class="submenu"> <a href=""><i class="icon icon-legal"></i> <span>Accomplished Design</span> <span class="label label-important">&nbsp;<?php echo $model->total_accomplishedDesign_count();?>&nbsp;</span></a>
      <ul>
        <li><a href="admin.php?page=addAccomProj"><i class="icon icon-plus-sign"></i>&nbsp;&nbsp;Add Accomplished Design</a></li>
        <li><a href="admin.php?page=viewAccomProj"><i class="icon icon-search"></i>&nbsp;&nbsp;View Accomplished Design</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href=""><i class="icon icon-camera"></i> <span>Design Ideas</span> <span class="label label-important">&nbsp;<?php echo $model->total_designIdeas_count();?>&nbsp;</span></a>
      <ul>
        <li><a href="admin.php?page=addDesign"><i class="icon icon-plus-sign"></i>&nbsp;&nbsp;Add Design</a></li>
        <li><a href="admin.php?page=viewDesign"><i class="icon icon-search"></i>&nbsp;&nbsp;View Designs</a></li>
      </ul>
    </li>
    <li><a href="admin.php?page=allServReq"><i class="icon icon-th-list"></i>  <span>Appointment</span><span class="label label-important">&nbsp;4&nbsp;</span></a></li>
    <li class="submenu"> <a href=""><i class="icon icon-home"></i> <span>Rooms</span> <span class="label label-important">&nbsp;<?php echo $model->total_roomTypes_count();?>&nbsp;</span></a>
      <ul>
        <li><a href="admin.php?page=addServiceRates"><i class="icon icon-plus-sign"></i>&nbsp;&nbsp;Add Room</a></li>
        <?php $query = $model->all_designcategory();  //FROM MODEL
              if( $result = $model->fetch($query) ){
                  do{ ?>
                  <li><a href="index.php?page=rooms&roomtype=<?php echo $result['id_descat_id']; ?>"><i class="icon icon-picture"></i>&nbsp;&nbsp;<?php echo $result['descategory']; ?></a> </li>
          <?php 
                  }while($result = $model->fetch($query));
                } 
          ?>

      </ul>
    </li>
    <li class="submenu"> <a href=""><i class="icon icon-camera"></i> <span>Style</span> <span class="label label-important">&nbsp;<?php echo $model->total_style_count();?>&nbsp;</span></a>
      <ul>
        <li><a href="admin.php?page=addMyService"><i class="icon icon-plus-sign"></i>&nbsp;&nbsp;Add Style</a></li>
        <?php $query = $model->all_style();  //FROM MODEL
              if( $result = $model->fetch($query) ){
                  do{ ?>
              <li><a href="admin.php?page=mystyles&style=<?php echo $result['style_id']; ?>"><i class="icon icon-film"></i>&nbsp;&nbsp;<?php echo $result['style_name']; ?></a></li>
        <?php 
                }while($result = $model->fetch($query));
              } 
        ?>
      </ul>
    </li>
    <li><a href="admin.php?page=viewClientProject"><i class="icon icon-search"></i> <span>View Client Project</span><span class="label label-important">&nbsp;<?php echo $model->total_clientProject_count();?>&nbsp;</span></a></li>
    <li><a href="admin.php?page=reviews"><i class="icon icon-envelope"></i> <span>Reviews</span><span class="label label-important">&nbsp;4&nbsp;</span></a></li>
    <li class="submenu"> <a href=""><i class="icon icon-cog"></i> <span>Settings</span> <span class="label label-important">&nbsp;4&nbsp;</span></a>
      <ul>
        <li><a href="admin.php?page=viewActivityLog "><i class="icon icon-cog"></i>&nbsp;&nbsp;Activity Log</a></li>
        <li><a href="admin.php?page=viewLogs"><i class="icon icon-hdd"></i>&nbsp;&nbsp;View Logged</a></li>
        
        <li><a href="" data-toggle="modal" data-target="#update"><i class="icon icon-user"></i>&nbsp;&nbsp;My Account</a></li>
        <li><a href="?logout"><i class="icon icon-share-alt"></i>&nbsp;&nbsp;Logout</a></li>
      </ul>
    </li>
    <!--li class="content"> <span>Monthly Bandwidth Transfer</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li>
    <li class="content"> <span>Disk Space Usage</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li-->
  </ul>


  