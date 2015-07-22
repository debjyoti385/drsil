jQuery(document).ready(function () {


	// menu for onepager
	jQuery("#nav > li > a[href^='/#']").each(function () {
		var $this = jQuery(this);
		jQuery($this.parent()).removeClass("active").addClass("onepage");
		// remove unnecessary active classes
		$this.parent().removeClass("active");
	});

	// remove unnecessary active classes
	jQuery("#nav > li > a[href='/']").parent().removeClass("active");

	var scrollOffset = -110;
	if(jQuery(window).width()<1020){
		scrollOffset = -30;
	}

	if (jQuery("body").hasClass("home")) {
		//page scroll

		if (jQuery("#nav > li").hasClass("onepage")) {
			jQuery('body').pageScroller({
				navigation: '#nav li.onepage',
				sectionClass: 'chapter',
				scrollOffset: scrollOffset
			})
		}
	}


});