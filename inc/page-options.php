<?php
/**
 * Register metabox for posts based on Redux Framework. Supported methods:
 *     isset_args( $post_type )
 *     set_args( $post_type, $redux_args, $metabox_args )
 *     add_section( $post_type, $sections )
 * Each post type can contains only one metabox. Pease note that each field id
 * leads by an underscore sign ( _ ) in order to not show that into Custom Field
 * Metabox from WordPress core feature.
 *
 * @param  abtheme_Post_Metabox $metabox
 */
function abtheme_page_options_register( $metabox )
{

    /**
     * Config page meta options
     *
     */
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

    /**
     * Config post meta options
     *
     */
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

    /**
     * Config post format meta options
     *
     */

    if ( ! $metabox->isset_args( 'image' ) )
    {
        $metabox->set_args( 'image', array(
            'opt_name'     => 'post_format_image',
            'display_name' => esc_html__( 'image Settings', 'abtheme' )
        ), array(
            'context'  => 'advanced',
            'priority' => 'default'
        ) );
    }

    if ( ! $metabox->isset_args( 'gallery' ) )
    {
        $metabox->set_args( 'gallery', array(
            'opt_name'     => 'post_format_gallery',
            'display_name' => esc_html__( 'gallery Settings', 'abtheme' )
        ), array(
            'context'  => 'advanced',
            'priority' => 'default'
        ) );
    }

    $metabox->add_section( 'image', array(
        'title' => esc_html__( 'General098914124', 'abtheme' ),
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

    $metabox->add_section( 'gallery', array(
        'title' => esc_html__( 'Gllery', 'abtheme' ),
        'desc'  => esc_html__( 'General settings for the page.', 'abtheme' ),
        'fields' => array(
            array(
                'id'        => 'post-gallery-lightbox',
                'type'      => 'button_set',
                'title'     => esc_html__( 'Lightbox?', 'abtheme' ),
                'subtitle'  => esc_html__( 'Enable lightbox for gallery images', 'abtheme' ),
                'options' => array(
                    'on'  => esc_html__( 'On', 'abtheme' ),
                    'off' => esc_html__( 'Off', 'abtheme' ),
                ),
                'default' => 'off'
            ),
            array(
                'id'        => 'post-gallery',
                'type'      => 'slides',
                'title'     => esc_html__( 'Gallery Slider', 'boo' ),
                'subtitle'  => esc_html__( 'Upload images or add from media library.', 'abtheme' ),
                'placeholder'   => array(
                    'title'     => esc_html__( 'Title', 'abtheme' ),
                ),
                'show' => array(
                    'title' => true,
                    'description' => false,
                    'url' => false,
                )
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
                'id'       => '_ptitle_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'abtheme' ),
                'subtitle' => esc_html__( 'Select a layout for page header.', 'abtheme' ),
                'options'  => array(
                    '0' => get_template_directory_uri() . '/assets/images/page-title-00.png',
                    '1' => get_template_directory_uri() . '/assets/images/page-title-01.png',
                    '2' => get_template_directory_uri() . '/assets/images/page-title-02.png'
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


add_action( 'abtheme_post_metabox_register', 'abtheme_page_options_register' );