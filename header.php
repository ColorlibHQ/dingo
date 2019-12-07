<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php echo dingo_site_icon();?>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

    <!--::header part start::-->
    <?php if( is_front_page() ) {
        $dingo_menu_class = 'main_menu home_menu';
    } else {
        $dingo_menu_class = 'main_menu';
    } ?>
    <header class="<?php echo $dingo_menu_class?>">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <?php
                            echo dingo_theme_logo( 'navbar-brand' );
                        ?>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <?php
                            if(has_nav_menu('primary-menu')) {
                                wp_nav_menu(array(
                                    'menu'           => 'primary-menu',
                                    'theme_location' => 'primary-menu',
                                    'menu_id'        => 'menu-main-menu',
                                    'container_class'=> 'collapse navbar-collapse main-menu-item justify-content-end',
                                    'container_id'   => 'navbarSupportedContent',
                                    'menu_class'     => 'navbar-nav',
                                    'walker'         => new dingo_bootstrap_navwalker,
                                    'depth'          => 3
                                ));
                            }


                            if( dingo_opt( 'dingo_header_book_btn' ) == 1 ) {
                                $booking_btn_label = !empty( dingo_opt( 'booking_btn_label' ) ) ? esc_html( dingo_opt( 'booking_btn_label' ) ) : '';
                                $booking_btn_url = !empty( dingo_opt( 'booking_btn_url' ) ) ? esc_html( dingo_opt( 'booking_btn_url' ) ) : '';
                                $dynamic_btn_class = is_front_page() ? 'btn_1' : 'single_page_btn';
                        ?>

                        <div class="menu_btn">
                            <a href="<?php echo $booking_btn_url?>" class="d-none d-sm-block <?php echo $dynamic_btn_class?>"><?php echo $booking_btn_label?></a>
                        </div>

                        <?php
                            }
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <?php
    //Page Title Bar
    if( function_exists( 'dingo_page_titlebar' ) ){
	    dingo_page_titlebar();
    }

