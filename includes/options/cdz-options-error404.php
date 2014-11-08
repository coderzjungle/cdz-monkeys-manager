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
 *	cdzFunction: Options Error404
 */

if ( ! function_exists( 'cdz_options_error404' ) ) {

	function cdz_options_error404() {
		
		$options = array();

		if ( ! cdz_get_theme_options_std( 'error404' ) ) { return $options; }

		$wp_editor_settings = array(
			'wpautop'			=>	true, // Default
			'textarea_rows'		=>	15,
			'tinymce'			=>	array( 'plugins' => 'wordpress' ),
		);

		/*
		 *	Tab title
		 */

		$options[] = array(
			'name'			=>	__( '404 page', 'cdz' ),
			'type'			=>	'heading',
		);

		/*
		 *	Copyright Options
		 */

		$options[] = array(
			'name'			=>	__( '404 page', 'cdz' ),
			'desc'			=>	__( 'Customize the 404 page content', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Page content', 'cdz' ),
			'desc'			=>	__( 'You will see this text when server gives a 404 error', 'cdz' ),
			'id'			=>	'opt_error404_text',
			'type'			=>	'editor',
			'settings'		=>	$wp_editor_settings,
			'std'			=>	cdz_get_theme_options_std( 'opt_error404_text' ),
		);

		return $options;
	}

}