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
 *	cdzFunction: Options General
 */

if ( ! function_exists( 'cdz_options_general' ) ) {

	function cdz_options_general() {
		
		$options = array();

		if ( ! cdz_get_theme_options_std( 'general' ) ) { return $options; }

		/*
		 *	Tab title
		 */

		$options[] = array(
			'name'			=>	__( 'General', 'cdz' ),
			'type'			=>	'heading',
		);

		/*
		 *	General Features
		 */

		if ( cdz_get_theme_options_std( 'info_general' ) ) {

			$options[] = array(
				'name'			=>	__( 'General Features', 'cdz' ),
				'desc'			=>	__( 'Enable theme features', 'cdz' ),
				'type'			=>	'info',
			);

			$options[] = array(
				'name'			=>	__( 'Responsive', 'cdz' ),
				'desc'			=>	__( 'Enable responsive feature', 'cdz' ),
				'id'			=>	'opt_general_responsive',
				'type'			=>	'checkbox',
				'std'			=>	cdz_get_theme_options_std( 'opt_general_responsive' ),
			);

			//var_dump(cdz_get_theme_options_std( 'opt_general_responsive' ));

			/* *** New feature in next 1.1.0 theme version ***

			$options[] = array(
				'name'			=>	__( 'Retina display images', 'cdz' ),
				'desc'			=>	__( 'Enable the Retina Display feature' , 'cdz' ),
				'id'			=>	'opt_general_images_retina',
				'type'			=>	'checkbox',
				'std'			=>	cdz_get_theme_options_std( 'opt_general_images_retina' ),
			);
			
			*/

			$options[] = array(
				'name'			=>	__( 'Advanced options', 'cdz' ),
				'desc'			=>	__( 'Show advanced theme options', 'cdz' ),
				'id'			=>	'opt_adv_options',
				'type'			=>	'checkbox',
				'std'			=>	cdz_get_theme_options_std( 'opt_adv_options' ),
			);

		}

		/*
		 *	Body
		 */

		if ( cdz_get_theme_options_std( 'info_body' ) ) {

			$options[] = array(
				'name'			=>	__( 'Body', 'cdz' ),
				'desc'			=>	__( 'Upload a body background', 'cdz' ),
				'type'			=>	'info',
			);

			$options[] = array(
				'name'			=>	 __( 'Body background', 'cdz' ),
				'id'			=>	'opt_body_background',
				'type'			=>	'background',
				'std'			=>	cdz_get_theme_options_std( 'opt_body_background' ),
			);

			$options[] = array(
				'name'			=>	__( 'Padding sizes', 'cdz' ),
				'id'			=>	'opt_body_padding',
				'class'			=>	'advo mini',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_body_padding' ),
			);

		}

		/*
		 *	Container
		 */

		if ( cdz_get_theme_options_std( 'info_container' ) ) {

			$options[] = array(
				'name'			=>	__( 'Container', 'cdz' ),
				'desc'			=>	__( 'Edit the container width and background', 'cdz' ),
				'type'			=>	'info',
			);

			$options[] = array(
				'name'			=>	 __( 'Container background', 'cdz' ),
				'id'			=>	'opt_container_background',
				'type'			=>	'background',
				'std'			=>	cdz_get_theme_options_std( 'opt_container_background' ),
			);

			$options[] = array(
				'name'			=>	__( 'Container min width', 'cdz' ),
				// 'desc'			=>	__( 'pixels', 'cdz' ),
				'id'			=>	'opt_container_min_width',
				'class'			=>	'advo micro',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_container_min_width' ),
			);

			$options[] = array(
				'name'			=>	__( 'Container max width', 'cdz' ),
				// 'desc'			=>	__( 'pixels', 'cdz') . ' (0 = ' . __( 'full width', 'cdz') . ')',
				'id'			=>	'opt_container_max_width',
				'class'			=>	'advo micro',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_container_max_width' ),
			);

			$options[] = array(
				'name'			=>	__( 'Grid Container max width', 'cdz' ),
				// 'desc'			=>	__( 'pixels', 'cdz') . ' (0 = ' . __( 'full width', 'cdz') . ')',
				'id'			=>	'opt_grid_container_max_width',
				'class'			=>	'advo micro',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_grid_container_max_width' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border width', 'cdz' ),
				'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
				'id'			=>	'opt_container_border_width',
				'class'			=>	'advo mini',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_container_border_width' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border style', 'cdz' ),
				'id'			=>	'opt_container_border_style',
				'class'			=>	'advo',
				'type'			=>	'radio',
				'options'		=>	array(
										'dashed'	=>	__( 'Dashed', 'cdz' ),
										'dotted'	=>	__( 'Dotted', 'cdz' ),
										'double'	=>	__( 'Double', 'cdz' ),
										'solid'		=>	__( 'Solid', 'cdz' ),
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_container_border_style' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border color', 'cdz' ),
				'id'			=>	'opt_container_border_color',
				'class'			=>	'advo',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_container_border_color' ),
			);

			$options[] = array(
				'name'			=>	__( 'Padding sizes', 'cdz' ),
				'id'			=>	'opt_container_padding',
				'class'			=>	'advo mini',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_container_padding' ),
			);

			$options[] = array(
				'name'			=>	__( 'Margin sizes', 'cdz' ),
				'id'			=>	'opt_container_margin',
				'class'			=>	'advo mini',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_container_margin' ),
			);

		}

		/*
		 *	General Typography
		 */

		if ( cdz_get_theme_options_std( 'info_typography' ) ) {

			$options[] = array(
				'name'			=>	__( 'Typography', 'cdz' ),
				'desc'			=>	__( 'Customize your general typography', 'cdz' ),
				'type'			=>	'info',
			);

			$options[] = array(
				'name'			=>	__( 'Font', 'cdz' ),
				'id'			=>	"opt_typography_font",
				'type'			=>	'typography',
				'options'		=>	array(
										'sizes'		=>	array( '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20' ),
										'color'		=>	false,
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_typography_font' ),
			);

			$options[] = array(
				'name'			=>	__( 'Font color', 'cdz' ),
				'id'			=>	'opt_typography_font_color',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_typography_font_color' ),
			);

			$options[] = array(
				'name'			=>	__( 'Links color', 'cdz' ),
				'id'			=>	'opt_typography_link_color',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_typography_link_color' ),
			);

			$options[] = array(
				'name'			=>	__( 'Links color (hover)', 'cdz' ),
				'id'			=>	'opt_typography_link_color_hover',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_typography_link_color_hover' ),
			);

		}

		/*
		 *	General Button
		 */

		if ( cdz_get_theme_options_std( 'info_button' ) ) {

			$options[] = array(
				'name'			=>	__( 'Buttons', 'cdz' ),
				'desc'			=>	__( 'Customize your general buttons', 'cdz' ),
				'type'			=>	'info',
			);

			$options[] = array(
				'name'			=>	__( 'Font', 'cdz' ),
				'id'			=>	"opt_button_font",
				'type'			=>	'typography',
				'options'		=>	array(
										'sizes'		=>	array( '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20' ),
										'color'		=>	false,
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_button_font' ),
			);

			$options[] = array(
				'name'			=>	__( 'Font style', 'cdz' ),
				'id'			=>	'opt_button_font_style',
				'class'			=>	'advo',
				'type'			=>	'radio',
				'options'		=>	array(
										'normal'	=>	__( 'Normal', 'cdz' ),
										'italic'	=>	__( 'Italic', 'cdz' ),
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_button_font_style' ),
			);

			$options[] = array(
				'name'			=>	__( 'Text transform', 'cdz' ),
				'id'			=>	'opt_button_text_transform',
				'class'			=>	'advo',
				'type'			=>	'radio',
				'options'		=>	array(
										'none'			=>	__( 'None', 'cdz' ),
										'capitalize'	=>	__( 'Capitalize', 'cdz' ),
										'lowercase'		=>	__( 'Lowercase', 'cdz' ),
										'uppercase'		=>	__( 'Uppercase', 'cdz' ),
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_button_text_transform' ),
			);

			$options[] = array(
				'name'			=>	__( 'Font color', 'cdz' ),
				'id'			=>	'opt_button_font_color',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_button_font_color' ),
			);

			$options[] = array(
				'name'			=>	__( 'Font color (hover)', 'cdz' ),
				'id'			=>	'opt_button_font_color_hover',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_button_font_color_hover' ),
			);

			$options[] = array(
				'name'			=>	__( 'Background color', 'cdz' ),
				'id'			=>	'opt_button_bg_color',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_button_bg_color' ),
			);

			$options[] = array(
				'name'			=>	__( 'Background color (hover)', 'cdz' ),
				'id'			=>	'opt_button_bg_color_hover',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_button_bg_color_hover' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border color', 'cdz' ),
				'id'			=>	'opt_button_border_color',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_button_border_color' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border color (hover)', 'cdz' ),
				'id'			=>	'opt_button_border_color_hover',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_button_border_color_hover' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border width', 'cdz' ),
				'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
				'id'			=>	'opt_button_border_width',
				'class'			=>	'advo mini',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_button_border_width' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border radius', 'cdz' ),
				'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
				'id'			=>	'opt_button_border_radius',
				'class'			=>	'advo mini',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_button_border_radius' ),
			);

			$options[] = array(
				'name'			=>	__( 'Border style', 'cdz' ),
				'id'			=>	'opt_button_border_style',
				'class'			=>	'advo',
				'type'			=>	'radio',
				'options'		=>	array(
										'dashed'	=>	__( 'Dashed', 'cdz' ),
										'dotted'	=>	__( 'Dotted', 'cdz' ),
										'double'	=>	__( 'Double', 'cdz' ),
										'solid'		=>	__( 'Solid', 'cdz' ),
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_button_border_style' ),
			);

			$options[] = array(
				'name'			=>	__( 'Padding sizes', 'cdz' ),
				'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
				'id'			=>	'opt_button_padding',
				'class'			=>	'advo mini',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_button_padding' ),
			);

			$options[] = array(
				'name'			=>	__( 'Margin sizes', 'cdz' ),
				'desc'			=>	__( 'example', 'cdz') . ': 0px, 1px, ...',
				'id'			=>	'opt_button_margin',
				'class'			=>	'advo mini',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_button_margin' ),
			);

		}

		/*
		 *	Icons Options
		 *	Doc: https://github.com/audreyr/favicon-cheat-sheet
		 */

		if ( cdz_get_theme_options_std( 'info_icons' ) ) {

			$options[] = array(
				'name'			=>	__( 'Icons', 'cdz' ),
				'desc'			=>	__( 'Upload the favicon and touch icons images', 'cdz' ),
				'type'			=>	'info',
			);

			$options[] = array(
				'name'			=>	__( 'Favicon', 'cdz' ),
				'desc'			=>	__( '32x32 pixels', 'cdz' ),
				'id'			=>	'opt_custom_icons_favicon',
				'type'			=>	'upload',
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_icons_favicon' ),
			);

			/*
			 *	Touch icon
			 */

			$options[] = array(
				'name'			=>	__( 'Touch icons', 'cdz' ),
				'desc'			=>	__( 'Enable advaced settings', 'cdz' ),
				'id'			=>	'opt_custom_icons_touch',
				'type'			=>	'checkbox',
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_icons_touch' ),
			);

			$options[] = array(
				'name'			=>	__( ' ', 'cdz' ),
				'desc'			=>	__( '152x152 pixels - for iPad with high-resolution Retina display running iOS >= 7', 'cdz' ),
				'id'			=>	'opt_custom_icons_touch_152',
				'class'			=>	'hidden',
				'type'			=>	'upload',
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_icons_touch_152' ),
			);

			$options[] = array(
				'name'			=>	__( ' ', 'cdz' ),
				'desc'			=>	__( '144x144 pixels - for iPad with high-resolution Retina display running iOS <= 6', 'cdz' ),
				'id'			=>	'opt_custom_icons_touch_144',
				'class'			=>	'hidden',
				'type'			=>	'upload',
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_icons_touch_144' ),
			);

			$options[] = array(
				'name'			=>	__( ' ', 'cdz' ),
				'desc'			=>	__( '120x120 pixels - for iPhone with high-resolution Retina display running iOS >= 7', 'cdz' ),
				'id'			=>	'opt_custom_icons_touch_120',
				'class'			=>	'hidden',
				'type'			=>	'upload',
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_icons_touch_120' ),
			);

			$options[] = array(
				'name'			=>	__( ' ', 'cdz' ),
				'desc'			=>	__( '114x114 pixels - for iPhone with high-resolution Retina display running iOS <= 6', 'cdz' ),
				'id'			=>	'opt_custom_icons_touch_114',
				'class'			=>	'hidden',
				'type'			=>	'upload',
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_icons_touch_114' ),
			);

			$options[] = array(
				'name'			=>	__( ' ', 'cdz' ),
				'desc'			=>	__( '76x76 pixels - for the iPad mini and the first- and second-generation iPad on iOS >= 7', 'cdz' ),
				'id'			=>	'opt_custom_icons_touch_76',
				'class'			=>	'hidden',
				'type'			=>	'upload',
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_icons_touch_76' ),
			);

			$options[] = array(
				'name'			=>	__( ' ', 'cdz' ),
				'desc'			=>	__( '72x72 pixels - for the iPad mini and the first- and second-generation iPad on iOS <= 6', 'cdz' ),
				'id'			=>	'opt_custom_icons_touch_72',
				'class'			=>	'hidden',
				'type'			=>	'upload',
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_icons_touch_72' ),
			);

			$options[] = array(
				'name'			=>	__( ' ', 'cdz' ),
				'desc'			=>	__( '57x57 pixels - for non-Retina iPhone, iPod Touch, and Android 2.1+ devices', 'cdz' ),
				'id'			=>	'opt_custom_icons_touch_57',
				'class'			=>	'hidden',
				'type'			=>	'upload',
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_icons_touch_57' ),
			);

			/*
			 *	IE 10 Metro tile icon
			 */

			$options[] = array(
				'name'			=>	__( 'IE 10 Metro', 'cdz' ),
				'desc'			=>	__( 'Enable IE 10 Metro tile icon', 'cdz' ),
				'id'			=>	'opt_custom_icons_ie_10',
				'type'			=>	'checkbox',
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_icons_ie_10' ),
			);

			$options[] = array(
				'name'			=>	__( 'Tile Image', 'cdz' ),
				'desc'			=>	__( '144x144 pixels', 'cdz' ),
				'id'			=>	'opt_custom_icons_ie_10_metro_tile_image',
				'class'			=>	'hidden',
				'type'			=>	'upload',
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_icons_ie_10_metro_tile_image' ),
			);

			$options[] = array(
				'name'			=>	__( 'Tile Color', 'cdz' ),
				'id'			=>	'opt_custom_icons_ie_10_metro_tile_color',
				'class'			=>	'hidden',
				'type'			=>	'color',
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_icons_ie_10_metro_tile_color' ),
			);

		}

		return $options;

	}

}