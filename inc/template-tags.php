<?php
/**
 * Custom template tags for this theme.
 *
 * @package Abtheme
 */


/**
 * Set primary content class based on sidebar position
 * 
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function abtheme_primary_class( $sidebar_pos, $extra_class = '' )
{
    if ( is_page() ) :
        $sidebar_load = 'sidebar-page';
    elseif ( class_exists( 'WooCommerce' ) && (is_shop() || is_product()) ) :
        $sidebar_load = 'sidebar-shop';
    else :
        $sidebar_load = 'sidebar-1';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array( trim( $extra_class ) );
        switch ( $sidebar_pos )
        {
            case 'left':
                $class[] = 'content-has-sidebar pull-right';
                break;

            case 'right':
                $class[] = 'content-has-sidebar pull-left';
                break;

            default:
                break;
        }

        $class = implode( ' ', array_filter( $class ) );

        if ( $class )
        {
            echo ' class="' . esc_html__( $class ) . '"';
        }
    }
}

/**
 * Set secondary content class based on sidebar position
 * 
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function abtheme_secondary_class( $sidebar_pos, $extra_class = '' )
{
    if ( is_page() ) :
        $sidebar_load = 'sidebar-page';
    elseif ( class_exists( 'WooCommerce' ) && (is_shop() || is_singular('product'))) :
        $sidebar_load = 'sidebar-shop';
    else :
        $sidebar_load = 'sidebar-1';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array(trim($extra_class));
        switch ($sidebar_pos) {
            case 'left':
                $class[] = 'widget-has-sidebar pull-left';
                break;

            case 'right':
                $class[] = 'widget-has-sidebar pull-right';
                break;

            default:
                break;
        }

        $class = implode(' ', array_filter($class));

        if ($class) {
            echo ' class="' . esc_html__($class) . '"';
        }
    }
}


/**
 * Prints HTML for breadcrumbs.
 */
function abtheme_breadcrumb()
{
    if ( ! class_exists( 'Abtheme_Breadcrumb' ) )
    {
        return;
    }

    $breadcrumb = new Abtheme_Breadcrumb();
    $entries = $breadcrumb->get_entries();

    if ( empty( $entries ) )
    {
        return;
    }

    ob_start();

    foreach ( $entries as $entry )
    {
        $entry = wp_parse_args( $entry, array(
            'label' => '',
            'url'   => ''
        ) );

        if ( empty( $entry['label'] ) )
        {
            continue;
        }

        echo '<li>';

        if ( ! empty( $entry['url'] ) )
        {
            printf(
                '<a class="breadcrumb-entry" href="%1$s">%2$s</a>',
                esc_url( $entry['url'] ),
                esc_attr( $entry['label'] )
            );
        }
        else
        {
            printf( '<span class="breadcrumb-entry" >%s</span>', esc_html( $entry['label'] ) );
        }

        echo '</li>';
    }

    $output = ob_get_clean();

    if ( $output )
    {
        printf( '<ul class="breadcrumb">%s</ul>', $output );
    }
}


if ( ! function_exists( 'abtheme_entry_posted_by' ) ) :
    /**
     * Prints HTML with meta information for the current post author.
     */
    function abtheme_entry_posted_by()
    {
        $author_name = $author_url = '';

        if ( ! get_the_author() )
        {
            global $post;

            if ( ! $post instanceof WP_Post )
            {
                return;
            }

            $author_id   = $post->post_author;
            $author_name = get_the_author_meta( 'display_name', $author_id );
            $author_url  = get_author_posts_url( $author_id );
        }
        else
        {
            $author_name = get_the_author();
            $author_url  = get_author_posts_url( get_the_author_meta( 'ID' ) );
        }
        printf(
            '<div class="entry-posted-by">
                <i class="fa fa-user-circle-o"></i>
                <span class="screen-reader-text">%1$s</span>
                <span class="author vcard"><a class="url fn n" href="%2$s">%3$s</a></span>
            </div>',
            esc_html__( 'Posted by: ', 'abtheme' ),
            esc_url( $author_url ),
            esc_html( $author_name )
        );
    }
endif;


if ( ! function_exists( 'abtheme_entry_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function abtheme_entry_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) )
        {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf( '<span class="screen-reader-text">%s</span>', esc_html__( 'Posted on: ', 'abtheme' ) );

        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) )
        {
            $time_string .= '<time class="entry-date published" datetime="%1$s">%2$s</time>';
            $time_string .= sprintf( '<span class="screen-reader-text">%s</span>', esc_html__( 'Updated on: ', 'abtheme' ) );
            $time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
        }
        else
        {
            $time_string .= '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        }

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( 'c' ) ),
            esc_html( get_the_modified_date() )
        );

        printf(
            '<div class="entry-posted-on">
                <i class="fa fa-clock-o"></i>
                <a href="%1$s" rel="bookmark">%2$s</a>
            </div>',
            esc_url( get_permalink() ),
            $time_string
        );
    }
endif;


if ( ! function_exists( 'abtheme_entry_posted_in' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function abtheme_entry_posted_in()
    {
        $categories_list = get_the_category_list( ', ' );

        if ( $categories_list )
        {
            printf(
                '<div class="entry-posted-in">
                    <i class="fa fa-bookmark"></i>
                    <span class="screen-reader-text">%1$s</span>
                    %2$s
                </div>',
                esc_html__( 'Posted in: ', 'abtheme' ),
                $categories_list
            );
        }
    }
endif;


if ( ! function_exists( 'abtheme_entry_tagged_in' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function abtheme_entry_tagged_in()
    {
        $tags_list = get_the_tag_list( '', ', ' );

        if ( $tags_list )
        {
            printf(
                '<div class="entry-tagged-in">
                    <i class="fa fa-tag"></i>
                    <span class="screen-reader-text">%1$s</span>
                    %2$s
                </div>',
                esc_html__( 'Tagged in: ', 'abtheme' ),
                $tags_list
            );
        }
    }
endif;


if ( ! function_exists( 'abtheme_entry_comments_popup_link' ) ) :
    /**
     * Prints comments count with link to single post comment form.
     */
    function abtheme_entry_comments_popup_link()
    {
        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) )
        {
            echo '<div class="entry-comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'abtheme' ),
                        array( 'span' => array( 'class' => array() ) )
                    ),
                    get_the_title()
                ),
                esc_html__( '1 Comment', 'abtheme' ), 
                esc_html__( '% Comments', 'abtheme' )
            );
            echo '</div>';
        }
    }
endif;

/**
 * Prints post edit link when applicable
 */
function abtheme_entry_edit_link()
{
    edit_post_link(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __( 'Edit <span class="screen-reader-text">%s</span>', 'abtheme' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ),
        '<div class="entry-edit-link">',
        '</div>'
    );
}


function abtheme_entry_link_pages()
{
    wp_link_pages( array(
        'before' => sprintf( '<div class="page-links"><span class="screen-reader-text">%s</span>', esc_html__( 'Pages:', 'abtheme' ) ),
        'after'  => '</div>',
    ) );
}


if ( ! function_exists( 'abtheme_entry_excerpt' ) ) :
    /**
     * Print post excerpt based on length.
     * 
     * @param  integer $length
     */
    function abtheme_entry_excerpt( $length = 55 )
    {
        echo abtheme_get_the_excerpt( $length );
    }
endif;


if ( ! function_exists( 'abtheme_entry_read_more' ) ) :
    /**
     * Prints post read more link
     */
    function abtheme_entry_read_more()
    {
        printf(
            '<div class="entry-readmore"><a href="%1$s" title="%2$s">%3$s</a></div>',
            esc_url( get_permalink() ),
            esc_attr( get_the_title() ),
            esc_html__( 'Read More', 'abtheme' )
        );
    }
endif;


if ( ! function_exists( 'abtheme_entry_meta' ) ) :
    /**
     * Prints HTML with meta information for the current post.
     */
    function abtheme_entry_meta()
    {
        $author_on = $date_on = $cats_on = $comments_on = true;

        if ( is_single() )
        {
            $author_on   = abtheme_get_opt( 'post_author_on', true );
            $date_on     = abtheme_get_opt( 'post_date_on', true );
            $cats_on     = abtheme_get_opt( 'post_categories_on', true );
            $comments_on = abtheme_get_opt( 'post_comments_on', true );
        }
        else
        {
            $author_on   = abtheme_get_opt( 'archive_author_on', true );
            $date_on     = abtheme_get_opt( 'archive_date_on', true );
            $cats_on     = abtheme_get_opt( 'archive_categories_on', true );
            $comments_on = abtheme_get_opt( 'archive_comments_on', true );
        }
        ob_start();

        if ( $author_on )
        {
            abtheme_entry_posted_by();
        }

        if ( $date_on )
        {
            abtheme_entry_posted_on();
        }

        if ( $cats_on )
        {
            abtheme_entry_posted_in();
        }

        if ( $comments_on )
        {
            abtheme_entry_comments_popup_link();
        }

        abtheme_entry_edit_link();

        $output = ob_get_clean();

        if ( $output )
        {
            printf( '<div class="entry-meta">%s</div>', $output );
        }
    }
endif;


if ( ! function_exists( 'abtheme_entry_footer' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function abtheme_entry_footer()
    {
        if ( 'post' === get_post_type() )
        {
            abtheme_entry_tagged_in();
        }
    }
endif;


/**
 * Prints posts pagination based on query
 *
 * @param  WP_Query $query     Custom query, if left blank, this will use global query ( current query )
 * @return void
 */
function abtheme_posts_pagination( $query = null )
{
    $classes = array();

    if ( empty( $query ) )
    {
        $query = $GLOBALS['wp_query'];
    }

    if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
    {
        return;
    }

    $paged = get_query_var( 'paged' );

    if ( ! $paged && is_front_page() && ! is_home() )
    {
        $paged = get_query_var( 'page' );
    }

    $paged = $paged ? intval( $paged ) : 1;

    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) )
    {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    // Set up paginated links.
    $links = paginate_links( array(
        'base'     => $pagenum_link,
        'total'    => $query->max_num_pages,
        'current'  => $paged,
        'mid_size' => 1,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous Page', 'abtheme' ) . '</span><i class="fa fa-angle-left"></i>',
        'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next Page', 'abtheme' ) . '</span><i class="fa fa-angle-right"></i>',
    ) );

    $template = '
    <nav class="navigation posts-pagination">
        <h2 class="screen-reader-text">%1$s</h2>
        <div class="posts-page-links">%2$s</div>
    </nav>';

    if ( $links )
    {
        printf(
            $template,
            esc_html__( 'Navigation', 'abtheme' ),
            $links
        );
    }
}


/**
 * Prints posts pagination based on theme options or nav type. Custom query only works with paged.
 *
 * @param  WP_Query $query     Custom query, if left blank, this will use global query ( current query )
 * @param  string   $nav_type  Force it to output type you want. Accept 'default' and 'paged'
 * @return void
 */
function abtheme_posts_navigation( $query = null, $nav_type = '' )
{
    if ( ! $nav_type )
    {
        $nav_type = abtheme_get_opt( 'archive_nav_type', 'default' );
    }

    switch ( $nav_type )
    {
        case 'paged':
            abtheme_posts_pagination( $query );
            break;
        
        default:
            the_post_navigation();
            break;
    }
}