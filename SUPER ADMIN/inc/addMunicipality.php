<div class="container-fluid">
    <div class="side-body">

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<div class="col-md-7">
							<form role="form" method="post">

								 <h3><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Form [ Municipality ]</h3>
								<br/>
					
								 <div class="form-group">
                                    <label>Province</label>&nbsp;&nbsp;<span style="color:red"> *</span>
                                    <br/>
                                    <select class="form-control" name="prov_id" required>
                                    <option value="0">Select Province *</option>  
                                    <?php
                                      $count=0;
                                      $query = $model->all_province();  //FROM MODEL
                                      if( $result = $model->fetch($query) ){
                                      do{
                                      $count++;
                                      ?> 
                                    <option value="<?php echo $result['prov_id']; ?>"><?php echo $result['name']; ?></option>
                                    <?php }while($result = $model->fetch($query));}?>
                                    </select>
                                </div>
								<div class="form-group">
									<label>Municipality Name </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input name="m_name"type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Zipcode </label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input name="zipcode_id"type="number" class="form-control" required>
								</div>
								
								
								 <!--div class="x_content bs-example-popovers">
                                      <div style="display: none" class="alert alert-dismissible fade in" role="alert">
                                        <span class="message"></span>
                                      </div>
                                 </div-->
								<!--button id="addNewBuilder"type="button" class="btn btn-success">&nbsp;&nbsp;Submit&nbsp;&nbsp;</button-->
								 <button name="addMunicipality"type="submit" class="btn btn-success">&nbsp;&nbsp;Submit&nbsp;&nbsp;</button>
									<br/><br/>
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
						</br/></br/></br/></br/></br/>
							<div class="card card-success">
                              
                                <div class="card-body no-padding">
                                	<div id="us2" style="font-family:Century Gothic;width: 100%; height: 300px;"></div>
                                    </br/>
                                    <!--div class="form-group">
									<label>Address</label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input id="address" name="s_address"type="text" class="form-control">
									</div-->
									<div class="form-group">
									<label>Latitude Coordinate</label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input id="latitude"name="lat"type="text" class="form-control" required>
									</div>
									<div class="form-group">
									<label>Longitude Coordinate</label>&nbsp;&nbsp;<span style="color:red"> *</span>
									<br/>
									<input id="longitude"name="long"type="text" class="form-control" required>
									</div>
									

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
