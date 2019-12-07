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
 * Dingo elementor few words section widget.
 *
 * @since 1.0
 */

class Dingo_Blog extends Widget_Base {

	public function get_name() {
		return 'dingo-blog';
	}

	public function get_title() {
		return __( 'Blog', 'dingo' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'dingo-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'blog_content',
            [
                'label' => __( 'Latest Blog Post', 'dingo' ),
            ]
        );
		$this->add_control(
            'blog_heading',
            [
                'label'         => esc_html__( 'Blog Heading', 'dingo' ),
                'description'   => esc_html__('Use <br> tag for line break', 'dingo'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p>Recent News</p><h2>Latest From Blog</h2>', 'dingo' )
            ]
        );

        $this->end_controls_section(); // End few words content

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
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
                'selector' => '{{WRAPPER}} .blog_item_section',
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {

    $settings  = $this->get_settings();
    $blog_heading = !empty( $settings['blog_heading'] ) ? $settings['blog_heading'] : '';
    ?>

    <!--::blog_item_part start::-->
    <section class="blog_item_section blog_section section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="section_tittle">
                        <?php
                            // Blog Heading =============
                            if( $blog_heading ){
                                echo wp_kses_post( wpautop( $blog_heading ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    if( function_exists( 'dingo_latest_blog' ) ) {
                        dingo_latest_blog();
                    }
                ?>
            </div>
        </div>
    </section>
    <!--::blog_item_part end::-->
    <?php
	}
}
