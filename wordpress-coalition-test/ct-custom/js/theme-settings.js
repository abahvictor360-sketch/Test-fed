/**
 * File theme-settings.js.
 *
 * Opens the media library to pick the logo on the Theme Settings page.
 */
( function( $ ) {
	var frame;

	$( document ).on( 'click', '.ct-logo-upload', function( event ) {
		var $field = $( this ).closest( '.ct-logo-field' );

		event.preventDefault();

		frame = wp.media( {
			title: 'Select Logo',
			button: { text: 'Use this logo' },
			library: { type: 'image' },
			multiple: false
		} );

		frame.on( 'select', function() {
			var image = frame.state().get( 'selection' ).first().toJSON();
			var url = image.sizes && image.sizes.medium ? image.sizes.medium.url : image.url;

			$field.find( '#ct-logo' ).val( image.id );
			$field.find( '.ct-logo-preview' ).attr( 'src', url ).show();
			$field.find( '.ct-logo-remove' ).show();
		} );

		frame.open();
	} );

	$( document ).on( 'click', '.ct-logo-remove', function( event ) {
		var $field = $( this ).closest( '.ct-logo-field' );

		event.preventDefault();
		$field.find( '#ct-logo' ).val( '' );
		$field.find( '.ct-logo-preview' ).attr( 'src', '' ).hide();
		$( this ).hide();
	} );
}( jQuery ) );
