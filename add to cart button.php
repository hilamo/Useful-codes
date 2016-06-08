<div class="request">
	<?php $cart_url = $woocommerce->cart->get_cart_url();?>
	<a class="request_btn" href="<?php echo $cart_url.'?add-to-cart='.$post->ID;?>"><?php _e('Request aQoute','isotopia');?></a>
</div>