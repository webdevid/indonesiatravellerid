<?php
get_header();
?>
    <main id="primary" class="site-main">
        <div class="container">
            <?php
            while ( have_posts() ) : the_post();
                get_template_part( 'templates/parts/content', 'none' );
            endwhile; // End of the loop.
            ?>
        </div>
    </main>
<?php
get_footer();
?>