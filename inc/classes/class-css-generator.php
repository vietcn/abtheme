<?php
if ( ! class_exists( 'ReduxFrameworkInstances' ) )
{
    return;
}

class Abtheme_CSS_Generator
{
    /**
     * scssc class instance
     *
     * @access protected
     * @var scssc
     */
    protected $scssc = null;

    /**
     * ReduxFramework class instance
     *
     * @access protected
     * @var ReduxFramework
     */
    protected $redux = null;

    /**
     * Debug mode is turn on or not
     *
     * @access protected
     * @var boolean
     */
    protected $dev_mode = false;

    /**
     * opt_name of ReduxFramework
     *
     * @access protected
     * @var string
     */
    protected $opt_name = '';


    /**
     * Constructor
     */
    function __construct()
    {
        $this->opt_name = abtheme_get_opt_name();

        if ( empty( $this->opt_name ) )
        {
            return;
        }

        add_filter( 'eframework_scssc_on', '__return_true' );
        add_action( 'init', array( $this, 'init' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 20 );
    }

    /**
     * init hook - 10
     */
    function init()
    {
        if ( ! class_exists( 'scssc' ) )
        {
            return;
        }

        $this->redux = ReduxFrameworkInstances::get_instance( $this->opt_name );

        if ( empty( $this->redux ) || ! $this->redux instanceof ReduxFramework )
        {
            return;
        }

        // $this->dev_mode = defined( 'WP_DEBUG' ) && WP_DEBUG;
        $this->dev_mode = false;

        if ( $this->dev_mode )
        {
            $this->generate_file();
        }
        else
        {
            add_action( "redux/options/{$this->opt_name}/saved", array( $this, 'generate_file' ) );
        }
    }

    /**
     * Generate options and css files
     */
    function generate_file()
    {
        $scss_dir = get_template_directory() . '/assets/scss/';
        $css_dir  = get_template_directory() . '/assets/css/';

        $this->scssc = new scssc();
        $this->scssc->setImportPaths( $scss_dir );

        $_options = $scss_dir . '_options.scss';

        $this->redux->filesystem->execute( 'put_contents', $_options, array(
            'content' => $this->options_output()
        ) );

        if ( ! $this->dev_mode )
        {
            $this->scssc->setFormatter( 'scss_formatter_compressed' );
        }

        $css_file = $css_dir . 'theme.css';

        $this->redux->filesystem->execute( 'put_contents', $css_file, array(
            'content' => $this->scssc->compile( '@import "theme.scss"' )
        ) );
    }

    /**
     * Output options to _options.scss
     *
     * @access protected
     * @return string
     */
    protected function options_output()
    {
        ob_start();

        $opt_value = abtheme_get_opt( 'primary_color', '#32a0df' );
        if ( ! abtheme_is_valid_color( $opt_value ) )
        {
            $opt_value = '#32a0df';
        }
        printf( '$primary_color: %s;', esc_attr( $opt_value ) );

        return ob_get_clean();
    }

    /**
     * Hooked wp_enqueue_scripts - 20
     * Make sure that the handle is enqueued from earlier wp_enqueue_scripts hook.
     */
    function enqueue()
    {
        $css = $this->inline_css();

        if ( $css )
        {
            wp_add_inline_style( 'abtheme', $this->dev_mode ? $css : abtheme_css_minifier( $css ) );
        }
    }

    /**
     * Generate inline css based on theme options
     */
    protected function inline_css()
    {
        ob_start();

        $v = abtheme_get_opt( 'logo_maxh', array( 'height' => '100px' ) );

        if ( is_array( $v ) && ! empty( $v['height'] ) )
        {
            printf( '.site-branding .logo-link img { max-height: %s; }', $v['height'] );
        }

        $v = abtheme_get_opt( 'sticky_logo_maxh', array( 'height' => '100px' ) );

        if ( is_array( $v ) && ! empty( $v['height'] ) )
        {
            printf( '.site-branding .sticky-logo-link img { max-height: %s; }', $v['height'] );
        }

        // Menu links color for both theme options and page
        //--------------------------------------------------
        $v = abtheme_get_opt( 'menu_link_colors', array( 'regular' => '', 'hover' => '', 'active' => '' ) );
        if ( ! is_array( $v ) )
        {
            $v = array();
        }
        $v = wp_parse_args( $v, array(
            'regular' => '',
            'hover'   => '',
            'active'  => ''
        ) );
        if ( is_page() )
        {
            $pv = get_post_meta( get_the_ID(), '_menu_link_colors', true );
            if ( $pv )
            {
                $pv = maybe_unserialize( $pv );
            }
            if ( ! is_array( $pv ) )
            {
                $pv = array();
            }
            $pv = wp_parse_args( $pv, array(
                'regular' => $v['regular'],
                'hover'   => $v['hover'],
                'active'  => $v['active']
            ) );
            $v = $pv;
        }
        if ( is_array( $v ) )
        {
            if ( ! empty( $v['regular'] ) && abtheme_is_valid_color( $v['regular'] ) )
            {
                printf( '.primary-menu a { color: %s; }', $v['regular'] );
            }
            if ( ! empty( $v['hover'] ) && abtheme_is_valid_color( $v['hover'] ) )
            {
                printf(
                    '.primary-menu .menu-item:hover > a,
                    .primary-menu .menu-item.focus > a,
                    .primary-menu a:hover,
                    .primary-menu a:focus {
                        color: %s;
                    }',
                    $v['hover']
                );
            }
            if ( ! empty( $v['active'] ) && abtheme_is_valid_color( $v['active'] ) )
            {
                printf(
                    '.primary-menu .current_page_item > a,
                    .primary-menu .current-menu-item > a,
                    .primary-menu .current_page_ancestor > a,
                    .primary-menu .current-menu-ancestor > a,
                    .primary-menu a:active {
                        color: %s;
                    }',
                    $v['active']
                );
            }
        }

        return ob_get_clean();
    }
}

new Abtheme_CSS_Generator();