<?php 
/**
 * Adds Foo_Widget widget.
 */
class Subscription_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'subscription_widget', // Base ID
			__('רכישת מנוי', 'bama'), // Name
			array( 'description' => __( 'ווידגט רכישת מנוי', 'bama' ), ) // Args
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
        $link_text      = $instance['link_text'];
        $content    = $instance['content'];
		echo $args['before_widget'];          


        /* Front-end start here*/
        ?>
           <div class="subs_widget_holder">
                <div class="row">
                    <div class="twelve columns">
                        <h2 class="subs_title widget_title"><?php echo $title; ?></h2>
                        <div class="subscription_content widget_content">
                            <div class="subs_short_content"><?php echo $content; ?></div>
                                <a class="more_details arrow popupsubs" href="">
                                    <?php echo $link_text;?>
                                </a>
                            
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
	   
        $defaults = array( 'title' => '', 'content' => '', 'link_text' => '' );
        $instance = wp_parse_args( (array) $instance, $defaults );
	   
		if (isset($instance['title'])) {
			$title = $instance['title'];
		}else {
			$title = __('כותרת חדשה', 'bama');
		}
        
		if (isset($instance['link_text'])){
			$link_text = $instance[ 'link_text' ];
		}else {
			$link_text = __( 'לפרטים נוספים', 'bama');
		}

		if (isset($instance['content'])){
			$content = $instance[ 'content' ];
		}else {
			$content = __('כאן ניתן להזין תיאור קצר','bama');
		} 
		?>
		<p>
    		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
                    name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
                    value="<?php echo esc_attr( $title ); ?>"/>
		</p>
        <p>
            <label><?php echo 'תיאור קצר:'?></label>
            <textarea class="widefat" rows="6" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo $content; ?></textarea>
        </p>
        <p>
            <label><?php echo 'טקסט של הלינק'?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'link_text' ); ?>" 
                    name="<?php echo $this->get_field_name( 'link_text' ); ?>" type="text" 
                    value="<?php echo esc_attr($link_text); ?>"/>
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
            $instance['content'] = ( ! empty( $new_instance['content'] ) ) ?  $new_instance['content'] : '';
            $instance['link_text'] = ( ! empty( $new_instance['link_text'] ) ) ? strip_tags( $new_instance['link_text'] ) : '';
		return $instance;
	}

} // class Video_Widget

// register Foo_Widget widget
function register_subscription_widget() {
    register_widget( 'Subscription_Widget' );
}
add_action( 'widgets_init', 'register_subscription_widget' );