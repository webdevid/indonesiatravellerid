<?php
function cptui_register_my_cpts_press_release() {

	/**
	 * Post Type: press release.
	 */

	$labels = array(
		"name" => __( "Press release", "cifor-theme" ),
		"singular_name" => __( "Press release", "cifor-theme" ),
		'menu_name'          => _x( 'Press release', 'admin menu', 'cifor-theme' ),
		'name_admin_bar'     => _x( 'Press release', 'add new on admin bar', 'cifor-theme' ),
		'add_new'            => _x( 'Add New', 'Press release', 'cifor-theme' ),
		'add_new_item'       => __( 'Add New Press release', 'cifor-theme' ),
		'new_item'           => __( 'New Press release', 'cifor-theme' ),
		'edit_item'          => __( 'Edit Press release', 'cifor-theme' ),
		'view_item'          => __( 'View Press release', 'cifor-theme' ),
		'all_items'          => __( 'Press release', 'cifor-theme' ),
		'search_items'       => __( 'Search Press release', 'cifor-theme' ),
		'parent_item_colon'  => __( 'Parent Press release:', 'cifor-theme' ),
		'not_found'          => __( 'No Press release found.', 'cifor-theme' ),
		'not_found_in_trash' => __( 'No Press release found in Trash.', 'cifor-theme' ),
	);

	$args = array(
		"label" => __( "Press release", "cifor-theme" ),
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
		"rewrite" => array( "slug" => "press-release", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "excerpt","revisions", "custom-fields", "revisions", "thumbnail", "author", "post-formats" ),
	);

	register_post_type( "press-release", $args );
}

add_action( 'init', 'cptui_register_my_cpts_press_release' );
