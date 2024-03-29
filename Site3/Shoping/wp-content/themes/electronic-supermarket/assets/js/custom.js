jQuery(function($){
  "use strict";

    jQuery('.search-box button').click(function(){
    jQuery(".search_outer").toggle();
  });

  jQuery('.search_inner input.search-field').on('keydown', function (e) {
    if (jQuery("this:focus") && (e.which === 9)) {
      e.preventDefault();
      jQuery(this).blur();
      jQuery('.search_inner button.search-submit').focus();
    }
  });

  jQuery('.search_inner .search-submit').on('keydown', function (e) {
    if (jQuery("this:focus") && (e.which === 9)) {
      e.preventDefault();
      jQuery(this).blur();
      jQuery('button.search_btn').focus();
    }
  });
});

function electronic_supermarket_menu_open() {
  jQuery(".sidenav").addClass('open');
}
function electronic_supermarket_menu_close() {
  jQuery(".sidenav").removeClass('open');
}

jQuery(function($){
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
      $('#return-to-top').fadeIn(200);
    } else {
      $('#return-to-top').fadeOut(200);
    }
  });
  $('#return-to-top').click(function() {
    $('body,html').animate({
      scrollTop : 0
    }, 500);
  });
});

jQuery(function($){
  $(window).load(function() {
    $(".loader").delay(2000).fadeOut("slow");
  })
});
