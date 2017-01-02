(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		$('.button-collapse').sideNav({
	    menuWidth: 240,
	    closeOnClick: true
	  });

    $('.button-collapse-right').sideNav({
      menuWidth: 280,
      closeOnClick: true,
      draggable: true,
      edge: 'right'
    });

	  $(".newsletter input[type=email]").unwrap();

    // find how many navs are in the footer and apply applicable classes
    var menus =  $('.widget_nav_menu');
    var footerNavCounts = menus.length;
    var colCalc = (12 / footerNavCounts);
    menus.addClass('col s12 m'+colCalc+' l'+colCalc);
		
	});
	
})(jQuery, this);
