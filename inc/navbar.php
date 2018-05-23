<div class="navbar-header navbar-left">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
<h1><a class="navbar-brand" href="index.php?page=home"><img style="width:35%;" src="images/logo10.png"></a></h1>

</div>
<ul class="agile_forms">

</ul>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">

	<nav>
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php?page=home" class="hvr-underline-from-center"><i class="fa fa-home"></i> Home</a></li>
			<?php if(!isset($_SESSION['userlogged'])){?>
			
			<?php } ?>
			<li><a href="index.php?page=homes" class="hvr-underline-from-center">About</a></li>
			<li class="dropdown">
				<a href="#" style="font-family:Century Gothic;" class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Architects<b class="fa fa-caret-down"></b></a>
				<ul style="font-family:Century Gothic;"class="dropdown-menu agile_short_dropdown">
					<li><a href="index.php?page=allArchitects"> Architects </a> </li>
					<li><a href="index.php?page=top_rated_builders&builder=Architect"> Top Rated</a> </li>
					<li><a href="index.php?page=architectAccomplishedProject"> Projects </a> </li>
					<li><a href="index.php?page=findArchitect"> Find</a> </li>
					<li><a href="index.php?page=architecture&accomplished"> Architecture</a> </li>
				</ul>
			</li>

			<li class="dropdown">
				<a href="#" style="font-family:Century Gothic;"class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Interior Designer<b class="fa fa-caret-down"></b></a>
				<ul style="font-family:Century Gothic;"class="dropdown-menu agile_short_dropdown">
					<li><a href="index.php?page=allInteriorDesigners"> Interior Designers </a> </li>
					<li><a href="index.php?page=top_rated_builders&builder=Interior Designer"> Top Rated</a> </li>
					<li><a href="index.php?page=findInterior"> Find</a> </li>
					<li><a href="index.php?page=interiorDesignPage&accomplished"> Interior Design</a> </li>
				</ul>
			</li>
			<?php if(isset($_SESSION['userlogged'])){?>
				<li class="dropdown">
					<a href="#" style="font-family:Century Gothic;"class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Projects<b class="fa fa-caret-down"></b></a>
					<ul style="font-family:Century Gothic;"class="dropdown-menu agile_short_dropdown">
						<li><a href="index.php?page=postProject">Post Your Project</a></li>
						<li><a href="">View Projects</a></li>
					</ul>
				</li>
			<?php } ?>
			<!--li><a href="blog.html" class="hvr-underline-from-center">Book of Ideas</a></li-->
			<?php if(!isset($_SESSION['userlogged'])){?>
			<li class="dropdown">
				<a href="#" style="font-family:Century Gothic;"class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Sign Up As<b class="fa fa-caret-down"></b></a>
				<ul style="font-family:Century Gothic;"class="dropdown-menu agile_short_dropdown">
					
					<li><a href="index.php?page=architect_signup"> Architect</a> </li>
					<li><a href="index.php?page=signup"> Client</a> </li>
					<li><a href="index.php?page=signup_contractor"> Contractor</a> </li>
					<li><a href="index.php?page=carp_signup"> Interior Designer</a> </li>
				</ul>
			</li>
			<?php } ?>
			<?php if(isset($_SESSION['userlogged'])){?>
				<li><a style="font-family:Century Gothic;"href="index.php?logout"><i style="color:red" class="fa fa-power-off"></i> Logout</a> </li>
			<?php } ?>
				
		</ul>

	</nav>

<br/><br/><br/>
</div>
