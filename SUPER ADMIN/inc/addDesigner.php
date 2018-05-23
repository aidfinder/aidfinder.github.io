<div class="container-fluid">
    <div class="side-body">

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<div class="col-md-7">
							<form role="form" method="post">

								<h3>Designer's Information&nbsp;&nbsp;<span style="color:red"> *</span></h3>
								<br/>
					
								<div class="form-group">
									<label>Last Name </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input name="b_lname" type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>First Name </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input name="b_fname"type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Middle Name </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input name="b_mname"type="text" class="form-control">
								</div>
								<div class="form-group">
									<label>Type</label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<select name="b_type"class="form-control" required>
										<option value="Interior Designer">Interior Designer</option>
										<option value="Architect">Architect</option>
										
									</select>
								</div>
								<div class="form-group">
									<label>Birthdate </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input name="b_birthdate"type="date" class="form-control" required>
								</div>								
								<div class="form-group">
									<label>Gender</label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<select name="b_gender"class="form-control" required>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										
									</select>
								</div>
							
								<h3>Conctact Information&nbsp;&nbsp;<span style="color:red"> *</span></h3>
								<br/>
								<div class="form-group">
									<label>Phone # </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input name="b_contact_no"type="number" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Email Address </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input name="b_email"type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Username </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input name="b_username"type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Password </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input name="b_password"type="password" class="form-control" required>
								</div>
								
								 <!--div class="x_content bs-example-popovers">
                                      <div style="display: none" class="alert alert-dismissible fade in" role="alert">
                                        <span class="message"></span>
                                      </div>
                                 </div-->
								<!--button id="addNewBuilder"type="button" class="btn btn-success">&nbsp;&nbsp;Submit&nbsp;&nbsp;</button-->
								<button name="addNewBuilder"type="submit" class="btn btn-success">&nbsp;&nbsp;Submit&nbsp;&nbsp;</button>
								
								 
							</div>
						</br/></br/></br/></br/></br/>
							<div class="card card-success">
                              
                                <div class="card-body no-padding">
                                	<div id="us2" style="font-family:Century Gothic;width: 100%; height: 300px;"></div>
                                    </br/>
                                    <div class="form-group">
									<label>Address</label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input id="address" name="b_address"type="text" class="form-control" required>
									</div>
									<div class="form-group">
									<label>Latitude Coordinate</label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input id="latitude"name="b_latitude"type="text" class="form-control" required>
									</div>
									<div class="form-group">
									<label>Longitude Coordinate</label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input id="longitude"name="b_longitude"type="text" class="form-control" required>
									</div>
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

                                </div>
                            </div>
								
							
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
