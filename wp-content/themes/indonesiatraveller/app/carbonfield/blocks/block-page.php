<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'carbon_fields_register_fields', 'cf_block_page_gutenberg' );
function cf_block_page_gutenberg(){

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
                    'corporate-news' => __( 'corporate-news' ),
                    'press-release' => __( 'press-release' ),
                    'media-coverage' => __( 'media-coverage' ),
                    'news-update' => __( 'news-update' ),
                    'post' => __( 'post' ),
                )
            )->set_width( 50 ),

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

    /*
    'nopaging' => false,
    'posts_per_page' => 10,
     'offset' => 3,

     'post__in' => array(1,2,3), // (array)
      'post__not_in' => array(1,2,3), // (array)
    'order' => 'DESC', // ASC
    'orderby' => 'date' // title , modified, relevance, menu_order, ID, 'post__in'
     'post_status' => array( // (string | array)
    */

    // BLOCK PAGE NEWS
    Block::make( __( 'Section News' ) )
    ->add_tab( __( 'Section News' ),  $default_tab )
    ->add_tab(__('Options'), array(
            Field::make( 'checkbox', 'news_hide_label', 'Hide label' )->set_width( 30 ),
            Field::make( 'checkbox', 'news_hide_date', 'Hide date' )->set_width( 30 ),
            Field::make( 'checkbox', 'news_hide_image', 'Hide image' )->set_width( 30 ),
            Field::make( 'complex', 'news_items' ,' ')
            ->add_fields( 'news_items', array(
                Field::make( 'text', 'news_title', 'Title' ),
                Field::make( 'text', 'news_label', 'Label' )->set_width( 50 ),
                Field::make( 'date', 'news_date', 'Date')->set_width( 50 ),
                Field::make( 'image', 'news_image', 'Image Background' )->set_width( 50 ),
                Field::make( 'text', 'news_url', __( 'URL/Link' ) )->set_width( 50 ),
            ))->set_header_template( '
            <% if (news_title) { %>
                <%- news_title %>
            <% }else{ %>
                -
            <% } %>
            ' )->set_collapsed( true )->set_max(3),
        )
    )
    ->add_tab( __( 'Query' ), $wpe_query )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-section-news',$block);
        }
    });

    // BLOCK MAP
    Block::make( __( 'Section MAP' ) )
    ->add_tab( __( 'Section MAP' ),  $default_tab )
    ->add_tab(__('Options'), array(
            Field::make( 'checkbox', 'map_full_section', 'Fullwidth Section' )->set_width( 50 ),
            Field::make( 'checkbox', 'map_full_column', 'Fulwidth Column' )->set_width( 50 ),
            Field::make( 'image', 'map_image', 'Map Image' ),
            Field::make( 'textarea', 'map_code', 'MAP code' ),
            Field::make( 'textarea', 'map_scripts', 'Mab Libs' ),
        )
    )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-section-map',$block);
        }
    });

    // BLOCK BOX NAV
    Block::make( __( 'Section BOX Nav' ) )
    ->add_tab( __( 'Section BOX Nav' ),  $default_tab )
    ->add_tab(__('Options'), array(
        Field::make( 'checkbox', 'nav_full_section', 'Fullwidth Section' )->set_width( 50 ),
        Field::make( 'checkbox', 'nav_full_column', 'Fulwidth Column' )->set_width( 50 ),
        Field::make( 'complex', 'nav_items' ,' ')
            ->add_fields( 'nav_items', array(
                Field::make( 'text', 'nav_title', 'Title' ),
                Field::make( 'text', 'nav_label', 'Label' )->set_width( 50 ),
                Field::make( 'text', 'nav_url', __( 'URL/Link' ) )->set_width( 50 ),
                Field::make( 'text', 'nav_background_color', 'Background color' )->set_width( 50 ),
            ))->set_header_template( '
            <% if (nav_title) { %>
                <%- nav_title %>
            <% }else{ %>
                -
            <% } %>
            ' )->set_collapsed( true )->set_max(3),
        )
    )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-section-boxnav',$block);
        }
    });


    // BLOCK MAP
    Block::make( __( 'Section Rich Text' ) )
    ->add_tab( __( 'Section Rich Text' ),  $default_tab )
    ->add_tab(__('Options'), array(
            Field::make( 'checkbox', 'text_full_section', 'Fullwidth Section' )->set_width( 50 ),
            Field::make( 'checkbox', 'text_full_column', '12 Column' )->set_width( 50 ),
            Field::make( 'rich_text', 'text_content', 'Text' ),
            Field::make( 'textarea', 'text_code', 'HTML Code' ),
            Field::make( 'image', 'text_image', 'Image Background Section' ),
        )
    )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-section-text',$block);
        }
    });

    // BLOCK HTML
    Block::make( __( 'Section HTML' ) )
    ->add_tab( __( 'Section HTML' ),  $default_tab )
    ->add_tab(__('Options'), array(
            Field::make( 'checkbox', 'html_full_section', 'Fullwidth Section' )->set_width( 50 ),
            Field::make( 'checkbox', 'html_full_column', 'Fulwidth Column' )->set_width( 50 ),
            Field::make( 'textarea', 'html_code', 'HTML code' ),
            Field::make( 'textarea', 'html_scripts', 'HTML Libs' ),
            Field::make( 'image', 'html_image', 'Image Background Section' )->set_width( 50 ),
        )
    )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-section-html',$block);
        }
    });

    // BLOCK PAGE NEWS
    Block::make( __( 'Section Latest update' ) )
    ->add_tab( __( 'Section Latest update' ),  $default_tab )
    ->add_tab(__('Options'), array(
            Field::make( 'checkbox', 'news_hide_label', 'Hide label' )->set_width( 30 ),
            Field::make( 'checkbox', 'news_hide_date', 'Hide date' )->set_width( 30 ),
            Field::make( 'checkbox', 'news_hide_image', 'Hide image' )->set_width( 30 ),
            Field::make( 'complex', 'news_items' ,' ')
            ->add_fields( 'news_items', array(
                Field::make( 'text', 'news_title', 'Title' ),
                Field::make( 'text', 'news_label', 'Label' )->set_width( 50 ),
                Field::make( 'date', 'news_date', 'Date')->set_width( 50 ),
                Field::make( 'image', 'news_image', 'Image Background' )->set_width( 50 ),
                Field::make( 'text', 'news_url', __( 'URL/Link' ) )->set_width( 50 ),
            ))->set_header_template( '
            <% if (news_title) { %>
                <%- news_title %>
            <% }else{ %>
                -
            <% } %>
            ' )->set_collapsed( true )->set_max(3),
        )
    )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-section-updates',$block);
        }
    });

    // BLOCK TEXT LIST
    Block::make( __( 'Section Text list' ) )
    ->add_tab( __( 'Section Text list' ),  $default_tab )
    ->add_tab(__('Options'), array(
            Field::make( 'complex', 'list_items' ,' ')
            ->add_fields( 'list_items', array(
                Field::make( 'text', 'list_title', 'Title' ),
                Field::make( 'rich_text', 'list_desc', 'Description' )->set_width( 50 ),
            ))->set_header_template( '
            <% if (list_title) { %>
                <%- list_title %>
            <% }else{ %>
                -
            <% } %>
            ' )->set_collapsed( true ),
        )
    )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-section-textlist',$block);
        }
    });

    // BLOCK MOZAIK
    Block::make( __( 'Section Grid Mozaik' ) )
    ->add_tab( __( 'Section Grid Mozaik' ),  $default_tab )
    ->add_tab(__('Options'), array(
            Field::make( 'checkbox', 'text_full_section', 'Fullwidth Section' )->set_width( 50 ),
            Field::make( 'checkbox', 'text_full_column', '12 Column' )->set_width( 50 ),
            Field::make( 'image', 'text_image', 'Image Background Section' ),
            Field::make( 'complex', 'grid_items' ,' ')
            ->add_fields( 'grid_items', array(
                Field::make( 'text', 'grid_title', 'Title' ),
                Field::make( 'text', 'grid_label', 'Label' )->set_width( 50 ),
                Field::make( 'date', 'grid_date', 'Date')->set_width( 50 ),
                Field::make( 'image', 'grid_image', 'Image Background' )->set_width( 50 ),
                Field::make( 'text', 'grid_url', __( 'URL/Link' ) )->set_width( 50 ),
                Field::make( 'select', 'grid_type', __( 'Grid Type' ) )
                    ->add_options( array(
                        '' => __( '...' ),
                        'grid_a' => __( 'Grid A' ),
                        'grid_b' => __( 'Grid B' ),
                        'grid_c' => __( 'Grid C' ),
                    ) )->set_width( 50 ),
            ))->set_header_template( '
            <% if (grid_title) { %>
                <%- grid_type %> | <%- grid_title %>
            <% }else{ %>
                -
            <% } %>
            ' )->set_collapsed( true ),
        )
    )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-section-gridmozaik',$block);
        }
    });

    // BLOCK TEXT LIST
    Block::make( __( 'Section Members' ) )
    ->add_tab( __( 'Section Members' ),  $default_tab )
    ->add_tab(__('Options'), array(
            Field::make( 'complex', 'list_items' ,' ')
            ->add_fields( 'list_items', array(
                Field::make( 'text', 'list_title', 'Title' ),
                Field::make( 'text', 'list_label', 'Label' ),
                Field::make( 'textarea', 'list_desc', 'Description' ),
                Field::make( 'text', 'list_url', __( 'URL/Link' ) )->set_width( 50 ),
                Field::make( 'image', 'list_image', 'Image' )->set_width( 50 ),
            ))->set_header_template( '
            <% if (list_title) { %>
                <%- list_title %>
            <% }else{ %>
                -
            <% } %>
            ' )->set_collapsed( true ),
        )
    )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-section-members',$block);
        }
    });

    /**
     *  Block Right Sidebar
     */
    Block::make( __( 'Right Sidebar' ) )
    ->add_tab( __( 'Sidebar' ), array(
        Field::make( 'image', 'image', __( 'Image' ) )->set_value_type( 'url'),
        Field::make( 'rich_text', 'block_sidebar', __( 'Description' ) ),
        Field::make( 'text', 'link', __( 'URL/link' ) )->set_width( 50 ),
        Field::make( 'text', 'class', __( 'CSS Class' ) )->set_width( 50 ),
    ) )
    ->add_tab( __( 'Style' ), array(
        Field::make( 'text', 'block_id', __( 'Block ID CSS' ) ),
        Field::make( 'text', 'block_class', __( 'Block Class CSS' ) ),
        Field::make( 'textarea', 'block_css_code', __( 'CSS Code' ) ),
    ))
    ->set_category( 'cifor-team', __( 'Team Block' ), '' )
    ->set_render_callback( function (  $block ) {
        // render block
        wpe_block_template('block-right-sidebar',$block);
    });

    /**
     *  Block Gutenberg BOT
     */
    Block::make( __( 'BOT' ) )
    ->add_tab( __( 'Board of Trustees' ),  $default_tab )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-section-bot',$block);
        }
    });

}