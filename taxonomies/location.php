<?php

function location_init() {
	register_taxonomy( 'location', array( 'post' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Locations', 'sunstone-terms' ),
			'singular_name'              => _x( 'Location', 'taxonomy general name', 'sunstone-terms' ),
			'search_items'               => __( 'Search locations', 'sunstone-terms' ),
			'popular_items'              => __( 'Popular locations', 'sunstone-terms' ),
			'all_items'                  => __( 'All locations', 'sunstone-terms' ),
			'parent_item'                => __( 'Parent location', 'sunstone-terms' ),
			'parent_item_colon'          => __( 'Parent location:', 'sunstone-terms' ),
			'edit_item'                  => __( 'Edit location', 'sunstone-terms' ),
			'update_item'                => __( 'Update location', 'sunstone-terms' ),
			'add_new_item'               => __( 'New location', 'sunstone-terms' ),
			'new_item_name'              => __( 'New location', 'sunstone-terms' ),
			'separate_items_with_commas' => __( 'Locations separated by comma', 'sunstone-terms' ),
			'add_or_remove_items'        => __( 'Add or remove locations', 'sunstone-terms' ),
			'choose_from_most_used'      => __( 'Choose from the most used locations', 'sunstone-terms' ),
			'not_found'                  => __( 'No locations found.', 'sunstone-terms' ),
			'menu_name'                  => __( 'Locations', 'sunstone-terms' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'location',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'location_init' );
