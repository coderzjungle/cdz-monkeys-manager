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

/*

STANDARD SIDEBARS:

Top Sidebar|top-sidebar|Widgets in this area will be shown on the top page.||Left Sidebar|lef-sidebar|Widgets in this area will be shown on the left-hand side.||Right Sidebar|right-sidebar|Widgets in this area will be shown on the right-hand side.||Footer Sidebar|footer-sidebar|Widgets in this area will be shown on the footer.||
x=Top+Sidebar&y=top-sidebar&x=Left+Sidebar&y=lef-sidebar&x=Right+Sidebar&y=right-sidebar&x=Footer+Sidebar&y=footer-sidebar&x=Custom+sidebar&y=custom-sidebar
x=Top+Sidebar&amp;y=top-sidebar&amp;x=Left+Sidebar&amp;y=lef-sidebar&amp;x=Right+Sidebar&amp;y=right-sidebar&amp;x=Footer+Sidebar&amp;y=footer-sidebar&amp;x=Custom+sidebar&amp;y=custom-sidebar

*/