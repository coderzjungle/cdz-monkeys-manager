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
 *	cdzFunction: Options Header
 */

if ( ! function_exists( 'cdz_options_header' ) ) {

	function cdz_options_header() {
		
		$options = array();

		if ( ! cdz_get_theme_options_std( 'header' ) ) { return $options; }

		/*
		 *	Tab title
		 */

		$options[] = array(
			'name'			=>	__( 'Header', 'cdz' ),
			'type'			=>	'heading',
		);

		/*
		 *	Header Options
		 */

		if ( cdz_get_theme_options_std( 'info_header' ) ) {

			$options[] = array(
				'name'			=>	__( 'Header Options', 'cdz' ),
				'desc'			=>	__( 'Choose your header configuration', 'cdz' ),
				'type'			=>	'info',
			);

			$options[] = array(
				'name'			=>	__( 'Enable Header', 'cdz' ),
				'desc'			=>	__( 'Show the Header section', 'cdz' ),
				'id'			=>	'opt_header',
				'type'			=>	'checkbox',
				'std'			=>	cdz_get_theme_options_std( 'opt_header' ),
			);

			$options[] = array(
				'name'			=>	__( 'Header Layout', 'cdz' ),
				'id'			=>	'opt_header_layout',
				'class'			=>	'hidden',
				'type'			=>	'radio',
				'options'		=>	array(
										'type_1' =>	__( 'Type 1 - Logo Top, Nav Bottom', 'cdz' ),
										'type_2' =>	__( 'Type 2 - Nav Top, Logo Bottom', 'cdz' ),
										'type_3' =>	__( 'Type 3 - Logo Left, Nav Right', 'cdz' ),
										'type_4' =>	__( 'Type 4 - Nav Left, Logo Right', 'cdz' ),
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_header_layout' ),
			);

			$options[] = array(
				'name'			=>	__( 'Fixed Header', 'cdz' ),
				'desc'			=>	__( 'Position fixed on scroll', 'cdz' ),
				'id'			=>	'opt_header_fixed',
				'class'			=>	'advo',
				'type'			=>	'checkbox',
				'std'			=>	cdz_get_theme_options_std( 'opt_header_fixed' ),
			);

		}

		/*
		 *	Logo Options
		 */

		if ( cdz_get_theme_options_std( 'info_logo' ) ) {

			$options[] = array(
				'name'			=>	__( 'Logo', 'cdz' ),
				'desc'			=>	__( 'Use the standard settings or enable and upload a custom logo', 'cdz' ),
				'type'			=>	'info',
			);

			$options[] = array(
				'name'			=>	__( 'Custom Logo Position', 'cdz' ),
				'id'			=>	'opt_custom_logo_position',
				'type'			=>	'radio',
				'options'		=>	array(
										'left'		=>	__( 'Left', 'cdz' ),
										'center'	=>	__( 'Center', 'cdz' ),
										'right'		=>	__( 'Right', 'cdz' ),
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_logo_position' ),
			);

			$options[] = array(
				'name'			=>	__( 'Custom Logo', 'cdz' ),
				'desc'			=>	__( 'Enable the custom logo', 'cdz' ),
				'id'			=>	'opt_custom_logo',
				'type'			=>	'checkbox',
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_logo' ),
			);

			$options[] = array(
				'name'			=>	__( 'Custom Logo Image', 'cdz' ),
				'id'			=>	'opt_custom_logo_uploader',
				'class'			=>	'hidden',
				'type'			=>	'upload',
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_logo_uploader' ),
			);

			$options[] = array(
				'name'			=>	__( 'Custom Logo Width', 'cdz' ),
				'desc'			=>	__( 'pixels', 'cdz' ),
				'id'			=>	'opt_custom_logo_width',
				'class'			=>	'micro hidden',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_logo_width' ),
			);

			$options[] = array(
				'name'			=>	__( 'Custom Logo Height', 'cdz' ),
				'desc'			=>	__( 'pixels', 'cdz' ),
				'id'			=>	'opt_custom_logo_height',
				'class'			=>	'micro hidden',
				'type'			=>	'text',
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_logo_height' ),
			);

			$options[] = array(
				'name'			=>	__( 'Custom Logo Crop', 'cdz' ),
				'desc'			=>	__( 'Enable the crop feature', 'cdz' ),
				'id'			=>	'opt_custom_logo_crop',
				'class'			=>	'hidden',
				'type'			=>	'checkbox',
				'std'			=>	cdz_get_theme_options_std( 'opt_custom_logo_crop' ),
			);

		}

		return $options;

	}

}