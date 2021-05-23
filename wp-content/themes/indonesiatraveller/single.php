<?php
get_header();


while ( have_posts() ) : the_post();
$meta = wpe_clean_meta(get_post_meta(get_the_ID()));
$enable_hero = isset($meta['_enable_hero']) ? $meta['_enable_hero'] : '';

?>
    <main id="primary" class="site-main">
        <?php
        if($enable_hero=='yes'){
            wpe_template_part('_page-hero',$meta);
        }
        ?>
        <div class="container border-sm-bottom page-section-meta mb-3 mb-lg-0">
			<div class="row">
				<div class="col-lg-8">
                    <?php
                    echo wpe_breadcrumbs();
                    ?>
				</div>
                <div class="col-lg-4 text-end">
                    <?php
                    wpe_share_link(get_the_title(), get_the_permalink(), 1);
                    ?>
                </div>
			</div>
		</div>


        <?php
            get_template_part( 'templates/parts/content');
        ?>
    </main>
<?php
endwhile; // End of the loop.
get_footer();
?>
