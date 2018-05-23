
<!--top-Header-messaages-->
<div class="btn-group rightzero">
  <a class="top_message tip-left" title="Manage Files"><i class="icon-file"></i></a>
  <a class="top_message tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
  <a class="top_message tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
  <a class="top_message tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
</div>
<!--close-top-Header-messaages--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class=""><a STYLE="color:white;font-size:10pt"title="" href="#"><span class="text" STYLE="color:white;font-size:10pt">W E L C O M E  !&nbsp;&nbsp;</span>&nbsp;&nbsp;<?php echo $_SESSION['contractorlogged']['contractor_lname'].'&nbsp;, '.$_SESSION['contractorlogged']['contractor_fname'].'&nbsp;'.$_SESSION['contractorlogged']['contractor_mname']; ?></a></li>
    <li class=" dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-cog"></i> <span class="text">My Account</span><b class="caret"></b></a>
      <ul style="background-color:#01a990" class="dropdown-menu">
        <li><a style="color:white"class="sAdd" title="" href="" data-toggle="modal" data-target="#update"><i class="icon icon-cog"></i>&nbsp;&nbsp;Account Setting</a></li>
        <li><a style="color:white"class="sInbox" title="" href="#"><i class="icon icon-list"></i>&nbsp;&nbsp;Activity Log</a></li>
        <li><a style="color:white"class="sOutbox" title="" href="?logout"><i class="icon icon-off"></i>&nbsp;&nbsp;Logout</a></li>
        
      </ul>

    </li>
    
    <li class=""><a title="" href="?logout"><i class="icon icon-off"></i> <span class="text">Logout</span></a></li>
  </ul>

</div>
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-left" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-Header-menu-->

<div style="background-color:#01a990;font-size:15pt" id="sidebar"><a href="admin.php?page=projectLeads" class="visible-phone"><i class="icon icon-home"></i>Navigation</a><ul>
    <li class="active"><a href="admin.php?page=projectLeads"><i class="icon icon-home"></i> <span>Bidding Notice</span>
      <?php 
                  $queryq = $model->count_client_posted_projects();  
                  if( $resultq = $model->fetch($queryq) ){ if($resultq['count(clientproject_id)']!=0){ ?>
                    <span class="label label-important"><?php echo $resultq['count(clientproject_id)']; ?></span>
              
              <?php }else{ ?>

              <?php } ?>
            <?php } ?>
        

    </a> </li>
    <li class="active"><a href="admin.php?page=dashboard"><i class="icon icon-align-center"></i> <span>Dashboard</span></a> </li>
     <li> <a href="admin.php?page=viewClientProject"><i class="icon icon-picture"></i> <span>Client Project</span></a> </li>
    <li> <a href="admin.php?page=chart"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a> </li>
   <li class="submenu"> <a href="#"><i class="icon icon-cog"></i> <span>Settings</span> <span class="label label-important">4</span></a>
      <ul>
        <li><a href="gallery.html">Activity Log</a></li>
        <li><a href="" data-toggle="modal" data-target="#update">Account Setting</a></li>
        <li><a href="?logout">Logout</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--UPDATING PROFILE-->
      <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <div style="background-color:#0e4852;border-color:#0e4852"class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img class="profile-img" src="img/close.png"></button>
      <h4 style="color:white"class="modal-title" id="myModalLabel"><i class="fa fa-edit fa-fw"></i>&nbsp;&nbsp;&nbsp;Account Setting</h4>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">
      
      <div class="panel-body">
      <!--form role="form" method="post"  >
      <br />
      
      <div class="form-group has-primary">
      <div class="form-group has-primary">
      <p style="font-size:11pt">Last Name <a>*</a></p>
      <input style="height:35px;font-size:10.5pt;border-radius:5px" value="<?php echo $_SESSION['contractorlogged']['contractor_lname']; ?>"name="contractor_lname" type="text" class="form-control" required />
      </div>
      <p style="font-size:11pt">First Name <a>*</a></p>
      <input style="height:35px;font-size:10.5pt;border-radius:5px" value="<?php echo $_SESSION['contractorlogged']['contractor_fname']; ?>"name="contractor_fname" type="text" class="form-control"/>
      </div>
      <div class="form-group has-primary">
      <p style="font-size:11pt">Middle Name <a>*</a></p>
      <input style="height:35px;font-size:10.5pt;border-radius:5px" value="<?php echo $_SESSION['contractorlogged']['contractor_mname']; ?>"name="contractor_mname" type="text" class="form-control"/>
      </div>
      <div class="form-group has-primary">
      <p style="font-size:11pt">Email Address <a>*</a></p>
      <input style="height:35px;font-size:10.5pt;border-radius:5px" value="<?php echo $_SESSION['contractorlogged']['contractor_email']; ?>"name="contractor_email" type="email" class="form-control"/>
      </div>
      <div class="form-group has-primary">
      <p style="font-size:11pt">Username <a>*</a></p>
      <input style="height:35px;font-size:10.5pt;border-radius:5px" value="<?php echo $_SESSION['contractorlogged']['contractor_username']; ?>"name="contractor_username" type="text" class="form-control"/>
      </div>
      <div class="form-group has-primary">
      <p style="font-size:11pt">Password <a>*</a></p>
      <input style="height:35px;font-size:10.5pt;border-radius:5px" value="<?php echo $_SESSION['contractorlogged']['contractor_password']; ?>"name="contractor_password" type="password"/>
      <input value="<?php echo $_SESSION['contractorlogged']['contractor_id']; ?>" name="contractor_id" type="hidden" />
     
      </div>
      <hr/>
      <button type="submit" name="updateProfile" class="btn btn-success">Update Profile</button>
      
      </form-->
      </div>
      </div>
     
      </div>

      </div>
      </div>
      </div>
      <!--UPDATING SETTING-->

