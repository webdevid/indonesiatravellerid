<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cifor-icraf
 */
$meta   = wpe_clean_meta(get_post_meta(get_the_ID()));
$vars   = $GLOBALS['wp_query']->query_vars;
$row    = isset($vars['bot']) ? $vars['bot'] : '';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	if($meta['_enable_hero']!='yes'){
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

		<div id="page-wrapper" class="page-wrapper container">
			<div class="row">
				<div class="col-lg-3">
					<div id="sidebar" class="sidebar-left">
						<div class="sidebar__inner">
						<?php
						if($row){
							$page_bot_id = get_id_by_slug('about/board-of-trustees/bot-single');
							wpe_left_menu($page_bot_id);
						}else{
							wpe_left_menu(get_the_ID());
						}

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
						<div class="row">
							<div class="col-lg-<?php if($row){ echo '8';}else{ echo '12';}?>">
								<?php
								if($row){
									echo '<h2>'.$row->name.'</h2>';
									echo '<div class="bot-position">'.$row->position.'</div>';
									echo '<img class="bot-image" src="'.$row->image.'">';
									echo $row->description;
								}else{
									the_content();
								}
								?>
							</div>
							<?php
							if($row){
							?>
							<div class="col-lg-4">
								<?php
								global $wpdb;
								$sql = "SELECT * FROM {$wpdb->prefix}_bot ORDER BY order_bot";
								$results = $wpdb->get_results(  $sql , OBJECT );
								?>
								<div class="bot-list mt-5 mt-lg-0">
									<h3>BOARD OF TRUSTEES</h3>
									<ul>
										<?php
										foreach($results as $r){
											echo '<li><a href="'.get_the_permalink().''.$r->slug.'/">'.$r->name.'</a></li>';
										}
										?>

									</ul>
								</div>
							</div>
							<?php
							}
							?>

						</div>

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
