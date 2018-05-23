
<div class="services">
	<div class="container">
		<?php if(isset($_GET['roomtype'])){ ?>
		<div class="col-md-8 event-left w3-agile-event-left">
			<div class="event-left1 w3-agile-event-left1">
			<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
			<?php 
					$query = $model->all_styles();$descount2=0;  //FROM MODEL
			        if( $result = $model->fetch($query) ){
			        do{
			        	$querys = $model->roomTypePics($_GET['roomtype'],$result['style_id']);  //FROM MODEL
			        	if( $results = $model->fetch($querys) ){ ?> <h3><?php echo $result['style_name']; ?> STYLE BEDROOM</h3>
			        	<?php	do{ $descount2++;
				if($descount2==1){
				?>

					  <div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOnes">
						  <h4 class="panel-title asd">
							<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOnes" aria-expanded="true" aria-controls="collapseOnes">
							  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i><?php echo $results['room_desidea_title']; ?>
							</a>
						  </h4>
						</div>
						<div id="collapseOnes" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOnes">
						  <div class="panel-body panel_text">
						  		<img src="room_idea_pics/<?php echo $results['room_des_id']; ?>.jpg" style="width:100%;height:400px;" alt=" " class="img-responsive" />
						  		<br/>
						  		<div class="well">
							  		<label style="font-size:12pt;float:left;color:black;">Interior Designer : &nbsp;&nbsp;</label><label style="font-size:12pt;float:left;color:#02a68d;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $results['b_username']; ?></label>
							  		<br/>
								</div>
						  		<div class="well"><?php echo $results['room_desidea_details']; ?></div>
						  </div>
						</div>
					  </div>
					  <?php }else{ ?>
					  <div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwos<?php echo $results['room_des_id']; ?>">
						  <h4 class="panel-title asd">
							<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwos<?php echo $results['room_des_id']; ?>" aria-expanded="false" aria-controls="collapseTwo<?php echo $results['room_des_id']; ?>">
							  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i><?php echo $results['room_desidea_title']; ?>
							</a>
						  </h4>
						</div>
						<div id="collapseTwos<?php echo $results['room_des_id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwos<?php echo $results['room_des_id']; ?>">
						   <div class="panel-body panel_text">
						   	
						   	<img src="room_idea_pics/<?php echo $results['room_des_id']; ?>.jpg" alt=" "style="width:100%;height:400px;" class="img-responsive" />
							<br/>
							<div class="well">
						  		<label style="font-size:12pt;float:left;color:black;">Interior Designer : &nbsp;&nbsp;</label><label style="font-size:12pt;float:left;color:#02a68d;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $results['b_username']; ?></label>
						  		<br/>
							</div>
							<div class="well"><?php echo $results['room_desidea_details']; ?></div>
							
						  </div>
						</div>
					  </div>
					<?php }  
						}while($results = $model->fetch($querys)); }else{}
					}while($result = $model->fetch($query)); } 
				?>
			</div>
			</div>
		</div>
		<?php }else if(isset($_GET['accomplished'])){ ?>
		<div class="col-md-8 event-left w3-agile-event-left">
			<div class="event-left1 w3-agile-event-left1">
				<h3 style="font-family:Century Gothic;" >ACCOMPLISHED INTERIOR DESIGNS</h3>
				<?php
			        $count=0;
			        $query = $model->all_interiorAccomplished();  //FROM MODEL
			        if( $result = $model->fetch($query) ){
			        do{
			        $count++;
			        ?> 
					  <?php include('interiordesigns.php'); ?>
				  <?php 
				        }while($result = $model->fetch($query));
				        }else{ 
				   ?>
				   		<div class="well">
							Nothing to show.
						</div>
				   <?php } ?>
				</div>
				<div class="event-left1 w3-agile-event-left1">
				<h3 style="font-family:Century Gothic;" >INTERIOR DESIGN IDEAS</h3>
				<?php
			        $count=0;
			        $query = $model->all_interiorDesignIdeas();  //FROM MODEL
			        if( $result = $model->fetch($query) ){
			        do{
			        $count++;
			        ?> 
					  <?php include('thumbnailsIDAll.php'); ?>
				  <?php 
				        }while($result = $model->fetch($query));
				        }else{ 
				   ?>
				   		<div class="well">
							Nothing to show.
						</div>
				   <?php } ?>
				</div>
				<div class="event-left1 w3-agile-event-left1"><br/><br/>
					<center><h2 style="font-family:Century Gothic;" >INTERIOR DESIGN STYLES</h2></center>
					<div class="event-left1 w3-agile-event-left1">
					<div class="col-xs-6 event-left1-left agile-event-left1-left">
						<a href="single.html"><img src="images/7.jpg" alt=" " class="img-responsive" /></a>
						<div class="event-left1-left-pos agileits-w3layouts-event-left1-left-pos">
							<ul>
								<li><a href="#"><span class="fa fa-tags" aria-hidden="true"></span>5 Tags</a></li>
								<li><a href="#"><span class="fa fa-heart-o" aria-hidden="true"></span>200 Likes</a></li>
								<li><a href="#"><span class="fa fa-user" aria-hidden="true"></span> Leo Paul</a></li>
							</ul>
						</div>
					</div>
					<div class="col-xs-6 event-left1-right w3-agileits-event-left1-right">
						<h4>2nd / May 2017</h4>
						<h5><a href="single.html">consectetur adipiscing elit, sed do eiusmod</a></h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="event-left1 w3-agile-event-left1">
					<div class="col-xs-6 event-left1-right event-left1-right-dummy wthree-event-left1-right">
						<h4>5th / May 2017</h4>
						<h5><a href="single.html">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</a></h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
					</div>
					<div class="col-xs-6 event-left1-left agileinfo-event-left1-left">
						<a href="single.html"><img src="images/6.jpg" alt=" " class="img-responsive" /></a>
						<div class="event-left1-left-pos agileits-event-left1-left-pos">
							<ul>
								<li><a href="#"><span class="fa fa-tags" aria-hidden="true"></span>6 Tags</a></li>
								<li><a href="#"><span class="fa fa-heart-o" aria-hidden="true"></span>160 Likes</a></li>
								<li><a href="#"><span class="fa fa-user" aria-hidden="true"></span>Michael</a></li>
							</ul>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="event-left1 w3-agile-event-left1">
					<div class="col-xs-6 event-left1-left w3ls-event-left1-left">
						<a href="single.html"><img src="images/4.jpg" alt=" " class="img-responsive" /></a>
						<div class="event-left1-left-pos w3l-event-left1-left-pos">
							<ul>
								<li><a href="#"><span class="fa fa-tags" aria-hidden="true"></span>7 Tags</a></li>
								<li><a href="#"><span class="fa fa-heart-o" aria-hidden="true"></span>341 Likes</a></li>
								<li><a href="#"><span class="fa fa-user" aria-hidden="true"></span>Richard</a></li>
							</ul>
						</div>
					</div>
					<div class="col-xs-6 event-left1-right w3-event-left1-right">
						<h4>8th / May 2017</h4>
						<h5><a href="single.html">Neque porro quisquam est, qui dolorem ipsum quia dolor</a></h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="event-left1 w3-agile-event-left1">
					<div class="col-xs-6 event-left1-right event-left1-right-dummy w3layouts-event-left1-right">
						<h4>11th / May 2017</h4>
						<h5><a href="single.html">Quis autem vel eum iure ea voluptate velit esse quam</a></h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
					</div>
					<div class="col-xs-6 event-left1-left w3-agile-event-left1-left">
						<a href="single.html"><img src="images/5.jpg" alt=" " class="img-responsive" /></a>
						<div class="event-left1-left-pos agile-event-left1-left-pos">
							<ul>
								<li><a href="#"><span class="fa fa-tags" aria-hidden="true"></span>9 Tags</a></li>
								<li><a href="#"><span class="fa fa-heart-o" aria-hidden="true"></span>432 Likes</a></li>
								<li><a href="#"><span class="fa fa-user" aria-hidden="true"></span>Thomas</a></li>
							</ul>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				</div>
			</div>
		<?php }else if(isset($_GET['style'])){ ?>
			<div class="col-md-8 event-left w3-agile-event-left">
				<div class="event-left1 w3-agile-event-left1">
				<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
				<?php 
						$query = $model->all_designcategory();$descount2=0;  //FROM MODEL
				        if( $result = $model->fetch($query) ){
				        do{
				        	$querys = $model->byStylePics($_GET['style'],$result['id_descat_id']);  //FROM MODEL
				        	if( $results = $model->fetch($querys) ){ ?> <br/><br/> <h3><?php echo $result['descategory']; ?></h3>
				        	<?php	do{ $descount2++;
					if($descount2==1){
					?>

						  <div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOnes">
							  <h4 class="panel-title asd">
								<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOnes" aria-expanded="true" aria-controls="collapseOnes">
								  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i><?php echo $results['room_desidea_title']; ?>
								</a>
							  </h4>
							</div>
							<div id="collapseOnes" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOnes">
							  <div class="panel-body panel_text">
							  		<img src="room_idea_pics/<?php echo $results['room_des_id']; ?>.jpg" style="width:100%;height:400px;" alt=" " class="img-responsive" />
							  		<br/>
							  		<div class="well">
								  		<label style="font-size:12pt;float:left;color:black;">Interior Designer : &nbsp;&nbsp;</label><label style="font-size:12pt;float:left;color:#02a68d;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $results['b_username']; ?></label>
								  		<br/>
									</div>
							  		<div class="well"><?php echo $results['room_desidea_details']; ?></div>
							  </div>
							</div>
						  </div>
						  <?php }else{ ?>
						  <div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingTwos<?php echo $results['room_des_id']; ?>">
							  <h4 class="panel-title asd">
								<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwos<?php echo $results['room_des_id']; ?>" aria-expanded="false" aria-controls="collapseTwo<?php echo $results['room_des_id']; ?>">
								  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i><?php echo $results['room_desidea_title']; ?>
								</a>
							  </h4>
							</div>
							<div id="collapseTwos<?php echo $results['room_des_id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwos<?php echo $results['room_des_id']; ?>">
							   <div class="panel-body panel_text">
							   	
							   	<img src="room_idea_pics/<?php echo $results['room_des_id']; ?>.jpg" alt=" "style="width:100%;height:400px;" class="img-responsive" />
								<br/>
								<div class="well">
							  		<label style="font-size:12pt;float:left;color:black;">Interior Designer : &nbsp;&nbsp;</label><label style="font-size:12pt;float:left;color:#02a68d;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $results['b_username']; ?></label>
							  		<br/>
								</div>
								<div class="well"><?php echo $results['room_desidea_details']; ?></div>
								
							  </div>
							</div>
						  </div>
						<?php }  
							}while($results = $model->fetch($querys)); }else{}
						}while($result = $model->fetch($query)); } 
					?>
				</div>
				</div>
			</div>
		<?php } ?>
		<div class="col-md-4 event-right wthree-event-right">
			<div class="event-right1 agileinfo-event-right1">
				
				<div class="posts w3l-posts">
					<h3>Top 3 Interior Designers</h3>
					<div class="posts-grids w3-posts-grids">
						<?php     
			                $querys = $model->orderby_rating_avg2("Interior Designer"); 
			                  if( $results = $model->fetch($querys) ){
			                    do{ 
			              ?>
						<div class="posts-grid w3-posts-grid">
							<div class="posts-grid-left w3-posts-grid-left">
								<?php if(isset($_SESSION['userlogged'])){?>
									<a href="index.php?page=interior_page&arch_thumbnail=<?php echo $results['builder_id']; ?>"><img src="architect pictures/<?php echo $results['builder_id']; ?>.jpg" style="width:100%;height:100px;" alt=" " class="img-responsive" /></a>
								<?php }else{ ?>
									<a href="#" data-toggle="modal" data-target="#myModal2"><img src="architect pictures/<?php echo $results['builder_id']; ?>.jpg" style="width:100%;height:100px;" alt=" " class="img-responsive" /></a>
								<?php } ?>
							</div>
							<div class="posts-grid-right w3-posts-grid-right">
								<h4>
									<?php if(isset($_SESSION['userlogged'])){?>
										<a href="index.php?page=interior_page&arch_thumbnail=<?php echo $results['builder_id']; ?>"><?php echo $results['b_username']; ?></a>
									<?php }else{ ?>
										<a href="#" data-toggle="modal" data-target="#myModal2"><?php echo $results['b_username']; ?></a>
									<?php } ?>
								</h4>
								<ul class="wthree_blog_events_list">
									<li><i class="fa fa-calendar" aria-hidden="true"></i><label><?php echo $results['b_birthdate']; ?></label></li>
									<li><i class="fa fa-edit" aria-hidden="true"></i><label>(<?php echo $model->total_builderReviews($results['builder_id']);?>)Reviews</label></li>
								</ul>
							</div>
							<div class="clearfix"> </div>
						</div>
						<?php }while($results = $model->fetch($querys)); } ?>
					</div>
				</div>
				<div class="categories w3ls-categories">
					<h3>Get an Appointment</h3>
					<ul>


						<form method="post">

							<?php if(isset($_POST['ok'])){?>
								<div class="alert alert-success" role="alert">
									<strong>Success!</strong> <?php echo $_POST['ok']; ?>
								</div>
							<?php }else if(isset($_POST['error']['exist'])){ ?>
								<div class="alert alert-danger" role="alert">
									<strong>Failed!</strong> <?php echo $_POST['error']['exist']; ?>
								</div>
							<?php } ?>
							
						<li>
							<div>
			                  <p>
			                  <select class="form-control" name="interior">
			                  	<option>--Select Interior Designer--</option>
			                    <?php 
			                        $query = $model->__list_Interiors();  
			                        if( $result = $model->fetch($query) ){
			                          do{ ?>
			                              <option value="<?php echo $result['builder_id'];?>"><?php echo ucwords($result['b_username']);?></option>
			                              <?php 
			                              }while($result = $model->fetch($query));
			                          } 
			                          ?>
			                  </select>
			                  </p>
			                </div>
						</li>
						<li>
							<div>
							  <p class="control-label">When would you like him/her to visit? From *</p>
			                  <p>
			                  	<input type="date" name="from" class="form-control" required/>
			                  </p>
			                  <p class="control-label">To *</p>
			                  <p>
			                  	<input type="date" name="to" class="form-control" required/>
			                  </p>
			                </div>
						</li>
						
						<li>
							
							<p class="control-label">What room environment do you want to get decorated?</p>
							<?php $query = $model->all_designcategory();  //FROM MODEL
						    if( $result = $model->fetch($query) ){
						        do{ ?>
								<li><input type="checkbox" name="check_list[]" value="<?php echo $result['id_descat_id']; ?>"><label>&nbsp;<?php echo $result['descategory']; ?></label></li>
									<?php 
							        }while($result = $model->fetch($query));
						        } 
							?>
							
						</li>
						
						<li>
							<div>
								<p class="control-label">Do you want the same style on all rooms you have checked? If Yes, Choose a style below, if no, just leave it.</p>
			                  <p>
			                  <select class="form-control" name="style_id">
			                  	<option value="0">--Select Style--</option>
			                    <?php 
			                        $query = $model->all_styles();  
			                        if( $result = $model->fetch($query) ){
			                          do{ ?>
			                              <option value="<?php echo $result['style_id'];?>"><?php echo ucwords($result['style_name']);?></option>
			                              <?php 
			                              }while($result = $model->fetch($query));
			                          } 
			                          ?>
			                  </select>
			                  </p>
			                </div>
						</li>
						<li>
							<label>Address *</label>
			                <br/>
			                <input type="text" class="form-control" style="font-size:10pt;" name="address" id="address" required="">
			                <div id="us2" style="width: 100%; height: 300px;"></div>
			                <!--label>Latitude Coordinates *</label><br/-->
			                <input type="hidden" class="form-control" name="latitude" id="latitude" required="">
			                <!--label>Longitude Coordinates *</label><br/-->
			                <input type="hidden" class="form-control" name="longitude" id="longitude" required="">
			                <!--label>Scope of Location Coordinates (radius) *<br/-->
			                <input type="hidden" class="form-control" name="radius" id="us2-radius" required="">
						</li>
						<?php if(isset($_SESSION['userlogged'])){?>
							<input type="submit" name="submitTestingan" Value="Request"/>
						<?php }else{ ?>
							<a class="view resw3" href="#" data-toggle="modal" data-target="#myModal2">Request</a>
						<?php } ?>
						</form>


					</ul>
				</div>
				<div class="tags tags1 w3layouts-tags">
					<h3>Recent Tags</h3>
					<ul>
						<li><a href="single.html">Designs</a></li>
						<li><a href="single.html">Growth</a></li>
						<li><a href="single.html">Latest</a></li>
						<li><a href="single.html">Price</a></li>
						<li><a href="single.html">Tools</a></li>
						<li><a href="single.html">Agile</a></li>
						<li><a href="single.html">Category</a></li>
						<li><a href="single.html">Themes</a></li>
						<li><a href="single.html">Growth</a></li>
						<li><a href="single.html">Agile</a></li>
						<li><a href="single.html">Price</a></li>
						<li><a href="single.html">Tools</a></li>
						<li><a href="single.html">Business</a></li>
						<li><a href="single.html">Category</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
		
	</div>
</div>



<script type="text/javascript">
	$('#us2').locationpicker({
        location: {
            latitude: 6.943763,
            longitude: 126.246748
        },
        radius: 50,
        inputBinding: {
            latitudeInput: $('#latitude'),
            longitudeInput: $('#longitude'),
            radiusInput: $('#us2-radius'),
            locationNameInput: $('#address')
        },
        enableAutocomplete: true
    });
</script>