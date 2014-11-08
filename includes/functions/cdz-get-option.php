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

if ( ! function_exists( 'cdz_get_option' ) ) {

	function cdz_get_option( $name, $default = false ) {

		global $post;

		if ( isset( $post ) AND get_post_meta( $post->ID, $name, true ) ) {

			return get_post_meta( $post->ID, $name, true );

		} else {

			$option = cdz_Theme_Options::get_option( $name, $default );	

			$_SESSION['cdz_options'][] = $name;

			if ( isset( $option['face'] )
				 && ! empty( $option['face'] )
				 && ( ! isset( $_SESSION['cdz_fonts'][$option['face']] )
				 || $_SESSION['cdz_fonts'][$option['face']] != $option['style'] )
			) {

				$_SESSION['cdz_fonts'][$option['face']] = $option['style'];

			}

			return $option;

		}
		
	}

}