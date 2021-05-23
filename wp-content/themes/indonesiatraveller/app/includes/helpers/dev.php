<?php

function show($val){
    echo '<pre>';
    print_r($val);
    echo '</pre>';
}

function wpe_clean_meta($metas){
    $meta = array_combine(array_keys($metas), array_column($metas, '0'));
    return $meta;
}

/**
 * This wraps blocks of text (delimited by \n) in p tags (similar to nl2br)
 * @author Scott Dover <sdover102@gmail.com>
 * @param str
 * @return str
 */
function wpe_nl2p($string) {
    /* Explode based on new-line */
      $string_parts = explode("\n", $string);

      /* Wrap each block in a p tag */
      $string = '<p>' . implode('</p><p>', $string_parts) . '</p>';

      /* Return the string with empty paragraphs removed */
      return str_replace("<p></p>", '', $string);
}

function prefix_custom_link_option( $url, $post ) {
    global $post;
    $post_id = isset($post->ID) ? $post->ID : '';
    if($post_id!=''){
        $custom_enable = carbon_get_post_meta($post->ID,'custome_link_enable');
        $custom_link = carbon_get_post_meta($post->ID,'custome_link_url');

        // If the custom_link is set and the post type is news change the URL to the custom_link value
        if ( $custom_enable ) {
            if($custom_link){
                $url = $custom_link;//$custom_link;
            }
        }
    }

    // Return the value of the URL
    return $url;
}

add_filter( 'post_link', 'prefix_custom_link_option', 10, 2 );
add_filter( 'page_link', 'prefix_custom_link_option', 10, 2);
add_filter( 'post_type_link', 'prefix_custom_link_option', 10, 2 );

function string_exist($url,$key){
	if (strpos($url, $key) == false) {
		//echo $key . ' not exists in the URL <br>';
		return false;
	}
	else {
		return true;
		//echo $key . ' exists in the URL <br>';
	}
}

//get id by slug
function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}
?>