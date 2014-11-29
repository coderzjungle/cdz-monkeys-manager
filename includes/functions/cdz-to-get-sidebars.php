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
 *	cdzFunction: (Theme Options) Get Sidebars
 */

if ( ! function_exists( 'cdz_to_get_sidebars' ) ) {

	function cdz_to_get_sidebars( $option ) {

		$sidebars = cdz_get_option( $option );
		//$array_rows = explode( '||', $sidebars );
		$array_rows = explode( '&amp;x=', $sidebars );
		$sidebars = NULL;

		foreach ( $array_rows as $row ) {

			if ( ! empty( $row) ) {

				$row = str_replace( 'x=', '', $row );
				$row = str_replace( '+', ' ', $row );

				//$array_cols = explode( '|', $row );
				$array_cols = explode( '&amp;y=', $row );

				$sidebars[] = array(
					'name' => $array_cols[0],
					'slug' => sanitize_title( $array_cols[0]),
				);
			}

		}

		return $sidebars;

	}

}