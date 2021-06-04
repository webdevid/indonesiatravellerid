<?php
/*
Template Name: WPE Page Canvas
Template Post Type: page
*/

get_header();
while ( have_posts() ) : the_post();
$meta = wpe_clean_meta(get_post_meta(get_the_ID()));
?>
    <main id="primary" class="site-main">
        <div class="container">
            <?php
                get_template_part( 'templates/parts/content', 'canvas' );
            ?>
        </div>
    </main>
<?php
endwhile; // End of the loop.
get_footer();
?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css"/>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
$(document).ready(function(){
    $('.slide-posts').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        prevArrow: '<div class="slide-prev"><i class="bi bi-arrow-left"></i></div>',
        nextArrow: '<div class="slide-next"><i class="bi bi-arrow-right"></i></div>',

    });

    // On before slide change
    $('.slide-posts').on('setPosition', function(event, slick, slickCurrentSlide, nextSlide){

        var scount = slick.slideCount;
        var cslide = slick.currentSlide;

        //$('.slide-number').html( (cslide+1)  + ' / ' + scount);

    });
});
</script>