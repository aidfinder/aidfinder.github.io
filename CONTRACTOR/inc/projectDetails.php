<div id="content">
			<?php
                $query = $model->project_details($_GET['id']);  //FROM MODEL
                if( $result = $model->fetch($query) ){
            ?>
			<div id="content-header">
				<div id="breadcrumb">
				<a href="admin.php?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">Project Details</a>
			</div>
                <h1><?php echo $result['project_title']; ?></h1>
			</div>
			
			<div class="container-fluid">

				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-th-list"></i>
								</span>
								<h5>Project Description</h5>
							</div>
							<div class="widget-content">
								<?php echo $result['project_description']; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-th-list"></i>
								</span>
								<h5>Project Design</h5>
							</div>
							<div class="widget-content">
								<img src="../ARCHITECT ADMIN/clientproject_img/<?php echo $result['clientproject_id']; ?>.jpg" alt="" >
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-th-list"></i>
								</span>
								<h5>More Details</h5>
							</div>
							<div class="widget-content">
								<div class="accordion" id="collapse-group">
		                            <div class="accordion-group widget-box">
		                                <div class="accordion-heading">
		                                    <div class="widget-title">
		                                        <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
		                                            <span class="icon"><i class="icon-info-sign"></i></span><h5>Project Specifications</h5>
		                                        </a>
		                                    </div>
		                                </div>
		                                <div class="collapse in accordion-body" id="collapseGOne">
		                                	<div class="widget-content">
		                                        <label style="font-size:10pt;float:left;color:#02a68d;"><b>CLASSIFICATION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<i class="icon-hdd"></i>&nbsp;
		                                        	<?php
										                $querysubcat = $model->subcategory_parameter($result['subcat_id']);  //FROM MODEL
										                if( $resultsubcat = $model->fetch($querysubcat) ){
										            		echo $resultsubcat['subcategory'];
											            } ?>
											        </b>
		                                        </label><br/>
                							</div>
                							<div class="widget-content">
		                                        <label style="font-size:10pt;float:left;color:#02a68d;"><b>SPECIALIZATION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<i class="icon-hdd"></i>&nbsp;
		                                        	<?php
										                $querysubcat = $model->specialization_parameter($result['specialization_id']);  //FROM MODEL
										                if( $resultsubcat = $model->fetch($querysubcat) ){
										            		echo $resultsubcat['specialization'];
											            } ?>
											        </b>
		                                        </label><br/>
                							</div>
		                                    <div class="widget-content">
		                                        <label style="font-size:10pt;float:left;color:#02a68d;"><b>ESTIMATED COST &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<i class="icon-briefcase"></i>&nbsp;
		                                        	Php
		                                        		<?php $splitter=explode("-",$result['project_estimated_cost']); 
		                                        			  $from=0;$to=0;
		                                        			  $from=$splitter[0];$to=$splitter[1];
		                                        			  $from_numberformat=number_format($from);
		                                        			  $to_numberformat=number_format($to);
		                                        			  echo $from_numberformat;
		                                        		?>
		                                        		-
		                                        		<?php echo $to_numberformat; ?>
		                                        	</b>
		                                        </label><br/>
                							</div>
                							<div class="widget-content">
		                                        <label style="font-size:10pt;float:left;color:#02a68d;"><b>PROJECT LOCATION :&nbsp;<i class="icon-map-marker"></i>&nbsp;
		                                        	<?php 
										  				$province='';$municipality='';$barangay='';
										  				$barangayID=0;
										  				$barangayID=$result['barangay_id']; 
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
											        </b>
		                                        </label><br/>
                							</div>
                							<div class="widget-content">
		                                        <label style="font-size:10pt;float:left;color:#02a68d;"><b>BID DEADLINE DATE &nbsp;:&nbsp;<i class="icon-calendar"></i>&nbsp;
		                                        	<?php echo date("F jS, Y", strtotime($result['bid_deadline'])); ?>
											        </b>
		                                        </label><br/>
                							</div>
                							<div class="widget-content">
		                                        <label style="font-size:10pt;float:left;color:#02a68d;"><b>DATE POSTED&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<i class="icon-calendar"></i>&nbsp;
		                                        	<?php echo date("F jS, Y", strtotime($result['project_date_posted'])); ?>
											        </b>
		                                        </label><br/>
                							</div>
		                                </div>
		                            </div> 
		                            <div class="accordion-group widget-box">
		                                <div class="accordion-heading">
		                                    <div class="widget-title">
		                                        <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse">
		                                            <span class="icon"><i class="icon-user"></i></span><h5>Contact Person</h5>
		                                        </a>
		                                    </div>
		                                </div>
		                                <div class="collapse accordion-body" id="collapseGTwo">
		                                	<?php
								                $queryuser = $model->user_parameter($result['user_id']);  //FROM MODEL
								                if( $resultuser = $model->fetch($queryuser) ){ ?>
			                                    <div class="widget-content">
			                                        <label style="font-size:10pt;float:left;color:#02a68d;">
			                                        	<b>&nbsp;&nbsp;&nbsp;&nbsp;
			                                        		<?php echo $resultuser['user_fname']; ?> <?php echo $resultuser['user_lname']; ?>
			                                        	</b>
			                                        </label><br/>
			                                    </div>
			                                    <div class="widget-content">
			                                        <label style="font-size:10pt;float:left;color:#02a68d;">
			                                        	<b>&nbsp;&nbsp;&nbsp;&nbsp;
			                                        		<?php echo $resultuser['user_address']; ?>
			                                        	</b>
			                                        </label><br/>
			                                    </div>
			                                    <div class="widget-content">
			                                        <label style="font-size:10pt;float:left;color:#02a68d;">
			                                        	<b>&nbsp;&nbsp;&nbsp;&nbsp;
			                                        		<?php echo $resultuser['user_email']; ?>
			                                        	</b>
			                                        </label><br/>
			                                    </div>
			                                    <div class="widget-content">
			                                        <label style="font-size:10pt;float:left;color:#02a68d;">
			                                        	<b>&nbsp;&nbsp;&nbsp;&nbsp;
			                                        		<?php echo $resultuser['user_contact']; ?>
			                                        	</b>
			                                        </label><br/>

			                                    </div>
		                                    <?php } ?>
		                                </div>
		                            </div>
		                            <div class="accordion-group widget-box">
		                                <div class="accordion-heading">
		                                    <div class="widget-title">
		                                        <a data-parent="#collapse-group" href="#collapseGThree" data-toggle="collapse">
		                                            <span class="icon"><i class="icon-list-alt"></i></span><h5>Your Response to the Bidding Invitation</h5>
		                                        </a>
		                                    </div>
		                                </div>
		                                <div class="collapse accordion-body" id="collapseGThree">
		                                	
			                                    <div class="widget-content">
			                                        <!--div class="control-group">
										                <label class="control-label">Bid Cost *</label>
										                <div class="controls">
										                  <input type="text" onkeypress="return isNumber(event)" class="span11" name="bid_cost" placeholder="Bid Cost" required/>
										                </div>
										            </div>
										            <div class="control-group">
										                <label class="control-label">Bid Description *</label>
										                <div class="controls">
										                  <textarea name="bid_details" class="span11" required></textarea>
										                </div>
										            </div>
										            <button type="submit" name="submit_bid" class="btn btn-info btn-large">Submit Bid</button-->
										            <div id="upload-wrapper">
									                  <div align="center">
									                  <h4>Upload Bidding Proposal Document</h4>
											            <form action="ajax_upload/processupload.php" method="post" enctype="multipart/form-data" id="MyUploadForm">
										                  <?php 
															$queryBid = $model->biddingMaxID(); 
															if( $resultBid = $model->fetch($queryBid) ){
															?>
															<input type="hidden" value="<?php echo $resultBid['max(t.bid_id)+1']; ?>" name="filename" id="filename"/>

															<?php 
															    }
															?>
														<input name="FileInput" id="FileInput" type="file" />
														<input name="myID" id="myID" type="hidden" value="<?php echo $_SESSION['contractorlogged']['contractor_id']; ?>"/>
														<input name="projectID" id="projectID" type="hidden" value="<?php echo $_GET['id']; ?>"/>
										                  
										                  <input type="submit"  id="submit-btn" value="Upload"/>
										                  <img src="ajax_upload/images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
										                 </form>
										                 <div id="progressbox" ><div id="progressbar"></div ><div id="statustxt">0%</div></div>
                  											<div id="output" class="message"></div>
									                 	</div>
		                                			</div>
			                                    </div>
		                                </div>
		                            </div> 
		                        </div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<?php } ?>
		</div>
		<script type="text/javascript">
			function isNumber(evt){
		      evt = (evt) ? evt : window.event;
		      var charCode = (evt.which) ? evt.which : evt.keyCode;
		      if (charCode > 31 && (charCode < 48 || charCode > 57)){
		        return false;
		      }
		      return true;
		    }
		</script>