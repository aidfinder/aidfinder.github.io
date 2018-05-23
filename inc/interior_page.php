
	<div class="services">
		<div class="container" >
			<h3 class="tittle_agile_w3">About this Interior Designer</h3>
			<div class="heading-underline">
				<div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
			</div>
			<div class="col-md-8 single-left">
				<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
				  <h3 style="font-family:Century Gothic;" >DESIGN SAMPLES</h3>
				  <br/>
				  <?php
			        $count=0;
			        $query = $model->ID_design($_GET['arch_thumbnail']);  //FROM MODEL
			        if( $result = $model->fetch($query) ){
			        do{
			        $count++;
			        ?> 
					  <?php include('thumbnailsID1.php'); ?>
				  <?php 
				        }while($result = $model->fetch($query));
				        }else{ 
				   ?>
				   		<div class="well">
							Nothing to show.
						</div>
				   <?php } ?>
				</div><br/><br/>
				
				<!-- I deleted something here-->
				
	            <div class="comments">
					<h3>Recent Reviews</h3>
					<div class="comments-grids">
					<?php 
			            $queryt = $model->overall_builder_reviews($_GET['arch_thumbnail']);
			              if( $resulta = $model->fetch($queryt) ){
			                do{ 
			       		 ?>
					<div class="comments-grid">
							<div class="comments-grid-left">
								<img src="images/1.png" alt=" " class="img-responsive" />
							</div>
							<div class="comments-grid-right">
								<h4><?php echo $resulta['user_username']; ?></h4>
								<ul>
									<li><?php
											$date=date_create($resulta['date_posted']);
											echo date_format($date,"d").' '.$resulta['MONTHNAME(r.date_posted)'].' '.date_format($date,"Y"); ?> <i>|</i>
									</li>
									
									<li>

										<?php 
											$querytes = $model->__builder_specific_rate($_GET['arch_thumbnail'], $resulta['user_id']);
							              if( $resultaes = $model->fetch($querytes) ){

											if($resultaes['rate']>=4&$resultaes['rate']<5){	 ?>
					                      <p><img src="rate_pics/4.png" alt="post Image" style="height:30px; width:140px;"></p>
					                    <?php }else if($resultaes['rate']>=3&$resultaes['rate']<4){ ?>
					                      <p><img src="rate_pics/3.png" alt="post Image" style="height:30px; width:140px;"></p>
					                    <?php }else if($resultaes['rate']>=2&$resultaes['rate']<3){ ?>
					                      <p><img src="rate_pics/2.png" alt="post Image" style="height:30px; width:140px;"></p>
					                    <?php }else if($resultaes['rate']>=1&$resultaes['rate']<2){ ?>
					                      <p><img src="rate_pics/1.png" alt="post Image" style="height:30px; width:140px;"></p>
					                    <?php }else if($resultaes['rate']==5){ ?>
					                      <p><img src="rate_pics/5.png" alt="post Image" style="height:30px; width:140px;"></p>
					                    <?php } 
					                    	}
					                    ?>

									</li>
								</ul>
								<p><?php echo $resulta['message']; ?></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<?php }while(($resulta = mysql_fetch_assoc($queryt))); } ?>
					
					</div>
				</div>
				<div class="leave-coment-form">
					
					<?php if(!isset($_GET['set'])){ ?>
					<h3>Leave Your Review</h3>
					<form method="post">
						<input type="hidden" id="userIDs" name="userIDs" value="<?php echo $_SESSION['userlogged']['user_id']; ?>" >
		                <input type="hidden" id="architectIDs" name="architectIDs" value="<?php echo $_GET['arch_thumbnail']; ?>" >
						<textarea name="message" placeholder="Your review here..." required=""></textarea>
						<div class="w3_single_submit">
							<input type="submit" name="submitReviewArchitect" value="Submit Review" >
						</div>
					</form>
					<?php }else{ 
						$query = $model->particular_review($_GET['set']);  
				    	if( $result = $model->fetch($query) ){
					?>
						<h3>Update Your Review</h3>
						<form method="post">
			                <input type="hidden" id="revID" name="revID" value="<?php echo $_GET['set']; ?>" >
							<textarea name="messages" required=""><?php echo $result['message']; ?></textarea>
							<div class="w3_single_submit">
								<input type="submit" name="submitUpdateReviewArchitect" value="Update Review" >
							</div>
						</form>
					<?php 
						}
					} ?>
					
				</div>
			</div>
			<div class="col-md-4 event-right wthree-event-right">
				<div class="event-right1 agileinfo-event-right1">
					<div class="search1 agileits-search1">
						
							
							
						
					</div>
					<h3 style="font-family:Century Gothic;" >RATE THIS INTERIOR DESIGNER</h3>
					<div class="categories w3ls-categories">
						<h3>RATE HERE</h3>
							<form method="post">
								<!-- for rating code -->
							<?php if(isset($_SESSION['userlogged'])){?>
							<?php include('rating_plugin_css.php');?>	
		                    
		                    <fieldset id='demo1' class="rating">
		                        <input type="hidden" id="userID" name="userID" value="<?php echo $_SESSION['userlogged']['user_id']; ?>" >
		                        <input type="hidden" id="architectID" name="architectID" value="<?php echo $_GET['arch_thumbnail']; ?>" >
		                        <input class="stars" type="radio" id="star5" name="rating" value="5" />
		                        <label class = "full" for="star5" title="Awesome"></label>
		                        <input class="stars" type="radio" id="star4" name="rating" value="4" />
		                        <label class = "full" for="star4" title="Pretty good"></label>
		                        <input class="stars" type="radio" id="star3" name="rating" value="3" />
		                        <label class = "full" for="star3" title="Good"></label>
		                        <input class="stars" type="radio" id="star2" name="rating" value="2" />
		                        <label class = "full" for="star2" title="Kinda Bad"></label>
		                        <input class="stars" type="radio" id="star1" name="rating" value="1" />
		                        <label class = "full" for="star1" title="Needs Improvement"></label>
		                    </fieldset>
		                    <script>
		                        (function (i, s, o, g, r, a, m) {
		                            i['GoogleAnalyticsObject'] = r;
		                            i[r] = i[r] || function () {
		                                (i[r].q = i[r].q || []).push(arguments)
		                            }, i[r].l = 1 * new Date();
		                            a = s.createElement(o),
		                                    m = s.getElementsByTagName(o)[0];
		                            a.async = 1;
		                            a.src = g;
		                            m.parentNode.insertBefore(a, m)
		                        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

		                        ga('create', 'UA-43091346-1', 'devzone.co.in');
		                        ga('send', 'pageview');

		                    </script>
		                    <input type="submit" value="Submit Rating" name="goRate" style="width:100%;">
			                <?php }else{ ?>
			                	<h4>Sign In to rate this architect</h4>
			                <?php } ?>
			                <!-- for rating code -->
							
						
						</form>
					</div>
					<div class="tags tags1 w3layouts-tags">
						<h3>Categories</h3>
						<ul>
							<?php $query = $model->all_designcategory();  //FROM MODEL
							    if( $result = $model->fetch($query) ){
							        do{ ?>
								<!--li><a href="single.html"><?php echo $result['descategory']; ?></a></li-->
								<li><a href="#"><?php echo $result['descategory']; ?></a></li>
							<?php 
						        }while($result = $model->fetch($query));
						        } 
							?>
						</ul>
					</div>
					<div class="tags tags1 w3layouts-tags">
						<h3>Styles</h3>
						<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
						  <?php $query = $model->all_styles();  //FROM MODEL
							    if( $result = $model->fetch($query) ){
							        do{ ?>
								  <div class="panel panel-default" style="border:2px solid #e0e4e4;">
									<div class="panel-heading" role="tab" id="heading<?php echo $result['style_id']; ?>">
									  <h4 class="panel-title asd">
										<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $result['style_id']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $result['style_id']; ?>">
										  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i><?php echo $result['style_name']; ?>
										</a>
									  </h4>
									</div>
									<div id="collapse<?php echo $result['style_id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $result['style_id']; ?>">
									   <div class="panel-body panel_text">
										<?php  
											 // $andID=$result['service_id'];
						                      $string =$result['style_details'];
						                      $string = strip_tags($string);
						                      if (strlen($string) > 150) {
						                        $stringCut = substr($string, 0, 150);
						                         
						                          $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a class="view resw3" href="#" data-toggle="modal" data-target="#myModalStyle'.$result['style_id'].'">Read More</a>'; 
						                        
						                      }  
						                      echo $string;
						                    ?>
									  </div>
									</div>
								  </div>
						  	<?php 
						        	}while($result = $model->fetch($query));
						        } 
							?>
						</div>
					</div>
					<!--div class="posts w3l-posts">
						<h4>Recommended Interior Designers</h4>
						<div class="posts-grids w3-posts-grids">
							<?php $query = $model->suggested_interiors($_GET['architect']);  
				    				if( $result = $model->fetch($query) ){ ?>
							<div class="posts-grid w3-posts-grid">
								<div class="posts-grid-left w3-posts-grid-left">
									<a href="single.html"><img src="images/1.jpg" alt=" " class="img-responsive" /></a>
								</div>
								<div class="posts-grid-right w3-posts-grid-right">
									<h4><a href="index.php">
										<?php $queryy = $model->archi_parameter($result['interior_id'],'Interior Designer');  
				    					if( $resultt = $model->fetch($queryy) ){ 
				    					echo $resultt['b_fname']; ?> <?php echo $resultt['b_lname']; } ?>
									</a></h4>
									<ul class="wthree_blog_events_list">
										<li><i class="fa fa-calendar" aria-hidden="true"></i>10/5/2017</li>
										<li><i class="fa fa-user" aria-hidden="true"></i><a href="single.html">Admin</a></li>
									</ul>
								</div>
								<div class="clearfix"> </div>
							</div>
							<?php } ?>
						</div>
					</div-->
					<!--div class="tags tags1 w3layouts-tags">
						<h3>Services</h3>
						<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
						<?php
					        $query = $model->__list_myServices($_GET['architect']);  //FROM MODEL
					        if( $result = $model->fetch($query) ){
					        do{ ?>
									


					        	<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingOnes<?php echo $result['myserve_id']; ?>">
									  <h4 class="panel-title asd">
										<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOnes<?php echo $result['myserve_id']; ?>" aria-expanded="true" aria-controls="collapseOnes<?php echo $result['myserve_id']; ?>">
										  <span class="glyphicon glyphicon-list" aria-hidden="true"></span><i class="glyphicon glyphicon-list" aria-hidden="true"></i><?php echo $result['service_type']; ?>
										</a>
									  </h4>
									</div>
									<div id="collapseOnes<?php echo $result['myserve_id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOnes<?php echo $result['myserve_id']; ?>">
									  <div class="panel-body panel_text">
										<?php echo $result['service_details']; ?>
									  </div>
									</div>
								 </div>


										<?php 
				                	}while($result = $model->fetch($query));
								} 
				            ?>

						</div-->

						
						  
						  


					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //single -->
