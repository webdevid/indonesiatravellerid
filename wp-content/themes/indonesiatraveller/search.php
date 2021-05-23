<?php



get_header();
global $wp_query;
global $wp;
global $wpdb;
$url = add_query_arg( $wp->query_vars, home_url( $wp->request ) );
$vars       = $GLOBALS['wp_query']->query_vars;
$s = isset($_GET['s']) ? $_GET['s'] : '';
$rows = array();
if($s!=''){
	$sql = "SELECT * FROM {$wpdb->prefix}_bot WHERE name like '%$s%' OR position like '%$s%' OR description like '%$s%' LIMIT 100";
	$rows = $wpdb->get_results(  $sql , OBJECT );
}

if((count($rows) > 0)){
	// if($vars['paged'] > 0){
	// 	$result_count = $wp_query->found_posts;
	// }else{
		$result = count($rows) + $wp_query->found_posts;
		$result_count = $result;
	//}

}else{
	$result_count = $wp_query->found_posts;
}


?>
    <main id="primary" class="site-main">

        <div class="container border-sm-bottom page-section-meta  mb-3 mb-lg-0">
			<div class="row">
				<div class="col-lg-6">
                    <?php
                    echo wpe_breadcrumbs();
                    ?>
				</div>
                <div class="col-lg-6 text-end">
                    <?php
                    wpe_share_link(urlencode('Search result for "'. get_search_query() .'" query'), $url, 1);
                    ?>
                </div>
			</div>
		</div>
        <div class="container">

				<div class="col-lg-8">
				<header class="entry-header">
					<?php echo '<h1 class="entry-title"> Search result for "'. get_search_query() .'" query</h1>'  ?>
				</header><!-- .entry-header -->
				</div>
		</div>
        <div class="container border-sm-bottom page-section-meta">
        	<div class="row">
				<?php /* ?>
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
							wpe_share_link(urlencode('Search result for "'. get_search_query() .'" query'), $url, 2);
							?>
						</div>
					</div>
				</div>
				<?php */ ?>
				<div class="col-lg-7">
					<div class="search-box-result" style="">
						<form action="<?php echo site_url();?>" method="get" _lpchecked="1">
							<div class="input-group">
								<input type="text" class="form-control" name="s" placeholder="Search keyword" value="<?php if(isset($_GET['s'])){ echo $_GET['s'];};?>">
								<button class="btn btn-outline-secondary" type="submit">Submit</button>
							</div>
						</form>
					</div>
					<div class="result-number">Total Estimated Results: <?php echo $result_count;?></div>
					<div id="maincontent" class="entry-content mt-3 search-results">
					<?php

						if(count($rows) > 0){
							if($vars['paged'] > 0){

							}else{
								foreach($rows as $bot){
										?>
										<article id="bot-<?php echo $bot->id_bot; ?>" class="search-results-item">
											<header class="entry-header mb-3">
												<h4 class="entry-title"><a href="<?php echo site_url().'/about/board-of-trustees'.'/'.$bot->slug.'/';?>" rel="bookmark"><?php echo $bot->name;?></a></h4>
												<span class="entry-meta"><?php echo $bot->position; ?></span>
											</header><!-- .entry-header -->

											<?php //cifor_icraf_post_thumbnail(); ?>

											<div class="entry-summary">
												<?php echo $bot->profession; ?>
											</div><!-- .entry-summary -->

										</article><!-- #post-<?php echo $bot->id_bot; ?> -->
										<?php
									}
								}
						}
                        while ( have_posts() ) : the_post();
                            get_template_part( 'templates/parts/content', 'search' );
                        endwhile; // End of the loop.
                    ?>
					</div><!-- .entry-content -->
				</div>
				<div class="col-lg-1"></div>
			</div>
            <?php
            echo '<div class="row">';
            echo ' <div class="col-lg-7"><div class="page-pagination">';

            $big = 999999999; // need an unlikely integer

            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages
            ) );

            echo '</div></div>';
            echo '</div>';
            ?>
        </div>
    </main>
<?php

get_footer();
?>

