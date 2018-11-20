	/* -------------- copy to clipboard ----------------- */

	$('.item-copy button').click(function() {
		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val($(this).parent().prev().text()).select();
		document.execCommand("copy");
		$temp.remove();
	});