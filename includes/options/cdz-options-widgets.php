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
 *	cdzFunction: Options Widgets
 */

if ( ! function_exists( 'cdz_options_widgets' ) ) {

	function cdz_options_widgets() {
		
		$options = array();

		if ( ! cdz_get_theme_options_std( 'widgets' ) ) { return $options; }

		/*
		 *	Tab title
		 */

		$options[] = array(
			'name'			=>	__( 'Widgets', 'cdz' ),
			'type'			=>	'heading',
		);

		/*
		 *	Widgets
		 */

		$options[] = array(
			'name'			=>	__( 'Widgets', 'cdz' ),
			'desc'			=>	__( 'Fonts, colors, borders, paddings, margins', 'cdz' ),
			'type'			=>	'info',
		);

		/*$options[] = array(
			'name'			=>	__( 'Background color', 'cdz' ),
			'id'			=>	'opt_widgets_bg_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_bg_color' ),
			// 'std'			=>	'#ffffff',
		);*/

		$options[] = array(
			'name'			=>	 __( 'Background', 'cdz' ),
			'id'			=>	'opt_widgets_background',
			'type'			=>	'background',
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_background' ),
		);

		$options[] = array(
			'name'			=>	__( 'Border color', 'cdz' ),
			'id'			=>	'opt_widgets_border_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_border_color' ),
		);

		$options[] = array(
			'name'			=>	__( 'Border width', 'cdz' ),
			'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
			'id'			=>	'opt_widgets_border_width',
			'class'			=>	'advo mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_border_width' ),
		);

		$options[] = array(
			'name'			=>	__( 'Border style', 'cdz' ),
			'id'			=>	'opt_widgets_border_style',
			'class'			=>	'advo',
			'type'			=>	'radio',
			'options'		=>	array(
									'dashed'	=>	__( 'Dashed', 'cdz' ),
									'dotted'	=>	__( 'Dotted', 'cdz' ),
									'double'	=>	__( 'Double', 'cdz' ),
									'solid'		=>	__( 'Solid', 'cdz' ),
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_border_style' ),
		);

		$options[] = array(
			'name'			=>	__( 'Padding sizes', 'cdz' ),
			'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
			'id'			=>	'opt_widgets_padding',
			'class'			=>	'advo mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_padding' ),
		);

		$options[] = array(
			'name'			=>	__( 'Margin sizes', 'cdz' ),
			'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
			'id'			=>	'opt_widgets_margin',
			'class'			=>	'advo mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_margin' ),
		);

		/*
		 *	Widgets title
		 */

		$options[] = array(
			'name'			=>	__( 'Widgets title', 'cdz' ),
			'desc'			=>	__( 'Fonts, colors, borders, paddings, margins', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Font', 'cdz' ),
			'id'			=>	'opt_widgets_title_font',
			'type'			=>	'typography',
			'options'		=>	array(
									'sizes'		=>	array( '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20' ),
									'color'		=>	false,
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_title_font' ),
		);

		$options[] = array(
			'name'			=>	__( 'Font style', 'cdz' ),
			'id'			=>	'opt_widgets_title_font_style',
			'class'			=>	'advo',
			'type'			=>	'radio',
			'options'		=>	array(
									'normal'	=>	__( 'Normal', 'cdz' ),
									'italic'	=>	__( 'Italic', 'cdz' ),
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_title_font_style' ),
		);

		$options[] = array(
			'name'			=>	__( 'Text transform', 'cdz' ),
			'id'			=>	'opt_widgets_title_text_transform',
			'class'			=>	'advo',
			'type'			=>	'radio',
			'options'		=>	array(
									'none'			=>	__( 'None', 'cdz' ),
									'capitalize'	=>	__( 'Capitalize', 'cdz' ),
									'lowercase'		=>	__( 'Lowercase', 'cdz' ),
									'uppercase'		=>	__( 'Uppercase', 'cdz' ),
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_title_text_transform' ),
		);

		$options[] = array(
			'name'			=>	__( 'Font color', 'cdz' ),
			'id'			=>	'opt_widgets_title_font_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_title_font_color' ),
		);

		$options[] = array(
			'name'			=>	__( 'Background color', 'cdz' ),
			'id'			=>	'opt_widgets_title_bg_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_title_bg_color' ),
		);

		$options[] = array(
			'name'			=>	__( 'Border color', 'cdz' ),
			'id'			=>	'opt_widgets_title_border_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_title_border_color' ),
		);

		$options[] = array(
			'name'			=>	__( 'Border width', 'cdz' ),
			'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
			'id'			=>	'opt_widgets_title_border_width',
			'class'			=>	'advo mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_title_border_width' ),
		);

		$options[] = array(
			'name'			=>	__( 'Border style', 'cdz' ),
			'id'			=>	'opt_widgets_title_border_style',
			'class'			=>	'advo',
			'type'			=>	'radio',
			'options'		=>	array(
									'dashed'	=>	__( 'Dashed', 'cdz' ),
									'dotted'	=>	__( 'Dotted', 'cdz' ),
									'double'	=>	__( 'Double', 'cdz' ),
									'solid'		=>	__( 'Solid', 'cdz' ),
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_title_border_style' ),
		);

		$options[] = array(
			'name'			=>	__( 'Padding sizes', 'cdz' ),
			'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
			'id'			=>	'opt_widgets_title_padding',
			'class'			=>	'advo mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_title_padding' ),
		);

		$options[] = array(
			'name'			=>	__( 'Margin sizes', 'cdz' ),
			'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
			'id'			=>	'opt_widgets_title_margin',
			'class'			=>	'advo mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_title_margin' ),
		);

		/*
		 *	Widgets text
		 */

		$options[] = array(
			'name'			=>	__( 'Widgets text', 'cdz' ),
			'desc'			=>	__( 'Fonts, colors, borders, paddings, margins', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Font', 'cdz' ),
			'id'			=>	"opt_widgets_text_font",
			'type'			=>	'typography',
			'options'		=>	array(
									'sizes'		=>	array( '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20' ),
									'color'		=>	false,
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_text_font' ),
		);

		$options[] = array(
			'name'			=>	__( 'Line height', 'cdz' ),
			'id'			=>	'opt_widgets_text_lineheight',
			'class'			=>	'advo mini',
			'type'			=>	'select',
			'options'		=>	array(
									'10px'	=>	'10px',
									'12px'	=>	'12px',
									'14px'	=>	'14px',
									'16px'	=>	'16px',
									'18px'	=>	'18px',
									'20px'	=>	'20px',
									'22px'	=>	'22px',
									'24px'	=>	'24px',
									'26px'	=>	'26px',
									'28px'	=>	'28px',
									'30px'	=>	'30px',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_text_lineheight' ),
		);

		$options[] = array(
			'name'			=>	__( 'Font style', 'cdz' ),
			'id'			=>	'opt_widgets_text_font_style',
			'class'			=>	'advo',
			'type'			=>	'radio',
			'options'		=>	array(
									'normal'	=>	__( 'Normal', 'cdz' ),
									'italic'	=>	__( 'Italic', 'cdz' ),
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_text_font_style' ),
		);

		$options[] = array(
			'name'			=>	__( 'Text transform', 'cdz' ),
			'id'			=>	'opt_widgets_text_text_transform',
			'class'			=>	'advo',
			'type'			=>	'radio',
			'options'		=>	array(
									'none'			=>	__( 'None', 'cdz' ),
									'capitalize'	=>	__( 'Capitalize', 'cdz' ),
									'lowercase'		=>	__( 'Lowercase', 'cdz' ),
									'uppercase'		=>	__( 'Uppercase', 'cdz' ),
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_text_text_transform' ),
		);

		$options[] = array(
			'name'			=>	__( 'Font color', 'cdz' ),
			'id'			=>	'opt_widgets_text_font_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_text_font_color' ),
		);

		$options[] = array(
			'name'			=>	__( 'Links color', 'cdz' ),
			'id'			=>	'opt_widgets_text_links_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_text_links_color' ),
		);

		$options[] = array(
			'name'			=>	__( 'Links color (hover)', 'cdz' ),
			'id'			=>	'opt_widgets_text_links_color_hover',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_widgets_text_links_color_hover' ),
		);

		return $options;
		
	}

}