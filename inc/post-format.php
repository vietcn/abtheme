<?php
/**
 * @since: 1.0.0
 * @author: KP
 */

// Masonry Creative
$sections[] = array(
    'title'            => __( 'Checkbox', 'redux-framework-demo' ),
    'id'               => 'basic-checkbox',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/checkbox/" target="_blank">docs.reduxframework.com/core/fields/checkbox/</a>',
    'fields'           => array(
        array(
            'id'       => 'opt-checkbox',
            'type'     => 'checkbox',
            'title'    => __( 'Checkbox Option', 'redux-framework-demo' ),
            'subtitle' => __( 'No validation can be done on this field type', 'redux-framework-demo' ),
            'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
            'default'  => '1'// 1 = on | 0 = off
        ),
        array(
            'id'       => 'opt-multi-check',
            'type'     => 'checkbox',
            'title'    => __( 'Multi Checkbox Option', 'redux-framework-demo' ),
            'subtitle' => __( 'No validation can be done on this field type', 'redux-framework-demo' ),
            'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
            //Must provide key => value pairs for multi checkbox options
            'options'  => array(
                '1' => 'Opt 1',
                '2' => 'Opt 2',
                '3' => 'Opt 3'
            ),
            //See how std has changed? you also don't need to specify opts that are 0.
            'default'  => array(
                '1' => '1',
                '2' => '0',
                '3' => '0'
            )
        ),
        array(
            'id'       => 'opt-checkbox-data',
            'type'     => 'checkbox',
            'title'    => __( 'Multi Checkbox Option (with menu data)', 'redux-framework-demo' ),
            'subtitle' => __( 'No validation can be done on this field type', 'redux-framework-demo' ),
            'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
            'data'     => 'menu'
        ),
        array(
            'id'       => 'opt-checkbox-sidebar',
            'type'     => 'checkbox',
            'title'    => __( 'Multi Checkbox Option (with sidebar data)', 'redux-framework-demo' ),
            'subtitle' => __( 'No validation can be done on this field type', 'redux-framework-demo' ),
            'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
            'data'     => 'sidebars'
        ),
    )
);