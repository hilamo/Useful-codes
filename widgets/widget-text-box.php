<?php 
/**
 * Adds Foo_Widget widget.
 */
class custom_content_box_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			__('Custom Content Box', 'wsource'), // Name
			array( 'description' => __( 'A custom colored content box', 'text_domain' ), ) // Args
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
        $style      = $instance['style'];
        $content    = $instance['content'];
        $url        = $instance['url'];

		echo $args['before_widget'];          
        
        /* Front-end start here*/
        ?>
        <div class="colored_boxes">
           <div class="color_<?php echo $style; ?>">
                <div class="wrap_box">
                    <h3 class="color_title">
                        <?php if(!empty($url)): ?>
                            <a href="<?php echo $url; ?>">
                        <?php endif; ?>
                            <?php echo $title; ?>
                        <?php if(!empty($url)): ?>                                
                            </a>
                        <?php endif; ?>                        
                    </h3>
                    <?php $trimmed_content = wp_trim_words( $content, 20, null); ?> 
                    <div class="color_content"><?php echo $trimmed_content; ?></div>
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
	   
        $defaults = array( 'title' => 'Box Page Widget', 'style' => '', 'content' => '', 'url' => '' );
        $instance = wp_parse_args( (array) $instance, $defaults );
	   
		if (isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}else {
			$title = __( 'New title', 'text_domain' );
		}
        
		if (isset( $instance[ 'style' ] ) ) {
			$style = $instance[ 'style' ];
		}else {
			$style = __( 'orange_box', 'text_domain' );
		}
        
		if (isset( $instance[ 'content' ] ) ) {
			$content = $instance[ 'content' ];
		}else {
			$content = __( 'Content goes here', 'text_domain' );
		}
        
		if (isset( $instance[ 'url' ] ) ) {
			$url = $instance[ 'url' ];
		}else {
			$url = __( 'http://www.site.com', 'text_domain' );
		}                                                       
        
		?>
		<p>
    		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
                    name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
                    value="<?php echo esc_attr( $title ); ?>"/>
		</p>
        
        <p>
        <label>Select a background style:</label>
            <select id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" class="widefat">
              
                <option <?php if ( 'orange_box' == $instance['style'] ) echo 'selected="selected"'; ?> 
                        value="orange_box">Orange</option>
                <option <?php if ( 'green_box' == $instance['style'] ) echo 'selected="selected"'; ?> 
                        value="green_box">Green</option> 
                <option <?php if ( 'blue_box' == $instance['style'] ) echo 'selected="selected"'; ?> 
                        value="blue_box">Blue</option>                              
              
            </select>
        </p>
        
        <p>
            <label><?php echo 'Content:'?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>"><?php echo $content; ?></textarea>
        </p>
        
        <p>
            <label><?php echo 'URL: '?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" 
                    name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" 
                    value="<?php echo esc_attr( $url ); ?>"/>
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
            $instance['style'] = ( ! empty( $new_instance['style'] ) ) ? strip_tags( $new_instance['style'] ) : '';
            $instance['content'] = ( ! empty( $new_instance['content'] ) ) ? strip_tags( $new_instance['content'] ) : '';
            $instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
		return $instance;
	}

} // class custom_content_box_Widget

// register Foo_Widget widget
function register_content_widget() {
    register_widget( 'custom_content_box_Widget' );
}
add_action( 'widgets_init', 'register_content_widget' );
