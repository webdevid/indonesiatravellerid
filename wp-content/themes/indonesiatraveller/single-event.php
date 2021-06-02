<?php
get_header();
while ( have_posts() ) : the_post();
$meta = wpe_clean_meta(get_post_meta(get_the_ID()));
?>
    <main id="primary" class="site-main">
        <div class="container">
            <?php
                //get_template_part( 'templates/parts/content', 'canvas' );
            ?>
        </div>
    </main>
<?php
endwhile; // End of the loop.
get_footer();
?>