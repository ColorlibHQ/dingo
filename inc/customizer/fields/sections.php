<?php 
/**
 * @Packge     : Dingo
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer panels and sections
 *
 */

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'dingo_theme_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'dingo' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    
    /**
     * General Section
     */
    array(
        'id'   => 'dingo_general_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'dingo' ),
            'panel'    => 'dingo_theme_options_panel',
            'priority' => 1,
        ),
    ),
    
    /**
     * Header Section
     */
    array(
        'id'   => 'dingo_header_section',
        'args' => array(
            'title'    => esc_html__( 'Header', 'dingo' ),
            'panel'    => 'dingo_theme_options_panel',
            'priority' => 2,
        ),
    ),

    /**
     * Blog Section
     */
    array(
        'id'   => 'dingo_blog_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'dingo' ),
            'panel'    => 'dingo_theme_options_panel',
            'priority' => 3,
        ),
    ),


    /**
     * 404 Page Section
     */
    array(
        'id'   => 'dingo_fof_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'dingo' ),
            'panel'    => 'dingo_theme_options_panel',
            'priority' => 6,
        ),
    ),

    /**
     * Footer Section
     */
    array(
        'id'   => 'dingo_footer_section',
        'args' => array(
            'title'    => esc_html__( 'Footer Page', 'dingo' ),
            'panel'    => 'dingo_theme_options_panel',
            'priority' => 7,
        ),
    ),



);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );

?>