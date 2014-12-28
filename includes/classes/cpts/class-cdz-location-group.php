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
 *	cdzClass: Work Group
 */

class cdz_Location_Group {

	function __construct() {

		/*
		 *	Register taxonomy
		 */

		add_action( 'init', array( &$this, 'register_taxonomy' ) );

		/*
		 *	Add form fields remover
		 */

		add_action( 'cdz_location_group_add_form_fields', array( &$this, 'add_form_fields_remover' ), 10, 2 );

	}

	function register_taxonomy() {
	
		$labels = array(
			'name'							=>	__( 'Location Groups', 'cdz' ),
			'singular_name'					=>	__( 'Location Group', 'cdz' ),
			'menu_name'						=>	__( 'Groups', 'cdz' ),
			'all_items'						=>	__( 'All Location Groups', 'cdz' ),
			'edit_item'						=>	__( 'Edit Location Group', 'cdz' ),
			'view_item'						=>	__( 'View Location Group', 'cdz' ),
			'update_item'					=>	__( 'Update Location Group', 'cdz' ),
			'add_new_item'					=>	__( 'Add New Location Group', 'cdz' ),
			'new_item_name'					=>	__( 'New Location Group Name', 'cdz' ),
			'search_items'					=>	__( 'Search Location Groups', 'cdz' ),
			'popular_items'					=>	NULL,
			'separate_items_with_commas'	=>	__( 'Separate location groups with commas', 'cdz' ),
			'add_or_remove_items'			=>	__( 'Add or remove location groups', 'cdz' ),
			'choose_from_most_used'			=>	__( 'Choose from the most used location groups', 'cdz' ),
			'not_found'						=>	__( 'No location groups found.', 'cdz' ),
		);

		$args = array(
			'label'				=>	__( 'Group' ),
			'labels'			=>	$labels,
			'show_in_nav_menus'	=>	true,
			'hierarchical'		=>	true,
			'rewrite'			=>	array( 'slug' => 'location-group' ),
		);

		register_taxonomy( 'cdz_location_group',
			apply_filters( 'cdz_location_group_objects', array('cdz_location') ),
			apply_filters( 'cdz_location_group_args', $args )
		);

	}

	function add_form_fields_remover() {

		echo '<style>.form-field{display:none;}.form-field.form-required{display:block;}</style>';

	}

}