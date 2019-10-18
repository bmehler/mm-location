<?php

namespace MM\Location;

function locationShortcode() {

	global $post;

	$args = array (
		'post_type'              => array( 'location' ),
		'post_status'            => array( 'publish' ),
		'order'                  => 'ASC'
	);

	$query = new \WP_Query( $args );

	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post(); 
			$country 	= get_post_meta( $post->ID, 'country', true );
			$company 	= get_post_meta( $post->ID, 'company', true );
			$phone 		= get_post_meta( $post->ID, 'phone', true );
			$street		= get_post_meta( $post->ID, 'street', true );
			$city 		= get_post_meta( $post->ID, 'city', true );
			$country 	= get_post_meta( $post->ID, 'country', true );
			$email 		= get_post_meta( $post->ID, 'email', true );
			$maps 		= get_post_meta( $post->ID, 'maps', true );
			?>
			<div>Country: <?php echo esc_attr($country) ?></div>
			<div>Company: <?php echo esc_attr($company) ?></div>
			<div>Phone: <?php echo esc_attr($phone) ?></div>
			<div>Street: <?php echo esc_attr($street) ?></div>
			<div>City: <?php echo esc_attr($city) ?></div>
			<div>Country: <?php echo esc_attr($country) ?></div>
			<div><a href=mailto:<?php echo esc_attr($email) ?>><i class="fa fa-envelope" aria-hidden="true"></i> E-Mail senden</a></div>
			<div><a href=<?php echo esc_attr($maps) ?>><i class="fa fa-globe" aria-hidden="true"></i> Route berechnen</a></div>
		<?php
		endwhile;
	endif;
}

add_shortcode('location', 'MM\Location\locationShortcode');