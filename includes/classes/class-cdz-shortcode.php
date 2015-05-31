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
 *	cdzClass: Shortcode
 */

if ( ! class_exists( 'cdz_Shortcode' ) ) {

	class cdz_Shortcode {

		public $name = 'cdz Shortcode';
		public $base = 'cdz_shortcode';
		public $slug = 'cdz-shortcode';
		public $auth = 'CoderzJungle';
		public $desc = 'A simple CoderzJungle shortcode.';

		public $opts = NULL;
		public $extr = NULL;

		public function __construct() {

			$this->opts = $this->get_options();

			add_shortcode( $this->base, array( $this, 'shortcode' ) );

			if ( in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
				add_action( 'plugins_loaded', array( $this, 'vc_map' ) );
			}
			
		}

		public function shortcode ( $atts = NULL, $content = NULL ) {

			if ( is_array( $this->opts ) && ! empty( $this->opts ) ) {

				foreach ( $this->opts as $key => $value) {

					$pname = $value['param_name'];
					$value = $value['value'];

					$extr[ $pname ] = ( is_array( $value ) && ! empty( $value ) ) ? array_shift( $value ) : $value;

				}

				extract( shortcode_atts( $extr, $atts) );

			}

			ob_start();

			include CDZ_PLUGIN_PATH . '/templates/shortcodes/' . $this->slug . '.php';

			return ob_get_clean();
			
		}

		public function get_options() { return array(); }

		public function vc_map() {

			$shortcode = array (
				'base'	=> $this->base,
				'name'	=> $this->name,
				'class'	=>	'',
				'icon'	=> 'cdz-vc-element-icon',
				'category' => __( 'CoderzJungle', 'cdz' ),
				'description' => $this->desc,
				'params' => $this->opts,
			);

			vc_map( $shortcode );

		}

	}

}

// $cdz_shortcodes['cdz_shortcode'] = new cdz_Shortcode();