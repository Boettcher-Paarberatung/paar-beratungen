/* global Modernizr */

// config
require.config( {
	paths: {
		jquery:              'assets/js/fix.jquery',
		underscore:          'assets/js/fix.underscore',
		bootstrapAffix:      'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/affix',
		bootstrapAlert:      'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/alert',
		bootstrapButton:     'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/button',
		bootstrapCarousel:   'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/carousel',
		bootstrapCollapse:   'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/collapse',
		bootstrapDropdown:   'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/dropdown',
		bootstrapModal:      'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/modal',
		bootstrapPopover:    'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/popover',
		bootstrapScrollspy:  'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/scrollspy',
		bootstrapTab:        'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/tab',
		bootstrapTooltip:    'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/tooltip',
		bootstrapTransition: 'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/transition',
	},
	shim: {
		bootstrapAffix: {
			deps: [
				'jquery'
			]
		},
		bootstrapAlert: {
			deps: [
				'jquery'
			]
		},
		bootstrapButton: {
			deps: [
				'jquery'
			]
		},
		bootstrapCarousel: {
			deps: [
				'jquery'
			]
		},
		bootstrapCollapse: {
			deps: [
				'jquery',
				'bootstrapTransition'
			]
		},
		bootstrapDropdown: {
			deps: [
				'jquery'
			]
		},
		bootstrapPopover: {
			deps: [
				'jquery'
			]
		},
		bootstrapScrollspy: {
			deps: [
				'jquery'
			]
		},
		bootstrapTab: {
			deps: [
				'jquery'
			]
		},
		bootstrapTooltip: {
			deps: [
				'jquery'
			]
		},
		bootstrapTransition: {
			deps: [
				'jquery'
			]
		},
	}
} );

require.config( {
	baseUrl: MentalPressVars.pathToTheme
} );

require( [
		'jquery',
		'underscore',
		'assets/js/SimpleMap',
		'assets/js/TouchDropdown',
		'bootstrapCarousel',
		'bootstrapCollapse',
		'bootstrapTooltip',
	], function ( $, _, SimpleMap ) {
	'use strict';

	/**
	 * remove the attributes and classes from collapsible navbar when the window is resized
	 */
	$( window ).on( 'resize', _.debounce( function () {
		if ( Modernizr.mq( '(min-width: 992px)' ) ) {
			$( '#mentalpress-navbar-collapse' )
				.removeAttr( 'style' )
				.removeClass( 'in' );
		}
	}, 500 ) );

	/**
	 * Maps
	 */
	$( '.js-where-we-are' ).each( function () {
		new SimpleMap( $( this ), {
			latLng:  $( this ).data( 'latlng' ),
			markers: $( this ).data( 'markers' ),
			zoom:    $( this ).data( 'zoom' ),
			type:    $( this ).data( 'type' ),
			styles:  $( this ).data( 'style' ),
		}).renderMap();
	} );

	/**
	 * Footer widgets fix
	 */
	$( '[class*="col-md-%d"]' ).removeClass( 'col-md-%d' ).addClass( 'col-md-3' );

	/**
	 * Tooltips from BS
	 */
	$( '[data-toggle="tooltip"]' ).tooltip();

	/**
	 * Height of .top__background element
	 */
	(function setTopBgHeight() {
		$( '.js-top-bg' ).height( $( '.js-top-bar' ).height() );
	})();
} );