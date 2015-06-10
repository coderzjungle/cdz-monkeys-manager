<?php

/*
 *       ( ( (                        |"|                         ___         .      .   
 *     '. ___ .'       ,,,,,         _|_|_        __MMM__        .|||.      .  .:::.     
 *    '  (> <) '      /(o o)\        (o o)         (o o)         (o o)        :(o o):  . 
 *   ooO--(_)--Ooo-ooO--(_)--Ooo-ooO--(_)--Ooo-ooO--(_)--Ooo-ooO--(_)--Ooo-ooO--(_)--Ooo
 *     ____          _                  _                   _                           
 *    / ___|___   __| | ___ _ __ ____  | |_   _ _ __   __ _| | ___   ___ ___  _ __ ___  
 *   | |   / _ \ / _` |/ _ \ '__|_  /  | | | | | '_ \ / _` | |/ _ \ / __/ _ \| '_ ` _ \ 
 *   | |__| (_) | (_| |  __/ |   / / |_| | |_| | | | | (_| | |  __/| (_| (_) | | | | | |
 *    \____\___/ \__,_|\___|_|  /___\___/ \__,_|_| |_|\__, |_|\___(_)___\___/|_| |_| |_|
 *                                                    |___/                             
 */

defined( 'ABSPATH' ) or exit;

/*
 *	cdzShortcode: WooCommerce Best Selling Products Slider
 */

if ( ! class_exists( 'cdz_WC_Sale_Products_Slider' ) ) {

	class cdz_WC_Sale_Products_Slider extends cdz_Shortcode {

		public $name = 'Sale Products Slider';
		public $base = 'cdz_wc_sale_products_slider';
		public $slug = 'cdz-wc-sale-products-slider';
		public $desc = 'WooCommerce';

		public function get_options() {

			return array(

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'title',
					'heading'		=> __( 'Title', 'cdz' ),
					'description'	=> __( 'The title above the shortcode.', 'cdz' ),
					'value' 		=> '',
				),

				/*
				 *	WooCommerce loop
				 */

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'number',
					'heading'		=> __( 'Quantity', 'cdz' ),
					'description'	=> __( 'The number of products.', 'cdz' ),
					'value' 		=> '8',
				),
				array(
					'type'			=> 'textfield',
					'param_name'	=> 'columns',
					'heading'		=> __( 'Columns', 'cdz' ),
					'description'	=> __( 'The number of columns.', 'cdz' ),
					'value' 		=> '4',
				),

				/*
				 *	Swiper slider
				 */

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'speed',
					'heading'		=> __( 'Slider Speed (ms)', 'cdz' ),
					'description'	=> __( 'Duration of transition between slides (in ms).', 'cdz' ),
					'value' 		=> '300',
				),
				array(
					'type'			=> 'textfield',
					'param_name'	=> 'autoplay',
					'heading'		=> __( 'Slider Autoplay (ms)', 'cdz' ),
					'description'	=> __( 'Delay between transitions (in ms). If this parameter is not specified, auto play will be disabled.', 'cdz' ),
					'value' 		=> '',
				),

			);

		}

	}

}

$cdz_shortcodes['cdz_wc_sale_products_slider'] = new cdz_WC_Sale_Products_Slider();