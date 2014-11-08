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
 *	cdzClass: Admin
 */

if ( ! class_exists( 'cdz_Theme' ) ) {

	class cdz_Theme {

		/*
		 *	cdzFunction: Construct
		 */

		public function __construct() {

			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_filter( 'template_include', array( $this, 'include_template_files' ) );
			add_action( 'after_setup_theme', array( $this, 'load_theme_textdomain' ) );

			add_action( 'cdz_prepost_content', 'cdz_prepost_content', 10, 2 );

		}

		/*
		 *	cdzFunction: Enqueue Scripts
		 */

		function enqueue_scripts() {

			/*
			 *	Style
			 */

			wp_enqueue_style( 'cdz_style', CDZ_PLUGIN_URL . '/assets/css/cdz-style.css' );
			wp_enqueue_style( 'cdz-wp-stats-style', CDZ_PLUGIN_URL . '/assets/css/cdz-wp-stats-style.css' );

			/*
			 *	Scripts
			 */

		}

		/*
		 *	cdzFunction: Include Template Files
		 */

		function include_template_files( $template ) {

			if ( is_single() ) {

				return cdz_get_template( $template, 'cdz-monkeys-manager', cdz_function_to_slug( get_post_type() ) . '-single.php' );
				
			} else if ( is_archive() ) {

				return cdz_get_template( $template, 'cdz-monkeys-manager', cdz_function_to_slug( get_post_type() ) . '-archive.php' );

			}

			return $template;

		}

		/*
		 *	cdzFunction: Load Theme Textdomain
		 */

		function load_theme_textdomain() {

			load_theme_textdomain( 'cdz', CDZ_THEME_PATH . '/languages' );

		}

	}

}