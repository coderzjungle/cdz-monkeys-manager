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
 *	cdzFunction: Load Scripts
 */

if ( ! function_exists( 'cdz_instant_loader_scripts' ) ) {

	function cdz_instant_loader_scripts() {

		$plugindir = plugins_url() . '/' . dirname( plugin_basename( __FILE__ ) );

		if ( ! is_admin() ) {

			$js = "	jQuery('.cdz_il a').live( 'click', function() {

						var permalink = jQuery(this).attr('href');

						if( window.history.pushState ) {

							window.history.pushState( '', '', permalink );

						}

						jQuery('#primary').html('<div class=\"cdz_instant_loading\"><i class=\"fa fa-circle-o-notch fa-spin\"></i></div>').load( '$plugindir/../../load.php?cdz_permalink=' + permalink + '&t=default&cdz_instant_loader=1', function() {

							jQuery(this).fadeIn();

						} );

						return false;
					});

					";


			echo '<script type="text/javascript">' . $js . '</script>';
			
		}

	}

}