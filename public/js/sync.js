
jQuery(function($){
    $('#btn-test-connect').click(function() {
		var $btn_test = $(this);
		$btn_test.button('loading');
		
		$.ajax({
			url: $('#con_host').val(),
			data: {
				command: 'test',
				con_user: $('#con_user').val(),
				con_password: $('#con_password').val(),
				con_database: $('#con_database').val()
			},
			dataType: "jsonp",
			
			success: function(data) {
				var $modal = $('#test-result-modal');
				$modal.find('.modal-body').empty().append(data.message);
			},
			
			// code to run if the request fails; the raw request and
			// status codes are passed to the function
			error: function( xhr, status ) {
				alert( "Sorry, there was a problem!" );
				console.debug(status);
			},

			// code to run regardless of success or failure
			complete: function( xhr, status ) {
				$('#btn-test-connect').button('reset');
				var $modal = $('#test-result-modal');
				$modal.modal('show');
			}
		});
	});
});