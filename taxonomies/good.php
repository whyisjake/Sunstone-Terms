<?php

function good_init() {
	register_taxonomy( 'good', array( 'post' ), array(
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
			'name'                       => __( 'Goods', 'sunstone-terms' ),
			'singular_name'              => _x( 'Good', 'taxonomy general name', 'sunstone-terms' ),
			'search_items'               => __( 'Search goods', 'sunstone-terms' ),
			'popular_items'              => __( 'Popular goods', 'sunstone-terms' ),
			'all_items'                  => __( 'All goods', 'sunstone-terms' ),
			'parent_item'                => __( 'Parent good', 'sunstone-terms' ),
			'parent_item_colon'          => __( 'Parent good:', 'sunstone-terms' ),
			'edit_item'                  => __( 'Edit good', 'sunstone-terms' ),
			'update_item'                => __( 'Update good', 'sunstone-terms' ),
			'add_new_item'               => __( 'New good', 'sunstone-terms' ),
			'new_item_name'              => __( 'New good', 'sunstone-terms' ),
			'separate_items_with_commas' => __( 'Goods separated by comma', 'sunstone-terms' ),
			'add_or_remove_items'        => __( 'Add or remove goods', 'sunstone-terms' ),
			'choose_from_most_used'      => __( 'Choose from the most used goods', 'sunstone-terms' ),
			'not_found'                  => __( 'No goods found.', 'sunstone-terms' ),
			'menu_name'                  => __( 'Goods', 'sunstone-terms' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'good',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'good_init' );
