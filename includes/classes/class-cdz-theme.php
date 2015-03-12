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

			add_filter( 'body_class', array( $this, 'cdz_body_monkeys_manager' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'cdz_enqueue_scripts' ) );
			add_filter( 'template_include', array( $this, 'cdz_include_template_files' ) );
			add_action( 'after_setup_theme', array( $this, 'cdz_load_theme_textdomain' ) );

			add_action( 'cdz_prepost_content', 'cdz_prepost_content', 10, 2 );

			/*
			 *	Print instant loader scripts
			 */

			add_action( 'wp_footer', 'cdz_instant_loader_scripts', 99 );

		}

		/*
		 *	cdzFunction: Monkeys Manager Body class
		 */

		function cdz_body_monkeys_manager( $classes ) {

			$classes[] = 'cdz-monkeys-manager';
			return $classes;
			
		}

		/*
		 *	cdzFunction: Enqueue Scripts
		 */

		function cdz_enqueue_scripts() {

			/*
			 *	Style
			 */

			if ( file_exists( CDZ_THEME_PATH . '/assets/css/cdz-templates.css' ) ) {

				echo '<link rel="stylesheet" id="cdz-templates-css" href="' . CDZ_THEME_URL . '/assets/css/cdz-templates.css" type="text/css" media="all">
		';
			} else {

				echo '<link rel="stylesheet" id="cdz-templates-css" href="' . CDZ_PLUGIN_URL . '/assets/css/cdz-templates.css" type="text/css" media="all">';

			}
			
			echo '<link rel="stylesheet" id="cdz-wp-stats-css" href="' . CDZ_PLUGIN_URL . '/assets/css/cdz-wp-stats.css" type="text/css" media="all">
';

			/*
			 *	Scripts
			 */

			// no scripts

		}

		/*
		 *	cdzFunction: Include Template Files
		 */

		function cdz_include_template_files( $template ) {

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

		function cdz_load_theme_textdomain() {

			load_theme_textdomain( 'cdz', CDZ_THEME_PATH . '/languages' );

		}

	}

}