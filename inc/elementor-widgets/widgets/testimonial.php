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
 * Dingo elementor section widget.
 *
 * @since 1.0
 */
class Dingo_Testimonial extends Widget_Base {

	public function get_name() {
		return 'dingo-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'dingo' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'dingo-elements' ];
	}

	protected function _register_controls() {

        // Testimonial Heading
		$this->start_controls_section(
			'section_heading',
			[
				'label' => __( 'Testimonial Heading', 'dingo' ),
			]
		);
        $this->add_control(
            'testimonial_content',
            [
                'label'         => esc_html__( 'Testimonial Heading', 'dingo' ),
                'description'   => esc_html__('Use <br> tag for line break', 'dingo'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p>Testimonials</p><h2>Customers Feedback</h2>', 'dingo' )
            ]
        );
		$this->end_controls_section(); 


		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'dingo' ),
			]
		);

		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'dingo' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'dingo' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Mosan Cameron', 'dingo' )
                    ],
                    [
                        'name'  => 'designation',
                        'label' => __( 'Designation', 'dingo' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Executive of fedex', 'dingo' )
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'dingo' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default'   => __('Also made from. Give may saying meat there from heaven it lights face had is gathered god dea earth light for life may itself shall whales made they\'re blessed whales also made from give may saying meat. There from heaven it lights face had amazing place', 'dingo')
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Image', 'dingo' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        /*------------------------------ Background Style ------------------------------*/
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
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'dingo' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .review_part',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
	$this->load_widget_script();
	$testimonial_content = !empty( $settings['testimonial_content'] ) ? $settings['testimonial_content'] : '';
	$reviews = !empty( $settings['review_slider'] ) ? $settings['review_slider'] : '';
    ?>

    <!--::review_part start::-->
    <section class="review_part gray_bg section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="section_tittle">
                        <?php
                            // Testimonial Content =============
                            if( $testimonial_content ){
                                echo wp_kses_post( wpautop( $testimonial_content ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-11">
                    <div class="client_review_part owl-carousel">
                        <?php
                        if( is_array( $reviews ) && count( $reviews ) > 0 ){
                            foreach ($reviews as $review ) {
                                $aName = !empty( $review['label'] ) ? $review['label'] : '';
                                $desig = !empty( $review['designation'] ) ? $review['designation'] : '';
                                $desc  = !empty( $review['desc'] ) ? $review['desc'] : '';
                                $image = !empty( $review['img']['id'] ) ? wp_get_attachment_image( $review['img']['id'], 'dingo_testimonial_thumb_140x140', '', array('alt' => $aName ) ) : '';
                        ?>
                        <div class="client_review_single media">
                            <div class="client_img align-self-center">
                                <?php
                                    if( $image ){
                                        echo wp_kses_post( $image );
                                    }
                                ?>
                            </div>
                            <div class="client_review_text media-body">
                                <?php
                                    // Description ---------------
                                    if( $desc ){
                                        echo '<p>'. esc_html( $desc ) .'</p>';
                                    }
                                    
                                    // Name ----------------------
                                    if( $aName ){
                                        echo '<h4>'. esc_html( $aName ) .', <span>'.$desig .'</span></h4>';
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
        </div>
    </section>
    <!--::review_part end::-->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            var review = $('.client_review_part');
            if (review.length) {
                review.owlCarousel({
                items: 1,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayHoverPause: true,
                autoplayTimeout: 5000,
                nav: false,
                });
            }
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
