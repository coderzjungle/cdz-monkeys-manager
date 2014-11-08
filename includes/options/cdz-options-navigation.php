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
 *	cdzFunction: Options Navigation
 */

if ( ! function_exists( 'cdz_options_navigation' ) ) {

	function cdz_options_navigation() {
		
		$options = array();

		if ( ! cdz_get_theme_options_std( 'navigation' ) ) { return $options; }

		/*
		 *	Tab title
		 */

		$options[] = array(
			'name'			=>	__( 'Navigation', 'cdz' ),
			'type'			=>	'heading',
		);

		/*
		 *	Main Navigation Options
		 */

		if ( cdz_get_theme_options_std( 'info_nav_options' ) ) {

			$options[] = array(
				'name'			=>	__( 'Main Navigation Options', 'cdz' ),
				'desc'			=>	__( 'Customize your main navigation settings', 'cdz' ),
				'type'			=>	'info',
			);

			$options[] = array(
				'name'			=>	__( 'Enable Main Menu', 'cdz' ),
				'desc'			=>	__( 'Show the main navigation', 'cdz' ),
				'id'			=>	'opt_nav',
				'type'			=>	'checkbox',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav' ),
			);

			$options[] = array(
				'name'			=>	__( 'Menu alignment', 'cdz' ),
				'id'			=>	'opt_nav_alignment',
				'type'			=>	'radio',
				'options'		=>	array(
										'left'		=>	__( 'Left', 'cdz' ),
										'center'	=>	__( 'Center', 'cdz' ),
										'right'		=>	__( 'Right', 'cdz' ),
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_alignment' ),
			);

		}

		/*
		 *	Main Navigation Items
		 */

		if ( cdz_get_theme_options_std( 'info_nav_items' ) ) {

			$options[] = array(
				'name'			=>	__( 'Main Navigation Items', 'cdz' ),
				'desc'			=>	__( 'Fonts, colors, borders, paddings, margins', 'cdz' ),
				'type'			=>	'info',
			);

			$options[] = array(
				'name'			=>	__( 'Font', 'cdz' ),
				'id'			=>	"opt_nav_items_font",
				'type'			=>	'typography',
				'options'		=>	array(
										'sizes'		=>	array( '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20' ),
										'color'		=>	false,
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_items_font' ),
			);

			$options[] = array(
				'name'			=>	__( 'Line height', 'cdz' ),
				'id'			=>	'opt_nav_items_lineheight',
				'class'			=>	'advo micro',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_items_lineheight' ),
			);

			$options[] = array(
				'name'			=>	__( 'Font style', 'cdz' ),
				'id'			=>	'opt_nav_items_font_style',
				'class'			=>	'advo',
				'type'			=>	'radio',
				'options'		=>	array(
										'normal'	=>	__( 'Normal', 'cdz' ),
										'italic'	=>	__( 'Italic', 'cdz' ),
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_items_font_style' ),
			);

			$options[] = array(
				'name'			=>	__( 'Text transform', 'cdz' ),
				'id'			=>	'opt_nav_items_text_transform',
				'class'			=>	'advo',
				'type'			=>	'radio',
				'options'		=>	array(
										'none'			=>	__( 'None', 'cdz' ),
										'capitalize'	=>	__( 'Capitalize', 'cdz' ),
										'lowercase'		=>	__( 'Lowercase', 'cdz' ),
										'uppercase'		=>	__( 'Uppercase', 'cdz' ),
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_items_text_transform' ),
			);

			$options[] = array(
				'name'			=>	__( 'Font color', 'cdz' ),
				'id'			=>	'opt_nav_items_font_color',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_items_font_color' ),
			);

			$options[] = array(
				'name'			=>	__( 'Font color (hover)', 'cdz' ),
				'id'			=>	'opt_nav_items_font_color_hover',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_items_font_color_hover' ),
			);

			$options[] = array(
				'name'			=>	__( 'Font color (current)', 'cdz' ),
				'id'			=>	'opt_nav_items_font_color_current',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_items_font_color_current' ),
			);

			$options[] = array(
				'name'			=>	__( 'Background color', 'cdz' ),
				'id'			=>	'opt_nav_items_bg_color',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_items_bg_color' ),
			);

			$options[] = array(
				'name'			=>	__( 'Background color (hover)', 'cdz' ),
				'id'			=>	'opt_nav_items_bg_color_hover',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_items_bg_color_hover' ),
			);

			$options[] = array(
				'name'			=>	__( 'Background color (current)', 'cdz' ),
				'id'			=>	'opt_nav_items_bg_color_current',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_items_bg_color_current' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border color', 'cdz' ),
				'id'			=>	'opt_nav_items_border_color',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_items_border_color' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border color (hover)', 'cdz' ),
				'id'			=>	'opt_nav_items_border_color_hover',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_items_border_color_hover' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border color (current)', 'cdz' ),
				'id'			=>	'opt_nav_items_border_color_current',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_items_border_color_current' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border width', 'cdz' ),
				'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
				'id'			=>	'opt_nav_items_border_width',
				'class'			=>	'advo mini',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_items_border_width' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border style', 'cdz' ),
				'id'			=>	'opt_nav_items_border_style',
				'class'			=>	'advo',
				'type'			=>	'radio',
				'options'		=>	array(
										'dashed'	=>	__( 'Dashed', 'cdz' ),
										'dotted'	=>	__( 'Dotted', 'cdz' ),
										'double'	=>	__( 'Double', 'cdz' ),
										'solid'		=>	__( 'Solid', 'cdz' ),
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_items_border_style' ),
			);

			$options[] = array(
				'name'			=>	__( 'Padding sizes', 'cdz' ),
				'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
				'id'			=>	'opt_nav_items_padding',
				'class'			=>	'advo mini',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_items_padding' ),
			);

			$options[] = array(
				'name'			=>	__( 'Margin sizes', 'cdz' ),
				'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
				'id'			=>	'opt_nav_items_margin',
				'class'			=>	'advo mini',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_items_margin' ),
			);

		}

		/*
		 *	Main Navigation Sub Menus
		 */

		if ( cdz_get_theme_options_std( 'info_nav_sub' ) ) {

			$options[] = array(
				'name'			=>	__( 'Main Navigation Sub Menus', 'cdz' ),
				'desc'			=>	__( 'Colors, borders, paddings, margins', 'cdz' ),
				'type'			=>	'info',
			);

			$options[] = array(
				'name'			=>	__( 'Background color', 'cdz' ),
				'id'			=>	'opt_nav_sub_bg_color',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_bg_color' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border color', 'cdz' ),
				'id'			=>	'opt_nav_sub_border_color',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_border_color' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border width', 'cdz' ),
				'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
				'id'			=>	'opt_nav_sub_border_width',
				'class'			=>	'advo mini',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_border_width' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border style', 'cdz' ),
				'id'			=>	'opt_nav_sub_border_style',
				'class'			=>	'advo',
				'type'			=>	'radio',
				'options'		=>	array(
										'dashed'	=>	__( 'Dashed', 'cdz' ),
										'dotted'	=>	__( 'Dotted', 'cdz' ),
										'double'	=>	__( 'Double', 'cdz' ),
										'solid'		=>	__( 'Solid', 'cdz' ),
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_border_style' ),
			);

			$options[] = array(
				'name'			=>	__( 'Padding sizes', 'cdz' ),
				'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
				'id'			=>	'opt_nav_sub_padding',
				'class'			=>	'advo mini',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_padding' ),
			);

			$options[] = array(
				'name'			=>	__( 'Margin sizes', 'cdz' ),
				'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
				'id'			=>	'opt_nav_sub_margin',
				'class'			=>	'advo mini',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_margin' ),
			);

		}

		/*
		 *	Main Navigation Sub Menus Items
		 */

		if ( cdz_get_theme_options_std( 'info_nav_sub_items' ) ) {

			$options[] = array(
				'name'			=>	__( 'Main Navigation Sub Menus Items', 'cdz' ),
				'desc'			=>	__( 'Fonts, colors, borders, paddings, margins', 'cdz' ),
				'type'			=>	'info',
			);

			$options[] = array(
				'name'			=>	__( 'Font', 'cdz' ),
				'id'			=>	"opt_nav_sub_items_font",
				'type'			=>	'typography',
				'options'		=>	array(
										'sizes'		=>	array( '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20' ),
										'color'		=>	false,
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_items_font' ),
			);

			$options[] = array(
				'name'			=>	__( 'Font style', 'cdz' ),
				'id'			=>	'opt_nav_sub_items_font_style',
				'class'			=>	'advo',
				'type'			=>	'radio',
				'options'		=>	array(
										'normal'	=>	__( 'Normal', 'cdz' ),
										'italic'	=>	__( 'Italic', 'cdz' ),
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_items_font_style' ),
			);

			$options[] = array(
				'name'			=>	__( 'Text transform', 'cdz' ),
				'id'			=>	'opt_nav_sub_items_text_transform',
				'class'			=>	'advo',
				'type'			=>	'radio',
				'options'		=>	array(
										'none'			=>	__( 'None', 'cdz' ),
										'capitalize'	=>	__( 'Capitalize', 'cdz' ),
										'lowercase'		=>	__( 'Lowercase', 'cdz' ),
										'uppercase'		=>	__( 'Uppercase', 'cdz' ),
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_items_text_transform' ),
			);

			$options[] = array(
				'name'			=>	__( 'Font color', 'cdz' ),
				'id'			=>	'opt_nav_sub_items_font_color',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_items_font_color' ),
			);

			$options[] = array(
				'name'			=>	__( 'Font color (hover)', 'cdz' ),
				'id'			=>	'opt_nav_sub_items_font_color_hover',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_items_font_color_hover' ),
			);

			$options[] = array(
				'name'			=>	__( 'Font color (current)', 'cdz' ),
				'id'			=>	'opt_nav_sub_items_font_color_current',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_items_font_color_current' ),
			);

			$options[] = array(
				'name'			=>	__( 'Background color', 'cdz' ),
				'id'			=>	'opt_nav_sub_items_bg_color',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_items_bg_color' ),
			);

			$options[] = array(
				'name'			=>	__( 'Background color (hover)', 'cdz' ),
				'id'			=>	'opt_nav_sub_items_bg_color_hover',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_items_bg_color_hover' ),
			);

			$options[] = array(
				'name'			=>	__( 'Background color (current)', 'cdz' ),
				'id'			=>	'opt_nav_sub_items_bg_color_current',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_items_bg_color_current' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border color', 'cdz' ),
				'id'			=>	'opt_nav_sub_items_border_color',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_items_border_color' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border color (hover)', 'cdz' ),
				'id'			=>	'opt_nav_sub_items_border_color_hover',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_items_border_color_hover' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border color (current)', 'cdz' ),
				'id'			=>	'opt_nav_sub_items_border_color_current',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_items_border_color_current' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border width', 'cdz' ),
				'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
				'id'			=>	'opt_nav_sub_items_border_width',
				'class'			=>	'advo mini',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_items_border_width' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border style', 'cdz' ),
				'id'			=>	'opt_nav_sub_items_border_style',
				'class'			=>	'advo',
				'type'			=>	'radio',
				'options'		=>	array(
										'dashed'	=>	__( 'Dashed', 'cdz' ),
										'dotted'	=>	__( 'Dotted', 'cdz' ),
										'double'	=>	__( 'Double', 'cdz' ),
										'solid'		=>	__( 'Solid', 'cdz' ),
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_items_border_style' ),
			);

			$options[] = array(
				'name'			=>	__( 'Padding sizes', 'cdz' ),
				'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
				'id'			=>	'opt_nav_sub_items_padding',
				'class'			=>	'advo mini',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_items_padding' ),
			);

			$options[] = array(
				'name'			=>	__( 'Margin sizes', 'cdz' ),
				'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
				'id'			=>	'opt_nav_sub_items_margin',
				'class'			=>	'advo mini',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_nav_sub_items_margin' ),
			);

		}

		return $options;

	}

}