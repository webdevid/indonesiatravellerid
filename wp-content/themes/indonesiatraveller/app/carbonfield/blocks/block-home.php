<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'carbon_fields_register_fields', 'cf_block_gutenberg' );
function cf_block_gutenberg(){

    $default       = wpe_block_starter();
    $default_tab   = $default['tab'];
    $default_style = $default['style'];
    $default_link  = $default['link'];

    $knowledge_arr = array(
        Field::make( 'text', 'knowledge_title', 'Title' ),
        Field::make( 'text', 'knowledge_label', 'Label' )->set_width( 50 ),
        Field::make( 'text', 'knowledge_year', 'Year' )->set_width( 50 ),
        Field::make( 'text', 'knowledge_class', 'extra class css' )->set_width( 50 ),
        Field::make( 'text', 'knowledge_button', __( 'Button Title' ) )->set_width( 50 ),
        Field::make( 'text', 'knowledge_url', __( 'Button Link/URL' ) )->set_width( 50 ),
        Field::make( 'select', 'knowledge_type', __( 'Override Grid Type' ) )
        ->add_options( array(
            '' => __( '...' ),
            'grid_a' => __( 'Grid A' ),
            'grid_b' => __( 'Grid B' ),
            'grid_c' => __( 'Grid C' ),
            'grid_d' => __( 'Grid D' ),
            'grid_e' => __( 'Grid E' ),
            'grid_f' => __( 'Grid F' ),
        ) )->set_width( 50 ),
        Field::make( 'select', 'knowledge_source', __( 'Source type' ) )
        ->add_options( array(
            '' => __( '...' ),
            'ciforicraf' => __( 'CIFOR-ICRAF' ),
            'cifor' => __( 'CIFOR' ),
            'icraf' => __( 'ICRAF' ),
            'glf' => __( 'GLF' ),
            'fta' => __( 'FTA' ),
            'rl' => __( 'RL' ),
        ) )->set_width( 50 ),
        Field::make( 'color', 'knowledge_bg_color', __( 'Background Color' ) )->set_palette( array( '#46db9b', '#008479', '#ffd447' ) ),
        Field::make( 'image', 'knowledge_image', 'Image Background' )->set_width( 50 )

    );

    $wpe_query = array(
        Field::make( 'checkbox', 'enable_query', 'Enable Query' )->set_width( 50 ),
        Field::make( 'association', 'crb_association', __( 'Association' ) )
            ->set_types( array(
                array(
                    'type' => 'post',
                    'post_type' => 'page',
                ),
            ))->set_max( 5 )

    );


    // BLOCK HERO
    Block::make( __( 'Home Hero' ) )
    ->add_tab( __( 'Home Hero' ), $default_tab )
    ->add_tab(__('Options'), array(
            Field::make( 'text', 'hero_title', __( 'Hero Title' ) ),
            Field::make( 'text', 'hero_featured_title', __( 'Hero Featured Title' ) ),
            Field::make( 'textarea', 'hero_description', __( 'Hero Description' ) ),
            Field::make( 'image', 'hero_image', __( 'Image Background' ) ),
            Field::make( 'text', 'hero_anchor', __( 'Link arrow' ) ),
        )
    )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-home-hero',$block);
        }

    });

    // BLOCK NEWS
    Block::make( __( 'Home News' ) )
    ->add_tab( __( 'Home News' ),  $default_tab )
    ->add_tab(__('Options'), array(
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
            wpe_block_template('block-home-news',$block);
        }
    });

    // BLOCK KNOWLEDGE
    Block::make( __( 'Home Knowledge' ) )
    ->add_tab( __( 'Home Knowledge' ),  $default_tab )
    ->add_tab(__('Options'), array(
        Field::make( 'complex', 'knowledge_items' ,' ')
            ->add_fields( 'grid_a', $knowledge_arr)
            ->set_header_template( '<% if (knowledge_title) { %> grid_a <% if (!_.isEmpty(knowledge_type)){ %> | <%- knowledge_type %> <% } %> - <%- knowledge_label %>  <% }else{ %> grid_a <% } %>' )
            ->add_fields( 'grid_b', $knowledge_arr)
            ->set_header_template( '<% if (knowledge_title) { %> grid_b <% if (!_.isEmpty(knowledge_type)){ %> | <%- knowledge_type %> <% } %> - <%- knowledge_label %>  <% }else{ %> grid_b <% } %>' )
            ->add_fields( 'grid_c', $knowledge_arr)
            ->set_header_template( '<% if (knowledge_title) { %> grid_c <% if (!_.isEmpty(knowledge_type)){ %> | <%- knowledge_type %> <% } %> - <%- knowledge_label %>  <% }else{ %> grid_c <% } %>' )
            ->add_fields( 'grid_d', $knowledge_arr)
            ->set_header_template( '<% if (knowledge_title) { %> grid_d <% if (!_.isEmpty(knowledge_type)){ %> | <%- knowledge_type %> <% } %> - <%- knowledge_label %>  <% }else{ %> grid_d <% } %>' )
            ->add_fields( 'grid_e', $knowledge_arr)
            ->set_header_template( '<% if (knowledge_title) { %> grid_e <% if (!_.isEmpty(knowledge_type)){ %> | <%- knowledge_type %> <% } %> - <%- knowledge_label %>  <% }else{ %> grid_e <% } %>' )
            ->add_fields( 'grid_f', $knowledge_arr)
            ->set_header_template( '<% if (knowledge_title) { %> grid_f <% if (!_.isEmpty(knowledge_type)){ %> | <%- knowledge_type %> <% } %> - <%- knowledge_label %>  <% }else{ %> grid_f <% } %>' )
            ->set_collapsed( true )
        )
    )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-home-knowledge',$block);
        }
    });

    // BLOCK EVENTS
    Block::make( __( 'Home Events' ) )
    ->add_tab( __( 'Home Events' ),  $default_tab )
    ->add_tab(__('Options'), array(
        Field::make( 'complex', 'event_items' ,' ')
            ->add_fields( 'event_items', array(
                Field::make( 'multiselect', 'event_post', __( 'Event post' ) )
                ->add_options( array(
                    'red' => 'Red',
                    'green' => 'Green',
                    'blue' => 'Blue',
                )),
                Field::make( 'text', 'event_title', 'Title' )->set_width( 50 ),
                Field::make( 'text', 'event_label', 'Label' )->set_width( 50 ),
                Field::make( 'date', 'event_date_start', 'Date start')->set_width( 50 ),
                Field::make( 'date', 'event_date_end', 'Date  End')->set_width( 50 ),
                Field::make( 'textarea', 'event_desc', 'Description')->set_width( 100 ),
                Field::make( 'text', 'event_type', 'Type')->set_width( 50 ),
                Field::make( 'text', 'event_url', __( 'URL/Link' ) )->set_width( 50 ),
                Field::make( 'image', 'event_image', 'Image Background' )->set_width( 50 ),
            ))->set_header_template( '
            <% if (event_title) { %>
                <%- event_title %>
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
           wpe_block_template('block-home-event',$block);
        }
    });

    // BLOCK SUBSCRIBE
    Block::make( __( 'Home Subscribe' ) )
    ->add_tab( __( 'Home Subscribe' ),  $default_tab )
    ->add_tab(__('Options'), array(
            Field::make( 'text', 'subscribe_placeholder', 'Text Placeholder' ),
            Field::make( 'text', 'subscribe_url', __( 'Form action' ) )->set_width( 50 )
            )
        )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-home-subscribe',$block);
        }
    });

    // BLOCK THEMES
    Block::make( __( 'Home Themes' ) )
    ->add_tab( __( 'Home Themes' ),  $default_tab )
    ->add_tab(__('Options'), array(
        Field::make( 'textarea', 'option_description', 'Description')->set_width( 100 ),
        Field::make( 'complex', 'theme_items' ,' ')
            ->add_fields( 'theme_items', array(
                Field::make( 'text', 'theme_title', 'Title' ),
                Field::make( 'textarea', 'theme_desc', 'Description' )->set_width( 50 ),
                Field::make( 'image', 'theme_image', 'Image Background' )->set_width( 50 ),
                Field::make( 'text', 'theme_button', __( 'Button Title' ) )->set_width( 50 ),
                Field::make( 'text', 'theme_url', __( 'Button Link/URL' ) )->set_width( 50 ),
            ))->set_header_template( '
            <% if (theme_title) { %>
                <%- theme_title %>
            <% }else{ %>
                -
            <% } %>
            ' )->set_collapsed( true ),
        )
    )
    ->add_tab(__('Query'), $wpe_query )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-home-themes',$block);
        }
    });



    // BLOCK FEATURE
    Block::make( __( 'Home Feature' ) )
    //->add_tab( __( 'Home Feature' ),  $default_tab )
    ->add_tab(__('Options'), array(
        Field::make( 'textarea', 'feature_html', 'HTML CODE' ),
        )
    )
    //->add_tab( __( 'Link More' ), $default_link )
    //->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-home-feature',$block);
        }
    });

    // BLOCK TEXT
    Block::make( __( 'Home Text' ) )
    ->add_tab( __( 'Fullwidth Text' ),  $default_tab )
    ->add_tab(__('Options'), array(
        Field::make( 'textarea', 'text_html', 'HTML CODE' ),
        )
    )
    //->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-home-text',$block);
        }
    });

    // BLOCK TEXT
    Block::make( __( 'Home Button' ) )
    ->add_tab( __( 'Fullwidth Button' ),  $default_tab )
    ->add_tab(__('Options'), array(
        Field::make( 'complex', 'button_items' ,' ')
            ->add_fields( 'theme_items', array(
                Field::make( 'text', 'button_title', __( 'Button Title' ) )->set_width( 50 ),
                Field::make( 'text', 'button_url', __( 'Button Link/URL' ) )->set_width( 50 ),
            ))->set_header_template( '
            <% if (button_title) { %>
                <%- button_title %>
            <% }else{ %>
                -
            <% } %>
            ' )->set_collapsed( true ),
        )
    )
    //->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-home-button',$block);
        }
    });

    // BLOCK
    Block::make( __( 'Home Jobs' ) )
    ->add_tab( __( 'Home Jobs' ),  $default_tab )
    ->add_tab(__('Options'), array(
        Field::make( 'complex', 'jobs_items' ,' ')
            ->add_fields( 'jobs_items', array(
                Field::make( 'text', 'jobs_title', 'Job Title' ),
                Field::make( 'text', 'jobs_position', 'Position' )->set_width( 50 ),
                Field::make( 'text', 'jobs_location', 'Location' )->set_width( 50 ),
                Field::make( 'date', 'jobs_date', 'Date')->set_width( 50 ),
                Field::make( 'text', 'jobs_button', __( 'Button Title' ) )->set_width( 50 ),
                Field::make( 'text', 'jobs_url', __( 'Button Link/URL' ) )->set_width( 50 ),
            ))->set_header_template( '
            <% if (jobs_title) { %>
                <%- jobs_title %>
            <% }else{ %>
                -
            <% } %>
            ' )->set_collapsed( true )->set_max(5),
        )
    )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-home-jobs',$block);
        }
    });

    // BLOCK
    Block::make( __( 'Home Discover' ) )
    ->add_tab( __( 'Home Discover' ),  $default_tab )
    ->add_tab(__('Options'), array(
        Field::make( 'image', 'discover_image', 'Image Background Section' )->set_width( 50 ),
        Field::make( 'complex', 'discover_items' ,'Discover Items')
            ->add_fields( 'discover_items', array(
                Field::make( 'text', 'discover_title', 'Title' ),
                Field::make( 'text', 'discover_website', 'Website' )->set_width( 50 ),
                Field::make( 'text', 'discover_url', __( 'Link/URL' ) )->set_width( 50 ),
                Field::make( 'textarea', 'discover_desc', 'Descripton' )->set_width( 50 ),
                Field::make( 'text', 'discover_image', 'Logo SVG' )->set_width( 50 ),
            ))->set_header_template( '
            <% if (discover_title) { %>
                <%- discover_title %>
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
            wpe_block_template('block-home-discover',$block);
        }
    });

    // BLOCK SUBSCRIBE
    Block::make( __( 'Home Section logo' ) )
    ->add_tab( __( 'Home Section logo' ),  $default_tab )
    ->add_tab(__('Options'), array(
            Field::make( 'textarea', 'html_code', 'Html code' )->set_width( 50 ),
            )
        )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockhome', __( 'Home block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-home-logo',$block);
        }
    });
}

