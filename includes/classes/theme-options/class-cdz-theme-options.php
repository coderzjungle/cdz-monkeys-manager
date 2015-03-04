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
		var $obj_theme_options_sanitizer = NULL;

		/*
		 *	cdzFunction: Construct
		 */

		public function __construct() {

			if ( current_user_can( 'edit_theme_options' ) && CDZ_THEME ) {

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

				add_action( 'admin_init', array( $this, 'set_theme_option' ) );
				add_action( 'wp_before_admin_bar_render', array( $this, 'admin_bar' ) );

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

			global $cdz_monkeys_manager;

			$options = array();

			/*
			 *	Theme options
			 */

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

			/*
			 *	Plugins options
			 */

			// $options = array_merge( $options, cdz_options_plugins_mp() );
			// $options = array_merge( $options, cdz_options_plugins_lt() );

			/*
			 *	Return array
			 */

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

		/*
		 *	cdzFunction: Menu Settings
		 */

		static function menu_settings() {

			$menu = array(
				'page_title' => __( 'Coderz Jungle', 'cdz' ),
				'menu_title' => __( 'Theme Options', 'cdz' ),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'cdz-theme-options',
			);

			return apply_filters( 'cdz_theme_options_menu_settings', $menu );

		}

		/*
		 *	cdzFunction: Admin Bar
		 */

		function admin_bar() {

			global $wp_admin_bar;

			$menu = self::menu_settings();

			$args = array(
				//'parent' => 'appearance',
				'id' => 'cdz-theme-options',
				'title' => __( 'Theme Options', 'cdz' ),
				'href' => admin_url( 'admin.php?page=' . $menu['menu_slug'] )
			);

			$wp_admin_bar->add_menu( $args );
			
		}

	}

}

add_action( 'init', 'cdz_theme_options_init', 20 );

function cdz_theme_options_init() {

	if ( CDZ_THEME ) { $cdz_theme_options = new cdz_Theme_Options(); }

}