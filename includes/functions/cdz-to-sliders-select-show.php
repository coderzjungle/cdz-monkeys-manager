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
 *	cdzFunction: (Theme Options) Sliders Select Show
 */

if ( ! function_exists( 'cdz_to_sliders_select_show' ) ) {

	function cdz_to_sliders_select_show( $array ) {

		$js = '';
		
		foreach ( $array as $key ) {

			$js .= "function cdz_to_slider_" . $key . "_show_hide() {

						var slider = jQuery('#opt_slider_" . $key . "_type').val();

						var fiximage	= jQuery('#section-opt_slider_" . $key . "_fiximage_url');
						var revslider	= jQuery('#section-opt_slider_" . $key . "_revslider_id');

						fiximage.hide();
						revslider.hide();

						if ( '#opt_slider_" . $key . "' == '#opt_slider_general' || jQuery('#opt_slider_" . $key . "').is(':checked') ) {

							if ( slider == 'fiximage' ) { fiximage.fadeIn(); }
							else if ( slider == 'revslider' ) { revslider.fadeIn(); }

						}

					}";

			$js .= "cdz_to_slider_" . $key . "_show_hide();";
			$js .= "jQuery('#opt_slider_" . $key . "').change( cdz_to_slider_" . $key . "_show_hide );";
			$js .= "jQuery('#opt_slider_" . $key . "_type').change( cdz_to_slider_" . $key . "_show_hide );";

		}

		//return cdz_min_js( $js );
		return $js;

	}

}