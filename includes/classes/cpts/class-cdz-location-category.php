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
 *	cdzClass: Location Category
 */

class cdz_Location_Category {

	function __construct() {

		/*
		 *	Register taxonomy
		 */

		add_action( 'init', array( &$this, 'register_taxonomy' ) );

		/*
		 *	Add form fields remover
		 */

		add_action( 'cdz_location_category_add_form_fields', array( &$this, 'add_form_fields_remover' ), 10, 2 );

	}

	function register_taxonomy() {
	
		$labels = array(
			'name'							=>	__( 'Location Categories', 'cdz' ),
			'singular_name'					=>	__( 'Location Category', 'cdz' ),
			'menu_name'						=>	__( 'Categories', 'cdz' ),
			'all_items'						=>	__( 'All Location Categories', 'cdz' ),
			'edit_item'						=>	__( 'Edit Location Category', 'cdz' ),
			'view_item'						=>	__( 'View Location Category', 'cdz' ),
			'update_item'					=>	__( 'Update Location Category', 'cdz' ),
			'add_new_item'					=>	__( 'Add New Location Category', 'cdz' ),
			'new_item_name'					=>	__( 'New Location Category Name', 'cdz' ),
			'search_items'					=>	__( 'Search Location Categories', 'cdz' ),
			'popular_items'					=>	NULL,
			'separate_items_with_commas'	=>	__( 'Separate location categories with commas', 'cdz' ),
			'add_or_remove_items'			=>	__( 'Add or remove location categories', 'cdz' ),
			'choose_from_most_used'			=>	__( 'Choose from the most used location categories', 'cdz' ),
			'not_found'						=>	__( 'No location categories found.', 'cdz' ),
		);

		$args = array(
			'label'				=>	__( 'Category' ),
			'labels'			=>	$labels,
			'show_in_nav_menus'	=>	true,
			'hierarchical'		=>	true,
			'rewrite'			=>	array( 'slug' => 'location-category' ),
		);

		register_taxonomy( 'cdz_location_category',
			apply_filters( 'cdz_location_category_objects', array('cdz_location') ),
			apply_filters( 'cdz_location_category_args', $args )
		);
		
	}

	function add_form_fields_remover() {

		echo '<style>.form-field{display:none;}.form-field.form-required{display:block;}</style>';

	}

}