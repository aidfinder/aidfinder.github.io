<!--form method="post" enctype="multipart/form-data"-->
  <div class="services">
    <div class="container">  
      <div class="col-md-6 w3layouts_about_grid_right">
        <div class="signin-form profile">
            <div class="login-form">
                <!--label style="font-size:10pt;float:left;color:#02a68d;">Your Account Picture *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <div class="fileupload fileupload-new" data-provides="fileupload">         
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input name="imgss"type="file" required></span>
                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div-->
                <label style="font-size:10pt;float:left;color:#02a68d;">Expertise *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <div>
                  <p>
                  <select style="width:100%;height:45px;" id="expertise_id">
                    <?php 
                        $query = $model->__all_expertise('Architect');  
                        if( $result = $model->fetch($query) ){
                          do{ ?>
                              <option value="<?php echo $result['expertise_id'];?>"><?php echo $result['expertise'];?></option>
                              <?php 
                              }while($result = $model->fetch($query));
                          } 
                          ?>
                  </select>
                  </p>
                </div>

                <label style="font-size:10pt;float:left;color:#02a68d;">Gender *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <div>
                  <p>
                  <select style="width:100%;height:45px;" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  </p>
                </div>
                <!--label style="font-size:10pt;float:left;color:#02a68d;">Gender *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                    <label style="font-size:10pt;float:left;">Male&nbsp;&nbsp;</label>
                    <input type="radio" style="float:left;" id="gender" value="Male"/><label style="font-size:10pt;float:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <label style="font-size:10pt;float:left;">Female&nbsp;&nbsp;</label>
                    <input type="radio" style="float:left;" id="gender" value="Female"/-->
                    <br/>
                <label style="font-size:10pt;float:left;color:#02a68d;">Firstname *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <input type="text" id="fname">
                <label style="font-size:10pt;float:left;color:#02a68d;">Middlename *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <input type="text" id="mname">
                <label style="font-size:10pt;float:left;color:#02a68d;">Lastname *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <input type="text" id="lname">
                <label style="font-size:10pt;float:left;color:#02a68d;">Date of Birth *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <input type="date" id="birthdate" style="width:100%;height:45px;"><br/>
                <label style="font-size:10pt;float:left;color:#02a68d;">Phone Number *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <input type="text" id="phone">
                <label style="font-size:10pt;float:left;color:#02a68d;">Username *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <input type="text" id="username">
                <label style="font-size:10pt;float:left;color:#02a68d;">Email Address *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <input type="email" id="email">
                <input type="submit" id="archi_signupbutton" value="Sign Up"/><!--Sign Up</button-->
            </div>
            
        </div>
      </div>
      <div class="col-md-6 w3layouts_about_grid_right">
        <div class="signin-form profile">
            <div class="login-form">
                <!-- ?php $archiID=0;
                  $query = $model->getArchiID();  
                  if( $result = $model->fetch($query) ){
                    $archiID=$result['max(builder_id)+1'];
                   }else{
                      $archiID=1;
                   } ?>
                <input type="hidden" id="archi_id" value="<?php echo $archiID; ?>"-->
                <input type="hidden" id="type" value="Architect">
                <label style="font-size:10pt;float:left;color:#02a68d;">Address *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <br/>
                <input type="text" style="font-size:8pt;" name="address" id="address">
                <div id="us2" style="width: 100%; height: 300px;"></div>
                <label style="font-size:10pt;float:left;color:#02a68d;">Latitude Coordinates *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <input type="text" name="latitude" id="latitude">
                <label style="font-size:10pt;float:left;color:#02a68d;">Longitude Coordinates *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <input type="text" name="longitude" id="longitude">
                <!--label style="font-size:10pt;float:left;color:#02a68d;">Scope of Location Coordinates (radius) *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/-->
                <input type="hidden" name="radius" id="us2-radius">
                
                <label style="font-size:10pt;float:left;color:#02a68d;">Password *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <input type="password" name="password" id="pass1">
                <label style="font-size:10pt;float:left;color:#02a68d;">Confirm Password *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <input type="password" name="cpassword" id="pass2" onkeyup="checkPass(); return false;">
                <div class="alert alert-success" role="alert">
                  <p id="confirmMessage" class="message">By clicking Sign Up, I agree to your terms</p>
                </div>
              
            </div>
            
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
              //  if (navigator.geolocation) {
          //navigator.geolocation.getCurrentPosition(function (p) {
              //var LatLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
              $('#us2').locationpicker({ 
                location: {
                    latitude: 6.943763,
                    longitude: 126.246748
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
          //});
     // } else {
         // alert('Geo Location feature is not supported in this browser.');
     // }


                    
      
  </script>
<!--/form-->