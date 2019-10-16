(function($) {

	// we create a copy of the WP inline edit post function
	var $wp_inline_edit = inlineEditPost.edit;

	// and then we overwrite the function with our own code
	inlineEditPost.edit = function( id ) {

		// "call" the original WP edit function
		// we don't want to leave WordPress hanging
		$wp_inline_edit.apply( this, arguments );

		// now we take care of our business

		// get the post ID
		var $post_id = 0;
		if ( typeof( id ) == 'object' ) {
			$post_id = parseInt( this.getId( id ) );
			console.log($post_id);
		}

		if ( $post_id > 0 ) {
			// define the edit row
			var $edit_row = $( '#edit-' + $post_id );
			var $post_row = $( '#post-' + $post_id );

			//console.log('editrow', $edit_row);
			//console.log('editpost', $post_row);

			// get the data
			var $country	= 	$('.country', $post_row).text();
			var $company 	= 	$('.company', $post_row).text();
			var $phone 		= 	$('.phone', $post_row).text();
			var $street		= 	$('.street', $post_row).text();
			var $city 		= 	$('.city', $post_row).text();
			var $email 		= 	$('.email', $post_row).text();
			var $maps 		= 	$('.maps', $post_row).text();

			// populate the data
			$(':input[name="country"]', $edit_row).val($country);
			$(':input[name="mm-quick-edit-company"]', $edit_row).val($company);
			$(':input[name="mm-quick-edit-phone"]', $edit_row).val($phone);
			$(':input[name="mm-quick-edit-street"]', $edit_row).val($street);
			$(':input[name="mm-quick-edit-city"]', $edit_row).val($city);
			$(':input[name="mm-quick-edit-email"]', $edit_row).val($email);
			$(':input[name="mm-quick-edit-maps"]', $edit_row).val($maps);

			$(':input[name="country"]', $edit_row).attr('value', $country);

			//console.log('.country', $country);
		}
	};

})(jQuery);