<!-- Modal1 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
	<div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><img src="css/close.png"/></button>
				
				<div class="signin-form profile">
				<h3 class="agileinfo_sign">Sign In</h3>	
						<div class="login-form">
							<form method="post">
								<input type="text" name="user_username" placeholder="Username" required="">
								<input type="password" name="user_password" name="password" placeholder="Password" required="">
								<div class="tp">
									<input type="submit" name="login" value="Sign In">
								</div>
							</form>
						</div>
						<div class="login-social-grids">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
							</ul>
						</div>
						<p><a href="#" data-toggle="modal" data-target="#myModal3" > Don't have an account?</a></p>
					</div>
			</div>
		</div>
	</div>
</div>
<!-- //Modal1 -->	
<!-- Modal2 -->
<?php 
	$query = $model->__builder_services();  
    if( $result = $model->fetch($query) ){
     do{
?>
	<div class="modal fade" id="myModals<?php echo $result['service_id']; ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog">
		
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
					<div class="signin-form profile">
					<h3 class="agileinfo_sign"><?php echo $result['service_type']; ?></h3>	
							<div class="login-form" style="text-align: justify;text-justify: inter-word;">
								<p><?php echo $result['service_details']; ?></p>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
<?php 
    	}while($result = $model->fetch($query));
	} 
?>
<?php 
	$query = $model->all_styles();  
    if( $result = $model->fetch($query) ){
     do{
?>
	<div class="modal fade" id="myModalStyle<?php echo $result['style_id']; ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog">
		
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
					<div class="signin-form profile">
					<h3 class="agileinfo_sign"><?php echo $result['style_name']; ?></h3>	
							<div class="login-form" style="text-align: justify;text-justify: inter-word;">
								<p><img src="style pics/<?php echo $result['style_id']; ?>.jpg" /></p>
								<p><?php echo $result['style_details']; ?></p>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
<?php 
    	}while($result = $model->fetch($query));
	} 
?>
<?php 
	$query = $model->all_accomplished();  
    if( $result = $model->fetch($query) ){
     	do{
?>
	<div class="modal fade" id="myModalz<?php echo $result['accomp_id']; ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog">
		
			<div style="border-radius:15px" class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><img src="css/close.png"/></button>
					
					<div class="signin-form profile">
						<h3 class="agileinfo_sign" style="color:#02a68d;"><?php echo $result['accproj_title']; ?></h3>	
						<label style="font-size:12pt;float:left;color:black;">Date Finished : &nbsp;&nbsp;</label><label style="font-size:12pt;float:left;color:#02a68d;"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $result['accproj_date_finished']; ?></label>	<br/>
						<label style="font-size:12pt;float:left;color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Architect :&nbsp;</label><label style="font-size:12pt;float:left;color:#02a68d;"><img style="width:40px;height:30px"src="images/archi.jpg"/>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $result['b_fname']; ?> <?php echo $result['b_lname']; ?></label>	<br/>
						<div class="login-form" style="text-align: justify;text-justify: inter-word;">
							<p><?php echo $result['accproj_details']; ?></p>
							<p></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
    	}while($result = $model->fetch($query));
	} 
?>

<?php 
	$query = $model->__list_Architect();  
    if( $result = $model->fetch($query) ){
     	do{
?>
	<div class="modal fade" id="myModalArch<?php echo $result['builder_id']; ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div style="border-radius:15px" class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><img src="css/close.png"/></button>
					<div class="signin-form profile">
						<h3 class="agileinfo_sign" style="color:#02a68d;"><?php echo $result['b_username']; ?></h3>	
						<!--label style="font-size:12pt;float:left;color:black;">Date Finished : &nbsp;&nbsp;</label><label style="font-size:12pt;float:left;color:#02a68d;"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;<?php echo $result['accproj_date_finished']; ?></label>	<br/>
						<label style="font-size:12pt;float:left;color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Architect :&nbsp;</label><label style="font-size:12pt;float:left;color:#02a68d;"><img style="width:40px;height:30px"src="images/archi.jpg"/>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $result['b_fname']; ?> <?php echo $result['b_lname']; ?></label>	<br/>
						<div class="login-form" style="text-align: justify;text-justify: inter-word;">
							<p><?php echo $result['accproj_details']; ?></p>
							<p></p>
						</div-->
						<div class="well">
			              <i class="fa fa-user"> </i>&nbsp;&nbsp;<i> Expertise : </i>
			              <?php  
			              	$querying = $model->getExpertise($result['expertise_id']);  
									    if( $resulting = $model->fetch($querying) ){
			              	echo $resulting['expertise']; }
			              ?><br/><br/>
			              <i class="fa fa-home"> </i>&nbsp;&nbsp;<i> Accomplished Project : </i>
			                <?php 
			                  $queryq = $model->count_architect_accomplished($result['builder_id']);  
			                    if( $resultq = $model->fetch($queryq) ){ 
			                      echo $resultq['count(accomp_id)'];
			                    }
			                ?>
			              <br/><br/>
			              <i class="fa fa-eye"> </i>&nbsp;&nbsp;<i> Design Ideas : </i>
			              <?php 
			                $queryq = $model->count_architect_design($result['builder_id']);  
			                if( $resultq = $model->fetch($queryq) ){ 
			                  echo $resultq['count(design_id)'];
			                } 
			              ?>
			              <br/><br/>
			              
			                <a class="view resw3" href="index.php?page=archi_page&arch_thumbnail=<?php echo $result['builder_id']; ?>" >Read More</a>
			       			
			            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
    	}while($result = $model->fetch($query));
	} 
?>

<?php 
	$query = $model->__list_Interiors();  
    if( $result = $model->fetch($query) ){
     	do{
?>
	<div class="modal fade" id="myModalInterior<?php echo $result['builder_id']; ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div style="border-radius:15px" class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><img src="css/close.png"/></button>
					<div class="signin-form profile">
						<h3 class="agileinfo_sign" style="color:#02a68d;"><?php echo $result['b_username']; ?></h3>	
						<!--label style="font-size:12pt;float:left;color:black;">Date Finished : &nbsp;&nbsp;</label><label style="font-size:12pt;float:left;color:#02a68d;"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;<?php echo $result['accproj_date_finished']; ?></label>	<br/>
						<label style="font-size:12pt;float:left;color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Architect :&nbsp;</label><label style="font-size:12pt;float:left;color:#02a68d;"><img style="width:40px;height:30px"src="images/archi.jpg"/>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $result['b_fname']; ?> <?php echo $result['b_lname']; ?></label>	<br/>
						<div class="login-form" style="text-align: justify;text-justify: inter-word;">
							<p><?php echo $result['accproj_details']; ?></p>
							<p></p>
						</div-->
						<div class="well">
			              <i class="fa fa-user"> </i>&nbsp;&nbsp;<i> Expertise : </i>
			              <?php 
			              	$querying = $model->getExpertise($result['expertise_id']);  
									    if( $resulting = $model->fetch($querying) ){
			              	echo $resulting['expertise']; }
			              ?><br/><br/>
			              <i class="fa fa-home"> </i>&nbsp;&nbsp;<i> Accomplished Project : </i>
			                <?php 
			                  $queryq = $model->count_architect_accomplished($result['builder_id']);  
			                    if( $resultq = $model->fetch($queryq) ){ 
			                      echo $resultq['count(accomp_id)'];
			                    }
			                ?>
			              <br/><br/>
			              <i class="fa fa-eye"> </i>&nbsp;&nbsp;<i> Design Ideas : </i>
			              <?php 
			                $queryq = $model->count_architect_design($result['builder_id']);  
			                if( $resultq = $model->fetch($queryq) ){ 
			                  echo $resultq['count(design_id)'];
			                } 
			              ?>
			              <br/><br/>
			              
			                <a class="view resw3" href="index.php?page=interior_page&arch_thumbnail=<?php echo $result['builder_id']; ?>" >Read More</a>
			       			
			            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
    	}while($result = $model->fetch($query));
	} 
?>
<div class="modal fade" id="myModalRequestAd" tabindex="-1" role="dialog">
	<div class="modal-dialog">
	
		<div style="border-radius:15px" class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><img src="css/close.png"/></button>
				
					<div class="signin-form profile">
						<h3 class="agileinfo_sign" style="color:#02a68d;">Submit Your Email</h3>	
						<div class="login-form" style="text-align: justify;text-justify: inter-word;">
							<p>
								<input type="text" id="emailad">
							</p>
							<p>
								<button id="submitAdRequest" class="label label-success" style="height:35px;width:200px;font-size:12pt;">Submit</button>
							</p>
						</div>
						<div style="display: none" class="alert alert-dismissible fade in" role="alert">
							<span class="message">
							</span>
						</div>
					</div>
				
					
			</div>
		</div>
	</div>
</div>


<?php 
	$query = $model->all_advertisements();  
    if( $result = $model->fetch($query) ){
     	do{
?>
	<div class="modal fade" id="myModalAds<?php echo $result['advertisement_id']; ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog">
		
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
					<div class="signin-form profile">
						<h3 class="agileinfo_sign"><?php echo $result['advertisement_title']; ?></h3>	
						<div class="login-form" style="text-align: justify;text-justify: inter-word;">
							
							<p><img src="SUPER ADMIN/advertisement_img/<?php echo $result['advertisement_id']; ?>.jpg" /></p>
							<p><?php echo $result['advertisement_details']; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
    	}while($result = $model->fetch($query));
	} 
?>