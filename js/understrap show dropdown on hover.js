$('#main-menu li.menu-item.dropdown')
	.mouseenter(function(){
		var a_link = $(this).find('a.nav-link').first();
		a_link.parent().addClass('show');
		a_link.siblings('ul.dropdown-menu').addClass('show');
		a_link.attr('aria-expanded',true);
	})
	.mouseleave(function(){
		var a_link = $(this).find('a.nav-link').first();
		a_link.parent().removeClass('show');
		a_link.siblings('ul.dropdown-menu').removeClass('show');
		a_link.attr('aria-expanded',false);
	});