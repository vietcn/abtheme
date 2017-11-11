<?php
/**
 * Class EFramework
 * Author: Stev Ngo, KP
 * Version: 1.0.0
 */
class EFramework
{
    /**
     * Core singleton class
     * 
     * @var self - pattern realization
     * @access private
     */
    private static $_instance;

    /**
     * Store plugin paths
     *
     * @since 1.0
     * @access private
     * @var array
     */
    private $paths = array();

    protected $post_metabox = null;

    protected $post_format_metabox = null;

    protected $taxonomy_metabox = null;

    /**
     * Constructor
     */
    function __construct()
    {
        $dir = untrailingslashit( get_template_directory().'/core' );
        $url = untrailingslashit( get_template_directory_uri().'/core' );

        $this->set_paths( array(
            'APP_DIR'  => $dir,
            'APP_URL'  => $url
        ) );

        if ( ! class_exists( 'EFramework_CPT_Register' ) )
        {
            require_once $this->path( 'APP_DIR', 'includes/class-cpt-register.php' );
            EFramework_CPT_Register::get_instance();
        }

        if ( ! class_exists( 'EFramework_CTax_Register' ) )
        {
            require_once $this->path( 'APP_DIR', 'includes/class-ctax-register.php' );
            EFramework_CTax_Register::get_instance();
        }

        if ( ! class_exists( 'ReduxFramework' ) )
        {
            add_action( 'admin_notices', array( $this, 'redux_framework_notice' ) );
        }
        else
        {
            // Late at 30 to be sure that other extensions available via same hook.
            // Eg: Load extensions at 29 or lower.
            add_action( "redux/extensions/before", array( $this, 'redux_extensions' ), 30 );
        }

        add_action( 'init', array( $this, 'init' ), 0 );
    }

    /**
     * init hook
     *
     * @since 1.0
     * @access public
     */
    function init()
    {
        if ( apply_filters( 'eframework_scssc_on', false ) )
        {
            // scss compiler library
            if ( ! class_exists( 'scssc' ) )
            {
                require_once $this->path( 'APP_DIR', 'libraries/scss.inc.php' );
            }
        }

        if ( apply_filters( 'eframework_widget_extends_on', true ) )
        {
            require_once $this->path( 'APP_DIR', 'includes/class-widget-extends.php' );
        }
    }

    /**
     * Load our ReduxFramework extensions
     *
     * @since 1.0
     * @param  ReduxFramework $redux
     */
    function redux_extensions( $redux )
    {
        if ( ! class_exists( 'EFramework_Post_Metabox' ) )
        {
            require_once $this->path( 'APP_DIR', 'includes/class-post-metabox.php' );

            if ( empty( $this->post_metabox ) )
            {
                $this->post_metabox = new EFramework_Post_Metabox( $redux );
            }
        }

        if ( ! class_exists( 'EFramework_Taxonomy_Metabox' ) )
        {
            require_once $this->path( 'APP_DIR', 'includes/class-taxonomy-metabox.php' );

            if ( empty( $this->taxonomy_metabox ) )
            {
                $this->taxonomy_metabox = new EFramework_Taxonomy_Metabox( $redux );
            }
        }

        if ( ! class_exists( 'EFramework_PostFormat' ) )
        {
            require_once $this->path( 'APP_DIR', 'includes/class-post-format.php' );
            if ( empty( $this->post_format_metabox ) )
            {
                $this->post_format_metabox = new EFramework_PostFormat();
            }
        }
    }
    /**
     * Redux Framework notices
     *
     * @since 1.0
     * @access public
     */
    function redux_framework_notice()
    {
        $plugin_name = '<strong>eFramework</strong>';
        $redux_name  = '<strong>Redux Framework</strong>';

        echo '<div class="notice notice-warning is-dismissible">';
        echo '<p>';
        printf(
            esc_html__( '%1$s is automatically deactivated as it depends on %2$s which is currently not installed or installed but deactivated.', 'srfmetabox' ),
            $plugin_name,
            $redux_name
        );
        echo '</p>';

        printf( '<button type="button" class="notice-dismiss"><span class="screen-reader-text">%s</span></button>', esc_html__( 'Dismiss this notice.', 'eframework' ) );
        echo '</div>';
    }


    /**
     * Setter for paths
     *
     * @since  1.0
     * @access protected
     *
     * @param array $paths
     */
    protected function set_paths( $paths = array() )
    {
        $this->paths = $paths;
    }

    /**
     * Gets absolute path for file/directory in filesystem.
     *
     * @since  1.0
     * @access public
     *
     * @param string $name - name of path path
     * @param string $file - file name or directory inside path
     *
     * @return string
     */
    function path( $name, $file = '' )
    {
        return $this->paths[ $name ] . ( strlen( $file ) > 0 ? '/' . preg_replace( '/^\//', '', $file ) : '' );
    }

    /**
     * Get url for asset files
     *
     * @since  1.0
     * @access public
     * 
     * @param  string $file - filename
     * @return string
     */
    function get_url( $file = '' )
    {
        return esc_url( $this->path( 'APP_URL', $file ) );
    }

    /**
     * Get template file full path
     * @param  string $file
     * @param  string $default
     * @return string
     */
    function get_template( $file, $default ) {
        $path = locate_template( $file );
        if ( $path ) {
            return $path;
        }
        return $default;
    }

    /**
     * Get instance of the class
     *
     * @access public
     * @return object this
     */
    public static function get_instance()
    {
        if ( ! ( self::$_instance instanceof self ) )
        {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
}

/**
 * Get instance of SReduxFramework_Metabox
 *
 * @since  1.0
 * @return SReduxFramework_Metabox instance
 */
function eframework()
{
    return EFramework::get_instance();
}

$GLOBALS['eframework'] = eframework();