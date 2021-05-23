<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'carbon_fields_register_fields', 'wpe_block' );
function wpe_block(){

    $default       = wpe_block_starter();
    $default_tab   = $default['tab'];
    $default_style = $default['style'];
    $default_link  = $default['link'];

    $wpe_query = array(
        Field::make( 'checkbox', 'enable_query', 'Enable Query' )->set_width( 50 ),
        Field::make( 'checkbox', 'enable_pagination', 'Enable Pagination' )->set_width( 50 ),
        Field::make( 'select', 'post_type', __( 'Custome post type' ) )
                ->add_options(
                    array(
                    '' => '-',
                    'destination' => __( 'Destination' ),
                    'attraction' => __( 'Attraction' ),
                    'directory' => __( 'Directory' ),
                    'story' => __( 'story' ),
                    'experience' => __( 'experience' ),
                    'event' => __( 'event' ),
                )
            )->set_width( 50 ),

        Field::make( 'text', 'post_status', 'post_status' )->set_width( 50 ),
        Field::make( 'text', 'post__in', 'post__in' )->set_width( 50 ),
        Field::make( 'text', 'post__not_in', 'post__not_in' )->set_width( 50 ),

        Field::make( 'select', 'orderby', __( 'orderby' ) )
                ->add_options(
                    array(
                    '' => '-',
                    'date' => __( 'date' ),
                    'title' => __( 'title' ),
                    'relevance' => __( 'relevance' ),
                    'menu_order' => __( 'menu_order' ),
                    'post__in' => __( 'post__in' ),
                )
            )->set_width( 50 ),
        Field::make( 'select', 'order', __( 'order' ) )
                ->add_options(
                    array(
                    '' => '-',
                    'DESC' => __( 'DESC' ),
                    'ASC' => __( 'ASC' ),
                )
            )->set_width( 50 ),
        Field::make( 'text', 'posts_per_page', 'posts_per_page' )->set_width( 50 ),


    );


    // BLOCK HERO
    Block::make( __( 'Main Hero' ) )
    ->add_tab( __( 'Main Hero' ), $default_tab )
    ->add_tab(__('Options'), array(
            Field::make( 'checkbox', 'show_label', 'Show label' )->set_width( 20 ),
            Field::make( 'checkbox', 'show_date', 'Show date' )->set_width( 20 ),
            Field::make( 'checkbox', 'show_author', 'Show author' )->set_width( 20 ),
            Field::make( 'checkbox', 'show_excerpt', 'Show Excerpt' )->set_width( 20 ),
            Field::make( 'checkbox', 'show_more', 'Show More' )->set_width( 20 ),
            Field::make( 'checkbox', 'show_image', 'Show image' )->set_width( 20 ),
        )
    )
    ->add_tab(__('Query'), $wpe_query )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'wpeblock', __( 'Default' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-tpl-hero',$block);
        }

    });

    // BLOCK SINGLE HERO
    Block::make( __( 'Single Hero' ) )
    ->add_tab( __( 'Single Hero' ), $default_tab )
    ->add_tab(__('Options'), array(
            Field::make( 'checkbox', 'show_label', 'Show label' )->set_width( 20 ),
            Field::make( 'checkbox', 'show_date', 'Show date' )->set_width( 20 ),
            Field::make( 'checkbox', 'show_author', 'Show author' )->set_width( 20 ),
            Field::make( 'checkbox', 'show_excerpt', 'Show Excerpt' )->set_width( 20 ),
            Field::make( 'checkbox', 'show_more', 'Show More' )->set_width( 20 ),
            Field::make( 'checkbox', 'show_image', 'Show image' )->set_width( 20 ),
        )
    )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'wpeblock', __( 'Default' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-tpl-hero-single',$block);
        }
    });

    // BLOCK POSTS
    Block::make( __( 'Block posts' ) )
    ->add_tab( __( 'Block posts' ), $default_tab )
    ->add_tab(__('Options'), array(
            Field::make( 'checkbox', 'show_label', 'Show label' )->set_width( 20 ),
            Field::make( 'checkbox', 'show_date', 'Show date' )->set_width( 20 ),
            Field::make( 'checkbox', 'show_author', 'Show author' )->set_width( 20 ),
            Field::make( 'checkbox', 'show_excerpt', 'Show Excerpt' )->set_width( 20 ),
            Field::make( 'checkbox', 'show_more', 'Show More' )->set_width( 20 ),

            Field::make( 'select', 'layout', __( 'Layout' ) )
                ->add_options(
                    array(
                    '' => '-',
                    'cover' => __( 'Cover' ),
                    'grid' => __( 'Grid' ),
                    'list' => __( 'List' ),
                )
            )->set_width( 50 ),
            Field::make( 'select', 'column', __( 'Column' ) )
                ->add_options(
                    array(
                    '' => '-',
                    '1' => __( '1' ),
                    '2' => __( '2' ),
                    '3' => __( '3' ),
                    '4' => __( '4' ),
                )
            )->set_width( 50 ),
            Field::make( 'checkbox', 'show_image', 'Show image' )->set_width( 100 ),
            // Field::make( 'select', 'layout', __( 'Layout' ) )
            //     ->add_options(
            //         array(
            //         '' => '-',
            //         'cover' => __( 'Cover' ),
            //         'grid' => __( 'Grid' ),
            //         'list' => __( 'List' ),
            //     )
            // )->set_width( 50 ),
        )
    )
    ->add_tab(__('Query'), $wpe_query )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'wpeblock', __( 'Default' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-tpl-posts',$block);
        }
    });


}