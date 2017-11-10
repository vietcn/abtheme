<?php
/**
 * Custom post types register.
 *
 * @package eFramework
 * @since   1.0
 */

class EFramework_CPT_Register
{
    /**
     * Core singleton class
     * 
     * @var self - pattern realization
     * @access private
     */
    private static $_instance;

    /**
     * Store supported post types in an array
     * @var array
     * @access private
     */
    private $post_types = array();

    /**
     * Constructor
     *
     * @access private
     */
    private function __construct()
    {
        add_action( 'init', array( $this, 'init' ), 0 );
    }

    /**
     * init hook - 0
     */
    function init()
    {
        $this->post_types = apply_filters( 'eframework_extra_post_types', array(
            'portfolio'   => false,
            'team_member' => false
        ) );

        if ( isset( $this->post_types['portfolio'] ) && $this->post_types['portfolio'] )
        {
            $this->type_portfolio_register();
        }

        if ( isset( $this->post_types['team_member'] ) && $this->post_types['team_member'] )
        {
            $this->type_team_member_register();
        }
    }

    /**
     * Registers portfolio post type, this fuction should be called in an init hook function.
     * @uses $wp_post_types Inserts new post type object into the list
     *
     * @access protected
     */
    protected function type_portfolio_register()
    {
        $args = apply_filters( 'eframework_portfolio_post_type_args', array(
            'labels' => array(
                'name'                  => __( 'Portfolio', 'eframework' ),
                'singular_name'         => __( 'Portfolio Entry', 'eframework' ),
                'add_new'               => _x( 'Add New', 'add new on admin panel', 'eframework' ),
                'add_new_item'          => __( 'Add New Portfolio Entry', 'eframework' ),
                'edit_item'             => __( 'Edit Portfolio Entry', 'eframework' ),
                'new_item'              => __( 'New Portfolio Entry', 'eframework' ),
                'view_item'             => __( 'View Portfolio Entry', 'eframework' ),
                'view_items'            => __( 'View Portfolio Entries', 'eframework' ),
                'search_items'          => __( 'Search Portfolio Entries', 'eframework' ),
                'not_found'             => __( 'No Portfolio Entries Found', 'eframework' ),
                'not_found_in_trash'    => __( 'No Portfolio Entries Found in Trash', 'eframework' ),
                'parent_item_colon'     => __( 'Parent Portfolio Entry:', 'eframework' ),
                'all_items'             => __( 'All Entries', 'eframework' ),
                'archives'              => __( 'Portfolio Archives', 'eframework' ),
                'attributes'            => __( 'Portfolio Entry Attributes', 'eframework' ),
                'insert_into_item'      => __( 'Insert into Portfolio Entry', 'eframework' ),
                'uploaded_to_this_item' => __( 'Uploaded to this Portfolio Entry', 'eframework' ),
                'menu_name'             => __( 'Portfolio', 'eframework' ),
                'filter_items_list'     => __( 'Filter portfolio list', 'eframework' ),
                'items_list_navigation' => __( 'Portfolio list navigation', 'eframework' ),
                'items_list'            => __( 'Portfolio list', 'eframework' ),
                'name_admin_bar'        => _x( 'Portfolio', 'add new on admin bar', 'eframework' )
            ),
            'hierarchical'        => false,
            'description'         => '',
            'taxonomies'          => array( 'portfolio_category' ),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => null,
            'menu_icon'           => 'dashicons-feedback',
            'show_in_nav_menus'   => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'has_archive'         => true,
            'query_var'           => true,
            'can_export'          => true,
            'rewrite'             => array(
                'slug'       => 'portfolio',
                'with_front' => false,
                'pages'      => true
            ),
            'capability_type'     => 'post',
            'supports'            => array(
                'title',
                'editor',
                'thumbnail',
                'excerpt',
                'revisions'
            )
        ) );
        register_post_type( 'eportfolio', $args );
    }

    /**
     * Registers team member post type, this fuction should be called in an init hook function.
     * @uses $wp_post_types Inserts new post type object into the list
     *
     * @access protected
     */
    protected function type_team_member_register()
    {
        $args = apply_filters( 'eframework_team_member_post_type_args', array(
            'labels' => array(
                'name'                  => __( 'Team', 'eframework' ),
                'singular_name'         => __( 'Team Member', 'eframework' ),
                'add_new'               => _x( 'Add New', 'add new on admin panel', 'eframework' ),
                'add_new_item'          => __( 'Add New Member', 'eframework' ),
                'edit_item'             => __( 'Edit Member', 'eframework' ),
                'new_item'              => __( 'New Member', 'eframework' ),
                'view_item'             => __( 'View Member', 'eframework' ),
                'view_items'            => __( 'View Members', 'eframework' ),
                'search_items'          => __( 'Search Members', 'eframework' ),
                'not_found'             => __( 'No Members Found', 'eframework' ),
                'not_found_in_trash'    => __( 'No Members Found in Trash', 'eframework' ),
                'parent_item_colon'     => __( 'Parent Member:', 'eframework' ),
                'all_items'             => __( 'All Members', 'eframework' ),
                'archives'              => __( 'Team Archives', 'eframework' ),
                'attributes'            => __( 'Member Attributes', 'eframework' ),
                'insert_into_item'      => __( 'Insert into Member', 'eframework' ),
                'uploaded_to_this_item' => __( 'Uploaded to this Member', 'eframework' ),
                'menu_name'             => __( 'Team', 'eframework' ),
                'filter_items_list'     => __( 'Filter Members list', 'eframework' ),
                'items_list_navigation' => __( 'Members list navigation', 'eframework' ),
                'items_list'            => __( 'Members list', 'eframework' ),
                'name_admin_bar'        => _x( 'Team', 'add new on admin bar', 'eframework' ),
            ),
            'hierarchical'        => false,
            'description'         => '',
            'taxonomies'          => array(),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => null,
            'menu_icon'           => 'dashicons-groups',
            'show_in_nav_menus'   => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'has_archive'         => true,
            'query_var'           => true,
            'can_export'          => true,
            'rewrite'             => true,
            'capability_type'     => 'post',
            'supports'            => array(
                'title',
                'editor',
                'thumbnail',
                'excerpt',
                'revisions'
            ),
        ) );

        register_post_type( 'eteam_member', $args );
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