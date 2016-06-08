<div id="header">
    <div class="fixed_header">  
		<div class="menu_wrapper">
			<?php wp_nav_menu(array(
								"theme_location"=>"main", 
								'menu_class' => 'top_menu clearfix', 
								'menu_id' => 'top_menu' )); ?>                    
		</div>        
    </div>
</div>

<script>
    jQuery(document).ready(function(){
        var nav = jQuery('#header .fixed_header');
    
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 0) {
                nav.addClass("active_fixed_header");
            } else {
                nav.removeClass("active_fixed_header");
            }
        });
    });

</script>

<?php /***** CSS *****/
.active_fixed_header{
    z-index: 9999;
    position: fixed;
    right: 0;
    background: #f3f3f3;
    top: 0;
    width: 100%;
}
body.admin-bar #header .active_fixed_header {
    top:32px;
}
.menu_wrapper {
    text-align: center; /* Assuming your main layout is centered */
}
.menu_wrapper {
    display: inline-block;
    width: 1024px; /* Your menu's width */
}
?>