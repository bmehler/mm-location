<?php

namespace MM\Location;

function location_columns( $columns ) {

	$columns = array(
            'title'             => __( 'Title', 'mm-location' ),
            'country'           => __('Country', 'mm-location'),
            'company'           => __('Company', 'mm-location'),
            'phone'             => __('Phone', 'mm-location'),
            'street'            => __('Street', 'mm-location'),
            'city'              => __('City', 'mm-location'),
            'email'             => __('E-Mail', 'mm-location'),
            'maps'              => __('Maps', 'mm-location'),
            'thumbnail'         => __('Thumbnail', 'mm-location'),
	);

	return $columns;
}

add_filter( 'manage_edit-location_columns', 'MM\Location\location_columns') ;

function show_location_columns($column_name) {
    global $post;
    switch ($column_name) {
        case 'title':
            $title = get_post_meta($post->ID, 'title', true);
            echo $title;
        break;
        case 'country':
            $country = get_post_meta($post->ID, 'country', true);
            echo $country;
            break;
        case 'company':
            $company = get_post_meta($post->ID, 'company', true);
            echo $company;
            break;
        case 'phone':
            $phone = get_post_meta($post->ID, 'phone', true);
            echo $phone;
            break;
        case 'street':
            $street = get_post_meta($post->ID, 'street', true);
            echo $street;
            break;
        case 'city':
            $city = get_post_meta($post->ID, 'city', true);
            echo $city;
            break;
        case 'email':
            $description = get_post_meta($post->ID, 'email', true);
            echo $email;
            break;
        case 'maps':
            $maps = get_post_meta($post->ID, 'maps', true);
            echo $maps;
            break;
        case 'thumbnail':
            $thumbnail = get_the_post_thumbnail($post->ID,  array( 80, 45));
            echo $thumbnail;
            break;
         case 'genre':
            $genre = get_the_term_list($post->ID, 'genre');
            echo $genre;
            break;
    }
}

add_action('manage_posts_custom_column',  'MM\Location\show_location_columns');

function location_sortable_columns() {
  return array(
    'genre'   => 'genre',
  );
}

add_filter( 'manage_edit-video_sortable_columns', 'MM\Location\location_sortable_columns' );