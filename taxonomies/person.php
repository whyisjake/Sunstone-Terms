<?php

function person_init() {
	register_taxonomy( 'person', array( 'post' ), array(
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
			'name'                       => __( 'People', 'sunstone-terms' ),
			'singular_name'              => _x( 'Person', 'taxonomy general name', 'sunstone-terms' ),
			'search_items'               => __( 'Search people', 'sunstone-terms' ),
			'popular_items'              => __( 'Popular people', 'sunstone-terms' ),
			'all_items'                  => __( 'All people', 'sunstone-terms' ),
			'parent_item'                => __( 'Parent person', 'sunstone-terms' ),
			'parent_item_colon'          => __( 'Parent person:', 'sunstone-terms' ),
			'edit_item'                  => __( 'Edit person', 'sunstone-terms' ),
			'update_item'                => __( 'Update person', 'sunstone-terms' ),
			'add_new_item'               => __( 'New person', 'sunstone-terms' ),
			'new_item_name'              => __( 'New person', 'sunstone-terms' ),
			'separate_items_with_commas' => __( 'People separated by comma', 'sunstone-terms' ),
			'add_or_remove_items'        => __( 'Add or remove people', 'sunstone-terms' ),
			'choose_from_most_used'      => __( 'Choose from the most used people', 'sunstone-terms' ),
			'not_found'                  => __( 'No people found.', 'sunstone-terms' ),
			'menu_name'                  => __( 'People', 'sunstone-terms' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'person',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'person_init' );
