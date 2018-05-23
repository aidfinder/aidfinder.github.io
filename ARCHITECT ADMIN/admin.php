<!DOCTYPE html>
<html lang="en">
<head>
<title>Architect Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <link rel="shortcut icon" href="img/ER-Studio_icon.png">
<?php include('inc/css.php'); ?>
</head>
<?php  
      include('inc/config.php'); 
      include('inc/model.php');
      include('inc/controller.php');
?>  
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="admin.php?page=dashboard">Builder Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <?php include('inc/top_nav.php'); ?>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <?php include('inc/left_col.php'); ?>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
  <?php include('inc/view.php'); ?>
  
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div style="font-size:11pt;font-family: Century Gothic"id="footer" class="span12"> 2018 &copy; Architect Admin ( AID FINDER )</a> </div>
</div>

<!--end-Footer-part-->
<?php include('inc/js.php'); ?>
</body>
</html>
