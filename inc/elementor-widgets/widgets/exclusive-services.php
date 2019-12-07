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
 * Dingo elementor Team Member section widget.
 *
 * @since 1.0
 */
class Dingo_Exclusive_Services extends Widget_Base {

	public function get_name() {
		return 'dingo-exclusive-services';
	}

	public function get_title() {
		return __( 'Exclusive Services', 'dingo' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'dingo-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Service Section ------------------------------
        $this->start_controls_section(
            'services_heading',
            [
                'label' => __( 'Service Short Brief', 'dingo' ),
            ]
        );
        $this->add_control(
            'service_content',
            [
                'label'         => esc_html__( 'Service Content', 'dingo' ),
                'description'   => esc_html__('Use <br> tag for line break', 'dingo'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p>Popular Dishes</p><h2>Our Exclusive Items</h2>', 'dingo' )
            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Services content ------------------------------
		$this->start_controls_section(
			'services_block',
			[
				'label' => __( 'Services', 'dingo' ),
			]
		);
		$this->add_control(
            'services_content', [
                'label' => __( 'Create Exclusive Item', 'dingo' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'item_img',
                        'label' => __( 'Item Image', 'dingo' ),
                        'type'  => Controls_Manager::MEDIA
                    ],
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'dingo' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Indian Burger', 'dingo' )
                    ],
                    [
                        'name'      => 'desc',
                        'label'     => __( 'Descriptions', 'dingo' ),
                        'type'      => Controls_Manager::TEXTAREA,
                        'default'   => __( 'Was brean shed moveth day yielding tree yielding day were female and', 'dingo' )
                    ],
                    [
                        'name'      => 'sing_serv_btn_label',
                        'label'     => __( 'Button Label', 'dingo' ),
                        'type'      => Controls_Manager::TEXT,
                        'default'   => __( 'Read More ', 'dingo' )
                    ],
                    [
                        'name'      => 'sing_serv_btn_url',
                        'label'     => __( 'Button URL', 'dingo' ),
                        'type'      => Controls_Manager::URL,
                        'default'   => [
                            'url'   => '#'
                        ]
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End Services content


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
                'name' => 'sectionbg_after',
                'label' => __( 'Background', 'dingo' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .exclusive_item_part:after',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $service_content = !empty( $settings['service_content'] ) ? $settings['service_content'] : '';
    $sing_servcs = !empty( $settings['services_content'] ) ? $settings['services_content'] : '';
    ?>

    <!--::exclusive_item_part start::-->
    <section class="exclusive_item_part blog_item_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="section_tittle">
                        <?php
                            // Service Content =============
                            if( $service_content ){
                                echo wp_kses_post( wpautop( $service_content ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">

                <?php
                    if( is_array( $sing_servcs ) && count( $sing_servcs ) > 0 ){
                        $i = 1;
                        foreach ( $sing_servcs as $sing_servc ) {
                            $service_title = !empty( $sing_servc['label'] ) ? $sing_servc['label'] : '';
                            $service_desc  = !empty( $sing_servc['desc'] ) ? $sing_servc['desc'] : '';
                            $servc_btn_lbl = !empty( $sing_servc['sing_serv_btn_label'] ) ? $sing_servc['sing_serv_btn_label'] : '';
                            $servc_btn_url = !empty( $sing_servc['sing_serv_btn_url']['url'] ) ? $sing_servc['sing_serv_btn_url']['url'] : '';
                            $item_img = !empty( $sing_servc['item_img']['id'] ) ? wp_get_attachment_image( $sing_servc['item_img']['id'], 'dingo_exclusive_serv_360x330' ) : '';
                            $read_more_icon = DINGO_DIR_ASSETS_URI .'img/icon/left_2.svg';
                            $last_item_class = ($i == 4) ? 'd-none d-sm-block d-lg-none' : '';
                    ?>
                <div class="col-sm-6 col-lg-4 <?php echo esc_attr( $last_item_class )?>">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <?php echo $item_img?>
                        </div>
                        <div class="single_blog_text">
                            <h3><?php echo $service_title?></h3>
                            <p><?php echo $service_desc?></p>
                            <a href="<?php echo esc_url( $servc_btn_url )?>" class="btn_3"><?php echo esc_html( $servc_btn_lbl )?> <img src="<?php echo esc_url( $read_more_icon )?>" alt=""></a>
                        </div>
                    </div>
                </div>
                <?php
                    $i++;
                    }
                }
                ?> 
            </div>
        </div>
    </section>
    <!--::exclusive_item_part end::-->
    <?php
    }
}
