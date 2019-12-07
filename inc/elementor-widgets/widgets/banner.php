<?php
namespace Dingoelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * Dingo elementor about us section widget.
 *
 * @since 1.0
 */
class Dingo_Banner extends Widget_Base {

	public function get_name() {
		return 'dingo-banner';
	}

	public function get_title() {
		return __( 'Banner', 'dingo' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'dingo-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_section',
            [
                'label' => __( 'Banner Section Content', 'dingo' ),
            ]
        );
        $this->add_control(
            'banner_content',
            [
                'label'         => esc_html__( 'Banner Content', 'dingo' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<h5>Expensive but the best</h5><h1>Deliciousness jumping into the mouth</h1><p>Together creeping heaven upon third dominion be upon won\'t darkness rule land behold it created good saw after she\'d Our set living. Signs midst dominion creepeth morning</p>', 'dingo' )
            ]
        );
        $this->add_control(
            'banner_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'dingo' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Reservation ', 'dingo' )
            ]
        );
        $this->add_control(
            'banner_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'dingo' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );
        $this->add_control(
            'intro_vid_btnlabel',
            [
                'label'         => esc_html__( 'Intro Video Button Label', 'dingo' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( ' Watch our story', 'dingo' )
            ]
        );
        $this->add_control(
            'intro_vid_btnurl',
            [
                'label'         => esc_html__( 'Intro Video Url', 'dingo' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false,
                'default' => [
					'url' => 'https://www.youtube.com/watch?v=pBFQdxA-apI',
					'is_external' => false,
					'nofollow' => true,
				],
            ]
        );

        $this->end_controls_section(); // End content

        // Background Style ==============================
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'dingo' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'dingo' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'dingo' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .banner_part',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'section_secondary_bg',
                'label' => __( 'Background Secondary', 'dingo' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .banner_part:after',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $ban_content = !empty( $settings['banner_content'] ) ? $settings['banner_content'] : '';
        $btn_label = !empty( $settings['banner_btnlabel'] ) ? $settings['banner_btnlabel'] : '';
        $buttonUrl = !empty( $settings['banner_btnurl']['url'] ) ? $settings['banner_btnurl']['url'] : '';
        $intro_vid_btnlabel = !empty( $settings['intro_vid_btnlabel'] ) ? $settings['intro_vid_btnlabel'] : ' ';
        $intro_vid_btnurl = !empty( $settings['intro_vid_btnurl']['url'] ) ? $settings['intro_vid_btnurl']['url'] : 'https://www.youtube.com/watch?v=pBFQdxA-apI';

        $icon_left1 = DINGO_DIR_ASSETS_URI .'img/icon/left_1.svg';
        $icon_play = DINGO_DIR_ASSETS_URI .'img/icon/play.svg';
        ?>



    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <?php
                                if( $ban_content ){
                                    echo wp_kses_post( wpautop( $ban_content ) );
                                }
                            ?>
                            <div class="banner_btn">
                                <div class="banner_btn_iner">
                                    <?php
                                        if( $btn_label ){
                                            echo '<a class="btn_2" href="'. esc_url( $buttonUrl ) .'">'. esc_html( $btn_label ) .' <img src="'. esc_url( $icon_left1 ) .'" alt=""></a>';
                                        }
                                    ?>
                                </div>
                                <a href="<?php echo esc_url( $intro_vid_btnurl );?>" class="popup-youtube video_popup">
                                    <span><img src="<?php echo esc_url( $icon_play ) ?>" alt=""></span> <?php echo esc_html( $intro_vid_btnlabel );?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->
    <?php

    }
	
}
