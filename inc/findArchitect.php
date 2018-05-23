<div class="agile_inner_banner_info">
  <h2>Pick Your Location to Find Architect </h2>
  <a href="javascript:;" onclick="startCalculation()" class="view resw3"><i class="fa fa-search"><label style="font-family:Century Gothic;font-size;15pt;">&nbsp;&nbsp;&nbsp;&nbsp;F I N D&nbsp;&nbsp;&nbsp;&nbsp;N O W</label></i></a>
   <?php if(isset($_GET['architect_lat'])){ ?>
   <a style="font-size:11pt" href="index.php?page=viewOnMapArchitect" class="view resw3"><b><i class="fa fa-location-arrow"></i>&nbsp;&nbsp;&nbsp;&nbsp;VIEW on MAP</b></a>
    <?php }else{ ?>
    <?php } ?>
    <br/>
    <input style="font-family:Century Gothic;width: 10%" type="hidden" class="form-control" id="us2-radius2" />
    <input id="address"name="address" data-toggle="tooltip" data-placement="right" title="Address" style="font-family:Century Gothic;width: 100%;font-size:8pt;" type="hidden" class="form-control ttip"/>
    <input style="font-family:Century Gothic;width: 10%" type="hidden" class="form-control" id="us2-radius" />
    <input type="hidden" id="latitude"class="form-control" style="width: 250px" name="architect_latitude"/>
    <input type="hidden" id="longitude"class="form-control" style="width: 250px" name="architect_longitude"/>
    <br/>
      
      <center><div id="us2" style="width: 90%;height:400px;border:1px solid gray;border-radius:3px;"></div></center>

      <br/>
</div>
<div class="services">
    <?php if(isset($_GET['architect_lat'])){ ?>
                  <?php 
                    $fafang=$_GET['architect_lat'];$mamang=$_GET['architect_long'];
                    $querysv = $model->deletedumm();

                    $querk = $model->__list_Architect();

                    if( $quer2k = $model->fetch($querk) ){

                      do{$fafasko = $quer2k['b_latitude']; $mamasko = $quer2k['b_longitude'];
                      $earthRadius = 6372.797;
                      $dLatpa = deg2rad($fafasko-$fafang);
                      $dLngpa = deg2rad($mamasko-$mamang);
                      $atang = sin($dLatpa/2) * sin($dLatpa/2) +
                     cos(deg2rad($fafang)) * cos(deg2rad($fafasko)) *
                     sin($dLngpa/2) * sin($dLngpa/2);
                      $cee = 2 * atan2(sqrt($atang), sqrt(1-$atang));
                      $distansya = ($earthRadius * $cee)*1.60934;

                      $insang = 'Insert into tbl_dummy values(
                        NULL,
                        "'.$distansya.'",
                        "'.$quer2k['builder_id'].'",
                        1
                        ) ';

                      if(mysql_query($insang)){
                      }

                    }while($quer2k = mysql_fetch_assoc($querk)); } 
                    $querkd = $model->listDummy_Architect();
                      if( $quer2ks = $model->fetch($querkd) ){
                    ?>
    <div class="container">
             <h3 class="tittle_agile_w3">Showing Top 
                <?php $resulta = $model->count_listDummy_Architect();
                  if( $resultna = $model->fetch($resulta) ){ 
                    if($resultna['count(sh.builder_id)']>=10){
                      echo '10';
                    }else{echo $resultna['count(sh.builder_id)'];}
                    
                  } ?> Nearby Architect(s)
             </h3>
        <div class="heading-underline">
        <div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
      </div>
      <div class="w3_services_grids">
        
                <?php 
                  
                  do{
                ?>
              <div class="col-md-3 w3ls_team_grid">
                <div class="w3ls_team_grid1 hover15">
                  <figure>
                    <center>
                      <img alt=" " class="img-responsive" style="width:150px;height:150px;border:1px solid gray;" src="architect pictures/<?php echo $quer2ks['builder_id']; ?>.jpg" />
                    </center>
                  </figure>
                  <div class="w3ls_team_grid1_pos">
                    <ul class="social-icons">
                      <li><?php if(!isset($_SESSION['userlogged'])){ ?>
                <a class="view resw3" href="#" data-toggle="modal" data-target="#myModal2">Read More</a>
              <?php }else{ ?>
                <a class="view resw3" href="index.php?page=archi_page&architect=<?php echo $quer2ks['builder_id']; ?>" >Read More</a>
              <?php } ?></li>
                      <li><a href="#" class="icon icon-border home"></a></li>
                      <li><a href="#" class="icon icon-border search"></a></li>
                    </ul>
                  </div>
                </div>
                
                <h4><?php echo ucwords($quer2ks['b_username']); ?></h4>
                <div class="well">
                <p><i class="fa fa-user"></i>&nbsp;&nbsp;<?php $querying = $model->getExpertise($quer2ks['expertise_id']);  
                      if( $resulting = $model->fetch($querying) ){echo $resulting['expertise'];}  ?></p>
                <p><i class="fa fa-home"> </i>&nbsp;&nbsp; Accomplished Project : 
                <?php 
                  $queryq = $model->count_architect_accomplished($quer2ks['builder_id']);  
                    if( $resultq = $model->fetch($queryq) ){ 
                      echo $resultq['count(accomp_id)'];
                    }
                ?></p>
                <p>
                  <i class="fa fa-eye"> </i>&nbsp;&nbsp;Design Ideas :
                  <?php 
                    $queryq = $model->count_architect_design($quer2ks['builder_id']);  
                    if( $resultq = $model->fetch($queryq) ){ 
                      echo $resultq['count(design_id)'];
                    } 
                  ?>
                </p>
              </div>
              </div>
            <?php }while($quer2ks = mysql_fetch_assoc($querkd)); ?>
        <div class="clearfix"> </div>
      </div>
    </div>
    <?php }  ?>
          <?php }  ?>
  </div>



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

    function startCalculation(){
      var lati = document.getElementById("latitude").value;
      var longi = document.getElementById("longitude").value;
      var s_address = document.getElementById("address").value;
      //var r_km1=document.getElementById("radius_km").value;
      document.location.href="index.php?page=findArchitect&architect_lat="+lati+"&architect_long="+longi
    }
                  
    function checkPass() {
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



