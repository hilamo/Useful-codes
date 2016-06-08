<?php 
	// Create geocoder with php 
	// put this code in functions.php
function geolookup($string){
 
    if(!($location = get_transient("address_geo_params"))){
       $string = str_replace (" ", "+", urlencode($string));
       $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$string."&sensor=false";
     
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $details_url);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       $response = json_decode(curl_exec($ch), true);
     
       // If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
       if ($response['status'] != 'OK') {
        return null;
       }
    
       $geometry = $response['results'][0]['geometry'];
     
        $longitude = $geometry['location']['lat'];
        $latitude = $geometry['location']['lng'];
     
        $location = array(
            'latitude' => $geometry['location']['lat'],
            'longitude' => $geometry['location']['lng'],
            'location_type' => $geometry['location_type'],
        );
        
        set_transient("address_geo_params",$location);
    }
    
    return $location;
 
}
?>

<?php /** script + html for google map */ ?>
<?php global $redux; ?>
    <?php  $location = geolookup($redux['google_adress']); ?>

    <script>
        var map;

        // initializing
        function initialize() {
		
          var location = new google.maps.LatLng(<?php echo $location["latitude"];?>, <?php echo $location["longitude"];?>);
          var mapOptions = {
            zoom: 15,
            panControl: false,
            center: location
          }

          map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		  
          var marker = new google.maps.Marker({
              map: map,
              position: location

          });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    
    <?php if($redux['google_adress']):?>
        <div class="google-maps">
            <input id="address" type="hidden" value="<?php echo $redux['google_adress']; ?>"/>
            <div id="map-canvas"></div>
        </div>
<?php endif;?>



