// hide error messages when hovering 
    jQuery( ".wpcf7-form-control-wrap" ).click( function() {
    	jQuery( this ).children( ".wpcf7-not-valid-tip" ).fadeOut(400);
    });
	
	
// in sent ok - remove messages 
on_sent_ok: "jQuery('.wpcf7-mail-sent-ok').ajaxComplete(function(){$(this).delay(2000).fadeOut('slow');});"