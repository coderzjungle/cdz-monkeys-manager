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
 *	cdzFunction: Get Option
 */

if ( ! function_exists( 'cdz_instant_loader' ) ) {

	function cdz_instant_loader() {

		/*
		 *	Set permalink
		 */

		$permalink = '';

		if ( isset( $_GET['cdz_permalink'] ) AND $_GET['cdz_permalink'] != '' ) {

			$permalink = $_GET['cdz_permalink'];

		} else if ( isset( $_POST['cdz_permalink'] ) AND $_POST['cdz_permalink'] != '' ) {

			$permalink = $_GET['cdz_permalink'];

		} else {

			$permalink = '/';
		}

		/*
		 *	Get post
		 */

		$post_id = url_to_postid( $permalink );

		if ( isset( $post_id ) && $post_id > 0 ) {

			$post = get_post( $post_id );
			$post_type = get_post_type( $post );

			/*
			 *	Get template
			 */

			query_posts( 'p' . ( ( $post_type == 'page' ) ? 'age_id' : '' ) . '=' . $post_id . '&post_type=any' );

			while ( have_posts() ) : the_post();

				$template_path = get_template_directory() . '/cdz-instant-loader/' . $post_type . '.php';
				if ( ! file_exists( $template_path ) ) { $template_path = 'templates/' . $post_type . '.php'; }

				if ( file_exists( $template_path ) ) { include $template_path; }
				else { echo __( 'Ooops! Template not found...', 'cdz' ); }

			endwhile;

		} else {

			echo 'Ooops! This is not a "post" or "page" valid permalink...';

		}

	}

}