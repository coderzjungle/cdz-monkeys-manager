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
 *	cdzClass: Main
 */

if ( ! class_exists( 'cdz_Monkeys_Manager' ) ) {

	class cdz_Monkeys_Manager {

		var $obj_cpts = NULL;
		var $obj_admin = NULL;
		var $obj_theme = NULL;

		/*
		 *	cdzFunction: Construct
		 */

		public function __construct() {

			/*
			 *	Session reset
			 */

			$_SESSION['cdz_fonts'] = array();
			$_SESSION['cdz_options'] = array();

			/*
			 *	Load Files
			 */

			$this->load();

			/*
			 *	Enqueue Scripts
			 */

			add_action( 'admin_enqueue_scripts', array( $this, 'cdz_enqueue_scripts' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'cdz_enqueue_scripts' ) );

			/*
			 *	Objects
			 */

			$this->obj_cpts = new cdz_Cpts();
			if ( is_admin() ) { $this->obj_admin = new cdz_Admin(); }
			else { $this->obj_theme = new cdz_Theme(); }

			/*
			 *	Register Sidebars
			 */

			cdz_register_sidebars( cdz_to_get_sidebars( 'opt_sidebar_custom' ) );

			/*
			 *	Update Notifier
			 */

			if ( defined( 'CDZ_THEME' ) && CDZ_THEME ) { $this->update_notifier(); }

			/*
			 *	Woocommerce Hooks
			 */

			if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
				require_once CDZ_PLUGIN_PATH . '/includes/third/woocommerce.php';
			}

		}

		/*
		 *	cdzFunction: Load
		 */

		function load() {

			foreach ( glob( CDZ_PLUGIN_PATH . '/includes/*/*.php' ) as $filename ) { require_once $filename; }
			foreach ( glob( CDZ_PLUGIN_PATH . '/includes/*/*/*.php' ) as $filename ) { require_once $filename; }

			/*
			 *	Load theme info
			 */

			if ( file_exists( CDZ_THEME_PATH . '/theme/info.php' ) ) {

				require_once CDZ_THEME_PATH . '/theme/info.php';

			} else {

				define( 'CDZ_THEME', FALSE );

			}

		}

		/*
		 *	cdzFunction: Enqueue Scripts
		 */

		function cdz_enqueue_scripts() {

			/*
			 *	Style
			 */

			wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), '4.3.0' );
			wp_enqueue_style( 'cdz_style', CDZ_PLUGIN_URL . '/assets/css/cdz-style.css' );
			wp_enqueue_style( 'cdz_wp_stats_style', CDZ_PLUGIN_URL . '/assets/css/cdz-wp-stats.css' );

			/*
			 *	Scripts
			 */

			// no scripts

		}

		/*
		 *	cdzFunction: Update Notifier
		 */

		function update_notifier() {
			
			$theme_version = CDZ_THEME_VERSION;
			$latest_version = cdz_get_latest_theme_version();

			if( version_compare( $latest_version, $theme_version, '>' ) ) {

				add_action( 'admin_menu', array( $this, 'update_notifier_menu' ) );
				add_action( 'admin_bar_menu', array( $this, 'update_notifier_bar_menu' ), 1000 );

			}

		}

		/*
		 *	cdzFunction: Update Notifier Menu
		 */

		function update_notifier_menu() {

			$notifier_page_slug = 'cdz-update-notifier';

			add_dashboard_page(
				CDZ_THEME_NAME . ' Theme Updates',
				CDZ_THEME_NAME . ' <span class="update-plugins count-1" style="margin-top: 0px;"><span class="update-count">1</span></span>',
				'administrator',
				$notifier_page_slug,
				'cdz_admin_update_notifier_page'
			);

		}

		/*
		 *	cdzFunction: Update Notifier Bar Menu
		 */

		function update_notifier_bar_menu() {

			global $wp_admin_bar, $wpdb;

			if ( !is_super_admin() || !is_admin_bar_showing() ) { return; }

			$notifier_page_slug = 'cdz-update-notifier';

			$args = array(
				'id' => 'update_notifier',
				'title' => '<span>' . CDZ_THEME_NAME . ' <span id="ab-updates">1 ' . __( 'Update', 'cdz' ) . '</span></span>',
				'href' => get_admin_url() . 'index.php?page=' . $notifier_page_slug
			);

			$wp_admin_bar->add_menu( $args );

		}

	}

}

$cdz_monkeys_manager = new cdz_Monkeys_Manager();