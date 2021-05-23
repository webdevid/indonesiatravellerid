<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'carbon_fields_register_fields', 'cf_block_about_gutenberg' );
function cf_block_about_gutenberg(){
	$default       = wpe_block_starter();
	$default_tab   = $default['tab'];
	$default_style = $default['style'];
	$default_link  = $default['link'];

  // BLOCK CONTACT ADDRESS
    Block::make( __( 'Contact Address' ) )
    ->add_tab( __( 'Contact Address' ), $default_tab )
    ->add_tab(__('Options'),array(
        Field::make( 'complex', 'contact_addresses' ,' ')
            ->add_fields( 'contact_addresses', array(
                Field::make( 'text', 'address_area', 'Address Area' ),
                Field::make( 'text', 'address_id', 'ID' ),
				Field::make( 'complex', 'contact_address_detail' ,' ')
					->add_fields( 'contact_address_detail', array(
						Field::make( 'text', 'country_name', 'Country Name' ),
						Field::make( 'rich_text', 'address_description', 'Address Description' ),
					))->set_header_template( '
					<% if (country_name) { %>
						<%- country_name %>
					<% }else{ %>
						-
					<% } %>
					' )->set_collapsed( true ),
            ))->set_header_template( '
            <% if (address_area) { %>
                <%- address_area %>
            <% }else{ %>
                -
            <% } %>
            ' )->set_collapsed( true ),
    ))
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockevent', __( 'Event block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-contact-address',$block);
        }
    });

	// BLOCK TEAM MEMBER
    Block::make( __( 'Team Member' ) )
    ->add_tab( __( 'Team Member' ), $default_tab )
    ->add_tab(__('Options'),array(
        Field::make( 'complex', 'team_members' ,' ')
            ->add_fields( 'team_members', array(
                Field::make( 'text', 'division_name', 'Division Name' ),
                Field::make( 'text', 'division_id', 'ID' ),
				Field::make( 'complex', 'team_member_detail' ,' ')
					->add_fields( 'team_member_detail', array(
						Field::make( 'text', 'team_member_name', 'Personnel Name' ),
						Field::make( 'rich_text', 'team_member_description', 'Personnel Description' ),
					))->set_header_template( '
					<% if (team_member_name) { %>
						<%- team_member_name %>
					<% }else{ %>
						-
					<% } %>
					' )->set_collapsed( true ),
            ))->set_header_template( '
            <% if (division_name) { %>
                <%- division_name %>
            <% }else{ %>
                -
            <% } %>
            ' )->set_collapsed( true ),
    ))
    ->add_tab( __( 'Link More' ), $default_link )
    ->add_tab( __( 'Style' ), $default_style)
    ->set_mode( 'edit' )
    ->set_category( 'blockevent', __( 'Event block' ), '' )
    ->set_render_callback( function ( $block ) {
        // render block
        if(cek_hide_block($block['block_hide'])==false){
            wpe_block_template('block-team-member',$block);
        }
    });

	/**
     *  Block Partners
     */
    Block::make( __( 'Block Partner Selected' ) )
    ->add_tab( __( 'Block Partner Selected' ), array(
        Field::make( 'text', 'block_title', __( 'Title' ) )->set_default_value('Open position'),
        Field::make( 'rich_text', 'block_desc', __( 'Description' ) ),
    ) )
    ->add_tab( __( 'Partner Featured' ), array(
        Field::make( 'complex', 'partner_featured' ,' ')
            ->add_fields( 'partner_featured', array(
                Field::make( 'multiselect', 'partner_item', __( 'Partner featured' ) )->set_options( get_all_donor())
                    ))->set_collapsed(true)->set_header_template( '
            <% if (partner_item) { %>
                <%- partner_item %>
            <% }else{ %>
                Donor/Partner
            <% } %>
            ' ),

    ))
    ->add_tab( __( 'Partner List' ), array(
        Field::make( 'multiselect', 'content_type', __( 'Partner selected' ) )->set_options( get_all_donor())
    ))
    ->add_tab( __( 'Style' ), array(
        Field::make( 'text', 'block_id', __( 'Block ID CSS' ) ),
        Field::make( 'text', 'block_class', __( 'Block Class CSS' ) ),
        Field::make( 'textarea', 'block_css_code', __( 'CSS Code' ) ),
        Field::make( 'checkbox', 'hide_image', __( 'Hide logo image' ) )->set_option_value( 'false' )->set_width( 30 ),
        Field::make( 'select', 'block_layout', __( 'Layout' ) )
                        ->set_options( array(
                            '-' => '-',
                            'list' => 'List item',
                            'grid' => 'Grid item',
                            'inline' => 'Inline block',
                        ) )->set_width( 30 ),
        Field::make( 'select', 'block_column', __( 'Column' ) )
                        ->set_options( array(
                            '0' => '-',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                        ) )->set_width( 30 ),
    ))
    ->set_category( 'cifor-block', __( 'CIFOR Partner Selected' ), '' )
    ->set_render_callback( function ( $block ) {
		// render block
		wpe_block_template('block-selected-partners',$block);
    });


    /**
     *  Block Gutenberg BOT
     */
    Block::make( __( 'Social media list' ) )
        ->add_tab( __( 'Social media' ), array(
            Field::make( 'text', 'block_title', __( 'Title' ) )->set_default_value('Open position'),
            Field::make( 'rich_text', 'block_desc', __( 'Description' ) ),
        ))
        ->add_tab( __( 'column 1' ), array(
            Field::make( 'complex', 'column_01' ,' ')
            ->add_fields( 'source_custome', array(
                Field::make( 'text', 'group_title', 'Title' ),
                Field::make( 'complex', 'group' ,' ')
                ->add_fields( 'source_list', array(
                    Field::make( 'text', 'source_title', 'Title' ),
                    Field::make( 'text', 'source_link', 'Url/link' )->set_width( 50 ),
                    Field::make( 'select', 'sosmed_item', __( 'Sosmed' ) )->set_options(sosmed_list() )->set_width( 50 ),
                      ))->set_collapsed(true)->set_header_template( '
                <% if (source_title) { %>
                    Sosmed <%- source_title %>
                <% }else{ %>
                    Source Custome
                <% } %>
                ' ),
            ))->set_collapsed(true)->set_header_template( '
            <% if (group_title) { %>
                Group <%- group_title %>
            <% }else{ %>
                Source Custome
            <% } %>
            ' ),
        ))
        ->add_tab( __( 'column 2' ), array(
            Field::make( 'complex', 'column_02' ,' ')
            ->add_fields( 'source_custome', array(
                Field::make( 'text', 'group_title', 'Title' ),
                Field::make( 'complex', 'group' ,' ')
                ->add_fields( 'source_list', array(
                    Field::make( 'text', 'source_title', 'Title' ),
                    Field::make( 'text', 'source_link', 'Url/link' )->set_width( 50 ),
                    Field::make( 'select', 'sosmed_item', __( 'Sosmed' ) )->set_options(sosmed_list() )->set_width( 50 ),
                      ))->set_collapsed(true)->set_header_template( '
                <% if (source_title) { %>
                    Sosmed <%- source_title %>
                <% }else{ %>
                    Source Custome
                <% } %>
                ' ),
            ))->set_collapsed(true)->set_header_template( '
            <% if (group_title) { %>
                Group <%- group_title %>
            <% }else{ %>
                Source Custome
            <% } %>
            ' ),
        ))
        ->add_tab( __( 'Link More' ), array(
            Field::make( 'text', 'block_link_title', __( 'Title' ) )->set_default_value('Read more'),
            Field::make( 'text', 'block_link_url', __( 'URL/Link' ) )->set_default_value('https://www.cifor.org'),
        ))
        ->add_tab( __( 'Style' ), array(
            Field::make( 'text', 'block_id', __( 'Block ID CSS' ) ),
            Field::make( 'text', 'block_class', __( 'Block Class CSS' ) ),
            Field::make( 'textarea', 'block_css_code', __( 'CSS Code' ) ),
        ))
        ->set_category( 'cifor-block', __( 'Cifor Block' ), '' )
        ->set_render_callback( function ( $block ) {
            // render block
		    wpe_block_template('block-social-media',$block);
        });
}