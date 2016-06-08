<?php $attachments = new Attachments( 'event_attachments'); /* pass the instance name */ ?>
<?php 
    $post_custom = get_post_custom($post->ID);
//    $youtubes = get_post_meta($post->ID,'wpcf-slider_video',false);
?>
<?php if( $attachments->exist() ) : ?>
    <div class="event_slider_wrapper">
        <div class="row">
        <div class="twelve columns">
              <ul class="event_slider">
                <?php while( $attachment = $attachments->get() ) : ?>
                  <li>
                    <?php echo $attachments->image( 'event_attachments' ); ?>
                  </li>
                <?php endwhile; ?>
                <?php if(!empty($youtubes)): foreach($youtubes as $you) : ?>
                  <li>
                      <iframe width="431" height="350" src="//www.youtube.com/embed/<?php echo $you; ?>" frameborder="0" allowfullscreen></iframe>
                  </li>
                <?php endforeach; endif; ?>
              </ul>
          </div>
        </div>
        <script>
            jQuery(document).ready(function(){
               // Single Event Slider
               jQuery('.event_slider').bxSlider({
                  pause: 5000,
                  pager:false,
                  controls: true,
                  auto: false,
                  autoControls: true
                });  
            });
        </script>

    </div>
    
<?php endif; ?>