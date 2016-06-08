<?php   
/*****************************************************
Wooceommerce - customized function
******************************************************/

/** woocommerce override_checkout_fields */
add_filter( 'woocommerce_billing_fields' , 'custom_override_checkout_fields' );
// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
    //$fields['billing_address_1']['placeholder'] = 'רחוב';
    // $fields['billing_address_2']['placeholder'] = 'מספר בית';
     unset($fields['billing_country']);
     $fields['billing_postcode']['required'] = false;
     return $fields;
}

?>