<?php
/**
 * 
 */

/**
 * Register metabox for posts based on Redux Framework. Supported methods:
 *     isset_args( $post_type )
 *     set_args( $post_type, $redux_args, $metabox_args )
 *     add_section( $post_type, $sections )
 * Each post type can contains only one metabox. Pease note that each field id
 * leads by an underscore sign ( _ ) in order to not show that into Custom Field
 * Metabox from WordPress core feature.
 * 
 * @param  EFramework_Post_Metabox $metabox
 */
function abtheme_page_options_register( $metabox )
{
    if ( ! $metabox->isset_args( 'page' ) )
    {
        $metabox->set_args( 'page', array(
            'opt_name'     => 'abtheme_page_options',
            'display_name' => esc_html__( 'Page Settings', 'abtheme' )
        ), array(
            'context'  => 'advanced',
            'priority' => 'default'
        ) );
    }
    if ( ! $metabox->isset_args( 'post' ) )
    {
        $metabox->set_args( 'post', array(
            'opt_name'     => 'abtheme_post_options',
            'display_name' => esc_html__( 'Post Settings', 'abtheme' )
        ), array(
            'context'  => 'advanced',
            'priority' => 'default'
        ) );
    }

    $metabox->add_section( 'page', array(
        'title' => esc_html__( 'General', 'abtheme' ),
        'desc'  => esc_html__( 'General settings for the page.', 'abtheme' ),
        'fields' => array(
            array(
                'id'       => '_custom_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Custom Title', 'abtheme' ),
                'subtitle' => esc_html__( 'Use custom title for this page. The default title will be used on document title.', 'abtheme' )
            ),
            array(
                'id'       => '_custom_desc',
                'type'     => 'text',
                'title'    => esc_html__( 'Custom description', 'abtheme' ),
                'subtitle' => esc_html__( 'Show custom page description under page title', 'abtheme' )
            )
        )
    ) );

    $metabox->add_section( 'post', array(
        'title' => esc_html__( 'General', 'abtheme' ),
        'desc'  => esc_html__( 'General settings for the page.', 'abtheme' ),
        'fields' => array(
            array(
                'id'       => '_custom_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Custom Title', 'abtheme' ),
                'subtitle' => esc_html__( 'Use custom title for this page. The default title will be used on document title.', 'abtheme' )
            ),
            array(
                'id'       => '_custom_desc',
                'type'     => 'text',
                'title'    => esc_html__( 'Custom description', 'abtheme' ),
                'subtitle' => esc_html__( 'Show custom page description under page title', 'abtheme' )
            )
        )
    ) );

    $metabox->add_section( 'page', array(
        'title' => esc_html__( 'Header', 'abtheme' ),
        'desc'  => esc_html__( 'Header settings for the page.', 'abtheme' ),
        'icon'  => 'el-icon-website',
        'fields' => array(
            array(
                'id'       => '_header_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'abtheme'),
                'subtitle' => esc_html__( 'Select a layout for header.', 'abtheme' ),
                'options'  => array(
                    '0'  => get_template_directory_uri().'/assets/images/header-00.png',
                    '1'  => get_template_directory_uri().'/assets/images/header-01.png',
                    '2'  => get_template_directory_uri().'/assets/images/header-02.png'
                ),
                'default'  => '0'
            )
        )
    ) );

    $metabox->add_section( 'page', array(
        'title' => esc_html__( 'Page Header', 'abtheme' ),
        'desc'  => esc_html__( 'Settings for page header area.', 'abtheme' ),
        'icon'  => 'el-icon-map-marker',
        'fields' => array(
            array(
                'id'       => '_pheader_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'abtheme' ),
                'subtitle' => esc_html__( 'Select a layout for page header.', 'abtheme' ),
                'options'  => array(
                    '0' => get_template_directory_uri() . '/assets/images/page-header-00.png',
                    '1' => get_template_directory_uri() . '/assets/images/page-header-01.png',
                    '2' => get_template_directory_uri() . '/assets/images/page-header-02.png'
                ),
                'default'  => '0'
            ),
            array(
                'id'      => '_breadcrumb_on',
                'type'    => 'switch',
                'title'   => esc_html__( 'Breadcrumb', 'abtheme' ),
                'default' => true
            )
        )
    ) );
}
add_action( 'eframework_post_metabox_register', 'abtheme_page_options_register' );