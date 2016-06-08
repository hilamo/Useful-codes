<?php 
    $branches = get_terms('branch',array('hide_empty'=>true));
    $branch_count = 1;
    if(!empty($branches)):
?>
<div class="branches_holder">
    <?php foreach ($branches as $branch) :?>
        <?php 
            $image_obj = get_field('branch_image','branch_'.$branch->term_id);
            $image = wp_get_attachment_image_src($image_obj['id'],'branch_thumb');;
            $branch_address = get_field('branch_address','branch_'.$branch->term_id);
            $link = get_term_link($branch);
        ?>
        <?php if(!empty($branch_address)):?>
            <script>
                var geocoder<?php echo $branch_count;?>;
                var map<?php echo $branch_count;?>;
            
                // initializing
                function initialize<?php echo $branch_count;?>() {
                  geocoder<?php echo $branch_count;?> = new google.maps.Geocoder();
                  var latlng = new google.maps.LatLng(-34.397, 150.644);
                  codeAddress<?php echo $branch_count;?>();
                  var mapOptions = {
                    zoom: 15,
                    center: latlng
                  }
                  map<?php echo $branch_count;?> = new google.maps.Map(document.getElementById('map-canvas-<?php echo $branch_count;?>'), mapOptions);
                  
                }
                // Geocoding service 
                function codeAddress<?php echo $branch_count;?>() {
                  var address<?php echo $branch_count;?> = document.getElementById('address-<?php echo $branch_count;?>').value;
                  geocoder<?php echo $branch_count;?>.geocode( { 'address': address<?php echo $branch_count;?>}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                      map<?php echo $branch_count;?>.setCenter(results[0].geometry.location);
                      var marker = new google.maps.Marker({
                          map: map<?php echo $branch_count;?>,
                          position: results[0].geometry.location
                      });
                    } else {
                      alert('Geocode was not successful for the following reason: ' + status);
                    }
                  });
                }
                
                google.maps.event.addDomListener(window, 'load', initialize<?php echo $branch_count;?>);
            </script>
        <?php endif;?>
        
        <div class="branch_wrapper">
            <div class="thumb">
                <?php if(!empty($branch_address)):?>
                <div class="google-maps">
                    <input id="address-<?php echo $branch_count?>" type="hidden" value="<?php echo $branch_address; ?>"/>
                    <div id="map-canvas-<?php echo $branch_count;?>" class="map-canvas-style"></div>
                </div>
                <?php endif;?>
            </div>
            <div class="description">
                <h3 class="name"><a href="<?php echo $link;?>"><?php echo $branch->name;?></a></h3>
                <div class="content">
                    <?php echo wpautop($branch->description);?>
                </div>
            </div>
        </div>
    <?php $branch_count++; endforeach;?>
</div>
<?php endif;?>