<?php defined( 'ABSPATH' ) or exit();
/**
 * Simple flickr widget
 *
 * @package eThemeFramework
 * @version 1.0
 */

class eThemeFramework_Flickr_Widget extends WP_Widget
{
    private static $image_sizes = array();

    function __construct()
    {
        self::$image_sizes = array( 's', 'q', 't', 'm', 'n', '-', 'z', 'c', 'b', 'h', 'k', 'o' );

        parent::__construct(
            'ef_flickr',
            __( '[EF] Flickr', 'ethemeframework' ),
            array(
                'description' => __( 'Flickr Images Widget', 'ethemeframework' ),
                'customize_selective_refresh' => true
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
        $instance = wp_parse_args(
            (array) $instance,
            array(
                'title'         => 'Flickr',
                'usr'           => '',
                'number'        => 9,
                'space'         => 10,
                'columns'       => 3,
                'size'          => 'q'
            )
        );

        $title = empty( $instance['title'] ) ? 'Flickr' : $instance['title'];
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        echo $args['before_widget'];

        echo $args['before_title'] . $title . $args['after_title'];

        $instance['usr'] = trim( $instance['usr'] );
        $instance['number'] = absint( $instance['number'] );
        $instance['space'] = absint( $instance['space'] );
        $instance['columns'] = absint( $instance['columns'] );

        $instance['number'] = ( 0 > $instance['number'] || 12 < $instance['number'] ) ? 12 : $instance['number'];

        echo '<div class="images-holder">';
        // Opening
        printf(
            '<ul class="images columns-%1$s"%2$s>',
            esc_attr( $instance['columns'] ),
            $instance['space'] > 0 ? ' style="margin-left:-' . $instance['space'] . 'px;margin-bottom:-' . $instance['space'] . 'px"' : ''
        );

        if ( ! empty( $instance['usr'] ) )
        {
            $media_array = $this->get_flickr_media( $instance['usr'] );

            if ( is_wp_error( $media_array ) )
            {
                echo wp_kses_post( $media_array->get_error_message() );
            }
            else
            {
                $media_array = array_slice( $media_array, 0, $instance['number'] );

                foreach ( $media_array as $item )
                {
                    if ( empty( $item['link'] ) || empty( $item['media'][ $instance['size'] ] ) )
                    {
                        continue;
                    }

                    printf(
                        '<li class="image-holder" %s>',
                        $instance['space'] > 0 ? ' style="padding-left:' . $instance['space'] . 'px;padding-bottom:' . $instance['space'] . 'px;"' : ''
                    );

                    printf(
                        '<a href="%1$s" target="_blank" title="%2$s"><img src="%3$s" alt="%2$s"/></a>',
                        esc_url( $item['link'] ),
                        esc_attr( $item['title'] ),
                        esc_url( $item['media'][ $instance['size'] ] )
                    );

                    echo '</li>';
                }
            }
        }

        // Close
        echo '</ul>';
        echo '</div>';

        echo $args['after_widget'];
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

        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['usr'] = trim( strip_tags( $new_instance['usr'] ) );
        $instance['desc'] = $new_instance['desc'];
        $instance['number'] = intval( $new_instance['number'] );

        $new_instance['space'] = absint( $new_instance['space'] );

        if ( $new_instance['space'] > 20 )
        {
            $instance['space'] = 20;
        }
        else
        {
            $instance['space'] = $new_instance['space'];
        }

        $instance['columns'] = intval( $new_instance['columns'] );

        if ( in_array( $new_instance['size'], self::$image_sizes ) )
        {
            $instance['size'] = $new_instance['size'];
        }
        else
        {
            $instance['size'] = 'q';
        }
         
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
        $instance = wp_parse_args(
            (array) $instance,
            array(
                'title'         => 'Flickr',
                'usr'           => '',
                'desc'          => '',
                'number'        => 9,
                'space'         => 10,
                'columns'       => 3,
                'size'          => 'q'
            )
        );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'ethemeframework' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'usr' ) ); ?>"><?php esc_html_e( 'User ID', 'ethemeframework' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'usr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'usr' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['usr'] ); ?>" />
        </p>
        <p class="howto"><?php
            esc_html_e( 'Get your id at ', 'ethemeframework' );
            echo '<a href="https://www.webpagefx.com/tools/idgettr/" target="_blank">idGettr</a>.';
        ?></p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_html_e( 'Description:', 'ethemeframework' ); ?></label>
            <textarea class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>"><?php echo esc_textarea( $instance['desc'] ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'How many images?', 'ethemeframework' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" value="<?php echo esc_attr( $instance['number'] ); ?>" />
        </p>
        <p class="howto"><?php esc_html_e( 'Number of images should greater than 0 and less than (or equals to) 20', 'ethemeframework' ); ?></p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'space' ) ); ?>"><?php esc_html_e( 'Space between images?', 'ethemeframework' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'space' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'space' ) ); ?>" type="number" value="<?php echo esc_attr( $instance['space'] ); ?>" />
        </p>
        <p class="howto"><?php esc_html_e( 'Space should smaller than 20 and greater or equal zero.', 'ethemeframework' );?></p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'columns' ) ); ?>"><?php esc_html_e( 'Columns', 'ethemeframework' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'columns' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'columns' ) ); ?>">
                <option value="2" <?php selected( $instance['columns'], "2" ); ?>>2</option>
                <option value="3" <?php selected( $instance['columns'], "3" ); ?>>3</option>
                <option value="4" <?php selected( $instance['columns'], "4" ); ?>>4</option>
                <option value="5" <?php selected( $instance['columns'], "5" ); ?>>5</option>
                <option value="6" <?php selected( $instance['columns'], "6" ); ?>>6</option>
                <option value="7" <?php selected( $instance['columns'], "7" ); ?>>7</option>
                <option value="8" <?php selected( $instance['columns'], "8" ); ?>>8</option>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e( 'Image Size', 'ethemeframework' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>">
                <option value="q" <?php selected( $instance['size'], "q" ); ?>><?php echo '150 x 150'; ?></option>
                <option value="m" <?php selected( $instance['size'], "m" ); ?>><?php esc_html_e( '240 on longest side', 'ethemeframework' ); ?></option>
                <option value="n" <?php selected( $instance['size'], "n" ); ?>><?php esc_html_e( '320 on longest side', 'ethemeframework' ); ?></option>
                <option value="z" <?php selected( $instance['size'], "z" ); ?>><?php esc_html_e( '640 on longest side', 'ethemeframework' ); ?></option>
            </select>
        </p>
        <?php
    }


    /**
     * Get images array
     * @param  string $usr Username
     * @return array
     */
    function get_flickr_media( $usr )
    {
        if ( false === ( $flickr = get_transient( 'ethemeframework-flickr-media-' . sanitize_title_with_dashes( $usr ) ) ) )
        {
            $https = true;
            $remote = wp_remote_get( 'https://api.flickr.com/services/feeds/photos_public.gne?id=' . trim( $usr ) . '&format=json' );

            if ( is_wp_error( $remote ) || 200 != wp_remote_retrieve_response_code( $remote ) )
            {
                $https = false;
                $remote = wp_remote_get( 'http://api.flickr.com/services/feeds/photos_public.gne?id=' . trim( $usr ) . '&format=json' );
            }

            if ( is_wp_error( $remote ) )
            {
                return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Flickr.', 'ethemeframework' ) );
            }

            if ( 200 != wp_remote_retrieve_response_code( $remote ) )
            {
                return new WP_Error( 'invalid_response', esc_html__( 'Flickr did not return a 200.', 'ethemeframework' ) );
            }

            $flickr_object = json_decode( substr( $remote['body'], 15, -1 ) );
            $flickr_items = ! empty( $flickr_object->items ) ? $flickr_object->items : array();
            
            if ( ! $flickr_items )
            {
                return new WP_Error( 'bad_json', esc_html__( 'Flickr has returned invalid data.', 'ethemeframework' ) );
            }

            if ( ! is_array( $flickr_items ) )
            {
                return new WP_Error( 'bad_array', esc_html__( 'Flickr has returned invalid data.', 'ethemeframework' ) );
            }

            $flickr = array();

            foreach ( $flickr_items as $item )
            {
                $regex = $https ? '/^https?\:/i' : '/^http\:/i';
                $image = array();

                if ( ! isset( $item->link ) || ! isset( $item->title ) || ! isset( $item->media ) )
                {
                    continue;
                }

                if ( ! isset( $item->media->m ) )
                {
                    continue;
                }

                $original_media = $item->media->m;

                $media = array(
                    's' => preg_replace( '/_m\./', '_s.', $original_media ),
                    'q' => preg_replace( '/_m\./', '_q.', $original_media ),
                    't' => preg_replace( '/_m\./', '_t.', $original_media ),
                    'm' => preg_replace( '/_m\./', '_m.', $original_media ),
                    'n' => preg_replace( '/_m\./', '_n.', $original_media ),
                    '-' => preg_replace( '/_m\./', '_-.', $original_media ),
                    'z' => preg_replace( '/_m\./', '_z.', $original_media ),
                    'c' => preg_replace( '/_m\./', '_c.', $original_media ),
                    'b' => preg_replace( '/_m\./', '_b.', $original_media ),
                    'h' => preg_replace( '/_m\./', '_h.', $original_media ),
                    'k' => preg_replace( '/_m\./', '_k.', $original_media ),
                    'o' => preg_replace( '/_m\./', '_o.', $original_media )
                );

                $flickr[] = array(
                    'title' => $item->title,
                    'link'  => $item->link,
                    'media' => $media
                );
            }

            $flickr = maybe_serialize( $flickr );
            set_transient( 'ethemeframework-flickr-media-' . sanitize_title_with_dashes( $usr ), $flickr, apply_filters( 'ethemeframework_flickr_cache_time', HOUR_IN_SECONDS * 2 ) );
        }

        return maybe_unserialize( $flickr );
    }


    /**
     * Ensure media type is image, we use this function to filter flickr array ouput.
     * @param  array $media_item
     * @return boolean
     */
    function images_only( $media_item )
    {
        if ( $media_item['type'] == 'image' )
        {
            return true;
        }

        return false;
    }
}

add_action( 'widgets_init', create_function( '', "register_widget( 'eThemeFramework_Flickr_Widget' );" ) );