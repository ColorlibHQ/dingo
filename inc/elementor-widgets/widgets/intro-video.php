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
class Dingo_Intro_Vid extends Widget_Base {

	public function get_name() {
		return 'dingo-intro-video';
	}

	public function get_title() {
		return __( 'Intro Video', 'dingo' );
	}

	public function get_icon() {
		return 'eicon-video-camera';
	}

	public function get_categories() {
		return [ 'dingo-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_section',
            [
                'label' => __( 'Intro Video Section Content', 'dingo' ),
            ]
        );
        $this->add_control(
            'intro_vid_title',
            [
                'label'         => esc_html__( 'Intro Video Title', 'dingo' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Expect The Best ', 'dingo' )
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
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'dingo' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .intro_video_bg',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $intro_vid_title = !empty( $settings['intro_vid_title'] ) ? $settings['intro_vid_title'] : '';
        $intro_vid_url = !empty( $settings['intro_vid_btnurl']['url'] ) ? $settings['intro_vid_btnurl']['url'] : 'https://www.youtube.com/watch?v=pBFQdxA-apI';
        ?>

    <!-- intro_video_bg start-->
    <section class="intro_video_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro_video_iner text-center">
                        <h2><?php echo esc_html( $intro_vid_title );?></h2>
                        <div class="intro_video_icon">
                            <a id="play-video_1" class="video-play-button popup-youtube"
                                href="<?php echo esc_url( $intro_vid_url );?>">
                                <span class="ti-control-play"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- intro_video_bg part start-->
    <?php

    }
	
}
