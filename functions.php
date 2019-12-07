<?php 
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Define constant
	 *
	 */
	
	 
	// Base URI
	if( !defined( 'DINGO_DIR_URI' ) )
		define( 'DINGO_DIR_URI', get_template_directory_uri().'/' );
	
	// assets URI
	if( !defined( 'DINGO_DIR_ASSETS_URI' ) )
		define( 'DINGO_DIR_ASSETS_URI', DINGO_DIR_URI.'assets/' );
	
	// Css File URI
	if( !defined( 'DINGO_DIR_CSS_URI' ) )
		define( 'DINGO_DIR_CSS_URI', DINGO_DIR_ASSETS_URI .'css/' );
	
	// Js File URI
	if( !defined( 'DINGO_DIR_JS_URI' ) )
		define( 'DINGO_DIR_JS_URI', DINGO_DIR_ASSETS_URI .'js/' );
	
	// Icon Images
	if( !defined('DINGO_DIR_ICON_IMG_URI') )
		define( 'DINGO_DIR_ICON_IMG_URI', DINGO_DIR_URI.'img/core-img/' );
	
	//DIR inc
	if( !defined( 'DINGO_DIR_INC' ) )
		define( 'DINGO_DIR_INC', DINGO_DIR_URI.'inc/' );

	//Elementor Widgets Folder Directory
	if( !defined( 'DINGO_DIR_ELEMENTOR' ) )
		define( 'DINGO_DIR_ELEMENTOR', DINGO_DIR_INC.'elementor-widgets/' );

	// Base Directory
	if( !defined( 'DINGO_DIR_PATH' ) )
		define( 'DINGO_DIR_PATH', get_parent_theme_file_path().'/' );
	
	//Inc Folder Directory
	if( !defined( 'DINGO_DIR_PATH_INC' ) )
		define( 'DINGO_DIR_PATH_INC', DINGO_DIR_PATH.'inc/' );
	
	//Colorlib framework Folder Directory
	if( !defined( 'DINGO_DIR_PATH_LIB' ) )
		define( 'DINGO_DIR_PATH_LIB', DINGO_DIR_PATH_INC.'libraries/' );
	
	//Classes Folder Directory
	if( !defined( 'DINGO_DIR_PATH_CLASSES' ) )
		define( 'DINGO_DIR_PATH_CLASSES', DINGO_DIR_PATH_INC.'classes/' );

	
	//Widgets Folder Directory
	if( !defined( 'DINGO_DIR_PATH_WIDGET' ) )
		define( 'DINGO_DIR_PATH_WIDGET', DINGO_DIR_PATH_INC.'widgets/' );
		
	//Elementor Widgets Folder Directory
	if( !defined( 'DINGO_DIR_PATH_ELEMENTOR_WIDGETS' ) )
		define( 'DINGO_DIR_PATH_ELEMENTOR_WIDGETS', DINGO_DIR_PATH_INC.'elementor-widgets/' );
	

		
	/**
	 * Include File
	 *
	 */
	
	// Breadcrumbs file include
	require_once( DINGO_DIR_PATH_INC . 'dingo-breadcrumbs.php' );
	// Sidebar register file include
	require_once( DINGO_DIR_PATH_INC . 'widgets/dingo-widgets-reg.php' );
	// Post widget file include
	require_once( DINGO_DIR_PATH_INC . 'widgets/dingo-recent-post-thumb.php' );
	// News letter widget file include
	require_once( DINGO_DIR_PATH_INC . 'widgets/dingo-newsletter-widget.php' );
	//Social Links
	require_once( DINGO_DIR_PATH_INC . 'widgets/dingo-social-links.php' );
	// Instagram Widget
	require_once( DINGO_DIR_PATH_INC . 'widgets/dingo-instagram.php' );
	// Nav walker file include
	require_once( DINGO_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
	// Theme function file include
	require_once( DINGO_DIR_PATH_INC . 'dingo-functions.php' );

	// Theme Demo file include
	require_once( DINGO_DIR_PATH_INC . 'demo/demo-import.php' );

	// Inline css file include
	require_once( DINGO_DIR_PATH_INC . 'dingo-commoncss.php' );
	// Theme support function file include
	require_once( DINGO_DIR_PATH_INC . 'support-functions.php' );
	// Html helper file include
	require_once( DINGO_DIR_PATH_INC . 'wp-html-helper.php' );
	// Pagination file include
	require_once( DINGO_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
	// Elementor Widgets
	require_once( DINGO_DIR_PATH_ELEMENTOR_WIDGETS . 'elementor-widget.php' );
	//
	require_once( DINGO_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	
	require_once( DINGO_DIR_PATH_CLASSES . 'Class-Config.php' );
	// Customizer
	require_once( DINGO_DIR_PATH_INC . 'customizer/customizer.php' );
	// Class autoloader
	require_once( DINGO_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
	// Class dingo dashboard
	require_once( DINGO_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );


	if( class_exists( 'RW_Meta_Box' ) ){
		// Metabox Function
		require_once( DINGO_DIR_PATH_INC . 'dingo-metabox.php' );
	}
	

	// Admin Enqueue Script
	function dingo_admin_script(){
		wp_enqueue_style( 'dingo-admin', get_template_directory_uri().'/assets/css/dingo_admin.css', false, '1.0.0' );
		wp_enqueue_script( 'dingo_admin', get_template_directory_uri().'/assets/js/dingo_admin.js', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'dingo_admin_script' );

	 
	// WooCommerce style desable
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );


	/**
	 * Instantiate Dingo object
	 *
	 * Inside this object:
	 * Enqueue scripts, Google font, Theme support features, Dingo Dashboard .
	 *
	 */
	
	$Dingo = new Dingo();
	
