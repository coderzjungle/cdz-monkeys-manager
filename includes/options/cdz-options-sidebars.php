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
 *	cdzFunction: Options Sidebars
 */

if ( ! function_exists( 'cdz_options_sidebars' ) ) {

	function cdz_options_sidebars() {
		
		$options = array();

		if ( ! cdz_get_theme_options_std( 'sidebars' ) ) { return $options; }

		$sidebars_list = cdz_to_get_sidebars_list();

		/*
		 *	Tab title
		 */

		$options[] = array(
			'name'			=>	__( 'Sidebars', 'cdz' ),
			'type'			=>	'heading',
		);

		/*
		 *	Custom Sidebars
		 */

		$options[] = array(
			'name'			=>	__( 'Custom Sidebars', 'cdz' ),
			'desc'			=>	__( 'Manage all your custom sidebars', 'cdz' ),
			'type'			=>	'info',
		);
		$options[] = array(
			'name'			=>	__( 'Custom sidebars', 'cdz' ),
			'id'			=>	'opt_sidebar_custom',
			'type'			=>	'textarea',
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_custom' ),
		);

		/*
		 *	General
		 */

		$options[] = array(
			'name'			=>	__( 'General', 'cdz' ),
			'desc'			=>	__( 'Customize your general configuration', 'cdz' ),
			'type'			=>	'info',
		);
		$options[] = array(
			'name'			=>	__( 'Header sidebar', 'cdz' ),
			'id'			=>	'opt_sidebar_general_header',
			'type'			=>	'select',
			'options'		=>	$sidebars_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_general_header' ),
		);
		$options[] = array(
			'name'			=>	__( 'Footer sidebar', 'cdz' ),
			'id'			=>	'opt_sidebar_general_footer',
			'type'			=>	'select',
			'options'		=>	$sidebars_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_general_footer' ),
		);
		$options[] = array(
			'name'			=>	__( 'Left sidebar', 'cdz' ),
			'id'			=>	'opt_sidebar_general_left',
			'type'			=>	'select',
			'options'		=>	$sidebars_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_general_left' ),
		);
		$options[] = array(
			'name'			=>	__( 'Left sidebar width', 'cdz' ),
			'desc'			=>	__( 'grid columns', 'cdz' ),
			'id'			=>	'opt_sidebar_general_left_cols',
			'class'			=>	'micro',
			'type'			=>	'select',
			'options'		=>	array(
									'1'		=>	'1',
									'2'		=>	'2',
									'3'		=>	'3',
									'4'		=>	'4',
									'5'		=>	'5',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_general_left_cols' ),
		);
		$options[] = array(
			'name'			=>	__( 'Right sidebar', 'cdz' ),
			'id'			=>	'opt_sidebar_general_right',
			'type'			=>	'select',
			'options'		=>	$sidebars_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_general_right' ),
		);
		$options[] = array(
			'name'			=>	__( 'Right sidebar width', 'cdz' ),
			'desc'			=>	__( 'grid columns', 'cdz' ),
			'id'			=>	'opt_sidebar_general_right_cols',
			'class'			=>	'micro',
			'type'			=>	'select',
			'options'		=>	array(
									'1'		=>	'1',
									'2'		=>	'2',
									'3'		=>	'3',
									'4'		=>	'4',
									'5'		=>	'5',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_general_right_cols' ),
		);

		/*
		 *	Home page
		 */

		$options[] = array(
			'name'			=>	__( 'Home page', 'cdz' ),
			'desc'			=>	__( 'Customize your home page sidebars', 'cdz' ),
			'type'			=>	'info',
		);
		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_sidebar_home',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_home' ),
		);
		$options[] = array(
			'name'			=>	__( 'Left sidebar', 'cdz' ),
			'id'			=>	'opt_sidebar_home_left',
			'class'			=>	'hide',
			'type'			=>	'select',
			'options'		=>	$sidebars_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_home_left' ),
		);
		$options[] = array(
			'name'			=>	__( 'Left sidebar width', 'cdz' ),
			'desc'			=>	__( 'grid columns', 'cdz' ),
			'id'			=>	'opt_sidebar_home_left_cols',
			'class'			=>	'micro hide',
			'type'			=>	'select',
			'options'		=>	array(
									'1'		=>	'1',
									'2'		=>	'2',
									'3'		=>	'3',
									'4'		=>	'4',
									'5'		=>	'5',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_home_left_cols' ),
		);
		$options[] = array(
			'name'			=>	__( 'Right sidebar', 'cdz' ),
			'id'			=>	'opt_sidebar_home_right',
			'class'			=>	'hide',
			'type'			=>	'select',
			'options'		=>	$sidebars_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_home_right' ),
		);
		$options[] = array(
			'name'			=>	__( 'Right sidebar Width', 'cdz' ),
			'desc'			=>	__( 'grid columns', 'cdz' ),
			'id'			=>	'opt_sidebar_home_right_cols',
			'class'			=>	'micro hide',
			'type'			=>	'select',
			'options'		=>	array(
									'1'		=>	'1',
									'2'		=>	'2',
									'3'		=>	'3',
									'4'		=>	'4',
									'5'		=>	'5',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_home_right_cols' ),
		);

		/*
		 *	Blog page
		 */

		$options[] = array(
			'name'			=>	__( 'Blog page', 'cdz' ),
			'desc'			=>	__( 'Customize your blog page sidebars', 'cdz' ),
			'type'			=>	'info',
		);
		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_sidebar_blog',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_blog' ),
		);
		$options[] = array(
			'name'			=>	__( 'Left sidebar', 'cdz' ),
			'id'			=>	'opt_sidebar_blog_left',
			'class'			=>	'hide',
			'type'			=>	'select',
			'options'		=>	$sidebars_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_blog_left' ),
		);
		$options[] = array(
			'name'			=>	__( 'Left sidebar width', 'cdz' ),
			'desc'			=>	__( 'grid columns', 'cdz' ),
			'id'			=>	'opt_sidebar_blog_left_cols',
			'class'			=>	'micro hide',
			'type'			=>	'select',
			'options'		=>	array(
									'1'		=>	'1',
									'2'		=>	'2',
									'3'		=>	'3',
									'4'		=>	'4',
									'5'		=>	'5',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_blog_left_cols' ),
		);
		$options[] = array(
			'name'			=>	__( 'Right sidebar', 'cdz' ),
			'id'			=>	'opt_sidebar_blog_right',
			'class'			=>	'hide',
			'type'			=>	'select',
			'options'		=>	$sidebars_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_blog_right' ),
		);
		$options[] = array(
			'name'			=>	__( 'Right sidebar Width', 'cdz' ),
			'desc'			=>	__( 'grid columns', 'cdz' ),
			'id'			=>	'opt_sidebar_blog_right_cols',
			'class'			=>	'micro hide',
			'type'			=>	'select',
			'options'		=>	array(
									'1'		=>	'1',
									'2'		=>	'2',
									'3'		=>	'3',
									'4'		=>	'4',
									'5'		=>	'5',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_blog_right_cols' ),
		);

		/*
		 *	Search page
		 */

		$options[] = array(
			'name'			=>	__( 'Search page', 'cdz' ),
			'desc'			=>	__( 'Customize your search page sidebars', 'cdz' ),
			'type'			=>	'info',
		);
		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_sidebar_search',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_search' ),
		);
		$options[] = array(
			'name'			=>	__( 'Left sidebar', 'cdz' ),
			'id'			=>	'opt_sidebar_search_left',
			'class'			=>	'hide',
			'type'			=>	'select',
			'options'		=>	$sidebars_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_search_left' ),
		);
		$options[] = array(
			'name'			=>	__( 'Left sidebar width', 'cdz' ),
			'desc'			=>	__( 'grid columns', 'cdz' ),
			'id'			=>	'opt_sidebar_search_left_cols',
			'class'			=>	'micro hide',
			'type'			=>	'select',
			'options'		=>	array(
									'1'		=>	'1',
									'2'		=>	'2',
									'3'		=>	'3',
									'4'		=>	'4',
									'5'		=>	'5',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_search_left_cols' ),
		);
		$options[] = array(
			'name'			=>	__( 'Right sidebar', 'cdz' ),
			'id'			=>	'opt_sidebar_search_right',
			'class'			=>	'hide',
			'type'			=>	'select',
			'options'		=>	$sidebars_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_search_right' ),
		);
		$options[] = array(
			'name'			=>	__( 'Right sidebar Width', 'cdz' ),
			'desc'			=>	__( 'grid columns', 'cdz' ),
			'id'			=>	'opt_sidebar_search_right_cols',
			'class'			=>	'micro hide',
			'type'			=>	'select',
			'options'		=>	array(
									'1'		=>	'1',
									'2'		=>	'2',
									'3'		=>	'3',
									'4'		=>	'4',
									'5'		=>	'5',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_search_right_cols' ),
		);

		/*
		 *	404 page
		 */

		$options[] = array(
			'name'			=>	__( '404 page', 'cdz' ),
			'desc'			=>	__( 'Customize your 404 page sedebars', 'cdz' ),
			'type'			=>	'info',
		);
		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_sidebar_error404',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_error404' ),
		);
		$options[] = array(
			'name'			=>	__( 'Left sidebar', 'cdz' ),
			'id'			=>	'opt_sidebar_error404_left',
			'class'			=>	'hide',
			'type'			=>	'select',
			'options'		=>	$sidebars_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_error404_left' ),
		);
		$options[] = array(
			'name'			=>	__( 'Left sidebar width', 'cdz' ),
			'desc'			=>	__( 'grid columns', 'cdz' ),
			'id'			=>	'opt_sidebar_error404_left_cols',
			'class'			=>	'micro hide',
			'type'			=>	'select',
			'options'		=>	array(
									'1'		=>	'1',
									'2'		=>	'2',
									'3'		=>	'3',
									'4'		=>	'4',
									'5'		=>	'5',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_error404_left_cols' ),
		);
		$options[] = array(
			'name'			=>	__( 'Right sidebar', 'cdz' ),
			'id'			=>	'opt_sidebar_error404_right',
			'class'			=>	'hide',
			'type'			=>	'select',
			'options'		=>	$sidebars_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_error404_right' ),
		);
		$options[] = array(
			'name'			=>	__( 'Right sidebar Width', 'cdz' ),
			'desc'			=>	__( 'grid columns', 'cdz' ),
			'id'			=>	'opt_sidebar_error404_right_cols',
			'class'			=>	'micro hide',
			'type'			=>	'select',
			'options'		=>	array(
									'1'		=>	'1',
									'2'		=>	'2',
									'3'		=>	'3',
									'4'		=>	'4',
									'5'		=>	'5',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_error404_right_cols' ),
		);

		/*
		 *	Single post page
		 */

		$options[] = array(
			'name'			=>	__( 'Single post pages', 'cdz' ),
			'desc'			=>	__( 'Customize your single post pages sidebars', 'cdz' ),
			'type'			=>	'info',
		);
		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_sidebar_single',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_single' ),
		);
		$options[] = array(
			'name'			=>	__( 'Left sidebar', 'cdz' ),
			'id'			=>	'opt_sidebar_single_left',
			'class'			=>	'hide',
			'type'			=>	'select',
			'options'		=>	$sidebars_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_single_left' ),
		);
		$options[] = array(
			'name'			=>	__( 'Left sidebar width', 'cdz' ),
			'desc'			=>	__( 'grid columns', 'cdz' ),
			'id'			=>	'opt_sidebar_single_left_cols',
			'class'			=>	'micro hide',
			'type'			=>	'select',
			'options'		=>	array(
									'1'		=>	'1',
									'2'		=>	'2',
									'3'		=>	'3',
									'4'		=>	'4',
									'5'		=>	'5',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_single_left_cols' ),
		);
		$options[] = array(
			'name'			=>	__( 'Right sidebar', 'cdz' ),
			'id'			=>	'opt_sidebar_single_right',
			'class'			=>	'hide',
			'type'			=>	'select',
			'options'		=>	$sidebars_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_single_right' ),
		);
		$options[] = array(
			'name'			=>	__( 'Right sidebar Width', 'cdz' ),
			'desc'			=>	__( 'grid columns', 'cdz' ),
			'id'			=>	'opt_sidebar_single_right_cols',
			'class'			=>	'micro hide',
			'type'			=>	'select',
			'options'		=>	array(
									'1'		=>	'1',
									'2'		=>	'2',
									'3'		=>	'3',
									'4'		=>	'4',
									'5'		=>	'5',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_single_right_cols' ),
		);

		/*
		 *	Page
		 */

		$options[] = array(
			'name'			=>	__( 'Other pages', 'cdz' ),
			'desc'			=>	__( 'Customize your general pages sidebars', 'cdz' ),
			'type'			=>	'info',
		);
		$options[] = array(
			'name'			=>	__( 'Enable settings', 'cdz' ),
			'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
			'id'			=>	'opt_sidebar_page',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_page' ),
		);
		$options[] = array(
			'name'			=>	__( 'Left sidebar', 'cdz' ),
			'id'			=>	'opt_sidebar_page_left',
			'class'			=>	'hide',
			'type'			=>	'select',
			'options'		=>	$sidebars_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_page_left' ),
		);
		$options[] = array(
			'name'			=>	__( 'Left sidebar width', 'cdz' ),
			'desc'			=>	__( 'grid columns', 'cdz' ),
			'id'			=>	'opt_sidebar_page_left_cols',
			'class'			=>	'micro hide',
			'type'			=>	'select',
			'options'		=>	array(
									'1'		=>	'1',
									'2'		=>	'2',
									'3'		=>	'3',
									'4'		=>	'4',
									'5'		=>	'5',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_page_left_cols' ),
		);
		$options[] = array(
			'name'			=>	__( 'Right sidebar', 'cdz' ),
			'id'			=>	'opt_sidebar_page_right',
			'class'			=>	'hide',
			'type'			=>	'select',
			'options'		=>	$sidebars_list,
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_page_right' ),
		);
		$options[] = array(
			'name'			=>	__( 'Right sidebar Width', 'cdz' ),
			'desc'			=>	__( 'grid columns', 'cdz' ),
			'id'			=>	'opt_sidebar_page_right_cols',
			'class'			=>	'micro hide',
			'type'			=>	'select',
			'options'		=>	array(
									'1'		=>	'1',
									'2'		=>	'2',
									'3'		=>	'3',
									'4'		=>	'4',
									'5'		=>	'5',
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_page_right_cols' ),
		);

		/*
		 *	Woocommerce
		 */

		if ( cdz_get_theme_options_std( 'info_sliders_shop' ) ) {

			/*
			 *	Woocommerce - Shop page
			 */

			$options[] = array(
				'name'			=>	__( 'Woocommerce - Shop page', 'cdz' ),
				'desc'			=>	__('Plugins supported', 'cdz') . ': <a href="https://wordpress.org/plugins/woocommerce/" target="_blank">' . __( 'Woocommerce', 'cdz' ) . '</a>',
				'type'			=>	'info',
			);
			$options[] = array(
				'name'			=>	__( 'Enable settings', 'cdz' ),
				'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
				'id'			=>	'opt_sidebar_shop',
				'type'			=>	'checkbox',
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_shop' ),
			);
			$options[] = array(
				'name'			=>	__( 'Left sidebar', 'cdz' ),
				'id'			=>	'opt_sidebar_shop_left',
				'class'			=>	'hide',
				'type'			=>	'select',
				'options'		=>	$sidebars_list,
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_shop_left' ),
			);
			$options[] = array(
				'name'			=>	__( 'Left sidebar width', 'cdz' ),
				'desc'			=>	__( 'grid columns', 'cdz' ),
				'id'			=>	'opt_sidebar_shop_left_cols',
				'class'			=>	'micro hide',
				'type'			=>	'select',
				'options'		=>	array(
										'1'		=>	'1',
										'2'		=>	'2',
										'3'		=>	'3',
										'4'		=>	'4',
										'5'		=>	'5',
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_shop_left_cols' ),
			);
			$options[] = array(
				'name'			=>	__( 'Right sidebar', 'cdz' ),
				'id'			=>	'opt_sidebar_shop_right',
				'class'			=>	'hide',
				'type'			=>	'select',
				'options'		=>	$sidebars_list,
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_shop_right' ),
			);
			$options[] = array(
				'name'			=>	__( 'Right sidebar Width', 'cdz' ),
				'desc'			=>	__( 'grid columns', 'cdz' ),
				'id'			=>	'opt_sidebar_shop_right_cols',
				'class'			=>	'micro hide',
				'type'			=>	'select',
				'options'		=>	array(
										'1'		=>	'1',
										'2'		=>	'2',
										'3'		=>	'3',
										'4'		=>	'4',
										'5'		=>	'5',
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_shop_right_cols' ),
			);

			/*
			 *	Woocommerce - Product category page
			 */

			$options[] = array(
				'name'			=>	__( 'Woocommerce - Product category page', 'cdz' ),
				'desc'			=>	__('Plugins supported', 'cdz') . ': <a href="https://wordpress.org/plugins/woocommerce/" target="_blank">' . __( 'Woocommerce', 'cdz' ) . '</a>',
				'type'			=>	'info',
			);
			$options[] = array(
				'name'			=>	__( 'Enable settings', 'cdz' ),
				'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
				'id'			=>	'opt_sidebar_product_category',
				'type'			=>	'checkbox',
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_product_category' ),
			);
			$options[] = array(
				'name'			=>	__( 'Left sidebar', 'cdz' ),
				'id'			=>	'opt_sidebar_product_category_left',
				'class'			=>	'hide',
				'type'			=>	'select',
				'options'		=>	$sidebars_list,
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_product_category_left' ),
			);
			$options[] = array(
				'name'			=>	__( 'Left sidebar width', 'cdz' ),
				'desc'			=>	__( 'grid columns', 'cdz' ),
				'id'			=>	'opt_sidebar_product_category_left_cols',
				'class'			=>	'micro hide',
				'type'			=>	'select',
				'options'		=>	array(
										'1'		=>	'1',
										'2'		=>	'2',
										'3'		=>	'3',
										'4'		=>	'4',
										'5'		=>	'5',
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_product_category_left_cols' ),
			);
			$options[] = array(
				'name'			=>	__( 'Right sidebar', 'cdz' ),
				'id'			=>	'opt_sidebar_product_category_right',
				'class'			=>	'hide',
				'type'			=>	'select',
				'options'		=>	$sidebars_list,
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_product_category_right' ),
			);
			$options[] = array(
				'name'			=>	__( 'Right sidebar Width', 'cdz' ),
				'desc'			=>	__( 'grid columns', 'cdz' ),
				'id'			=>	'opt_sidebar_product_category_right_cols',
				'class'			=>	'micro hide',
				'type'			=>	'select',
				'options'		=>	array(
										'1'		=>	'1',
										'2'		=>	'2',
										'3'		=>	'3',
										'4'		=>	'4',
										'5'		=>	'5',
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_product_category_right_cols' ),
			);

			/*
			 *	Woocommerce - Single product page
			 */

			$options[] = array(
				'name'			=>	__( 'Woocommerce - Single product page', 'cdz' ),
				'desc'			=>	__('Plugins supported', 'cdz') . ': <a href="https://wordpress.org/plugins/woocommerce/" target="_blank">' . __( 'Woocommerce', 'cdz' ) . '</a>',
				'type'			=>	'info',
			);
			$options[] = array(
				'name'			=>	__( 'Enable settings', 'cdz' ),
				'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
				'id'			=>	'opt_sidebar_product',
				'type'			=>	'checkbox',
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_product' ),
			);
			$options[] = array(
				'name'			=>	__( 'Left sidebar', 'cdz' ),
				'id'			=>	'opt_sidebar_product_left',
				'class'			=>	'hide',
				'type'			=>	'select',
				'options'		=>	$sidebars_list,
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_product_left' ),
			);
			$options[] = array(
				'name'			=>	__( 'Left sidebar width', 'cdz' ),
				'desc'			=>	__( 'grid columns', 'cdz' ),
				'id'			=>	'opt_sidebar_product_left_cols',
				'class'			=>	'micro hide',
				'type'			=>	'select',
				'options'		=>	array(
										'1'		=>	'1',
										'2'		=>	'2',
										'3'		=>	'3',
										'4'		=>	'4',
										'5'		=>	'5',
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_product_left_cols' ),
			);
			$options[] = array(
				'name'			=>	__( 'Right sidebar', 'cdz' ),
				'id'			=>	'opt_sidebar_product_right',
				'class'			=>	'hide',
				'type'			=>	'select',
				'options'		=>	$sidebars_list,
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_product_right' ),
			);
			$options[] = array(
				'name'			=>	__( 'Right sidebar Width', 'cdz' ),
				'desc'			=>	__( 'grid columns', 'cdz' ),
				'id'			=>	'opt_sidebar_product_right_cols',
				'class'			=>	'micro hide',
				'type'			=>	'select',
				'options'		=>	array(
										'1'		=>	'1',
										'2'		=>	'2',
										'3'		=>	'3',
										'4'		=>	'4',
										'5'		=>	'5',
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_product_right_cols' ),
			);

			/*
			 *	Woocommerce - Cart page
			 */

			$options[] = array(
				'name'			=>	__( 'Woocommerce - Cart page', 'cdz' ),
				'desc'			=>	__('Plugins supported', 'cdz') . ': <a href="https://wordpress.org/plugins/woocommerce/" target="_blank">' . __( 'Woocommerce', 'cdz' ) . '</a>',
				'type'			=>	'info',
			);
			$options[] = array(
				'name'			=>	__( 'Enable settings', 'cdz' ),
				'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
				'id'			=>	'opt_sidebar_cart',
				'type'			=>	'checkbox',
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_cart' ),
			);
			$options[] = array(
				'name'			=>	__( 'Left sidebar', 'cdz' ),
				'id'			=>	'opt_sidebar_cart_left',
				'class'			=>	'hide',
				'type'			=>	'select',
				'options'		=>	$sidebars_list,
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_cart_left' ),
			);
			$options[] = array(
				'name'			=>	__( 'Left sidebar width', 'cdz' ),
				'desc'			=>	__( 'grid columns', 'cdz' ),
				'id'			=>	'opt_sidebar_cart_left_cols',
				'class'			=>	'micro hide',
				'type'			=>	'select',
				'options'		=>	array(
										'1'		=>	'1',
										'2'		=>	'2',
										'3'		=>	'3',
										'4'		=>	'4',
										'5'		=>	'5',
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_cart_left_cols' ),
			);
			$options[] = array(
				'name'			=>	__( 'Right sidebar', 'cdz' ),
				'id'			=>	'opt_sidebar_cart_right',
				'class'			=>	'hide',
				'type'			=>	'select',
				'options'		=>	$sidebars_list,
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_cart_right' ),
			);
			$options[] = array(
				'name'			=>	__( 'Right sidebar Width', 'cdz' ),
				'desc'			=>	__( 'grid columns', 'cdz' ),
				'id'			=>	'opt_sidebar_cart_right_cols',
				'class'			=>	'micro hide',
				'type'			=>	'select',
				'options'		=>	array(
										'1'		=>	'1',
										'2'		=>	'2',
										'3'		=>	'3',
										'4'		=>	'4',
										'5'		=>	'5',
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_cart_right_cols' ),
			);

			/*
			 *	Woocommerce - Checkout page
			 */

			$options[] = array(
				'name'			=>	__( 'Woocommerce - Checkout page', 'cdz' ),
				'desc'			=>	__('Plugins supported', 'cdz') . ': <a href="https://wordpress.org/plugins/woocommerce/" target="_blank">' . __( 'Woocommerce', 'cdz' ) . '</a>',
				'type'			=>	'info',
			);
			$options[] = array(
				'name'			=>	__( 'Enable settings', 'cdz' ),
				'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
				'id'			=>	'opt_sidebar_checkout',
				'type'			=>	'checkbox',
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_checkout' ),
			);
			$options[] = array(
				'name'			=>	__( 'Left sidebar', 'cdz' ),
				'id'			=>	'opt_sidebar_checkout_left',
				'class'			=>	'hide',
				'type'			=>	'select',
				'options'		=>	$sidebars_list,
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_checkout_left' ),
			);
			$options[] = array(
				'name'			=>	__( 'Left sidebar width', 'cdz' ),
				'desc'			=>	__( 'grid columns', 'cdz' ),
				'id'			=>	'opt_sidebar_checkout_left_cols',
				'class'			=>	'micro hide',
				'type'			=>	'select',
				'options'		=>	array(
										'1'		=>	'1',
										'2'		=>	'2',
										'3'		=>	'3',
										'4'		=>	'4',
										'5'		=>	'5',
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_checkout_left_cols' ),
			);
			$options[] = array(
				'name'			=>	__( 'Right sidebar', 'cdz' ),
				'id'			=>	'opt_sidebar_checkout_right',
				'class'			=>	'hide',
				'type'			=>	'select',
				'options'		=>	$sidebars_list,
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_checkout_right' ),
			);
			$options[] = array(
				'name'			=>	__( 'Right sidebar Width', 'cdz' ),
				'desc'			=>	__( 'grid columns', 'cdz' ),
				'id'			=>	'opt_sidebar_checkout_right_cols',
				'class'			=>	'micro hide',
				'type'			=>	'select',
				'options'		=>	array(
										'1'		=>	'1',
										'2'		=>	'2',
										'3'		=>	'3',
										'4'		=>	'4',
										'5'		=>	'5',
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_checkout_right_cols' ),
			);

			/*
			 *	Woocommerce - My Account page
			 */

			$options[] = array(
				'name'			=>	__( 'Woocommerce - My Account page', 'cdz' ),
				'desc'			=>	__('Plugins supported', 'cdz') . ': <a href="https://wordpress.org/plugins/woocommerce/" target="_blank">' . __( 'Woocommerce', 'cdz' ) . '</a>',
				'type'			=>	'info',
			);
			$options[] = array(
				'name'			=>	__( 'Enable settings', 'cdz' ),
				'desc'			=>	__( 'These options will override the general settings in this page', 'cdz' ),
				'id'			=>	'opt_sidebar_account',
				'type'			=>	'checkbox',
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_account' ),
			);
			$options[] = array(
				'name'			=>	__( 'Left sidebar', 'cdz' ),
				'id'			=>	'opt_sidebar_account_left',
				'class'			=>	'hide',
				'type'			=>	'select',
				'options'		=>	$sidebars_list,
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_account_left' ),
			);
			$options[] = array(
				'name'			=>	__( 'Left sidebar width', 'cdz' ),
				'desc'			=>	__( 'grid columns', 'cdz' ),
				'id'			=>	'opt_sidebar_account_left_cols',
				'class'			=>	'micro hide',
				'type'			=>	'select',
				'options'		=>	array(
										'1'		=>	'1',
										'2'		=>	'2',
										'3'		=>	'3',
										'4'		=>	'4',
										'5'		=>	'5',
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_account_left_cols' ),
			);
			$options[] = array(
				'name'			=>	__( 'Right sidebar', 'cdz' ),
				'id'			=>	'opt_sidebar_account_right',
				'class'			=>	'hide',
				'type'			=>	'select',
				'options'		=>	$sidebars_list,
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_account_right' ),
			);
			$options[] = array(
				'name'			=>	__( 'Right sidebar Width', 'cdz' ),
				'desc'			=>	__( 'grid columns', 'cdz' ),
				'id'			=>	'opt_sidebar_account_right_cols',
				'class'			=>	'micro hide',
				'type'			=>	'select',
				'options'		=>	array(
										'1'		=>	'1',
										'2'		=>	'2',
										'3'		=>	'3',
										'4'		=>	'4',
										'5'		=>	'5',
									),
				'std'			=>	cdz_get_theme_options_std( 'opt_sidebar_account_right_cols' ),
			);

		}
		
		/*
		 *	Return
		 */

		return $options;

	}

}