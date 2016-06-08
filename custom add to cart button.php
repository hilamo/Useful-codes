<div class="request">
<?php 
	if (is_user_logged_in()){
		$text_btn =__('Order now','isotopia');
	}else $text_btn =__('Request aQoute','isotopia');
?>
	<?php $cart_url = $woocommerce->cart->get_cart_url();?>
	<a class="request_btn" href="<?php echo $cart_url.'&add-to-cart='.$post->ID;?>"><?php echo $text_btn;?></a>
</div>