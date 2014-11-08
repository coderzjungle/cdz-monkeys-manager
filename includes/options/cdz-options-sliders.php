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
 *	cdzFunction: Options Sliders
 */

if ( ! function_exists( 'cdz_options_sliders' ) ) {

	function cdz_options_sliders() {
		
		$options = array();

		if ( ! cdz_get_theme_options_std( 'sliders' ) ) { return $options; }

		/*
		 *	RevSlider
		 */

		$revlink = '';
		$revslider_list = array( '0' => '- Not installed -' );

		if ( class_exists( 'RevSlider' ) ) {

			$revslider = new RevSlider();
			$revslider_list = array_merge( $revslider_list, (array) $revslider->getArrSlidersShort() );
			$revlink = '<a href="' . admin_url( 'admin.php?page=revslider' ) . '">' . __( 'Configure', 'cdz' ) . '</a>';

		} else {

			$revlink = '<a href="' . admin_url( 'themes.php?page=install-required-plugins' ) . '">' . __( 'Install', 'cdz' ) . '</a>';
		}


		/*
		 *	Tab title
		 */

		$options[] = array(
			'name'			=>	__( 'Sliders', 'cdz' ),
			'type'			=>	'heading',
		);

		/*
		 *	Index template
		 */

		$options[] = array(
			'name'			=>	__( 'General', 'cdz' ),
			'desc'			=>	__( 'Customize your general slider!', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Slider', 'cdz' ),
			'id'			=>	'opt_slider_general_type',
			'type'			=>	'select',
			'options'		=>	array(
									'none'			=>	'- None -',
									'fiximage'		=>	'Fixed Image',
									'revslider'		=>	'Revolution Slider (Plugin)',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_general_type' ),
		);

		$options[] = array(
			'name'			=>	__( 'Fixed Image', 'cdz' ),
			'id'			=>	'opt_slider_general_fiximage_url',
			'class'			=>	'hidden',
			'type'			=>	'upload',
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_general_fiximage_url' ),
		);

		$options[] = array(
			'name'			=>	__( 'Revolution Slider', 'cdz' ),
			'desc'			=>	$revlink,
			'id'			=>	'opt_slider_general_revslider_id',
			'class'			=>	'hidden',
			'type'			=>	'select',
			'options'		=>	$revslider_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_general_revslider_id' ),
		);

		/*
		 *	Home
		 */

		$options[] = array(
			'name'			=>	__( 'Home page', 'cdz' ),
			'desc'			=>	__( 'Customize your home page slider', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_slider_home',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_home' ),
		);

		$options[] = array(
			'name'			=>	__( 'Slider', 'cdz' ),
			'id'			=>	'opt_slider_home_type',
			'class'			=>	'hidden',
			'type'			=>	'select',
			'options'		=>	array(
									'none'			=>	'- None -',
									'fiximage'		=>	'Fixed Image',
									'revslider'		=>	'Revolution Slider (Plugin)',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_home_type' ),
		);

		$options[] = array(
			'name'			=>	__( 'Fixed Image', 'cdz' ),
			'id'			=>	'opt_slider_home_fiximage_url',
			'class'			=>	'hidden',
			'type'			=>	'upload',
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_home_fiximage_url' ),
		);

		$options[] = array(
			'name'			=>	__( 'Revolution Slider', 'cdz' ),
			'desc'			=>	$revlink,
			'id'			=>	'opt_slider_home_revslider_id',
			'class'			=>	'hidden',
			'type'			=>	'select',
			'options'		=>	$revslider_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_home_revslider_id' ),
		);

		/*
		 *	Blog
		 */

		$options[] = array(
			'name'			=>	__( 'Blog page', 'cdz' ),
			'desc'			=>	__( 'Customize your blog page slider', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_slider_blog',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_blog' ),
		);

		$options[] = array(
			'name'			=>	__( 'Slider', 'cdz' ),
			'id'			=>	'opt_slider_blog_type',
			'class'			=>	'hidden',
			'type'			=>	'select',
			'options'		=>	array(
									'none'			=>	'- None -',
									'fiximage'		=>	'Fixed Image',
									'revslider'		=>	'Revolution Slider (Plugin)',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_blog_type' ),
		);

		$options[] = array(
			'name'			=>	__( 'Fixed Image', 'cdz' ),
			'id'			=>	'opt_slider_blog_fiximage_url',
			'class'			=>	'hidden',
			'type'			=>	'upload',
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_blog_fiximage_url' ),
		);

		$options[] = array(
			'name'			=>	__( 'Revolution Slider', 'cdz' ),
			'desc'			=>	$revlink,
			'id'			=>	'opt_slider_blog_revslider_id',
			'class'			=>	'hidden',
			'type'			=>	'select',
			'options'		=>	$revslider_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_blog_revslider_id' ),
		);

		/*
		 *	Search page
		 */

		$options[] = array(
			'name'			=>	__( 'Search page', 'cdz' ),
			'desc'			=>	__( 'Customize your search page slider', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_slider_search',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_search' ),
		);

		$options[] = array(
			'name'			=>	__( 'Slider', 'cdz' ),
			'id'			=>	'opt_slider_search_type',
			'class'			=>	'hidden',
			'type'			=>	'select',
			'options'		=>	array(
									'none'			=>	'- None -',
									'fiximage'		=>	'Fixed Image',
									'revslider'		=>	'Revolution Slider (Plugin)',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_search_type' ),
		);

		$options[] = array(
			'name'			=>	__( 'Fixed Image', 'cdz' ),
			'id'			=>	'opt_slider_search_fiximage_url',
			'class'			=>	'hidden',
			'type'			=>	'upload',
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_search_fiximage_url' ),
		);

		$options[] = array(
			'name'			=>	__( 'Revolution Slider', 'cdz' ),
			'desc'			=>	$revlink,
			'id'			=>	'opt_slider_search_revslider_id',
			'class'			=>	'hidden',
			'type'			=>	'select',
			'options'		=>	$revslider_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_search_revslider_id' ),
		);

		/*
		 *	404 page
		 */

		$options[] = array(
			'name'			=>	__( '404 page', 'cdz' ),
			'desc'			=>	__( 'Customize your 404 page slider', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_slider_error404',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_error404' ),
		);

		$options[] = array(
			'name'			=>	__( 'Slider', 'cdz' ),
			'id'			=>	'opt_slider_error404_type',
			'class'			=>	'hidden',
			'type'			=>	'select',
			'options'		=>	array(
									'none'			=>	'- None -',
									'fiximage'		=>	'Fixed Image',
									'revslider'		=>	'Revolution Slider (Plugin)',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_error404_type' ),
		);

		$options[] = array(
			'name'			=>	__( 'Fixed Image', 'cdz' ),
			'id'			=>	'opt_slider_error404_fiximage_url',
			'class'			=>	'hidden',
			'type'			=>	'upload',
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_error404_fiximage_url' ),
		);

		$options[] = array(
			'name'			=>	__( 'Revolution Slider', 'cdz' ),
			'desc'			=>	$revlink,
			'id'			=>	'opt_slider_error404_revslider_id',
			'class'			=>	'hidden',
			'type'			=>	'select',
			'options'		=>	$revslider_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_error404_revslider_id' ),
		);

		/*
		 *	Single post page
		 */

		$options[] = array(
			'name'			=>	__( 'Single post page', 'cdz' ),
			'desc'			=>	__( 'Customize your single post pages slider', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_slider_single',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_single' ),
		);

		$options[] = array(
			'name'			=>	__( 'Slider', 'cdz' ),
			'id'			=>	'opt_slider_single_type',
			'class'			=>	'hidden',
			'type'			=>	'select',
			'options'		=>	array(
									'none'			=>	'- None -',
									'fiximage'		=>	'Fixed Image',
									'revslider'		=>	'Revolution Slider (Plugin)',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_single_type' ),
		);

		$options[] = array(
			'name'			=>	__( 'Fixed Image', 'cdz' ),
			'id'			=>	'opt_slider_single_fiximage_url',
			'class'			=>	'hidden',
			'type'			=>	'upload',
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_single_fiximage_url' ),
		);

		$options[] = array(
			'name'			=>	__( 'Revolution Slider', 'cdz' ),
			'desc'			=>	$revlink,
			'id'			=>	'opt_slider_single_revslider_id',
			'class'			=>	'hidden',
			'type'			=>	'select',
			'options'		=>	$revslider_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_single_revslider_id' ),
		);

		/*
		 *	Shop page
		 */

		$options[] = array(
			'name'			=>	__( 'Shop page', 'cdz' ),
			'desc'			=>	__('Plugins supported', 'cdz') . ': <a href="https://wordpress.org/plugins/woocommerce/" target="_blank">' . __( 'Woocommerce', 'cdz' ) . '</a>',
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_slider_shop',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_shop' ),
		);

		$options[] = array(
			'name'			=>	__( 'Slider', 'cdz' ),
			'id'			=>	'opt_slider_shop_type',
			'class'			=>	'hidden',
			'type'			=>	'select',
			'options'		=>	array(
									'none'			=>	'- None -',
									'fiximage'		=>	'Fixed Image',
									'revslider'		=>	'Revolution Slider (Plugin)',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_shop_type' ),
		);

		$options[] = array(
			'name'			=>	__( 'Fixed Image', 'cdz' ),
			'id'			=>	'opt_slider_shop_fiximage_url',
			'class'			=>	'hidden',
			'type'			=>	'upload',
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_shop_fiximage_url' ),
		);

		$options[] = array(
			'name'			=>	__( 'Revolution Slider', 'cdz' ),
			'desc'			=>	$revlink,
			'id'			=>	'opt_slider_shop_revslider_id',
			'class'			=>	'hidden',
			'type'			=>	'select',
			'options'		=>	$revslider_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_shop_revslider_id' ),
		);

		/*
		 *	Single product page
		 */

		$options[] = array(
			'name'			=>	__( 'Single product page', 'cdz' ),
			'desc'			=>	__('Plugins supported', 'cdz') . ': <a href="https://wordpress.org/plugins/woocommerce/" target="_blank">' . __( 'Woocommerce', 'cdz' ) . '</a>',
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_slider_product',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_product' ),
		);

		$options[] = array(
			'name'			=>	__( 'Slider', 'cdz' ),
			'id'			=>	'opt_slider_product_type',
			'class'			=>	'hidden',
			'type'			=>	'select',
			'options'		=>	array(
									'none'			=>	'- None -',
									'fiximage'		=>	'Fixed Image',
									'revslider'		=>	'Revolution Slider (Plugin)',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_product_type' ),
		);

		$options[] = array(
			'name'			=>	__( 'Fixed Image', 'cdz' ),
			'id'			=>	'opt_slider_product_fiximage_url',
			'class'			=>	'hidden',
			'type'			=>	'upload',
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_product_fiximage_url' ),
		);

		$options[] = array(
			'name'			=>	__( 'Revolution Slider', 'cdz' ),
			'desc'			=>	$revlink,
			'id'			=>	'opt_slider_product_revslider_id',
			'class'			=>	'hidden',
			'type'			=>	'select',
			'options'		=>	$revslider_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_product_revslider_id' ),
		);

		/*
		 *	Page
		 */

		$options[] = array(
			'name'			=>	__( 'Other pages', 'cdz' ),
			'desc'			=>	__( 'Customize your general pages slider', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_slider_page',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_page' ),
		);

		$options[] = array(
			'name'			=>	__( 'Slider', 'cdz' ),
			'id'			=>	'opt_slider_page_type',
			'class'			=>	'hidden',
			'type'			=>	'select',
			'options'		=>	array(
									'none'			=>	'- None -',
									'fiximage'		=>	'Fixed Image',
									'revslider'		=>	'Revolution Slider (Plugin)',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_page_type' ),
		);

		$options[] = array(
			'name'			=>	__( 'Fixed Image', 'cdz' ),
			'id'			=>	'opt_slider_page_fiximage_url',
			'class'			=>	'hidden',
			'type'			=>	'upload',
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_page_fiximage_url' ),
		);

		$options[] = array(
			'name'			=>	__( 'Revolution Slider', 'cdz' ),
			'desc'			=>	$revlink,
			'id'			=>	'opt_slider_page_revslider_id',
			'class'			=>	'hidden',
			'type'			=>	'select',
			'options'		=>	$revslider_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_slider_page_revslider_id' ),
		);

		return $options;
		
	}

}