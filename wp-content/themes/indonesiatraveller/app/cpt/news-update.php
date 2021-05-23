<?php
function cptui_register_my_cpts_news_update() {

	/**
	 * Post Type: News Update.
	 */

	$labels = array(
		"name" => __( "News Update", "cifor-theme" ),
		"singular_name" => __( "News Update", "cifor-theme" ),
		'menu_name'          => _x( 'News Update', 'admin menu', 'cifor-theme' ),
		'name_admin_bar'     => _x( 'News Update', 'add new on admin bar', 'cifor-theme' ),
		'add_new'            => _x( 'Add New', 'News Update', 'cifor-theme' ),
		'add_new_item'       => __( 'Add New News Update', 'cifor-theme' ),
		'new_item'           => __( 'New News Update', 'cifor-theme' ),
		'edit_item'          => __( 'Edit News Update', 'cifor-theme' ),
		'view_item'          => __( 'View News Update', 'cifor-theme' ),
		'all_items'          => __( 'News Update', 'cifor-theme' ),
		'search_items'       => __( 'Search News Update', 'cifor-theme' ),
		'parent_item_colon'  => __( 'Parent News Update:', 'cifor-theme' ),
		'not_found'          => __( 'No News Update found.', 'cifor-theme' ),
		'not_found_in_trash' => __( 'No News Update found in Trash.', 'cifor-theme' ),
	);

	$args = array(
		"label" => __( "News update", "cifor-theme" ),
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
		"rewrite" => array( "slug" => "news-update", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor","revisions", "thumbnail", "author" ),
	);

	register_post_type( "news-update", $args );
}

add_action( 'init', 'cptui_register_my_cpts_news_update' );
