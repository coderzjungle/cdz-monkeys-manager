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
 *	cdzFunction: Get Template
 */

if ( ! function_exists( 'cdz_get_template' ) ) {

	function cdz_get_template( $template, $file ) {

		if ( file_exists( CDZ_THEME_PATH . '/templates/' . $file ) ) {

			$template = CDZ_THEME_PATH . '/templates/' . $file;

		} else if ( file_exists( CDZ_THEME_PATH . '/theme/templates/' . $file ) ) {

			$template = CDZ_THEME_PATH . '/theme/templates/plugins/' . $file;

		} else if ( file_exists( CDZ_PLUGIN_PATH . '/templates/' . $file ) ) {

			$template = CDZ_PLUGIN_PATH . '/templates/' . $file;

		}
		
		return $template;

	}

}