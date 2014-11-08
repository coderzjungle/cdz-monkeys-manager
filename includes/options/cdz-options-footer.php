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
 *	cdzFunction: Options Footer
 */

if ( ! function_exists( 'cdz_options_footer' ) ) {

	function cdz_options_footer() {
		
		$options = array();

		if ( ! cdz_get_theme_options_std( 'footer' ) ) { return $options; }

		$wp_editor_settings = array(
			'wpautop'			=>	true, // Default
			'textarea_rows'		=>	10,
			'tinymce'			=>	array( 'plugins' => 'wordpress' ),
		);

		/*
		 *	Tab title
		 */

		$options[] = array(
			'name'			=>	__( 'Footer', 'cdz' ),
			'type'			=>	'heading',
		);

		/*
		 *	Footer Options
		 */

		$options[] = array(
			'name'			=>	__( 'Footer', 'cdz' ),
			'desc'			=>	__( 'Customize your Footer configuration!', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Enable Footer sidebar', 'cdz' ),
			'desc'			=>	__( 'Show the Footer section', 'cdz' ),
			'id'			=>	'opt_footer',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_footer' ),
		);

		$options[] = array(
			'name'			=>	__( 'Footer columns', 'cdz' ),
			'desc'			=>	__( 'widgets columns', 'cdz' ),
			'id'			=>	'opt_footer_widgets_cols',
			'class'			=>	'micro hidden',
			'type'			=>	'select',
			'options'		=>	array(
									'1' => '1',
									'2' => '2',
									'3' => '3',
									'4' => '4',
									'5' => '5',
									'6' => '6',
									'7' => '7',
									'8' => '8',
									'9' => '9',
									'10' => '10',
									'11' => '11',
									'12' => '12',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_footer_widgets_cols' ),
		);

		/*
		 *	Copyright Options
		 */

		$options[] = array(
			'name'			=>	__( 'Copyright', 'cdz' ),
			'desc'			=>	__( 'Customize your Copyright configuration!', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Enable Copyright', 'cdz' ),
			'desc'			=>	__( 'Show the Copyright section', 'cdz' ),
			'id'			=>	'opt_copyright',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_copyright' ),
		);

		$options[] = array(
			'name'			=>	__( 'Copyright Layout', 'cdz' ),
			'id'			=>	'opt_copyright_layout',
			'class'			=>	'hidden',
			'type'			=>	'radio',
			'options'		=>	array(
									'type_1' => __( 'Type 1 - Left and Right text', 'cdz' ),
									'type_2' => __( 'Type 2 - Centered text', 'cdz' ),
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_copyright_layout' ),
		);

		$options[] = array(
			'name'			=>	__( 'Left Text', 'cdz' ),
			'desc'			=>	__( '(or "Top text" in "centered" copyright layout)', 'cdz' ),
			'id'			=>	'opt_copyright_left_text',
			'class'			=>	'hidden',
			'type'			=>	'editor',
			'settings'		=>	$wp_editor_settings,
			'std'			=>	cdz_get_theme_options_std( 'opt_copyright_left_text' ),
		);

		$options[] = array(
			'name'			=>	__( 'Right Text', 'cdz' ),
			'desc'			=>	__( '(or "Bottom text" in "centered" copyright layout)', 'cdz' ),
			'id'			=>	'opt_copyright_right_text',
			'class'			=>	'hidden',
			'type'			=>	'editor',
			'settings'		=>	$wp_editor_settings,
			'std'			=>	cdz_get_theme_options_std( 'opt_copyright_right_text' ),
		);

		return $options;
	}

}