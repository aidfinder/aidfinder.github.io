<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<head>

<title>AID FINDER</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Treasurer Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<link rel="shortcut icon" href="images/logo4.png">
<?php include('inc/css.php');?>

</head>
<?php  
      include('inc/config.php'); 
      include('inc/model.php');
      include('inc/controller.php');
?>	
<body>
<!-- banner -->
<?php if(isset($_SESSION['userlogged'])){?>
<div class="agileits_top_menu">
   <div class="w3l_header_left">
		<ul>
			<li style="font-family:Century Gothic;color:#058672"><a style="font-family:Century Gothic;color:gray;font-size:11pt">
				Welcome !</a>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['userlogged']['user_title'].'&nbsp;&nbsp;'.$_SESSION['userlogged']['user_lname'].' ,&nbsp;'.$_SESSION['userlogged']['user_fname'].'&nbsp;&nbsp;'.$_SESSION['userlogged']['user_mname']; ?>
			</li>
			<li style="font-family:Century Gothic;color:#058672"><i class="fa fa-phone" aria-hidden="true"></i><?php echo $_SESSION['userlogged']['user_contact'];?></li>
			<li style="font-family:Century Gothic;color:#058672"><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo $_SESSION['userlogged']['user_email'];?></li>
			
		</ul>
	</div>
	<!--div class="w3l_header_right">
		<div class="w3ls-social-icons text-left">

			<a href="index.php?page=postPro"><i style="color:#058672"class="fa fa-globe">
				&nbsp;<?php 
	                $queryq = $model->count_notif();  
	                if( $resultq = $model->fetch($queryq) ){ if($resultq['count(b.bid_id)']!=0){ ?>
						<span class="badge badge-danger">
							<?php echo $resultq['count(b.bid_id)']; ?>
				        </span>
			        <?php }else{ ?>

			        <?php } ?>
		        <?php } ?></i>
			</a>
			
		</div>
	</div-->
	<div class="clearfix"> </div>
</div>
<?php } ?>
<?php if(!isset($_SESSION['userlogged'])){?>
<div class="agileits_top_menu login-social-grids">
	
	<a style="font-family:Century Gothic;float:right;"href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="color:#058672" class="fa fa-facebook"></i>&nbsp;&nbsp;&nbsp;<i style="color:#058672"class="fa fa-twitter"></i>&nbsp;&nbsp;&nbsp;<i style="color:#058672"class="fa fa-rss"></i></a>
	<a style="font-family:Century Gothic;float:right;font-size:12pt;color:#058672"class="active" href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-edit"></i> SIGN IN</a>
	<a style="font-family:Century Gothic;float:left;font-size:11pt;color:#058672"><?php date_default_timezone_set('asia/Manila')?><?php echo "Today is " . date("l");?>&nbsp;<?php echo "<span>&nbsp;</span>". date('F j, Y g:i:a'); ?></a>					
	<div class="clearfix"> </div>

</div>
<?php } ?>
   <div class="agileits_w3layouts_banner_nav">
			<nav class="navbar navbar-default">
				<?php include('inc/navbar.php');?>	
			</nav>	
			
	<div class="clearfix"> </div> 
</div> 
<?php include('inc/modal.php');?> 
					<!-- /agile_inner_banner_info -->													
<?php include('inc/viewHead.php');?>	
					<!-- //agile_inner_banner_info -->
<?php include('inc/view.php');?>	
<!-- subscribe -->
	<div class="w3layouts_bottom">
		<div class="container">
			<div class="col-md-9 w3layouts_getin_info">
				<h4>Do you want to post your advertisements here ? Just click</h4>
			</div>
			<div class="col-md-3 w3layouts_getin">
				<a href="#" data-toggle="modal"  data-target="#myModalRequestAd">Request</a>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //subscribe -->


<!-- footer -->
	<div class="footer">
		<div class="container">
			
			<?php if(!isset($_SESSION['userlogged'])){?>
			<div class="w3ls_address_mail_footer_grids">
				<div class="col-md-4 w3ls_footer_grid_left">
					<div class="wthree_footer_grid_left">
						<a href="ARCHITECT ADMIN"><i class="fa fa-user" aria-hidden="true"></i></a>
					</div>
					<p><h4>Architect Sign In</h4></p>
				</div>
				<div class="col-md-4 w3ls_footer_grid_left">
					<div class="wthree_footer_grid_left">
						<a href="SUPER ADMIN"><i class="fa fa-user" aria-hidden="true"></i></a>
					</div>
					<p><h4>Admin Sign In</h4></p>				
				</div>
				<div class="col-md-4 w3ls_footer_grid_left">
					<div class="wthree_footer_grid_left">
						<a href="CONTRACTOR"><i class="fa fa-user" aria-hidden="true"></i></a>
					</div>
					<p><h4>Contractor Sign In</h4></p>				
				</div>
				<div class="col-md-4 w3ls_footer_grid_left">
					<div class="wthree_footer_grid_left">
						<a href="INTERIOR ADMIN"><i class="fa fa-user" aria-hidden="true"></i></a>
					</div>
					<p><h4>Interior Sign In</h4></p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<?php }?>
			<div class="agileinfo_copyright">
				<p>© 2018 AID FINDER. All Rights Reserved |</a></p>
			</div>
		</div>
	</div>
<!-- //footer -->
<!-- menu -->
<!-- js -->
<?php include('inc/js.php');?>
</body>
</html>