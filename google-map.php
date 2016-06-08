<?php 
/** enqueue script in functions.php */
	wp_register_script( 'googleapi', 'https://maps.googleapis.com/maps/api/js?sensor=false', array( 'jquery' ), '1', false ); 
    wp_enqueue_script( 'googleapi' );
	
/** OR if Multi- Language : enqueue script in functions.php */
	define('LANG',ICL_LANGUAGE_CODE);
	wp_register_script( 'googleapi', 'https://maps.googleapis.com/maps/api/js?sensor=false&language='.LANG.'', array( 'jquery' ), '1', false );
	wp_enqueue_script( 'googleapi' );
?>

<?php /** script+html for google map */ ?>
<?php global $redux_demo; ?>
    <script>
        var geocoder;
        var map;
    
        // initializing
        function initialize() {
          geocoder = new google.maps.Geocoder();
          var latlng = new google.maps.LatLng(-34.397, 150.644);
          codeAddress();
          var mapOptions = {
            zoom: 12,
            center: latlng
          }
          map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        }
        // Geocoding service 
        function codeAddress() {
          var address = document.getElementById('address').value;
          geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              map.setCenter(results[0].geometry.location);
              var marker = new google.maps.Marker({
                  map: map,
                  position: results[0].geometry.location
              });
            } else {
              alert('Geocode was not successful for the following reason: ' + status);
            }
          });
        }
        
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    
    <?php if($redux_demo['google_adress']):?>
        <div class="google-maps">
            <input id="address" type="hidden" value="<?php echo $redux_demo['google_adress']; ?>"/>
            <div id="map-canvas"></div>
        </div>
    <?php endif;?>

<?php 
/** CSS for Google map
.google-maps {
    position: relative;
    padding-bottom: 56%; 
    height: 0;
    overflow: hidden;
    margin: 10px 0 20px 0;
}
.google-maps iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100% !important;
    height: 100% !important;
}
#map-canvas {
    width:100%;
    height: 265px;
    border-radius: 3%;
    -moz-border-radius: 3%;
}
#map-canvas img {
    width: inherit;
    max-width: none; 
}
*/
?>
