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
class Dingo_Chefs extends Widget_Base {

	public function get_name() {
		return 'dingo-chefs';
	}

	public function get_title() {
		return __( 'Chefs', 'dingo' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'dingo-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Chefs Section ------------------------------
        $this->start_controls_section(
            'chefs_heading',
            [
                'label' => __( 'Our Chefs', 'dingo' ),
            ]
        );
        $this->add_control(
            'chef_content',
            [
                'label'         => esc_html__( 'Chefs Heading', 'dingo' ),
                'description'   => esc_html__('Use <br> tag for line break', 'dingo'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p>Team Member</p><h2>Our Experience Chefs</h2>', 'dingo' )
            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Chefs content ------------------------------
		$this->start_controls_section(
			'chefs_block',
			[
				'label' => __( 'Chefs', 'dingo' ),
			]
		);
		$this->add_control(
            'chefs_content', [
                'label' => __( 'Create A Chef', 'dingo' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ chef_name }}}',
                'fields' => [                    
                    [
                        'name'  => 'chef_img',
                        'label' => __( 'Select Image', 'dingo' ),
                        'type'  => Controls_Manager::MEDIA,
                        'default'       => [
                            'url'       => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name'  => 'chef_name',
                        'label' => __( 'Chef Name', 'dingo' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Adam Billiard', 'dingo' )
                    ],
                    [
                        'name'      => 'chef_designation',
                        'label'     => __( 'Chef Designation', 'dingo' ),
                        'type'      => Controls_Manager::TEXT,
                        'default'   => __( 'Chef Master', 'dingo' )
                    ],
                    [
                        'name'      => 'fb_url',
                        'label'     => __( 'Facebook URL', 'dingo' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => true,
                        'placeholder'   => 'http://facebook.com/',
                        'default' => [
                            'url' => '#',
                            'is_external' => true,
                            'nofollow' => true,
                        ]
                    ],
                    [
                        'name'      => 'tw_url',
                        'label'     => __( 'Twitter URL', 'dingo' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => true,
                        'placeholder'   => 'http://twitter.com/',
                        'default' => [
                            'url' => '#',
                            'is_external' => true,
                            'nofollow' => true,
                        ]
                    ],
                    [
                        'name'      => 'ins_url',
                        'label'     => __( 'Instagram URL', 'dingo' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => true,
                        'placeholder'   => 'http://instagram.com/',
                        'default' => [
                            'url' => '#',
                            'is_external' => true,
                            'nofollow' => true,
                        ]
                    ],
                    [
                        'name'      => 'skp_url',
                        'label'     => __( 'Skype URL', 'dingo' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => true,
                        'placeholder'   => 'http://skype.com/',
                        'default' => [
                            'url' => '#',
                            'is_external' => true,
                            'nofollow' => true,
                        ]
                    ]
                ],
            ]
        );

		$this->end_controls_section(); // End Chefs content

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
                'selector' => '{{WRAPPER}} .chefs_part',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $chef_content = !empty( $settings['chef_content'] ) ? $settings['chef_content'] : '';
    $chefs_content = !empty( $settings['chefs_content'] ) ? $settings['chefs_content'] : '';
    $fb_url = !empty( $settings['fb_url'] ) ? $settings['fb_url'] : '';
    $tw_url = !empty( $settings['tw_url'] ) ? $settings['tw_url'] : '';
    $ins_url = !empty( $settings['ins_url'] ) ? $settings['ins_url'] : '';
    $skp_url = !empty( $settings['skp_url'] ) ? $settings['skp_url'] : '';
    $i = 1;
    ?>

    <!--::chefs_part start::-->
    <section class="chefs_part blog_item_section section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="section_tittle">
                        <?php
                            // Chef Content =============
                            if( $chef_content ){
                                echo wp_kses_post( wpautop( $chef_content ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if( is_array( $chefs_content ) && count( $chefs_content ) > 0 ){
                    foreach ( $chefs_content as $chef_content ) {
                        $chef_img = !empty( $chef_content['chef_img']['id'] ) ? wp_get_attachment_image( $chef_content['chef_img']['id'], 'dingo_exclusive_serv_360x330' ) : '';
                        $chef_name  = !empty( $chef_content['chef_name'] ) ? $chef_content['chef_name'] : '';
                        $chef_designation  = !empty( $chef_content['chef_designation'] ) ? $chef_content['chef_designation'] : '';
                        $fb_url = !empty( $chef_content['fb_url']['url'] ) ? $chef_content['fb_url']['url'] : '';
                        $tw_url = !empty( $chef_content['tw_url']['url'] ) ? $chef_content['tw_url']['url'] : '';
                        $ins_url = !empty( $chef_content['ins_url']['url'] ) ? $chef_content['ins_url']['url'] : '';
                        $skp_url = !empty( $chef_content['skp_url']['url'] ) ? $chef_content['skp_url']['url'] : '';
                        $dynamic_classes = ( $i == 4 ) ? 'd-none d-sm-block d-lg-none' : '';
                ?>
                <div class="col-sm-6 col-lg-4 <?php echo $dynamic_classes?>">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <?php echo $chef_img?>
                        </div>
                        <div class="single_blog_text text-center">
                            <h3><?php echo esc_html( $chef_name );?></h3>
                            <p><?php echo esc_html( $chef_designation );?></p>
                            <div class="social_icon">
                                <?php 
                                    if( $fb_url ){
                                        echo '<a href="'.$fb_url.'"> <i class="ti-facebook"></i> </a>';
                                    }
                                    if( $tw_url ){
                                        echo '<a href="'.$tw_url.'"> <i class="ti-twitter-alt"></i> </a>';
                                    }
                                    if( $ins_url ){
                                        echo '<a href="'.$ins_url.'"> <i class="ti-instagram"></i> </a>';
                                    }
                                    if( $skp_url ){
                                        echo '<a href="'.$skp_url.'"> <i class="ti-skype"></i> </a>';
                                    }
                                
                                ?>
                            </div>
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
    <!--::chefs_part end::-->
    <?php
    }
}
