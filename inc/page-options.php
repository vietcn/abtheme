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

function abtheme_page_options_register($metabox)
{
    
    if (!$metabox->isset_args('page')) {
        $metabox->set_args('page', array(
            'opt_name'     => abtheme_get_page_opt_name(),
            'display_name' => esc_html__('Page Settings', 'abtheme'),
        ), array(
            'context'  => 'advanced',
            'priority' => 'default'
        ));
    }

    if (!$metabox->isset_args('cms_pf_audio')) {
        $metabox->set_args('cms_pf_audio', array(
            'opt_name'     => 'post_format_audio',
            'display_name' => esc_html__('Audio', 'abtheme')
        ), array(
            'context'  => 'advanced',
            'priority' => 'default'
        ));
    }

    if (!$metabox->isset_args('cms_pf_link')) {
        $metabox->set_args('cms_pf_link', array(
            'opt_name'     => 'post_format_link',
            'display_name' => esc_html__('Link', 'abtheme')
        ), array(
            'context'  => 'advanced',
            'priority' => 'default'
        ));
    }

    if (!$metabox->isset_args('cms_pf_quote')) {
        $metabox->set_args('cms_pf_quote', array(
            'opt_name'     => 'post_format_quote',
            'display_name' => esc_html__('Quote', 'abtheme')
        ), array(
            'context'  => 'advanced',
            'priority' => 'default'
        ));
    }

    if (!$metabox->isset_args('cms_pf_video')) {
        $metabox->set_args('cms_pf_video', array(
            'opt_name'     => 'post_format_video',
            'display_name' => esc_html__('Video', 'abtheme')
        ), array(
            'context'  => 'advanced',
            'priority' => 'default'
        ));
    }

    if (!$metabox->isset_args('cms_pf_gallery')) {
        $metabox->set_args('cms_pf_gallery', array(
            'opt_name'     => 'post_format_gallery',
            'display_name' => esc_html__('Gallery', 'abtheme')
        ), array(
            'context'  => 'advanced',
            'priority' => 'default'
        ));
    }

    $metabox->add_section('page', array(
        'title'  => esc_html__('Header', 'abtheme'),
        'desc'   => esc_html__('Header settings for the page.', 'abtheme'),
        'icon'   => 'el-icon-website',
        'fields' => array(
            array(
                'id'       => 'header_layout',
                'type'     => 'image_select',
                'title'    => esc_html__('Layout', 'abtheme'),
                'subtitle' => esc_html__('Select a layout for header.', 'abtheme'),
                'options'  => array(
                    '1' => get_template_directory_uri() . '/assets/images/header-01.png',
                    '2' => get_template_directory_uri() . '/assets/images/header-02.png'
                ),
                'default'  => abtheme_get_option_of_theme_options('header_layout', '1')
            )
        )
    ));

    $metabox->add_section('page', array(
        'title'  => esc_html__('Page Title', 'abtheme'),
        'desc'   => esc_html__('Settings for page header area.', 'abtheme'),
        'icon'   => 'el-icon-map-marker',
        'fields' => array(
            array(
                'id'       => 'ptitle_layout',
                'type'     => 'image_select',
                'title'    => esc_html__('Layout', 'abtheme'),
                'subtitle' => esc_html__('Select a layout for page title.', 'abtheme'),
                'options'  => array(
                    'none' => get_template_directory_uri() . '/assets/images/page-title-00.png',
                    '1' => get_template_directory_uri() . '/assets/images/page-title-01.png',
                    '2' => get_template_directory_uri() . '/assets/images/page-title-02.png'
                ),
                'default'  => abtheme_get_option_of_theme_options('ptitle_layout')
            ),
            array(
                'id'       => 'custom_title',
                'type'     => 'text',
                'title'    => esc_html__('Custom Title', 'abtheme'),
                'subtitle' => esc_html__('Use custom title for this page. The default title will be used on document title.', 'abtheme')
            ),
            array(
                'id'       => 'custom_desc',
                'type'     => 'text',
                'title'    => esc_html__('Custom description', 'abtheme'),
                'subtitle' => esc_html__('Show custom page description under page title', 'abtheme')
            ),
            array(
                'id'       => 'ptitle_color',
                'type'     => 'color',
                'title'    => esc_html__('Title Color', 'abtheme'),
                'subtitle' => esc_html__('Page title color.', 'abtheme'),
                'output'   => array('#pagetitle'),
                'default'  => '#000',
                'default'  => abtheme_get_option_of_theme_options('ptitle_color', '#fff')
            ),
            array(
                'id'       => 'ptitle_bg',
                'type'     => 'background',
                'title'    => esc_html__('Background', 'abtheme'),
                'subtitle' => esc_html__('Page title background.', 'abtheme'),
                'output'   => array('#pagetitle'),
                'default'  => abtheme_get_option_of_theme_options('ptitle_bg', array())
            ),
            array(
                'id'       => 'ptitle_paddings',
                'type'     => 'spacing',
                'title'    => esc_html__('Paddings', 'abtheme'),
                'subtitle' => esc_html__('Page title paddings.', 'abtheme'),
                'mode'     => 'padding',
                'units'    => array('em', 'px', '%'),
                'top'      => true,
                'right'    => false,
                'bottom'   => true,
                'left'     => false,
                'output'   => array('#pagetitle'),
                'default'  => abtheme_get_option_of_theme_options('ptitle_paddings', array())
            ),
            array(
                'id'      => 'breadcrumb_on',
                'type'    => 'switch',
                'title'   => esc_html__('Breadcrumb', 'abtheme'),
                'default' => abtheme_get_option_of_theme_options('breadcrumb_on', true)
            ),
            array(
                'id'          => 'breadcrumb_color',
                'type'        => 'color',
                'title'       => esc_html__('Breadcrumb Text Color', 'abtheme'),
                'subtitle'    => esc_html__('Select text color for breadcrumb', 'abtheme'),
                'transparent' => false,
                'output'      => array('.page-title .breadcrumb'),
                'required'    => array('ptitle_layout', '=', '1'),
                'default'     => abtheme_get_option_of_theme_options('breadcrumb_color', true)
            ),
            array(
                'id'       => 'breadcrumb_link_colors',
                'type'     => 'link_color',
                'title'    => esc_html__('Breadcrumb Link Colors', 'abtheme'),
                'subtitle' => esc_html__('Select link colors for breadcrumb', 'abtheme'),
                'required'    => array('breadcrumb_on', '=', true),
                'default'  => array(
                    'regular'  => '#1e73be', // blue
                    'hover'    => '#dd3333', // red
                    'active'   => '#8224e3',  // purple
                    'visited'  => '#8224e3',  // purple
                )
            )
        )
    ));

    $metabox->add_section('page', array(
        'title'  => esc_html__('Footer', 'abtheme'),
        'desc'   => esc_html__('Settings for page footer.', 'abtheme'),
        'icon'   => 'el el-website',
        'fields' => array(
            array(
                'id'       => 'footer_layout',
                'type'     => 'image_select',
                'title'    => esc_html__('Layout', 'abtheme'),
                'subtitle' => esc_html__('Select a layout for upper footer area.', 'abtheme'),
                'options'  => array(
                    '1' => get_template_directory_uri() . '/assets/images/footer-01.png',
                    '2' => get_template_directory_uri() . '/assets/images/footer-02.png'
                ),
                'default'  => abtheme_get_option_of_theme_options('footer_layout','1')
            ))
    ));

    /**
     * Config post format meta options
     *
     */

    $metabox->add_section('cms_pf_video', array(
        'title'  => esc_html__('Video', 'abtheme'),
        'fields' => array(
            array(
                'id'        => 'post-video-url',
                'type'      => 'text',
                'title'     => esc_html__( 'Video URL', 'abtheme' ),
                'desc'  => esc_html__( 'YouTube or Vimeo video URL', 'abtheme' )
            ),

            array(
                'id'        => 'post-video-file',
                'type'      => 'editor',
                'title'     => esc_html__( 'Video Upload', 'abtheme' ),
                'desc'  => esc_html__( 'Upload video file', 'abtheme' )
            ),

            array(
                'id'        => 'post-video-html',
                'type'      => 'textarea',
                'title'     => esc_html__( 'Embadded video', 'abtheme' ),
                'desc'  => esc_html__( 'Use this option when the video does not come from YouTube or Vimeo', 'abtheme' )
            )
        )
    ));

    $metabox->add_section('cms_pf_gallery', array(
        'title'  => esc_html__('Gallery', 'abtheme'),
        'fields' => array(
            array(
                'id'       => 'post-gallery-lightbox',
                'type'     => 'switch',
                'title'    => esc_html__('Lightbox?', 'abtheme'),
                'subtitle' => esc_html__('Enable lightbox for gallery images.', 'abtheme'),
                'default'  => true
            ),
            array(
                'id'          => 'post-gallery-images',
                'type'        => 'gallery',
                'title'       => esc_html__('Gallery Images ', 'abtheme'),
                'subtitle'    => esc_html__('Upload images or add from media library.', 'abtheme')
            )
        )
    ));

    $metabox->add_section('cms_pf_audio', array(
        'title'  => esc_html__('Audio', 'abtheme'),
        'fields' => array(
            array(
                'id'       => 'post-audio-url',
                'type'     => 'text',
                'title'    => esc_html__('Audio URL', 'abtheme'),
                'description' => esc_html__('Audio file URL in format: mp3, ogg, wav.','abtheme'),
                'validate' => 'url',
                'msg'      => 'Url error!'
            )
        )
    ));

    $metabox->add_section('cms_pf_link', array(
        'title'  => esc_html__('Link', 'abtheme'),
        'fields' => array(
            array(
                'id'       => 'post-link-url',
                'type'     => 'text',
                'title'    => esc_html__('URL', 'abtheme'),
                'validate' => 'url',
                'msg'      => 'Url error!'
            )
        )
    ));

    $metabox->add_section('cms_pf_quote', array(
        'title'  => esc_html__('Quote', 'abtheme'),
        'fields' => array(
            array(
                'id'       => 'post-quote-cite',
                'type'     => 'text',
                'title'    => esc_html__('Cite', 'abtheme')
            )
        )
    ));
}


add_action('cms_post_metabox_register', 'abtheme_page_options_register');

function abtheme_get_option_of_theme_options($key, $default = '')
{
    if (empty($key)) return '';
    $options = get_option(abtheme_get_opt_name(), array());
    $value = isset($options[$key]) ? $options[$key] : $default;
    return $value;
}