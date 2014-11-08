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
 *	cdzFunction: Get Google Fonts
 */

if ( ! function_exists( 'cdz_get_google_fonts_url' ) ) {

	function cdz_get_google_fonts_url() {

		$fonts = array();

		foreach ( $_SESSION['cdz_fonts'] as $key => $value) {

			if ( isset( $fonts[$key] ) && ! empty( $fonts[$key] ) ) { $fonts[$key] .= ',' . $value . ',' . $value . 'italic'; }
			else { $fonts[$key] = $value . ',' . $value . 'italic'; }

		}

		$families = '';

		foreach ( $fonts as $key => $value) { $families .= $key . ':cdz,' . $value . '|'; }

		return $families;

	}
	
}