( function( window, document ) {
  function electronic_supermarket_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const electronic_supermarket_nav = document.querySelector( '.sidenav' );
      if ( ! electronic_supermarket_nav || ! electronic_supermarket_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...electronic_supermarket_nav.querySelectorAll( 'input, a, button' )],
        electronic_supermarket_lastEl = elements[ elements.length - 1 ],
        electronic_supermarket_firstEl = elements[0],
        electronic_supermarket_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && electronic_supermarket_lastEl === electronic_supermarket_activeEl ) {
        e.preventDefault();
        electronic_supermarket_firstEl.focus();
      }
      if ( shiftKey && tabKey && electronic_supermarket_firstEl === electronic_supermarket_activeEl ) {
        e.preventDefault();
        electronic_supermarket_lastEl.focus();
      }
    } );
  }
  electronic_supermarket_keepFocusInMenu();
} )( window, document );