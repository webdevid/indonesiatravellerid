<?php

// includes
//require get_template_directory() . '/app/includes/class/minify-html.php';

// helper
require get_template_directory() . '/app/includes/helpers/search.php' ;
require get_template_directory() . '/app/includes/helpers/dev.php' ;
require get_template_directory() . '/app/includes/helpers/menu.php' ;
require get_template_directory() . '/app/includes/helpers/blocks.php' ;
require get_template_directory() . '/app/includes/helpers/breadcrumbs.php' ;
require get_template_directory() . '/app/includes/helpers/template.php' ;
require get_template_directory() . '/app/includes/helpers/rewrite.php' ;

// // CPT
// require get_template_directory() . '/app/cpt/event.php' ;
// require get_template_directory() . '/app/cpt/corporate-news.php' ;
// require get_template_directory() . '/app/cpt/press-release.php' ;
// require get_template_directory() . '/app/cpt/media-coverage.php' ;
// require get_template_directory() . '/app/cpt/news-update.php' ;
require get_template_directory() . '/app/cpt/megamenu.php' ;

// CarbonFields
// meta
//require get_template_directory() . '/app/carbonfield/meta/meta_event.php' ;
require get_template_directory() . '/app/carbonfield/meta/meta_page.php' ;
require get_template_directory() . '/app/carbonfield/meta/meta_megamenu.php' ;

// blocks
require get_template_directory() . '/app/carbonfield/blocks/block-default.php' ;
//require get_template_directory() . '/app/carbonfield/blocks/block-events.php' ;
// require get_template_directory() . '/app/carbonfield/blocks/block-home.php' ;
// require get_template_directory() . '/app/carbonfield/blocks/block-page.php' ;
//require get_template_directory() . '/app/carbonfield/blocks/block-megamenu.php' ;
//require get_template_directory() . '/app/carbonfield/blocks/block-about.php' ;

// option
require get_template_directory() . '/app/carbonfield/options/wpe-options.php' ;

