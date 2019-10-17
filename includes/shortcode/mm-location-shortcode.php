<?php

namespace MM\Location;

function locationShortcode() {

// WP_Query arguments
$args = array (
	'post_type'              => array( 'location' ),
	'post_status'            => array( 'publish' ),
	'order'                  => 'ASC'
);

// The Query
$services = new \WP_Query( $args );

return 'Hello World!';

}

add_shortcode('location', 'MM\Location\locationShortcode');