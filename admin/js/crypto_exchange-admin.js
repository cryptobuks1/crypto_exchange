(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 */

	$(document).ready(function() {
		
		// AJAX API KEY SUBMIT
		$('#add_api').submit(function(event){
			var url = ce_local.ajax_url;
			var data = 'action=admin_ajax_request&param=First_Ajax';
			$.post(url, data, function(result){
				console.log(result);
				alert(result);
			});

			event.preventDefault();
		});
	} );

})( jQuery );
