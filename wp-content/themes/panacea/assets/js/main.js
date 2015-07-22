jQuery.noConflict();


/**
 * jQuery.browser.mobile (http://detectmobilebrowser.com/)
 *
 * jQuery.browser.mobile will be true if the browser is a mobile device
 *
 **/
(function(a){(jQuery.browser=jQuery.browser||{}).mobile=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))})(navigator.userAgent||navigator.vendor||window.opera);

// is this ipad ?
var isiPad = (navigator.userAgent.match(/iPad/i) != null);




/* adjust page with fixed menu */

jQuery(document).ready(function () {

    var menuHeight = jQuery('.navbar-fixed-top').height();
    if ((menuHeight) != 0) {
        //fixed menu adjust
        jQuery('body').css('padding-top', menuHeight);
    }
});


// preloader
jQuery(document).ready(function () {
    jQuery("body.preloader").queryLoader2({
	    backgroundColor: "#fff",	 //Background color of the loader (in hex).
	    barColor: "#4394a3",	 //Background color of the bar (in hex).
	    barHeight: 5,	 //Height of the bar in pixels. Default: 1
	    deepSearch: true,	 //Set to true to find ALL images with the selected elements. If you don't want queryLoader to look in the children, set to false. Default: true.
	    percentage: true,	 //Set to true to enable percentage visualising. Default is false.
	    completeAnimation: "fade", //Set the animation type at the end. Options: "grow" or "fade". Default is "fade".
	    onComplete: function(){
		    jQuery("#ct_preloader").fadeOut(600);
	    }
    });
		// if wait long - hide preloader
		setTimeout(function () {
			jQuery("body.preloader #ct_preloader").fadeOut(300);
		}, 12000);

});

/* link smooth scroll to top */
function scrollToTop(i) {
	if (i == 'show') {
		if (jQuery(this).scrollTop() != 0) {
			jQuery('#toTop').fadeIn();
		} else {
			jQuery('#toTop').fadeOut();
		}
	}
	if (i == 'click') {
		jQuery('#toTop').click(function () {
			jQuery('body,html').animate({scrollTop: 0}, 600);
			return false;
		});
	}
}

jQuery(document).ready(function () {
	scrollToTop('click');



});

jQuery(window).scroll(function () {
	scrollToTop('show');
});

// ddslick select init
if(jQuery.ddslick) {
jQuery(document).ready(function () {
	jQuery("#archivesList").ddslick({
		width: 220,
		selectText: "Select.."
	});
});}

<!-- mobile menu version 2 - select -->

/*
selectnav('nav', {
	label: '- Navigation -',
	indent: '?'
});
*/



/* colorbox init */
jQuery(document).ready(function () {
	if(jQuery.colorbox) {
	jQuery('a.colorUp').colorbox({
		rel: 'gal',
		maxWidth: "95%"
	});
	}

});


/* tooltip for socials init */

function tooltipInit() {
	jQuery("[data-toggle='tooltip']").tooltip();
}


jQuery(document).ready(function () {
	tooltipInit();
});


function scrollToElement(el, pos, callback) {
	var animation = {scrollTop: pos};
	jQuery('html,body').animate(animation, 'fast', 'swing', function () {
		if (typeof callback == 'function') {
			callback(el);
		}
		callback = null;
	});
}

function callback(el) {

	/*
	 setTimeout(function() {

	 jQuery('.parallax').each(function() {
	 // jQuery(this).removeClass("paraAnim");
	 });

	 // jQuery(window).data('plugin_stellar').refresh();

	 }, 500);
	 */
}


function hexToRgb(hex, opacity) {
	// Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF")
	var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
	hex = hex.replace(shorthandRegex, function (m, r, g, b) {
		return r + r + g + g + b + b;
	});

	var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
	return result ? "rgba(" + parseInt(result[1], 16) + "," + parseInt(result[2], 16) + "," + parseInt(result[3], 16) + "," + opacity + ")" : null;
}

jQuery(window).scroll(function () {
	if (jQuery(this).scrollTop() > 0) {
		jQuery('.soc-area').slideUp();
	} else {
		jQuery('.soc-area').slideDown();
	}


	jQuery('iframe').each(function () {
		var i = jQuery(this);

		if (i) {
			i.attr('src', i.attr('data-src')).removeAttr('data-src');
		}
	});

});


// hide / show header socials

jQuery(document).ready(function () {
	jQuery(".brand, .soc-area").hoverIntent({
		over: showSoc,
		out: hideSoc
	});

	function showSoc() {
		jQuery(this).next(".soc-area").slideDown();
	}

	function hideSoc() {
		return;
	}

// onepage fix (?)
	jQuery('.multipage').each(function() {
     jQuery(this).removeClass('onepage');
 });

	// scrool spy faq with smooth scroll */


	if (jQuery('#faq1').length > 0) {
		jQuery('#faq1').affix({
			offset: { top: jQuery('#faq1').offset().top - 145 }
		});
	}


	jQuery('#faq1 a').bind('click', function (e) {
		e.preventDefault();

		jQuery('html, body').animate({
			scrollTop: jQuery(this.hash).offset().top }, 300);
	});


	/* ======================================= */
	/* === CLICKABLE MAIN PARENT ITEM MENU === */

	if(isiPad) {

	} else {
		jQuery(".navbar-default li.dropdown > .dropdown-toggle").removeAttr("data-toggle data-target");
	}

	jQuery("body").on("click", ".navbar-default .dropdown", function () {
		var $this = jQuery(this);

		if($this.hasClass("open")) {
			$this.find("> .dropdown-toggle").removeAttr("data-toggle data-target");
		}
	});


	// if mobile and menu open - hide it after click
	jQuery('.nav.navbar-nav li a').click(function () {

		var $togglebtn = jQuery(".navbar-toggle")

		if (!($togglebtn.hasClass("collapsed")) && ($togglebtn.is(":visible"))) {
			jQuery(".navbar-toggle").trigger("click");
		}
	});

});




