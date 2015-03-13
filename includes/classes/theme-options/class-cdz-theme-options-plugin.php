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

			if ( isset( $_GET['page'] ) && $_GET['page'] == 'cdz-theme-options' || isset( $_POST['page'] ) && $_POST['page'] == 'cdz-theme-options' ) {
				add_filter( 'cdz_get_options_array', array( $this, 'options_array' ) );
			}

			add_action( 'wp_before_admin_bar_render', array( $this, 'admin_bar' ) );
			add_action( 'admin_menu', array( $this, 'add_menu_pages' ), 1000 );
			add_action( 'admin_menu', array( $this, 'add_menu_separator' ), 100 );

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
		 *	cdzFunction: Theme Options Array
		 */

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

		/*
		 *	cdzFunction: Add Menu Pages
		 */

		function add_menu_pages() {

			$menu = self::menu_settings();

			// $this->options_screen = apply_filters( 'of_options_screen', add_theme_page( $menu['page_title'], $menu['menu_title'], $menu['capability'], $menu['menu_slug'], array( $this, 'options_page' ) ) );
			
			/*
			 *	cdz Admin Main Page
			 */

			$this->options_screen = add_menu_page( $menu['page_title'], $menu['menu_title'], $menu['capability'], $menu['menu_slug'], 'cdz_theme_options_page', 'dashicons-editor-code', 31 );

			/*
			 *	cdz Admin Sub Pages
			 */

			// add_submenu_page( 'cdz-theme-options', __( 'Theme Options', 'cdz' ), __( 'Theme Options', 'cdz' ), 'edit_theme_options', 'cdz-theme-options', array( $this, 'options_page' ) );
			// add_submenu_page( 'cdz-theme-options', __( 'Theme Plugins', 'cdz' ), __( 'Theme Plugins', 'cdz' ), 'manage_options', 'install-required-plugins', array( $this, 'cdz_plugins' ) );
			// add_submenu_page( 'cdz-theme-options', __( 'Documentation', 'cdz' ), __( 'Documentation', 'cdz' ), 'manage_options', 'cdz_documentation', array( $this, 'cdz_documentation' ) );
			
		}

		/*
		 *	cdzFunction: Add Menu Separators
		 */

		function add_menu_separator() {

			global $menu;
			$menu[30] = array( '', 'read', 'cdz-separator', '', 'wp-menu-separator cdz-separator' );

		}

	}

}