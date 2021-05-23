<?php
/**
 * Template Name: Single Donors
 */
if(isset($_GET['info']) && DACE_DEBUG ) {dump(__FILE__);}

$vars       = $GLOBALS['wp_query']->query_vars;
$id_partner   = isset($vars['id_partner']) ? $vars['id_partner'] : '';

//show($ct_id);
//show($vars);

if($id_partner){
    $sql = "SELECT * FROM {$wpdb->prefix}_donor WHERE slug='$id_partner'";
    $row = $wpdb->get_results(  $sql , OBJECT )[0];

    set_query_var( 'mc',$row);

	function wpdocs_filter_wp_title($row) {
		$vars       = $GLOBALS['wp_query']->query_vars;
		$title['site'] = $vars['mc']->title.' - Partner/Donors - '.get_option('blogdescription');
		//$title['tagline'] = 'tagline';
		return $title;
	}
	add_filter( 'document_title_parts', 'wpdocs_filter_wp_title', 10000, 2 );
}

get_header();
	$enable_hero = carbon_get_post_meta(get_the_ID(),'enable_hero');
	if($enable_hero!='' AND $id_partner=='' ){
		get_template_part('templates/_parts/block', 'hero-page');
		get_template_part('templates/_parts/element/_breadcrumb', 'main');
	}else{
		get_template_part('templates/_parts/element/_breadcrumb', 'main');
	}
	// Begin Breadcrumbs

	?>
	<!-- End of Breadcrumbs -->
	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) : the_post();
		show($id_partner);
            if($id_partner){
                cifor_template_part(  'templates/_parts/content', 'donor' ,$row);
            }else{
                get_template_part( 'templates/_parts/content', 'page' );
            }
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_footer();
