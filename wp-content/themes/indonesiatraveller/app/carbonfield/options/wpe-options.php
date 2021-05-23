<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'wpe_option' );
function wpe_option(){


    // Default options page
    $basic_options_container = Container::make( 'theme_options', __( 'WPE Options' ) )
        ->set_icon( 'dashicons-calendar-alt' )
        ->add_tab(__('Social Media'), array(
            Field::make( 'text', 'socmed_tw', __( 'Twitter Link' ) ),
            Field::make( 'text', 'socmed_fb', __( 'Facebook Link' ) ),
            Field::make( 'text', 'socmed_in', __( 'LinkedIn Link' ) ),
            Field::make( 'text', 'socmed_email', __( 'Email' ) ),
        ));

        // Add second options page under 'Basic Options'
    Container::make( 'theme_options', __( 'Footer' ) )
    ->set_page_parent( $basic_options_container ) // reference to a top level container
    ->add_tab(__('General'), array(
        Field::make( 'textarea', 'footer_description', __( 'Footer Description' ) ),
        Field::make( 'complex', 'footer_logo', ' Footer logo ' )
                    ->add_fields( array(
                        Field::make( 'text', 'footer_logo_name', 'Logo file name' ),
                        Field::make( 'text', 'footer_logo_url', 'Logo url / link' )
                    ))->set_collapsed( true )->set_header_template( '
                    <% if (footer_logo_name) { %> <%- footer_logo_name %> <% }else{ %> - <% } %>' ),
        Field::make( 'text', 'footer_copyright', __( 'Copyright' ) ),
        Field::make( 'text', 'footer_text', __( 'Terms & Policy' ) ),
    ) )
    ->add_tab(__('Footer box'), array(

        Field::make( 'complex', 'wpe_box',' Footer Box' )
            ->add_fields( 'footer_menu',array(
                Field::make( 'text', 'wpe_footer_title','Menu label' ),
                Field::make( 'text', 'wpe_footer_col','Column' ),
                Field::make( 'complex', 'wpe_menu_items', ' Menu items ' )
                    ->add_fields( array(
                        Field::make( 'text', 'menu_item_title', 'Menu title' ),
                        Field::make( 'text', 'menu_item_url', 'Url / Link' )
                    ))->set_collapsed( true )->set_header_template( '
                    <% if (menu_item_title) { %> <%- menu_item_title %> <% }else{ %> - <% } %>' )

            ))->set_collapsed( true )->set_header_template( '<% if (wpe_footer_title) { %> <%- wpe_footer_title %> <% }else{ %> - <% } %>' )
            ->add_fields( 'footer_text', array(
                Field::make( 'text', 'wpe_footer_title','Text label' ),
                Field::make( 'text', 'wpe_footer_col','Column' ),
                Field::make( 'textarea', 'box_text', 'Text' )
            ))->set_collapsed( true )->set_header_template( '<% if (wpe_footer_title) { %> <%- wpe_footer_title %> <% }else{ %> - <% } %>' )
    ) )
    ->add_tab(__('Subscribe form'), array(
        Field::make( 'text', 'wpe_subscribe_action', __( 'Form action url' ) ),
    ) );



    // Add third options page under "Appearance"
    // Container::make( 'theme_options', __( 'Customize Background' ) )
    //     ->set_page_parent( 'themes.php' ) // identificator of the "Appearance" admin section
    //     ->add_fields( array(
    //         Field::make( 'color', 'crb_background_color', __( 'Background Color' ) ),
    //         Field::make( 'image', 'crb_background_image', __( 'Background Image' ) ),
    //     ) );
}