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
        $this->post_types = apply_filters( 'abtheme_extra_post_types', array(
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
        $args = apply_filters( 'abtheme_portfolio_post_type_args', array(
            'labels' => array(
                'name'                  => __( 'Portfolio', 'abtheme' ),
                'singular_name'         => __( 'Portfolio Entry', 'abtheme' ),
                'add_new'               => _x( 'Add New', 'add new on admin panel', 'abtheme' ),
                'add_new_item'          => __( 'Add New Portfolio Entry', 'abtheme' ),
                'edit_item'             => __( 'Edit Portfolio Entry', 'abtheme' ),
                'new_item'              => __( 'New Portfolio Entry', 'abtheme' ),
                'view_item'             => __( 'View Portfolio Entry', 'abtheme' ),
                'view_items'            => __( 'View Portfolio Entries', 'abtheme' ),
                'search_items'          => __( 'Search Portfolio Entries', 'abtheme' ),
                'not_found'             => __( 'No Portfolio Entries Found', 'abtheme' ),
                'not_found_in_trash'    => __( 'No Portfolio Entries Found in Trash', 'abtheme' ),
                'parent_item_colon'     => __( 'Parent Portfolio Entry:', 'abtheme' ),
                'all_items'             => __( 'All Entries', 'abtheme' ),
                'archives'              => __( 'Portfolio Archives', 'abtheme' ),
                'attributes'            => __( 'Portfolio Entry Attributes', 'abtheme' ),
                'insert_into_item'      => __( 'Insert into Portfolio Entry', 'abtheme' ),
                'uploaded_to_this_item' => __( 'Uploaded to this Portfolio Entry', 'abtheme' ),
                'menu_name'             => __( 'Portfolio', 'abtheme' ),
                'filter_items_list'     => __( 'Filter portfolio list', 'abtheme' ),
                'items_list_navigation' => __( 'Portfolio list navigation', 'abtheme' ),
                'items_list'            => __( 'Portfolio list', 'abtheme' ),
                'name_admin_bar'        => _x( 'Portfolio', 'add new on admin bar', 'abtheme' )
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
        $args = apply_filters( 'abtheme_team_member_post_type_args', array(
            'labels' => array(
                'name'                  => __( 'Team', 'abtheme' ),
                'singular_name'         => __( 'Team Member', 'abtheme' ),
                'add_new'               => _x( 'Add New', 'add new on admin panel', 'abtheme' ),
                'add_new_item'          => __( 'Add New Member', 'abtheme' ),
                'edit_item'             => __( 'Edit Member', 'abtheme' ),
                'new_item'              => __( 'New Member', 'abtheme' ),
                'view_item'             => __( 'View Member', 'abtheme' ),
                'view_items'            => __( 'View Members', 'abtheme' ),
                'search_items'          => __( 'Search Members', 'abtheme' ),
                'not_found'             => __( 'No Members Found', 'abtheme' ),
                'not_found_in_trash'    => __( 'No Members Found in Trash', 'abtheme' ),
                'parent_item_colon'     => __( 'Parent Member:', 'abtheme' ),
                'all_items'             => __( 'All Members', 'abtheme' ),
                'archives'              => __( 'Team Archives', 'abtheme' ),
                'attributes'            => __( 'Member Attributes', 'abtheme' ),
                'insert_into_item'      => __( 'Insert into Member', 'abtheme' ),
                'uploaded_to_this_item' => __( 'Uploaded to this Member', 'abtheme' ),
                'menu_name'             => __( 'Team', 'abtheme' ),
                'filter_items_list'     => __( 'Filter Members list', 'abtheme' ),
                'items_list_navigation' => __( 'Members list navigation', 'abtheme' ),
                'items_list'            => __( 'Members list', 'abtheme' ),
                'name_admin_bar'        => _x( 'Team', 'add new on admin bar', 'abtheme' ),
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