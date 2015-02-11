<?php
add_filter( 'cmb2_meta_boxes', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb2_sample_metaboxes( array $meta_boxes ) {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_cmb2_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    /*$meta_boxes['test_metabox'] = array(
        'id'            => 'test_metabox',
        'title'         => __( 'Test Metabox', 'cmb2' ),
        'object_types'  => array( 'page','post' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
        'fields'        => array(
            array(
                'name'       => __( 'Test Text', 'cmb2' ),
                'desc'       => __( 'field description (optional)', 'cmb2' ),
                'id'         => $prefix . 'text',
                'type'       => 'text',
                'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
                // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
                // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
                // 'on_front'        => false, // Optionally designate a field to wp-admin only
                // 'repeatable'      => true,
            ),
            array(
                'name' => __( 'Website URL', 'cmb2' ),
                'desc' => __( 'field description (optional)', 'cmb2' ),
                'id'   => $prefix . 'url',
                'type' => 'text_url',
                // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
                // 'repeatable' => true,
            ),
            array(
                'name' => __( 'Test Text Email', 'cmb2' ),
                'desc' => __( 'field description (optional)', 'cmb2' ),
                'id'   => $prefix . 'email',
                'type' => 'text_email',
                // 'repeatable' => true,
            ),array(
                'name' => __( 'Title Color', 'cmb2' ),
                'desc' => __( 'field description (optional)', 'cmb2' ),
                'id'   => $prefix . 'color',
                'type' => 'colorpicker',
                // 'repeatable' => true,
            ),
        ),
    );


    $meta_boxes['movies_mb'] = array(
        'id'            => 'movies_metabox',
        'title'         => __( 'Movies Metabox', 'cmb2' ),
        'object_types'  => array( 'movies' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
        'fields'        => array(
            array(
                'name'       => __( 'Is Featured', 'cmb2' ),
                'id'         => $prefix . 'featured',
                'type'       => 'checkbox',
            ),
            array(
                'name'       => __( 'Director', 'cmb2' ),
                'id'         => $prefix . 'director',
                'type'       => 'text',
            ),
            array(
                'name'       => __( 'Release date', 'cmb2' ),
                'id'         => $prefix . 'date',
                'type'       => 'text_date',
            ),


        ),
    );*/


    // Add other metaboxes as needed
    
    $meta_boxes['allposts'] = array(
        'id'            => 'all_posts_show',
        'title'         => __( 'All Post Metabox', 'cmb2' ),
        'object_types'  => array( 'page' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
        'fields'        => array(
            array(
                'name'    => 'Select Post',
                'desc'    => 'Select an option',
                'id'      => $prefix . 'allpostshow',
                'type'    => 'select',
                /*'options' => array(
                    'standard' => __( 'Option One', 'cmb' ),
                    'custom'   => __( 'Option Two', 'cmb' ),
                    'none'     => __( 'Option Three', 'cmb' ),
                ),*/

                'options' => 'getAllPost'
                
            ),

        ),
    );

    return $meta_boxes;
}