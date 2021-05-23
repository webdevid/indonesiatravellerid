<?php

function block_field($block){
    $blocks = array();

    $blocks['block_hide']        = isset($block['block_hide']) AND $block['block_hide']!='' ? true : false;
    $blocks['block_id']          = isset($block['block_id']) ? $block['block_id'] : 'events';
    $blocks['block_class']       = isset($block['block_class']) ? $block['block_class'] : '';
    $blocks['block_css_code']    = isset($block['block_css_code']) ? $block['block_css_code'] : '';
    $blocks['link_more_title']   = isset($block['link_more_title']) ? $block['link_more_title'] : 'Browse all';
    $blocks['link_more_url']     = isset($block['link_more_url']) ? $block['link_more_url'] : '';
    $blocks['block_title']       = isset($block['block_title']) ? $block['block_title'] : '';
    $blocks['block_desc']        = isset($block['block_desc']) ? $block['block_desc'] : '';

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $arg['paged']           =   $paged;
    $arg['post_type']       =   isset($block['post_type']) ? $block['post_type'] : '';
    $arg['post__in']        =   isset($block['post__in']) ? $block['post__in'] : '';
    $arg['post__not_in']    =   isset($block['post__not_in']) ? $block['post__not_in'] : '';
    $arg['orderby']         =   isset($block['orderby']) ? $block['orderby'] : 'DATE';
    $arg['order']           =   isset($block['order']) ? $block['order'] : 'DESC';
    $arg['posts_per_page']  =   isset($block['posts_per_page']) ? $block['posts_per_page'] : 3;

    $pagination = isset($block['enable_pagination']) ? $block['enable_pagination'] : '';

    if($pagination){

    }else{
        $arg['no_found_rows']   = TRUE;
    }

    $blocks['arg']          =   $arg;

    return $blocks;
}

function cek_hide_block($block_hide){
    $hide = $block_hide!='' ? true : false;
    return $hide;
}

function  wpe_image_single($val,$size=null){
    $attachment     = get_post($val);
    $alt            = get_post_meta($val, '_wp_attachment_image_alt', true);
    $url            = wp_get_attachment_url($val);
    $image_title    = isset($attachment->post_title) ? $attachment->post_title : '';
    $caption        = isset($attachment->post_excerpt) ? $attachment->post_excerpt : '';
    $description    = isset($attachment->post_content) ? $attachment->post_content : '';

    return array('url'=>$url,'alt'=>$alt,'title'=>$image_title,'caption_image'=>$caption,'desc'=>$description);
}

function wpe_block_template($file,$block){
    require get_theme_file_path('/templates/blocks/'.$file.'.php');
}

function wpe_block_event_template($file,$block){
    require get_theme_file_path('/events/blocks/'.$file.'.php');
}

function wpe_block_part($file,$block,$class=null,$block_option=null){
    require get_theme_file_path('/templates/blocks/_parts/'.$file.'.php');
}

function wpe_isset($var){
    $var = isset($var) ? $var : '';
    return $var;
}

function wpe_date($date){
    $datex = date_create($date);
    return date_format($datex,"d M Y");
}


function wpe_date_event($date_start,$date_end){


    $date_s = substr($date_start,5,5);
    $date_e = substr($date_end,5,5);

    $month_s = substr($date_start,5,2);
    $month_e = substr($date_end,5,2);

    $tgl ='';

    if($date_s==$date_e){
        $tgl .= wpe_date($date_start);
    }else{
        $date = date_create($date_start);

        if($month_s==$month_e){
            $date = date_format($date,"d");
        }else{
            $date = date_format($date,"d M");
        }
        $tgl .= $date.' - ';

        $tgl .= wpe_date($date_end);
    }

    return $tgl;
}

function megamenu_cpt_query($arg){
    $result = array();
    $the_query = new WP_Query( $arg );
    // The Loop
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();

            $result[]= array(
                'news_title'=>get_the_title(),
                'news_label'=> strtoupper(str_replace('-',' ',get_post_type())),
                'news_date'=> get_the_date( 'Y-d-n' ),
                'news_image'=> get_post_thumbnail_id(),
                'news_url'=> get_the_permalink(),
                'news_meta'=> get_post_meta(get_the_ID()),
                'news_id'=>get_the_ID()
            );
        }


    } else {
        // no posts found
    }
    /* Restore original Post Data */
    wp_reset_postdata();

    return $result;
}
