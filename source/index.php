<html>

<head>

<script type='text/javascript' src='assets/jquery.js'></script>
<script type='text/javascript' src='assets/jquery-migrate.js'></script>

<?php /* === GOOGLE MAP JAVASCRIPT NEEDED (JQUERY) ==== */ ?>
<script src="http://maps.google.com/maps/api/js" type="text/javascript"></script>
<script type='text/javascript' src='assets/gmaps.js'></script>

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
				$locations[] = array(
					'google_map' => array(
						'lat' => '-6.976622',
						'lng' => '110.39068959999997',
					),
					'location_address' => 'Puri Anjasmoro B1/22 Semarang',
					'location_name'    => 'Loc A',
				);

				/* Marker #2 */
				$locations[] = array(
					'google_map' => array(
						'lat' => '-6.974426',
						'lng' => '110.38498099999993',
					),
					'location_address' => 'Puri Anjasmoro P5/20 Semarang',
					'location_name'    => 'Loc B',
				);

				/* Marker #3 */
				$locations[] = array(
					'google_map' => array(
						'lat' => '-7.002475',
						'lng' => '110.30163800000003',
					),
					'location_address' => 'Ngaliyan Semarang',
					'location_name'    => 'Loc C',
				);
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

					<?php /* For Each Location Create a Marker. */
					foreach( $locations as $location ){
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
								content: '<p><?php echo $name; ?></p>'
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

