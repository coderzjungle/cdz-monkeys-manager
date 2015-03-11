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
 *	cdzClass: Theme Options Plugin
 */

if ( ! class_exists( 'cdz_Theme_Options_Plugin' ) ) {

	class cdz_Theme_Options_Plugin {

		/*
		 *	cdzFunction: Construct
		 */

		public function __construct() {

			add_filter( 'cdz_get_options_array', array( $this, 'options_array' ) );

		}

		function options_array() {

			$options = array();

			$options = array_merge( $options, cdz_options_general() );
			$options = array_merge( $options, cdz_options_header() );
			$options = array_merge( $options, cdz_options_navigation() );
			$options = array_merge( $options, cdz_options_navigation_top() );
			$options = array_merge( $options, cdz_options_sliders() );
			$options = array_merge( $options, cdz_options_slogans() );
			$options = array_merge( $options, cdz_options_sidebars() );
			$options = array_merge( $options, cdz_options_widgets() );
			$options = array_merge( $options, cdz_options_blog() );
			$options = array_merge( $options, cdz_options_content() );
			$options = array_merge( $options, cdz_options_error404() );
			$options = array_merge( $options, cdz_options_footer() );

			return $options;

		}

	}

}