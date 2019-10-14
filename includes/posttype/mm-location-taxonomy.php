<?php

namespace MM\Location;

/**
 * Register a location taxonomy.
 */

add_action( 'init', 'MM\Location\location_taxonomies', 0 );

function location_taxonomies() {
	$labels = array(
		'name'              			=> _x('Genres', 'taxonomy general name', 'mm-location'),
		'singular_name'     			=> _x('Genre', 'taxonomy singular name', 'mm-location'),
		'search_items'      			=> __('Search Genres', 'mm-location'),
		'all_items'         			=> __('All Genres', 'mm-location'),
		'parent_item'       			=> __('Parent Genre', 'mm-location'),
		'parent_item_colon' 			=> __('Parent Genre:', 'mm-location'),
		'edit_item'         			=> __('Edit Genre', 'mm-location'),
		'update_item'       			=> __('Update Genre', 'mm-location'),
		'add_new_item'      			=> __('Add New Genre', 'mm-location'),
		'new_item_name'     			=> __('New Genre Name', 'mm-location'),
		'menu_name'         			=> __('Genre', 'mm-location'),
		'separate_items_with_commas'  	=> __( 'Elemente mit Komma trennen', 'mm-location'),
        'search_items'               	=> __( 'Genre suchen', 'mm-location'),
        'add_or_remove_items'         	=> __( 'Genre hinzufügen oder entfernen','mm-location'),
        'choose_from_most_used'       	=> __( 'Am häufigsten verwendet', 'mm-location'),
		'not_found'                   	=> __( 'Nicht gefunden', 'mm-location'),
	);

	$args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
		'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
		'query_var'         => true,
		'public'            => true,
		'update_count_callback' => '_update_post_term_count'
	);

    register_taxonomy('genre', array('location'), $args);
};