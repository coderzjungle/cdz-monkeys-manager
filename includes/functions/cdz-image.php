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

if ( ! function_exists( 'cdz_image' ) ) {

	function cdz_image( $attach_id = NULL, $img_url = NULL, $width = '', $height = '', $margin = '', $crop = FALSE ) {

		global $cdz_is_retina;
		global  $cdz_template;

		if ( $width == '' ) {

			$width = $container_width = (int) cdz_get_option( 'opt_grid_container_max_width' ) - 40;
			$template_sidebars = cdz_get_sidebars( $cdz_template );
			$single_column_width = $container_width / 100 * 8.33333333333;

			if ( isset( $template_sidebars['left'] ) &&  $template_sidebars['left'] != 'none' ) $width -= $template_sidebars['left_cols'] * $single_column_width;
			if ( isset( $template_sidebars['right'] ) &&  $template_sidebars['right'] != 'none' ) $width -= $template_sidebars['right_cols'] * $single_column_width;

			$width -= 30; // column padding

			if ( $margin > 0 ) { $width -= $margin; }

		}

		$width = absint( $width );
		$height = absint( $height );

		if( $cdz_is_retina ) {

			$r_width = $width * 2;
			$r_height = $height * 2;

			$image = cdz_image_resize( $attach_id, $img_url, $width, $height, $crop );

			$image['width'] = $r_width;
			$image['height'] = $r_height;

			return $image;

		} else {

			return cdz_image_resize( $attach_id, $img_url, $width, $height, $crop );
		}

	}

}

/*
	<?php
	$thumb = get_post_thumbnail_id();
	$image = cdz_image( $thumb, '', 140, 110, true );
	?>
	<img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" />
*/