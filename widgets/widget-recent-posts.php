<?php defined( 'ABSPATH' ) or exit( -1 );
/**
 * Recent Posts widgets
 *
 * @package Abtheme
 * @version 1.0
 */

class Abtheme_Recent_Posts_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'ef_recent_posts',
            esc_html__( '[EF] Recent Posts', 'abtheme' ),
            array(
                'description' => __( 'Shows your most recent posts.', 'abtheme' ),
                'customize_selective_refresh' => true,
            )
        );
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array $args An array of standard parameters for widgets in this theme
     * @param array $instance An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    function widget( $args, $instance )
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title'         => esc_html__( 'Recent Posts', 'abtheme' ),
            'number'        => 4,
            'show_date'     => true,
            'show_comments' => true
        ) );

        $title = empty( $instance['title'] ) ? esc_html__( 'Recent Posts', 'abtheme' ) : $instance['title'];
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        echo wp_kses_post($args['before_widget']);

        echo wp_kses_post($args['before_title']) . wp_kses_post($title) . wp_kses_post($args['after_title']);

        $number = absint( $instance['number'] );
        if ( $number <= 0 || $number > 10)
        {
            $number = 4;
        }

        $show_date     = (bool)$instance['show_date'];
        $show_comments = (bool)$instance['show_comments'];

        $r = new WP_Query( array(
            'post_type'           => 'post',
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true
        ) );

        if ( $r->have_posts() )
        {
            echo '<ul class="posts-list">';

            while ( $r->have_posts() )
            {
                $r->the_post();

                printf(
                    '<li class="post-list-entry%s">',
                    ( has_post_thumbnail() ? ' has-post-thumbnail' : '' )
                );

                if ( has_post_thumbnail() )
                {
                    $thumbnail_url = get_the_post_thumbnail_url( null, 'thumbnail' );
                    printf(
                        '<div class="entry-featured">' .
                            '<a href="%1$s" title="%2$s" class="entry-thumbnail" style="background-image:url(%3$s)">' .
                                '<img src="%3$s" alt="%2$s" />' .
                            '</a>' .
                        '</div>',
                        esc_url( get_permalink() ),
                        esc_attr( get_the_title() ),
                        esc_url( $thumbnail_url )
                    );
                }

                echo '<div class="entry-brief">';

                printf(
                    '<h4 class="entry-title"><a href="%1$s" title="%2$s">%3$s</a></h4>',
                    esc_url( get_permalink() ),
                    esc_attr( get_the_title() ),
                    get_the_title()
                );

                if ( $show_comments || $show_date )
                {
                    ob_start();

                    if ( $show_date )
                    {
                        echo '<div class="entry-posted-on">';
                        printf( '<span class="screen-reader-text">%1$s</span>', esc_html__( 'Posted on: ', 'abtheme' ) );

                        printf(
                            '<a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a>',
                            esc_url( get_permalink() ),
                            get_the_date( 'c' ),
                            get_the_date( get_option( 'date_format' ) )
                        );
                        echo '</div>';
                    }

                    if ( $show_comments )
                    {
                        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) )
                        {
                            echo '<div class="entry-comments">';
                            printf( '<span class="screen-reader-text">%1$s</span>', esc_html__( 'Comment(s): ', 'abtheme' ) );
                            echo '<i class="fa fa-comments"></i>';
                            comments_popup_link( 0, 1, get_comments_number() );
                            echo '</div>';
                        }
                    }

                    $post_meta = ob_get_contents();
                    ob_end_clean();

                    if ( $post_meta )
                    {
                        printf( '<div class="entry-meta">%s</div>', esc_attr($post_meta) );
                    }
                }
                echo '</div>';

                echo '</li>';
            } // while

            echo '</ul>';
        } // have_posts

        wp_reset_postdata();

        echo wp_kses_post($args['after_widget']);
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array $new_instance An array of new settings as submitted by the admin
     * @param array $old_instance An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['title']         = sanitize_text_field( $new_instance['title'] );
        $instance['number']        = absint( $new_instance['number'] );
        $instance['show_date']     = (bool)$new_instance['show_date'] ;
        $instance['show_comments'] = (bool)$new_instance['show_comments'];
        return $instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array $instance An array of the current settings for this widget
     * @return void Echoes it's output
     **/
    function form( $instance )
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title'         => esc_html__( 'Recent Posts', 'abtheme' ),
            'number'        => 4,
            'show_date'     => true,
            'show_comments' => true
        ) );

        $title         = $instance['title'] ? esc_attr( $instance['title'] ) : esc_html__( 'Recent Posts', 'abtheme' );
        $number        = absint( $instance['number'] );
        $show_date     = (bool) $instance['show_date'];
        $show_comments = (bool) $instance['show_comments'];

        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'abtheme' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'abtheme' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3" />
        </p>

        <p>
            <input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" value="1" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Display post date?', 'abtheme' ); ?></label>
        </p>

        <p>
            <input class="checkbox" type="checkbox"<?php checked( $show_comments ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_comments' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_comments' ) ); ?>" value="1" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_comments' ) ); ?>"><?php esc_html_e( 'Display post comments?', 'abtheme' ); ?></label>
        </p>
        <?php
    }
}

add_action( 'widgets_init', create_function( '', "register_widget( 'Abtheme_Recent_Posts_Widget' );" ) );
