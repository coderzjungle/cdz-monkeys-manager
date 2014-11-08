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
 *	cdzFunction: Get Slogans
 */

if ( ! function_exists( 'cdz_get_slogans' ) ) {

	function cdz_get_slogans( $template = '' ) {


		if ( cdz_get_option( 'opt_slogan' ) ) {

			$img = cdz_get_option( 'opt_slogan_img' );
			$text = cdz_get_option( 'opt_slogan_text' );
			$subtext = cdz_get_option( 'opt_slogan_subtext' );

		} else if ( cdz_get_option( 'opt_slogan_' . $template ) ) {

			$img = cdz_get_option( 'opt_slogan_' . $template .'_img' );
			$text = cdz_get_option( 'opt_slogan_' . $template .'_text' );
			$subtext = cdz_get_option( 'opt_slogan_' . $template .'_subtext' );

		} else {

			$img = cdz_get_option( 'opt_slogan_general_img' );
			$text = cdz_get_option( 'opt_slogan_general_text' );
			$subtext = cdz_get_option( 'opt_slogan_general_subtext' );

		}

		return array( 'img' => $img, 'text' => $text, 'subtext' => $subtext );

	}

}