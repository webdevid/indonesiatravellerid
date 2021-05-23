<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'carbon_fields_register_fields', 'cf_block_megamenu_gutenberg' );
function cf_block_megamenu_gutenberg(){

    $default       = wpe_block_starter();
    $default_style = $default['style'];
    $wpe_query = array(
        Field::make( 'checkbox', 'enable_query', 'Enable Query' )->set_width( 50 ),
        Field::make( 'checkbox', 'enable_pagination', 'Enable Pagination' )->set_width( 50 ),
        Field::make( 'select', 'post_type', __( 'Custome post type' ) )
                ->add_options(
                    array(
                    '' => '-',
                    'corporate-news' => __( 'corporate-news' ),
                    'press-release' => __( 'press-release' ),
                    'media-coverage' => __( 'media-coverage' ),
                    'news-update' => __( 'news-update' ),
                    'post' => __( 'post' ),
                    'event' => __( 'event' ),
                    'page' => __( 'page' ),
                )
            )->set_width( 50 ),

        Field::make( 'text', 'postin', 'post__in' )->set_width( 50 ),
        Field::make( 'text', 'postnotin', 'post__not_in' )->set_width( 50 ),

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


    // BLOCK PAGE NEWS
    Block::make( __( 'Megamenu Box' ) )
    ->add_tab( __( 'Megamenu Box' ),  array(
        Field::make( 'html', 'section_note' )->set_html( '<h2>Megamenu content</h2><p>Section news</p>' ),
        Field::make( 'text', 'block_title', 'Block Title' )->set_width( 100 ),
        Field::make( 'select', 'layout', __( 'Layout' ) )
                ->add_options(
                    array(
                    '' => '-',
                    'L1' => __( 'Layout 01' ),
                    'L2' => __( 'Layout 02' ),
                    'L3' => __( 'Layout 03' ),
                    'L4' => __( 'Layout 04' ),
                )
            )->set_width( 50 ),
    ) )
    ->add_tab(__('Options'), array(
            Field::make( 'checkbox', 'news_hide_label', 'Hide label' )->set_width( 30 ),
            Field::make( 'checkbox', 'news_hide_date', 'Hide date' )->set_width( 30 ),
            Field::make( 'checkbox', 'news_hide_image', 'Hide image' )->set_width( 30 ),
            Field::make( 'complex', 'news_items' ,' ')
            ->add_fields( 'news_items', array(
                Field::make( 'text', 'news_title', 'Title' )->set_width( 50 ),
                Field::make( 'text', 'news_label', 'Label' )->set_width( 50 ),
                Field::make( 'text', 'news_type', 'News type' )->set_width( 50 ),
                Field::make( 'text', 'news_url', __( 'URL/Link' ) )->set_width( 50 ),
                Field::make( 'date', 'news_date_start', 'Date start')->set_width( 50 ),
                Field::make( 'date', 'news_date_end', 'Date end')->set_width( 50 ),
                Field::make( 'image', 'news_image', 'Image Background' )->set_width( 50 ),

            ))->set_header_template( '
            <% if (news_title) { %>
                <%- news_title %>
            <% }else{ %>
                -
            <% } %>
            ' )->set_collapsed( true )->set_max(5),
        )
    )
    ->add_tab( __( 'Query' ), $wpe_query )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockmegamenu', __( 'Megamenu block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        //if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-megamenu-box',$block);
        //}
    });

}