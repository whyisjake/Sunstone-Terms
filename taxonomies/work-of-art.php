<?php

function work_of_art_init() {
	register_taxonomy( 'work-of-art', array( 'post' ), array(
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
			'name'                       => __( 'Work of arts', 'sunstone-terms' ),
			'singular_name'              => _x( 'Work of art', 'taxonomy general name', 'sunstone-terms' ),
			'search_items'               => __( 'Search work of arts', 'sunstone-terms' ),
			'popular_items'              => __( 'Popular work of arts', 'sunstone-terms' ),
			'all_items'                  => __( 'All work of arts', 'sunstone-terms' ),
			'parent_item'                => __( 'Parent work of art', 'sunstone-terms' ),
			'parent_item_colon'          => __( 'Parent work of art:', 'sunstone-terms' ),
			'edit_item'                  => __( 'Edit work of art', 'sunstone-terms' ),
			'update_item'                => __( 'Update work of art', 'sunstone-terms' ),
			'add_new_item'               => __( 'New work of art', 'sunstone-terms' ),
			'new_item_name'              => __( 'New work of art', 'sunstone-terms' ),
			'separate_items_with_commas' => __( 'Work of arts separated by comma', 'sunstone-terms' ),
			'add_or_remove_items'        => __( 'Add or remove work of arts', 'sunstone-terms' ),
			'choose_from_most_used'      => __( 'Choose from the most used work of arts', 'sunstone-terms' ),
			'not_found'                  => __( 'No work of arts found.', 'sunstone-terms' ),
			'menu_name'                  => __( 'Work of arts', 'sunstone-terms' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'work-of-art',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'work_of_art_init' );
