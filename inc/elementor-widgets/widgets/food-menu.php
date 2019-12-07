<?php
namespace Dingoelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
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
 * elementor food-menu section widget.
 *
 * @since 1.0
 */
class Dingo_Food_Menu extends Widget_Base {

	public function get_name() {
		return 'dingo-food-menu';
	}

	public function get_title() {
		return __( 'Food Menu', 'dingo' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'dingo-elements' ];
	}

	protected function _register_controls() {

        $this->start_controls_section(
			'section_heading',
			[
				'label' => __( 'Section Settings', 'dingo' ),
			]
        );
        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'Content', 'dingo' ),
                'description'   => esc_html__('Use <br> tag for line break', 'dingo'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p>Popular Menu</p><h2>Delicious Food Menu</h2>', 'dingo' )
            ]
        );
        $this->add_control(
            'food_items', [
                'label'         => esc_html__( 'Show Items', 'dingo' ),
                'type'          => Controls_Manager::NUMBER,
                'label_block'   => false,
                'min'           => 2,
                'max'           => 10,
                'default'       => 6
                                
            ]
        );
        $this->add_control(
            'food_excerpt', [
                'label'         => esc_html__( 'Description Length', 'dingo' ),
                'type'          => Controls_Manager::NUMBER,
                'label_block'   => false,
                'min'           => 5,
                'default'       => 6
                                
            ]
        );
		$this->end_controls_section(); 

	}

	protected function render() {

    $settings = $this->get_settings();
    $content = !empty( $settings['content'] ) ? $settings['content'] : '';
    $food_excerpt = !empty( $settings['food_excerpt'] ) ? $settings['food_excerpt'] : '';
    $food_items = !empty( $settings['food_items'] ) ? $settings['food_items'] : 6;
    ?>

    <!-- food_menu start-->
    <section class="food_menu gray_bg">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="section_tittle">
                        <?php
                            //Content ==============
                            if( $content ){
                                echo wp_kses_post( wpautop( $content ) );
                            }
                        ?>
                    </div>
                </div>

                <?php
                    if ( function_exists( 'dingo_food_section' ) ) {
                        dingo_food_section( $food_excerpt, $food_items );
                    }
                ?>
            <div>
        </div>
    </section>

    <?php

    }
	
}
