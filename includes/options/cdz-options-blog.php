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
 *	cdzFunction: Options Blog
 */

if ( ! function_exists( 'cdz_options_blog' ) ) {

	function cdz_options_blog() {
		
		$options = array();

		if ( ! cdz_get_theme_options_std( 'blog' ) ) { return $options; }

		/*
		 *	Tab title
		 */

		$options[] = array(
			'name'			=>	__( 'Blog', 'cdz' ),
			'type'			=>	'heading',
		);

		/*
		 *	Archive page
		 */

		$options[] = array(
			'name'			=>	__( 'Archive page', 'cdz' ),
			'desc'			=>	__( 'Customize your blog page configuration!', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( '"Read More" label', 'cdz' ),
			'id'			=>	'opt_blog_more_label',
			'class'			=>	'mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_more_label' ),
		);

		$options[] = array(
			'name'			=>	__( '"Read More" position', 'cdz' ),
			'id'			=>	'opt_blog_more_position',
			'type'			=>	'radio',
			'options'		=>	array(
									'left'		=>	__( 'Left', 'cdz' ),
									'center'	=>	__( 'Center', 'cdz' ),
									'right'		=>	__( 'Right', 'cdz' ),
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_more_position' ),
		);

		/*
		 *	Post meta
		 */

		$options[] = array(
			'name'			=>	__( 'Post meta', 'cdz' ),
			'desc'			=>	__( 'Customize your blog meta configuration!', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( 'Date', 'cdz' ),
			'desc'			=>	__( 'Show post date', 'cdz' ),
			'id'			=>	'opt_blog_meta_date',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_meta_date' ),
		);

		$options[] = array(
			'name'			=>	__( 'Categories', 'cdz' ),
			'desc'			=>	__( 'Show post categories', 'cdz' ),
			'id'			=>	'opt_blog_meta_categories',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_meta_categories' ),
		);

		$options[] = array(
			'name'			=>	__( 'Author', 'cdz' ),
			'desc'			=>	__( 'Show post author', 'cdz' ),
			'id'			=>	'opt_blog_meta_author',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_meta_author' ),
		);

		$options[] = array(
			'name'			=>	__( 'Comments', 'cdz' ),
			'desc'			=>	__( 'Show post comments', 'cdz' ),
			'id'			=>	'opt_blog_meta_comments',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_meta_comments' ),
		);

		$options[] = array(
			'name'			=>	__( 'Tags', 'cdz' ),
			'desc'			=>	__( 'Show post tags', 'cdz' ),
			'id'			=>	'opt_blog_meta_tags',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_meta_tags' ),
		);

		$options[] = array(
			'name'			=>	__( 'Edit button', 'cdz' ),
			'desc'			=>	__( 'Show post edit button (only for user with permissions)', 'cdz' ),
			'id'			=>	'opt_blog_meta_edit',
			'type'			=>	'checkbox',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_meta_edit' ),
		);

		/*
		 *	Pagination links
		 */

		$options[] = array(
			'name'			=>	__( 'Pagination links', 'cdz' ),
			'desc'			=>	__( 'Customize your blog pagination links!', 'cdz' ),
			'type'			=>	'info',
		);

		$options[] = array(
			'name'			=>	__( '"Older posts" label', 'cdz' ),
			'id'			=>	'opt_blog_nav_older_label',
			'class'			=>	'mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_nav_older_label' ),
		);

		$options[] = array(
			'name'			=>	__( '"Newer posts" label', 'cdz' ),
			'id'			=>	'opt_blog_nav_newer_label',
			'class'			=>	'mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_nav_newer_label' ),
		);

		$options[] = array(
			'name'			=>	__( '"Previous post" label', 'cdz' ),
			'id'			=>	'opt_blog_previous_post_label',
			'class'			=>	'mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_previous_post_label' ),
		);

		$options[] = array(
			'name'			=>	__( '"Next post" label', 'cdz' ),
			'id'			=>	'opt_blog_next_post_label',
			'class'			=>	'mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_next_post_label' ),
		);

		$options[] = array(
			'name'			=>	__( 'Font', 'cdz' ),
			'id'			=>	"opt_blog_nav_items_font",
			'type'			=>	'typography',
			'options'		=>	array(
									'sizes'		=>	array( '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20' ),
									'color'		=>	false,
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_nav_items_font' ),
		);

		$options[] = array(
			'name'			=>	__( 'Font style', 'cdz' ),
			'id'			=>	'opt_blog_nav_items_font_style',
			'class'			=>	'advo',
			'type'			=>	'radio',
			'options'		=>	array(
									'normal'	=>	__( 'Normal', 'cdz' ),
									'italic'	=>	__( 'Italic', 'cdz' ),
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_nav_items_font_style' ),
		);

		$options[] = array(
			'name'			=>	__( 'Text transform', 'cdz' ),
			'id'			=>	'opt_blog_nav_items_text_transform',
			'class'			=>	'advo',
			'type'			=>	'radio',
			'options'		=>	array(
									'none'			=>	__( 'None', 'cdz' ),
									'capitalize'	=>	__( 'Capitalize', 'cdz' ),
									'lowercase'		=>	__( 'Lowercase', 'cdz' ),
									'uppercase'		=>	__( 'Uppercase', 'cdz' ),
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_nav_items_text_transform' ),
		);

		$options[] = array(
			'name'			=>	__( 'Font color', 'cdz' ),
			'id'			=>	'opt_blog_nav_items_font_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_nav_items_font_color' ),
		);

		$options[] = array(
			'name'			=>	__( 'Font color (hover)', 'cdz' ),
			'id'			=>	'opt_blog_nav_items_font_color_hover',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_nav_items_font_color_hover' ),
		);

		$options[] = array(
			'name'			=>	__( 'Background color', 'cdz' ),
			'id'			=>	'opt_blog_nav_items_bg_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_nav_items_bg_color' ),
		);

		$options[] = array(
			'name'			=>	__( 'Background color (hover)', 'cdz' ),
			'id'			=>	'opt_blog_nav_items_bg_color_hover',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_nav_items_bg_color_hover' ),
		);

		$options[] = array(
			'name'			=>	__( 'Border color', 'cdz' ),
			'id'			=>	'opt_blog_nav_items_border_color',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_nav_items_border_color' ),
		);

		$options[] = array(
			'name'			=>	__( 'Border color (hover)', 'cdz' ),
			'id'			=>	'opt_blog_nav_items_border_color_hover',
			'type'			=>	'color',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_nav_items_border_color_hover' ),
		);

		$options[] = array(
			'name'			=>	__( 'Border width', 'cdz' ),
			'desc'			=>	__( 'example', 'cdz' ) . ': 0px, 1px, ...',
			'id'			=>	'opt_blog_nav_items_border_width',
			'class'			=>	'advo micro',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_nav_items_border_width' ),
		);

		$options[] = array(
			'name'			=>	__( 'Border style', 'cdz' ),
			'id'			=>	'opt_blog_nav_items_border_style',
			'class'			=>	'advo',
			'type'			=>	'radio',
			'options'		=>	array(
									'dashed'	=>	__( 'Dashed', 'cdz' ),
									'dotted'	=>	__( 'Dotted', 'cdz' ),
									'double'	=>	__( 'Double', 'cdz' ),
									'solid'		=>	__( 'Solid', 'cdz' ),
								),
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_nav_items_border_style' ),
		);

		$options[] = array(
			'name'			=>	__( 'Padding sizes', 'cdz' ),
			'desc'			=>	__( 'example', 'cdz' ) . ': 0px, 1px, ...',
			'id'			=>	'opt_blog_nav_items_padding',
			'class'			=>	'advo mini',
			'type'			=>	'text',
			'std'			=>	cdz_get_theme_options_std( 'opt_blog_nav_items_padding' ),
		);

		return $options;
	}

}