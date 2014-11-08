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
 *	cdzFunction: Get Option
 */

if ( ! function_exists( 'cdz_minify' ) ) {

	function cdz_minify( $type, $code ) {

		if ( $type == 'css' ) {

			$code = preg_replace( '#\s+#', ' ', $code );
			$code = preg_replace( '#/\*.*?\*/#s', '', $code );
			$code = str_replace( ' ;', ';', $code );
			$code = str_replace( '; ', ';', $code );
			$code = str_replace( ' :', ':', $code );
			$code = str_replace( ': ', ':', $code );
			$code = str_replace( ' {', '{', $code );
			$code = str_replace( '{ ', '{', $code );
			$code = str_replace( ' ,', ',', $code );
			$code = str_replace( ', ', ',', $code );
			$code = str_replace( ' }', '}', $code );
			$code = str_replace( '} ', '}', $code );
			$code = str_replace( ';}', '}', $code );

		} else if ( $type == 'js' ) {

			// js Minify

		}
		
		return trim( $code );

	}

}