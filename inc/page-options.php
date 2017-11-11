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
function ethemeframework_page_options_register( $metabox )
{
    if ( ! $metabox->isset_args( 'page' ) )
    {
        $metabox->set_args( 'page', array(
            'opt_name'     => 'ethemeframework_page_options',
            'display_name' => esc_html__( 'Page Settings', 'ethemeframework' )
        ), array(
            'context'  => 'advanced',
            'priority' => 'default'
        ) );
    }
    if ( ! $metabox->isset_args( 'post' ) )
    {
        $metabox->set_args( 'post', array(
            'opt_name'     => 'ethemeframework_post_options',
            'display_name' => esc_html__( 'Post Settings', 'ethemeframework' )
<<<<<<< HEAD
        ), array(
            'context'  => 'advanced',
            'priority' => 'default'
        ) );
    }

    if ( ! $metabox->isset_args( 'image' ) )
    {
        $metabox->set_args( 'image', array(
            'opt_name'     => 'post_format_image',
            'display_name' => esc_html__( 'image Settings', 'ethemeframework' )
        ), array(
            'context'  => 'advanced',
            'priority' => 'default'
        ) );
    }

    if ( ! $metabox->isset_args( 'gallery' ) )
    {
        $metabox->set_args( 'gallery', array(
            'opt_name'     => 'post_format_gallery',
            'display_name' => esc_html__( 'gallery Settings', 'ethemeframework' )
=======
>>>>>>> parent of 0153ebb... ok
        ), array(
            'context'  => 'advanced',
            'priority' => 'default'
        ) );
    }

    $metabox->add_section( 'page', array(
        'title' => esc_html__( 'General', 'ethemeframework' ),
        'desc'  => esc_html__( 'General settings for the page.', 'ethemeframework' ),
<<<<<<< HEAD
        'fields' => array(
            array(
                'id'       => '_custom_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Custom Title', 'ethemeframework' ),
                'subtitle' => esc_html__( 'Use custom title for this page. The default title will be used on document title.', 'ethemeframework' )
            ),
            array(
                'id'       => '_custom_desc',
                'type'     => 'text',
                'title'    => esc_html__( 'Custom description', 'ethemeframework' ),
                'subtitle' => esc_html__( 'Show custom page description under page title', 'ethemeframework' )
            )
        )
    ) );

    $metabox->add_section( 'image', array(
        'title' => esc_html__( 'General098914124', 'ethemeframework' ),
        'desc'  => esc_html__( 'General settings for the page.', 'ethemeframework' ),
=======
>>>>>>> parent of 0153ebb... ok
        'fields' => array(
            array(
                'id'       => '_custom_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Custom Title', 'ethemeframework' ),
                'subtitle' => esc_html__( 'Use custom title for this page. The default title will be used on document title.', 'ethemeframework' )
            ),
            array(
                'id'       => '_custom_desc',
                'type'     => 'text',
                'title'    => esc_html__( 'Custom description', 'ethemeframework' ),
                'subtitle' => esc_html__( 'Show custom page description under page title', 'ethemeframework' )
<<<<<<< HEAD
            )
        )
    ) );

    $metabox->add_section( 'gallery', array(
        'title' => esc_html__( 'Gllery', 'ethemeframework' ),
        'desc'  => esc_html__( 'General settings for the page.', 'ethemeframework' ),
        'fields' => array(
            array(
                'id'        => 'post-gallery-lightbox',
                'type'      => 'button_set',
                'title'     => esc_html__( 'Lightbox?', 'ethemeframework' ),
                'subtitle'  => esc_html__( 'Enable lightbox for gallery images', 'ethemeframework' ),
                'options' => array(
                    'on'  => esc_html__( 'On', 'ethemeframework' ),
                    'off' => esc_html__( 'Off', 'ethemeframework' ),
                ),
                'default' => 'off'
            ),
            array(
                'id'        => 'post-gallery',
                'type'      => 'slides',
                'title'     => esc_html__( 'Gallery Slider', 'boo' ),
                'subtitle'  => esc_html__( 'Upload images or add from media library.', 'ethemeframework' ),
                'placeholder'   => array(
                    'title'     => esc_html__( 'Title', 'ethemeframework' ),
                ),
                'show' => array(
                    'title' => true,
                    'description' => false,
                    'url' => false,
                )
=======
>>>>>>> parent of 0153ebb... ok
            )
        )
    ) );

    $metabox->add_section( 'post', array(
        'title' => esc_html__( 'General', 'ethemeframework' ),
        'desc'  => esc_html__( 'General settings for the page.', 'ethemeframework' ),
        'fields' => array(
            array(
                'id'       => '_custom_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Custom Title', 'ethemeframework' ),
                'subtitle' => esc_html__( 'Use custom title for this page. The default title will be used on document title.', 'ethemeframework' )
            ),
            array(
                'id'       => '_custom_desc',
                'type'     => 'text',
                'title'    => esc_html__( 'Custom description', 'ethemeframework' ),
                'subtitle' => esc_html__( 'Show custom page description under page title', 'ethemeframework' )
            )
        )
    ) );

    $metabox->add_section( 'page', array(
        'title' => esc_html__( 'Header', 'ethemeframework' ),
        'desc'  => esc_html__( 'Header settings for the page.', 'ethemeframework' ),
        'icon'  => 'el-icon-website',
        'fields' => array(
            array(
                'id'       => '_header_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'ethemeframework'),
                'subtitle' => esc_html__( 'Select a layout for header.', 'ethemeframework' ),
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
        'title' => esc_html__( 'Page Header', 'ethemeframework' ),
        'desc'  => esc_html__( 'Settings for page header area.', 'ethemeframework' ),
        'icon'  => 'el-icon-map-marker',
        'fields' => array(
            array(
                'id'       => '_pheader_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'ethemeframework' ),
                'subtitle' => esc_html__( 'Select a layout for page header.', 'ethemeframework' ),
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
                'title'   => esc_html__( 'Breadcrumb', 'ethemeframework' ),
                'default' => true
            )
        )
    ) );
}
add_action( 'eframework_post_metabox_register', 'ethemeframework_page_options_register' );