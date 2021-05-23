<?php

if (!function_exists('wpe_theme_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wpe_theme_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wpe-theme, use a find and replace
		 * to change 'wpe-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('wpe-theme', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'menu-top' => esc_html__('Top', 'wpe-theme'),
			'menu-main' => esc_html__('Main', 'wpe-theme'),
			'menu-mobile' => esc_html__('Mobile', 'wpe-theme'),
			'menu-subsite' => esc_html__('Subsite', 'wpe-theme'),
			'menu-footer' => esc_html__('Footer', 'wpe-theme'),
			'menu-sidebar' => esc_html__('Sidebar', 'wpe-theme'),
			'menu-footer-library' => esc_html__('Footer library', 'wpe-theme'),
			'menu-footer-ourwork' => esc_html__('Footer ourwork', 'wpe-theme'),
			'menu-footer-research' => esc_html__('Footer research', 'wpe-theme'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('_s_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		));

		// Adding support for core block visual styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');

		// Add support for custom color scheme.
		add_theme_support('editor-color-palette', array(
			array(
				'name' => __('Strong Blue', 'wpe-theme'),
				'slug' => 'strong-blue',
				'color' => '#0073aa',
			),
			array(
				'name' => __('Lighter Blue', 'wpe-theme'),
				'slug' => 'lighter-blue',
				'color' => '#229fd8',
			),
			array(
				'name' => __('Very Light Gray', 'wpe-theme'),
				'slug' => 'very-light-gray',
				'color' => '#eee',
			),
			array(
				'name' => __('Very Dark Gray', 'wpe-theme'),
				'slug' => 'very-dark-gray',
				'color' => '#444',
			),
		));

		// Add support for responsive embeds.
		//add_theme_support('responsive-embeds');

		// Add support for editor styles.
		add_theme_support('editor-styles');
		// Enqueue editor styles.
		add_editor_style('assets/css/style-editor.css');

	}
endif;
add_action('after_setup_theme', 'wpe_theme_setup');


/**
 * Enqueue scripts and styles.
 */
function cifor_theme_scripts()
{

	wp_enqueue_style('wpe-style', get_stylesheet_uri());
	wp_enqueue_style('wpe-theme', get_template_directory_uri().'/assets/css/default.min.css');
	//wp_enqueue_script('wpe-grid-js', 'https://unpkg.com/packery@2/dist/packery.pkgd.min.js', array(), '20211215', false);
	//wp_enqueue_script('cifor-jquery', get_template_directory_uri().'js/vendor/jquery-1.11.1.min.js', array(), '20211215', false);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'cifor_theme_scripts');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wpe_widgets_init()
{
	register_sidebar(array(
		'name' => esc_html__('Sidebar Main', 'cifor-mmxix'),
		'id' => 'sidebar_main',
		'description' => esc_html__('Add widgets here.', 'cifor-mmxix'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'wpe_widgets_init');


add_action( 'after_setup_theme', 'misha_gutenberg_css' );
function misha_gutenberg_css(){
	add_theme_support( 'editor-styles' ); // if you don't add this line, your stylesheet won't be added
	add_editor_style( 'assets/css/editor-style.css' ); // tries to include style-editor.css directly from your theme folder
}

/**
 * Load carbonfield
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('after_setup_theme', 'crb_load', 10);
function crb_load()
{
	require_once('vendor/autoload.php');
	\Carbon_Fields\Carbon_Fields::boot();
}

function wpe_block_starter(){
    $default_tab = array(
        Field::make( 'checkbox', 'block_hide', 'Hide this block' ),
        Field::make( 'text', 'block_title', __( 'Title' ) ),
        Field::make( 'textarea', 'block_desc', __( 'Description' ) ),
    );

    $default_style = array(
        Field::make( 'text', 'block_id', __( 'Block ID CSS' ) ),
        Field::make( 'text', 'block_class', __( 'Block Class CSS' ) ),
        Field::make( 'textarea', 'block_css_code', __( 'CSS Code' ) ),
    );

    $default_link  = array(
        Field::make( 'text', 'link_more_title', __( 'Title' ) ),
        Field::make( 'text', 'link_more_url', __( 'URL/Link' ) ),
    );

    return array('tab'=>$default_tab,'style'=>$default_style,'link'=>$default_link);
}

/**
 * Theme App
 */
require get_template_directory() . '/app/load-apps.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/app/includes/functions/template-tags.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/app/includes/functions/template-functions.php';


// compress
/*
class WP_HTML_Compression
{
	// Settings
	protected $compress_css = true;
	protected $compress_js = false;
	protected $info_comment = true;
	protected $remove_comments = true;

	// Variables
	protected $html;
	public function __construct($html)
	{
		if (!empty($html))
		{
			$this->parseHTML($html);
		}
	}
	public function __toString()
	{
		return $this->html;
	}
	protected function bottomComment($raw, $compressed)
	{
		$raw = strlen($raw);
		$compressed = strlen($compressed);

		$savings = ($raw-$compressed) / $raw * 100;

		$savings = round($savings, 2);

		return '<!--HTML udah dikompress, lumayan tuh berkurang '.$savings.'%. Tadinya '.$raw.' bytes, sekarang cuma '.$compressed.' bytes-->';
	}
	protected function minifyHTML($html)
	{
		$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
		preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
		$overriding = false;
		$raw_tag = false;
		// Variable reused for output
		$html = '';
		foreach ($matches as $token)
		{
			$tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;

			$content = $token[0];

			if (is_null($tag))
			{
				if ( !empty($token['script']) )
				{
					$strip = $this->compress_js;
				}
				else if ( !empty($token['style']) )
				{
					$strip = $this->compress_css;
				}
				else if ($content == '<!--wp-html-compression no compression-->')
				{
					$overriding = !$overriding;

					// Don't print the comment
					continue;
				}
				else if ($this->remove_comments)
				{
					if (!$overriding && $raw_tag != 'textarea')
					{
						// Remove any HTML comments, except MSIE conditional comments
						$content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
					}
				}
			}
			else
			{
				if ($tag == 'pre' || $tag == 'textarea')
				{
					$raw_tag = $tag;
				}
				else if ($tag == '/pre' || $tag == '/textarea')
				{
					$raw_tag = false;
				}
				else
				{
					if ($raw_tag || $overriding)
					{
						$strip = false;
					}
					else
					{
						$strip = true;

						// Remove any empty attributes, except:
						// action, alt, content, src
						$content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);

						// Remove any space before the end of self-closing XHTML tags
						// JavaScript excluded
						$content = str_replace(' />', '/>', $content);
					}
				}
			}

			if ($strip)
			{
				$content = $this->removeWhiteSpace($content);
			}

			$html .= $content;
		}

		return $html;
	}

	public function parseHTML($html)
	{
		$this->html = $this->minifyHTML($html);

		if ($this->info_comment)
		{
			$this->html .= "\n" . $this->bottomComment($html, $this->html);
		}
	}

	protected function removeWhiteSpace($str)
	{
		$str = str_replace("\t", ' ', $str);
		$str = str_replace("\n",  '', $str);
		$str = str_replace("\r",  '', $str);

		while (stristr($str, '  '))
		{
			$str = str_replace('  ', ' ', $str);
		}

		return $str;
	}
}

function wp_html_compression_finish($html)
{
	return new WP_HTML_Compression($html);
}

function wp_html_compression_start()
{
	ob_start('wp_html_compression_finish');
}
add_action('get_header', 'wp_html_compression_start');
*/


add_filter('allowed_block_types', function($block_types, $post) {
	$allowed = [
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/html',
		'core/text-columns',
		'carbon-fields/megamenu-box'
	];
	if ($post->post_type == 'megamenu') {
		return $allowed;
	}
	return $block_types;
}, 10, 2);

//add_filter( 'allowed_block_types', 'misha_keep_plugins_blocks' );

// function misha_keep_plugins_blocks( $allowed_blocks ) {

// 	// get widget blocks and registered by plugins blocks
// 	$registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

// 	// in case we do not need widgets
// 	unset( $registered_blocks[ 'core/latest-comments' ] );
// 	unset( $registered_blocks[ 'core/archives' ] );
// 	// etc ...

// 	// now $registered_blocks contains only blocks registered by plugins, but we need keys only
// 	$registered_blocks = array_keys( $registered_blocks );

// 	// merge the whitelist with plugins blocks
// 	return array_merge( array(
// 		'core/image',
// 		'core/paragraph',
// 		'core/heading',
// 		'core/list'
// 	), $registered_blocks );

// }


function cifor_template_part($main,$part,$data=null){
	$c_data = array('id'=>$data);
	set_query_var( 'param',$c_data);
	get_template_part($main,$part);
}




function wpb_search_filter( $query ) {
    if ( $query->is_search )
		$query->set( 'post__not_in', array( 1139, 12, 534 ) );
    return $query;
}
add_filter( 'pre_get_posts', 'wpb_search_filter' );


add_filter('jetpack_photon_pre_args', 'jetpackme_custom_photon_compression' );
function jetpackme_custom_photon_compression( $args ) {
    $args['quality'] = 100;
    //$args['strip'] = 'all';
    return $args;
}


/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	// Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

function my_deregister_scripts(){
	wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );