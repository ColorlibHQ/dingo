<?php 
/**
 * @Packge     : Dingo
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/

// Theme color
Epsilon_Customizer::add_field(
    'dingo_theme_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Color', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_general_section',
        'default'     => '#ff6426'
    )
);


// Header booking button field
Epsilon_Customizer::add_field(
    'dingo_header_book_btn',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Header booking button show/hide', 'dingo' ),
        'section'     => 'dingo_header_section',
        'default'     => true
    )
);

// Booking button label
Epsilon_Customizer::add_field(
    'booking_btn_label',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Booking button label', 'dingo' ),
        'section'           => 'dingo_header_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Book A Table'
    )
);

// Booking button url
Epsilon_Customizer::add_field(
    'booking_btn_url',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Booking button url', 'dingo' ),
        'section'           => 'dingo_header_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '#',
    )
);

// Booking button background color
Epsilon_Customizer::add_field(
    'dingo_booking_btn_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Booking Button Background Color', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_header_section',
        'default'     => '#ff6426',
    )
);



// Header color sections
Epsilon_Customizer::add_field(
    'header_color_section',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Header Color Section', 'dingo' ),
        'section'     => 'dingo_header_section',

    )
);

// Header background color field
Epsilon_Customizer::add_field(
    'dingo_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Background Color', 'dingo' ),
        'description' => esc_html__( 'Select the header background color.', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_header_section',
        'default'     => '#fff',
    )
);

// Header nav menu color field
Epsilon_Customizer::add_field(
    'dingo_header_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu color', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_header_section',
        'default'     => '#2a2a2a',
    )
);

// Header nav menu hover color field
Epsilon_Customizer::add_field(
    'dingo_header_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu hover color', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_header_section',
        'default'     => '',
    )
);
// Header menu dropdown background color field
Epsilon_Customizer::add_field(
    'dingo_header_menu_dropbg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu dropdown background color', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_header_section',
        'default'     => '#fff',
    )
);

// Header dropdown menu color field
Epsilon_Customizer::add_field(
    'dingo_header_drop_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu color', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_header_section',
        'default'     => '#2a2a2a',
    )
);
// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'dingo_drop_menu_item_hover_bg',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu item hover background', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_header_section',
        'default'     => '',
    )
);
// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'dingo_header_drop_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu hover color', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_header_section',
        'default'     => '#2a2a2a',
    )
);


/***********************************
 * Blog Section Fields
 ***********************************/
 
// Post excerpt length field
Epsilon_Customizer::add_field(
    'dingo_excerpt_length',
    array(
        'type'        => 'number',
        'label'       => esc_html__( 'Set post excerpt length', 'dingo' ),
        'description' => esc_html__( 'Set post excerpt length.', 'dingo' ),
        'section'     => 'dingo_blog_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);

// Blog single page social share icon
Epsilon_Customizer::add_field(
    'dingo_blog_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog page post meta show/hide', 'dingo' ),
        'section'     => 'dingo_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'dingo_blog_single_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog single post meta show/hide', 'dingo' ),
        'section'     => 'dingo_blog_section',
        'default'     => true
    )
);

/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'dingo_fof_titleone',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'dingo' ),
        'section'           => 'dingo_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'dingo_fof_titletwo',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'dingo' ),
        'section'           => 'dingo_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'dingo_fof_textone_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'dingo_fof_texttwo_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_fof_section',
        'default'     => '#656565',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'dingo_fof_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_fof_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer Widget section
Epsilon_Customizer::add_field(
    'footer_widget_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Widget Section', 'dingo' ),
        'section'     => 'dingo_footer_section',

    )
);

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'dingo_footer_widget_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'dingo' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'dingo' ),
        'section'     => 'dingo_footer_section',
        'default'     => true,
    )
);


// Social Profile section
Epsilon_Customizer::add_field(
    'social_pro_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Social Profile Section', 'dingo' ),
        'section'     => 'dingo_footer_section',
        'default'     => true,

    )
);

// Social Profile Show/Hide
Epsilon_Customizer::add_field(
    'dingo_social_profile_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Social Profile Show/Hide', 'dingo' ),
        'section'     => 'dingo_footer_section',
        'default'     => true,
    )
);

//Social Profile links
Epsilon_Customizer::add_field(
	'dingo_footer_social',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'dingo_footer_section',
		'label'        => esc_html__( 'Social Profile Links', 'dingo' ),
		'button_label' => esc_html__( 'Add new social link', 'dingo' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'social_link_title',
		),
		'fields'       => array(
			'social_link_title'       => array(
				'label'             => esc_html__( 'Title', 'dingo' ),
				'type'              => 'text',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => 'Twitter',
			),
			'social_url' => array(
				'label'             => esc_html__( 'Social URL', 'dingo' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'https://twitter.com',
			),
			'social_icon'        => array(
				'label'   => esc_html__( 'Icon', 'dingo' ),
				'type'    => 'epsilon-icon-picker',
				'default' => 'fa fa-twitter',
			),
			
		),
	)
);

// Footer Copyright section
Epsilon_Customizer::add_field(
    'dingo_footer_copyright_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Copyright Section', 'dingo' ),
        'section'     => 'dingo_footer_section',
        'default'     => true,

    )
);

// Footer copyright text field
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'dingo' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Epsilon_Customizer::add_field(
    'dingo_footer_copyright_text',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'dingo' ),
        'section'     => 'dingo_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);

// Footer widget background color field
Epsilon_Customizer::add_field(
    'dingo_footer_widget_bdcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Background Color', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_footer_section',
        'default'     => '#f9f8f3',
    )
);

// Footer widget text color field
Epsilon_Customizer::add_field(
    'dingo_footer_widget_textcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_footer_section',
        'default'     => '#555555',
    )
);

// Footer widget title color field
Epsilon_Customizer::add_field(
    'dingo_footer_widget_titlecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_footer_section',
        'default'     => '#2c3033',
    )
);

// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'dingo_footer_widget_anchorcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_footer_section',
        'default'     => '#555555',
    )
);

// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'dingo_footer_widget_anchorhovcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_footer_section',
        'default'     => '#ff6426',
    )
);

// Footer newsletter button color field
Epsilon_Customizer::add_field(
    'dingo_footer_newsletter_btn_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Newsletter Button Color', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_footer_section',
        'default'     => '#ff6426'
    )
);

// Footer other anchor color field
Epsilon_Customizer::add_field(
    'dingo_footer_other_anchor_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Other Anchor Color', 'dingo' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'dingo_footer_section',
        'default'     => '#ff6426',
    )
);



