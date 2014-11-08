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
 *	cdzFunction: Get Slider
 */

if ( ! function_exists( 'cdz_get_slider' ) ) {

	function cdz_get_slider( $template = '' ) {
		
		if ( cdz_get_option( 'opt_slider' ) ) {

			$slider = cdz_get_option( 'opt_slider_type' );

			if ( $slider == 'fiximage') {

				$slider = '<div class="fiximage"><img src="' . cdz_get_option( 'opt_slider_fiximage_url' ) . '" /></div>';

			} elseif ( $slider == 'revslider') {

				$revslider = new RevSlider();
				$revslider->initByID( cdz_get_option( 'opt_slider_revslider_id' ) );
				$slider = do_shortcode( $revslider->getShortcode() );
                
			}

		} else if ( cdz_get_option( 'opt_slider_' . $template ) ) {

			$slider = cdz_get_option( 'opt_slider_' . $template . '_type' );

			if ( $slider == 'fiximage') {

				$slider = '<div class="fiximage"><img src="' . cdz_get_option( 'opt_slider_' . $template . '_fiximage_url' ) . '" /></div>';

			} elseif ( $slider == 'revslider') {

				$revslider = new RevSlider();
				$revslider->initByID( cdz_get_option( 'opt_slider_' . $template . '_revslider_id' ) );
				$slider = do_shortcode( $revslider->getShortcode() );
                
			}

		} else {

			$slider = cdz_get_option( 'opt_slider_general_type' );

			if ( $slider == 'fiximage') {

				$slider = '<div class="fiximage"><img src="' . cdz_get_option( 'opt_slider_general_fiximage_url' ) . '" /></div>';

			} elseif ( $slider == 'revslider' && class_exists( 'RevSlider' ) ) {

				$revslider = new RevSlider();
				$revslider->initByID( cdz_get_option( 'opt_slider_general_revslider_id' ) );
				$slider = do_shortcode( $revslider->getShortcode() );
				
			}

		}

		return $slider;

	}

}