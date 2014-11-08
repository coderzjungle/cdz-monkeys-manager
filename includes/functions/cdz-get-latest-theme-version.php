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
 *	cdzFunction: Get Latest Theme Version
 */

if ( ! function_exists( 'cdz_get_latest_theme_version' ) ) {

	function cdz_get_latest_theme_version() {

		$remote_url = 'http://demo.coderzjungle.com/wp-content/themes/' . CDZ_THEME_SLUG . '/cdz-theme/info.php?xml=1';
		$remote_get = wp_remote_get( $remote_url );
		$version = wp_remote_retrieve_body( $remote_get );

		$pattern = '/<latest ?.*>(.*)<\/latest>/';
		preg_match( $pattern, $version, $matches );
		
		$version = isset( $matches[1] ) ? $matches[1] : CDZ_THEME_VERSION;

		if ( version_compare( $version, '0.0.0', '>' ) ) {

			return $version;

		} else {

			return '0.0.0';

		}

	}

}