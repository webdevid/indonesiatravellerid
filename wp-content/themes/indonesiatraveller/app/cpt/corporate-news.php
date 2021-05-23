<?php
function cptui_register_my_cpts_corporate_news() {

	/**
	 * Post Type: Corporate News.
	 */

	$labels = array(
		"name" => __( "Corporate news", "cifor-theme" ),
		"singular_name" => __( "Corporate news", "cifor-theme" ),
		'menu_name'          => _x( 'Corporate news', 'admin menu', 'cifor-theme' ),
		'name_admin_bar'     => _x( 'Corporate news', 'add new on admin bar', 'cifor-theme' ),
		'add_new'            => _x( 'Add New', 'Corporate news', 'cifor-theme' ),
		'add_new_item'       => __( 'Add New Corporate news', 'cifor-theme' ),
		'new_item'           => __( 'New Corporate news', 'cifor-theme' ),
		'edit_item'          => __( 'Edit Corporate news', 'cifor-theme' ),
		'view_item'          => __( 'View Corporate news', 'cifor-theme' ),
		'all_items'          => __( 'Corporate news', 'cifor-theme' ),
		'search_items'       => __( 'Search Corporate news', 'cifor-theme' ),
		'parent_item_colon'  => __( 'Parent Corporate news:', 'cifor-theme' ),
		'not_found'          => __( 'No Corporate news found.', 'cifor-theme' ),
		'not_found_in_trash' => __( 'No Corporate news found in Trash.', 'cifor-theme' ),
	);

	$args = array(
		"label" => __( "Corporate news", "cifor-theme" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu"  =>	"edit.php",
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "corporate-news", "with_front" => true ),
		"query_var" => true,
		'can_export'            => true,
		"supports" => array(  "title", "editor","revisions", "thumbnail", "excerpt","page-attributes" ),
	);

	register_post_type( "corporate-news", $args );
}

add_action( 'init', 'cptui_register_my_cpts_corporate_news', 0 );
