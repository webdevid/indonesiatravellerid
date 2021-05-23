<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'carbon_fields_register_fields', 'cf_block_event_gutenberg' );
function cf_block_event_gutenberg(){

    $default       = wpe_block_starter();
    $default_tab   = $default['tab'];
    $default_style = $default['style'];
    $default_link  = $default['link'];

    $default_event = array(
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
                Field::make( 'image', 'event_image', 'Image Background' )->set_width( 50 ),
                Field::make( 'text', 'event_url', __( 'URL/Link' ) )->set_width( 50 ),
            ))->set_header_template( '
            <% if (event_title) { %>
                <%- event_title %>
            <% }else{ %>
                -
            <% } %>
            ' )->set_collapsed( true ),
    );

    // BLOCK HERO
    Block::make( __( 'Event Hero' ) )
    ->add_tab( __( 'Event Hero' ), $default_tab )
    ->add_tab(__('Options'),array(
        Field::make( 'text', 'hero_title', __( 'Hero Title' ) ),
        Field::make( 'text', 'hero_label', __( 'Hero Label' ) ),
        Field::make( 'textarea', 'hero_description', __( 'Hero Description' ) ),
        Field::make( 'date', 'hero_date_start', 'Date start')->set_width( 30 ),
        Field::make( 'date', 'hero_date_end', 'Date end')->set_width( 30 ),
        Field::make( 'text', 'hero_type', 'Type')->set_width( 30 ),
        Field::make( 'text', 'hero_button', __( 'Button Title' ) )->set_width( 50 ),
        Field::make( 'text', 'hero_url', __( 'Button Link/URL' ) )->set_width( 50 ),
        Field::make( 'image', 'hero_image', __( 'Image Background' ) ),
    ))
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockevent', __( 'Event block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-event-hero',$block);
        }
    });

    // BLOCK FEATURED
    Block::make( __( 'Event Feature' ) )
    ->add_tab( __( 'Event Feature' ), $default_tab )
    ->add_tab(__('Options'),$default_event)
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockevent', __( 'Event block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-event-featured',$block);
        }
    });

    // BLOCK UPCOMING
    Block::make( __( 'Event Upcoming' ) )
    ->add_tab( __( 'Event Upcoming' ), $default_tab )
    ->add_tab(__('Options'),$default_event)
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockevent', __( 'Event block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-event-upcoming',$block);
        }
    });

    // BLOCK PAST
    Block::make( __( 'Event Past' ) )
    ->add_tab( __( 'Event Past' ), $default_tab )
    ->add_tab(__('Options'),$default_event)
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockevent', __( 'Event block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-event-past',$block);
        }
    });

    // BLOCK SEARCH BOX
    Block::make( __( 'Event SearchBox' ) )
    ->add_tab( __( 'Event SearchBox' ), $default_tab )
    ->add_tab(__('Options'), array(
            Field::make( 'text', 'searchbox', __( 'Action link Form' ) ),
        )
    )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockevent', __( 'Event block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-event-searchbox',$block);
        }
    });

    // BLOCK INFO
    Block::make( __( 'Event Info' ) )
    ->add_tab( __( 'Event Info' ), $default_tab )
    ->add_tab(__('Options'), array(
        Field::make( 'complex', 'info_items' ,' ')
            ->add_fields( 'info_items', array(
                Field::make( 'text', 'info_name', 'Title' ),
                Field::make( 'text', 'info_position', 'Position' )->set_width( 50 ),
                Field::make( 'text', 'info_email', __( 'Email' ) )->set_width( 50 ),
                Field::make( 'text', 'info_class', 'Css Class' )->set_width( 50 ),
            ))->set_header_template( '
            <% if (info_name) { %>
                <%- info_name %>
            <% }else{ %>
                -
            <% } %>
            ' )->set_collapsed( true ),
        )
    )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockevent', __( 'Event block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-event-info',$block);
        }
    });


    //  copy from cifor based layout need refine

    /**
     *  Block Gutenberg Project info
     */
    Block::make( __( 'About Event' ) )
        ->add_tab( __( 'About event' ), $default_tab )
        ->add_tab( __( 'About sidebar' ), array(
            Field::make( 'complex', 'cf_sidebar', __( 'Side Content' ) )
                ->add_fields( array(
                    Field::make( 'text', 'cf_side_title', __( 'Side Title' ) ),
                    Field::make( 'text', 'cf_side_desc', __( 'Side Desc' ) ),
                ) )->set_collapsed(true)->set_header_template('<%- cf_side_title %> - <%- cf_side_desc %>'),
        ) )
        ->add_tab( __( 'Link More' ), $default_link )
        ->add_tab( __( 'Style' ), $default_style)
        ->set_mode( 'edit' )
        ->set_category( 'blockevent', __( 'Event block' ), '' )
        ->set_render_callback( function ( $block ) {
            // render block
            if(cek_hide_block($block['block_hide'])==false){
                wpe_block_event_template('block-event-about',$block);
            }
    });
    // =======


    /**
     *  Block Gutenberg Program/Agenda
     */
    Block::make( __( 'Program/Agenda' ) )
    ->add_tab( __( 'Program agenda' ), $default_tab )
    ->add_tab( __( 'Program/Agenda' ), array(
        Field::make( 'checkbox', 'cf_agenda_link', 'Enable Permalink' )->set_option_value( 'y' ),
        Field::make( 'association', 'cf_agenda', 'Agenda List' )
                    ->set_max( 1 )
                    ->set_types( array(
                        array(
                            'type' => 'post',
                            'post_type' => 'agenda',
                        ),
                    ))
    ) )
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockevent', __( 'Event block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_event_template('block-event-agenda',$block);
        }

    });
    // =======

}