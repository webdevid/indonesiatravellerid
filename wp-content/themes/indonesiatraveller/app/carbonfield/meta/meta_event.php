<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;





/**
 *  Field for CPT Speaker
 */
add_action( 'carbon_fields_register_fields', 'meta_speaker' );
function meta_speaker() {
    Container::make( 'post_meta', __( 'Speaker Fields', 'cf' ) )
        ->where( 'post_type', '=', 'speaker' )
        ->add_fields( array(
            Field::make( 'text', 'cf_profession', 'Profession' )
                ->set_width( 70 ),
            Field::make( 'radio', 'cf_gender', 'Gender')
                ->set_width( 30 )
                ->add_options( array(
                    'male' => 'male',
                    'female' => 'female',
                )),
        ))
        ->add_fields( array(
            Field::make( 'text', 'cf_first_name', 'First Name' )
                ->set_width( 25 ),
            Field::make( 'text', 'cf_last_name', 'Last name' )
                ->set_width( 25 ),
            Field::make( 'text', 'cf_complete', 'Complete Name' )
                ->set_width( 50 ),
        ));
}

/**
 *  Field for CPT Event
 */
add_action( 'carbon_fields_register_fields', 'meta_event' );
function meta_event() {
    Container::make( 'post_meta', __( 'Event option', 'cf' ) )
        ->where( 'post_type', '=', 'event' )
        ->add_fields( array(
            Field::make( 'checkbox', 'cf_event_sticky', 'Sticky this event' )->set_option_value( 'y' ),
            Field::make( 'checkbox', 'cf_event_hero', 'Show Hero' )->set_option_value( 'y' ),
            Field::make( 'date', 'cf_event_date_start', __( 'Event date start' ) )->set_storage_format('Ymd')->set_input_format( 'Ymd', 'Ymd' ),
            Field::make( 'date', 'cf_event_date_end', __( 'Event date end' ) )->set_storage_format('Ymd')->set_input_format( 'Ymd', 'Ymd' ),
            Field::make( 'text', 'cf_event_place', 'Event place' ),
            Field::make( 'text', 'cf_event_label', 'Event label' ),
            Field::make( 'text', 'cf_event_title', 'Event title' ),
            //Field::make( 'select', 'cf_event_subsite', __( 'Subsite Tag' ) )->set_options( 'get_all_subsite' ),
        ))->set_context( 'side' )->set_priority( 'core');
}


/**
 *  Field for CPT Event
 */
/*
add_action( 'carbon_fields_register_fields', 'meta_event' );
function meta_event() {
    Container::make( 'post_meta', __( 'Event Fields', 'cf' ) )
        ->where( 'post_type', '=', 'event' )
        ->add_fields( array(
            Field::make( 'checkbox', 'cf_event_preview', 'Preview Mode' ),
            Field::make( 'text', 'cf_subtitle', 'Subtitle'),
            Field::make( 'text', 'cf_tagline', 'Tagline')
        ))
        ->add_fields( array(
            Field::make( 'date', 'cf_date', 'Start Event Date' )
                ->set_attribute( 'placeholder', 'Date of event start' )
                ->set_width( 50 ),
            Field::make( 'date', 'cf_end_date', 'End Event Date' )
                ->set_attribute( 'placeholder', 'Date of event end' )
                ->set_width( 50 ),
            Field::make( 'time', 'cf_time_start', 'Start time' )
                ->set_width( 50 ),
            Field::make( 'time', 'cf_time_end', 'End time')
                ->set_width( 50 ),
            Field::make( 'checkbox', 'cf_show_speaker_carousel', 'Show Speaker Slide' )
                ->set_width( 50 ),
            Field::make( 'select', 'cf_layout', 'Layout' )
                ->add_options( array(
                    'l0' => 'Default',
                    'l1' => 'Livestream Enable',
                    'l2' => 'Sidebar before agenda',
                    'l3' => 'Sidebar All',
                ))->set_width( 50 )


        ))
        ->add_fields( array(
            Field::make( 'text', 'cf_venue', 'Venue')
                ->set_width( 100 )

        ));

    Container::make( 'post_meta', __( 'Livestreams', 'cf' ) )
        ->where( 'post_type', '=', 'event' )
        ->add_fields( array(
            Field::make( 'checkbox', 'cf_live_show', 'Show Live Stream Box' )->set_width( 25 ),
            Field::make( 'checkbox', 'cf_live_status', 'Enable LiveStream' )->set_width( 25 ),
            Field::make( 'checkbox', 'cf_refresh_button', 'Show Refresh Button' )->set_width( 25 ),
            Field::make( 'text', 'cf_live_bumper', 'Link Bumper Video' )->set_width( 25 ),
            Field::make( 'complex', 'cf_livestream', '' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'text', 'cf_title', 'Title' )->set_width( 50 ),
                    Field::make( 'text', 'cf_link', 'Link' )->set_width( 50 ),
                    Field::make( 'text', 'cf_button', 'Text Button' )->set_width( 50 ),
                    Field::make( 'checkbox', 'cf_live', 'Live Now' )->set_option_value( 'y' )->set_width( 50 ),

                    Field::make( 'image', 'cf_image', 'Thumb' )->set_width( 50 ),
                ) )->set_conditional_logic( array(
                    array(
                        'field' => 'cf_live_status',
                        'value' => true,
                    )
                ) ),
        ));

    Container::make( 'post_meta', __( 'Agenda', 'cf' ) )
        ->where( 'post_type', '=', 'event' )
        ->add_fields( array(
            Field::make( 'association', 'cf_agenda', 'Agenda List' )
                    ->set_max( 1 )
                    ->set_types( array(
                        array(
                            'type' => 'post',
                            'post_type' => 'agenda',
                        ),
                    ))

        ));

    Container::make( 'post_meta', __( 'Speaker Carousel', 'cf' ) )
        ->where( 'post_type', '=', 'event' )
        ->add_fields( array(
            Field::make( 'association', 'cf_speaker', 'Speaker' )
                            ->set_types( array(
                                array(
                                    'type' => 'post',
                                    'post_type' => 'speaker',
                                ),
                            ))
                            ->set_conditional_logic( array(
                                array(
                                    'field' => 'cf_show_speaker_carousel',
                                    'value' => true,
                                )
                            ) )

        ));


    Container::make( 'post_meta', __( 'Hosted by', 'cf' ) )
        ->where( 'post_type', '=', 'event' )
        ->add_fields( array(
            Field::make( 'checkbox', 'cf_hosted_show', 'Show Hosted box' )->set_width( 50 ),
            Field::make( 'text', 'cf_hosted_title', 'Title Hosted' )->set_width( 50 ),
            Field::make( 'complex', 'cf_hosted_list', '' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'text', 'cf_hosted_title', 'Title' )->set_width( 50 ),
                    Field::make( 'text', 'cf_hosted_link', 'Link' )->set_width( 50 ),
                    Field::make( 'image', 'cf_hosted_image', 'Thumb' )->set_value_type( 'url' )->set_width( 50 ),
                ) )->set_conditional_logic( array(
                    array(
                        'field' => 'cf_hosted_show',
                        'value' => true,
                    )
                ) ),

        ));


    Container::make( 'post_meta', __( 'Sidebar Extend Widgets', 'crb' ) )
        ->where( 'post_type', '=', 'event' )
        ->add_fields( array(
            Field::make( 'complex', 'cf_sections', 'Sections' )
                // widget 01
                ->add_fields( 'widget_slide', 'Widget Slide Image', array(
                    Field::make( 'text', 'widget_title', 'Widget Title' ),
                    Field::make( 'complex', 'widget_slide', 'Files' )
                        ->add_fields( array(
                            Field::make( 'text', 'cf_title', 'Title' ),
                            Field::make( 'text', 'cf_link', 'Link' ),
                            Field::make( 'image', 'cf_image', 'Image' )->set_value_type( 'url' ),
                        ) ),
                ) )->set_collapsed(true)->set_header_template('Widget Slide - <%- widget_title %>')

                // widget 02
                ->add_fields( 'widget_media', 'Widget Related Media', array(
                    Field::make( 'text', 'widget_title', 'Widget Title' ),
                    Field::make( 'association', 'media_list', 'Media file' )
                        ->set_types( array(
                            array(
                                'type' => 'post',
                                'post_type' => 'media',
                            ),
                        ) ),
                ) )->set_collapsed(true)->set_header_template('Widget Media -  <%- widget_title %>')

                // widget 03
                ->add_fields( 'widget_text', 'Widget Text', array(
                    Field::make( 'text', 'widget_title', 'Widget Title' ),
                    Field::make( 'rich_text', 'widget_text', 'Text' ),
                ) )->set_collapsed(true)->set_header_template('Widget Text -  <%- widget_title %>')
        ) );


}
*/

/**
 *  Field for CPT Agenda
 */



add_action( 'carbon_fields_register_fields', 'meta_agenda' );
function meta_agenda() {


    $logic_enable = array(
        array(
            'field' => 'enable_single_detail',
            'value' => true,
        )
    );

    $logic_disable = array(
        array(
            'field' => 'enable_single_detail',
            'value' => false,
        )
    );
        //->set_conditional_logic

    Container::make( 'post_meta', __( 'Agenda Fields', 'cf' ) )
        ->where( 'post_type', '=', 'agenda' )
        ->add_fields( array(
            Field::make( 'complex', 'cf_agendas','Agenda by Day')
                ->setup_labels( array(
                    'plural_name' => 'Agenda',
                    'singular_name' => 'Agenda',
                ))
                ->set_layout( 'tabbed-horizontal' )
                ->set_collapsed(true)
                ->add_fields( array(
                Field::make( 'text', 'cf_agenda_day', 'Day'),
                Field::make( 'complex', 'cf_agenda_day_item', 'Agenda by Item' )
                    ->setup_labels( array(
                        'plural_name' => 'Agenda item',
                        'singular_name' => 'Agenda item',
                    ))
                    ->set_collapsed(true)
                    ->add_fields( array(
                        Field::make( 'checkbox', 'enable_single_detail', 'Use single detail' ),

                        Field::make( 'checkbox', 'cf_hide_time', 'Hide Time' )->set_conditional_logic($logic_disable),
                        Field::make( 'time', 'cf_agenda_day_item_time', 'Start time' )->set_picker_options(array('time_24hr'=>'true','dateFormat'=>'H:i'))->set_width( 25 )->set_conditional_logic($logic_disable),
                        Field::make( 'time', 'cf_agenda_day_item_endtime', 'End time' )->set_picker_options(array('time_24hr'=>'true'))->set_width( 25 )->set_conditional_logic($logic_disable),
                        Field::make( 'text', 'cf_agenda_day_item_timezone', 'Time Zone')->set_width( 25 )->set_conditional_logic($logic_disable),
                        Field::make( 'text', 'cf_agenda_day_item_room', 'Room/Venue')->set_width( 25 )->set_conditional_logic($logic_disable),
                        Field::make( 'text', 'cf_agenda_day_item_title', 'Agenda item Title')->set_conditional_logic($logic_disable),
                        Field::make( 'checkbox', 'cf_hide_description', 'Hide Description' )->set_conditional_logic($logic_disable),
                        Field::make( 'rich_text', 'cf_agenda_day_item_desc', 'Agenda item Desc' )->set_rows( 4 )->set_conditional_logic($logic_disable),
                        Field::make( 'checkbox', 'cf_show_speaker', 'Show Speaker' )->set_width( 20 )->set_conditional_logic($logic_disable),
                        Field::make( 'checkbox', 'cf_hide_speaker', 'Hide Speaker in LP' )->set_width( 20 )->set_conditional_logic($logic_disable),
                        Field::make( 'checkbox', 'cf_show_speaker_thumb', 'Show Speaker Thumbnail' )->set_width( 20 )->set_conditional_logic( array(
                            array(
                                'field' => 'cf_show_speaker',
                                'value' => true,
                            )
                        )),
                        Field::make( 'text', 'cf_speaker_title', 'Speaker Title')->set_conditional_logic($logic_disable),
                        Field::make( 'association', 'cf_speaker', 'Speaker' )
                            ->set_types( array(
                                array(
                                    'type' => 'post',
                                    'post_type' => 'speaker',
                                ),
                            ))
                            ->set_conditional_logic( array(
                                array(
                                    'field' => 'cf_show_speaker',
                                    'value' => true,
                                )
                            ) ),
                        Field::make( 'checkbox', 'cf_show_moderator', 'Show moderator' )->set_width( 20 )->set_conditional_logic($logic_disable),
                        Field::make( 'checkbox', 'cf_hide_moderator', 'Hide Moderator in LP' )->set_width( 20 )->set_conditional_logic($logic_disable),
                        Field::make( 'checkbox', 'cf_show_moderator_thumb', 'Show moderator Thumbnail' )->set_width( 20 )->set_conditional_logic( array(
                            array(
                                'field' => 'cf_show_moderator',
                                'value' => true,
                            )
                        )),
                        Field::make( 'text', 'cf_moderator_title', 'Moderator Title')->set_conditional_logic($logic_disable),
                        Field::make( 'association', 'cf_moderator', 'Moderator' )
                            ->set_types( array(
                                array(
                                    'type' => 'post',
                                    'post_type' => 'speaker',
                                ),
                            ))
                            ->set_conditional_logic( array(
                                array(
                                    'field' => 'cf_show_moderator',
                                    'value' => true,
                                )
                            )),


                        Field::make( 'checkbox', 'cf_show_detail_session', 'Show Session detail' ),
                        Field::make( 'association', 'cf_session_detail', 'Session detail' )
                            ->set_types( array(
                                array(
                                    'type' => 'post',
                                    'post_type' => 'session-detail',
                                ),
                            )),

                        Field::make( 'checkbox', 'cf_hide_host', 'Hide host in LP' )->set_conditional_logic($logic_disable),
                        Field::make( 'text', 'org_host_title', 'Host Title')->set_conditional_logic($logic_disable),
                        Field::make( 'complex', 'org_host_flex' ,' ')
                            ->setup_labels( array(
                                'plural_name' => 'Hosts',
                                'singular_name' => 'Host',
                            ))
                            ->add_fields( 'org_host', array(
                                Field::make( 'multiselect', 'org_host_item', __( 'Org Host' ) )->set_options( get_all_donor_event()),
                                    ))->set_collapsed(true)->set_conditional_logic($logic_disable),

                        Field::make( 'checkbox', 'cf_hide_partner', 'Hide Partner in LP' )->set_conditional_logic($logic_disable),
                        Field::make( 'text', 'org_partner_title', 'Partner Title')->set_conditional_logic($logic_disable),
                        Field::make( 'complex', 'org_partner_flex' ,' ')
                            ->setup_labels( array(
                                'plural_name' => 'Partners',
                                'singular_name' => 'Partner',
                            ))
                            ->add_fields( 'org_partner', array(
                                Field::make( 'multiselect', 'org_partner_item', __( 'Org Partner' ) )->set_options( get_all_donor_event())
                                    ))->set_collapsed(true)->set_conditional_logic($logic_disable),

                    ))->set_header_template('<%- cf_agenda_day_item_time %> - <%- cf_agenda_day_item_endtime %> / <%- cf_agenda_day_item_title %>')
            ))->set_header_template('Agenda <%- cf_agenda_day %>')
        ));
}


/**
 *  Field for CPT Agenda
 */



add_action( 'carbon_fields_register_fields', 'meta_session_agenda' );
function meta_session_agenda() {
    Container::make( 'post_meta', __( 'Agenda Fields', 'cf' ) )
        ->where( 'post_type', '=', 'session-detail' )
        ->add_fields( array(

            Field::make( 'text', 'cf_agenda_day', 'Day'),
            Field::make( 'text', 'cf_agenda_time_label', 'Time Label (will overwrite the time below)'),
            Field::make( 'checkbox', 'cf_hide_time', 'Hide Time' ),
            Field::make( 'time', 'cf_agenda_day_item_time', 'Start time' )->set_picker_options(array('time_24hr'=>'true','dateFormat'=>'H:i'))->set_width( 50 ),
            Field::make( 'time', 'cf_agenda_day_item_endtime', 'End time' )->set_picker_options(array('time_24hr'=>'true'))->set_width( 50 ),
            Field::make( 'text', 'cf_agenda_day_item_timezone', 'Time Zone')->set_width( 50 ),
            Field::make( 'text', 'cf_agenda_day_item_room', 'Room/Venue')->set_width( 50 ),
            Field::make( 'text', 'cf_agenda_day_item_title', 'Agenda item Title'),
            Field::make( 'checkbox', 'cf_hide_description', 'Hide Description' )->set_width( 20 ),
            Field::make( 'checkbox', 'cf_show_speaker', 'Show Speaker' )->set_width( 20 ),
            Field::make( 'checkbox', 'cf_hide_speaker', 'Hide Speaker in LP' )->set_width( 20 ),
            Field::make( 'checkbox', 'cf_show_speaker_thumb', 'Show Speaker Thumbnail' )->set_width( 20 )->set_conditional_logic( array(
                array(
                    'field' => 'cf_show_speaker',
                    'value' => true,
                )
            )),
            Field::make( 'text', 'cf_speaker_title', 'Speaker Title'),
            Field::make( 'association', 'cf_speaker', 'Speaker' )
                ->set_types( array(
                    array(
                        'type' => 'post',
                        'post_type' => 'speaker',
                    ),
                ))
                ->set_conditional_logic( array(
                    array(
                        'field' => 'cf_show_speaker',
                        'value' => true,
                    )
                ) ),
            Field::make( 'checkbox', 'cf_show_moderator', 'Show moderator' )->set_width( 20 ),
            Field::make( 'checkbox', 'cf_hide_moderator', 'Hide Moderator in LP' )->set_width( 20 ),
            Field::make( 'checkbox', 'cf_show_moderator_thumb', 'Show moderator Thumbnail' )->set_width( 20 )->set_conditional_logic( array(
                array(
                    'field' => 'cf_show_moderator',
                    'value' => true,
                )
            )),
            Field::make( 'text', 'cf_moderator_title', 'Moderator Title'),
            Field::make( 'association', 'cf_moderator', 'Moderator' )
                ->set_types( array(
                    array(
                        'type' => 'post',
                        'post_type' => 'speaker',
                    ),
                ))
                ->set_conditional_logic( array(
                    array(
                        'field' => 'cf_show_moderator',
                        'value' => true,
                    )
                )),

            Field::make( 'checkbox', 'cf_hide_host', 'Hide host in LP' )->set_width( 50 ),
            Field::make( 'checkbox', 'cf_hide_partner', 'Hide Partner in LP' )->set_width( 50 ),
            Field::make( 'text', 'org_host_title', 'Host Title')->set_width( 50 ),
            Field::make( 'text', 'org_partner_title', 'Partner Title')->set_width( 50 ),
            Field::make( 'complex', 'org_host_flex' ,' ')
                ->add_fields( 'org_host', array(
                    Field::make( 'multiselect', 'org_host_item', __( 'Org Host' ) )->set_options( get_all_donor_event()),
                        ))->set_collapsed(true)->set_width( 50 ),
            Field::make( 'complex', 'org_partner_flex' ,' ')
                ->add_fields( 'org_partner', array(
                    Field::make( 'multiselect', 'org_partner_item', __( 'Org Partner' ) )->set_options( get_all_donor_event())
                        ))->set_collapsed(true)->set_width( 50 ),

        ));
}

// function get_all_donor_event(){
//     if(isset($_REQUEST)){
//         $donor_array = array();

//         global $wpdb;
//         $data = $wpdb->get_results("select * FROM wp__donor");

//         foreach($data as $donor){
//             $donor_array[$donor->id] = $donor->title;
//         }
//         return $donor_array;
//     }
// }

