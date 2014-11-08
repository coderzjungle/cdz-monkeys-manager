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
 *	cdzFunction: Get Sidebars
 */

if ( ! function_exists( 'cdz_get_sidebars' ) ) {

	function cdz_get_sidebars( $template = '' ) {
		
		if ( cdz_get_option( 'opt_sidebar_left' ) || cdz_get_option( 'opt_sidebar_right' ) ) {

			$left_sidebar = cdz_get_option( 'opt_sidebar_left' );
			$right_sidebar = cdz_get_option( 'opt_sidebar_right' );
			$left_sidebar_columns = cdz_get_option( 'opt_sidebar_left' ) != 'none' ? ( cdz_get_option( 'opt_sidebar_left_cols' ) ? cdz_get_option( 'opt_sidebar_left_cols' ) : 3 ) : 0 ;
			$right_sidebar_columns = cdz_get_option( 'opt_sidebar_right' ) != 'none' ? ( cdz_get_option( 'opt_sidebar_right_cols' ) ? cdz_get_option( 'opt_sidebar_right_cols' ) : 3 ) : 0 ;
			$content_columns = 12 - $left_sidebar_columns - $right_sidebar_columns;

		} else if ( cdz_get_option( 'opt_sidebar_' . $template ) ) {

			$left_sidebar = cdz_get_option( 'opt_sidebar_' . $template .'_left' );
			$right_sidebar = cdz_get_option( 'opt_sidebar_' . $template .'_right' );
			$left_sidebar_columns = cdz_get_option( 'opt_sidebar_' . $template .'_left' ) != 'none' ? cdz_get_option( 'opt_sidebar_' . $template .'_left_cols' ) : 0 ;
			$right_sidebar_columns = cdz_get_option( 'opt_sidebar_' . $template .'_right' ) != 'none' ? cdz_get_option( 'opt_sidebar_' . $template .'_right_cols' ) : 0 ;
			$content_columns = 12 - $left_sidebar_columns - $right_sidebar_columns;

		} else {

			$left_sidebar = cdz_get_option( 'opt_sidebar_general_left' );
			$right_sidebar = cdz_get_option( 'opt_sidebar_general_right' );
			$left_sidebar_columns = cdz_get_option( 'opt_sidebar_general_left' ) != 'none' ? cdz_get_option( 'opt_sidebar_general_left_cols' ) : 0 ;
			$right_sidebar_columns = cdz_get_option( 'opt_sidebar_general_right' ) != 'none' ? cdz_get_option( 'opt_sidebar_general_right_cols' ) : 0 ;
			$content_columns = 12 - $left_sidebar_columns - $right_sidebar_columns;

		}

		$sidebars = array(
				'cols'			=>	(int) $left_sidebar_columns + $right_sidebar_columns,
				'left'			=>	$left_sidebar,
				'left_cols'		=>	(int) $left_sidebar_columns,
				'right'			=>	$right_sidebar,
				'right_cols'	=>	(int) $right_sidebar_columns,
				'content_cols'	=>	(int) $content_columns,
			);

		return $sidebars;

	}

}