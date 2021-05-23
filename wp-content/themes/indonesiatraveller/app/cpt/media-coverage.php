<?php
function cptui_register_my_cpts_media_coverage() {

	/**
	 * Post Type: Media coverages.
	 */

	$labels = array(
		"name" => __( "Media coverage", "cifor-theme" ),
		"singular_name" => __( "Media coverage", "cifor-theme" ),
		'menu_name'          => _x( 'Media coverage', 'admin menu', 'cifor-theme' ),
		'name_admin_bar'     => _x( 'Media coverage', 'add new on admin bar', 'cifor-theme' ),
		'add_new'            => _x( 'Add New', 'Media coverage', 'cifor-theme' ),
		'add_new_item'       => __( 'Add New Media coverage', 'cifor-theme' ),
		'new_item'           => __( 'New Media coverage', 'cifor-theme' ),
		'edit_item'          => __( 'Edit Media coverage', 'cifor-theme' ),
		'view_item'          => __( 'View Media coverage', 'cifor-theme' ),
		'all_items'          => __( 'Media coverage', 'cifor-theme' ),
		'search_items'       => __( 'Search Media coverage', 'cifor-theme' ),
		'parent_item_colon'  => __( 'Parent Media coverage:', 'cifor-theme' ),
		'not_found'          => __( 'No Media coverage found.', 'cifor-theme' ),
		'not_found_in_trash' => __( 'No Media coverage found in Trash.', 'cifor-theme' ),
	);

	$args = array(
		"label" => __( "Media coverage", "cifor-theme" ),
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
		"rewrite" => array( "slug" => "media-coverage", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "excerpt","revisions", "custom-fields", "revisions", "thumbnail", "author", "post-formats" ),
	);

	register_post_type( "media-coverage", $args );
}

add_action( 'init', 'cptui_register_my_cpts_media_coverage' );
