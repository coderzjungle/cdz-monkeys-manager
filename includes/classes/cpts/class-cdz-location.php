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
 *	cdzClass: Location
 */

class cdz_Location {

	function __construct() {

		/*
		 *	Register Post type
		 */
		
		add_action( 'init', array( &$this, 'register_post_type' ) );

		/*
		 *	Post Updated Messages
		 */

		add_filter( 'post_updated_messages', array( &$this, 'post_updated_messages' ) );

		/*
		 *	Add Meta Boxes
		 */

		add_action( 'add_meta_boxes', array( &$this, 'add_meta_boxes' ) );

		/*
		 *	Save Meta
		 */
		
		add_action( 'save_post', array( &$this, 'save_meta' ), 1, 2 );

		/*
		 *	Manage CPT columns
		 */

		add_action( 'manage_edit-cdz_location_columns', array( &$this, 'manage_columns' ) );

		/*
		 *	Manage posts custom column
		 */

		add_action( 'manage_cdz_location_posts_custom_column', array( &$this, 'manage_posts_custom_column' ) );

		/*
		 *	Make column sortable
		 */

		add_filter('manage_edit-cdz_location_sortable_columns', array( &$this, 'manage_sortable_columns' ) );

	}

	public function register_post_type() {

		$labels = array(
			'name'					=>	__( 'Locations', 'cdz' ),
			'singular_name'			=>	__( 'Location', 'cdz' ),
			'menu_name'				=>	__( 'Locations', 'cdz' ),
			'all_items'				=>	__( 'All Locations', 'cdz' ),
			'add_new'				=>	__( 'Add Location', 'cdz' ),
			'add_new_item'			=>	__( 'Add New Location', 'cdz' ),
			'edit_item'				=>	__( 'Edit Location', 'cdz' ),
			'new_item'				=>	__( 'New Location', 'cdz' ),
			'view_item'				=>	__( 'View Location', 'cdz' ),
			'search_items'			=>	__( 'Search Locations', 'cdz' ),
			'not_found'				=>	__( 'No locations found', 'cdz' ),
			'not_found_in_trash'	=>	__( 'No locations found in Trash', 'cdz' ),
		);

		$args =	array(
			'labels'				=>	$labels,
			'public'				=>	true,
			'show_in_nav_menus'		=>	false,
			'show_in_menu'			=>	true,
			'menu_position'			=>	21,
			'menu_icon'				=>	'dashicons-location',
			'has_archive'			=>	true,
			'rewrite'				=>	array( 'slug' => 'location' ),
			'can_export'			=>	true,
			'supports'				=>	array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		);

		/*
		 *	Use the order attribute:
		 *	$loop = new WP_Query( array( 'post_type', 'slider_item', 'orderby' => 'menu_order', 'order'=>'ASC') );
		 */

		register_post_type( 'cdz_location', apply_filters( 'cdz_location_args', $args ) );

	}

	function post_updated_messages( $messages ) {

		global $post, $post_ID;

		$messages['cdz_location'] = array(
			0	=>	'',
			1	=>	sprintf( __( 'Location updated. <a href="%s">View location</a>', 'cdz' ), esc_url( get_permalink($post_ID) ) ),
			2	=>	__( 'Custom field updated.', 'cdz' ),
			3	=>	__( 'Custom field deleted.', 'cdz' ),
			4	=>	__( 'Location updated.', 'cdz' ),
			5	=>	isset( $_GET['revision'] ) ? sprintf( __( 'Location restored to revision from %s', 'cdz' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6	=>	sprintf( __( 'Location published. <a href="%s">View location</a>', 'cdz' ), esc_url( get_permalink($post_ID) ) ),
			7	=>	__( 'Location saved.', 'cdz' ),
			8	=>	sprintf( __( 'Location submitted. <a target="_blank" href="%s">Preview location</a>', 'cdz' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
			9	=>	sprintf(
						__( 'Location scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview location</a>', 'cdz' ),
						date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) )
					),
			10	=>	sprintf( __( 'Location draft updated. <a target="_blank" href="%s">Preview location</a>', 'cdz' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
		);

		return $messages;

	}

	/*
	 *	Meta Boxes
	 */

	function add_meta_boxes() {

		add_meta_box( 'cdz_location_box_info', __( 'Location info', 'cdz' ), array( &$this, 'box_info' ), 'cdz_location', 'normal', 'high' );
		//add_meta_box( 'cdz_location_box_settings', __( 'Settings', 'cdz' ), array( &$this, 'box_settings' ), 'cdz_location', 'normal', 'high' );

	}
	
	function box_info() {

		global $post;

		/*
		 *	Noncename needed to verify where the data originated
		 */

		echo '<input type="hidden" name="cdz_location_meta_noncename" id="cdz_location_meta_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
		
		/*
		 *	Get meta
		 */

		$cdz_location_address			= get_post_meta( $post->ID, 'cdz_location_address', true );
		$cdz_location_latitude			= get_post_meta( $post->ID, 'cdz_location_latitude', true );
		$cdz_location_longitude			= get_post_meta( $post->ID, 'cdz_location_longitude', true );
		$cdz_location_website_url		= get_post_meta( $post->ID, 'cdz_location_website_url', true );
		$cdz_location_phone_number		= get_post_meta( $post->ID, 'cdz_location_phone_number', true );

		/*
		 *	Fields
		 */

		echo '<p><label for="cdz_location_address">' . __( 'Address', 'cdz' ) . '</label></p>';
		echo '<input type="text" name="cdz_location_address" value="' . $cdz_location_address  . '" id="cdz_location_address" class="widefat" />';

		echo '<p><label for="cdz_location_latitude">' . __( 'Latitude', 'cdz' ) . '</label></p>';
		echo '<input type="text" name="cdz_location_latitude" value="' . $cdz_location_latitude  . '" id="cdz_location_latitude" class="widefat" />';

		echo '<p><label for="cdz_location_longitude">' . __( 'Longitude', 'cdz' ) . '</label></p>';
		echo '<input type="text" name="cdz_location_longitude" value="' . $cdz_location_longitude  . '" id="cdz_location_longitude" class="widefat" />';

		echo '<p><label for="cdz_location_website_url">' . __( 'Website URL', 'cdz' ) . '</label></p>';
		echo '<input type="text" name="cdz_location_website_url" value="' . $cdz_location_website_url  . '" id="cdz_location_website_url" class="widefat" />';

		echo '<p><label for="cdz_location_phone_number">' . __( 'Phone Number', 'cdz' ) . '</label></p>';
		echo '<input type="text" name="cdz_location_phone_number" value="' . $cdz_location_phone_number  . '" id="cdz_location_phone_number" class="widefat" />';

	}
	
	function box_settings() {

		global $post;

		/*
		 *	Noncename needed to verify where the data originated
		 */

		echo '<input type="hidden" name="cdz_location_meta_noncename" id="cdz_location_meta_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

		/*
		 *	Get meta
		 */

		$cdz_location_featured			= get_post_meta( $post->ID, 'cdz_location_featured', true );
		$cdz_location_read_more_label	= get_post_meta( $post->ID, 'cdz_location_read_more_label', true );

		/*
		 *	Fields
		 */

		echo '<p><label for="cdz_location_read_more_label">' . __( '"Read More" Label', 'cdz' ) . '</label></p>';
		echo '<input type="text" name="cdz_location_read_more_label" value="' . $cdz_location_read_more_label  . '" class="widefat" />';

		echo '<p><label for="cdz_location_featured">' . __( 'Feature this location?', 'cdz' ) . '</label></p>';
		echo '<input type="checkbox" name="cdz_location_featured" id="cdz_location_featured" value="1" ' . checked( 1, $cdz_location_featured, false ) . ' />';

	}

	function save_meta( $post_id, $post ) {

		if ( ! isset( $_POST['cdz_location_meta_noncename'] ) ) { return $post->ID; }

		/*
		 *	Verify this came from the our screen and with proper authorization
		 */

		if ( ! wp_verify_nonce( $_POST['cdz_location_meta_noncename'], plugin_basename(__FILE__) )) { return $post->ID; }

		/*
		 *	User allowed to edit the post or page?
		 */

		if ( ! current_user_can( 'edit_post', $post->ID ) ) { return $post->ID; }

		/*
		 *	Get Data and put them into an array to make it easier to loop though
		 */

		$cdz_location_meta['cdz_location_address']			= $_POST['cdz_location_address'];
		$cdz_location_meta['cdz_location_latitude']			= $_POST['cdz_location_latitude'];
		$cdz_location_meta['cdz_location_longitude']		= $_POST['cdz_location_longitude'];
		$cdz_location_meta['cdz_location_website_url']		= $_POST['cdz_location_website_url'];
		$cdz_location_meta['cdz_location_phone_number']		= $_POST['cdz_location_phone_number'];

		// $cdz_location_meta['cdz_location_featured']			= isset( $_POST['cdz_location_featured'] ) ? $_POST['cdz_location_featured'] : '';
		// $cdz_location_meta['cdz_location_read_more_label']	= $_POST['cdz_location_read_more_label'];

		/*
		 *	Add values of $cdz_location_meta as custom fields
		 */

		foreach ( $cdz_location_meta as $key => $value ) {

			/*
			 *	Don't store custom data twice
			 */

			if( $post->post_type == 'revision' ) { return; }

			/*
			 *	If $value is an array, make it a CSV (unlikely)
			 */

			$value = implode( ',', (array)$value );

			/*
			 *	If the custom field already has a value
			 */

			if( get_post_meta( $post->ID, $key, FALSE ) ) { update_post_meta( $post->ID, $key, $value ); }
			else { add_post_meta($post->ID, $key, $value); }

			/*
			 *	Delete if blank
			 */

			if( !$value ) { delete_post_meta($post->ID, $key); }

		}

	}

	/*
	 *	Manage columns
	 */

	function manage_columns( $old_columns ) {

		/*
		 *	Doc: http://codex.wordpress.org/Plugin_API/Filter_Reference/manage_edit-post_type_columns
		 */
		
		$columns['cb']							= '<input type="checkbox" />';
		$columns['cdz_location_thumb']			= __( 'Image', 'cdz' );
		$columns['title']						= __( 'Title', 'cdz' );
		$columns['cdz_location_groups']			= __( 'Groups', 'cdz' );
		$columns['cdz_location_categories']		= __( 'Categories', 'cdz' );
		$columns['cdz_location_featured']		= __( 'Featured', 'cdz' );
		$columns['menu_order']					= __( 'Order', 'cdz' );
		//$columns['date']						= __( 'Date', 'cdz' );

  		return $columns;

	}

	function manage_posts_custom_column( $name ) {
		
		global $post;

		if	( $name == 'cdz_location_thumb' )			{ echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); }
		else if	( $name == 'cdz_location_groups' )		{ the_terms( $post->ID, 'cdz_location_group', '', ', ' ); }
		else if	( $name == 'cdz_location_categories' )	{ the_terms( $post->ID, 'cdz_location_category', '', ', ' ); }
		else if	( $name == 'cdz_location_featured' )	{ echo get_post_meta( $post->ID, 'cdz_location_featured', true ) ? __( 'Yes', 'cdz' ) : __( 'No', 'cdz' ); }
		else if	( $name == 'menu_order' )				{ echo $post->menu_order; }

	}

	function manage_sortable_columns( $columns ) {

		$columns['menu_order'] = 'menu_order';
		$columns['cdz_location_featured'] = 'cdz_location_featured';

		return $columns;

	}

}