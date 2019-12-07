<?php
function dingo_foods_metabox( $meta_boxes ) {
	$dingo_prefix = '_dingo_';
	$meta_boxes[] = array(
		'id'        => 'foods_menu_metaboxes',
		'title'     => esc_html__( 'Food Menu Additional Fields', 'dingo' ),
		'post_types'=> array( 'food' ),
		'context'   => 'side',
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'         => $dingo_prefix . 'food_price',
				'name'       => esc_html__( 'Food Price', 'dingo' ),
				'type'       => 'number',
				'placeholder'=> esc_html__( 'Enter Price', 'dingo' ),
				'min'		 => 1
			),
			array(
				'id'         => $dingo_prefix . 'food_price_currency',
				'name'       => esc_html__( 'Select Price Currency', 'dingo' ),
				'type'       => 'select',
				'placeholder'=> esc_html__( 'Price Currency', 'dingo' ),
                'options'       => [
                    'usd'       => '$',
                    'eur'       => '€',
                    'gbp'       => '£',
                    'gpy'       => '¥',
                ]
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'dingo_foods_metabox' );