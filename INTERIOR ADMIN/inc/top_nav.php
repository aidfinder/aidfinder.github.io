<ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><span style="font-size:11pt;font-family:Century Gothic;"class="text">Welcome  !</span>&nbsp;&nbsp;&nbsp;<span style="font-size:11pt;font-family:Century Gothic;"class="text"><?php echo $_SESSION['interiorlogged']['b_lname'].'&nbsp;, '.$_SESSION['interiorlogged']['b_fname'].'&nbsp;'.$_SESSION['interiorlogged']['b_mname']; ?></span>&nbsp;&nbsp;<b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="" data-toggle="modal" data-target="#update" ><i class="icon-user"></i> My Account</a></li>
        <li class="divider"></li>
        <li><a href="admin.php?page=viewActivityLog "><i class="icon-check"></i> Activity Log</a></li>
        <li class="divider"></li>
        <li><a href="admin.php?logout"><i class="icon-key"></i> Log Out</a></li>
      </ul>

    </li>

    <!--li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li-->
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="admin.php?logout"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    
  </ul>



  