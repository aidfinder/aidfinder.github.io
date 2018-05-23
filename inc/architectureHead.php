<div class="agile_inner_banner_info">
   
   	<?php if(isset($_GET['roomtype'])){ ?>
   	<h2>INTERIOR DESIGN</h2>
   	<p><b><?php $roomtype='';
   		$query = $model->getRoomType($_GET['roomtype']);  //FROM MODEL
		if( $result = $model->fetch($query) ){ $roomtype=$result['descategory'];} ?>
		<?php echo $roomtype; ?> INTERIOR DESIGN IDEAS
   	</b></p>
   	<?php }else if(isset($_GET['accomplished'])){ ?>
   		<h2>ARCHITECTURAL IDEAS AND PROJECTS</h2>
   	<?php }else if(isset($_GET['style'])){ ?>
   		<h2><?php $style='';
   		$query = $model->getStyle($_GET['style']);  //FROM MODEL
		if( $result = $model->fetch($query) ){ $style=$result['style_name']; echo $style;} ?> STYLE</h2>
   	<?php } ?>
   
   <!--p>Add Some Short Description</p-->
</div>
<div class="agileits_w3layouts_banner_nav">
	<nav class="navbar navbar-default">
		<div class="navbar-header navbar-left">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<nav>
			<ul class="nav navbar-nav" style="background-color:solid black;">
				<li class="active"><a href="index.php?page=architecture&accomplished" class="hvr-underline-from-center">ARCHITECTURE HOME</a></li>
				<li class="active"><a href="index.php?page=architecture&myprojects" class="hvr-underline-from-center">MY PROJECTS</a></li>
				<?php if(isset($_SESSION['userlogged'])){ ?>
				<li class="dropdown"><input type="hidden" id="the_user_id" value="<?php echo $_SESSION['userlogged']['user_id']; ?>"/>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="filtered_notifications()">
						<span class="label label-pill label-danger count" id="notification-count"><?php if($countsing>0) { echo $countsing; } ?></span>
						Notification
						<ul class="dropdown-menu" id="notification-latest">
						</ul>
					</a>
				</li>
				<?php } ?>
			</ul>
		</nav>

</div>
<ul class="agile_forms">

</ul>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
	
<br/><br/><br/>
</div>
	
			</nav>	
			
	<div class="clearfix"> </div> 
</div> 