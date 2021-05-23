<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cifor-icraf
 */
$meta = wpe_clean_meta(get_post_meta(get_the_ID()));


$parent_id = wp_get_post_parent_id( get_the_ID());
$sidemenu_child = carbon_get_post_meta($parent_id,'enable_sidemenu_child');
$menu_left_page = carbon_get_post_meta(get_the_ID(),'enable_sidemenu_page');

if($menu_left_page==1){
	$leftnav = carbon_get_post_meta(get_the_ID(),'sidemenu_list_page');
}elseif($sidemenu_child==1){
	$leftnav = carbon_get_post_meta($parent_id,'sidemenu_list_page');
}
$enable_hero = isset($meta['_enable_hero']) ? $meta['_enable_hero'] : '';
//show($leftnav);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	if($enable_hero!='yes'){
		?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8">
					<header class="entry-header mb-5">
					<?php
						$badge = get_post_type(get_the_ID());
						if ($badge) {
						?>
							<label class="badge-title"><?php echo str_replace('-',' ',$badge); ?></label>
						<?php
						}
						?>
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<div class="entry-meta-date mt-4"><i>Published on <?php echo wpe_date(get_the_date());?></i></div>
					</header><!-- .entry-header -->
				</div>
			</div>
		</div>
		<?php
	}
	?>

		<div id="page-wrapper" class="container">
			<div class="row">

				<div class="col-lg-3">
					<div id="sidebar" class="sidebar-left">
						<div class="sidebar__inner">
							<?php
							if(isset($leftnav)){
								?>
								<ul id="left-nav" class="left-menu js-sticky-widget">
									<?php

										foreach($leftnav as $nav){
											echo '<li class="'.$nav['cf_link'].'" ><a href="'.$nav['cf_link'].'">'.$nav['cf_title'].'</a></li>';
										}

									?>
								</ul>
								<?php
							}
							?>
							<!-- Content goes here -->
							<?php
							wpe_share_link(get_the_title(), get_the_permalink(), 2);
							?>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
					<div id="maincontent" class="entry-content">
					<?php
					the_content();
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
				<footer class="edit-footer text-start ">
					<div class="container">
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
							wp_kses_post( wp_trim_words( get_the_title(), 10, '...' ) )
						),
						'<span class="edit-link">',
						'</span>'
					);
					?>
					</div>
				</footer><!-- .entry-footer -->
			<?php
		}
	endif;  ?>
</article><!-- #post-<?php the_ID(); ?> -->
