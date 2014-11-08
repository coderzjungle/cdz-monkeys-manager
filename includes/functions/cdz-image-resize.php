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
 *	cdzFunction: Image Resize
 */

if ( ! function_exists( 'cdz_image_resize') ) {
	
	function cdz_image_resize( $attach_id = NULL, $img_url = NULL, $width = 99999, $height = 99999, $crop = FALSE ) {

		$image_src = NULL;

		/*
		 *	This is an attachment, so we have the ID
		 */

		if ( $attach_id ) {

			$image_src = wp_get_attachment_image_src( $attach_id, 'full' );
			$file_path = get_attached_file( $attach_id );

		/*
		 *	This is not an attachment, let's use the image url
		 */

		} else if ( $img_url ) {

			$file_path = parse_url( $img_url );
			$file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];

			/*
			 *	Look for Multisite Path
			 */

			if ( file_exists( $file_path ) === false ) {

				global $blog_id;
				$file_path = parse_url( $img_url );

				$path = explode( '/', $file_path['path'] );

				if ( preg_match( "/uploads/", $file_path['path'] ) ) {

					foreach ( $path as $k=>$v ) {

						if ( $v == 'files' ){ $path[$k-1] = 'wp-content/blogs.dir/' . $blog_id; }

					}

				}

				if ( $path[2] == 'wp-content' ) { unset($path[1]); }
				else { unset($path[2]); }

				$path = implode( '/', $path );
				$file_path = $_SERVER['DOCUMENT_ROOT'] . $path;

			}

			//$file_path = ltrim( $file_path['path'], '/' );
			//$file_path = rtrim( ABSPATH, '/' ).$file_path['path'];

			$orig_size = getimagesize( $file_path );

			$image_src[0] = $img_url;
			$image_src[1] = $orig_size[0];
			$image_src[2] = $orig_size[1];

		}

		if ( isset( $file_path ) ) { $file_info = pathinfo( $file_path ); }

		if ( isset( $file_info['dirname'] ) AND isset( $file_info['filename'] ) AND isset( $file_info['extension'] ) ) {

			/*
			 *	Check if file exists
			 */

			$base_file = $file_info['dirname'] . '/' . $file_info['filename'] . '.' . $file_info['extension'];
			if ( !file_exists( $base_file ) ) { return; }

			$extension = '.' . $file_info['extension'];

			/*
			 *	The image path without the extension
			 */

			$no_ext_path = $file_info['dirname'] . '/' . $file_info['filename'];

		}

		if ( isset( $no_ext_path ) AND isset( $extension ) ) {
			
			$cropped_img_path = $no_ext_path . '-' . $width . 'x' . $height . $extension;

		}

		/*
		 *	Checking if the file size is larger than the target size, if it is smaller or the same size, stop right here and return
		 */

		if ( isset( $image_src ) AND $image_src[1] > $width ) {

			/*
			 *	The file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
			 */

			if ( file_exists( $cropped_img_path ) ) {

				$cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );

				$cdz_image = array (
					'url' => $cropped_img_url,
					'width' => $width,
					'height' => $height
				);

				return $cdz_image;

			}

			/*
			 *	$crop = false or no height set
			 */

			if ( $crop == false OR !$height ) {

				/*
				 *	Calculate the size proportionaly
				 */

				$proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
				$resized_img_path = $no_ext_path . '-' . $proportional_size[0] . 'x' . $proportional_size[1] . $extension;

				/*
				 *	Checking if the file already exists
				 */

				if ( file_exists( $resized_img_path ) ) {

					$resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );

					$cdz_image = array (
						'url' => $resized_img_url,
						'width' => $proportional_size[0],
						'height' => $proportional_size[1]
					);

					return $cdz_image;

				}

			}

			/*
			 *	Check if image width is smaller than set width
			 */

			$img_size = getimagesize( $file_path );
			if ( $img_size[0] <= $width ) $width = $img_size[0];

			/*
			 *	Check if GD Library installed
			 */

			if ( ! function_exists ('imagecreatetruecolor') ) {
			    echo 'GD Library Error: imagecreatetruecolor does not exist - please contact your webhost and ask them to install the GD library';
			    return;
			}

			/*
			 *	No cache files - let's finally resize it
			 */

			$new_img_path = @image_resize( $file_path, $width, $height, $crop );	// *** DEPRECATED ***	
			$new_img_size = getimagesize( $new_img_path );
			$new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );

			/*
			 *	Resized output
			 */

			$cdz_image = array (
				'url' => $new_img,
				'width' => $new_img_size[0],
				'height' => $new_img_size[1]
			);

			return $cdz_image;

		}

		/*
		 *	Default output - without resizing
		 */

		$cdz_image = array (
			'url' => $image_src[0],
			'width' => $width,
			'height' => $height
		);

		return $cdz_image;
		
	}

}
