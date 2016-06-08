<?php 
/**
 * Adds Foo_Widget widget.
 */
class Video_with_content_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'video_with_content_widget', // Base ID
			__('Video with content widget', 'wsource'), // Name
			array( 'description' => __( 'Video widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title      = apply_filters( 'widget_title', $instance['title'] );
        $youtube_id      = $instance['youtube_id'];
        $content    = $instance['content'];
		echo $args['before_widget'];          
        
        /* Front-end start here*/
        ?>
           <div class="video_widget_holder">
                <div class="wrap_content">
                    <div class="row">
                        <div class="eight columns">
                            <div class="video_content"><?php echo $content; ?></div>
                        </div>
                        <div class="four columns">
                            <div class="video_wrapper">
                                <a href="http://www.youtube.com/watch?v=<?php echo $youtube_id;?>" class="fancybox-media">
                                <img src="<?php bloginfo('template_directory')?>/images/video_img.jpg"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
           </div> 
        <?php
	
    
    	echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
	   
        $defaults = array( 'title' => 'Video Widget Title', 'style' => '', 'content' => '', 'url' => '' );
        $instance = wp_parse_args( (array) $instance, $defaults );
	   
		if (isset($instance['title'])) {
			$title = $instance['title'];
		}else {
			$title = __('New title', 'text_domain');
		}
        
		if (isset($instance['youtube_id'])){
			$youtube_id = $instance[ 'youtube_id' ];
		}else {
			$youtube_id = __( 'UiZY0iA4bJk', 'text_domain');
		}
        
		if (isset($instance['content'])){
			$content = $instance[ 'content' ];
		}else {
			$content = __('Content goes here','text_domain');
		} 
        
		?>
		<p>
    		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
                    name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
                    value="<?php echo esc_attr( $title ); ?>"/>
		</p>
        <p>
            <label><?php echo 'Youtube ID:'?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'youtube_id' ); ?>" 
                    name="<?php echo $this->get_field_name( 'youtube_id' ); ?>" type="text" 
                    value="<?php echo $youtube_id ; ?>"/>
        </p>
        
        <p>
            <label><?php echo 'Content:'?></label>
            <textarea class="widefat" rows="6" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo $content; ?></textarea>
        </p>
        
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['youtube_id'] = ( ! empty( $new_instance['youtube_id'] ) ) ? strip_tags( $new_instance['youtube_id'] ) : '';
            $instance['content'] = ( ! empty( $new_instance['content'] ) ) ?  $new_instance['content'] : '';
		return $instance;
	}

} // class Video_Widget

// register Foo_Widget widget
function register_video_content_widget() {
    register_widget( 'Video_with_content_Widget' );
}
add_action( 'widgets_init', 'register_video_content_widget' );
