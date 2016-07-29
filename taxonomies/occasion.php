<?php

function occasion_init() {
	register_taxonomy( 'occasion', array( 'post' ), array(
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
			'name'                       => __( 'Occasions', 'sunstone-terms' ),
			'singular_name'              => _x( 'Occasion', 'taxonomy general name', 'sunstone-terms' ),
			'search_items'               => __( 'Search occasions', 'sunstone-terms' ),
			'popular_items'              => __( 'Popular occasions', 'sunstone-terms' ),
			'all_items'                  => __( 'All occasions', 'sunstone-terms' ),
			'parent_item'                => __( 'Parent occasion', 'sunstone-terms' ),
			'parent_item_colon'          => __( 'Parent occasion:', 'sunstone-terms' ),
			'edit_item'                  => __( 'Edit occasion', 'sunstone-terms' ),
			'update_item'                => __( 'Update occasion', 'sunstone-terms' ),
			'add_new_item'               => __( 'New occasion', 'sunstone-terms' ),
			'new_item_name'              => __( 'New occasion', 'sunstone-terms' ),
			'separate_items_with_commas' => __( 'Occasions separated by comma', 'sunstone-terms' ),
			'add_or_remove_items'        => __( 'Add or remove occasions', 'sunstone-terms' ),
			'choose_from_most_used'      => __( 'Choose from the most used occasions', 'sunstone-terms' ),
			'not_found'                  => __( 'No occasions found.', 'sunstone-terms' ),
			'menu_name'                  => __( 'Occasions', 'sunstone-terms' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'occasion',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'occasion_init' );
