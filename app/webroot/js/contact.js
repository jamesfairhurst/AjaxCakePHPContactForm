$( document ).ready( function() {

	// Take over the submit action
	// attached to the body as the ajax call will replace the form 
	// and otherwise the onsubmit handler will be lost
	$('body').on('submit','#ContactIndexForm', function(e){

		// Update submit text to indicate something is happening
		$('.submit :input').val('Loading');

		// Post the form using the form's action and data
		$.post($(this).attr('action'), $(this).serialize())
		// called when post has finished
		.done(function(data) {
			// inject returned html into page
			$('#content').html(data);
		})
		// called on failure
		.fail(function(data) {
			// Flash message already on page
			if ($('#flashMessage').length) {
				// Fade out flash message
				$('#flashMessage').fadeOut('fast', function(){
					// Remove from page
					$(this).remove();
					// Inject another flash message
					$('h2').before('<div class="message" id="flashMessage">An Ajax error occured, please try again or refresh</div>');
				});
			} else {
				// Inject flash message
				$('h2').before('<div class="message" id="flashMessage">An Ajax error occured, please try again or refresh</div>');
			}
		});

	// return false to stop the page from posting normally
	return false;
	});

});