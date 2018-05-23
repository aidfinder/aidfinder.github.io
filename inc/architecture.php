<style type="text/css">
.imagesize{
	width:380px;height:250px;
}
  #slidecontainer {
    width: 100%; /* Width of the outside container */
}

/* The slider itself */
.slider {
    -webkit-appearance: none;  /* Override default CSS styles */
    appearance: none;
    width: 100%; /* Full-width */
    height: 25px; /* Specified height */
    background: #d3d3d3; /* Grey background */
    outline: none; /* Remove outline */
    opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
    -webkit-transition: .2s; /* 0.2 seconds transition on hover */
    transition: opacity .2s;
}

/* Mouse-over effects */
.slider:hover {
    opacity: 1; /* Fully shown on mouse-over */
}

/* The slider handle (use webkit (Chrome, Opera, Safari, Edge) and moz (Firefox) to override default look) */ 
.slider::-webkit-slider-thumb {
    -webkit-appearance: none; /* Override default look */
    appearance: none;
    width: 25px; /* Set a specific slider handle width */
    height: 25px; /* Slider handle height */
    background: #4CAF50; /* Green background */
    cursor: pointer; /* Cursor on hover */
}

.slider::-moz-range-thumb {
    width: 25px; /* Set a specific slider handle width */
    height: 25px; /* Slider handle height */
    background: #4CAF50; /* Green background */
    cursor: pointer; /* Cursor on hover */
}
</style>
<div class="services">
	<div class="container">
		
		<?php if(isset($_GET['accomplished'])){ ?>
		<div class="col-md-8 event-left w3-agile-event-left">
			<div class="event-left1 w3-agile-event-left1">
				<h3 style="font-family:Century Gothic;" >ACCOMPLISHED ARCHITECTURAL PROJECTS</h3>
				<?php
			        $count=0;
			        $query = $model->all_accomplished();  //FROM MODEL
			        if( $result = $model->fetch($query) ){
			        do{
			        $count++;
			        ?> 
					  <?php include('architecturalprojects.php'); ?>
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
				<h3 style="font-family:Century Gothic;" >ARCHITECTURAL DESIGN IDEAS</h3>
				<?php
			        $count=0;
			        $query = $model->all_architecturalDesignIdeas();  //FROM MODEL
			        if( $result = $model->fetch($query) ){
			        do{
			        $count++;
			        ?> 
					  <?php include('architectural_ideas.php'); ?>
				  <?php 
				        }while($result = $model->fetch($query));
				        }else{ 
				   ?>
				   		<div class="well">
							Nothing to show.
						</div>
				   <?php } ?>
				</div>
			</div>
			<!-- ARCHITECTURAL DETAILS -->
			<div class="col-md-4 event-right wthree-event-right">
			<div class="event-right1 agileinfo-event-right1">
				<div class="categories w3ls-categories">
					<center><h4 class="tittle_agile_w3">BASIC ARCHITECTURAL SERVICES</h4></center>
					<div class="heading-underline">
						<div class="h-u1"></div>
						<div class="h-u2"></div>
						<div class="h-u3"></div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
                <?php $querkd = $model->all_service();
                    if( $quer2ks = $model->fetch($querkd) ){
                    do{
				?>
					  <div class="panel panel-default" style="border:1px solid gray;">
						<div class="panel-heading" role="tab" id="headingTwos1<?php echo $quer2ks['service_id']; ?>">
						  <h4 class="panel-title asd">
							<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwos1<?php echo $quer2ks['service_id']; ?>" aria-expanded="false" aria-controls="collapseTwo1<?php echo $quer2ks['service_id']; ?>">
							  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i><?php echo $quer2ks['service_type']; ?>
							</a>
						  </h4>
						</div>
						<div id="collapseTwos1<?php echo $quer2ks['service_id']; ?>"  class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwos1<?php echo $quer2ks['service_id']; ?>">
						   <div class="panel-body panel_text">
						   		<p>
						   			<?php  
									  $andID=$quer2ks['service_id'];
				                      $string =$quer2ks['service_details'];
				                      $string = strip_tags($string);
				                      if (strlen($string) > 150) {
				                        $stringCut = substr($string, 0, 150);
				                        if(isset($_SESSION["userlogged"])){
				                          $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="#" data-toggle="modal" data-target="#myModals'.$andID.'"><i class="fa fa-arrow-circle-right"> </i>Read More</a>'; 
				                        }else{
				                          $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a class="view resw3" href="#" data-toggle="modal" data-target="#myModal2">Read More</a>'; 
				                        }
				                      }  
				                      echo $string;
				                    ?>
						   		</p>
						  </div>
						</div>
					  </div>
					<?php 
                
                    }while($quer2ks = mysql_fetch_assoc($querkd)); 
                  } 
                ?>
                </div>
				</div>
				<div class="categories w3ls-categories">
					<center><h4 class="tittle_agile_w3">ADDITIONAL ARCHITECTURAL SERVICES</h4></center>
					<div class="heading-underline">
						<div class="h-u1"></div>
						<div class="h-u2"></div>
						<div class="h-u3"></div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
						<?php $querkd = $model->all_service2();
	                  if( $quer2ks = $model->fetch($querkd) ){
	                    do{ ?>
	                    	<div class="panel panel-default" style="border:1px solid gray;">
								<div class="panel-heading" role="tab" id="headingTwos2<?php echo $quer2ks['service_id']; ?>">
								  <h4 class="panel-title asd">
									<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwos2<?php echo $quer2ks['service_id']; ?>" aria-expanded="false" aria-controls="collapseTwo2<?php echo $quer2ks['service_id']; ?>">
									  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i><?php echo $quer2ks['service_type']; ?>
									</a>
								  </h4>
								</div>
								<div id="collapseTwos2<?php echo $quer2ks['service_id']; ?>"  class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwos2<?php echo $quer2ks['service_id']; ?>">
								   <div class="panel-body panel_text">
								   		<p>
								   			<?php  
											  $andID=$quer2ks['service_id'];
						                      $string =$quer2ks['service_details'];
						                      $string = strip_tags($string);
						                      if (strlen($string) > 150) {
						                        $stringCut = substr($string, 0, 150);
						                        if(isset($_SESSION["userlogged"])){
						                          $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="#" data-toggle="modal" data-target="#myModals'.$andID.'"><i class="fa fa-arrow-circle-right"> </i>Read More</a>'; 
						                        }else{
						                          $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a class="view resw3" href="#" data-toggle="modal" data-target="#myModal2">Read More</a>'; 
						                        }
						                      }  
						                      echo $string;
						                    ?>
								   		</p>
								  </div>
								</div>
							  </div>
	                   <?php 
	                      }while($quer2ks = mysql_fetch_assoc($querkd)); 
	                    } 
	                  ?>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
		<div class="w3l-news-content events" id="kani">
		<div class="container">
			<h3 class="tittle_agile_w3">ARCHITECT SECTION</h3>
			<div class="heading-underline">
				<div class="h-u1"></div>
				<div class="h-u2"></div>
				<div class="h-u3"></div>
				<div class="clearfix"></div>
			</div>
			<div class="w3l-news_info_agile_its">
				<div class="col-md-6 w3l-news">

					<?php if(!isset($_GET['service'])){ ?>
					<center><h4 class="tittle_agile_w3" >TOP 3 ARCHITECTS</h4></center>
					<div class="heading-underline">
						<div class="h-u1"></div>
						<div class="h-u2"></div>
						<div class="h-u3"></div>
						<div class="clearfix"></div>
					</div>
					<?php
			          $querkd = $model->orderby_rating_avg2("Architect");
			          if( $quer2ks = $model->fetch($querkd) ){
			          do{ 
			        ?>
						<div class="media response-info">
							<div class="media-left response-text-left">
							<?php  if(isset($_SESSION["userlogged"])){ ?>
								<a href="index.php?page=archi_page&arch_thumbnail=<?php echo $quer2ks['builder_id']; ?>">
							<?php }else{ ?>
								<a href="#" data-toggle="modal" data-target="#myModal2">
							<?php } ?>
							<img class="media-object" src="architect pictures/<?php echo $quer2ks['builder_id']; ?>.jpg" style="width:100px;" alt="">
						</a>
							</div>
							<div class="media-body response-text-right">
								<b><?php echo ucwords($quer2ks['b_username']); ?>&nbsp;||</b>&nbsp;
								<b>
									<?php 
										$equery = $model->getExpertise($quer2ks['builder_id']);
				            			if( $result = $model->fetch($equery) ){ echo $result['expertise']; } 
				            		?>
								</b>
								<ul>
									<li>
										<i>(
											<?php 
							                  $queryq = $model->count_architect_accomplished($quer2ks['builder_id']);  
							                    if( $resultq = $model->fetch($queryq) ){ 
							                      echo $resultq['count(accomp_id)'];
							                    }
							                ?>)
										</i>
										Accomplished Project
									</li>
									<li>
										<i>
											(
												<?php 
									                $queryq = $model->count_architect_design($quer2ks['builder_id']);  
									                if( $resultq = $model->fetch($queryq) ){ 
									                  echo $resultq['count(design_id)'];
									                } 
									              ?>
											)
										</i>
										Design Idea
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>
						</div>
					<?php }while($quer2ks = mysql_fetch_assoc($querkd)); } ?>
					<?php }else{ ?>
						<center><h4 class="tittle_agile_w3" >Here are the Suggested Architects for your Budget</h4></center>
						<div class="heading-underline">
							<div class="h-u1"></div>
							<div class="h-u2"></div>
							<div class="h-u3"></div>
							<div class="clearfix"></div>
						</div>
						<?php
				        $serv=0;$serv=$_GET['service'];$budg=0;$budg=$_GET['myRange'];
				            $querkd = $model->__recommend_Architect($_GET['service'],$_GET['myRange']);
				            if( $quer2ks = $model->fetch($querkd) ){ 
				            do{
				        ?>
						<div class="media response-info">
							<div class="media-left response-text-left">
								<?php  if(isset($_SESSION["userlogged"])){ ?>
									<a href="index.php?page=archi_page&arch_thumbnail=<?php echo $quer2ks['builder_id']; ?>">
								<?php }else{ ?>
									<a href="#" data-toggle="modal" data-target="#myModal2">
								<?php } ?>
								<img class="media-object" src="architect pictures/<?php echo $quer2ks['builder_id']; ?>.jpg" style="width:100px;" alt="">
						</a>
							</div>
							<div class="media-body response-text-right">
								<b><?php echo ucwords($quer2ks['b_username']); ?>&nbsp;||</b>&nbsp;
								<b>
									<?php 
										$equery = $model->getExpertise($quer2ks['builder_id']);
				            			if( $result = $model->fetch($equery) ){ echo $result['expertise']; } 
				            		?>
								</b>
								<ul>
									<li>
										<i>(
											<?php 
							                  $queryq = $model->count_architect_accomplished($quer2ks['builder_id']);  
							                    if( $resultq = $model->fetch($queryq) ){ 
							                      echo $resultq['count(accomp_id)'];
							                    }
							                ?>)
										</i>
										Accomplished Project
									</li>
									<li>
										<i>
											(
												<?php 
									                $queryq = $model->count_architect_design($quer2ks['builder_id']);  
									                if( $resultq = $model->fetch($queryq) ){ 
									                  echo $resultq['count(design_id)'];
									                } 
									              ?>
											)
										</i>
										Design Idea
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>
						</div>

					<?php }while($quer2ks = mysql_fetch_assoc($querkd)); } } ?>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-6 wthree_events_grid_right">
					<div class="categories w3ls-categories">
					<h3 class="tittle_agile_w3" style="color:white;">DEFINE YOUR BUDGET</h3>
					<div class="heading-underline">
						<div class="h-u1"></div>
						<div class="h-u2"></div>
						<div class="h-u3"></div>
						<div class="clearfix"></div>
					</div>
					
                  <label style="font-size:12pt;float:left;color:#02a68d;">YOUR BUDGET *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/><br/>
                  <div id="slidecontainer">
                    <input type="range" min="1000" max="3000000" value="10000" class="slider" style="border:1px solid gray;" name="myRange" id="myRange">
                    <br/>
                    <b><p style="font-size:12pt;float:left;color:#02a68d;">PHP <span id="demo"></span></p></b>
                  </div>
                	<br/><br/>
                  <label style="font-size:12pt;float:left;color:#02a68d;">SERVICE TIER *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/><br/>
                  <select name="spec" id="spec" style="width:100%;height:45px;" onchange="submitBudget()">
                    <option>Select Service Tier</option>
                    <?php $querkd = $model->tier();
                        if( $quer2ks = $model->fetch($querkd) ){
                          do{ ?>
                            <option value="<?php echo $quer2ks['tier_id']; ?>"><?php echo $quer2ks['tier_name']; ?></option>
                          <?php 
                            }while($quer2ks = mysql_fetch_assoc($querkd)); 
                          } 
                        ?>
                  </select>
                	<br/><br/>
                <div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
                <?php $querkd = $model->tier();$descount2=0;
                    if( $quer2ks = $model->fetch($querkd) ){
                    do{
				?>
					  <div class="panel panel-default" style="border:1px solid gray;">
						<div class="panel-heading" role="tab" id="headingTwos<?php echo $quer2ks['tier_id']; ?>">
						  <h4 class="panel-title asd">
							<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwos<?php echo $quer2ks['tier_id']; ?>" aria-expanded="false" aria-controls="collapseTwo<?php echo $quer2ks['tier_id']; ?>">
							  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i><?php echo $quer2ks['tier_name']; ?>
							</a>
						  </h4>
						</div>
						<div id="collapseTwos<?php echo $quer2ks['tier_id']; ?>"  class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwos<?php echo $quer2ks['tier_id']; ?>">
						   <div class="panel-body panel_text">
						   	
						   	<p><span class="fa fa-check-circle"></span>&nbsp;Basic Services</p>
			                  <?php $que = $model->tier_services($quer2ks['tier_id']);
			                    if( $quer = $model->fetch($que) ){
			                      do{ 
			                  ?>
			                        <p><span class="fa fa-check-circle"></span>&nbsp;<?php echo $quer['service_type']; ?></p>
			                    <?php 
			                        }while($quer = mysql_fetch_assoc($que)); 
			                      } 
			                    ?>
							
						  </div>
						</div>
					  </div>
					<?php 
                
                    }while($quer2ks = mysql_fetch_assoc($querkd)); 
                  } 
                ?>
                </div>
                <br/><br/>
				</div>
				<div class="categories w3ls-categories">
					<h3>Request an Appointment</h3>
					<ul>


						

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
			                  <select style="width:100%;height:45px;" id="architect">
			                  	<option>--Select Architect--</option>
			                    <?php 
			                        $query = $model->__list_Architect();  
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
								<p class="control-label"><b>Type of Building *</b></p>
								<p>
			                  <select name="buildCat" id="buildCat" onchange="filtered_type()" style="width:100%;height:45px;" required="">
	            				<option>Select Building Classification</option>
	            				<?php 
					        		$query = $model->all_buildingcategory();  
								    if( $result = $model->fetch($query) ){
								     	do{
					        	?>
					        		<option value="<?php echo $result['build_cat_id']; ?>"><?php echo $result['building_category']; ?></option>
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
								<p>
			                  <div id="subcat_div">
			            			<select id="subcat" style="width:100%;height:45px;" disabled>
			            				<option>Select Sub Classification</option>
			            			</select>
		            			</div>
			                  </p>
			                </div>
						</li>
						<li>
							<p class="control-label"><b>Location of Appointment *</b></p>
							<select style="width:100%;height:45px;" name="provincess" id="provincess" onchange="filtered_municipality()"> 
			                  <?php $querkd = $model->all_provinces();
			                  if( $quer2ks = $model->fetch($querkd) ){
			                    do{ ?>
			                      <option value="<?php echo $quer2ks['prov_id']; ?>">
			                        <?php echo $quer2ks['name']; ?>
			                      </option>
			                    <?php 
			                      }while($quer2ks = mysql_fetch_assoc($querkd)); 
			                    } 
			                  ?>
			                </select>
						</li>
						<li>
							<div id="mun_div">
			                <select style="width:100%;height:45px;" name="municipality" id="municipalityz" disabled> 
			                    <option>--Select Municipality--</option>
			                </select>
			              </div>
						</li>
						<li>
							<div id="bar_div">
				                <select style="width:100%;height:45px;" name="barangay" id="barangay" disabled> 
				                    <option>--Select Barangay--</option>
				                </select>
				              </div>
						</li>
						<li>
							<div><br/>
							  <p class="control-label"><b>When would you like architect to come?</b></p><br/>
							  <p><b>From *</b></p>
			                  <p>
			                  	<input type="date" id="txtDate" name="from" class="form-control"/>
			                  </p>
			                  <p class="control-label"><b>To *</b></p>
			                  <p>
			                  	<input type="date" name="to" id="follow_Date" class="form-control"/>
			                  	<input type="hidden" id="myID" value="<?php echo $_SESSION['userlogged']['user_id']; ?>">
			                  </p>
			                  <!--button type="button" onclick="getdate()" >saxasa</button-->
			                </div>
						</li>
						<?php if(isset($_SESSION['userlogged'])){?>
						<div class="w3layouts_newsletter_right">
							<button id="requestArchitectService" style="">Request</button>
						</div>
						<div class="message"></div>
						<?php }else{ ?>
							<a class="view resw3" href="#" data-toggle="modal" data-target="#myModal2">Request</a>
						<?php } ?>
						


					</ul>
				</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
		<?php }else if(isset($_GET['myprojects'])){ ?>
		<div class="col-md-6 event-left w3-agile-event-left">
			<center><h4 class="tittle_agile_w3">MY PROJECTS</h4></center>
			<div class="heading-underline">
				<div class="h-u1"></div>
				<div class="h-u2"></div>
				<div class="h-u3"></div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
                <?php $querkd = $model->client_posted_projects();
		                  if( $quer2ks = $model->fetch($querkd) ){
		                    do{ ?>
					  <div class="panel panel-default" style="border:1px solid gray;">
						<div class="panel-heading" role="tab" id="headingTwos1<?php echo $quer2ks['clientproject_id']; ?>">
						  <h4 class="panel-title asd">
							<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwos1<?php echo $quer2ks['clientproject_id']; ?>" aria-expanded="false" aria-controls="collapseTwo1<?php echo $quer2ks['clientproject_id']; ?>">
							  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i><?php 
								                $queryq = $model->count_bidders($quer2ks['clientproject_id']);  
								                if( $resultq = $model->fetch($queryq) ){ ?>
												<span class="badge badge-primary">
													<?php echo $resultq['count(bid_id)']; ?>
										        </span>

									        <?php } ?><?php echo $quer2ks['project_title']; ?>
							</a>
						  </h4>
						</div>
						<div id="collapseTwos1<?php echo $quer2ks['clientproject_id']; ?>"  class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwos1<?php echo $quer2ks['clientproject_id']; ?>">
						   <div class="panel-body panel_text">
						   	<img src="ARCHITECT ADMIN/clientproject_img/<?php echo $quer2ks['clientproject_id']; ?>.jpg" style="width:700px;height:400px;" alt=" " class="img-responsive" />
						   	<div class="well"><b>Date Posted * </b><span class="fa fa-calendar"></span> <?php echo date("F jS, Y", strtotime($quer2ks['project_date_posted'])); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Bid Deadline Date * </b><span class="fa fa-calendar"></span> <?php echo date("F jS, Y", strtotime($quer2ks['bid_deadline'])); ?></div>
						   	<!--div class="well"><a href="#"><b>View Bidders * </b></a><span class="fa fa-user" ></span>
						   		<?php $queryq = $model->count_bidders($quer2ks['clientproject_id']);  
								                if( $resultq = $model->fetch($queryq) ){ ?>
												<span class="badge badge-primary" id="hide">
													<?php echo $resultq['count(bid_id)']; ?>
										        </span><?php } ?></div-->
							<div class="well">
								<div class="tags tags1 w3layouts-tags">
									<h3>Download Recent Bids</h3>
									<ul>
										<?php $recents = $model->recentBids($quer2ks['clientproject_id']);  
											  if( $recentResult = $model->fetch($recents) ){
											   	do{  ?>
												<li><a href="./CONTRACTOR/ajax_upload/bid_documents/<?php echo $recentResult['bid_id']; ?>.pdf" download><?php echo $recentResult['contractor_username']; ?>'s Bid</a></li>
										<?php 
												}while($recentResult = $model->fetch($recents));
											} 
										?>
									</ul>
								</div>
							</div>
						   	<div class="well">
						   		<p>
						   			<?php  
									  $andID=$quer2ks['clientproject_id'];
				                      $string =$quer2ks['project_description'];
				                      $string = strip_tags($string);
				                      if (strlen($string) > 150) {
				                        $stringCut = substr($string, 0, 150);
				                        if(isset($_SESSION["userlogged"])){
				                          $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="#" data-toggle="modal" data-target="#myModals'.$andID.'"><i class="fa fa-arrow-circle-right"> </i>Read More</a>'; 
				                        }else{
				                          $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a class="view resw3" href="#" data-toggle="modal" data-target="#myModal2">Read More</a>'; 
				                        }
				                      }  
				                      echo $string;
				                    ?>
						   		</p>
						   	</div>
						   		
						  </div>
						</div>
					  </div>
					<?php 
                
                    }while($quer2ks = mysql_fetch_assoc($querkd)); 
                  } 
                ?>
                </div>
		</div>

		<div class="col-md-6 event-right wthree-event-right" id="rMap">
				<center><h4 class="tittle_agile_w3">PROJECTS SPECS</h4></center>
				<div class="heading-underline">
					<div class="h-u1"></div>
					<div class="h-u2"></div>
					<div class="h-u3"></div>
					<div class="clearfix"></div>
				</div>
				<div class="event-right1 agileinfo-event-right1">
					<div class="categories w3ls-categories">
					<form method="post" enctype="multipart/form-data">


	<?php $queryClientProject = $model->getClientProjectID(); 
		if( $resultClientProject = $model->fetch($queryClientProject) ){ 
	?>
		<input type="hidden" value="<?php echo $resultClientProject['max(t.clientproject_id)+1']; ?>" name="clientProjID"/>
	<?php } ?>


						<h3>Input the specs of your project</h3><br/><br/>
						<label style="font-size:12pt;float:left;color:#02a68d;">Building Classification *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/><br/>
            			<select name="buildCat" id="buildCat" onchange="filtered_type()" style="width:100%;height:45px;" required="">
            				<option>Select Building Classification</option>
            				<?php 
				        		$query = $model->all_buildingcategory();  
							    if( $result = $model->fetch($query) ){
							     	do{
				        	?>
				        		<option value="<?php echo $result['build_cat_id']; ?>"><?php echo $result['building_category']; ?></option>
							        	<?php 
				                	}while($result = $model->fetch($query));
								} 
				            ?>
            			</select><br/><br/>
            			<label style="font-size:12pt;float:left;color:#02a68d;">Building Building Sub classification *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/><br/>
            			<div id="subcat_div">
	            			<select name="subcat" style="width:100%;height:45px;" required="" disabled>
	            				<option>Select Sub Classification</option>
	            			</select>
            			</div><br/>
            			<label style="font-size:12pt;float:left;color:#02a68d;">Specialization *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/><br/>
            			<select name="spec" style="width:100%;height:45px;" required="">
            				<option>Specialization</option>
            				<?php $querkd = $model->all_specialization();
			                  if( $quer2ks = $model->fetch($querkd) ){
			                    do{ ?>
			                      <option value="<?php echo $quer2ks['specialization_id']; ?>"><?php echo $quer2ks['specialization']; ?></option>
			                    <?php 
			                      }while($quer2ks = mysql_fetch_assoc($querkd)); 
			                    } 
			                  ?>
            			</select><br/><br/>
            			<label style="font-size:12pt;float:left;color:#02a68d;">Architect *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/><br/>
            			<select name="architect" style="width:100%;height:45px;" required="">
            				<option>Select Architect</option>
            				<?php $querkd = $model->__list_Architect();
			                  if( $quer2ks = $model->fetch($querkd) ){
			                    do{ ?>
			                      <option value="<?php echo $quer2ks['builder_id']; ?>"><?php echo $quer2ks['b_fname']; ?> <?php echo $quer2ks['b_lname']; ?></option>
			                    <?php 
			                      }while($quer2ks = mysql_fetch_assoc($querkd)); 
			                    } 
			                  ?>
            			</select><br/><br/>
            			<label style="font-size:12pt;float:left;color:#02a68d;">Project Design Plan*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
		                <div class="fileupload fileupload-new" data-provides="fileupload">         
		                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
		                    <div>
		                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input name="image_file"type="file" required></span>
		                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
		                    </div>
		                </div>

            			<label style="font-size:12pt;float:left;color:#02a68d;">Project Name *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/><br/>
            			
		                <input type="text" style="width:100%;height:45px;border:1px solid gray;" name="projTitle">
		                <br/><br/>
		                <label style="font-size:12pt;float:left;color:#02a68d;">Project Description *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            			
		                <textarea name="project_description" style="width:100%;border:1px solid gray;" placeholder="Project description here..." required=""></textarea>
						<label style="font-size:12pt;float:left;color:#02a68d;">Estimated Cost *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/><br/>
            			<select name="estimated_cost" style="width:100%;height:45px;" required="">
            				<option value="0-10000">Php 0 - Php 10,000</option>
            				<option value="10000-50000">Php 10,000 - Php 50,000</option>
            				<option value="50000-250000">Php 50,000 - Php 250,000</option>
            				<option value="250000-1000000">Php 250,000 - Php 1,000,000</option>
            			</select><br/><br/>
            			<label style="font-size:12pt;float:left;color:#02a68d;">Bid Deadline Date *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            			<input type="date" style="width:100%;height:45px;border:1px solid gray;" name="deadline_date">
		                <br/><br/>
		                <label style="font-size:12pt;float:left;color:#02a68d;">Province *</label>
		              	<br/><br/>
		                <select style="width:100%;height:45px;" name="provincess" id="provincess" onchange="filtered_municipality()"> 
		                  <?php $querkd = $model->all_provinces();
		                  if( $quer2ks = $model->fetch($querkd) ){
		                    do{ ?>
		                      <option value="<?php echo $quer2ks['prov_id']; ?>">
		                        <?php echo $quer2ks['name']; ?>
		                      </option>
		                    <?php 
		                      }while($quer2ks = mysql_fetch_assoc($querkd)); 
		                    } 
		                  ?>
		                </select>
              
		              <label style="font-size:12pt;float:left;color:#02a68d;">Municipality *</label>
		              <br/><br/>
		              <div id="mun_div">
		                <select style="width:100%;height:45px;" name="municipality" id="municipalityz" disabled> 
		                    <option>--Select Municipality--</option>
		                </select>
		              </div>
		              <label style="font-size:12pt;float:left;color:#02a68d;">Barangay *</label>
		              <br/><br/>
		              <div id="bar_div">
		                <select style="width:100%;height:45px;" name="barangay" id="barangay" disabled> 
		                    <option>--Select Barangay--</option>
		                </select>
		              </div>
				      <br/>
				      <?php if(isset($_POST['ok'])){ ?>
				      <div class="alert alert-success"><?php echo $_POST['ok']; ?></div>
				      <?php }else if(isset($_POST['error']['exist'])){ ?>
				      <div class="alert alert-danger"><?php echo $_POST['error']['exist']; ?></div>
				      <?php } ?>
				      <br/>		
					<div class="w3_single_submit">
						<input type="submit" name="postProj" value="Post Project" />
					</div>
						
					
					</form>
						</ul>
					</div>
					<div class="posts w3l-posts">
						<h3>Our Events</h3>
						<div class="posts-grids w3-posts-grids">
							<div class="posts-grid w3-posts-grid">
								<div class="posts-grid-left w3-posts-grid-left">
									<a href="single.html"><img src="images/1.jpg" alt=" " class="img-responsive" /></a>
								</div>
								<div class="posts-grid-right w3-posts-grid-right">
									<h4><a href="single.html">Sed ut perspiciatis unde omnis iste natus</a></h4>
									<ul class="wthree_blog_events_list">
										<li><i class="fa fa-calendar" aria-hidden="true"></i>10/5/2017</li>
										<li><i class="fa fa-user" aria-hidden="true"></i><a href="single.html">Admin</a></li>
									</ul>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="posts-grid w3-posts-grid">
								<div class="posts-grid-left w3-posts-grid-left">
									<a href="single.html"><img src="images/6.jpg" alt=" " class="img-responsive" /></a>
								</div>
								<div class="posts-grid-right w3-posts-grid-right">
									<h4><a href="single.html">Neque porro quisquam qui dolorem</a></h4>
									<ul class="wthree_blog_events_list">
										<li><i class="fa fa-calendar" aria-hidden="true"></i>12/5/2017</li>
										<li><i class="fa fa-user" aria-hidden="true"></i><a href="single.html">Admin</a></li>
									</ul>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="posts-grid w3-posts-grid">
								<div class="posts-grid-left w3-posts-grid-left">
									<a href="single.html"><img src="images/7.jpg" alt=" " class="img-responsive" /></a>
								</div>
								<div class="posts-grid-right w3-posts-grid-right">
									<h4><a href="single.html">Nemo enim ipsam voluptatem quia</a></h4>
									<ul class="wthree_blog_events_list">
										<li><i class="fa fa-calendar" aria-hidden="true"></i>13/5/2017</li>
										<li><i class="fa fa-user" aria-hidden="true"></i><a href="single.html">Admin</a></li>
									</ul>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
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
		<?php } ?>
		
		
	</div>
</div>




<script type="text/javascript">
  var slider = document.getElementById("myRange");

  var output = document.getElementById("demo");
  output.innerHTML = slider.value; // Display the default slider value

  // Update the current slider value (each time you drag the slider handle)
  slider.oninput = function() {
      output.innerHTML = this.value;
  }

</script>
<script type="text/javascript">
  function submitBudget(){
      var spec=document.getElementById("spec").value;
      var myRange=document.getElementById("myRange").value;
      document.location.href="index.php?page=architecture&accomplished&service="+spec+"&myRange="+myRange+"&#kani"
  }
</script>