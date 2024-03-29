( function( api ) {

	// Extends our custom "electronic-supermarket" section.
	api.sectionConstructor['electronic-supermarket'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );