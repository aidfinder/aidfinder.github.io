<script type="text/javascript">
	$(document).ready(function () {
	    $("#button").click(function () {
	        //Check boxes
	        $("input:checkbox[name=choices]:checked").each(function() {
	            console.log("Checkbox: " + $(this).val());
	        });
	        
	        // Radios
	        $(".rad:checked").each(function() {
	            console.log("Radio: " + $(this).val());
	        });
	    });
	    
	    $(".rad[name=None]").click(function() {
	        $(".rad").removeAttr("checked");
	    });
	})
</script>

<form method="post">

<div class="services">
   <div class="container">	
   	<div class="w3l-news-content events">
	<div class="container">
		
		<h3 class="tittle_agile_w3">Architect with Services</h3>
		
		<div class="heading-underline">
			<div class="h-u1"></div>
			<div class="h-u2"></div>
			<div class="h-u3"></div>
			<div class="clearfix"></div>
		</div>
		<div class="w3l-news_info_agile_its">
			<div class="col-md-6 w3l-news">
				<?php 
	        		$query = $model->__architectlist();  
				    if( $result = $model->fetch($query) ){
				     	do{
	        	?>
				<div class="media response-info">
					<div class="media-left response-text-left">
						<a href="#" data-toggle="modal" data-target="#myModals<?php echo $result['builder_id']; ?>">
					<img class="media-object" src="architect pictures/<?php echo $result['builder_id']; ?>.jpg" alt="">
				</a>
					</div>
					<div class="media-body response-text-right">
						<h5><?php echo $result['b_fname']; ?> <?php echo $result['b_lname']; ?></h5>
						
						<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingTwo<?php echo $result['builder_id']; ?>">
							  <h4 class="panel-title asd">
								<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo<?php echo $result['builder_id']; ?>" aria-expanded="false" aria-controls="collapseTwo<?php echo $result['builder_id']; ?>">
								  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>About
								</a>
							  </h4>
							</div>
							<div id="collapseTwo<?php echo $result['builder_id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo<?php echo $result['builder_id']; ?>">
							   <div class="panel-body panel_text">
								<ul>
									<li><i class="fa fa-calendar" aria-hidden="true"></i>May 17, 2017</li>
									<li><i class="fa fa-users" aria-hidden="true"></i>Reviews : 3</li>
								</ul>
								<p><?php echo $result['b_address']; ?></p>
								<div class="read">
									<?php if(isset($_SESSION['userlogged'])){?>
									<a href="index.php?page=archi_page&architect=<?php echo $result['builder_id']; ?>" class="view resw3">Read More</a>
									<?php }else{ ?>
									<a class="view resw3" href="#" data-toggle="modal" data-target="#myModal2">Read More</a>
									<?php } ?>
								</div>
							  </div>
							</div>
						  </div>
						  <div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingThree<?php echo $result['builder_id']; ?>">
							  <h4 class="panel-title asd">
								<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree<?php echo $result['builder_id']; ?>" aria-expanded="false" aria-controls="collapseThree<?php echo $result['builder_id']; ?>">
								  <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Request Service
								</a>
							  </h4>
							</div>
							<div id="collapseThree<?php echo $result['builder_id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree<?php echo $result['builder_id']; ?>">
								<div class="read">
									<?php $querkd = $model->all_service();
					                  if( $quer2ks = $model->fetch($querkd) ){
					                    do{ ?>
							  				<input type="checkbox" class="serviceID" name="serviceID" value="<?php echo $quer2ks['service_id']; ?>"   />  &nbsp;<?php echo $quer2ks['service_type']; ?><br />
							  			<?php 
					                      }while($quer2ks = mysql_fetch_assoc($querkd)); 
					                    } 
					                  ?>
								  	<br/><br/>
									<?php if(isset($_SESSION['userlogged'])){?>
									<a href="#" onclick="getValue(<?php echo $result['builder_id']; ?>);return false;" class="view resw3">Request</a>
									<?php }else{ ?>
									<a class="view resw3" href="#" data-toggle="modal" data-target="#myModal2">Read More</a>
									<?php } ?>
								</div>
							</div>
						  </div>

						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<?php 
	                	}while($result = $model->fetch($query));
					} 
	            ?>
				<div class="clearfix"> </div>
			</div>
			<?php if(isset($_GET['architect'])){?>
			<div class="col-md-6 w3l_about_bottom_right">
				 <h3 class="tittle_agile_w3 why"><?php 
	        		$query = $model->archi_parameter($_GET['archiID'],"Architect");  
				    if( $result = $model->fetch($query) ){
	        		?>
	        		Architect <?php echo $result['b_fname']; ?> <?php echo $result['b_lname']; ?>
	        		<?php } ?>
	        	</h3>
			    <div class="heading-underline">
					<div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
				</div>
			</div>

			<?php } ?>


			<?php if(isset($_GET['archiID'])){?>
			<div class="col-md-6 w3l_about_bottom_right">
				 <h4 class="tittle_agile_w3 why"><?php 
	        		$query = $model->archi_parameter($_GET['archiID'],"Architect");  
				    if( $result = $model->fetch($query) ){
	        		?>
	        		Architect <?php echo $result['b_fname']; ?> <?php echo $result['b_lname']; ?>
	        		<?php } ?>
	        	</h4>
			    <div class="heading-underline">
					<div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
				</div>
				
				<input type="hidden" name="b_id" value="<?php echo $_GET['archiID']; ?>"/>
						<label style="font-size:12pt;float:left;color:#02a68d;">Type of Building *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/><br/>
            			<select name="buildCat" id="buildCat" onchange="filtered_type()" style="width:100%;height:45px;" required="">
            				<option>Select Building Category</option>
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
            			<label style="font-size:12pt;float:left;color:#02a68d;">Building Subcategory *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/><br/>
            			<div id="subcat_div">
	            			<select name="subcat" style="width:100%;height:45px;" required="" disabled>
	            				<option>Select Sub Category</option>
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
            			<input type="hidden" id="mgaid" name="mgaid" value="<?php echo $_GET['services']; ?>"/>
            			<label style="font-size:12pt;float:left;color:#02a68d;">Request Details *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/><br/>
            			<textarea style="width:100%;height:200px;" name="details" placeholder="Mention the details or the actual services you want to be delivered to you." required=""></textarea>
					  	<br/><br/>
					  	<input type="submit" name="requestbutton" style="background-color:#01a990;border:none;width:100%;height:45px;border-radius:3px;color:white;" value="Submit Request"/>
						
			</div>
	<?php } ?>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<script type="text/javascript">

	function getValue(arID){

		var value = document.getElementsByClassName('serviceID');
		var str=''
		for(i=0;i<5;i++){
			if(value[i].checked===true){
				str+=value[i].value+",";
			}
		}
		//if( $(this).is(':checked') ){
		//	$('#mgaid').val( $('#mgaid').val()+value+"," );
		//}else{
		//	var newDa = $('#mgaid').val().replace(value+',',"");
			//$('#mgaid').val( newDa );
		//}
		//$('#mgaid').val( str );
		document.location.href="index.php?page=archi_services&archiID="+arID+"&services="+str
		//alert(arID);
		
		//$('#Totalcost').html(tots);
	}
</script>


<!--accordion here--> 
<!--div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
  
  <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="headingTwo">
	  <h4 class="panel-title asd">
		<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Reviews
		</a>
	  </h4>
	</div>
	<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
	   <div class="panel-body panel_text">
		Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia.
	  </div>
	</div>
  </div>
  <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="headingThree">
	  <h4 class="panel-title asd">
		<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
		  <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Request Architect
		</a>
	  </h4>
	</div>
	<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
		<form method="post">
			<input type="hidden" name="b_id" value="<?php echo $_GET['archiID']; ?>"/>
			<input type="text" id="mgaid" name="mgaid" value="2"/>
		   <div class="panel-body panel_text">
			 </div>
		</form>
	</div>
  </div>

</div-->
<!--accordion here--> 