
	<div class="services">
		<div class="container">
			<h3 class="tittle_agile_w3">Project Specs</h3>
			<div class="heading-underline">
				<div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
			</div>



	<?php if(!isset($_GET['id'])){ ?>
			<div class="col-md-8 single-left">
				<!-- I deleted something here-->
				

				<div class="leave-coment-form">
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
				      <br/><br/>		
					<div class="w3_single_submit">
						<input type="submit" name="postProj" value="Post Project" />
					</div>
						
					
					</form>
				</div>
			</div>
		<?php }else{ ?>
			<div class="col-md-8 single-left">
				<img src="ARCHITECT ADMIN/clientproject_img/<?php echo $_GET['id']; ?>.jpg" style="height:400px;width:80%;border:2px solid #d1cfcf;" alt=" " class="img-responsive" />
				<br/><br/>
				<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
					<?php $querkd = $model->bidders($_GET['id']);
	                  if( $quer2ks = $model->fetch($querkd) ){
	                    do{ ?>	
						  <div class="panel panel-default" style="border:1px solid #d1cfcf;">
							<div class="panel-heading" role="tab" id="headingOnez<?php echo $quer2ks['contractor_id']; ?>">
							  <h4 class="panel-title asd">
								<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOnez<?php echo $quer2ks['contractor_id']; ?>" aria-expanded="true" aria-controls="collapseOnez<?php echo $quer2ks['contractor_id']; ?>">
								  <span class="glyphicon glyphicon-user" aria-hidden="true"></span><i class="glyphicon glyphicon-user" aria-hidden="true"></i><?php echo $quer2ks['contractor_lname']; ?>, <?php echo $quer2ks['contractor_fname']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?php echo date("F jS, Y", strtotime($quer2ks['bid_date_responded'])); ?> )
								</a>
							  </h4>
							</div>
							<div id="collapseOnez<?php echo $quer2ks['contractor_id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOnez<?php echo $quer2ks['contractor_id']; ?>">
							  <div class="panel-body panel_text">
								<p><b>BID PROPOSED COST *</b></p><p> PHP <?php echo number_format($quer2ks['bid_cost']); ?></p>
								<p><b>BID DETAILS *</b></p><p><?php echo $quer2ks['bid_details']; ?></p>
							  </div>
							</div>
						  </div>
				  		<?php 
	                      }while($quer2ks = mysql_fetch_assoc($querkd)); 
	                    } 
	                  ?>
				 </div>	
				</div>
		<?php } ?>




			<div class="col-md-4 event-right wthree-event-right">
				<div class="event-right1 agileinfo-event-right1">
					<div class="search1 agileits-search1">
						
							
							
						
					</div>
					<div class="posts w3l-posts">
						<h4>Posted Projects</h4>
						<?php $querkd = $model->client_posted_projects();
		                  if( $quer2ks = $model->fetch($querkd) ){
		                    do{ ?>
							




								<div class="posts-grids w3-posts-grids">
									<div class="posts-grid w3-posts-grid">
										<div class="posts-grid-left w3-posts-grid-left">
											<a href="index.php?page=postProject&id=<?php echo $quer2ks['clientproject_id']; ?>"><img src="ARCHITECT ADMIN/clientproject_img/<?php echo $quer2ks['clientproject_id']; ?>.jpg" style="border:2px solid #d1cfcf;border-radius:20px;" alt=" " class="img-responsive okay" /></a>
										</div>
										<div class="posts-grid-right w3-posts-grid-right">
											<h4><a href="index.php?page=postProject&id=<?php echo $quer2ks['clientproject_id']; ?>"><?php echo $quer2ks['project_title']; ?></a></h4>
											
											<ul class="wthree_blog_events_list">

												<li><b>Bid Deadline Date : </b></li>
												<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo date("F jS, Y", strtotime($quer2ks['bid_deadline'])); ?></li>
												
											</ul>

											<ul class="wthree_blog_events_list">

												<li><b>Date Posted : </b></li>
												<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo date("F jS, Y", strtotime($quer2ks['project_date_posted'])); ?></li>
												
											</ul>
											<ul class="wthree_blog_events_list">
												<li><b>Bidders : </b><?php 
								                $queryq = $model->count_bidders($quer2ks['clientproject_id']);  
								                if( $resultq = $model->fetch($queryq) ){ ?>
												<span class="badge badge-primary">
													<?php echo $resultq['count(bid_id)']; ?>
										        </span>

									        <?php } ?></li>
											
									        </ul>
											</div>
										<div class="clearfix"> </div>
									</div>

								</div>  
								<?php 
		                      }while($quer2ks = mysql_fetch_assoc($querkd)); 
		                    } 
		                  ?>
						
					</div>
					<!--div class="tags tags1 w3layouts-tags">
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
					</div-->
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<style>
  .okay:hover {
    opacity: 0.5;
    filter: alpha(opacity=50); 
  }
</style>