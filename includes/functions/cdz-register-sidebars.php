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
 *	cdzFunction: Register Sidebars
 */

if ( ! function_exists( 'cdz_register_sidebars' ) ) {

	function cdz_register_sidebars( $sidebars ) {

		if ( isset( $sidebars ) ) {

			foreach ( $sidebars as $value ) {

				register_sidebar( array(
					'name'			=> __( $value['name'], 'cdz' ),
					'description'	=> ( isset( $value['desc'] ) ? __( $value['desc'], 'cdz' ) : '' ),
					'id'			=> $value['slug'],
					'class'			=> 'sidebar',
					'before_title'	=> '<h3>',
					'after_title'	=> '</h3>',
					'before_widget' => '<div class="widget">',
					'after_widget'  => '</div>',
				));
				
			}

		}

	}

}