<form method="post">
  <div class="services">
    <div class="container">  
      <div class="col-md-4 w3layouts_about_grid_left">
        <div class="signin-form profile">
          <div class="login-form">
            <label style="font-size:10pt;float:left;color:#02a68d;">Salutation *&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
            <label style="font-size:10pt;float:left;">Mr.&nbsp;&nbsp;</label>
            <input type="radio" style="float:left;" name="title" value="Mr." required=""/><label style="font-size:10pt;float:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <label style="font-size:10pt;float:left;">Ms.&nbsp;&nbsp;</label>
            <input type="radio" style="float:left;" name="title" value="Ms." required=""/><label style="font-size:10pt;float:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <label style="font-size:10pt;float:left;">Mrs.&nbsp;&nbsp;</label>
            <input type="radio" style="float:left;" name="title" value="Mrs." required=""/><label style="font-size:10pt;float:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <label style="font-size:10pt;float:left;">Dr.&nbsp;&nbsp;</label>
            <input type="radio" style="float:left;" name="title" value="Dr." required=""/>
            <br/>
            <label style="font-size:10pt;float:left;color:#02a68d;">Firstname *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
            <input type="text" name="fname" required="">
            <label style="font-size:10pt;float:left;color:#02a68d;">Middlename *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
            <input type="text" name="mname">
            <label style="font-size:10pt;float:left;color:#02a68d;">Lastname *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
            <input type="text" name="lname" required="">
            <label style="font-size:10pt;float:left;color:#02a68d;">Phone Number *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
            <input type="text" name="phone" required="">
            <label style="font-size:10pt;float:left;color:#02a68d;">Email Address *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
            <input type="email" name="email" required="">
            <label style="font-size:10pt;float:left;color:#02a68d;">Date of Birth *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
            <input type="date" name="birthdate" style="width:100%;height:45px;" required=""><br/>
          </div>
        </div>
      </div>
      <div class="col-md-4 w3layouts_about_grid_right">
        <div class="signin-form profile">
            <div class="login-form">
                
                <label style="font-size:10pt;float:left;color:#02a68d;">Gender *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <label style="font-size:10pt;float:left;">Male&nbsp;&nbsp;</label>
                <input type="radio" style="float:left;" name="gender" value="Male" required=""/><label style="font-size:10pt;float:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <label style="font-size:10pt;float:left;">Female&nbsp;&nbsp;</label>
                <input type="radio" style="float:left;" name="gender" value="Female" required=""/>
                <br/>
                
                <label style="font-size:10pt;float:left;color:#02a68d;">Latitude Coordinates *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <input type="text" name="latitude" id="latitude" required="">
                <label style="font-size:10pt;float:left;color:#02a68d;">Longitude Coordinates *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <input type="text" name="longitude" id="longitude" required="">
                <label style="font-size:10pt;float:left;color:#02a68d;">Username *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <input type="text" name="username" required="">
                <label style="font-size:10pt;float:left;color:#02a68d;">Password *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <input type="password" name="password" id="pass1" required="">
                <label style="font-size:10pt;float:left;color:#02a68d;">Confirm Password *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <input type="password" name="cpassword" id="pass2" onkeyup="checkPass(); return false;" required>
                <input type="submit" name="signupbutton" value="Sign Up">
            </div>
            
        </div>
      </div>
      <div class="col-md-4 w3layouts_about_grid_right">
        <div class="signin-form profile">
            <div class="login-form">
                <label style="font-size:10pt;float:left;color:#02a68d;">Address *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <br/>
                <input type="text" name="address" id="address" required="">
                <label style="font-size:10pt;float:left;color:#02a68d;">Scope of Location Coordinates (radius) *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                <input type="text" name="radius" id="us2-radius" required="">
              <div id="us2" style="width: 100%; height: 300px;"></div>
              <p id="confirmMessage">By clicking Sign Up, I agree to your terms</p>
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


                    
      function checkPass()
      {
          var pass1 = document.getElementById('pass1');
          var pass2 = document.getElementById('pass2');
          var message = document.getElementById('confirmMessage');
          var goodColor = "#66cc66";
          var badColor = "#ff6666";
          if(pass1.value == pass2.value){
              //The passwords match. 
              //Set the color to the good color and inform
              //the user that they have entered the correct password 
              //pass2.style.backgroundColor = goodColor;
              message.style.color = goodColor;
              message.innerHTML = "Passwords Match!"
          }else{
              //The passwords do not match.
              //Set the color to the bad color and
              //notify the user.
              //pass2.style.backgroundColor = badColor;
              message.style.color = badColor;
              message.innerHTML = "Passwords Do Not Match!"
          }
      }  
  </script>
</form>