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
 *	cdzClass: ? (coming soon)
 */

add_filter( 'of_sanitize_text',			'sanitize_text_field' );
add_filter( 'of_sanitize_password',		'sanitize_text_field' );
add_filter( 'of_sanitize_number',		'sanitize_text_field' );
add_filter( 'of_sanitize_textarea',		'of_sanitize_textarea' );
add_filter( 'of_sanitize_select',		'of_sanitize_enum', 10, 2);
add_filter( 'of_sanitize_select_page',	'of_sanitize_page', 10, 2);
add_filter( 'of_sanitize_radio',		'of_sanitize_enum', 10, 2);
add_filter( 'of_sanitize_images',		'of_sanitize_enum', 10, 2);
add_filter( 'of_sanitize_checkbox',		'of_sanitize_checkbox' );
add_filter( 'of_sanitize_multicheck',	'of_sanitize_multicheck', 10, 2 );
add_filter( 'of_sanitize_color',		'of_sanitize_hex' );
add_filter( 'of_sanitize_upload',		'of_sanitize_upload' );
add_filter( 'of_sanitize_editor',		'of_sanitize_editor' );
add_filter( 'of_sanitize_info',			'of_sanitize_allowedposttags' );
add_filter( 'of_sanitize_background',	'of_sanitize_background' );
add_filter( 'of_background_repeat',		'of_sanitize_background_repeat' );
add_filter( 'of_background_position',	'of_sanitize_background_position' );
add_filter( 'of_background_attachment',	'of_sanitize_background_attachment' );
add_filter( 'of_sanitize_typography',	'of_sanitize_typography', 10, 2 );
add_filter( 'of_font_size',				'of_sanitize_font_size' );
add_filter( 'of_font_style',			'of_sanitize_font_style' );
add_filter( 'of_font_face',				'of_sanitize_font_face' );

/*
 * Textarea
 */

function of_sanitize_textarea(  $input) {
	global $allowedposttags;
	$output = wp_kses( $input, $allowedposttags);
	return $output;
}

/*
 * Checkbox
 */

function of_sanitize_checkbox( $input ) {
	if ( $input ) {
		$output = '1';
	} else {
		$output = false;
	}
	return $output;
}

/*
 * Multicheck
 */

function of_sanitize_multicheck( $input, $option ) {
	$output = '';
	if ( is_array( $input ) ) {
		foreach( $option['options'] as $key => $value ) {
			$output[$key] = false;
		}
		foreach( $input as $key => $value ) {
			if ( array_key_exists( $key, $option['options'] ) && $value ) {
				$output[$key] = "1";
			}
		}
	}
	return $output;
}

/*
 * Uploader
 */

function of_sanitize_upload( $input ) {
	$output = '';
	$filetype = wp_check_filetype($input);
	if ( $filetype["ext"] ) {
		$output = $input;
	}
	return $output;
}

/*
 * Editor
 */

function of_sanitize_editor($input) {
	if ( current_user_can( 'unfiltered_html' ) ) {
		$output = $input;
	}
	else {
		global $allowedtags;
		$output = wpautop(wp_kses( $input, $allowedtags));
	}
	return $output;
}

/*
 * Allowed Tags
 */

function of_sanitize_allowedtags( $input ) {
	global $allowedtags;
	$output = wpautop( wp_kses( $input, $allowedtags ) );
	return $output;
}

/*
 * Allowed Post Tags
 */

function of_sanitize_allowedposttags( $input ) {
	global $allowedposttags;
	$output = wpautop(wp_kses( $input, $allowedposttags));
	return $output;
}

/*
 * Check that the key value sent is valid
 */

function of_sanitize_enum( $input, $option ) {
	$output = '';
	if ( array_key_exists( $input, $option['options'] ) ) {
		$output = $input;
	}
	return $output;
}

/*
 * Check that the page is valid
 */

function of_sanitize_page( $input, $option ) {
	
	return $input;
}

/*
 * Background
 */

function of_sanitize_background( $input ) {
	$output = wp_parse_args( $input, array(
		'color' => '',
		'image'  => '',
		'repeat'  => 'repeat',
		'position' => 'top center',
		'attachment' => 'scroll'
	) );

	$output['color'] = apply_filters( 'of_sanitize_hex', $input['color'] );
	$output['image'] = apply_filters( 'of_sanitize_upload', $input['image'] );
	$output['repeat'] = apply_filters( 'of_background_repeat', $input['repeat'] );
	$output['position'] = apply_filters( 'of_background_position', $input['position'] );
	$output['attachment'] = apply_filters( 'of_background_attachment', $input['attachment'] );

	return $output;
}

function of_sanitize_background_repeat( $value ) {
	$recognized = of_recognized_background_repeat();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_background_repeat', current( $recognized ) );
}

function of_sanitize_background_position( $value ) {
	$recognized = of_recognized_background_position();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_background_position', current( $recognized ) );
}

function of_sanitize_background_attachment( $value ) {
	$recognized = of_recognized_background_attachment();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_background_attachment', current( $recognized ) );
}

/*
 * Typography
 */

function of_sanitize_typography( $input, $option ) {

	$output = wp_parse_args( $input, array(
		'size'  => '',
		'face'  => '',
		'style' => '',
		'color' => ''
	) );

	if ( isset( $option['options']['faces'] ) && isset( $input['face'] ) ) {
		if ( !( array_key_exists( $input['face'], $option['options']['faces'] ) ) ) {
			$output['face'] = '';
		}
	}
	else {
		$output['face']  = apply_filters( 'of_font_face', $output['face'] );
	}

	$output['size']  = apply_filters( 'of_font_size', $output['size'] );
	$output['style'] = apply_filters( 'of_font_style', $output['style'] );
	$output['color'] = apply_filters( 'of_sanitize_color', $output['color'] );
	return $output;
}

function of_sanitize_font_size( $value ) {
	$recognized = of_recognized_font_sizes();
	$value_check = preg_replace('/px/','', $value);
	if ( in_array( (int) $value_check, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_font_size', $recognized );
}


function of_sanitize_font_style( $value ) {
	$recognized = of_recognized_font_styles();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_font_style', current( $recognized ) );
}


function of_sanitize_font_face( $value ) {
	$recognized = of_recognized_font_faces();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_font_face', current( $recognized ) );
}

/*
 *	Get recognized background repeat settings
 */

function of_recognized_background_repeat() {

	$default = array(
		'no-repeat' => __( 'No Repeat', 'cdz' ),
		'repeat-x'  => __( 'Repeat Horizontally', 'cdz' ),
		'repeat-y'  => __( 'Repeat Vertically', 'cdz' ),
		'repeat'    => __( 'Repeat All', 'cdz' ),
		);

	return apply_filters( 'of_recognized_background_repeat', $default );

}

/*
 *	Get recognized background positions
 */

function of_recognized_background_position() {

	$default = array(
		'top left'      => __( 'Top Left', 'cdz' ),
		'top center'    => __( 'Top Center', 'cdz' ),
		'top right'     => __( 'Top Right', 'cdz' ),
		'center left'   => __( 'Middle Left', 'cdz' ),
		'center center' => __( 'Middle Center', 'cdz' ),
		'center right'  => __( 'Middle Right', 'cdz' ),
		'bottom left'   => __( 'Bottom Left', 'cdz' ),
		'bottom center' => __( 'Bottom Center', 'cdz' ),
		'bottom right'  => __( 'Bottom Right', 'cdz')
		);

	return apply_filters( 'of_recognized_background_position', $default );

}

/*
 *	Get recognized background attachment
 */

function of_recognized_background_attachment() {

	$default = array(
		'scroll' => __( 'Scroll Normally', 'cdz' ),
		'fixed'  => __( 'Fixed in Place', 'cdz')
		);

	return apply_filters( 'of_recognized_background_attachment', $default );

}

/*
 *	Sanitize a color represented in hexidecimal notation.
 */

function of_sanitize_hex( $hex, $default = '' ) {

	if ( of_validate_hex( $hex ) ) { return $hex; }
	return $default;

}

/*
 *	Get recognized font sizes.
 */

function of_recognized_font_sizes() {

	$sizes = range( 9, 71 );
	$sizes = apply_filters( 'of_recognized_font_sizes', $sizes );
	$sizes = array_map( 'absint', $sizes );

	return $sizes;

}

/*
 *	Get recognized font faces.
 */

function of_recognized_font_faces() {

	$default = array(
		'arial'     => 'Arial',
		'verdana'   => 'Verdana, Geneva',
		'trebuchet' => 'Trebuchet',
		'georgia'   => 'Georgia',
		'times'     => 'Times New Roman',
		'tahoma'    => 'Tahoma, Geneva',
		'palatino'  => 'Palatino',
		'helvetica' => 'Helvetica*'
		);

	return apply_filters( 'of_recognized_font_faces', $default );

}

/*
 *	Get recognized font styles.
 */

function of_recognized_font_styles() {

	$default = array(
		'100'	=> __( 'Extra Thin (100)', 'cdz' ),
		'200'	=> __( 'Thin (200)', 'cdz' ),
		'300'	=> __( 'Lighter (300)', 'cdz' ),
		'400'	=> __( 'Normal (400)', 'cdz' ),
		'500'	=> __( 'Medium (500)', 'cdz' ),
		'600'	=> __( 'Semi Bold (600)', 'cdz' ),
		'700'	=> __( 'Bold (700)', 'cdz' ),
		'800'	=> __( 'Extra Bolder (800)', 'cdz' ),
		'900'	=> __( 'Super Bolder (900)', 'cdz' ),
		);

	return apply_filters( 'of_recognized_font_styles', $default );

}

/*
 *	Is a given string a color formatted in hexidecimal notation?
 */

function of_validate_hex( $hex ) {

	$hex = trim( $hex );

	/*
	 *	Strip recognized prefixes
	 */

	if ( 0 === strpos( $hex, '#' ) ) {

		$hex = substr( $hex, 1 );

	} else if ( 0 === strpos( $hex, '%23' ) ) {

		$hex = substr( $hex, 3 );

	}

	/*
	 *	Regex match
	 */

	if ( 0 === preg_match( '/^[0-9a-fA-F]{6}$/', $hex ) ) {

		return false;

	} else {

		return true;

	}

}