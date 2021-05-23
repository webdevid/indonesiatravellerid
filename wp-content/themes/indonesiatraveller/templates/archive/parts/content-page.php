<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cifor-icraf
 */
$meta = wpe_clean_meta(get_post_meta(get_the_ID()));
$enable_hero = isset($meta['_enable_hero']) ? $meta['_enable_hero'] : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	if($enable_hero!='yes'){
		?>
		<div class="container">
				<div class="col-lg-8">
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
				</div>
		</div>

		<?php
	}
	?>
	<?php //cifor_icraf_post_thumbnail(); ?>


		<div id="page-wrapper" class="page-wrapper container">
			<div class="row">
				<div class="col-lg-3">
					<div id="sidebar" class="sidebar-left">
						<div class="sidebar__inner">
						<?php
						wpe_left_menu(get_the_ID());
						?>
						<!-- Content goes here -->
						<?php
						wpe_share_link(get_the_title(), get_the_permalink(), 2);
						?>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div id="maincontent" class="entry-content">
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cifor-icraf' ),
							'after'  => '</div>',
						)
					);
					?>
					</div><!-- .entry-content -->
				</div>
				<div class="col-lg-1"></div>
			</div>
		</div>



	<?php
	if ( get_edit_post_link() ) :
		if(is_user_logged_in()){
			?>
				<footer class="edit-footer">
					<?php
					edit_post_link(
						sprintf(
							wp_kses(
								// translators: %s: Name of current post. Only visible to screen readers
								__( 'Edit <span class="screen-reader-text">%s</span>', 'cifor-icraf' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						),
						'<span class="edit-link">',
						'</span>'
					);
					?>
				</footer><!-- .entry-footer -->
			<?php
		}
	endif;  ?>
</article><!-- #post-<?php the_ID(); ?> -->
