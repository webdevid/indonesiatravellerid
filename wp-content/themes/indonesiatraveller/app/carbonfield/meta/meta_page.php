<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

/**
 *  Field for CPT Post
 */
add_action( 'carbon_fields_register_fields', 'meta_page' );
function meta_page() {
    Container::make( 'post_meta', 'Page Options' )
    ->where( 'post_type',  'IN', array( 'page', 'post' ,'event', 'corporate-news','media-coverage','press-release','news-update'))
    ->add_tab(__('Side menu left'), array(
        Field::make( 'checkbox', 'enable_sidemenu_page', 'Left menu page' )->set_width( 20 ),
        Field::make( 'checkbox', 'enable_sidemenu_child', 'Show in all child' )->set_width( 20 ),
        Field::make( 'checkbox', 'disable_sidemenu_title', 'Hide title menu' )->set_width( 20 ),
        Field::make( 'complex', 'sidemenu_list_page', '' )
                ->add_fields( array(
                    Field::make( 'text', 'cf_title', 'Title' )->set_width( 25 ),
                    Field::make( 'text', 'cf_link', 'Link' )->set_width( 25 ),
                    Field::make( 'text', 'cf_class', 'Class' )->set_width( 25 ),
                    Field::make( 'text', 'cf_group', 'Group' )->set_width( 25 ),
                ) )

                ->set_conditional_logic( array(
                    array(
                        'field' => 'enable_sidemenu_page',
                        'value' => true,
                    )
                ))->set_collapsed(true)->set_header_template('Menu -  <%- cf_title %> | <%- cf_group %> / <%- cf_link %>'),
    ))
    ->add_tab(__('Featured Image'), array(
        Field::make( 'checkbox', 'hide_featured_image', 'Hide ' )->set_help_text( 'Hide featured image in Detail content' ),
        Field::make( 'checkbox', 'hide_from_list', 'Hide this page from list' )->set_help_text( 'Hide post form all list' ),
        Field::make( 'checkbox', 'layout_page_fullwidth', 'Fullwidth' )->set_help_text( 'Fullwidth layout withour sidebar' ),
        Field::make( 'checkbox', 'layout_page_breadcrumb_top', 'Breadcrumb Top' )->set_help_text( 'Make Breadcrumb Top' ),
    ))
    ->add_tab(__('Hero banner'), array(
        Field::make( 'checkbox', 'enable_hero', 'Hero' )->set_width( 20 ),

        Field::make( 'checkbox', 'fullwidth_hero', 'Fullwidth' )->set_width( 20 ),
        Field::make( 'checkbox', 'center_hero', 'Text center' )->set_width( 20 ),
        Field::make( 'text', 'hero_title', 'Hero title' )->set_width( 50 ),
        Field::make( 'text', 'hero_label', 'Hero label' )->set_width( 50 ),
        Field::make( 'textarea', 'hero_desc', 'Hero Desc' )->set_width( 50 ),
        Field::make( 'textarea', 'hero_html', 'Hero Html' )->set_width( 50 ),
        Field::make( 'color', 'hero_color_background', 'Background Color' )->set_palette( array( '#DDDDDD' ))->set_width( 30 ),
        Field::make( 'text', 'hero_video_background', 'Hero Video Background' )->set_width( 30 ),
        Field::make( 'checkbox', 'enable_hero_childpage', 'Enable Image Hero to all child page' )->set_width( 30 ),
        Field::make( 'image', 'hero_background','Hero Background' )->set_width( 50 ),

    ))
    ->add_tab(__('Opengraph Meta'), array(
        Field::make( 'checkbox', 'og_enable', 'Enable Custome Opengraph' )->set_width( 100 ),
        Field::make( 'text', 'og_title', 'Title' )->set_width( 50 ),
        Field::make( 'text', 'og_url', 'Url/link' )->set_width( 50 ),
        Field::make( 'textarea', 'og_description', 'OG Description' )->set_width( 100 ),
        Field::make( 'image', 'image','Image' )->set_value_type( 'url' )->set_width( 100 ),

    ))
    ->add_tab(__('Custome Link'), array(
        Field::make( 'checkbox', 'custome_link_enable', 'Enable Custome link' )->set_width( 100 ),
        Field::make( 'text', 'custome_link_url', 'Url/link' )->set_width( 50 ),
    ))
    ->add_tab(__('Extra data'), array(
        Field::make( 'text', 'data_btn_title', 'Button title' )->set_width( 50 ),
        Field::make( 'text', 'data_url', 'Url/link' )->set_width( 50 ),
        Field::make( 'textarea', 'data_description', 'Description' )->set_width( 100 ),
        Field::make( 'image', 'data_image','Image' )->set_width( 100 ),

    ));
}


/**
 *  Field for CPT Post
 */
// add_action( 'carbon_fields_register_fields', 'meta_post' );
// function meta_post() {
//     Container::make( 'post_meta', __( 'Post Fields', 'cf' ) )
//         ->where( 'post_type', 'IN', array('post','lib' ))
//         ->add_fields( array(
//             Field::make( 'text', 'cf_linkmore', 'Link more' )->set_width( 30 ),
//             Field::make( 'checkbox', 'cf_canonical', 'Url Canonical Enable' )->set_width( 30 ),
//             Field::make( 'checkbox', 'cf_new_tab', 'New Tab' )->set_width( 30 ),
//         ));
// }