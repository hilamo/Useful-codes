<?php
class ContactUs_Widget extends WP_Widget{
    /**
     * function Contact_widget
     **/
    function ContactUs_Widget(){
        /*Widget settings*/
        $widget_ops = array('classname'=>'contact', 'description'=>'A contact form widget');
        
        /*Widget control settings*/
        $control_ops = array('width'=>250, 'height'=>350, 'id_base'=>'contact-widget');
        
        /* Create the widget*/
        $this->WP_Widget('contact-widget','Contact Us Widget',$widget_ops,$control_ops);
        
    }// end of function ContactUs_Widget
    
    
    /**
     * function widget
     **/
    function widget($args, $instance){
        extract($args);
        
        /*User selected setting*/
        $title = apply_filters('widget_title', $instance['title']);
        $name = $instance['name'];
		$phone = $instance['phone'];
        $email = $instance['email'];
        $message = $instance['message'];
        
        
        /* Before widget (defined by themes). */
		echo $before_widget;  
          
        
        /* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;


        ?>
        <div class="contactUsForm">
           <div class="fields">
                <!-- Your Name: Text Input -->
        		
                <div class="inputField">
        			<input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" placeholder="NAME" />
        		</div>
                
                <div class="inputField">
        		<!-- Your Phone: Text Input -->
        		
        			<input id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>"type="text" placeholder="PHONE" />
        		</div>
				
				<div class="inputField">
        		<!-- Your Email: Text Input -->
        		
        			<input id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>"type="text" placeholder="EMAIL" />
        		</div>
                
                <div class="inputField">
                <!-- Your Message: Text Input -->
                    <textarea rows="6" cols="10" id="<?php echo $this->get_field_id( 'message' ); ?>" name="<?php echo $this->get_field_name( 'message' ); ?>" placeholder="MESSAGE" ></textarea>
                </div>
                   <a href=""><?php echo __('SEND', 'ampa')?></a>
            </div>
        </div>
        <?php
		
     
        
        /* After widget (defined by themes). */
		echo $after_widget; 
    }//end of function widget
    
    
    /**
     * funcion form
    **/
    function form($instance){
  
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'ampa' );
		}
		?>
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'ampa'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<?php 
	
    }//end of function form
    
    
    /**
     * updating the widget to use the new user-selected values
    **/
    function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	/* Strip tags (if needed) and update the widget settings. */
	$instance['title'] = strip_tags( $new_instance['title'] );
	$instance['name'] = strip_tags( $new_instance['name'] );

	return $instance;
}
    
}// end of class



