( function( window, document ) {
  function luxury_hotels_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const luxury_hotels_nav = document.querySelector( '.sidenav' );
      if ( ! luxury_hotels_nav || ! luxury_hotels_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...luxury_hotels_nav.querySelectorAll( 'input, a, button' )],
        luxury_hotels_lastEl = elements[ elements.length - 1 ],
        luxury_hotels_firstEl = elements[0],
        luxury_hotels_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && luxury_hotels_lastEl === luxury_hotels_activeEl ) {
        e.preventDefault();
        luxury_hotels_firstEl.focus();
      }
      if ( shiftKey && tabKey && luxury_hotels_firstEl === luxury_hotels_activeEl ) {
        e.preventDefault();
        luxury_hotels_lastEl.focus();
      }
    } );
  }
  luxury_hotels_keepFocusInMenu();
} )( window, document );