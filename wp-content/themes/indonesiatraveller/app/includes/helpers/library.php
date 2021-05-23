<?php
function wpe_block_starter(){
    $default_tab = array(
        Field::make( 'checkbox', 'block_hide', 'Hide this block' ),
        Field::make( 'text', 'block_title', __( 'Title' ) ),
        Field::make( 'textarea', 'block_desc', __( 'Description' ) ),
    );

    $default_style = array(
        Field::make( 'text', 'block_id', __( 'Block ID CSS' ) ),
        Field::make( 'text', 'block_class', __( 'Block Class CSS' ) ),
        Field::make( 'textarea', 'block_css_code', __( 'CSS Code' ) ),
    );

    $default_link  = array(
        Field::make( 'text', 'link_more_title', __( 'Title' ) ),
        Field::make( 'text', 'link_more_url', __( 'URL/Link' ) ),
    );

    return array('tab'=>$default_tab,'style'=>$default_style,'link'=>$default_link);
}