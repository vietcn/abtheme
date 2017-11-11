<?php
/**
 * Contact info widget for the theme
 *
 * @package Abtheme
 * @version 1.0
 */

class Abtheme_Contact_Info_Widget extends WP_Widget
{

    /**
     * Constructor
     *
     * @return void
     **/
    function __construct()
    {
        parent::__construct(
            'ef_contact_info', // Base ID
            esc_html__( '[EF] Contact Info', 'abtheme' ), // Name
            array(
                'description' => esc_html__( 'Simple contact info box.', 'abtheme' ),
                'customize_selective_refresh' => true
            ) // Args
        );
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    function widget( $args, $instance )
    {
        $title = empty( $instance['title'] ) ? esc_html__( 'Contact info', 'abtheme' ) : $instance['title'];
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $phone = preg_replace( '/[^0-9x\+]/', '', str_replace( '(0)', '', $instance['phone'] ) );

        echo $args['before_widget'];

        echo $args['before_title'] . $instance['title'] . $args['after_title'];

        echo '<div class="contact-info">';

        if ( $instance['desc'] )
        {
            printf( '<div class="desc">%s</div>', wpautop( $instance['desc'] ) );
        }

        if ( $instance['address'] )
        {
            printf( '<div class="info-entry address"><i class="fa fa-map-marker"></i><span>%s</span></div>', esc_html( $instance['address'] ) );
        }

        if ( $phone )
        {
            printf(
                '<div class="info-entry phone"><i class="fa fa-phone"></i><a href="%1$s">%2$s</a></div>',
                esc_attr( 'tel:' . $phone ),
                esc_html( $instance['phone'] )
            );
        }

        if ( $instance['fax'] )
        {
            printf(
                '<div class="info-entry fax"><i class="fa fa-print"></i><span>%s</span></div>',
                esc_html( $instance['fax'] )
            );
        }

        if ( $instance['email'] )
        {
            printf(
                '<div class="info-entry email"><i class="fa fa-pencil"></i><a href="%1$s">%2$s</a></div>',
                esc_attr( 'mailto:' . $instance['email'] ),
                esc_html( $instance['email'] )
            );
        }

        echo '</div>';

        echo $args['after_widget'];
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    function update( $new_instance, $old_instance )
    {
        // update logic goes here
        $updated_instance = $new_instance;
        return $updated_instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void Echoes it's output
     **/
    function form( $instance )
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title'   => esc_html__( 'Contact info', 'abtheme' ),
            'desc'    => '',
            'address' => '',
            'phone'   => '',
            'fax'     => '',
            'email'  => ''
        ) );

        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'abtheme' ); ?></label>
            <input class="widefat"
                id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
                type="text" value="<?php echo esc_attr( $instance['title'] ) ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_html_e( 'Custom description:', 'abtheme' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>" rows="4"><?php
                echo esc_textarea( $instance['desc'] );
            ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_html_e( 'Address:', 'abtheme' ); ?></label>
            <input class="widefat"
                id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" 
                type="text" value="<?php echo esc_attr( $instance['address'] ) ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php esc_html_e( 'Phone:', 'abtheme' ); ?></label>
            <input class="widefat"
                id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" 
                type="tel" value="<?php echo esc_attr( $instance['phone'] ) ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'fax' ) ); ?>"><?php esc_html_e( 'Fax:', 'abtheme' ); ?></label>
            <input class="widefat"
                id="<?php echo esc_attr( $this->get_field_id( 'fax' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'fax' ) ); ?>" 
                type="text" value="<?php echo esc_attr( $instance['fax'] ) ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_html_e( 'Email:', 'abtheme' ); ?></label>
            <input class="widefat"
                id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" 
                type="email" value="<?php echo esc_attr( $instance['email'] ) ?>" />
        </p>
        <?php
    }
}

add_action( 'widgets_init', create_function( '', "register_widget( 'Abtheme_Contact_Info_Widget' );" ) );