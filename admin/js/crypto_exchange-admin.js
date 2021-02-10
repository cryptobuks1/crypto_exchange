(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 */

	$(document).ready(function() {
		
		// AJAX API KEY SUBMIT
		$('#add_api').submit(function(){
			// var id = $("#api_id").val();
			var url  = ce_local.ajax_url;
			var data = $(this).serialize(); 
				data += '&action=admin_ajax_request&param=save_api';
				
				// console.log(data);
			$.post(url, data, function(result){

				var data = $.parseJSON(result);
				// console.log(result);

				if(data.status == 1){
					alert(data.message);

					setTimeout(function(){
						location.reload();
					}, 1000);
				}
			});

			// console.log(data);

		});

		// delete api info
		$('.btn-delete').click(function(){
			var id = $(this).data('id');
			var url  = ce_local.ajax_url;
			var data = 'action=admin_ajax_request&param=delete_api&api_id='+id;
			console.log(data);
				
			$.post(url, data, function(result){

				var data = $.parseJSON(result);
				console.log(result);
				if(data.status == 1){
					alert(data.message);

					setTimeout(function(){
						location.reload();
					}, 1000);
				}
			});
		});

		// edit api info
		$('.btn-edit').click(function(){
			var id = $(this).data('id');
			var url  = ce_local.ajax_url;
			var data = 'action=admin_ajax_request&param=edit_api&api_id='+id;
			// console.log(data);
				
			$.post(url, data, function(result){

				var data = $.parseJSON(result);
				if(data){
					$('#website').val(data.api_site);
					$('#api_key').val(data.api_key);
					$('#api_id').val(data.ID);
				}
				console.log(data);
				
			});
		});

		// update status api info
		$('.btn-status').click(function(){
			var id = $(this).data('id');
			var status = $(this).data('status');
			var url  = ce_local.ajax_url;
			var data = 'action=admin_ajax_request&param=api_status&api_id='+id+'&api_status='+status;
			console.log(data);
				
			$.post(url, data, function(result){

				var data = $.parseJSON(result);
				if(data.status == 1){
					alert(data.message);

					setTimeout(function(){
						location.reload();
					}, 1000);
				}
			});
		});
	} );

})( jQuery );
