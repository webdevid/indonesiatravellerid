<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

/**
 *  Field for CPT Post
 */
add_action( 'carbon_fields_register_fields', 'meta_megamenu' );
function meta_megamenu() {
    Container::make( 'post_meta', 'Page Options' )
    ->where( 'post_type',  'IN', array( 'megamenu'))
    ->add_tab(__('Footer Link'), array(
        Field::make( 'text', 'custome_link_title', 'Title' )->set_width( 50 ),
        Field::make( 'text', 'custome_link_url', 'Url/link' )->set_width( 50 ),
    ));
}