function facebook_mod(){

    ob_start();
    global $redux_demo; ?>
    <div class="facebook_widget_container">
        <iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo $redux_demo['facebook_link'];?>&amp;width&amp;height=230&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=120373508172674" 
            scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:258px;" 
            allowTransparency="true">
        </iframe>
        
    </div>
    
<?php return ob_get_clean();
}
add_shortcode('facebook_widget', 'facebook_mod');