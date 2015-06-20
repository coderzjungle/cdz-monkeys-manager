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
 *	cdzShortcode: Works (Portfolio)
 */

if ( ! class_exists( 'cdz_Portfolio' ) ) {

	class cdz_Portfolio extends cdz_Shortcode {

		public $name = 'Portfolio';
		public $base = 'cdz_portfolio';
		public $slug = 'cdz-portfolio';
		public $desc = 'Show your works.';

		public function get_options() {

			return array(

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'title',
					'heading'		=> __( 'Title', 'cdz' ),
					'description'	=> __( 'The title above the shortcode.', 'cdz' ),
					'value' 		=> '',
				),

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'number',
					'heading'		=> __( 'Number', 'cdz' ),
					'description'	=> __( 'The number of works.', 'cdz' ),
					'value' 		=> '12',
				),

				array(
					'type'			=> 'dropdown',
					'param_name'	=> 'orderby',
					'heading'		=> __( 'Order by', 'cdz' ),
					'description'	=> __( 'Select the works order.', 'cdz' ),
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
					'description'	=> __( 'Select the works order direction.', 'cdz' ),
					'value' 		=> array(
						__( 'Ascendant', 'cdz' )	=> 'asc',
						__( 'Descendant', 'cdz' )	=> 'desc',
					),
				),

				array(
					'type'			=> 'dropdown',
					'param_name'	=> 'style',
					'heading'		=> __( 'Style', 'cdz' ),
					'description'	=> __( 'Select the portfolio template.', 'cdz' ),
					'value' 		=> array(
						__( 'Small Thumbnail', 'cdz' )		=> 'small-thumbnail',
						__( 'Big Thumbnail', 'cdz' )		=> 'big-thumbnail',
						__( 'Grid Filtered', 'cdz' )		=> 'grid-filtered',
						__( '3 Columns', 'cdz' )			=> '3-columns',
						__( '4 Columns', 'cdz' )			=> '4-columns',
					),
				),

			);

		}

	}

}

$cdz_shortcodes['cdz_portfolio'] = new cdz_Portfolio();