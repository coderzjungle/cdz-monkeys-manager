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

if ( ! class_exists( 'cdz_Admin' ) ) {

	class cdz_Admin {

		/*
		 *	cdzFunction: Construct
		 */

		public function __construct() {

			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );

		}

		/*
		 *	cdzFunction: Enqueue Scripts
		 */

		function enqueue_scripts() {

			/*
			 *	Style
			 */

			wp_enqueue_style( 'cdz_admin', CDZ_PLUGIN_URL . '/assets/css/cdz-admin.css' );
			wp_enqueue_style( 'cdz_wp_stats_style', CDZ_PLUGIN_URL . '/assets/css/cdz-wp-stats.css' );

			/*
			 *	Scripts
			 */

		}

		/*
		 *	cdzFunction: Load Plugin Textdomain
		 */

		function load_plugin_textdomain() {

			load_plugin_textdomain( 'cdz', false, CDZ_PLUGIN_PATH . '/languages' );

		}

	}

}