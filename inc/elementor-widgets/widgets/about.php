<?php
namespace Dingoelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Dingo elementor section widget.
 *
 * @since 1.0
 */
class Dingo_About extends Widget_Base {

	public function get_name() {
		return 'dingo-about';
	}

	public function get_title() {
		return __( 'About', 'dingo' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-half';
	}

	public function get_categories() {
		return [ 'dingo-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_content',
			[
				'label' => __( 'About Section', 'dingo' ),
			]
		);
        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'Content', 'dingo' ),
                'description'   => esc_html__('Use <br> tag for line break', 'dingo'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h5>Our History</h5><h2>Where The Food’s As Good As The Root Beer.</h2><h4>Satisfying people hunger for simple pleasures</h4>
                <p>May over was. Be signs two. Spirit. Brought said dry own firmament lesser best sixth deep abundantly bearing, him, gathering you blessed bearing he our position best ticket in month hole deep </p>', 'dingo' )
            ]
        );

        $this->add_control(
            'button_label',
            [
                'label'         => esc_html__( 'Button Label', 'dingo' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__('read more', 'dingo')
            ]
        );
        $this->add_control(
            'button_url',
            [
                'label'         => esc_html__( 'Button URL', 'dingo' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
                
            ]
        );
		$this->end_controls_section(); // End about content


		$this->start_controls_section(
			'about_feature_image',
			[
				'label' => __( 'Section Image', 'dingo' ),
			]
		);
		$this->add_control(
			'about_img',
			[
				'label'         => esc_html__( 'Select Image', 'dingo' ),
                'type'          => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
			]
		);
		$this->end_controls_section(); // End about content

	}

	protected function render() {
        $settings = $this->get_settings();
        $content  = !empty( $settings['content'] ) ? $settings['content'] : '';
        $button_label = !empty( $settings['button_label'] ) ? $settings['button_label'] : '';
        $button_url   = !empty( $settings['button_url']['url'] ) ? $settings['button_url']['url'] : '';

		$feature_img = !empty( $settings['about_img']['id'] ) ? wp_get_attachment_image( $settings['about_img']['id'], 'dingo_about_section_612x612', false, array( 'class' => 'styleBox-img1' ) ) : '';
        $read_more_icon = DINGO_DIR_ASSETS_URI .'img/icon/left_2.svg';
        ?>


    <!-- about part start-->
    <section class="about_part">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-4 col-lg-5 offset-lg-1">
                    <div class="about_img">
                        <?php 
                            if( $feature_img ){
                                echo wp_kses_post( $feature_img );
                            }
                        ?>
                    </div>
                </div>
                <div class="col-sm-8 col-lg-4">
                    <div class="about_text">
                        <?php
                            //Content ==============
                            if( $content ){
                                echo wp_kses_post( wpautop( $content ) );
                            }
                            // Button =============
                            if( $button_label ){
                                echo '<a class="btn_3" href="'. esc_url( $button_url ) .'">'. esc_html( $button_label ) . '<img src="'. esc_url( $read_more_icon ) .'" alt=""></a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about part end-->
    <?php

    }

}
