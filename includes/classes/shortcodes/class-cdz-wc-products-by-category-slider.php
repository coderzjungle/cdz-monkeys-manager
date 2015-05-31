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
 *	cdzShortcode: WooCommerce Products by Category Slider
 */

if ( ! class_exists( 'cdz_WC_Products_By_Category_Slider' ) ) {

	class cdz_WC_Products_By_Category_Slider extends cdz_Shortcode {

		public $name = 'Products by Category Slider';
		public $base = 'cdz_wc_products_by_category_slider';
		public $slug = 'cdz-wc-products-by-category-slider';
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
					'description'	=> __( 'The number of products of the slider.', 'cdz' ),
					'value' 		=> '8',
				),

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'columns',
					'heading'		=> __( 'Columns', 'cdz' ),
					'description'	=> __( 'The number of columns of the slider.', 'cdz' ),
					'value' 		=> '4',
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
					'type'			=> 'textfield',
					'param_name'	=> 'category',
					'heading'		=> __( 'Category', 'cdz' ),
					'description'	=> __( 'One or more categories slug separated by ","', 'cdz' ),
					'value' 		=> '',
				),

				/*
				 *	Swiper slider
				 */

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'initialSlide',
					'heading'		=> __( 'Initial slide', 'cdz' ),
					'description'	=> __( '', 'cdz' ),
					'value' 		=> '0',
				),

				array(
					'type'			=> 'dropdown',
					'param_name'	=> 'direction',
					'heading'		=> __( 'Direction', 'cdz' ),
					'description'	=> __( '', 'cdz' ),
					'value' 		=> array(
						__( 'Horizontal', 'cdz' )	=> 'horizontal',
						__( 'Vertical', 'cdz' )		=> 'vertical',
					),
				),

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'speed',
					'heading'		=> __( 'Speed (ms)', 'cdz' ),
					'description'	=> __( '', 'cdz' ),
					'value' 		=> '300',
				),

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'width',
					'heading'		=> __( 'Width', 'cdz' ),
					'description'	=> __( '', 'cdz' ),
					'value' 		=> '',
				),

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'height',
					'heading'		=> __( 'Height', 'cdz' ),
					'description'	=> __( '', 'cdz' ),
					'value' 		=> '',
				),

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'autoplay',
					'heading'		=> __( 'Autoplay (ms)', 'cdz' ),
					'description'	=> __( 'Delay between transitions (in ms). If this parameter is not specified, auto play will be disabled.', 'cdz' ),
					'value' 		=> '',
				),

			);

		}

	}

}

$cdz_shortcodes['cdz_wc_products_by_category_slider'] = new cdz_WC_Products_By_Category_Slider();