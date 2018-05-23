<div class="container-fluid">
    <div class="side-body">

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<div class="col-md-7">
							<form role="form" method="post">

								<h3>Update Interior Designer Information&nbsp;&nbsp;<span style="color:red"> *</span></h3>
								<br/>
								<?php
                                $count=0;
                                $query = $model->all_listInterior();  //FROM MODEL
                                if( $result = $model->fetch($query) ){
                                do{
                                $count++;
                                ?>

                                <br/>
								<?php if(isset($_POST['error']['exist'])){ ?>
                                <div class="alert alert-warning">                            
                                  <strong>OOOPss!</strong> <?php echo $_POST['error']['exist']; ?>
                                </div>
                                  <?php }else if(isset($_POST['ok'])){ ?>
                                <div class="alert alert-success">                           
                                  <strong>Well done!</strong> <?php echo $_POST['ok']; ?>
                                </div>
                                <?php } ?>
								<div class="form-group">
									<label>Last Name </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input value="<?php echo $result['b_lname']; ?>"name="b_lname" type="text" class="form-control">
									<input value="<?php echo $result['builder_id']; ?>" type="hidden" name="proID"  />
								</div>
								<div class="form-group">
									<label>First Name </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input value="<?php echo $result['b_fname']; ?>"name="b_fname"type="text" class="form-control">
								</div>
								<div class="form-group">
									<label>Middle Name </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input value="<?php echo $result['b_mname']; ?>"name="b_mname"type="text" class="form-control">
								</div>
								<div class="form-group">
									<label>Type</label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<select value="<?php echo $result['b_type']; ?>"name="b_type"class="form-control" disabled>
								
										<option value="Interior Designer">Interior Designer</option>
										
									</select>
								</div>
								<div class="form-group">
									<label>Birthdate </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input value="<?php echo $result['b_birthdate']; ?>"name="b_birthdate"type="date" class="form-control" disabled>
								</div>								
								
								<h3>Conctact Information&nbsp;&nbsp;<span style="color:red"> *</span></h3>
								<br/>
								<div class="form-group">
									<label>Phone # </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input value="<?php echo $result['b_contact']; ?>"name="b_contact"type="number" class="form-control">
								</div>
								<div class="form-group">
									<label>Email Address </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input value="<?php echo $result['b_email']; ?>"name="b_email"type="text" class="form-control">
								</div>
								<!--div class="form-group">
									<label>Username </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input name="b_username"type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Password </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input name="b_password"type="password" class="form-control" required>
								</div-->
								
								 <!--div class="x_content bs-example-popovers">
                                      <div style="display: none" class="alert alert-dismissible fade in" role="alert">
                                        <span class="message"></span>
                                      </div>
                                 </div-->
								<!--button id="addNewBuilder"type="button" class="btn btn-success">&nbsp;&nbsp;Submit&nbsp;&nbsp;</button-->
								<button name="editInterior"type="submit" class="btn btn-success">&nbsp;&nbsp;Save Changes&nbsp;&nbsp;</button>
								
								 
							</div>
						</br/></br/></br/></br/></br/>
							<div class="card card-success">
                              
                                <div class="card-body no-padding">
                                	<div id="us2" style="font-family:Century Gothic;width: 100%; height: 300px;"></div>
                                    </br/>
                                    <div class="form-group">
									<label>Address</label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input id="address" value="<?php echo $result['b_address']; ?>"name="b_address"type="text" class="form-control" disabled>
									</div>
									<div class="form-group">
									<label>Latitude Coordinate</label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input id="latitude" value="<?php echo $result['b_latitude']; ?>" name="b_latitude"type="text" class="form-control" disabled>
									</div>
									<div class="form-group">
									<label>Longitude Coordinate</label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input id="longitude" value="<?php echo $result['b_longitude']; ?>" name="b_longitude"type="text" class="form-control" disabled>
									</div>
									

                                </div>
                            </div>
								
							<?php 
                            }while($result = $model->fetch($query));
                            } 
                            ?>
						</form>

					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->

<script>
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (p) {
                    //var LatLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
                    $('#us2').locationpicker({
                      location: {
                          latitude: p.coords.latitude,
                          longitude: p.coords.longitude
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
                });
            } else {
                alert('Geo Location feature is not supported in this browser.');
            }

</script>
