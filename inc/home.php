
<!-- about -->
		<div class="services">
			<div class="container">
			
				
				<?php 
				  if(isset($_GET['search'])||isset($_GET['searchArchitect']))
				  {
				  	if(isset($_GET['search']))
				  	{
					?>
						<div class="col-md-2">
						<center>
						<h4>Ranking by Rating within <?php echo $_GET['search']; ?></h4><br/>
						</center>
						<center>
						<?php 
                    		$query = $model->__carpenter_within('Interior Designer',$_GET['search']);  
						    if( $result = $model->fetch($query) ){
						     	do{ $got='0'; $rate=0.0; $user='';$bID=0; ?>
						<b><?php echo ucwords($result['b_username']); ?></b>
								
								<?php 
	                    		$querytt = $model->__carpenter_withins('Interior Designer',$_GET['search']);  
							    if( $resultt = $model->fetch($querytt) ){
							     	do{ 
							     		$fafa=$resultt['builder_id'];$mama=($result['builder_id']);
							     		$rate=$result['AVG(t.rate)'];$user=$resultt['b_username'];$bID=$resultt['builder_id'];
                            			if($fafa==$mama){$got='1'; }
	                            	}while(($resultt = $model->fetch($querytt))&&$got=='0');
								} 
								if($got=='1'){ ?>
										
								     	<?php if($rate>=4&$rate<5){ ?>
					                      <p><img src="pictures/4.png" alt="post Image" style="height:30px; width:150px;float:left;"></p>
					                    <?php }else if($rate>=3&$rate<4){ ?>
					                      <p><img src="pictures/3.png" alt="post Image" style="height:30px; width:150px;float:left;"></p>
					                    <?php }else if($rate>=2&$rate<3){ ?>
					                      <p><img src="pictures/2.png" alt="post Image" style="height:30px; width:150px;float:left;"></p>
					                    <?php }else if($rate>=1&$rate<2){ ?>
					                      <p><img src="pictures/1.png" alt="post Image" style="height:30px; width:150px;float:left;"></p>
					                    <?php }else if($rate==5){ ?>
					                      <p><img src="pictures/5.png" alt="post Image" style="height:30px; width:150px;float:left;"></p>
								     	<br/>
								     	<?php }
	                        			?>
									<?php }else{ ?>
										
				                    <?php } ?>

								<br/><br/>
							
						<?php 
                            	}while($result = $model->fetch($query));
							} 
                        ?>
                    	</center>
                        </div>
                        <h4>
                        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        	&nbsp;
                        	Interior Designer(s) within <?php echo $_GET['search']; ?>
                        </h4><br/><br/>
                        <div class="col-md-1">
						<?php 
                    		$query = $model->__carpenter_withins('Interior Designer',$_GET['search']);  
						    if( $result = $model->fetch($query) ){
						     	do{
                    	?>

							
							<div class="well" style="border-radius:20px;">
							<img alt=" " class="okay" style="width:70px;height:70px;border:2px solid #d1cfcf;border-radius:20px;" src="architect pictures/<?php echo $result['builder_id']; ?>.jpg" />
							</div>
						
						<?php 
                            	}while($result = $model->fetch($query));
							} 
                        ?>
                        </div>
                        <div class="col-md-3">
						<?php 
                    		$query = $model->__carpenter_withins('Interior Designer',$_GET['search']);  
						    if( $result = $model->fetch($query) ){
						     	do{
                    	?>
                    		<div class="well" style="border-radius:20px;">
                    			<h5>
                    				<label style="color:#039391;"><?php echo ucwords($result['b_username']); ?></label> - <label style="font-size:10pt;"><?php
                    					$querying = $model->getExpertise($result['expertise_id']);  
									    if( $resulting = $model->fetch($querying) ){echo $resulting['expertise'];} 
                    				?></label>
                    			</h5>
								<label style="font-size:10pt;"><i> D e s i g n  S a m p l e s : 
					                <?php 
					                  $queryq = $model->count_interior_accomplished($result['builder_id']);  
					                    if( $resultq = $model->fetch($queryq) ){ 
					                      echo $resultq['count(ID_accomp_id)'];
					                    }
					                ?>
					              </i></label>
								<?php if(isset($_SESSION["userlogged"])){ ?>
							<!--a href="index.php?page=archi_page&architect=<?php echo $result['builder_id'];?>" class="view resw3">Read More</a-->
							<a href="index.php?page=homes&search=<?php echo $_GET['search'];?>&arch_thumbnail=<?php echo $result['builder_id'];?>" class="view resw3">Details</a>
						<?php }else{ ?>
							<a class="view resw3" href="#" data-toggle="modal" data-target="#myModal2">Details</a>
						<?php } ?>
						</div>
						<?php 
                            	}while($result = $model->fetch($query));
							} 
                        ?>
                        </div>
					<?php 
					}else if(isset($_GET['searchArchitect'])){
				?>
						<div class="col-md-2">
						<center>
						<h4>Ranking by Rating within <?php echo $_GET['searchArchitect']; ?></h4><br/>
						</center>
						<center>
						<?php 
                    		$query = $model->__carpenter_within('Architect',$_GET['searchArchitect']);  
						    if( $result = $model->fetch($query) ){
						     	do{ $got='0'; $rate=0.0; $user='';$bID=0; ?>
						<b><?php echo ucwords($result['b_username']); ?></b>
								
								<?php 
	                    		$querytt = $model->__carpenter_withins('Architect',$_GET['searchArchitect']);  
							    if( $resultt = $model->fetch($querytt) ){
							     	do{ 
							     		$fafa=$resultt['builder_id'];$mama=($result['builder_id']);
							     		$rate=$result['AVG(t.rate)'];$user=$resultt['b_username'];$bID=$resultt['builder_id'];
                            			if($fafa==$mama){$got='1'; }
	                            	}while(($resultt = $model->fetch($querytt))&&$got=='0');
								} 
								if($got=='1'){ ?>
										
								     	<?php if($rate>=4&$rate<5){ ?>
					                      <p><img src="pictures/4.png" alt="post Image" style="height:30px; width:150px;float:left;"></p>
					                    <?php }else if($rate>=3&$rate<4){ ?>
					                      <p><img src="pictures/3.png" alt="post Image" style="height:30px; width:150px;float:left;"></p>
					                    <?php }else if($rate>=2&$rate<3){ ?>
					                      <p><img src="pictures/2.png" alt="post Image" style="height:30px; width:150px;float:left;"></p>
					                    <?php }else if($rate>=1&$rate<2){ ?>
					                      <p><img src="pictures/1.png" alt="post Image" style="height:30px; width:150px;float:left;"></p>
					                    <?php }else if($rate==5){ ?>
					                      <p><img src="pictures/5.png" alt="post Image" style="height:30px; width:150px;float:left;"></p>
								     	<br/>
								     	<?php }
	                        			?>
									<?php }else{ ?>
										
				                    <?php } ?>

								<br/><br/>
							
						<?php 
                            	}while($result = $model->fetch($query));
							} 
                        ?>
                    	</center>
                        </div>
                        <h4>
                        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        	&nbsp;
                        	Architect(s) within <?php echo $_GET['searchArchitect']; ?>
                        </h4><br/><br/>
                        <div class="col-md-1">
						<?php 
                    		$query = $model->__carpenter_withins('Architect',$_GET['searchArchitect']);  
						    if( $result = $model->fetch($query) ){
						     	do{
                    	?>

							
							<div class="well" style="border-radius:20px;">
							<img alt=" " class="okay" style="width:70px;height:70px;border:2px solid #d1cfcf;border-radius:20px;" src="architect pictures/<?php echo $result['builder_id']; ?>.jpg" />
							</div>
						
						<?php 
                            	}while($result = $model->fetch($query));
							} 
                        ?>
                        </div>
                        <div class="col-md-3">
						<?php 
                    		$query = $model->__carpenter_withins('Architect',$_GET['searchArchitect']);  
						    if( $result = $model->fetch($query) ){
						     	do{
                    	?>
                    		<div class="well" style="border-radius:20px;font:Segoe UI;">
                    			<h5>
                    				<label style="color:#039391;"><?php echo ucwords($result['b_username']); ?></label> - <label style="font-size:10pt;"><?php
                    					$querying = $model->getExpertise($result['expertise_id']);  
									    if( $resulting = $model->fetch($querying) ){echo $resulting['expertise'];} 
                    				?></label>
                    			</h5>
								<label style="font-size:10pt;"><i> Accomplished : 
					                <?php 
					                  $queryq = $model->count_architect_accomplished($result['builder_id']);  
					                    if( $resultq = $model->fetch($queryq) ){ 
					                      echo $resultq['count(accomp_id)'];
					                    }
					                ?>
					              </i></label>
					              <label style="font-size:10pt;"><i> Design :
					              <?php 
					                $queryq = $model->count_architect_design($result['builder_id']);  
					                if( $resultq = $model->fetch($queryq) ){ 
					                  echo $resultq['count(design_id)'];
					                } 
					              ?>
					              </i></label>
								<?php if(isset($_SESSION["userlogged"])){ ?>
							<!--a href="index.php?page=archi_page&architect=<?php echo $result['builder_id'];?>" class="view resw3">Read More</a-->
							<a href="index.php?page=homes&searchArchitect=<?php echo $_GET['searchArchitect'];?>&arch_thumbnail=<?php echo $result['builder_id'];?>" class="view resw3">Details</a>
						<?php }else{ ?>
							<a class="view resw3" href="#" data-toggle="modal" data-target="#myModal2">Details</a>
						<?php } ?>
						</div>
						<?php 
                            	}while($result = $model->fetch($query));
							} 
                        ?>
                        </div>
				<?php 
				  	}
				  }else{
				?>
					<div class="col-md-6 w3layouts_about_grid_left">
						<div class="w3_about_grid">
							<img src="images/4.jpg" alt=" " class="img-responsive" />
						</div>
						<div class="col-md-6 w3layouts_about_grid_left1">
							<img src="images/1.jpg" alt=" " class="img-responsive" />
						</div>
						<div class="col-md-6 w3layouts_about_grid_left1">
							<img src="images/5.jpg" alt=" " class="img-responsive" />
						</div>
						<div class="clearfix"> </div>
					</div>
				<?php 
				  }
				  if(!isset($_GET['arch_thumbnail'])){
				?>

			<div class="col-md-6 w3layouts_about_grid_right">
				<center><h4 class="tittle_agile_w3">SELECT PROVINCE AND TOWN TO FIND AN ARCHITECT</h4></center>
				<div class="heading-underline">
					<div class="h-u1"></div>
					<div class="h-u2"></div>
					<div class="h-u3"></div>
					<div class="clearfix"></div>
				</div>
				<div class="w3layouts_about_grid_right_grids">
					<div class="w3layouts_about_grid_right_grid">
						
						<div class="col-xs-9 w3layouts_about_grid_right_grid1r">
							<b>Province</b>
							<p>
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
							</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3layouts_about_grid_right_grid">
						
						<div class="col-xs-9 w3layouts_about_grid_right_grid1r">
							<b>Municipality</b>
							<p>
								<div id="mun_div">
					                <select style="width:100%;height:45px;" name="municipality" id="municipalityz" disabled> 
					                    <option>--Select Municipality--</option>
					                </select>
					              </div>
							</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<center><h4 class="tittle_agile_w3">SELECT PROVINCE AND TOWN TO FIND AN INTERIOR DESIGNER</h4></center>
					<div class="heading-underline">
						<div class="h-u1"></div>
						<div class="h-u2"></div>
						<div class="h-u3"></div>
						<div class="clearfix"></div>
					</div>
					<div class="w3layouts_about_grid_right_grid">
						
						<div class="col-xs-9 w3layouts_about_grid_right_grid1r">
							<h4>Province</h4>
							<p>
								<select style="width:100%;height:45px;" name="provincess2" id="provincess2" onchange="filtered_municipality2()"> 
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
							</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<br/>
					<div class="w3layouts_about_grid_right_grid">
						
						<div class="col-xs-9 w3layouts_about_grid_right_grid1r">
							<h4>Municipality</h4>
							<p>
								<div id="div_mun">
					                <select style="width:100%;height:45px;" name="municipality2" id="municipalityz2" disabled> 
					                    <option>--Select Municipality--</option>
					                </select>
					              </div>
							</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
			<?php }else if(isset($_GET['arch_thumbnail'])&&isset($_GET['searchArchitect'])){ ?>

				<div class="col-md-6 w3layouts_about_grid_right" style="border:1px solid #e1e1e1;background-color:#f9f9f9;">
				<br/>
				<h3 class="tittle_agile_w3 why">
					Architect 
					<?php 
					$query = $model->archi_parameter($_GET['arch_thumbnail'],"Architect");  
				    if( $result = $model->fetch($query) ){
					?>
					<?php echo ucwords($result['b_username']); ?>
					<?php } ?>
				</h3>
			    <div class="heading-underline">
					<div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
				</div>
				<div class="well">
					<h3>Design Ideas(
						<?php 
						$queryq = $model->count_architect_design($_GET['arch_thumbnail']);  
	    					if( $resultq = $model->fetch($queryq) ){ 
	    						echo $resultq['count(design_id)'];
	    					}
						?> )
					</h3>

				</div>
				<?php
		            $querys = $model->architect_design($_GET['arch_thumbnail']);  //FROM MODEL
		            if( $results = $model->fetch($querys) ){ ?> 
					<div class="w3layouts_about_grid_right_grids">
						<div class="w3layouts_about_grid_right_grid">
							<?php include('thumbnails.php'); ?>
							<div class="clearfix"> </div>
						</div>
					</div>
				<?php }else{ ?>
				<div class="well">
					Nothing to show.
				</div>
				<?php } ?>
				<br/><br/>

				<div class="well">
					<h3>Accomplished Projects(
						<?php 
						$queryq = $model->count_architect_accomplished($_GET['arch_thumbnail']);  
	    					if( $resultq = $model->fetch($queryq) ){ 
	    						echo $resultq['count(accomp_id)'];
	    					}
						?> )
					</h3>
				</div>
				<?php
	            $querys = $model->architect_accomplished($_GET['arch_thumbnail']);  //FROM MODEL
	            if( $results = $model->fetch($querys) ){ ?>
				<div class="w3layouts_about_grid_right_grids">
					<div class="w3layouts_about_grid_right_grid">
						<?php include('thumbnails2.php'); ?>
						<div class="clearfix"> </div>
					</div>
				</div>
				<?php }else{ ?>
				<div class="well">
					Nothing to show.
				</div>
				<?php } ?>
				<br/><br/>
				<a href="index.php?page=archi_page&arch_thumbnail=<?php echo $_GET['arch_thumbnail'];?>" class="view resw3">View More</a>
				<br/><br/>
			</div>

			
			<div class="clearfix"> </div>
			<?php }else if(isset($_GET['arch_thumbnail'])&&isset($_GET['search'])){ ?>
			<div class="col-md-6 w3layouts_about_grid_right" style="border:1px solid #e1e1e1;background-color:#f9f9f9;">
				<h3 class="tittle_agile_w3 why">
					Interior Designer 
					<?php 
					$query = $model->archi_parameter($_GET['arch_thumbnail'],"Interior Designer");  
				    if( $result = $model->fetch($query) ){
					?>
					<?php echo ucwords($result['b_username']); ?>
					<?php } ?>
				</h3>
			    <div class="heading-underline">
					<div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
				</div>
				<div class="well">
					<h3>Designs Samples( <?php $queryq = $model->count_ID_design($_GET['arch_thumbnail']);
					 if( $resultq = $model->fetch($queryq) )
					 { echo $resultq['count(ID_accomp_id)']; } ?> )
					</h3>

				</div>
				<?php
		            $querys = $model->specific_interiorAccomplished($_GET['arch_thumbnail']);  //FROM MODEL
		            if( $results = $model->fetch($querys) ){ ?> 
					<div class="w3layouts_about_grid_right_grids">
						<div class="w3layouts_about_grid_right_grid">
							<?php include('thumbnailsID1.php'); ?>
							<div class="clearfix"> </div>
						</div>
					</div>
				<?php }else{ ?>
					<div class="well"> Nothing to show. </div>
				<?php } ?>
				<br/><br/>
				<a href="index.php?page=interior_page&arch_thumbnail=<?php echo $_GET['arch_thumbnail'];?>" class="view resw3">View More</a>
				<br/><br/>

				</div>
			<?php } ?>
			<br/><br/>
			<?php 
				  if(!isset($_GET['arch_thumbnail'])){
				?><div class="col-md-12 w3l-news">
				<center><label style="color:#a9acac;">__________Advertisements__________</label></center><br/>
				
					<?php include('advertisement.php'); ?>
				 <br/><br/>
			</div><?php } ?>
		</div>
	</div>
<!-- //about -->
<div class="why-choose-agile">
		<div class="container">
			<h3 class="tittle_agile_w3 two">Basic Services that Architects Do</h3>
			<div class="heading-underline">
				<div class="h-u1"></div>
				<div class="h-u2"></div>
				<div class="h-u3"></div>
				<div class="clearfix"></div>
			</div>
			<div class="why-choose-agile-grids-top">
				<div class="col-md-8 agileits-w3layouts-grid">

					<?php $querkd = $model->all_service();
	                  if( $quer2ks = $model->fetch($querkd) ){
	                    do{ ?>
						<div class="wthree_agile_us">
							<div class="col-xs-3 agile-why-text">
								<div class="wthree_features_grid">
									<i class="fa fa-laptop" aria-hidden="true"></i>
								</div>
							</div>
							<div class="col-xs-9 agile-why-text">
								<h4><?php echo $quer2ks['service_type']; ?></h4>
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

							<div class="clearfix"> </div>
						</div>
						<?php 
	                      }while($quer2ks = mysql_fetch_assoc($querkd)); 
	                    } 
	                  ?>
				</div>
				<div class="col-md-4 agileits-w3layouts-grid img">
					<img src="images/serve.png" alt=" " class="img-responsive" />
				</div>
				<div class="clearfix"> </div>
			</div>
			<h3 class="tittle_agile_w3 two">Here are Architect's Addiotional Services</h3>
			<div class="heading-underline">
				<div class="h-u1"></div>
				<div class="h-u2"></div>
				<div class="h-u3"></div>
				<div class="clearfix"></div>
			</div>
			<div class="why-choose-agile-grids-top">
				<div class="col-md-8 agileits-w3layouts-grid">

					<?php $querkd = $model->all_service2();
	                  if( $quer2ks = $model->fetch($querkd) ){
	                    do{ ?>
						<div class="wthree_agile_us">
							<div class="col-xs-3 agile-why-text">
								<div class="wthree_features_grid">
									<i class="fa fa-laptop" aria-hidden="true"></i>
								</div>
							</div>
							<div class="col-xs-9 agile-why-text">
								<h4><?php echo $quer2ks['service_type']; ?></h4>
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

							<div class="clearfix"> </div>
						</div>
						<?php 
	                      }while($quer2ks = mysql_fetch_assoc($querkd)); 
	                    } 
	                  ?>
				</div>
				<div class="col-md-4 agileits-w3layouts-grid img">
					<img src="images/serve.png" alt=" " class="img-responsive" />
				</div>

				<div class="clearfix"> </div>
			</div>

		</div>
	</div>	
<style>
  .okay:hover {
    opacity: 0.5;
    filter: alpha(opacity=50); 
  }
</style>
<script type="text/javascript">
	function findByProvince(){
	    var getVal=document.getElementById("province").value;
	    document.location.href="index.php?page=homes&search="+getVal
	}
	function findByMunicipality(){
	    var getVal=document.getElementById("municipality").value;
	    document.location.href="index.php?page=homes&search="+getVal
	}
	function CarpenterfindByProvince(){
	    var getVal=document.getElementById("province2").value;
	    document.location.href="index.php?page=homes&search="+getVal
	}
	function CarpenterfindByMunicipality(){
	    var getVal=document.getElementById("municipality2").value;
	    document.location.href="index.php?page=homes&search="+getVal
	}
	function ArchitectfindByProvince(){
	    var getVal=document.getElementById("a_province").value;
	    document.location.href="index.php?page=homes&searchArchitect="+getVal
	}
	function ArchitectfindByMunicipality(){
	    var getVal=document.getElementById("a_municipality").value;
	    document.location.href="index.php?page=homes&searchArchitect="+getVal
	}
	function ArchitectfindByProvince2(){
	    var getVal=document.getElementById("a_province2").value;
	    document.location.href="index.php?page=homes&searchArchitect="+getVal
	}
	function ArchitectfindByMunicipality2(){
	    var getVal=document.getElementById("a_municipality2").value;
	    document.location.href="index.php?page=homes&searchArchitect="+getVal
	}
</script>