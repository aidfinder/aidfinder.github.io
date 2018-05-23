<div class="agile_inner_banner_info">
   
   	<?php if(isset($_GET['roomtype'])){ ?>
   	<h2>INTERIOR DESIGN</h2>
   	<p><b><?php $roomtype='';
   		$query = $model->getRoomType($_GET['roomtype']);  //FROM MODEL
		if( $result = $model->fetch($query) ){ $roomtype=$result['descategory'];} ?>
		<?php echo $roomtype; ?> INTERIOR DESIGN IDEAS
   	</b></p>
   	<?php }else if(isset($_GET['accomplished'])){ ?>
   		<h2>INTERIOR DESIGN</h2>
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
				<li class="active"><a href="index.php?page=interiorDesignPage&accomplished" class="hvr-underline-from-center">INTERIOR DESIGN HOME</a></li>
				<li class="dropdown active">
					<a href="#" style="font-family:Century Gothic;"class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Ideas By Room<b class="fa fa-caret-down"></b></a>
					<ul style="font-family:Century Gothic;"class="dropdown-menu agile_short_dropdown">
						<?php $query = $model->all_designcategory();  //FROM MODEL
						    if( $result = $model->fetch($query) ){
						        do{ ?>
								<li><a href="index.php?page=interiorDesignPage&roomtype=<?php echo $result['id_descat_id']; ?>"> <?php echo $result['descategory']; ?></a> </li>
						<?php 
						        }while($result = $model->fetch($query));
					        } 
						?>
					</ul>
				</li>
				<li class="dropdown active">
					<a href="#" style="font-family:Century Gothic;"class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Ideas By Style<b class="fa fa-caret-down"></b></a>
					<ul style="font-family:Century Gothic;"class="dropdown-menu agile_short_dropdown">
						<?php $query = $model->all_styles();  //FROM MODEL
						    if( $result = $model->fetch($query) ){
						        do{ ?>
								<li><a href="index.php?page=interiorDesignPage&style=<?php echo $result['style_id']; ?>"> <?php echo $result['style_name']; ?></a> </li>
						<?php 
						        }while($result = $model->fetch($query));
					        } 
						?>
					</ul>
				</li>
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