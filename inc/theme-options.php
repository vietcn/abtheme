<?php
if ( ! class_exists( 'ReduxFramework' ) )
{
    return;
}

$opt_name = abtheme_get_opt_name();
$theme    = wp_get_theme();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => __( 'Theme Options', 'abtheme' ),
    'page_title'           => __( 'Theme Options', 'abtheme' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    )
);

Redux::SetArgs( $opt_name, $args );

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Header', 'abtheme' ),
    'icon'  => 'el-icon-website',
    'fields'     => array(
        array(
            'id'       => 'header_layout',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Layout', 'abtheme'),
            'subtitle' => esc_html__( 'Select a layout for header.', 'abtheme' ),
            'options'  => array(
                '1'  => get_template_directory_uri().'/assets/images/header-01.png',
                '2'  => get_template_directory_uri().'/assets/images/header-02.png'
            ),
            'default'  => '1'
        ),
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => esc_html__( 'Logo', 'abtheme' ),
            'subtitle' => esc_html__( 'If not set, default site title and description will be used.', 'abtheme' )
        ),
        array(
            'id'       => 'logo_maxh',
            'type'     => 'dimensions',
            'title'    => esc_html__( 'Logo Max height', 'abtheme' ),
            'subtitle' => esc_html__( 'Set maximum height for your logo, just in case the logo is too large.', 'abtheme' ),
            'width'    => false,
            'unit'     => 'px'
        )
    )
) );

Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Sticky Header', 'abtheme' ),
    'icon'       => 'el-icon-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'sticky_on',
            'type'     => 'switch',
            'title'    => esc_html__( 'Sticky Header', 'abtheme' ),
            'subtitle' => esc_html__( 'Header will be sticked when applicable.', 'abtheme' ),
            'default'  => true
        ),
        array(
            'id'       => 'logo_sticky',
            'type'     => 'media',
            'title'    => __( 'Sticky Header Logo', 'abtheme' ),
            'subtitle' => __( 'If not set, default logo will be used.', 'abtheme' ),
            'required' => array( 'sticky_on', '=', true )
        ),
        array(
            'id'       => 'logo_sticky_maxh',
            'type'     => 'dimensions',
            'title'    => esc_html__( 'Sticky Header Logo Max Height', 'abtheme' ),
            'subtitle' => esc_html__( 'Set maximum height for your logo on sticky header, just in case the logo is too large.', 'abtheme' ),
            'width'    => false,
            'unit'     => 'px',
            'required' => array( 'sticky_on', '=', true )
        )
    )
) );

Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Header Colors', 'abtheme' ),
    'icon'       => 'el-icon-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'     => 'header_bg',
            'type'   => 'background',
            'title'  => esc_html__( 'Background', 'abtheme' ),
            'output' => array( '.site-header' )
        ),
        array(
            'id'          => 'header_text_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Text Color', 'abtheme' ),
            'default'     => '#666',
            'transparent' => false,
            'output'      => array( '.site-header' )
        ),
        array(
            'id'    => 'menu_link_colors',
            'type'  => 'link_color',
            'title' => esc_html__( 'Main menu colors', 'abtheme' )
        ),
    )
) );

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Page Title', 'abtheme' ),
    'icon'   => 'el-icon-map-marker',
    'fields' => array(
        array(
            'id'       => 'ptitle_layout',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Layout', 'abtheme' ),
            'subtitle' => esc_html__( 'Select a layout for page header.', 'abtheme' ),
            'options'  => array(
                '1' => get_template_directory_uri().'/assets/images/page-title-01.png',
                '2' => get_template_directory_uri().'/assets/images/page-title-02.png'
            ),
            'default'  => '1'
        ),
        array(
            'id'       => 'ptitle_bg',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'abtheme' ),
            'subtitle' => esc_html__( 'Page title background.', 'abtheme' ),
            'output'   => array( '#pagetitle' ),
            'default'  => array(
                'background-color' => '#f7f7f7'
            )
        ),
        array(
            'id'       => 'ptitle_paddings',
            'type'     => 'spacing',
            'title'    => esc_html__( 'Paddings', 'abtheme' ),
            'subtitle' => esc_html__( 'Page title paddings.', 'abtheme' ),
            'mode'     => 'padding',
            'units'    => array( 'em', 'px', '%' ),
            'top'      => true,
            'right'    => false,
            'bottom'   => true,
            'left'     => false,
            'output'   => array( '#pagetitle' )
        ),
        array(
            'id'      => 'breadcrumb_on',
            'type'    => 'switch',
            'title'   => esc_html__( 'Breadcrumb', 'abtheme' ),
            'default' => true
        ),
        array(
            'id'          => 'breadcrumb_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Breadcrumb Text Color', 'abtheme' ),
            'subtitle'    => esc_html__( 'Select text color for breadcrumb', 'abtheme' ),
            'transparent' => false,
            'output'      => array( '.page-title .breadcrumb' ),
            'required'    => array( 'breadcrumb_on', '=', true )
        ),
        array(
            'id'       => 'breadcrumb_link_colors',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Breadcrumb Link Colors', 'abtheme' ),
            'subtitle' => esc_html__( 'Select link colors for breadcrumb', 'abtheme' ),
            'output'   => array( '.page-title .breadcrumb li a' ),
            'required' => array( 'breadcrumb_on', '=', true )
        )
    )
) );

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Content', 'abtheme' ),
    'icon'  => 'el-icon-pencil'
));

Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Archive', 'abtheme' ),
    'icon'       => 'el-icon-list',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'archive_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Sidebar Position', 'abtheme'),
            'subtitle' => esc_html__( 'Select a sidebar position for blog home, archive, search...', 'abtheme' ),
            'options'  => array(
                'left'  => esc_html__( 'Left', 'abtheme' ),
                'right' => esc_html__( 'Right', 'abtheme' ),
                'none'  => esc_html__( 'Disabled', 'abtheme' )
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'archive_nav_type',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Posts Navigation Type', 'abtheme' ),
            'subtitle' => esc_html__( 'Set posts navigation type on all archive pages', 'abtheme' ),
            'options'  => array(
                'default' => esc_html__( 'Default', 'abtheme' ),
                'paged'   => esc_html__( 'Paged', 'abtheme' )
            ),
            'default'  => 'default'
        ),
        array(
            'id'       => 'archive_author_on',
            'title'    => esc_html__( 'Author', 'abtheme' ),
            'subtitle' => esc_html__( 'Show author name on each post.', 'abtheme' ),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_date_on',
            'title'    => esc_html__( 'Date', 'abtheme' ),
            'subtitle' => esc_html__( 'Show date posted on each post.', 'abtheme' ),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_categories_on',
            'title'    => esc_html__( 'Categories', 'abtheme' ),
            'subtitle' => esc_html__( 'Show category names on each post.', 'abtheme' ),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_tags_on',
            'title'    => esc_html__( 'Tags', 'abtheme' ),
            'subtitle' => esc_html__( 'Show tag names on each post.', 'abtheme' ),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_comments_on',
            'title'    => esc_html__( 'Comments', 'abtheme' ),
            'subtitle' => esc_html__( 'Show comments count on each post.', 'abtheme' ),
            'type'     => 'switch',
            'default'  => true,
        )
    )
) );

Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Single Post', 'abtheme' ),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'post_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Layouts', 'abtheme'),
            'subtitle' => esc_html__('select a layout for single...', 'abtheme'),
            'options'  => array(
                'left'  => esc_html__( 'Left', 'abtheme' ),
                'right' => esc_html__( 'Right', 'abtheme' ),
                'none'  => esc_html__( 'Disabled', 'abtheme' )
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'post_date_on',
            'title'    => esc_html__( 'Date', 'abtheme' ),
            'subtitle' => esc_html__( 'Show date posted.', 'abtheme' ),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_author_on',
            'title'    => esc_html__( 'Author', 'abtheme' ),
            'subtitle' => esc_html__( 'Show author name.', 'abtheme' ),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_categories_on',
            'title'    => esc_html__( 'Categories', 'abtheme' ),
            'subtitle' => esc_html__( 'Show category names.', 'abtheme' ),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_tags_on',
            'title'    => esc_html__( 'Tags', 'abtheme' ),
            'subtitle' => esc_html__( 'Show tag names.', 'abtheme' ),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_comments_on',
            'title'    => esc_html__( 'Comments', 'abtheme' ),
            'subtitle' => esc_html__( 'Show comments count.', 'abtheme' ),
            'type'     => 'switch',
            'default'  => true
        )
    )
) );

/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/

Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Colors', 'abtheme' ),
    'icon' => 'el-icon-file-edit',
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Primary Color', 'abtheme' ),
            'transparent' => false,
            'default'     => '#32a0df'
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => __( 'Link Colors', 'abtheme' ),
            'default' => array(
                'regular' => '#32a0df',
                'hover'   => '#333333',
                'active'  => '#000000'
            ),
            'output'  => array( 'a' )
        )
    )
) );

/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Typography', 'abtheme' ),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'          => 'font_main',
            'type'        => 'typography',
            'title'       => esc_html__( 'Main Font', 'abtheme' ),
            'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'abtheme' ),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'output'      => array( 'body' ),
            'units'       => 'px'
        ),
        array(
            'id'          => 'font_h1',
            'type'        => 'typography',
            'title'       => esc_html__( 'H1', 'abtheme' ),
            'subtitle'    => esc_html__( 'Heading 1 typography.', 'abtheme' ),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'output'      => array( 'h1', '.h1' ),
            'units'       => 'px'
        ),
        array(
            'id'          => 'font_h2',
            'type'        => 'typography',
            'title'       => esc_html__( 'H2', 'abtheme' ),
            'subtitle'    => esc_html__( 'Heading 2 typography.', 'abtheme' ),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'output'      => array( 'h2', '.h2' ),
            'units'       => 'px'
        ),
        array(
            'id'          => 'font_h3',
            'type'        => 'typography',
            'title'       => esc_html__( 'H3', 'abtheme' ),
            'subtitle'    => esc_html__( 'Heading 3 typography.', 'abtheme' ),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'output'      => array( 'h3', '.h3' ),
            'units'       => 'px'
        ),
        array(
            'id'          => 'font_h4',
            'type'        => 'typography',
            'title'       => esc_html__( 'H4', 'abtheme' ),
            'subtitle'    => esc_html__( 'Heading 4 typography.', 'abtheme' ),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'output'      => array( 'h4', '.h4' ),
            'units'       => 'px'
        ),
        array(
            'id'          => 'font_h5',
            'type'        => 'typography',
            'title'       => esc_html__( 'H5', 'abtheme' ),
            'subtitle'    => esc_html__( 'Heading 5 typography.', 'abtheme' ),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'output'      => array( 'h5', '.h5' ),
            'units'       => 'px'
        ),
        array(
            'id'          => 'font_h6',
            'type'        => 'typography',
            'title'       => esc_html__( 'H6', 'abtheme' ),
            'subtitle'    => esc_html__( 'Heading 6 typography.', 'abtheme' ),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'output'      => array( 'h6', '.h6' ),
            'units'       => 'px'
        )
    )
));

$custom_font_selectors_1 = Redux::getOption( $opt_name, 'custom_font_selectors_1' );
$custom_font_selectors_1 = ! empty( $custom_font_selectors_1 ) ? explode( ',', $custom_font_selectors_1 ) : array();

Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Extra Fonts', 'abtheme' ),
    'icon'       => 'el el-fontsize',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'custom_font_1',
            'type'        => 'typography',
            'title'       => esc_html__( 'Custom Font', 'abtheme' ),
            'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'abtheme' ),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'output'      => $custom_font_selectors_1,
            'units'       => 'px',
            
        ),
        array(
            'id'       => 'custom_font_selectors_1',
            'type'     => 'textarea',
            'title'    => esc_html__( 'CSS Selectors', 'abtheme' ),
            'subtitle' => esc_html__( 'Add css selectors to apply above font.', 'abtheme' ),
            'validate' => 'no_html'
        )
    )
));

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Footer', 'abtheme' ),
    'icon'   => 'el el-website',
    'fields' => array(
        array(
            'id'       => 'footer_bg',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'abtheme' ),
            'subtitle' => esc_html__( 'Footer background.', 'abtheme' ),
            'default'  => array(
                'background-color' => '#f7f7f7'
            ),
            'output'   => array( '.site-footer' )
        ),
        array(
            'id'       => 'back_totop_on',
            'type'     => 'switch',
            'title'    => esc_html__( 'Back to Top Button', 'abtheme' ),
            'subtitle' => esc_html__( 'Show back to top button when scrolled down.', 'abtheme' ),
            'default'  => true
        )
    )
));

Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Footer Top', 'abtheme' ),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'footer_top_layout',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Layout', 'abtheme' ),
            'subtitle' => esc_html__( 'Select a layout for upper footer area.', 'abtheme'),
            'options'  => array(
                '1'  => get_template_directory_uri() . '/assets/images/footer-top-01.png',
                '2'  => get_template_directory_uri() . '/assets/images/footer-top-02.png'
            ),
            'default'  => '1'
        ),
        array(
            'id'       => 'footer_top_paddings',
            'type'     => 'spacing',
            'title'    => esc_html__( 'Paddings', 'abtheme' ),
            'subtitle' => esc_html__( 'Footer top paddings.', 'abtheme' ),
            'mode'     => 'padding',
            'units'    => array('px'),
            'right'    => false,
            'left'     => false,
            'default'  => array(
                'padding-top'    => '24px',
                'padding-bottom' => '24px'
            ),
            'output'   => array( '.top-footer' )
        ),
        array(
            'id' => 'footer_top_color',
            'type' => 'color',
            'title' => esc_html__( 'Text Color', 'abtheme' )
        ),
        array(
            'id'       => 'footer_top_link_color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Links Color', 'abtheme' ),
            'regular'  => true,
            'hover'    => true,
            'active'   => true,
            'visited'  => true,
            'output'   => array( '.top-footer a' ),
        )
    )
));

Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Footer Bottom', 'abtheme' ),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'footer_bottom_layout',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Layout', 'abtheme' ),
            'subtitle' => esc_html__( 'Select a layout for lower footer area.', 'abtheme'),
            'options'  => array(
                '1'  => get_template_directory_uri() . '/assets/images/footer-bottom-01.png',
                '2'  => get_template_directory_uri() . '/assets/images/footer-bottom-02.png'
            ),
            'default'  => '1'
        ),
        array(
            'id'       => 'footer_bottom_paddings',
            'type'     => 'spacing',
            'title'    => esc_html__( 'Paddings', 'abtheme' ),
            'subtitle' => esc_html__( 'Footer bottom paddings.', 'abtheme' ),
            'mode'     => 'padding',
            'units'    => array('px'),
            'right'    => false,
            'left'     => false,
            'default'  => array(
                'padding-top'    => '4px',
                'padding-bottom' => '24px'
            ),
            'output'   => array( '.bottom-footer' )
        ),
        array(
            'id' => 'footer_bottom_color',
            'type' => 'color',
            'title' => esc_html__( 'Text Color', 'abtheme' )
        ),
        array(
            'id'       => 'footer_bottom_link_color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Links Color', 'abtheme' ),
            'regular'  => true,
            'hover'    => true,
            'active'   => true,
            'visited'  => true,
            'output'   => array( '.bottom-footer a' ),
        )
    )
));