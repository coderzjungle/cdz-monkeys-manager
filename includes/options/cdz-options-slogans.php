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
 *	cdzFunction: Options Slogans
 */

if ( ! function_exists( 'cdz_options_slogans' ) ) {

	function cdz_options_slogans() {
		
		$options = array();

		if ( ! cdz_get_theme_options_std( 'slogans' ) ) { return $options; }

		/*
		 *	Tab title
		 */

		$options[] = array(
			'name'			=> __( 'Slogans', 'cdz' ),
			'type'			=> 'heading',
		);

		/*
		 *	Index template
		 */

		$options[] = array(
			'name'			=>	__( 'General', 'cdz' ),
			'desc'			=>	__( 'Customize your general slogan!', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Slogan Image', 'cdz' ),
			'id'			=>	'opt_slogan_general_img',
			'type'			=>	'upload',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_general_img' ),
		);

		/* *** New feature in next 1.1.0 theme version ***

		$options[] = array(
			'name'			=>	__( 'Slogan', 'cdz' ),
			'id'			=>	'opt_slogan_general_text',
			'class'			=>	'hidden',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_general_text' ),
			// 'std'			=>	'this is my beautiful place',
		);

		$options[] = array(
			'name'			=>	__( 'Sub Slogan', 'cdz' ),
			'id'			=>	'opt_slogan_general_subtext',
			'class'			=>	'hidden',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_general_subtext' ),
			// 'std'			=>	'welcome to my website',
		);

		*/

		/*
		 *	Home
		 */

		$options[] = array(
			'name'			=>	__( 'Home page', 'cdz' ),
			'desc'			=>	__( 'Customize your home page slogan', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_slogan_home',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_home' ),
		);

		$options[] = array(
			'name'			=>	__( 'Slogan Image', 'cdz' ),
			'id'			=>	'opt_slogan_home_img',
			'class'			=>	'hidden',
			'type'			=>	'upload',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_home_img' ),
		);

		/* *** New feature in next 1.1.0 version ***

		$options[] = array(
			'name'			=>	__( 'Slogan', 'cdz' ),
			'id'			=>	'opt_slogan_home_text',
			'class'			=>	'hidden',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_home_text' ),
			// 'std'			=>	'',
		);

		$options[] = array(
			'name'			=>	__( 'Sub Slogan', 'cdz' ),
			'id'			=>	'opt_slogan_home_subtext',
			'class'			=>	'hidden',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_home_subtext' ),
			// 'std'			=>	'',
		);

		*/

		/*
		 *	Blog
		 */

		$options[] = array(
			'name'			=>	__( 'Blog page', 'cdz' ),
			'desc'			=>	__( 'Customize your blog page slogan', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_slogan_blog',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_blog' ),
		);

		$options[] = array(
			'name'			=>	__( 'Slogan Image', 'cdz' ),
			'id'			=>	'opt_slogan_blog_img',
			'class'			=>	'hidden',
			'type'			=>	'upload',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_blog_img' ),
		);

		/* *** New feature in next 1.1.0 version ***

		$options[] = array(
			'name'			=>	__( 'Slogan', 'cdz' ),
			'id'			=>	'opt_slogan_blog_text',
			'class'			=>	'hidden',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_blog_text' ),
			// 'std'			=>	'',
		);

		$options[] = array(
			'name'			=>	__( 'Sub Slogan', 'cdz' ),
			'id'			=>	'opt_slogan_blog_subtext',
			'class'			=>	'hidden',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_blog_subtext' ),
			// 'std'			=>	'',
		);

		*/

		/*
		 *	Search
		 */

		$options[] = array(
			'name'			=>	__( 'Search page', 'cdz' ),
			'desc'			=>	__( 'Customize your search page slogan', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_slogan_search',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_search' ),
		);

		$options[] = array(
			'name'			=>	__( 'Slogan Image', 'cdz' ),
			'id'			=>	'opt_slogan_search_img',
			'class'			=>	'hidden',
			'type'			=>	'upload',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_search_img' ),
		);

		/* *** New feature in next 1.1.0 version ***

		$options[] = array(
			'name'			=>	__( 'Slogan', 'cdz' ),
			'id'			=>	'opt_slogan_search_text',
			'class'			=>	'hidden',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_search_text' ),
			// 'std'			=>	'',
		);

		$options[] = array(
			'name'			=>	__( 'Sub Slogan', 'cdz' ),
			'id'			=>	'opt_slogan_search_subtext',
			'class'			=>	'hidden',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_search_subtext' ),
			// 'std'			=>	'',
		);

		*/

		/*
		 *	404
		 */

		$options[] = array(
			'name'			=>	__( '404 page', 'cdz' ),
			'desc'			=>	__( 'Customize your 404 page slogan', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_slogan_error404',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_error404' ),
		);

		$options[] = array(
			'name'			=>	__( 'Slogan Image', 'cdz' ),
			'id'			=>	'opt_slogan_error404_img',
			'class'			=>	'hidden',
			'type'			=>	'upload',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_error404_img' ),
		);

		/* *** New feature in next 1.1.0 version ***

		$options[] = array(
			'name'			=>	__( 'Slogan', 'cdz' ),
			'id'			=>	'opt_slogan_error404_text',
			'class'			=>	'hidden',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_error404_text' ),
			// 'std'			=>	'',
		);

		$options[] = array(
			'name'			=>	__( 'Sub Slogan', 'cdz' ),
			'id'			=>	'opt_slogan_error404_subtext',
			'class'			=>	'hidden',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_error404_subtext' ),
			// 'std'			=>	'',
		);

		*/

		/*
		 *	Post
		 */

		$options[] = array(
			'name'			=>	__( 'Single post pages', 'cdz' ),
			'desc'			=>	__( 'Customize your single post pages slogan', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_slogan_single',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_single' ),
		);

		$options[] = array(
			'name'			=>	__( 'Slogan Image', 'cdz' ),
			'id'			=>	'opt_slogan_single_img',
			'class'			=>	'hidden',
			'type'			=>	'upload',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_single_img' ),
		);

		/* *** New feature in next 1.1.0 version ***

		$options[] = array(
			'name'			=>	__( 'Slogan', 'cdz' ),
			'id'			=>	'opt_slogan_single_text',
			'class'			=>	'hidden',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_single_text' ),
			// 'std'			=>	'',
		);

		$options[] = array(
			'name'			=>	__( 'Sub Slogan', 'cdz' ),
			'id'			=>	'opt_slogan_single_subtext',
			'class'			=>	'hidden',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_single_subtext' ),
			// 'std'			=>	'',
		);

		*/

		/*
		 *	Page
		 */

		$options[] = array(
			'name'			=>	__( 'Other pages', 'cdz' ),
			'desc'			=>	__( 'Customize your general pages slogan', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_slogan_page',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_page' ),
		);

		$options[] = array(
			'name'			=>	__( 'Slogan Image', 'cdz' ),
			'id'			=>	'opt_slogan_page_img',
			'class'			=>	'hidden',
			'type'			=>	'upload',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_page_img' ),
		);

		/* *** New feature in next 1.1.0 version ***

		$options[] = array(
			'name'			=>	__( 'Slogan', 'cdz' ),
			'id'			=>	'opt_slogan_page_text',
			'class'			=>	'hidden',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_page_text' ),
			// 'std'			=>	'',
		);

		$options[] = array(
			'name'			=>	__( 'Sub Slogan', 'cdz' ),
			'id'			=>	'opt_slogan_page_subtext',
			'class'			=>	'hidden',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_slogan_page_subtext' ),
			// 'std'			=>	'',
		);

		*/

		return $options;
		
	}

}