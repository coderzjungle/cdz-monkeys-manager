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
 *	cdzClass: Theme Options
 */

if ( ! class_exists( 'cdz_Theme_Options' ) ) {

	class cdz_Theme_Options {

		var $obj_theme_options_admin = NULL;
		var $obj_theme_options_panel = NULL;
		var $obj_theme_options_plugin = NULL;
		var $obj_theme_options_sanitizer = NULL;

		/*
		 *	cdzFunction: Construct
		 */

		public function __construct() {

			if ( current_user_can( 'edit_theme_options' ) ) {

				/*
				 *	Theme Options Std
				 */

				if ( file_exists( CDZ_THEME_PATH . '/theme/options.php' ) ) { require_once CDZ_THEME_PATH . '/theme/options.php'; }

				/*
				 *	Load Admin
				 */

				if ( is_admin() ) {

					$this->obj_theme_options_admin = new cdz_Theme_Options_Admin;
					// $this->obj_theme_options_sanitizer = new cdz_Theme_Options_Sanitizer;

					if ( isset( $_GET['page'] ) && $_GET['page'] == 'cdz-theme-options' ) {
						$this->obj_theme_options_panel = new cdz_Theme_Options_Panel;
					}

				}

				if ( defined( 'CDZ_THEME' ) && CDZ_THEME ) {

					$this->obj_theme_options_plugin = new cdz_Theme_Options_Plugin;

				}

				add_action( 'admin_init', array( $this, 'set_theme_option' ) );

				/*
				 *	Google Fonts
				 */

				add_filter( 'of_recognized_font_faces', 'cdz_get_google_fonts' );

			}
			
		}

		/*
		 *	cdzFunction: Set Theme Options
		 */

		function set_theme_option() {

			$theme_options_settings = get_option( 'optionsframework' );
			$default_themename = 'optionsframework_' . preg_replace( "/\W/", "_", strtolower( get_option( 'stylesheet' ) ) );

			if ( ! isset( $theme_options_settings['id'] ) || $theme_options_settings['id'] != $default_themename  ) {

				$theme_options_settings['id'] = $default_themename;
				update_option( 'optionsframework', $theme_options_settings );

			}

		}

		static function get_options_array( $options = null ) {
			
			return apply_filters( 'cdz_get_options_array', array() );

		}

		static function get_all_options_array( $options = null ) {

			$options = apply_filters( 'cdz_get_mm_options_array', array() );
			$options = array_merge( $options, apply_filters( 'cdz_get_wcmv_options_array', array() ) );

			return $options;

		}

		/*
		 *	cdzFunction: Get Option
		 */

		static function get_option( $name, $default = false ) {

			$config = get_option( 'optionsframework' );

			if ( isset( $config['id'] ) ) { 

				$options = get_option( $config['id'] );

				if ( isset( $options[$name] ) ) {

					return $options[$name];

				}

			}

			return $default;

		}

	}

}

function cdz_theme_options_init() {

	if ( ( defined( 'CDZ_PLUGIN' ) && CDZ_PLUGIN ) || defined( 'CDZ_THEME' ) && CDZ_THEME ) {

		$cdz_theme_options = new cdz_Theme_Options();

	}

}

add_action( 'init', 'cdz_theme_options_init', 20 );