<?php 
	global $woocommerce;
	$quantity = $woocommerce->cart->cart_contents_count;
?>
<div class="menu_holder">
	<?php wp_nav_menu(array(
						"theme_location"=>"wish_shop", 
						'menu_id' => 'wishcart_menu' )); ?>  
	<script>
		jQuery(document).ready(function(){
			var qnt = <?php echo $quantity;?>;
			jQuery('#wishcart_menu li.cart a').append(" ("+qnt+")");
		});
	</script>                  
</div>