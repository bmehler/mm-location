<?php

namespace MM\Location;

/**
 * Register a location post type.
 */

add_action( 'init', 'MM\Location\location_posttype' );

function location_posttype() {
	$labels = array(
        'name'                  => _x('Locations', 'post Type General Name', 'mm-location'),
        'singular_name'         => _x('Location', 'post Type Singular Name', 'mm-location'),
        'menu_name'             => __('Location', 'mm-location'),
        'name_admin_bar'        => __('Location', 'add new on admin bar', 'mm-location'),
        'archives'              => __('Item Archives', 'mm-location'),
        'parent_item_colon'     => __('Parent Item', 'mm-location'),
        'all_items'             => __('All Locations', 'mm-location'),
        'add_new_item'          => __('Add New Location', 'mm-location'),
        'add_new'               => __('Add New', 'Location', 'mm-location'),
        'new_item'              => __('New Location', 'mm-location'),
        'edit_item'             => __('Edit Location', 'mm-location'),
        'update_item'           => __('Update Location', 'mm-location'),
        'view_item'             => __('View Location', 'mm-location'),
        'search_items'          => __('Search Locations', 'mm-location'),
        'not_found'             => __('Not Found', 'mm-location'),
        'not_found_in_trash'    => __('Not Found In Trash', 'mm-location'),
	);

	$args = array(
        'labels'             => $labels,
		'description'        => __('Description.', 'mm-location'),
		'public'             => true,
        'publicly_queryable' => true,
        'menu_icon'          => 'dashicons-admin-home',   
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
        'supports'           => array('title', 'thumbnail'),
        'rewrite'            => array('slug' => 'location'),
        'taxonomies'         => array(''),
        'has_archive'        => true,		
        'exclude_from_search'=> false
    );

	register_post_type('location', $args);
}