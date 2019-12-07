<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package
 */

    $url = 'https://colorlib.com/';
    $copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'dingo' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
    $copyRight = !empty( dingo_opt( 'dingo_footer_copyright_text' ) ) ? dingo_opt( 'dingo_footer_copyright_text' ) : $copyText;
    $footer_class = dingo_opt( 'dingo_footer_widget_toggle' ) == 1 ? 'footer-area' : 'no_widget';

    ?>

    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <?php
                if( dingo_opt( 'dingo_footer_widget_toggle' ) == 1 ) {
            ?>
            <div class="row">
                <?php
                    // Footer Widget 1
                    if ( is_active_sidebar( 'footer-1' ) ) {
                        dynamic_sidebar( 'footer-1' );
                    }

                    // Footer Widget 2
                    if ( is_active_sidebar( 'footer-2' ) ) {
                        dynamic_sidebar( 'footer-2' );
                    }

                    // Footer Widget 3
                    if ( is_active_sidebar( 'footer-3' ) ) {
                        dynamic_sidebar( 'footer-3' );
                    }

                    // Footer Widget 4
                    if ( is_active_sidebar( 'footer-4' ) ) {
                        dynamic_sidebar( 'footer-4' );
                    }
                ?>
            </div>
            <?php
                }
            ?>
            <div class="copyright_part_text">
                <div class="row">
                    <div class="col-lg-8">
                        <p class="footer-text m-0"><?php echo wp_kses_post( $copyRight ); ?></p>
                    </div>
                    <?php
                        $social_icons = dingo_opt( 'dingo_footer_social' );
                        if( !empty($social_icons)){
                            $show_social = dingo_opt('dingo_social_profile_toggle');
                            if ( $show_social == 1 ){
                    ?>
                    <div class="col-lg-4">
                        <div class="copyright_social_icon text-right">
                            <?php
                                for ( $i = 0; $i < count($social_icons); $i++ ) {
                            ?>
                                <a href="<?php echo esc_url($social_icons[$i]['social_url']);?>"><i class="<?php echo esc_attr($social_icons[$i]['social_icon']);?>"></i></a>    
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <?php wp_footer(); ?>
    </body>
</html>