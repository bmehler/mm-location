<?php

namespace MM\Location;

add_action('admin_head', 'MM\Location\mm_location_tab_help');

function mm_location_tab_help() {

	$screen = get_current_screen();

	if ( 'location' != $screen->post_type ) {
		return;
	}

	$basics = array(
		'id'      => 'recipe_basics',
		'title'   => 'Recipe Basics',
		'content' => 'Content for help tab here'
	);

	$formatting = array(
		'id'      => 'recipe_formatting',
		'title'   => 'Recipe Formatting',
		'content' => 'Content for help tab here'
	);

	$screen->add_help_tab($basics);
	$screen->add_help_tab($formatting);

}