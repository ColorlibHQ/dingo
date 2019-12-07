<?php
namespace Dingoelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Utils;


/**
 *
 * Dingo elementor Team Member section widget.
 *
 * @since 1.0
 */
class Dingo_Reservation extends Widget_Base {

	public function get_name() {
		return 'dingo-reservation';
	}

	public function get_title() {
		return __( 'Reservation', 'dingo' );
	}

	public function get_icon() {
		return 'eicon-calendar';
	}

	public function get_categories() {
		return [ 'dingo-elements' ];
    }

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Reservations Section ------------------------------
        $this->start_controls_section(
            'reservation_heading',
            [
                'label' => __( 'Reservation', 'dingo' ),
            ]
        );
        $this->add_control(
            'reserv_content',
            [
                'label'         => esc_html__( 'Reservations Heading', 'dingo' ),
                'description'   => esc_html__('Use <br> tag for line break', 'dingo'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p>Reservation</p><h2>Book A Table</h2>', 'dingo' )
            ]
        );
        $this->add_control(
            'reserv_form',
            [
                'label'         => __( 'Form Shortcode', 'dingo' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true
            ]
        );

        $this->end_controls_section(); // End section top content


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
                'selector' => '{{WRAPPER}} .regervation_part',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $reserv_content = !empty( $settings['reserv_content'] ) ? $settings['reserv_content'] : '';
    $reserv_form = !empty( $settings['reserv_form'] ) ? $settings['reserv_form'] : '';
    ?>

    <!--::regervation_part start::-->
    <section class="regervation_part section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="section_tittle">
                        <?php
                            // Reservation Content =============
                            if( $reserv_content ){
                                echo wp_kses_post( wpautop( $reserv_content ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="regervation_part_iner">
                        <?php echo do_shortcode( $reserv_form )?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::regervation_part end::-->
    <?php
    }
}
