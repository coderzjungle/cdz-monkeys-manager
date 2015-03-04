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
 *	Theme init
 */

add_action( 'cdz_theme_init', 'cdz_theme_init_woocommerce' );

function cdz_theme_init_woocommerce() {

	/*
	 *	Hooks
	 */

	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'cdz_woocommerce_template_loop_product_thumbnail', 10 );

	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
	add_action( 'woocommerce_before_single_product_summary', 'cdz_woocommerce_show_product_images', 20 );

	remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
	add_action( 'woocommerce_product_thumbnails', 'cdz_woocommerce_show_product_thumbnails', 20 );

}

/*
 *	Woocommerce Loop Product Thumbnail	
 */

function cdz_woocommerce_template_loop_product_thumbnail() {

	global $post, $woocommerce, $product;

	$shop_catalog_image_size = get_option( 'shop_catalog_image_size' );

	$width = $shop_catalog_image_size['width'] > 0 ? $shop_catalog_image_size['width'] : 300;
	$height =  $shop_catalog_image_size['height'] > 0 ? $shop_catalog_image_size['height'] : 300;
	$crop =  $shop_catalog_image_size['crop'] > 0 ? $shop_catalog_image_size['crop'] : TRUE;

	$thumb = cdz_image(
		get_post_thumbnail_id(),
		'',
		apply_filters( 'cdz_woocommerce_loop_product_thumb_width', $width ),
		apply_filters( 'cdz_woocommerce_loop_product_thumb_height', $height ),
		apply_filters( 'cdz_woocommerce_loop_product_thumb_margin', '' ),
		apply_filters( 'cdz_woocommerce_loop_product_thumb_crop', $crop )
	);

	echo '<img src="' . $thumb['url'] . '" width="' . $thumb['width'] . '" height="' . $thumb['height'] . '" alt="' . get_the_title() . '" class="thumb-img" />';

}

/*
 *	Woocommerce Single Product Image	
 */

function cdz_woocommerce_show_product_images() {

	global $post, $woocommerce, $product;

	$shop_single_image_size = get_option( 'shop_single_image_size' );

	$width = $shop_single_image_size['width'] > 0 ? $shop_single_image_size['width'] : 300;
	$height =  $shop_single_image_size['height'] > 0 ? $shop_single_image_size['height'] : 300;
	$crop =  $shop_single_image_size['crop'] > 0 ? $shop_single_image_size['crop'] : TRUE;

	$thumb = cdz_image(
		get_post_thumbnail_id(),
		'',
		apply_filters( 'cdz_woocommerce_single_product_image_width', $width ),
		apply_filters( 'cdz_woocommerce_single_product_image_height', $height ),
		apply_filters( 'cdz_woocommerce_single_product_image_margin', '' ),
		apply_filters( 'cdz_woocommerce_single_product_image_crop', $crop )
	);

	$thumb = '<img src="' . $thumb['url'] . '" width="' . $thumb['width'] . '" height="' . $thumb['height'] . '" alt="' . get_the_title() . '" class="thumb-img" />';

	/*
	 *	Customized Woocommerce Code
	 */

	echo '<div class="images">';

	if ( has_post_thumbnail() ) {

		$image_title = esc_attr( get_the_title( get_post_thumbnail_id() ) );
		$image_link  = wp_get_attachment_url( get_post_thumbnail_id() );
		$image       = $thumb;

		$attachment_count = count( $product->get_gallery_attachment_ids() );

		if ( $attachment_count > 0 ) { $gallery = '[product-gallery]'; }
		else { $gallery = ''; }

		echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_title, $image ), $post->ID );

	} else {

		echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );

	}
	
	do_action( 'woocommerce_product_thumbnails' );

	echo '</div>';

}

/*
 *	Woocommerce Single Product Thumbnails	
 */

function cdz_woocommerce_show_product_thumbnails() {

	global $post, $woocommerce, $product;

	$shop_thumbnail_image_size = get_option( 'shop_thumbnail_image_size' );

	$width = $shop_thumbnail_image_size['width'] > 0 ? $shop_thumbnail_image_size['width'] : 300;
	$height =  $shop_thumbnail_image_size['height'] > 0 ? $shop_thumbnail_image_size['height'] : 300;
	$crop =  $shop_thumbnail_image_size['crop'] > 0 ? $shop_thumbnail_image_size['crop'] : TRUE;

	$thumb = cdz_image(
		get_post_thumbnail_id(),
		'',
		apply_filters( 'cdz_woocommerce_single_product_thumb_width', $width ),
		apply_filters( 'cdz_woocommerce_single_product_thumb_height', $height ),
		apply_filters( 'cdz_woocommerce_single_product_thumb_margin', '' ),
		apply_filters( 'cdz_woocommerce_single_product_thumb_crop', $crop )
	);

	$thumb = '<img src="' . $thumb['url'] . '" width="' . $thumb['width'] . '" height="' . $thumb['height'] . '" alt="' . get_the_title() . '" class="thumb-img" />';

	/*
	 *	Customized Woocommerce Code
	 */

	$attachment_ids = $product->get_gallery_attachment_ids();

	if ( $attachment_ids ) {

		echo '<div class="thumbnails">';

		$loop = 0;
		$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );

		foreach ( $attachment_ids as $attachment_id ) {

			$classes = array( 'zoom' );

			if ( $loop == 0 || $loop % $columns == 0 ) { $classes[] = 'first'; }
			if ( ( $loop + 1 ) % $columns == 0 ) { $classes[] = 'last'; }

			$image_link = wp_get_attachment_url( $attachment_id );

			if ( ! $image_link ) { continue; }

			$image       = $thumb;
			$image_class = esc_attr( implode( ' ', $classes ) );
			$image_title = esc_attr( get_the_title( $attachment_id ) );

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a>', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );

			$loop++;
		}

		echo '</div>';
		
	}

}