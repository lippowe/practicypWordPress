jQuery(document).ready(function($) {

    var menu_toggle         = $('.menu-toggle');
    var search_menu_toggle  = $('.search-menu-toggle');
    var nav_menu            = $('.main-navigation ul.nav-menu');

    // Primary Menu
    menu_toggle.click(function() {
        $(this).toggleClass('active');
        nav_menu.fadeToggle();
        $('button.dropdown-toggle').removeClass('active');
        $('body').toggleClass('menu-toggled');
    });

    // Search Menu
    search_menu_toggle.click(function() {
        $(this).toggleClass('active');
        $('.main-navigation #search').toggleClass('active');
        $('.main-navigation form.search-form input').focus();
    });

    $('.main-navigation .nav-menu .menu-item-has-children > a').after( $('<button class="dropdown-toggle"><i class="fas fa-caret-down"></i></button>') );

    $('button.dropdown-toggle').click(function() {
        $(this).toggleClass('active');
        $(this).parent().find('.sub-menu').first().toggle();
    });

    // Keyboard Navigation
    nav_menu.find("li").last().bind( 'keydown', function(e) {
        if( !e.shiftKey && e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });

    menu_toggle.on('keydown', function (e) {
        var tabKey    = e.keyCode === 9;
        var shiftKey  = e.shiftKey;

        if( menu_toggle.hasClass('active') ) {
            if ( shiftKey && tabKey ) {
                e.preventDefault();
                nav_menu.find("li:last-child > a").focus();
                nav_menu.find("li").last().bind( 'keydown', function(e) {
                    if( !e.shiftKey && e.which === 9 ) {
                        e.preventDefault();
                        $('#masthead').find('.menu-toggle').focus();
                    }
                });
            };
        }
    });

    $('#search').find("button").bind( 'keydown', function(e) {
        var tabKey              = e.keyCode === 9;
        var shiftKey            = e.shiftKey;

        if( tabKey ) {
            e.preventDefault();
            $('#search').removeClass('active');
            search_menu_toggle.removeClass('active');
            search_menu_toggle.focus();
        }
    });

    $('#search').find("input").bind( 'keydown', function(e) {
        var tabKey              = e.keyCode === 9;
        var shiftKey            = e.shiftKey;

        if ( shiftKey && tabKey ) {
            e.preventDefault();
            $('.main-navigation form.search-form input').focus();
            $('#search').removeClass('active');
            search_menu_toggle.removeClass('active');
            search_menu_toggle.focus();
        }
    });

});