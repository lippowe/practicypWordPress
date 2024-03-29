/*My js*/
// Accodian Js
function toggleIcon(e) {
	jQuery(e.target)
	.prev('.panel-heading')
	.find(".more-less")
	.toggleClass('fa-plus-square-o fa-minus-square-o');
}
jQuery('.panel-group').on('hidden.bs.collapse', toggleIcon);
jQuery('.panel-group').on('shown.bs.collapse', toggleIcon);


const openedMenu = document.querySelector('.opened-menu');
const closedMenu = document.querySelector('.closed-menu');
const navbarMenu = document.querySelector('.navbar');
const menuOverlay = document.querySelector('.overlay');

jQuery(window).on("scroll", function () {
	if (jQuery(".sticky-menu").length) {
		var headerScrollPos = 100;
		var sticky = jQuery(".sticky-menu");

		if (jQuery(window).scrollTop() > headerScrollPos) {
			sticky.addClass("sticky-fixed");
			sticky.removeClass("not-sticky");
		} else if (jQuery(this).scrollTop() <= headerScrollPos) {
			sticky.removeClass("sticky-fixed");
			sticky.addClass("not-sticky");
		}
	}
});

// Toggle Menu Function
function toggleMenu() {
    navbarMenu.classList.toggle('active');
    menuOverlay.classList.toggle('active');
    document.body.classList.toggle('locked');
}

jQuery(document).ready(function() {
    // WOW
    new WOW().init();

    //odometer
    var odo = jQuery(".odometer");
    odo.each(function() {
        jQuery(this).appear(function() {
            var countNumber = jQuery(this).attr("data-count");
            jQuery(this).html(countNumber);
        });
    });

    jQuery(".navbar").focus();
});

(function() {
    var isIe = /(trident|msie)/i.test(navigator.userAgent);

    if (isIe && document.getElementById && window.addEventListener) {
        window.addEventListener('hashchange', function() {
            var id = location.hash.substring(1),
                element;

            if (!(/^[A-z0-9_-]+$/.test(id))) {
                return;
            }

            element = document.getElementById(id);

            if (element) {
                if (!(/^(?:a|select|input|button|textarea)$/i.test(element.tagName))) {
                    element.tabIndex = -1;
                }

                element.focus();
            }
        }, false);
    }
}());

/* ---------------------------------------------- /*
	* Scroll top
	/* ---------------------------------------------- */

jQuery(window).scroll(function() {

    if (jQuery(this).scrollTop() > 100) {
        jQuery('.page-scroll-up').fadeIn();
    } else {
        jQuery('.page-scroll-up').fadeOut();
    }
});

jQuery('.page-scroll-up').click(function() {
    jQuery("html, body").animate({
        scrollTop: 0
    }, 700);
    return false;
});

jQuery(document).ready(function() {
	/* Loader */
	if (jQuery(".page-loader").length) {
		jQuery(".page-loader").fadeOut();
	}
});
jQuery(document).ready(function() {
    /* jQuery("#slider-demo").owlCarousel({
        navigation: true, // Show next and prev buttons	
        autoplay: false,
		animateOut:  'fadeOut', // fadeout	
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        smartSpeed: 800,
        singleItem: true,
        autoHeight: true,
        loop: false, // loop is true up to 1199px screen.
        nav: true, // is true across all sizes
        margin: 0, // margin 10px till 960 breakpoint
        responsiveClass: true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
        items: 1,
        dots: false,
        navText: ["PREV", "NEXT"]

    });

    jQuery("#testimonial-demo").owlCarousel({
        navigation: true,
        autoplay: false,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        smartSpeed: 1000,
        loop: false,
        nav: true,
        margin: 30,
        autoHeight: true,
        responsiveClass: true,
        dots: false,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            200: { items: 1 },
            480: { items: 1 },
            768: { items: 2 },
            1000: { items: 2 }
        }
    });

    jQuery("#sponsors-demo").owlCarousel({
        navigation: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        smartSpeed: 700,
        loop: true,
        nav: false,
        margin: 30,
        autoHeight: true,
        responsiveClass: true,
        dots: false,
        responsive: {
            200: { items: 1 },
            480: { items: 1 },
            768: { items: 3 },
            1000: { items: 5 }
        }
    });

    jQuery("#team-demo").owlCarousel({
        navigation: false,
        autoplay: false,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        smartSpeed: 700,
        loop: true, // loop is true up to 1199px screen.
        nav: false, // is true across all sizes
        margin: 30, // margin 10px till 960 breakpoint
        autoHeight: true,
        responsiveClass: true,
        dots: false,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            100: { items: 1 },
            480: { items: 1 },
            768: { items: 2 },
            1000: { items: 4 }
        }
    });

    jQuery("#portfolio-demo").owlCarousel({
        navigation: false,
        autoplay: false,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        smartSpeed: 700,
        loop: true, // loop is true up to 1199px screen.
        nav: false, // is true across all sizes
        margin: 30, // margin 10px till 960 breakpoint
        autoHeight: true,
        responsiveClass: true,
        dots: false,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            100: { items: 1 },
            480: { items: 1 },
            768: { items: 2 },
            1000: { items: 3 }
        }

    }); */

    /* add class to menu */
   /*  var ul_p = jQuery('.navbar ul > li').length;
    var ul_c = jQuery('.sub-menu > li').length;
    var ul_l = ul_p - ul_c;
    if (ul_l > 8) {
        jQuery('.header-top-info').removeClass('container');
        jQuery('.header-top-info').addClass('container-fluid');
        jQuery('.nav-wrap').removeClass('container');
        jQuery('.nav-wrap').addClass('container-fluid');
    } */
});