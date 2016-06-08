<!DOCTYPE html>
<!-- Example from Mashkanta4U Site -->
<html>
	<head>
		<style>
		#popup_login_form{
			display: none;
			position: absolute;
			z-index: 9999;
			text-align: left;
			width: 450px;
			background: #fff;
			min-height: 220px;
		}
		#popup_login_form .login_button{
			background: #a9d248;
			color: #fff;
			padding: 5px 10px;
			-moz-border-radius: 10px;
			border-radius: 10px;
			font-family: 'Open sans';
		}
		#header .login a.login_btn{
			background: #a9d248;
			color:#fff;
			padding: 3px 13px;
			font-weight: bold;
			-moz-border-radius: 10px;
			border-radius: 10px;
			font-family: 'Open sans';
		}
		</style>
	</head>
<body>
	<div class="login">
		<?php if(is_user_logged_in()):?>
			<a class="login_btn" href="<?php echo wp_logout_url(get_permalink()); ?>">
				<?php echo 'Log-Out';?>
			</a>
		<?php else:?>
			<a class="login_btn" href="#popup_login_form">
				<?php echo 'Log-In';?>
			</a>
		<?php endif;?>
		<div id="popup_login_form">
			<?php echo do_shortcode('[ajax_login]');?>
			<?php echo do_shortcode('[ajax_register]');?>
		</div>
	</div>	
</body>

<script>
jQuery(document).ready(function(){
    jQuery(".login_btn").fancybox({
		'hideOnOverlayClick':true,
        'autoDimensions': false,
        minWidth: 450,
        maxWidth: 450,
        width: 450
	});   
});
</script>

<?php 
/*******************************

In functions.php (if not using a login button)

// pop-up a login form when page is private 
function block_url( $url, $post, $leavename ) {
    global $post;
    $private = get_post_meta($post->ID,"wpcf-post-status",true);
	if(!is_user_logged_in() && $private){
	   return "#popup_login_form";
	}
    return $url;
}
add_filter( 'post_link', 'block_url', 10, 3 );


********************************/
?>