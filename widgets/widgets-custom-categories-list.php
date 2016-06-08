<?php 
/**
 * Adds Foo_Widget widget.
 */
class Categories_List_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'custom_categories_widget', // Base ID
			__('Custom Categories', 'wsource'), // Name
			array( 'description' => __( 'A list of Categories and it\'s icond and description.', 'text_domain' ), ) // Args
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
        $categories = $instance[ 'categories' ];
  
		echo $args['before_widget'];          
        
        /* Front-end start here*/
        ?>
           <div class="row">
                <div class="single_category">
                    <div class="two columns">
                        <?php echo 'icon';?> 
                    </div>
                    <div class="ten columns">
                        <div class="wrap_category_content">
                            <h4><?php echo $title;?></h4>
                            <div class="feature_content"><?php echo 'category description';?></div>
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
	   
        $categories = get_categories();
       
       
        $defaults = array( 'title' => 'Categories Title','categories' => $categories);
 
        $instance = wp_parse_args( (array) $instance, $defaults );
	   
		if (isset($instance['title'])) {
			$title = $instance['title'];
		}else {
			$title = __('New title', 'text_domain');
		}
        
		if (isset($instance['categories'])){
			$categories_list = $instance[ 'categories' ];
		}else {
			$categories_list = __( 'put here array', 'text_domain');
		}

		?>
		<p>
    		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
                    name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
                    value="<?php echo esc_attr( $title ); ?>"/>
		</p>

        <p>
    		<label for="<?php echo $this->get_field_id( 'categories' ); ?>"><?php _e( 'Categories List:' ); ?></label> 
            <?php foreach($categories as $cat) : ?>
                <p>
                    <input  type="checkbox" 
                            id="<?php echo $this->get_field_id( 'categories' ); ?>" 
                            name="<?php echo $this->get_field_id( 'categories' ); ?>" 
                            value="<?php echo $cat->term_id; ?>" 
                    />
                    <label>
                        <?php echo $cat->name; ?>
                    </label>
                </p>
            <?php endforeach; ?>
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
            $instance['categories'] = ( ! empty( $new_instance['categories'] ) ) ? strip_tags( $new_instance['categories'] ) : '';
            
		return $instance;
	}

} // class Categories_List_Widget

// register Foo_Widget widget
function register_categories_list_widget() {
    register_widget( 'Categories_List_Widget' );
}
add_action( 'widgets_init', 'register_categories_list_widget' );
