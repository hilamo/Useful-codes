<?php 
/**
 * Adds Foo_Widget widget.
 */
class custom_text_box_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			__('טקסט עם עיצוב', 'bama'), // Name
			array( 'description' => __( 'קוביית טקסט עם כותרת ברקע כתום', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 */
	public function widget( $args, $instance ) {
		$title      = apply_filters( 'widget_title', $instance['title'] );
        $content    = $instance['content'];
		echo $args['before_widget'];          

        /* Front-end start here*/
        ?>
        <div class="colored_text_boxes">
                <h2 class="color_title widget_title">
                    <?php echo $title; ?>                               
                </h2>
                <div class="wrap_box widget_content">                    
                    <?php //$trimmed_content = wp_trim_words( $content, 20, null); ?> 
                    <div class="color_content"><?php echo $content; ?></div>
                </div>
            
           </div>
        <?php

    	echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 */
	public function form( $instance ) {

        $defaults = array( 'title' => ' ', 'style' => '', 'content' => '');
        $instance = wp_parse_args( (array) $instance, $defaults );
		if (isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}else {
			$title = __( 'New title', 'text_domain' );
		}

		if (isset( $instance[ 'content' ] ) ) {
			$content = $instance[ 'content' ];
		}else {
			$content = __( 'Content goes here', 'text_domain' );
		}                                                      

		?>
		<p>
    		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
                    name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
                    value="<?php echo esc_attr( $title ); ?>"/>
		</p>
        <p>
            <label><?php echo 'תוכן:'?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>"><?php echo $content; ?></textarea>
        </p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['content'] = ( ! empty( $new_instance['content'] ) ) ? strip_tags( $new_instance['content'] ) : '';
		return $instance;
	}

} // class custom_content_box_Widget

// register Foo_Widget widget
function register_content_widget() {
    register_widget( 'custom_text_box_Widget' );
}
add_action( 'widgets_init', 'register_content_widget' );
