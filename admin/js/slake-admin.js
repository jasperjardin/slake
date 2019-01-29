jQuery(document).ready( function($) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

 	// multiple select
	var select2_sort = [{}];
	var $select2_default_order = slake_get_order( $( '.slake_select2.sortable option' ) );
	var $select2_order         = $( '.slake_select2_order' );
	var $select2_options       = $( '.slake_select2.sortable + .select2 ul.select2-selection__rendered.ui-sortable li' )

	$( '.slake_select2' ).select2();

	$( '.slake_select2.sortable + .select2 ul.select2-selection__rendered' ).sortable({
		containment: 'parent'
	}).disableSelection();

	$( '.slake_select2.sortable + .select2 ul.select2-selection__rendered.ui-sortable li' ).each(function( index ) {
		if ( $( this ).hasClass( 'select2-selection__choice' ) ) {
			$( this ).attr( 'data-order', $select2_default_order[index] );
		}
	});
	setTimeout(apply_order, 50);

	function apply_order() {
		$(document).on( 'mouseleave', '.slake_select2.sortable + .select2 ul.select2-selection__rendered.ui-sortable li', function(){
			var order = [];
			var order_to_string = '';

			$(this).parent().find(".select2-selection__choice").each(function( index ) {
				var data_order = $( this ).attr( 'data-order' );

				if ( !isNaN(data_order) ) {
					order.push( data_order );
				}

			});

			order_to_string = order.toString();

			$(this).parents('.select2').prev('.slake_select2').parent().find('.slake_select2_order').attr('value', order_to_string);

		});

		console.log( $(this).parents('.select2').prev('.slake_select2').parent().find('.slake_select2_order').attr('value'));
	}

	function slake_get_order( $selector ) {
		var idsInOrder = [];
		$selector.each(function() {
			idsInOrder.push( $( this ).attr( 'data-order' ) )
		});

		return idsInOrder;
	}


});
