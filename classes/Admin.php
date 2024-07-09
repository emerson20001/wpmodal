<?php

class ModalWP_Admin {

    public function register_customizer_settings( $wp_customize ) {
        $wp_customize->add_section( 'modalwp_section', array(
            'title'       => __( 'ModalWP Settings', 'modalwp' ),
            'priority'    => 30,
        ));

        $wp_customize->add_setting( 'modalwp_image', array(
            'default'     => '',
            'transport'   => 'refresh',
        ));

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'modalwp_image', array(
            'label'      => __( 'Upload Image', 'modalwp' ),
            'section'    => 'modalwp_section',
            'settings'   => 'modalwp_image',
        )));

        $wp_customize->add_setting( 'modalwp_active', array(
            'default'     => false,
            'transport'   => 'refresh',
        ));

        $wp_customize->add_control( 'modalwp_active', array(
            'label'      => __( 'Activate Modal', 'modalwp' ),
            'section'    => 'modalwp_section',
            'settings'   => 'modalwp_active',
            'type'       => 'checkbox',
        ));

        $wp_customize->add_setting( 'modalwp_close_time', array(
            'default'     => 0,
            'transport'   => 'refresh',
        ));

        $wp_customize->add_control( 'modalwp_close_time', array(
            'label'      => __( 'Fechamento automático (segundos)', 'modalwp' ),
            'section'    => 'modalwp_section',
            'settings'   => 'modalwp_close_time',
            'type'       => 'number',
        ));

        $wp_customize->add_setting( 'modalwp_expiry_date', array(
            'default'     => '',
            'transport'   => 'refresh',
        ));

        $wp_customize->add_control( 'modalwp_expiry_date', array(
            'label'      => __( 'Data de expiração', 'modalwp' ),
            'section'    => 'modalwp_section',
            'settings'   => 'modalwp_expiry_date',
            'type'       => 'date',
        ));

        $wp_customize->add_setting( 'modalwp_link_url', array(
            'default'     => '',
            'transport'   => 'refresh',
        ));

        $wp_customize->add_control( 'modalwp_link_url', array(
            'label'      => __( 'Link URL', 'modalwp' ),
            'section'    => 'modalwp_section',
            'settings'   => 'modalwp_link_url',
            'type'       => 'url',
        ));
    }
}
