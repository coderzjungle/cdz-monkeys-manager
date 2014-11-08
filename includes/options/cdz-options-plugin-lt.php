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

function cdz_options_plugins_lt() {
	
	$options = array();

	/*
	 *	Sliders init
	 */

	$revlink = '';
	$revslider_list = array( '0' => '- Not installed -' );

	if ( class_exists( 'RevSlider' ) ) {

		$revslider = new RevSlider();
		$revslider_list = array_merge( $revslider_list, (array) $revslider->getArrSlidersShort() );
		$revlink = '<a href="' . admin_url( 'admin.php?page=revslider' ) . '">' . __('Configure', 'cdz') . '</a>';

	} else {

		$revlink = '<a href="' . admin_url( 'themes.php?page=install-required-plugins' ) . '">' . __('Install', 'cdz') . '</a>';
	}

	/*
	 *	Sidebars init
	 */

	$sidebars_list = cdz_to_get_sidebars_list();

	/*
	 *	Tab title
	 */

	$options[] = array(
		'name'			=>	__('Lovely Testimonials', 'cdz'),
		'type'			=>	'heading',
	);

	/*
	 *	Slider
	 */

	$options[] = array(
		'name'			=>	__('Slider', 'cdz'),
		'desc'			=>	__('Customize your home page slider', 'cdz'),
		'type'			=>	'info',
	);

	$options[] = array(
		'name'			=>	__('Enable settings', 'cdz'),
		'desc'			=>	__('These options will override the general settings', 'cdz'),
		'id'			=>	'opt_slider_plugin_lt',
		'type'			=>	'checkbox',
		'std'			=>	'0',
	);

	$options[] = array(
		'name'			=>	__('Slider', 'cdz'),
		'id'			=>	'opt_slider_plugin_lt_type',
		'class'			=>	'hidden',
		'type'			=>	'select',
		'std'			=>	'none',
		'options'		=>	array(
								'none'			=>	'- None -',
								'fiximage'		=>	'Fixed Image',
								'revslider'		=>	'Revolution Slider (Plugin)',
							),
	);

	$options[] = array(
		'name'			=>	__('Fixed Image', 'cdz'),
		'id'			=>	'opt_slider_plugin_lt_fiximage_url',
		'class'			=>	'hidden',
		'type'			=>	'upload',
	);

	$options[] = array(
		'name'			=>	__('Revolution Slider', 'cdz'),
		'desc'			=>	$revlink,
		'id'			=>	'opt_slider_plugin_lt_revslider_id',
		'class'			=>	'hidden',
		'type'			=>	'select',
		'options'		=>	$revslider_list,
	);

	/*
	 *	Slogan
	 */

	$options[] = array(
		'name'			=>	__('Slogan', 'cdz'),
		'desc'			=>	__('Customize your blog page slogan', 'cdz'),
		'type'			=>	'info',
	);

	$options[] = array(
		'name'			=>	__('Enable settings', 'cdz'),
		'desc'			=>	__('These options will override the general settings', 'cdz'),
		'id'			=>	'opt_slogan_plugin_lt',
		'type'			=>	'checkbox',
		'std'			=>	'0',
	);

	$options[] = array(
		'name'			=>	__('Slogan Image', 'cdz'),
		'id'			=>	'opt_slogan_plugin_lt_img',
		'class'			=>	'hidden',
		'type'			=>	'upload',
	);

	/* *** New feature in next 1.1.0 theme version ***

	$options[] = array(
		'name'			=>	__('Slogan', 'cdz'),
		'id'			=>	'opt_slogan_plugin_lt_text',
		'class'			=>	'hidden',
		'type'			=>	'text',
		'std'			=>	'',
	);

	$options[] = array(
		'name'			=>	__('Sub Slogan', 'cdz'),
		'id'			=>	'opt_slogan_plugin_lt_subtext',
		'class'			=>	'hidden',
		'type'			=>	'text',
		'std'			=>	'',
	);

	*/

	/*
	 *	Sidebars
	 */

	$options[] = array(
		'name'			=>	__('Sidebars', 'cdz'),
		'desc'			=>	__('Customize your blog page sidebars', 'cdz'),
		'type'			=>	'info',
	);

	$options[] = array(
		'name'			=>	__('Enable settings', 'cdz'),
		'desc'			=>	__('These options will override the general settings', 'cdz'),
		'id'			=>	'opt_sidebar_plugin_lt',
		'type'			=>	'checkbox',
		'std'			=>	'0',
	);

	$options[] = array(
		'name'			=>	__('Left sidebar', 'cdz'),
		'id'			=>	'opt_sidebar_plugin_lt_left',
		'class'			=>	'hide',
		'type'			=>	'select',
		'std'			=>	'',
		'options'		=>	$sidebars_list,
	);

	$options[] = array(
		'name'			=>	__('Left sidebar width', 'cdz'),
		'desc'			=>	__('grid columns', 'cdz'),
		'id'			=>	'opt_sidebar_plugin_lt_left_cols',
		'class'			=>	'micro hide',
		'type'			=>	'select',
		'std'			=>	'3',
		'options'		=>	array(
								'1'		=>	'1',
								'2'		=>	'2',
								'3'		=>	'3',
								'4'		=>	'4',
								'5'		=>	'5',
							),
	);

	$options[] = array(
		'name'			=>	__('Right sidebar', 'cdz'),
		'id'			=>	'opt_sidebar_plugin_lt_right',
		'class'			=>	'hide',
		'type'			=>	'select',
		'std'			=>	'',
		'options'		=>	$sidebars_list,
	);

	$options[] = array(
		'name'			=>	__('Right sidebar Width', 'cdz'),
		'desc'			=>	__('grid columns', 'cdz'),
		'id'			=>	'opt_sidebar_plugin_lt_right_cols',
		'class'			=>	'micro hide',
		'type'			=>	'select',
		'std'			=>	'3',
		'options'		=>	array(
								'1'		=>	'1',
								'2'		=>	'2',
								'3'		=>	'3',
								'4'		=>	'4',
								'5'		=>	'5',
							),
	);

	return $options;
}