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
			$country = get_post_meta( $post->ID, 'country', true );
			?>
			<p>Country: <?php echo esc_attr($country) ?>
		<?php
		endwhile;
	endif;
}

add_shortcode('location', 'MM\Location\locationShortcode');