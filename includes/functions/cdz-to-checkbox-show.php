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
 *	cdzFunction: (Theme Options) Checkbox Show
 */

if ( ! function_exists( 'cdz_to_checkbox_show' ) ) {

	function cdz_to_checkbox_show( $array ) {

		$js = '';

		foreach ( $array as $key => $array2 ) {

			$fade_strings = '';
			$show_strings = '';

			foreach ( $array2 as $value ) {

				if ( strpos( $value, 'advo' ) ) {

					$fade_strings .= "jQuery( '$value' ).fadeToggle( 400 );";
					$show_strings .= "jQuery( '$value' ).show();";

				} else {

					$fade_strings .= "jQuery( '#section-opt_$value' ).fadeToggle( 400 );";
					$show_strings .= "jQuery( '#section-opt_$value' ).show();";

				}				

			}

			$js .= "jQuery( '#opt_$key' ).click( function() { $fade_strings });";
			$js .= "if ( jQuery('#opt_$key:checked' ).val() !== undefined ) { $show_strings }";

		}

		//return cdz_min_js( $js );
		return $js;

	}

}