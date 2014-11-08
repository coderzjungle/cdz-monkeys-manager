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
 *	cdzFunction: Options Content
 */

if ( ! function_exists( 'cdz_options_content' ) ) {

	function cdz_options_content() {
		
		$options = array();

		if ( ! cdz_get_theme_options_std( 'content' ) ) { return $options; }

		/*
		 *	Tab title
		 */

		$options[] = array(
			'name'			=>	__( 'Content', 'cdz' ),
			'type'			=>	'heading',
		);

		/*
		 *	Content title
		 */

		$options[] = array(
			'name'			=>	__( 'Pages title', 'cdz' ),
			'desc'			=>	__( 'Show / Hide', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
				'name'			=>	__( 'Show title', 'cdz' ),
				'desc'			=>	__( 'Enable page title', 'cdz' ),
				'id'			=>	'opt_content_title',
				'type'			=>	'checkbox',
				'std'			=>	cdz_get_theme_options_std( 'opt_content_title' ),
			);

		$options[] = array(
			'name'			=>	__( 'Pages and posts title style', 'cdz' ),
			'desc'			=>	__( 'Fonts, colors, borders, paddings, margins', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Font', 'cdz' ),
			'id'			=>	'opt_content_title_font',
			'type'			=>	'typography',
			'options'		=>	array(
									'sizes'		=>	array( '15', '16', '17', '18', '19', '20', '22', '24', '26', '30' ),
									'color'		=>	false,
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_content_title_font' ),
		);

		$options[] = array(
			'name'			=>	__( 'Line height', 'cdz' ),
			'id'			=>	'opt_content_title_lineheight',
			'class'			=>	'advo micro',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_title_lineheight' ),
		);

		$options[] = array(
			'name'			=>	__( 'Font style', 'cdz' ),
			'id'			=>	'opt_content_title_font_style',
			'class'			=>	'advo',
			'type'			=>	'radio',
			'options'		=>	array(
									'normal'	=>	__( 'Normal', 'cdz' ),
									'italic'	=>	__( 'Italic', 'cdz' ),
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_content_title_font_style' ),
		);

		$options[] = array(
			'name'			=>	__( 'Text transform', 'cdz' ),
			'id'			=>	'opt_content_title_text_transform',
			'class'			=>	'advo',
			'type'			=>	'radio',
			'options'		=>	array(
									'none'			=>	__( 'None', 'cdz' ),
									'capitalize'	=>	__( 'Capitalize', 'cdz' ),
									'lowercase'		=>	__( 'Lowercase', 'cdz' ),
									'uppercase'		=>	__( 'Uppercase', 'cdz' ),
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_content_title_text_transform' ),
		);

		$options[] = array(
			'name'			=>	__( 'Font color', 'cdz' ),
			'id'			=>	'opt_content_title_font_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_title_font_color' ),
		);

		$options[] = array(
			'name'			=>	__( 'Links color', 'cdz' ),
			'id'			=>	'opt_content_title_link_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_title_link_color' ),
		);

		$options[] = array(
			'name'			=>	__( 'Links color (hover)', 'cdz' ),
			'id'			=>	'opt_content_title_link_color_hover',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_title_link_color_hover' ),
		);

		$options[] = array(
			'name'			=>	__( 'Background color', 'cdz' ),
			'id'			=>	'opt_content_title_bg_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_title_bg_color' ),
		);

		$options[] = array(
			'name'			=>	__( 'Background color (link hover)', 'cdz' ),
			'id'			=>	'opt_content_title_bg_color_hover',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_title_bg_color_hover' ),
		);

		$options[] = array(
			'name'			=>	__( 'Border color', 'cdz' ),
			'id'			=>	'opt_content_title_border_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_title_border_color' ),
		);

		$options[] = array(
			'name'			=>	__( 'Border color (link hover)', 'cdz' ),
			'id'			=>	'opt_content_title_border_color_hover',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_title_border_color_hover' ),
		);

		$options[] = array(
			'name'			=>	__( 'Border width', 'cdz' ),
			'desc'			=>	__( 'example', 'cdz' ) . ': 0px, 1px, ...',
			'id'			=>	'opt_content_title_border_width',
			'class'			=>	'advo mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_title_border_width' ),
		);

		$options[] = array(
			'name'			=>	__( 'Border style', 'cdz' ),
			'id'			=>	'opt_content_title_border_style',
			'class'			=>	'advo',
			'type'			=>	'radio',
			'options'		=>	array(
									'dashed'	=>	__( 'Dashed', 'cdz' ),
									'dotted'	=>	__( 'Dotted', 'cdz' ),
									'double'	=>	__( 'Double', 'cdz' ),
									'solid'		=>	__( 'Solid', 'cdz' ),
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_content_title_border_style' ),
		);

		$options[] = array(
			'name'			=>	__( 'Padding sizes', 'cdz' ),
			'desc'			=>	__( 'example', 'cdz' ) . ': 0px, 1px, ...',
			'id'			=>	'opt_content_title_padding',
			'class'			=>	'advo mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_title_padding' ),
		);

		$options[] = array(
			'name'			=>	__( 'Margin sizes', 'cdz' ),
			'desc'			=>	__( 'example', 'cdz' ) . ': 0px, 1px, ...',
			'id'			=>	'opt_content_title_margin',
			'class'			=>	'advo mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_title_margin' ),
		);

		/*
		 *	Content text
		 */

		$options[] = array(
			'name'			=>	__( 'Pages and posts text', 'cdz' ),
			'desc'			=>	__( 'Fonts, colors, borders, paddings, margins', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Font', 'cdz' ),
			'id'			=>	'opt_content_text_font',
			'type'			=>	'typography',
			'options'		=>	array(
									'sizes'		=>	array( '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20' ),
									'color'		=>	false,
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_content_text_font' ),
		);

		$options[] = array(
			'name'			=>	__( 'Line height', 'cdz' ),
			'id'			=>	'opt_content_text_lineheight',
			'class'			=>	'advo micro',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_text_lineheight' ),
		);

		$options[] = array(
			'name'			=>	__( 'Font style', 'cdz' ),
			'id'			=>	'opt_content_text_font_style',
			'class'			=>	'advo',
			'type'			=>	'radio',
			'options'		=>	array(
									'normal'	=>	__( 'Normal', 'cdz' ),
									'italic'	=>	__( 'Italic', 'cdz' ),
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_content_text_font_style' ),
		);

		$options[] = array(
			'name'			=>	__( 'Text transform', 'cdz' ),
			'id'			=>	'opt_content_text_text_transform',
			'class'			=>	'advo',
			'type'			=>	'radio',
			'options'		=>	array(
									'none'			=>	__( 'None', 'cdz' ),
									'capitalize'	=>	__( 'Capitalize', 'cdz' ),
									'lowercase'		=>	__( 'Lowercase', 'cdz' ),
									'uppercase'		=>	__( 'Uppercase', 'cdz' ),
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_content_text_text_transform' ),
		);

		$options[] = array(
			'name'			=>	__( 'Font color', 'cdz' ),
			'id'			=>	'opt_content_text_font_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_text_font_color' ),
		);

		$options[] = array(
			'name'			=>	__( 'Links color', 'cdz' ),
			'id'			=>	'opt_content_text_links_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_text_links_color' ),
		);

		$options[] = array(
			'name'			=>	__( 'Links color (hover)', 'cdz' ),
			'id'			=>	'opt_content_text_links_color_hover',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_text_links_color_hover' ),
		);

		$options[] = array(
			'name'			=>	__( 'Background color', 'cdz' ),
			'id'			=>	'opt_content_text_bg_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_text_bg_color' ),
		);

		$options[] = array(
			'name'			=>	__( 'Border color', 'cdz' ),
			'id'			=>	'opt_content_text_border_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_text_border_color' ),
		);

		$options[] = array(
			'name'			=>	__( 'Border width', 'cdz' ),
			'desc'			=>	__( 'example', 'cdz' ) . ': 0px, 1px, ...',
			'id'			=>	'opt_content_text_border_width',
			'class'			=>	'advo mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_text_border_width' ),
		);

		$options[] = array(
			'name'			=>	__( 'Border style', 'cdz' ),
			'id'			=>	'opt_content_text_border_style',
			'class'			=>	'advo',
			'type'			=>	'radio',
			'options'		=>	array(
									'dashed'	=>	__( 'Dashed', 'cdz' ),
									'dotted'	=>	__( 'Dotted', 'cdz' ),
									'double'	=>	__( 'Double', 'cdz' ),
									'solid'		=>	__( 'Solid', 'cdz' ),
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_content_text_border_style' ),
		);

		$options[] = array(
			'name'			=>	__( 'Padding sizes', 'cdz' ),
			'desc'			=>	__( 'example', 'cdz' ) . ': 0px, 1px, ...',
			'id'			=>	'opt_content_text_padding',
			'class'			=>	'advo mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_text_padding' ),
		);

		$options[] = array(
			'name'			=>	__( 'Margin sizes', 'cdz' ),
			'desc'			=>	__( 'example', 'cdz' ) . ': 0px, 1px, ...',
			'id'			=>	'opt_content_text_margin',
			'class'			=>	'advo mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_content_text_margin' ),
		);

		return $options;
	}

}