// on button click-> slide up a div 
jQuery('.order_service').click(function(e) {
	e.preventDefault();
  if ( jQuery( ".page_bottom_contact_form" ).is( ":hidden" ) ) {
	jQuery('.page_bottom_contact_form').show( "slow" );
  } else {
	jQuery('.page_bottom_contact_form').slideUp();
  }
});   