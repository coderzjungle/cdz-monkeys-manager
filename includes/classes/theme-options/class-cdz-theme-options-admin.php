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
 *	cdzClass: Theme Options Admin
 */

if ( ! class_exists( 'cdz_Theme_Options_Admin' ) ) {

	class cdz_Theme_Options_Admin {

		protected $options_screen = null;

		/*
		 *	cdzFunction: Construct
		 */

		public function __construct() {

			add_action( 'admin_init', array( $this, 'settings_init' ) );
			add_action( 'admin_menu', array( $this, 'add_menu_pages' ) );
			add_action( 'admin_menu', array( $this, 'add_menu_separator' ), 100 );

			/*
			 *	Theme Options scripts and styles
			 */

			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_action( 'admin_head', 'cdz_theme_options_scripts', 999 );

			/*
			 *	Theme Options Header
			 */

			add_action( 'cdz_theme_options_header', 'cdz_theme_options_header' );

		}

		/*
		 *	cdzFunction: Enqueue Scripts
		 */

		function enqueue_scripts() {

			/*
			 *	Style
			 */

			wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', array(), '4.1.0' );
			wp_enqueue_style( 'cdz_theme_options_style', CDZ_PLUGIN_URL . '/assets/css/cdz-theme-options-style.css' );
			wp_enqueue_style( 'wp-color-picker' );

			/*
			 *	Scripts
			 */

			wp_enqueue_script( 'cdz-theme-options', CDZ_PLUGIN_URL . '/assets/js/cdz-theme-options.js', array( 'jquery','wp-color-picker' ) );
			wp_enqueue_script( 'cdz-theme-options-media-uploader', CDZ_PLUGIN_URL .'/assets/js/cdz-theme-options-media-uploader.js', array( 'jquery' ) );
			wp_localize_script( 'cdz-theme-options-media-uploader', 'optionsframework_l10n', array( 'upload' => __( 'Upload', 'textdomain' ), 'remove' => __( 'Remove', 'textdomain' ) ) );
			if ( function_exists( 'wp_enqueue_media' ) ) { wp_enqueue_media(); }

		}

		/*
		 *	cdzFunction: Settings Init
		 */

		function settings_init() {

			$cdz_theme_options_settings = get_option( 'optionsframework' );
			register_setting( 'optionsframework', $cdz_theme_options_settings['id'],  array ( $this, 'validate_options' ) );
			add_action( 'theme_options_after_validate', array( $this, 'save_options_notice' ) );

		}

		/*
		 *	cdzFunction: Save Options Notice
		 */

		function save_options_notice() {

			add_settings_error( 'options-framework', 'save_options', __( 'Options saved.', 'cdz' ), 'updated fade' );

		}

		/*
		 *	cdzFunction: Validate Options
		 */

		function validate_options( $input ) {

			/*
			 *	Restore Defaults.
			 */

			if ( isset( $_POST['reset'] ) ) {
				add_settings_error( 'options-framework', 'restore_defaults', __( 'Default options restored.', 'cdz' ), 'updated fade' );
				return $this->get_default_values();
			}

			/*
			 *	Update Settings
			 */

			$clean = array();
			$options = cdz_Theme_Options::get_options_array();

			foreach ( $options as $option ) {

				if ( ! isset( $option['id'] ) ) { continue; }

				if ( ! isset( $option['type'] ) ) { continue; }

				$id = preg_replace( '/[^a-zA-Z0-9._\-]/', '', strtolower( $option['id'] ) );

				/*
				 *	Set checkbox to false if it wasn't sent in the $_POST
				 */

				if ( 'checkbox' == $option['type'] && ! isset( $input[$id] ) ) { $input[$id] = false; }

				/*
				 *	Set each item in the multicheck to false if it wasn't sent in the $_POST
				 */

				if ( 'multicheck' == $option['type'] && ! isset( $input[$id] ) ) {
					foreach ( $option['options'] as $key => $value ) {
						$input[$id][$key] = false;
					}
				}

				/*
				 *	For a value to be submitted to database it must pass through a sanitization filter
				 */

				if ( has_filter( 'of_sanitize_' . $option['type'] ) ) {
					$clean[$id] = apply_filters( 'of_sanitize_' . $option['type'], $input[$id], $option );
				}

			}

			/*
			 *	After validation Hook
			 */

			do_action( 'theme_options_after_validate', $clean );

			return $clean;

		}

		/*
		 *	cdzFunction: Get Default Values
		 */

		function get_default_values() {

			$output = array();
			$config = cdz_Theme_Options::get_options_array();

			foreach ( (array) $config as $option ) {

				if ( ! isset( $option['id'] ) ) { continue; }
				if ( ! isset( $option['std'] ) ) { continue; }
				if ( ! isset( $option['type'] ) ) { continue; }

				if ( has_filter( 'of_sanitize_' . $option['type'] ) ) {
					$output[$option['id']] = apply_filters( 'of_sanitize_' . $option['type'], $option['std'], $option );
				}
			}

			return $output;

		}

		/*
		 *	cdzFunction: Add Menu Pages
		 */

		function add_menu_pages() {

			$menu = cdz_Theme_Options::menu_settings();

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

		function add_menu_separator() {

			global $menu;
			$menu[30] = array( '', 'read', 'cdz-separator', '', 'wp-menu-separator cdz-separator' );

		}



		/*function cdz_documentation() {
			do_action( 'cdz_theme_options_header' );

			//wp_enqueue_script( 'options-custom', CDZ_THEME_OPTIONS_PATH . '/js/options-custom.js', array( 'jquery','wp-color-picker' ), Options_Framework::VERSION );

			?>

			<div id="optionsframework-wrap" class="wrap cdz-doc">

				<h2 class="nav-tab-wrapper"></h2>

				<div id="optionsframework-metabox" class="metabox-holder">
					<div id="optionsframework" class="postbox">

						<h2 class="page_title"><?php echo __( 'Documentation', 'cdz' ); ?></h2>

						<div id="doc-start" class="group general"></div>
						<div id="doc-download" class="group general"></div>
						<div id="doc-installation" class="group general"></div>
						<div id="doc-update" class="group general"></div>
						<div id="doc-changelog" class="group general"></div>

					</div>
				</div>
				
			</div>

			<script>

				// Menu

				jQuery('.cdz-doc .nav-tab-wrapper').load('<?php echo get_template_directory_uri() . CDZ_THEME_FOLDER; ?>/doc/parts/menu.html');

				// Pages

				jQuery('#doc-start').load('<?php echo get_template_directory_uri() . CDZ_THEME_FOLDER; ?>/doc/parts/start.html');
				jQuery('#doc-download').load('<?php echo get_template_directory_uri() . CDZ_THEME_FOLDER; ?>/doc/parts/download.html');
				jQuery('#doc-installation').load('<?php echo get_template_directory_uri() . CDZ_THEME_FOLDER; ?>/doc/parts/installation.html');
				jQuery('#doc-update').load('<?php echo get_template_directory_uri() . CDZ_THEME_FOLDER; ?>/doc/parts/update.html');

				jQuery('#doc-changelog').load('<?php echo get_template_directory_uri() . CDZ_THEME_FOLDER; ?>/changelog.txt', function() {
					var before = '<h3>Theme Changelog</h3><p>';
					var after = '</p>';
					jQuery(this).html( before + jQuery(this).html().replace( /\n/g, '<br />') + after );
				});

				

			</script>

		<?php
		}*/

	}

}