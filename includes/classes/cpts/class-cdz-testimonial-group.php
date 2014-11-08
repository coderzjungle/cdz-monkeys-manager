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
 *	cdzClass: Testimonial Group
 */

class cdz_Testimonial_Group {

	function __construct() {

		/*
		 *	Register taxonomy
		 */

		add_action( 'init', array( &$this, 'register_taxonomy' ) );

		/*
		 *	Add form fields remover
		 */

		add_action( 'cdz_testimonial_group_add_form_fields', array( &$this, 'add_form_fields_remover' ), 10, 2 );

	}

	function register_taxonomy() {
	
		$labels = array(
			'name'							=>	__( 'Testimonial Groups', 'cdz' ),
			'singular_name'					=>	__( 'Testimonial Group', 'cdz' ),
			'menu_name'						=>	__( 'Groups', 'cdz' ),
			'all_items'						=>	__( 'All Testimonial Groups', 'cdz' ),
			'edit_item'						=>	__( 'Edit Testimonial Group', 'cdz' ),
			'view_item'						=>	__( 'View Testimonial Group', 'cdz' ),
			'update_item'					=>	__( 'Update Testimonial Group', 'cdz' ),
			'add_new_item'					=>	__( 'Add New Testimonial Group', 'cdz' ),
			'new_item_name'					=>	__( 'New Testimonial Group Name', 'cdz' ),
			'search_items'					=>	__( 'Search Testimonial Groups', 'cdz' ),
			'popular_items'					=>	NULL,
			'separate_items_with_commas'	=>	__( 'Separate testimonial groups with commas', 'cdz' ),
			'add_or_remove_items'			=>	__( 'Add or remove testimonial groups', 'cdz' ),
			'choose_from_most_used'			=>	__( 'Choose from the most used testimonial groups', 'cdz' ),
			'not_found'						=>	__( 'No testimonial groups found.', 'cdz' ),
		);

		$args = array(
			'label'				=>	__( 'Group' ),
			'labels'			=>	$labels,
			'show_in_nav_menus'	=>	true,
			'hierarchical'		=>	true,
			'rewrite'			=>	array( 'slug' => 'testimonial-group' ),
		);

		register_taxonomy( 'cdz_testimonial_group',
			apply_filters( 'cdz_testimonial_group_objects', array('cdz_testimonial') ),
			apply_filters( 'cdz_testimonial_group_args', $args )
		);

	}

	function add_form_fields_remover() {

		echo '<style>.form-field{display:none;}.form-field.form-required{display:block;}</style>';

	}

}