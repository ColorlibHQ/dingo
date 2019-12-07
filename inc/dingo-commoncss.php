<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
} 
/**
 * @Packge     : Dingo
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
 
// enqueue css
function dingo_common_custom_css(){
    
    wp_enqueue_style( 'dingo-common', get_template_directory_uri().'/assets/css/dynamic.css' );
		$header_bg         		  = esc_url( get_header_image() );
		$header_bg_img 			  = !empty( $header_bg ) ? 'background-image: url('.esc_url( $header_bg ).')' : '';

		$themeColor     		  = !empty(dingo_opt( 'dingo_theme_color' )) ? dingo_opt( 'dingo_theme_color') : '';

		$headerBg          		  = dingo_opt( 'dingo_header_bg_color' );
		$menuColor          	  = dingo_opt( 'dingo_header_menu_color' );
		$menuColor          	  = $menuColor . '!important';
		$menuHoverColor           = dingo_opt( 'dingo_header_menu_hover_color' );
		$menuHoverColor           = $menuHoverColor . ' !important';

		$dropMenuBgColor          = dingo_opt( 'dingo_header_menu_dropbg_color' );
		$dropMenuColor            = dingo_opt( 'dingo_header_drop_menu_color' );
		$dropMenuColor            = $dropMenuColor . '!important';
		$dropMenuHovColor         = dingo_opt( 'dingo_header_drop_menu_hover_color' );
		$dropMenuHovColor         = $dropMenuHovColor . '!important';
		$dropMenuHovItemBg        = dingo_opt( 'dingo_drop_menu_item_hover_bg' );

		$bookBtnBg        		  = dingo_opt( 'dingo_booking_btn_bg_color' );


		$footerwbgColor     	  = dingo_opt('dingo_footer_widget_bdcolor');
		$footerbottombgColor      = dingo_opt('dingo_footer_bottom_bgcolor');
		$footerwTextColor   	  = dingo_opt('dingo_footer_widget_textcolor');
		$footerwanchorcolor 	  = dingo_opt('dingo_footer_widget_anchorcolor');
		$footerothranchorcolor 	  = dingo_opt('dingo_footer_other_anchor_color');
		$footerwanchorhovcolor    = dingo_opt('dingo_footer_widget_anchorhovcolor');
		$footerwanchorhovcolor    = $footerwanchorhovcolor . '!important';
		$widgettitlecolor  		  = dingo_opt('dingo_footer_widget_titlecolor');
		$footernewsltrbtncolor    = dingo_opt('dingo_footer_newsletter_btn_color');


		$fofbg  	  		  = dingo_opt('dingo_fof_bg_color');
		$foftonecolor  	  	  = dingo_opt('dingo_fof_textone_color');
		$fofttwocolor  	  	  = dingo_opt('dingo_fof_texttwo_color');


		$customcss ="
			.hero-banner{
				{$header_bg_img}
			}	
			
			.single_page_btn{
				background-color: {$bookBtnBg}
			}
			.single_page_btn:hover{
				color: {$bookBtnBg} !important;
				border-color: {$bookBtnBg};
			}

			.banner_part .banner_text h5, .blog_right_sidebar .button, .chefs_part .single_blog_item .social_icon a:hover
			{
				border-color: {$themeColor};
			}

			.food_menu .nav-tabs .active:after{
				border-top-color: {$themeColor};
			}

			.blog_right_sidebar .button, .blog_item_date, .blog_right_sidebar .tag_cloud_widget ul li a:hover, .blog_right_sidebar .tagcloud a:hover, .widget.widget_dingo_newsletter .btn_2, .blog-pagination .blog_area a:hover, .button-contactForm, .section_tittle h2:after, .chefs_part .single_blog_item .social_icon a:hover, .btn_4, .btn_4:hover, .review_part .owl-dots button.owl-dot.active
			{
				background: {$themeColor} !important;
			}

			.blog_right_sidebar .widget_categories ul li:hover a, .blog_right_sidebar .widget_rss ul li:hover a, .blog_right_sidebar .widget_recent_entries ul li:hover a, .blog_right_sidebar .widget_recent_comments ul li:hover a, .blog_right_sidebar .widget_archive ul li:hover a, .blog_right_sidebar .widget_meta ul li:hover a, .blog_right_sidebar .widget_dingo_recent_widget .post_item .media-body a:hover h3, .portfolio_part .card-columns .card .card-body:hover h5, .project_details .project_details_widget .single_project_details_widget span, .blog_area a h2:hover, .banner_part .banner_text h5, a:hover, .blog_item_section .single_blog_item:hover .btn_3, .about_part .about_text h4, .food_menu .nav-tabs .active, .food_menu .single_food_item .media-body h5, .blog_section .single_blog_text .date .date_item span, .banner-breadcrumb .breadcrumb-item a:hover, .blog_details .single-menu-item span
			{
				color: {$themeColor} !important;
			}

			.food_menu .nav-tabs .active img{
				fill: {$themeColor};
			}

			header.main_menu{
				background: {$headerBg}
			}
			.main_menu .main-menu-item ul li a
			{
				color: {$menuColor}
			}
			.main_menu .main-menu-item ul li a:hover
			{
				color: {$menuHoverColor}
			}
			.dropdown:hover .dropdown-menu
			{
				background: {$dropMenuBgColor}
			}
			.main_menu .main-menu-item ul li ul li a
			{
				color: {$dropMenuColor}
			}
			.main_menu .main-menu-item ul li ul li a:hover
			{
				color: {$dropMenuHovColor};
				background: {$dropMenuHovItemBg}
			}
			
			.header_area .navbar .nav .nav-item .nav-link {
			   color: {$menuColor};
			}
			.header_area .navbar .nav .nav-item:hover .nav-link {
			   color: {$menuHoverColor};
			}
			.header_area .navbar .nav .nav-item.submenu ul {
			   background: {$dropMenuBgColor};
			}
			.header_area .navbar .nav .nav-item.submenu ul .nav-item .nav-link {
			   color: {$dropMenuColor};
			}
			
			.header_area .navbar .nav .nav-item.submenu ul .nav-item:hover .nav-link{
				background: {$dropMenuHovItemBg};
				color: {$dropMenuHovColor}
			}

			.footer-area {
				background-color: {$footerwbgColor};
			}
			.footer-area .single-footer-widget h4 {
				color: {$widgettitlecolor}
			}
			.footer-area .single-footer-widget ul li a{
			   color: {$footerwanchorcolor};
			}
			.footer-area .single-footer-widget p, .footer-area .copyright_part_text p, .footer-area .single-footer-widget p span{
				color: {$footerwTextColor}
			}
			.footer-area .footer-text > a{
			   color: {$footerothranchorcolor};
			}
			.footer-area .single-footer-widget .click-btn{
				background: {$footernewsltrbtncolor};
				box-shadow: none;
			}
			.footer-area .single-footer-widget ul li a:hover, .footer-area .copyright_part_text a:hover{
			   color: {$footerwanchorhovcolor};
			}
			.copyright_part .footer-social a:hover{
				background: {$footerwanchorhovcolor};
			}
			#f0f {
			   background-color: {$fofbg};
			}
			.f0f-content .h1 {
			   color: {$foftonecolor};
			}
			.f0f-content p {
			   color: {$fofttwocolor};
			}

        ";
       
    wp_add_inline_style( 'dingo-common', $customcss );
    
}
add_action( 'wp_enqueue_scripts', 'dingo_common_custom_css', 50 );
