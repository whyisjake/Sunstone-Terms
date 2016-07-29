<?php

function organization_init() {
	register_taxonomy( 'organization', array( 'post' ), array(
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
			'name'                       => __( 'Organizations', 'sunstone-terms' ),
			'singular_name'              => _x( 'Organization', 'taxonomy general name', 'sunstone-terms' ),
			'search_items'               => __( 'Search organizations', 'sunstone-terms' ),
			'popular_items'              => __( 'Popular organizations', 'sunstone-terms' ),
			'all_items'                  => __( 'All organizations', 'sunstone-terms' ),
			'parent_item'                => __( 'Parent organization', 'sunstone-terms' ),
			'parent_item_colon'          => __( 'Parent organization:', 'sunstone-terms' ),
			'edit_item'                  => __( 'Edit organization', 'sunstone-terms' ),
			'update_item'                => __( 'Update organization', 'sunstone-terms' ),
			'add_new_item'               => __( 'New organization', 'sunstone-terms' ),
			'new_item_name'              => __( 'New organization', 'sunstone-terms' ),
			'separate_items_with_commas' => __( 'Organizations separated by comma', 'sunstone-terms' ),
			'add_or_remove_items'        => __( 'Add or remove organizations', 'sunstone-terms' ),
			'choose_from_most_used'      => __( 'Choose from the most used organizations', 'sunstone-terms' ),
			'not_found'                  => __( 'No organizations found.', 'sunstone-terms' ),
			'menu_name'                  => __( 'Organizations', 'sunstone-terms' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'organization',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'organization_init' );
