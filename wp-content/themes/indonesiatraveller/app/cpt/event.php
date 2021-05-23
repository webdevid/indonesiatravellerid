<?php

function cptui_register_my_cpts() {
	/**
	 * Post Type: Events.
	 */

	$labels = array(
		"name" => __( "Events", "cifor-theme" ),
		"singular_name" => __( "Event", "cifor-theme" ),
		'menu_name'          => _x( 'Events', 'admin menu', 'cifor-theme' ),
		'name_admin_bar'     => _x( 'Event', 'add new on admin bar', 'cifor-theme' ),
		'add_new'            => _x( 'Add New', 'Event', 'cifor-theme' ),
		'add_new_item'       => __( 'Add New Event', 'cifor-theme' ),
		'new_item'           => __( 'New Event', 'cifor-theme' ),
		'edit_item'          => __( 'Edit Event', 'cifor-theme' ),
		'view_item'          => __( 'View Event', 'cifor-theme' ),
		'all_items'          => __( 'Events', 'cifor-theme' ),
		'search_items'       => __( 'Search Events', 'cifor-theme' ),
		'parent_item_colon'  => __( 'Parent Events:', 'cifor-theme' ),
		'not_found'          => __( 'No Events found.', 'cifor-theme' ),
		'not_found_in_trash' => __( 'No Events found in Trash.', 'cifor-theme' ),

	);

	$args = array(
		"label" => __( "Events", "cifor-theme" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		'menu_position'	=>	5,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "page",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "event", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-tickets-alt",
		"supports" => array( "title", "editor", "revisions", "thumbnail", "excerpt","page-attributes" ),
		"taxonomies" => array( "category"),
	);

	register_post_type( "event", $args );

	/**
	 * Post Type: Agenda.
	 */

	$labels = array(
		"name" => __( "Agendas", "cifor-theme" ),
		"singular_name" => __( "Agenda", "cifor-theme" ),
		'menu_name'          => _x( 'Agendas', 'admin menu', 'cifor-theme' ),
		'name_admin_bar'     => _x( 'Agenda', 'add new on admin bar', 'cifor-theme' ),
		'add_new'            => _x( 'Add New', 'Agenda', 'cifor-theme' ),
		'add_new_item'       => __( 'Add New Agenda', 'cifor-theme' ),
		'new_item'           => __( 'New Agenda', 'cifor-theme' ),
		'edit_item'          => __( 'Edit Agenda', 'cifor-theme' ),
		'view_item'          => __( 'View Agenda', 'cifor-theme' ),
		'all_items'          => __( 'Agendas', 'cifor-theme' ),
		'search_items'       => __( 'Search Agendas', 'cifor-theme' ),
		'parent_item_colon'  => __( 'Parent Agendas:', 'cifor-theme' ),
		'not_found'          => __( 'No Agendas found.', 'cifor-theme' ),
		'not_found_in_trash' => __( 'No Agendas found in Trash.', 'cifor-theme' ),
	);

	$args = array(
		"label" => __( "Agendas", "cifor-theme" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu"  =>	"edit.php?post_type=event",
		"show_in_nav_menus" => false,
		"exclude_from_search" => false,
		"capability_type" => "page",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => false, // array( "slug" => "agenda", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail","page-attributes"),
	);

	register_post_type( "agenda", $args );

	/**
	 * Post Type: Speakers.
	 */

	$labels = array(
		"name" => __( "Speakers", "cifor-theme" ),
		"singular_name" => __( "Speaker", "cifor-theme" ),
		'menu_name'          => _x( 'Speakers', 'admin menu', 'cifor-theme' ),
		'name_admin_bar'     => _x( 'Speaker', 'add new on admin bar', 'cifor-theme' ),
		'add_new'            => _x( 'Add New', 'Speaker', 'cifor-theme' ),
		'add_new_item'       => __( 'Add New Speaker', 'cifor-theme' ),
		'new_item'           => __( 'New Speaker', 'cifor-theme' ),
		'edit_item'          => __( 'Edit Speaker', 'cifor-theme' ),
		'view_item'          => __( 'View Speaker', 'cifor-theme' ),
		'all_items'          => __( 'Speakers', 'cifor-theme' ),
		'search_items'       => __( 'Search Speakers', 'cifor-theme' ),
		'parent_item_colon'  => __( 'Parent Speakers:', 'cifor-theme' ),
		'not_found'          => __( 'No Speakers found.', 'cifor-theme' ),
		'not_found_in_trash' => __( 'No Speakers found in Trash.', 'cifor-theme' ),
	);

	$args = array(
		"label" => __( "Speakers", "cifor-theme" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu"  =>	"edit.php?post_type=event",
		"show_in_nav_menus" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "speaker", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail","page-attributes" ),
	);

	register_post_type( "speaker", $args );


	/**
	 * Post Type: Session detail.
	 */

	$labels = array(
		"name" => __( "Session detail", "cifor-theme" ),
		"singular_name" => __( "session-detail", "cifor-theme" ),
		'menu_name'          => _x( 'Session detail', 'admin menu', 'cifor-theme' ),
		'name_admin_bar'     => _x( 'Session detail', 'add new on admin bar', 'cifor-theme' ),
		'add_new'            => _x( 'Add New', 'Session detail', 'cifor-theme' ),
		'add_new_item'       => __( 'Add New Session detail', 'cifor-theme' ),
		'new_item'           => __( 'New Session detail', 'cifor-theme' ),
		'edit_item'          => __( 'Edit Session detail', 'cifor-theme' ),
		'view_item'          => __( 'View Session detail', 'cifor-theme' ),
		'all_items'          => __( 'Session detail', 'cifor-theme' ),
		'search_items'       => __( 'Search Session detail', 'cifor-theme' ),
		'parent_item_colon'  => __( 'Parent Session detail:', 'cifor-theme' ),
		'not_found'          => __( 'No Session detail found.', 'cifor-theme' ),
		'not_found_in_trash' => __( 'No Session detail found in Trash.', 'cifor-theme' ),
	);

	$args = array(
		"label" => __( "Session detail", "cifor-theme" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu"  =>	"edit.php?post_type=event",
		"show_in_nav_menus" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "session-detail", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail","page-attributes" ),
	);

	register_post_type( "session-detail", $args );

	/**
	 * Post Type: Organizations.
	 */

	$labels = array(
		"name" => __( "Organizations", "cifor-theme" ),
		"singular_name" => __( "Organization", "cifor-theme" ),
		'menu_name'          => _x( 'Organizations', 'admin menu', 'cifor-theme' ),
		'name_admin_bar'     => _x( 'Organization', 'add new on admin bar', 'cifor-theme' ),
		'add_new'            => _x( 'Add New', 'Organization', 'cifor-theme' ),
		'add_new_item'       => __( 'Add New Organization', 'cifor-theme' ),
		'new_item'           => __( 'New Organization', 'cifor-theme' ),
		'edit_item'          => __( 'Edit Organization', 'cifor-theme' ),
		'view_item'          => __( 'View Organization', 'cifor-theme' ),
		'all_items'          => __( 'Organizations', 'cifor-theme' ),
		'search_items'       => __( 'Search Organizations', 'cifor-theme' ),
		'parent_item_colon'  => __( 'Parent Organizations:', 'cifor-theme' ),
		'not_found'          => __( 'No Organizations found.', 'cifor-theme' ),
		'not_found_in_trash' => __( 'No Organizations found in Trash.', 'cifor-theme' ),
	);

	$args = array(
		"label" => __( "Organizations", "cifor-theme" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu"  =>	"edit.php?post_type=event",
		"show_in_nav_menus" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "organization", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "organization", $args );

	/**
	 * Post Type: Moderator.
	 */

	 /*

	$labels = array(
		"name" => __( "Moderator", "cifor-theme" ),
		"singular_name" => __( "Moderator", "cifor-theme" ),
		'menu_name'          => _x( 'Moderators', 'admin menu', 'cifor-theme' ),
		'name_admin_bar'     => _x( 'Moderator', 'add new on admin bar', 'cifor-theme' ),
		'add_new'            => _x( 'Add New', 'Moderator', 'cifor-theme' ),
		'add_new_item'       => __( 'Add New Moderator', 'cifor-theme' ),
		'new_item'           => __( 'New Moderator', 'cifor-theme' ),
		'edit_item'          => __( 'Edit Moderator', 'cifor-theme' ),
		'view_item'          => __( 'View Moderator', 'cifor-theme' ),
		'all_items'          => __( 'Moderators', 'cifor-theme' ),
		'search_items'       => __( 'Search Moderators', 'cifor-theme' ),
		'parent_item_colon'  => __( 'Parent Moderators:', 'cifor-theme' ),
		'not_found'          => __( 'No Moderators found.', 'cifor-theme' ),
		'not_found_in_trash' => __( 'No Moderators found in Trash.', 'cifor-theme' ),
	);

	$args = array(
		"label" => __( "Moderator", "cifor-theme" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu"  =>	"edit.php?post_type=event",
		"show_in_nav_menus" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "moderator", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "moderator", $args );

	*/

	/**
	 * Post Type: Moderator.
	 */

	$labels = array(
		"name" => __( "Media File", "cifor-theme" ),
		"singular_name" => __( "Media File", "cifor-theme" ),
		'menu_name'          => _x( 'Media Files', 'admin menu', 'cifor-theme' ),
		'name_admin_bar'     => _x( 'Media File', 'add new on admin bar', 'cifor-theme' ),
		'add_new'            => _x( 'Add New', 'Media File', 'cifor-theme' ),
		'add_new_item'       => __( 'Add New Media File', 'cifor-theme' ),
		'new_item'           => __( 'New Media File', 'cifor-theme' ),
		'edit_item'          => __( 'Edit Media File', 'cifor-theme' ),
		'view_item'          => __( 'View Media File', 'cifor-theme' ),
		'all_items'          => __( 'Media Files', 'cifor-theme' ),
		'search_items'       => __( 'Search Media Files', 'cifor-theme' ),
		'parent_item_colon'  => __( 'Parent Media Files:', 'cifor-theme' ),
		'not_found'          => __( 'No Media Files found.', 'cifor-theme' ),
		'not_found_in_trash' => __( 'No Media Files found in Trash.', 'cifor-theme' ),
	);

	$args = array(
		"label" => __( "Media", "cifor-theme" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu"  =>	"edit.php?post_type=event",
		"show_in_nav_menus" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => false, //array( "slug" => "media", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "media", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_taxes_event_group() {
	/**
	 * Taxonomy: Event Groups.
	 */
	$labels = array(
		"name" => __( "Event Groups", "cifor-theme" ),
		"singular_name" => __( "Event Group", "cifor-theme" ),
	);

	$args = array(
		"label" => __( "Event Groups", "cifor-theme" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Event Groups",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => false,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'event_group', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "event_group",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "event_group", array( "event", "agenda", "speaker", "Organization", "moderator", "media" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes_event_group' );



