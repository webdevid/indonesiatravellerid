<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cifor-icraf
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('search-results-item'); ?>>
	<header class="entry-header mb-3">
		<h4 class="entry-title"><a href="<?php echo get_the_permalink();?>" rel="bookmark"><?php echo str_replace('<br>','',get_the_title());?></a></h4>
		<span class="entry-meta"><?php echo wpe_date(get_the_date()); ?></span>
	</header><!-- .entry-header -->

	<?php //cifor_icraf_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

</article><!-- #post-<?php the_ID(); ?> -->
