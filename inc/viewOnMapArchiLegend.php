         <script type="text/javascript">
    var markers = [

          

        <?php 
            $countingPaMore=0;
            $queryNapud = $model->count_listDummy_Architect();
            if( $resultNapud = $model->fetch($queryNapud) ){
                $countingPaMore=$resultNapud['count(sh.builder_id)'];
            }
           //$queryq = $model->listDummy_Architect();
           // if( $resultq = $model->fetch($queryq) ){
            $latdq=0.0;$longdq=0.0;
                $latdq=$_GET['architect_lat'];$longdq=$_GET['architect_lat'];
                
              //  $longdq = $resultq['b_longitude'];$latdq = $resultq['b_latitude'];
                $ddddq = $_GET['architect_lat'];
                //<?php echo $dddd; 
            ?>
            { 
              
                  "title": '<?php echo $ddddq; ?>',
                  "lat": '<?php echo $latdq; ?>',
                  "lng": '<?php echo $longdq; ?>',
                  "description": '<?php echo $ddddq; ?>',
                  "type": 'Hospital'
                  
              
            }
        ,
 <?php
             
      //}   
      ?> 


        <?php 
            $query2q = $model->listDummy_Architect();  $co2q=0;
            if( $result2q = $model->fetch($query2q) ){
              do{$co2q++;
                //$sheda = $model->specific_bus($result2q['est_id']); 
                $snameq='';$forLat=0;$forLong=0;$forAd='';
                //if($pashneya = $model->fetch($sheda)){$snameq=$pashneya['bus_name'].'\nOperating hours : '.$pashneya['operating_hours'];$forAd=$pashneya['address'];}
                
                $longd2q = $result2q['b_longitude'];$latd2q = $result2q['b_latitude'];
                b
          ?>
        { 
          
              "title": '<?php echo $snameq; ?>',
              "lat": '<?php echo $latd2q; ?>',
              "lng": '<?php echo $longd2q; ?>',
              "description": '<label><?php echo $snameq; ?></label>',
              "type": 'Beach'
              
          
        }
       <?php if($co2q<$countingPaMore){ ?>
        ,
        <?php } ?>
 <?php
              }while($result2q = $model->fetch($query2q));
      }   ?> 
        ];
    window.onload = function () {
 
        var mapOptions = {
            center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var infoWindow = new google.maps.InfoWindow();
        var latlngbounds = new google.maps.LatLngBounds();
        var map = new google.maps.Map(document.getElementById("dvMap1"), mapOptions);
        var i = 0;
        var interval = setInterval(function () {
            var data = markers[i]
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            var icon = "";
            switch (data.type) {
                case "Hospital":
                    icon = "red";
                    break;
                case "Beach":
                    icon = "blue";
                    break;
                case "Mall":
                    icon = "yellow";
                    break;
            }
            icon = "pictures/" + icon + ".png";
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title,
                animation: google.maps.Animation.DROP,
                icon: new google.maps.MarkerImage(icon)
            });
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent(data.description);
                    infoWindow.open(map, marker);
                });
            })(marker, data);
            latlngbounds.extend(marker.position);
            i++;
            if (i == markers.length) {
                clearInterval(interval);
                var bounds = new google.maps.LatLngBounds();
                map.setCenter(latlngbounds.getCenter());
                map.fitBounds(latlngbounds);
            }
        }, 80);
    }
</script>
<div style="width: 100%; height: 100%;border:2px solid #f7eace;border-style:groove;">
            <div>
                <div style="width: 100%; height: 100%;">
                    <center>
                        <div id="dvMap1" style="width: 100%; height: 395px;border:2px solid #f7eace;">
                        </div>
                        <label style=""><b>Legend:</b></label>
                        <img alt="" src="pictures/red.png" />
                        <b>Sight</b>
                        <img alt="" src="pictures/blue.png" />
                        <b>Establishment/s</b>
                    </center>
                <br/>
              </div>
            </div>
        </div>