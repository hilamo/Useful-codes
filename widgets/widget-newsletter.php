<?php 
/**
 * Adds Foo_Widget widget.
 */
class Newsletter_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'newsletter_widget', // Base ID
			__('הרשמה לניוזלטר', 'bama'), // Name
			array( 'description' => __( 'ווידגט הרשמה לניוזלטר', 'bama' ), ) // Args
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
        $shortcode    = $instance['shortcode'];
		echo $args['before_widget'];          


        /* Front-end start here*/
        ?>
           <div class="newsletter_widget_holder">
                <div class="row">
                    <div class="twelve columns">
                        <h2 class="newsletter_title widget_title"><?php echo $title; ?></h2>
                        <div class="newsletter_content widget_content">
                            <?php echo do_shortcode($shortcode); ?>
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
	   
        $defaults = array( 'title' => '', 'shortcode' => '' );
        $instance = wp_parse_args( (array) $instance, $defaults );
	   
		if (isset($instance['title'])) {
			$title = $instance['title'];
		}else {
			$title = __('New title', 'bama');
		}
		if (isset($instance['shortcode'])){
			$shortcode = $instance[ 'shortcode' ];
		}else {
			$shortcode = __('[contact-form-7 id="57" title="הרשמה לניוזלטר"]','bama');
		} 
		?>
		<p>
    		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
                    name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
                    value="<?php echo esc_attr( $title ); ?>"/>
		</p>
        <p>
            <label><?php echo 'הכנס קוד של טופס הרשמה לניוזלטר'?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'shortcode' ); ?>" 
                    name="<?php echo $this->get_field_name( 'shortcode' ); ?>" type="text" 
                    value="<?php echo esc_attr($shortcode); ?>"/>
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
            $instance['shortcode'] = ( ! empty( $new_instance['shortcode'] ) ) ?  $new_instance['shortcode'] : '';
		return $instance;
	}

} // class Video_Widget

// register Foo_Widget widget
function register_newsletter_widget() {
    register_widget( 'Newsletter_Widget' );
}
add_action( 'widgets_init', 'register_newsletter_widget' );