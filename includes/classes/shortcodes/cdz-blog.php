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
 *	cdzShortcode: Blog
 */

if ( ! class_exists( 'cdz_Blog' ) ) {

	class cdz_Blog extends cdz_Shortcode {

		public $name = 'Blog';
		public $base = 'cdz_blog';
		public $slug = 'cdz-blog';
		public $desc = 'Show your posts.';

		public function get_options() {

			return array(

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'title',
					'heading'		=> __( 'Title', 'cdz' ),
					'description'	=> __( 'The title above the shortcode.', 'cdz' ),
					'value' 		=> '',
				),

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'number',
					'heading'		=> __( 'Number', 'cdz' ),
					'description'	=> __( 'The number of posts.', 'cdz' ),
					'value' 		=> '12',
				),

				array(
					'type'			=> 'dropdown',
					'param_name'	=> 'orderby',
					'heading'		=> __( 'Order by', 'cdz' ),
					'description'	=> __( 'Select the posts order.', 'cdz' ),
					'value' 		=> array(
						__( 'Date', 'cdz' )		=> 'date',
						__( 'Name', 'cdz' )		=> 'name',
						__( 'Title', 'cdz' )	=> 'title',
					),
				),

				array(
					'type'			=> 'dropdown',
					'param_name'	=> 'order',
					'heading'		=> __( 'Order', 'cdz' ),
					'description'	=> __( 'Select the posts order direction.', 'cdz' ),
					'value' 		=> array(
						__( 'Ascendant', 'cdz' )	=> 'asc',
						__( 'Descendant', 'cdz' )	=> 'desc',
					),
				),

				array(
					'type'			=> 'dropdown',
					'param_name'	=> 'style',
					'heading'		=> __( 'Style', 'cdz' ),
					'description'	=> __( 'Select the blog template.', 'cdz' ),
					'value' 		=> array(
						__( 'Small Thumbnail', 'cdz' )		=> 'small-thumbnail',
						__( 'Big Thumbnail', 'cdz' )		=> 'big-thumbnail',
						__( '2 Columns', 'cdz' )			=> '2-columns',
						__( '3 Columns', 'cdz' )			=> '3-columns',
						__( '4 Columns', 'cdz' )			=> '4-columns',
						__( '5 Columns', 'cdz' )			=> '5-columns',
						__( '6 Columns', 'cdz' )			=> '6-columns',
					),
				),

			);

		}

	}

}

$cdz_shortcodes['cdz_blog'] = new cdz_Blog();