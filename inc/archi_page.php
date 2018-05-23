
	<div class="services">
		<div class="container" >
			<h3 class="tittle_agile_w3">About this Architect</h3>
			<div class="heading-underline">
				<div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
			</div>
			<div class="col-md-8 single-left">
				<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
				  <h3 style="font-family:Century Gothic;" >ACCOMPLISHED PROJECTS</h3>
				  <br/>
				  <?php
			        $count=0;
			        $query = $model->architect_accomplished($_GET['arch_thumbnail']);  //FROM MODEL
			        if( $result = $model->fetch($query) ){
			        do{
			        $count++;
			        ?> 
					  <div class="panel panel-default" style="border:2px solid #e0e4e4;">
						<div class="panel-heading" role="tab" id="heading<?php echo $result['accomp_id']; ?>">
						  <h4 class="panel-title asd">
							<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $result['accomp_id']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $result['accomp_id']; ?>">
							  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i><?php echo $result['accproj_title']; ?>
							</a>
						  </h4>
						</div>
						<div id="collapse<?php echo $result['accomp_id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $result['accomp_id']; ?>">
						   <div class="panel-body panel_text">
							<center>
								<img alt=" " class="img-responsive" style="width:600px;height:300px" src="ARCHITECT ADMIN/accomplished_img/<?php echo $result['accomp_id']; ?>.jpg" />
							</center>	
						  	<br/>
						  	<div class="well">
						  		<label style="font-size:12pt;float:left;color:black;">Date Started : &nbsp;&nbsp;</label><label style="font-size:12pt;float:left;color:#02a68d;"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $result['accproj_date_started']; ?></label>
						  		<label style="font-size:12pt;float:left;color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date Finished : &nbsp;&nbsp;</label><label style="font-size:12pt;float:left;color:#02a68d;"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $result['accproj_date_finished']; ?></label>
								<br/>
							</div>
							<div class="well">
						  		<label style="font-size:12pt;float:left;color:black;">Project Location : &nbsp;&nbsp;</label><label style="font-size:12pt;float:left;color:#02a68d;"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;
						  			<?php 
						  				$province='';$municipality='';$barangay='';
						  				$barangayID=0;
						  				$barangayID=$result['accproj_address']; 
						  				$querya = $model->accomp_location($barangayID);  //FROM MODEL
								        if( $resulta = $model->fetch($querya) ){
								        	$queryb = $model->accomp_location_province($resulta['prov_id']);  //FROM MODEL
								        	if( $resultb = $model->fetch($queryb) ){
								        		$province=$resultb['name']; 
								        	} 
								        	$queryc = $model->accomp_location_municipality($resulta['mun_id']);  //FROM MODEL
								        	if( $resultc = $model->fetch($queryc) ){
								        		$municipality=$resultc['name']; 
								        	}
								        } 
								        $barangay=$resulta['barangay_spec'];
								        ?>
								    <?php echo $barangay; ?>, <?php echo $municipality; ?>, <?php echo $province; ?>
						  		</label>
								<br/>
							</div>
							<div class="well">
						  		<label style="font-size:12pt;float:left;color:black;">Project Value : &nbsp;&nbsp;</label><label style="font-size:12pt;float:left;color:#02a68d;"><i class="fa fa-dollar" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $result['accproj_projectamount']; ?></label>
						  		<br/>
							</div>
						  	<div class="well">
						  		<?php echo $result['accproj_details']; ?>
							</div>

						  </div>
						</div>
					  </div>
				  <?php 
				        }while($result = $model->fetch($query));
				        }else{ 
				   ?>
				   		<div class="well">
							Nothing to show.
						</div>
				   <?php } ?>
				</div><br/><br/>
				<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
				  <h3 style="font-family:Century Gothic;" >DESIGN IDEAS</h3>
				  <br/>
				  <?php
			        $count=0;
			        $query = $model->architect_design($_GET['arch_thumbnail']);  //FROM MODEL
			        if( $result = $model->fetch($query) ){
			        do{
			        $count++;
			        ?> 
					  <div class="panel panel-default" style="border:2px solid #e0e4e4;">
						<div class="panel-heading" role="tab" id="headings<?php echo $result['design_id']; ?>">
						  <h4 class="panel-title asd">
							<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapses<?php echo $result['design_id']; ?>" aria-expanded="false" aria-controls="collapses<?php echo $result['design_id']; ?>">
							  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i><?php echo $result['design_title']; ?>
							</a>
						  </h4>
						</div>
						<div id="collapses<?php echo $result['design_id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headings<?php echo $result['design_id']; ?>">
						   <div class="panel-body panel_text">
							<center>
								<img alt=" " class="img-responsive" style="width:600px;height:300px" src="ARCHITECT ADMIN/design_img/<?php echo $result['design_id']; ?>.jpg" />
							</center>	
						  	<br/>
						  	<div class="well">
								<?php echo $result['design_details']; ?>
							</div>
						  </div>
						</div>
					  </div>
				  <?php 
				        }while($result = $model->fetch($query));
				        }else{ 
				   ?>
				   		<div class="well">
							Nothing to show.
						</div>
				   <?php } ?>
				</div>


				
				<!-- I deleted something here-->
				<div class="comments">
					<h3>Recent Reviews</h3>
					<div class="comments-grids">
						<?php $a=array();$count=0;$count2=0;$count3=0;

							$ident=0;
					            $queryt = $model->count_overall_builder_reviews($_GET['arch_thumbnail']);
					              if( $resulta = $model->fetch($queryt) ){$ident=$resulta['count(r.review_id)'];}

							            $querytes = $model->interior_rates($_GET['arch_thumbnail']);
							              if( $resultaes = $model->fetch($querytes) ){
							                do{$count3++;
							                //echo $a[$count].'-'.$resultaes['user_id'];
							       		 ?>
					                        <?php 
								            $queryt = $model->interior_reviews($_GET['arch_thumbnail'],$resultaes['user_id']);
								              if( $resulta = $model->fetch($queryt) ){
								                do{ $a[$count]=$resultaes['user_id'];$count++;
								       		 ?>
						<div class="comments-grid">
							<div class="comments-grid-left">
								<img src="images/1.png" alt=" " class="img-responsive" />
							</div>
							<div class="comments-grid-right">
								<h4><?php echo $resulta['user_fname']; ?> <?php echo $resulta['user_lname']; ?></h4>
								<ul>
									<li>14 May 2017 <i>|</i></li>
									<li><?php if($resultaes['rate']>=4&$resultaes['rate']<5){ ?>
							                      <p><img src="rate_pics/4.png" alt="post Image" style="height:30px; width:140px;"></p>
							                    <?php }else if($resultaes['rate']>=3&$resultaes['rate']<4){ ?>
							                      <p><img src="rate_pics/3.png" alt="post Image" style="height:30px; width:140px;"></p>
							                    <?php }else if($resultaes['rate']>=2&$resultaes['rate']<3){ ?>
							                      <p><img src="rate_pics/2.png" alt="post Image" style="height:30px; width:140px;"></p>
							                    <?php }else if($resultaes['rate']>=1&$resultaes['rate']<2){ ?>
							                      <p><img src="rate_pics/1.png" alt="post Image" style="height:30px; width:140px;"></p>
							                    <?php }else if($resultaes['rate']==5){ ?>
							                      <p><img src="rate_pics/5.png" alt="post Image" style="height:30px; width:140px;"></p>
							                    <?php } ?>
									</li>
								</ul>
								<p><?php echo $resulta['message']; ?></p>
							</div>
							<div class="clearfix"> </div>
						</div>
							<?php }while(($resulta = mysql_fetch_assoc($queryt))); }else{	$count2++; ?>
					                        	<div class="comments-grid">
							<div class="comments-grid-left">
								<img src="images/1.png" alt=" " class="img-responsive" />
							</div>
							<div class="comments-grid-right">
								<h4><?php echo $resultaes['user_fname']; ?> <?php echo $resultaes['user_lname']; ?></h4>
								<ul>
									<li>14 May 2017 <i>|</i></li>
									<li><?php if($resultaes['rate']>=4&$resultaes['rate']<5){	 ?>
							                      <p><img src="rate_pics/4.png" alt="post Image" style="height:30px; width:140px;"></p>
							                    <?php }else if($resultaes['rate']>=3&$resultaes['rate']<4){ ?>
							                      <p><img src="rate_pics/3.png" alt="post Image" style="height:30px; width:140px;"></p>
							                    <?php }else if($resultaes['rate']>=2&$resultaes['rate']<3){ ?>
							                      <p><img src="rate_pics/2.png" alt="post Image" style="height:30px; width:140px;"></p>
							                    <?php }else if($resultaes['rate']>=1&$resultaes['rate']<2){ ?>
							                      <p><img src="rate_pics/1.png" alt="post Image" style="height:30px; width:140px;"></p>
							                    <?php }else if($resultaes['rate']==5){ ?>
							                      <p><img src="rate_pics/5.png" alt="post Image" style="height:30px; width:140px;"></p>
							                    <?php } ?>
									</li>
								</ul>
								<p><?php echo $result['message']; ?></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					                        <?php } ?> 
					                     <?php }while(($resultaes = mysql_fetch_assoc($querytes))); 

					                     if($count2==1&&$ident>=1&&$count3==1){
				                     		$queryte = $model->overall_builder_reviews($_GET['arch_thumbnail']);
								              if( $resultae = $model->fetch($queryte) ){
								                do{ ?>
													    	<div class="comments-grid">
																<div class="comments-grid-left">
																	<img src="images/1.png" alt=" " class="img-responsive" />
																</div>
																<div class="comments-grid-right">
																	<h4><?php echo $resultae['user_fname']; ?> <?php echo $resultae['user_lname']; ?></h4>
																	<ul>
																		<li>14 May 2017 <i>|</i></li>
																	</ul>
																	<p><?php echo $resultae['message']; ?></p>
																</div>
																<div class="clearfix"> </div>
															</div>
								            <?php }while(($resultae = mysql_fetch_assoc($queryte))); }

				                     	 }else if($count2==0&&$ident>=1&&$count3==1){ 
									       		if($ident>$count){$arrlength = count($a);
									       			$queryte = $model->overall_builder_reviews($_GET['arch_thumbnail']);
										              if( $resultae = $model->fetch($queryte) ){
										                do{ $test=0;// echo $arrlength;
										                	$y='';
										                	for($x = 0; $x < $arrlength&&$y==''; $x++) {
															    if($a[$x]==$resultae['user_id']){$test++;$y='yes';} //echo $a[$x].'-'.$resultae['user_id'];
															}
															    if($test==$arrlength-1){ ?>
															    	<div class="comments-grid">
																		<div class="comments-grid-left">
																			<img src="images/1.png" alt=" " class="img-responsive" />
																		</div>
																		<div class="comments-grid-right">
																			<h4><?php echo $resultae['user_fname']; ?> <?php echo $resultae['user_lname']; ?></h4>
																			<ul>
																				<li>14 May 2017 <i>|</i></li>
																			</ul>
																			<p><?php echo $resultae['message']; ?></p>
																		</div>
																		<div class="clearfix"> </div>
																	</div>
															    <?php }
															
										                ?>

										            <?php }while(($resultae = mysql_fetch_assoc($queryte))); }
									       		}
									       	  ?>
				                     	<?php }

					                 }else if(count($a)==0){

					                     ?>
					                     		<?php $queryte = $model->overall_builder_reviews($_GET['arch_thumbnail']);
									              if( $resultae = $model->fetch($queryte) ){
									                do{ ?>
														    	<div class="comments-grid">
																	<div class="comments-grid-left">
																		<img src="images/1.png" alt=" " class="img-responsive" />
																	</div>
																	<div class="comments-grid-right">
																		<h4><?php echo $resultae['user_fname']; ?> <?php echo $resultae['user_lname']; ?></h4>
																		<ul>
																			<li>14 May 2017 <i>|</i></li>
																		</ul>
																		<p><?php echo $resultae['message']; ?></p>
																	</div>
																	<div class="clearfix"> </div>
																</div>

									            <?php }while(($resultae = mysql_fetch_assoc($queryte))); } ?>
					                     <?php }else{ ?>
					                     <?php 
								            $queryt = $model->count_overall_builder_reviews($_GET['arch_thumbnail']);
								              if( $resulta = $model->fetch($queryt) ){$ident=$resulta['count(r.review_id)'];}
								       		if($ident>$count){$arrlength = count($a); 
								       			$queryte = $model->overall_builder_reviews($_GET['arch_thumbnail']);
									              if( $resultae = $model->fetch($queryte) ){
									                do{ $test=0;// echo $arrlength;
									                	$y='';
									                	for($x = 0; $x < $arrlength&&$y==''; $x++) {
														    if($a[$x]==$resultae['user_id']){$test++;$y='yes';} //echo $a[$x].'-'.$resultae['user_id'];
														}
														    if($test==$arrlength-1){ ?>
														    	<div class="comments-grid">
																	<div class="comments-grid-left">
																		<img src="images/1.png" alt=" " class="img-responsive" />
																	</div>
																	<div class="comments-grid-right">
																		<h4><?php echo $resultae['user_fname']; ?> <?php echo $resultae['user_lname']; ?></h4>
																		<ul>
																			<li>14 May 2017 <i>|</i></li>
																		</ul>
																		<p><?php echo $resultae['message']; ?></p>
																	</div>
																	<div class="clearfix"> </div>
																</div>
														    <?php }
														
									                ?>

									            <?php }while(($resultae = mysql_fetch_assoc($queryte))); }
								       		}
								       	  ?>

								       	  <?php } ?>
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
					<div class="categories w3ls-categories">
						<h3>Rate this Architect</h3>
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
					<div class="posts w3l-posts">
						<h4>Recommended Interior Designers</h4>
						<div class="posts-grids w3-posts-grids">
							<?php $query = $model->suggested_interiors($_GET['arch_thumbnail']);  
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
					</div>
					<div class="tags tags1 w3layouts-tags">
						<h3>Services</h3>
						<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
						<?php
					        $query = $model->__list_myServices($_GET['arch_thumbnail']);  //FROM MODEL
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

						</div>

						
						  
						  


					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //single -->
