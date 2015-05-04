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
		 *	App
		 */

		$app = FALSE;
		if ( ( isset( $_GET['app'] ) AND $_GET['app'] == 1 ) OR
			( isset( $_POST['app'] ) AND $_POST['app'] == 1 ) ) { $app = TRUE; }

		/*
		 *	Set permalink
		 */

		$permalink = '';
		if ( isset( $_GET['url'] ) AND $_GET['url'] != '' ) { $permalink = $_GET['url']; }
		else if ( isset( $_POST['url'] ) AND $_POST['url'] != '' ) { $permalink = $_POST['url']; }
		else { $permalink = '/'; }

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

				if ( $app ) {

					$template_path = get_template_directory() . '/app.php';

				} else {

					$template_path = get_template_directory() . '/' . $post_type . '.php';
					if ( ! file_exists( $template_path ) ) { $template_path = 'templates/' . $post_type . '.php'; }

				}

				if ( file_exists( $template_path ) ) { include $template_path; }
				else { echo __( 'Ooops! Template not found...', 'cdz' ); }

			endwhile;

		} else {

			if ( file_exists( get_template_directory() . '/front-page.php' ) ) {

				include get_template_directory() . '/front-page.php';

			} else if ( file_exists( get_template_directory() . '/home.php' ) ) {

				include get_template_directory() . '/home.php';

			} else if ( file_exists( get_template_directory() . '/index.php' ) ) {

				include get_template_directory() . '/index.php';

			} else {

				echo 'Ooops! This is not a valid permalink...';

			}

		}

	}

}