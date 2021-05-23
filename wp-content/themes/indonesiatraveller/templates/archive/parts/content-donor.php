<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cifor-theme
 */
if(isset($_GET['info']) && DACE_DEBUG ) {dump(__FILE__);}

$row = $param['id'];
//show($row);
$date = date_format(date_create($row->date),"d M Y");
//$image = $row->image ? get_site_url()."/wp-content/uploads/mediacoverage/".$row->image : get_template_directory_uri().'/assets/images/placeholder.svg';

$image = $row->image ? get_site_url()."/wp-content/uploads/donor/".$row->image : get_template_directory_uri().'/assets/images/placeholder.svg';
$image = string_exist($row->image,'cifor') ? $row->image : $image;
$donor_id = $row->id;

function getOnePartner($id=1) {

	global $wpdb;
	$record= $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}_donor WHERE id={$id}", OBJECT );

	$record? $funder_id=$record[0]->funder_id:$funder_id='';

	return $funder_id;
}

$vars       = $GLOBALS['wp_query']->query_vars;

?>
<!-- GARUDA -->

<style>
.cifor-entry-content h2{
    margin:20px 0px 20px 0px;
    border-bottom:1px solid #ddd;
    padding:0px 0px 20px 0px;
}
</style>
<article id="post-career-<?php echo $row->id; ?>" <?php post_class(); ?>>

<div class="m-section m-margin-top-50">
	<div class="container container-fluid">
		<div class="row">
			<div class="col-md-10 col-xs-12">
				<header class="entry-header">
					<?php //echo '<h1 class="entry-title lead-44 m-margin-top-0 m-margin-bottom-40">'.$row->title.'</h1>'; ?>
				</header><!-- .entry-header -->
			</div>
		</div>
	</div>
</div>

<!-- Begin Main content -->
<div class="m-section m-section-theme ">
	<div id="intro" class="m-section m-section-intro m-margin-bottom-70">
		<div class="container container-fluid">
			<div class="row">
				<div class="col-md-2 col-xs-12">

					<div class="sb-container">
						<div id="sidebar">
							<div class="sidebar__inner">

                                <?php

								if(get_post_field( 'post_name', get_post(get_the_ID()))=='partners'){
									?>
									<div class="sb-menu-wrapper has-border m-bg-white">
										<p class="m-uppercase m-margin-bottom-0 m-margin-top-10">Menu</p>
										<ul class="list-unstyled sb-nav m-margin-bottom-10 m-margin-top-10">
											<li><a class="gtm-side-menu-funder" href="<?php echo _get_page_link(get_the_ID()); ?>">Back</a></li>
										</ul>
									</div>
									<?php
								}

								/**
								 *  helper/template.php
								 * 7/30/2019, 3:45:00 PM
								 */
								echo aside_share(news_url('media-coverages',$row->id.'/'.$row->slug),$row->title,$row->title);
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-10 col-xs-12">
					<div class="columns-10">
						<div class="col-10 m-margin-xs-bottom-30">
							<div class="cifor-entry-content m-margin-bottom-30 site-content">
								<div class="single-partner_box columns-12">
									<div class="col-3 single-partner_thumb">
										<img src="<?php echo $image; ?>">
									</div>
									<div class=" col-9 single-partner_text">
										<h1><?php echo $row->title;?></h1>
										<p><a href="<?php echo $row->_link_to; ?>"><?php echo $row->_link_to; ?></a></p>
									</div>
								</div>
								<?php

								$dace = new daceGeneral();


								$funder_id = str_replace(' ','',$row->funder_id);

								if($funder_id!=''): ?>

								<h2>Related products</h2>
								<?php 		endif; ?>

								<?php
								if(isset($_GET['info']) && DACE_DEBUG ) {	dump($row->id);}

								$search_funder = '&funder_id='.$row->id;
								$search_partner = '&dpartner[]='.getOnePartner($row->id);
								$partners_id = str_replace(', ','+OR+',getOnePartner($row->id));



								if($funder_id!='') {


									$dace->setSolrProjectURL($partners_id);
									$docs_project = $dace->getDocs($dace->getSolrProjectUrl());
									$fileObj = $docs_project['docs'];


									$dace->setSolrProjectURL($partners_id,'publication');
									$docs_pubs = $dace->getDocs($dace->getSolrProjectUrl());
									$fileObj_publication = $docs_pubs['docs'];


									$dace->setSolrProjectURL($partners_id,'presentation');
									$docs_presentation = $dace->getDocs($dace->getSolrProjectUrl());
									$fileObj_presentation= $docs_presentation ['docs'];


									$dace->setSolrProjectURL($partners_id,'video');
									$docs_video = $dace->getDocs($dace->getSolrProjectUrl());
									$fileObj_video= $docs_video ['docs'];

									$dace->setSolrProjectURL($partners_id,'datasets');
									$docs_datasets = $dace->getDocs($dace->getSolrProjectUrl());
									$fileObj_datasets = $docs_datasets['docs'];

									$dace->setSolrProjectURL($partners_id,'blog');
									$docs_blog = $dace->getDocs($dace->getSolrProjectUrl());
									$fileObj_blog= $docs_blog ['docs'];



								} else {
									$fileObj = null;
									$fileObj_publication = null;
									$fileObj_blog = null;
									$fileObj_video = null;
									$fileObj_datasets = null;
									$fileObj_presentation = null;
								}
								?>

								<!-- project start -->
								<?php 		if($fileObj!=[]):  ?>
								<div id="projects" class="m-section m-margin-bottom-30">
									<div class="row middle-md m-margin-bottom-20">
										<div class="col-md-6 col-xs-7">
											<h4 class="m-uppercase m-weight-700 has-icon m-margin-bottom-0">

                                            <span class="type icon-project">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/starter/assets/img/icon-project.svg">
                                            </span>
												<span>Projects</span>
											</h4>
										</div>
										<div class="col-md-6 col-xs-5">
											<?php if($docs_project['total']  > 3): ?>
												<div class="text-right">
													<a class="link-has-border-dark m-weight-700 text--sm" href="<?php echo site_url().'/knowledge/search/?dtype%5B%5D=project'.$search_funder.$search_partner; ?>">Browse all</a>
												</div>
											<?php endif; ?>
										</div>
									</div>

									<div class="row">

										<?php foreach($fileObj as $project): ?>
											<div class="col-md-4 col-xs-12 col-sm-6 m-margin-xs-bottom-30">
												<div class="m-padding-top-10">
													<!--
													<a href="<?php site_url(); ?>/knowledge/project/<?php echo $project->origin_id[0]; ?>" title="<?php echo $project->title; ?>" class="m-margin-bottom-15 blog-bg" style="background-image:url(<?php echo site_url(); ?>/wp-content/themes/starter/assets/images/project.svg);">

													</a>-->
													<div class="m-uppercase m-weight-600 text--sm m-margin-bottom-10 m-margin-top-15">project</div>
													<h4 class="m-weight-700">
														<a href="<?php site_url(); ?>/knowledge/project/<?php echo $project->origin_id[0]; ?>" class="m-link-dark" title="<?php echo $project->title; ?>">
														<?php echo $project->title; ?>
														</a>
													</h4>
													<div class="text--sm">




														<?php if(isset($project->country)): ?>

													    <?php
														$country ='Location: ';
														foreach($project->country as $c) {
															$country  .= '<a href="'.site_url().'/knowledge/search/?dcountry%5B%5D='.strtolower($c).'"> '.$c.'</a>, ';
														}

														$country = rtrim($country , ', ');


														echo $country;

														?> <br/>
														<?php endif; ?>


														Start Date: <?php $date = explode('T',$project->project_start_date[0]); echo $date[0]; ?>

														<?php if(isset($project->project_status[0])): ?>
															<br/>Status:
														<?php
														echo projectStatus($project->project_status[0]);

														endif;
														?>
													</div>
												</div>
											</div>
										<?php endforeach; ?>

									</div>
								</div>

								<?php endif; ?>
								<!-- project end -->


								<!-- publications start -->
								<?php if($fileObj_publication!=[]): ?>
									<div id="publications" class="m-section m-margin-bottom-30">
										<div class="row middle-md m-margin-bottom-20">
											<div class="col-md-6 col-xs-7">
												<h4 class="m-uppercase m-weight-700 has-icon m-margin-bottom-0">

                                            <span class="type icon-publication">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/starter/assets/img/icon-publication.svg">
                                            </span>
													<span>Publication<?php if(count($fileObj_publication) > 1){ echo 's';}?></span>
												</h4>
											</div>
											<div class="col-md-6 col-xs-5">
												<?php if($docs_pubs['total'] > 3): ?>
													<div class="text-right">
														<a class="link-has-border-dark m-weight-700 text--sm" href="<?php echo site_url().'/knowledge/search/?dtype%5B%5D=publication'.$search_funder.$search_partner; ?>">Browse all</a>
													</div>
												<?php endif; ?>
											</div>
										</div>
										<div class="row">
											<?php foreach($fileObj_publication as $publication): ?>

											<div class="col-md-4 col-xs-12 col-sm-6 m-margin-xs-bottom-30">
												<div class="m-padding-top-10">
													<a href="<?php site_url(); ?>/knowledge/publication/<?php echo $publication->origin_id[0]; ?>" class="m-margin-bottom-15 pub-bg" title="<?php echo $publication->title; ?>">
														<img src="<?php echo $publication->thumbnail[0]; ?>">
													</a>
													<div class="m-uppercase m-weight-600 text--sm m-margin-bottom-10 m-margin-top-15">Publication</div>
													<div class="m-uppercase m-weight-600 text--sm m-margin-bottom-10"><?php echo $publication->published_year[0]; ?></div>
													<h4 class="m-weight-700">
														<a href="<?php site_url(); ?>/knowledge/publication/<?php echo $publication->origin_id[0]; ?>" class="m-link-dark" title="<?php echo $publication->title; ?>">
															<?php echo $publication->title; ?>
														</a>
														<?php //dump($publication->pmo_code[0]); ?>
													</h4>
												</div>
											</div>
											<?php endforeach; ?>
										</div>
									</div>

								<?php endif; ?>

								<!-- end publication -->


								<!-- datasets start -->
								<?php if($fileObj_datasets!=[]): ?>
									<div id="publications" class="m-section m-margin-bottom-30">
										<div class="row middle-md m-margin-bottom-20">
											<div class="col-md-6 col-xs-7">
												<h4 class="m-uppercase m-weight-700 has-icon m-margin-bottom-0">

														<span class="type icon-dataset">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/starter/assets/img/icon-dataset.svg">
														</span>
													<span>Dataset<?php if(count($fileObj_datasets) > 1){ echo 's';}?></span>
												</h4>
											</div>
											<div class="col-md-6 col-xs-5">
												<?php if($docs_datasets['total']  > 3): ?>
													<div class="text-right">
														<a class="link-has-border-dark m-weight-700 text--sm" href="<?php echo site_url().'/knowledge/search/?dtype%5B%5D=datasets'.$search_funder.$search_partner; ?>">Browse all</a>
													</div>
												<?php endif; ?>

											</div>
										</div>
										<div class="row">
											<?php foreach($fileObj_datasets as $dataset): ?>
												<div class="col-md-4 col-xs-12 col-sm-6 m-margin-xs-bottom-30">
													<div class="m-padding-top-10">
														<!--
														<a href="<?php site_url(); ?>/knowledge/dataset/<?php echo $dataset->origin_id[0]; ?>" title="<?php echo $dataset->title; ?>" class="m-margin-bottom-15 blog-bg" style="background-image:url(<?php echo site_url(); ?>/wp-content/themes/starter/assets/images/datasets.svg);">

														</a>-->
														<div class="m-uppercase m-weight-600 text--sm m-margin-bottom-10 m-margin-top-15">datasets</div>
														<h4 class="m-weight-700">
															<a href="<?php site_url(); ?>/knowledge/dataset/<?php echo $dataset->origin_id[0]; ?>" class="m-link-dark" title="<?php echo $dataset->title; ?>">
																<?php echo $dataset->title; ?>
															</a>
														</h4>
														<div class="text--sm">
															<?php //echo $dataset->published_date[0]; ?>
														</div>
													</div>
												</div>


											<?php endforeach; ?>
										</div>
									</div>

								<?php endif; ?>

								<!-- end datasets-->




								<!-- video start -->
								<?php if($fileObj_video!=[]): ?>
									<div id="publications" class="m-section m-margin-bottom-30">
										<div class="row middle-md m-margin-bottom-20">
											<div class="col-md-6 col-xs-7">
												<h4 class="m-uppercase m-weight-700 has-icon m-margin-bottom-0">

                                            <span class="type icon-publication">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/starter/assets/img/icon-video.svg">
                                            </span>
													<span>Video<?php if(count($fileObj_video) > 1){ echo 's';}?></span>
												</h4>
											</div>
											<div class="col-md-6 col-xs-5">
												<?php if($docs_video['total'] > 3): ?>
												<div class="text-right">
													<a class="link-has-border-dark m-weight-700 text--sm" href="<?php echo site_url().'/knowledge/search/?dtype%5B%5D=video'.$search_funder.$search_partner; ?>">Browse all</a>
												</div>
												<?php endif; ?>

											</div>
										</div>
										<div class="row">
											<?php foreach($fileObj_video as $video): ?>
												<div class="col-md-4 col-xs-12 col-sm-6 m-margin-xs-bottom-30">
													<div class="m-padding-top-10">
														<a href="<?php echo $video->link; ?>" title="Sheherazade - USAID-CIFOR fellowship program" class="m-margin-bottom-15 blog-bg img-ph" style="background-image:url(<?php echo $video->thumbnail[0]; ?>);">
                                <span class="play-icon">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/starter/assets/img/icon-play-sm.svg"></span>
														</a>
														<div class="m-uppercase m-weight-600 text--sm m-margin-bottom-10 m-margin-top-15">Video</div>
														<h4 class="m-weight-700">
															<a href="<?php echo site_url(); ?>/knowledge/video/aJo3pHFXeAY" class="m-link-dark" title="Sheherazade - USAID-CIFOR fellowship program">
																<?php echo $video->title; ?>
															</a>
														</h4>
														<div class="text--sm">
															<?php echo $video->published_date[0]; ?>
														</div>
													</div>
												</div>


											<?php endforeach; ?>
										</div>
									</div>

								<?php endif; ?>

								<!-- end video -->

								<!-- forest news start -->
								<?php if($fileObj_blog!=[]): ?>
									<div id="publications" class="m-section m-margin-bottom-30">
										<div class="row middle-md m-margin-bottom-20">
											<div class="col-md-6 col-xs-7">
												<h4 class="m-uppercase m-weight-700 has-icon m-margin-bottom-0">

                                            <span class="type icon-publication">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/starter/assets/img/icon-news.svg">
                                            </span>
													<span>Forestsnews</span>
												</h4>
											</div>
											<div class="col-md-6 col-xs-5">
												<?php if($docs_blog['total']  > 3): ?>
													<div class="text-right">
														<a class="link-has-border-dark m-weight-700 text--sm" href="<?php echo site_url().'/knowledge/search/?dtype%5B%5D=blog'.$search_funder.$search_partner; ?>">Browse all</a>
													</div>
												<?php endif; ?>

											</div>
										</div>
										<div class="row">
											<?php foreach($fileObj_blog as $blog): ?>


												<div class="col-md-4 col-xs-12 col-sm-6 m-margin-xs-bottom-30">
													<div class="m-padding-top-10">
														<a href="<?php echo site_url(); ?>/knowledge/blog/<?php echo $blog->origin_id[0]; ?>" class="m-margin-bottom-15 blog-bg" style="background-image:url(<?php echo $blog->thumbnail[0]; ?>);" title="The future of social forestry in Indonesia">

														</a>
														<div class="m-uppercase m-weight-600 text--sm m-margin-bottom-10 m-margin-top-15">Blog</div>
														<h4 class="m-weight-700">
															<a href="<?php echo site_url(); ?>/knowledge/blog/<?php echo $blog->origin_id[0]; ?>" class="m-link-dark" title="The future of social forestry in Indonesia">
																<?php echo $blog->title; ?>
															</a>
														</h4>
														<div class="text--sm">
															<?php echo $blog->published_date[0]; ?>
														</div>
													</div>
												</div>


											<?php endforeach; ?>
										</div>
									</div>

								<?php endif; ?>

								<!-- end forestnews -->

								<!-- presentation start -->
								<?php if($fileObj_presentation!=[]): ?>
									<div id="publications" class="m-section m-margin-bottom-30">
										<div class="row middle-md m-margin-bottom-20">
											<div class="col-md-6 col-xs-7">
												<h4 class="m-uppercase m-weight-700 has-icon m-margin-bottom-0">

                                            <span class="type icon-publication">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/starter/assets/img/icon-publication.svg">
                                            </span>
													<span>Presentation<?php if(count($fileObj_presentation) > 1){ echo 's';}?></span>
												</h4>
											</div>
											<div class="col-md-6 col-xs-5">
												<?php if($docs_presentation['total']  > 3): ?>
													<div class="text-right">
														<a class="link-has-border-dark m-weight-700 text--sm" href="<?php echo site_url().'/knowledge/search/?dtype%5B%5D=presentation'.$search_funder.$search_partner; ?>">Browse all</a>
													</div>
												<?php endif; ?>

											</div>
										</div>
										<div class="row">
											<?php foreach($fileObj_presentation as $presentation): ?>

												<div class="col-md-4 col-xs-12 col-sm-6 m-margin-xs-bottom-30">
													<div class="m-padding-top-10">
														<a href="<?php echo site_url(); ?>/knowledge/slide/84058346" title="<?php echo $presentation->title; ?>" class="m-margin-bottom-15 blog-bg img-ph" style="background-image:url(<?php echo $presentation->thumbnail[0]; ?>);">
														</a>
														<div class="m-uppercase m-weight-600 text--sm m-margin-bottom-10 m-margin-top-15">
															Presentation
														</div>
														<h4 class="m-weight-700">
															<a href="<?php echo site_url(); ?>/knowledge/slide/84058346" lass="m-link-dark" title="<?php echo $presentation->title; ?>">
																<?php echo $presentation->title; ?>
															</a>
														</h4>
														<div class="text--sm">
															<?php echo $presentation->published_date[0]; ?>
														</div>
													</div>
												</div>
											<?php endforeach; ?>
										</div>
									</div>

								<?php endif; ?>

								<!-- end presentation -->




							</div>
							<!--
							<a type="button" class="btn btn-default btn-yellow btn-lg" href="<?php echo $row->_link_to; ?>" target="_blank">Read more</a>
							-->
						</div>
					</div>



				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12">

				</div>
			</div>
		</div>


	</div>
</div>
<!-- End of Main content -->
</article><!-- #post-<?php  echo 'partner-'.$donor_id; ?> -->



