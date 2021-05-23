<?php

function cptui_register_megamenu() {
	/**
	 * Post Type: Megamenu.
	 */

	$labels = array(
		"name" => __( "Megamenu", "cifor-theme" ),
		"singular_name" => __( "Megamenu", "cifor-theme" ),
		'menu_name'          => _x( 'Megamenu', 'admin menu', 'cifor-theme' ),
		'name_admin_bar'     => _x( 'Megamenu', 'add new on admin bar', 'cifor-theme' ),
		'add_new'            => _x( 'Add New', 'Megamenu', 'cifor-theme' ),
		'add_new_item'       => __( 'Add New Megamenu', 'cifor-theme' ),
		'new_item'           => __( 'New Megamenu', 'cifor-theme' ),
		'edit_item'          => __( 'Edit Megamenu', 'cifor-theme' ),
		'view_item'          => __( 'View Megamenu', 'cifor-theme' ),
		'all_items'          => __( 'Megamenu', 'cifor-theme' ),
		'search_items'       => __( 'Search Megamenu', 'cifor-theme' ),
		'parent_item_colon'  => __( 'Parent Megamenu:', 'cifor-theme' ),
		'not_found'          => __( 'No Megamenu found.', 'cifor-theme' ),
		'not_found_in_trash' => __( 'No Megamenu found in Trash.', 'cifor-theme' ),

	);

	$args = array(
		"label" => __( "Megamenu", "cifor-theme" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		'menu_position'	=>	6,
		"show_in_nav_menus" => true,
		"exclude_from_search" => true,
		"capability_type" => "page",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "megamenu", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-tickets-alt",
		"supports" => array( "title", "editor","revisions"),
	);

	register_post_type( "megamenu", $args );



}

add_action( 'init', 'cptui_register_megamenu' );





