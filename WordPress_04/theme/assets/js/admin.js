/**
 * Utilities for the administration when using ProteusThemes products
 */

jQuery( document ).ready( function( $ ) {
	'use strict';

	/**
	 * Replace 'ProteusThemes: ' with the logo image in the titles of the widgets
	 */
	var ptSearchReplace = function ( $el, searchFor ) {
		if ( _.isUndefined( searchFor ) ) {
			searchFor = 'ProteusThemes: ';
		}

		var expression = new RegExp( searchFor );

		$el.html(
			$el.html().replace(
				expression,
				'<img src="' + MentalPressAdminVars.pathToTheme + '/assets/images/pt.svg" width="15" height="15" alt="PT" class="proteusthemes-widget-logo" style="position: relative; top: 2px; margin-right: 4px;" /> '
			)
		);
	};

	// For appearance > widgets only
	$( '.widget-title > h3' ).each( function() {
		ptSearchReplace( $( this ) );
	} );

	// Same, but inside page builder
	$( document ).on( 'panels_setup panelsopen', function() {
		$( this ).find( '#siteorigin-panels-metabox .title > h4, .so-title-bar .widget-name' ).each( function () {
			ptSearchReplace( $( this ) );
		} );
	} );

	// Same, but inside appearance > customize > widgets
	$( document ).on( 'widget-added', function() {
		$( this ).find( '.widget-title > h3' ).each( function () {
			ptSearchReplace( $( this ) );
		} );
	} );

	// Same, but inside customizer: [PT] Theme Options title
	$( 'body' ).ready( function () {
		$( '.accordion-section > .accordion-section-title' ).each( function () {
			ptSearchReplace( $( this ), '\\[PT\\] ' );
		} );
	} );


	/**
	 * Select Icon on Click
	 */
	$( 'body' ).on( 'click', '.js-selectable-icon', function ( ev ) {
		ev.preventDefault();
		var $this = $( this );
		$this.siblings( '.js-icon-input' ).val( $this.data( 'iconname' ) );
	} );


	/**
	 * Compatibility for the Page Builder, fixes bug that PB is hidden after page loads
	 */
	if ( $( '#wp-acf_settings-wrap' ).hasClass( 'html-active' ) && $( '#so-panels-panels' ).length > 0 ) {
		$('#wp-acf_settings-wrap').removeClass('html-active');
		$('#wp-acf_settings-wrap').addClass('pb-active');
	}


	/**
	 * Color picker
	 */
	// $( '.js-pt-color-picker' ).wpColorPicker();

} );