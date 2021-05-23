<?php
/*
Template Name: WPE BOT
Template Post Type: page
*/
get_header();

$vars     = $GLOBALS['wp_query']->query_vars;
$bot_slug = isset($vars['bot_slug']) ? $vars['bot_slug'] : '';
$row = array();

if($bot_slug){

    $sql = "SELECT * FROM {$wpdb->prefix}_bot WHERE slug='$bot_slug'";
    $rows = $wpdb->get_results(  $sql , OBJECT );
    $row = $rows[0];
    set_query_var( 'bot',$row);

}


while ( have_posts() ) : the_post();
$meta = wpe_clean_meta(get_post_meta(get_the_ID()));
$enable_hero = isset($meta['_enable_hero']) ? $meta['_enable_hero'] : '';

?>
    <main id="primary" class="site-main">
        <?php
        if($meta['_enable_hero']=='yes'){
            wpe_template_part('_bot-hero',$meta);
        }
        ?>
        <div class="container border-sm-bottom page-section-meta  mb-3 mb-lg-0">
			<div class="row">
				<div class="col-lg-6">
                    <?php
                    echo wpe_breadcrumbs();
                    ?>
				</div>
                <div class="col-lg-6 text-end">
                    <?php
                    wpe_share_link(get_the_title(), get_the_permalink(), 1);
                    ?>
                </div>
			</div>
		</div>

        <?php
            get_template_part( 'templates/parts/content', 'bot' );
        ?>
    </main>
<?php
endwhile; // End of the loop.
get_footer();
?>
