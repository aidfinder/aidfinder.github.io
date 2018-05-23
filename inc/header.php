<div id="decorative2" style="background-color:#299860;" >
    <div class="container" >

        <div class="divPanel topArea notop nobottom" >
            <div class="row-fluid">
                <div class="span12">

                    <div  id="divLogo" class="pull-left">
                        <a href="index.php?page=homes"id="divSiteTitle"><b>P A N D A Y</b>&nbsp;<i style="color:white;font-size:20pt" class="general foundicon-location icon"></i></a><br />
                        <a href="index.php?page=homes" id="divTagLine">
                            <?php if(!isset($_SESSION['userlogged'])){?>

                            <?php }else if(isset($_SESSION['userlogged'])){ ?>
                                <?php echo $_SESSION['userlogged']['user_lname'].' ,'.$_SESSION['userlogged']['user_fname'].'&nbsp;&nbsp;'.$_SESSION['userlogged']['user_mname']; ?>
                            <?php } ?>
                        </a>
                    </div>

                    <div id="divMenuRight" class="pull-right" >
                    <div class="navbar">
                        <button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
                            NAVIGATION <span class="icon-chevron-down icon-white"></span>
                        </button>
                        <div class="nav-collapse collapse">
                            <ul class="nav nav-pills ddmenu">
                                <?php if(!isset($_SESSION['userlogged'])){?>
                                <li class="dropdown "><a href="index.php"><i style="font-size:21pt" class="general foundicon-home icon"></i></a></li>
								<li class="dropdown"><a href="about.html">About Us</a></li>
                                <li class="dropdown">
                                    <a href="page.html" class="dropdown-toggle">Our Home Experts <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="full.html">Full Page</a></li>
                                    <li><a href="2-column.html">Two Column</a></li>
                                    <li><a href="3-column.html">Three Column</a></li>
        							<li><a href="../documentation/index.html">Documentation</a></li>
        							<li class="dropdown">
                                    <a href="#" class="dropdown-toggle">Dropdown Item &nbsp;&raquo;</a>
                                    <ul class="dropdown-menu sub-menu">
                                    <li><a href="#">Dropdown Item</a></li>
                                    <li><a href="#">Dropdown Item</a></li>
                                    <li><a href="#">Dropdown Item</a></li>
                                    </ul>
                                    </li>
                                    </ul>
                                </li>
                            <li class="dropdown"><a href="index.php?page=projectgallery">Project Gallery</a></li>
                            <li class="dropdown">
                                <a href="page.html" class="dropdown-toggle">Sign Up As<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="index.php?page=architect_signup">Architect</a></li>
                                    <li><a href="2-column.html">Carpenter</a></li>
                                    <li><a href="index.php?page=signup">Customer</a></li>
                                </ul>
                            </li>
                             <?php }?>
                                
                            <?php if(isset($_SESSION['userlogged'])){?>
                            <li class="dropdown "><a href="index.php?page=homes"><i style="font-size:21pt" class="general foundicon-home icon"></i></a></li>
                                <li class="dropdown"><a href="">About Us</a></li>
                                <li class="dropdown"><a href="index.php?page=listofCarpenter">Gallery</a></li>
                                <li class="dropdown"><a href="contact.php">Contact</a></li>   
                                <li class="dropdown">
                                <a href="" class="dropdown-toggle">Settings <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            <li><a href="full.html"><i class="general foundicon-settings icon"></i>&nbsp;&nbsp;Account Settings</a></li>
                            <li><a href=""><i class="general foundicon-lock icon"></i>&nbsp;&nbsp;Security</a></li>
                            <li><a href="full.html"><i class="general foundicon-page icon"></i>&nbsp;&nbsp;Activity Log</a></li>
                            <li><a href="?logout"><i class="general foundicon-video icon"></i>&nbsp;&nbsp;Logout</a></li>
                            </ul>
                            <?php }?>
                            </ul>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
