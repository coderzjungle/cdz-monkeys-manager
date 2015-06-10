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
 *	cdzShortcode: WooCommerce Product Categories Slider
 */

if ( ! class_exists( 'cdz_WC_Product_Categories_Slider' ) ) {

	class cdz_WC_Product_Categories_Slider extends cdz_Shortcode {

		public $name = 'Product Categories Slider';
		public $base = 'cdz_wc_product_categories_slider';
		public $slug = 'cdz-wc-product-categories-slider';
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
					'description'	=> __( 'Display the number of products.', 'cdz' ),
					'value' 		=> '8',
				),
				array(
					'type'			=> 'textfield',
					'param_name'	=> 'columns',
					'heading'		=> __( 'Columns', 'cdz' ),
					'description'	=> __( 'The number of columns.', 'cdz' ),
					'value' 		=> '4',
				),
				array(
					'type'			=> 'textfield',
					'param_name'	=> 'ids',
					'heading'		=> __( 'Ids', 'cdz' ),
					'description'	=> __( 'Set IDs to a comma separated list of category IDs to only show those.', 'cdz' ),
					'value' 		=> '',
				),
				array(
					'type'			=> 'textfield',
					'param_name'	=> 'parent',
					'heading'		=> __( 'Parent category', 'cdz' ),
					'description'	=> __( 'Set to 0 to only display top level categories.', 'cdz' ),
					'value' 		=> '0',
				),
				array(
					'type'			=> 'dropdown',
					'param_name'	=> 'orderby',
					'heading'		=> __( 'Order by', 'cdz' ),
					'description'	=> __( 'Select the products order.', 'cdz' ),
					'value' 		=> array(
						__( 'Date', 'cdz' )		=> 'date',
						__( 'Name', 'cdz' )		=> 'name',
						__( 'Title', 'cdz' )	=> 'title',
					),
				),
				array(
					'type'			=> 'dropdown',
					'param_name'	=> 'order',
					'heading'		=> __( 'Order', 'cdz' ),
					'description'	=> __( 'Select the products order direction.', 'cdz' ),
					'value' 		=> array(
						__( 'Ascendant', 'cdz' )	=> 'asc',
						__( 'Descendant', 'cdz' )	=> 'desc',
					),
				),
				array(
					'type'			=> 'dropdown',
					'param_name'	=> 'hide_empty',
					'heading'		=> __( 'Hide Empty', 'cdz' ),
					'description'	=> __( 'Hide empty categories.', 'cdz' ),
					'value' 		=> array(
						__( 'True', 'cdz' )		=> '1',
						__( 'False', 'cdz' )	=> '0',
					),
				),

				/*
				 *	Swiper slider
				 */

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'speed',
					'heading'		=> __( 'Slider Speed (ms)', 'cdz' ),
					'description'	=> __( 'Duration of transition between slides (in ms)', 'cdz' ),
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

$cdz_shortcodes['cdz_wc_product_categories_slider'] = new cdz_WC_Product_Categories_Slider();