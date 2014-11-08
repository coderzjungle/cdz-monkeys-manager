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
 *	cdzShortcode: Hello
 */

if ( ! class_exists( 'cdz_Hello' ) ) {

	class cdz_Hello {

		public function __construct() {

			add_shortcode( 'cdz_hello', array( $this, 'shortcode' ) );
			
		}

		public function shortcode( $atts = NULL, $content = NULL ) {

			extract( shortcode_atts( array(

				'class'	=> 'cdz-hello-class',
				'type'	=> 'default',

			), $atts) );

			return '<span class="cdz-hello cdz-hello-' . $type . ' ' . $class . '"> Hello ' . $content . '!</span>';
			
		}

	}

}

$cdz_shortcodes['cdz_hello'] = new cdz_Hello();