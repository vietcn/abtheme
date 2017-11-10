<?php defined( 'ABSPATH' ) or exit();
/**
 * Simple instagram widget
 *
 * @package eThemeFramework
 * @version 1.0
 */

class eThemeFramework_Instagram_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'ef_instagram',
            __( '[EF] Instagram', 'ethemeframework' ),
            array(
                'description' => __( 'Instagram Widget', 'ethemeframework' ),
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
                'title'         => 'Instagram',
                'usr'           => '',
                'usr_show'      => '1',
                'usr_text'      => '',
                'number'        => 9,
                'space'         => 10,
                'columns'       => 3,
                'size'          => 'thumbnail',
                'images_only'   => '1',
                'image_link'    => '1',
            )
        );



        $title = empty( $instance['title'] ) ? esc_html__( 'Instagram', 'ethemeframework' ) : $instance['title'];
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        echo $args['before_widget'];

        echo $args['before_title'] . $title . $args['after_title'];

        $instance['usr'] = trim( $instance['usr'] );
        $instance['usr_show'] = (bool) $instance['usr_show'];
        $instance['number'] = absint( $instance['number'] );
        $instance['space'] = absint( $instance['space'] );
        $instance['columns'] = absint( $instance['columns'] );
        $instance['images_only'] = (bool) $instance['images_only'];
        $instance['image_link'] = (bool) $instance['image_link'];

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
            $media_array = $this->get_instagram_media( $instance['usr'] );

            if ( is_wp_error( $media_array ) || ! is_array( $media_array ) || empty( $media_array ) )
            {
                echo wp_kses_post( $media_array->get_error_message() );
            }
            else
            {
                if ( $instance['images_only'] )
                {
                    $media_array = array_filter( $media_array, array( $this, 'images_only' ) );
                }

                // slice list down to required limit
                $media_array = array_slice( $media_array, 0, $instance['number'] );

                foreach ( $media_array as $item )
                {
                    if ( empty( $item['link'] ) || empty( $item[ $instance['size'] ] ) || empty( $item['description'] ) || empty( $item['type'] ) )
                    {
                        continue;
                    }

                    printf(
                        '<li class="image-holder" %s>',
                        $instance['space'] > 0 ? ' style="padding-left:' . $instance['space'] . 'px;padding-bottom:' . $instance['space'] . 'px;"' : ''
                    );

                    if ( $instance['image_link'] )
                    {
                        printf(
                            '<a href="%1$s" target="_blank" title="%2$s"><img src="%3$s" alt="%2$s"/></a>',
                            esc_url( $item['link'] ),
                            esc_attr( $item['description'] ),
                            esc_url( $item[ $instance['size'] ] )
                        );
                    }
                    else
                    {
                        printf(
                            '<img src="%1$s" alt="%2$s" title="%2$s"/>',
                            esc_url( $item[ $instance['size'] ] ),
                            esc_attr( $item['description'] )
                        );
                    }
                    echo '</li>';
                }
            }
        }

        // Close
        echo '</ul>';
        echo '</div>';

        if ( ! empty( $instance['usr'] ) && ! empty( $instance['usr_show'] ) )
        {
            printf(
                '<div class="insta-usr"><a href="//instagram.com/%1$s/" target="_blank">@%2$s</a></div>',
                esc_attr( $instance['usr'] ),
                esc_html( $instance['usr'] )
            );
        }
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
        $instance['usr_show'] = (bool) $new_instance['usr_show'];
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

        if ( $new_instance['size'] == 'thumbnail' || $new_instance['size'] == 'small' || $new_instance['size'] == 'standard' || $new_instance['size'] == 'original' )
        {
            $instance['size'] = $new_instance['size'];
        }
        else
        {
            $instance['size'] = 'thumbnail';
        }
        
        $instance['images_only'] = (bool) $new_instance['images_only'];
        $instance['image_link'] = (bool) $new_instance['image_link'];
         
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
                'title'         => 'Instagram',
                'usr'           => '',
                'usr_show'      => '1',
                'number'        => 9,
                'space'         => 10,
                'columns'       => 3,
                'size'          => 'thumbnail',
                'images_only'   => '1',
                'image_link'    => '1',
            )
        );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'ethemeframework' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'usr' ) ); ?>"><?php esc_html_e( 'Username', 'ethemeframework' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'usr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'usr' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['usr'] ); ?>" />
        </p>
        <p class="howto">www.instagram.com/<strong style="color:red">your_username</strong>/ - <?php esc_html_e( 'Paste the red one in.', 'ethemeframework' ); ?></p>
        <p>
            <input id="<?php echo esc_attr( $this->get_field_id( 'usr_show' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'usr_show' ) ); ?>" type="checkbox" value="1" <?php checked( $instance['usr_show'], "1" );  ?>/><label for="<?php echo esc_attr( $this->get_field_id( 'usr_show' ) ); ?>"><?php esc_html_e( 'Show profile url', 'ethemeframework' ); ?></label>
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
                <option value="1" <?php selected( $instance['columns'], "1" ); ?>>1</option>
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
                <option value="thumbnail" <?php selected( $instance['size'], "thumbnail" ); ?>><?php esc_html_e( 'Thumbnail', 'ethemeframework' ); ?></option>
                <option value="small" <?php selected( $instance['size'], "small" ); ?>><?php esc_html_e( 'Small', 'ethemeframework' ); ?></option>
                <option value="standard" <?php selected( $instance['size'], "standard" ); ?>><?php esc_html_e( 'Standard', 'ethemeframework' ); ?></option>
                <option value="original" <?php selected( $instance['size'], "original" ); ?>><?php esc_html_e( 'Original', 'ethemeframework' ); ?></option>
            </select>
        </p>
        <p>
            <input id="<?php echo esc_attr( $this->get_field_id( 'images_only' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'images_only' ) ); ?>" type="checkbox" value="1" <?php checked( $instance['images_only'], "1" );  ?>/><label for="<?php echo esc_attr( $this->get_field_id( 'images_only' ) ); ?>"><?php esc_html_e( 'Show only images', 'ethemeframework' ); ?></label>
        </p>
        <p>
            <input id="<?php echo esc_attr( $this->get_field_id( 'image_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'image_link' ) ); ?>" type="checkbox" value="1" <?php checked( $instance['image_link'], "1" );  ?>/><label for="<?php echo esc_attr( $this->get_field_id( 'image_link' ) ); ?>"><?php esc_html_e( 'Add link to images', 'ethemeframework' ); ?></label>
        </p>
        <?php
    }


    /**
     * Get images array
     * @param  string $usr Username
     * @return array
     */
    function get_instagram_media( $usr )
    {
        $usr = trim( $usr );
        $type = substr( $usr, 0, 1 );

        if ( '@' == $type || '#' == $type )
        {
            $usr = substr( $usr, 1 );
        }
        else
        {
            $type = '@';
        }
        $usr = strtolower( $usr );

        if ( false === ( $instagram = get_transient( 'ethemeframework-instagram-media-' . sanitize_title_with_dashes( $usr ) ) ) )
        {
            $url = 'https://instagram.com/' . $usr;

            switch ( $type )
            {
                case '#':
                    $url = 'https://instagram.com/explore/tags/' . $usr;
                    break;
                
                default:
                    break;
            }

            $remote = wp_remote_get( esc_url( $url ) );

            if ( is_wp_error( $remote ) )
            {
                return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'ethemeframework' ) );
            }

            if ( 200 != wp_remote_retrieve_response_code( $remote ) )
            {
                return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'ethemeframework' ) );
            }

            $shards      = explode( 'window._sharedData = ', $remote['body'] );
            $insta_json  = explode( ';</script>', $shards[1] );
            $insta_array = json_decode( $insta_json[0], true );

            if ( ! $insta_array )
            {
                return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'ethemeframework' ) );
            }

            $insta_items = array();
            if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) )
            {
                $insta_items = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
            }
            elseif ( isset( $insta_array['entry_data']['TagPage'][0]['tag']['media']['nodes'] ) )
            {
                $insta_items = $insta_array['entry_data']['TagPage'][0]['tag']['media']['nodes'];
            }
            else
            {
                return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'ethemeframework' ) );
            }

            if ( ! is_array( $insta_items ) )
            {
                return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'ethemeframework' ) );
            }

            $instagram = array();

            foreach ( $insta_items as $insta_item )
            {
                $image = array(
                    'thumbnail' => preg_replace( '/^https?\:/i', '', $insta_item['thumbnail_src'] ),
                    'original'  => preg_replace( '/^https?\:/i', '', $insta_item['display_src'] )
                );
                $image['standard'] = $image['thumbnail'];

                if ( false !== strpos( $image['thumbnail'], "/s640x640/" ) )
                {
                    $image['thumbnail'] = str_replace( "/s640x640/", "/s160x160/", $image['thumbnail'] );
                    $image['small'] = str_replace( "/s640x640/", "/s320x320/", $image['thumbnail'] );
                }
                else
                {
                    $urlparts = wp_parse_url( $image['thumbnail'] );
                    $pathparts = explode( '/', $urlparts['path'] );
                    array_splice( $pathparts, 3, 0, array( 's160x160' ) );
                    $image['thumbnail'] = '//' . $urlparts['host'] . implode( '/', $pathparts );
                    $pathparts[3] = 's320x320';
                    $image['small'] = '//' . $urlparts['host'] . implode( '/', $pathparts );
                }

                if ( true === $insta_item['is_video'] )
                {
                    $image['type'] = 'video';
                }
                else
                {
                    $image['type'] = 'image';
                }

                $instagram[] = array(
                    'description' => $insta_item['caption'],
                    'link'        => trailingslashit( '//instagram.com/p/' . $insta_item['code'] ),
                    'time'        => $insta_item['date'],
                    'comments'    => $insta_item['comments']['count'],
                    'likes'       => $insta_item['likes']['count'],
                    'thumbnail'   => $image['thumbnail'],
                    'small'       => $image['small'],
                    'standard'    => $image['standard'],
                    'original'    => $image['original'],
                    'type'        => $image['type']
                );
            }

            $instagram = base64_encode( serialize( $instagram ) );

            set_transient( 'ethemeframework-instagram-media-' . sanitize_title_with_dashes( $usr ), $instagram, apply_filters( 'ethemeframework_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
        }

        if ( empty( $instagram ) )
        {
            return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'ethemeframework' ) );
            
        }
        return unserialize( base64_decode( $instagram ) );
    }

    /**
     * We use this to filter media rray
     * @param  array $media_item
     * @return boolean
     */
    function images_only( $media_item )
    {
        if ( 'image' === $media_item['type'] )
        {
            return true;
        }

        return false;
    }
}

add_action( 'widgets_init', create_function( '', "register_widget( 'eThemeFramework_Instagram_Widget' );" ) );