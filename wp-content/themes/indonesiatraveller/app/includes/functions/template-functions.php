<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package cifor-icraf
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cifor_icraf_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'cifor_icraf_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cifor_icraf_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'cifor_icraf_pingback_header' );


function wpe_opengraph(){
	global $post;
	$vars   = $GLOBALS['wp_query']->query_vars;

	$arg = array();
	if(isset($post->post_title)){

		if ( is_front_page() && is_home() ) {

				// Default homepage
				$arg['title']		= get_option('blogname').' - '.get_option('blogdescription');
				$arg['description']	= get_option('blogdescription');
				$arg['link']		= get_option('home');
				$arg['image']		=	wp_get_attachment_image_url(get_post_thumbnail_id($post->ID), array(600,400));
			} elseif ( is_front_page()){

				// Static homepage
				$arg['title']		= get_option('blogname').' - '.get_option('blogdescription');
				$arg['description']	= get_option('blogdescription');
				$arg['link']		= get_option('home');
				$arg['image']		= wp_get_attachment_image_url(get_post_thumbnail_id($post->ID), array(600,400));
			} elseif ( is_home()){
				$arg['title']		= get_option('blogname').' - '.get_option('blogdescription');
				$arg['description']	= get_option('blogdescription');
				$arg['link']		= get_option('home');
				$arg['image']		= wp_get_attachment_image_url(get_post_thumbnail_id($post->ID), array(600,400));

			} else {

				// Everything else
				$arg['title']		= 	wp_strip_all_tags($post->post_title) . ' - ' .get_option('blogname');
				$arg['description']	= 	isset($post->post_excerpt) ? $post->post_excerpt : wp_trim_words(wp_strip_all_tags($post->post_content));
				$arg['link']		=	get_the_permalink($post->ID);
				$arg['image']		=	wp_get_attachment_image_url(get_post_thumbnail_id($post->ID), array(600,400));

				if($arg['description']==''){
					$arg['description']  = wp_strip_all_tags(carbon_get_post_meta($post->ID,'data_description'));
				}
				if($arg['description']==''){
					$arg['description']  = get_option('blogname').' - '.get_option('blogdescription');
				}
				if($arg['image']==''){
					$arg['image']		=	wp_get_attachment_image_url(carbon_get_post_meta($post->ID,'data_image'), array(600,400));
					$arg['image']		=	trim($arg['image'])!='' ? $arg['image'] : wp_get_attachment_image_url(carbon_get_post_meta($post->ID,'hero_background'), array(600,400));
				}
		}


	}else{
		$arg = array(
			'title'=> get_option('blogname').' - '.get_option('blogdescription'),
			'description'=> get_option('blogdescription'),
			'link'=>get_option('home'),
			'image'=> '',
		);
	}
	?>
	<link rel="icon" href="img/favicon.png">

	<meta name="description" content="CIFOR is a non-profit, scientific institution that conducts research on forest and landscape management globally. CIFOR aims to improve human well-being, protect the environment, and increase equity.">
	<meta name="robots" content="index, follow">
	<meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
	<meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">

	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="CIFOR-ICRAF">
	<meta property="og:title" content="<?php echo $arg['title']; ?>" />
	<meta property="og:description" content="<?php echo $arg['description']; ?>" />
	<meta property="og:image" content="<?php echo $arg['image']; ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo $arg['link']; ?>" />

	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="<?php echo $arg['link']; ?>">
	<meta name="twitter:title" content="<?php echo $arg['title']; ?>">
	<meta name="twitter:description" content="<?php echo $arg['description']; ?>">
	<meta name="twitter:image" content="<?php echo $arg['image']; ?>">
	<?php /*
	<link rel="dns-prefetch" href="//i0.wp.com">
	<link rel="dns-prefetch" href="//i1.wp.com">
	<link rel="dns-prefetch" href="//i2.wp.com">
	<link rel="dns-prefetch" href="//i3.wp.com">
	*/ ?>
	<link rel="dns-prefetch" href="//cdn.jsdelivr.net">
	<?php
}

add_action('wp_head','wpe_opengraph');
