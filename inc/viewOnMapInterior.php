<div class="agile_inner_banner_info">
  <h2>Showing on the Map the Top 
                <?php $resulta = $model->count_listDummy_Interior();
                  if( $resultna = $model->fetch($resulta) ){ 
                    if($resultna['count(sh.builder_id)']>=10){
                      echo '10';
                    }else{echo $resultna['count(sh.builder_id)'];}
                    
                  } ?> Nearby Interior Designer(s) </h2>
  <a href="index.php?page=findArchitect" class="view resw3"><i class="fa fa-search"><label style="font-family:Century Gothic;font-size;15pt;">&nbsp;&nbsp;&nbsp;&nbsp;F I N D&nbsp;&nbsp;&nbsp;&nbsp;A G A I N</label></i></a>
   <!--a style="font-size:11pt" href="index.php?page=viewOnMapArchitect" class="view resw3"><b><i class="fa fa-location-arrow"></i>&nbsp;&nbsp;&nbsp;&nbsp;VIEW on MAP</b></a-->
    <br/>
    
<div class="divPanel page-content">

<div class="row-fluid">

<div class="span12" id="divMain">

<hr>
<html>

<head>

<script type='text/javascript' src='source/assets/jquery.js'></script>
<script type='text/javascript' src='source/assets/jquery-migrate.js'></script>

<?php /* === GOOGLE MAP JAVASCRIPT NEEDED (JQUERY) ==== */ ?>
<script type='text/javascript' src='source/assets/gmaps.js'></script>

</head>

<body>
  

        <?php /* === THIS IS WHERE WE WILL ADD OUR MAP USING JS ==== */ ?>
        <div class="google-map-wrap" itemscope itemprop="hasMap" itemtype="http://schema.org/Map">
          <div id="google-map" class="google-map">
          </div><!-- #google-map -->
        </div>

        <?php /* === MAP DATA === */ ?>
        <?php
        $locations = array();

        /* Marker #1 */
        $query = $model->listDummy_Interior();  
            if( $result = $model->fetch($query) ){
              do{
                $latd = $result['b_latitude'];$longd = $result['b_longitude'];
                $locations[] = array(
                  'google_map' => array(
                    'lat' => $latd,
                    'lng' => $longd,
                  ),
                  'location_address' => $result["b_address"],
                  'location_name'    => $result["b_lname"].',&nbsp'.$result["b_fname"].'&nbsp&nbsp'.$result["b_mname"],
                  'location_id'    => $result["builder_id"],
                );
                }while($result = $model->fetch($query));
            }     
        ?>
        <?php /* === PRINT THE JAVASCRIPT === */ ?>

        <?php
        /* Set Default Map Area Using First Location */
        $map_area_lat = isset( $locations[0]['google_map']['lat'] ) ? $locations[0]['google_map']['lat'] : '';
        $map_area_lng = isset( $locations[0]['google_map']['lng'] ) ? $locations[0]['google_map']['lng'] : '';
        ?>

        <script>
        jQuery( document ).ready( function($) {

          /* Do not drag on mobile. */
          var is_touch_device = 'ontouchstart' in document.documentElement;

          var map = new GMaps({
            el: '#google-map',
            lat: '<?php echo $map_area_lat; ?>',
            lng: '<?php echo $map_area_lng; ?>',
            scrollwheel: false,
            draggable: ! is_touch_device
          });

          /* Map Bound */
          var bounds = [];
          /* For Each Location Create a Marker. */
          <?php 
            foreach( $locations as $location ){
            $idl = $location['location_id'];
            $name = $location['location_name'];
            $addr = $location['location_address'];
            $map_lat = $location['google_map']['lat'];
            $map_lng = $location['google_map']['lng'];
            ?>
            /* Set Bound Marker */
            var latlng = new google.maps.LatLng(<?php echo $map_lat; ?>, <?php echo $map_lng; ?>);
            bounds.push(latlng);
              /* Add Marker */
              map.addMarker({
                lat: <?php echo $map_lat; ?>,
                lng: <?php echo $map_lng; ?>,

                title: '<?php echo $name; ?>',
                infoWindow: {
                  content: '<b><a style="color:gray" href=""><p><?php echo $name; ?></p><p><?php echo $addr; ?></p></a></b>'
                }
              });
          <?php } //end foreach locations ?>

          /* Fit All Marker to map */
          map.fitLatLngBounds(bounds);

          /* Make Map Responsive */
          var $window = $(window);
          function mapWidth() {
            var size = $('.google-map-wrap').width();
            $('.google-map').css({width: size + 'px', height: (size/2) + 'px'});
          }
          mapWidth();
          $(window).resize(mapWidth);

        });
        </script>
</body>
</html>
<!--End Contact form -->                       
</div>
</div>
</div>
<br/>
</div>



