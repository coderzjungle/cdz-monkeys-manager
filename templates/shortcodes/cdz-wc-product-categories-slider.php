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
 *	cdzTemplate: WooCommerce Product Categories Slider
 */

$rand_num = rand( 00000, 99999 );


if ( ! empty( $title ) ) { echo '<h2>' . $title . '</h2>'; }

?>

<div class="cdz-buttons-wrapper">
	<div id="cdz-wc-product-categories-slider-<?php echo $rand_num; ?>" class="cdz-wc-product-categories-slider swiper-container">
		<ul class="products swiper-wrapper">

			<?php

			if ( isset( $ids ) ) {
				$ids = explode( ',', $ids );
				$ids = array_map( 'trim', $ids );
			} else {
				$ids = array();
			}

			$hide_empty = ( $hide_empty == true || $hide_empty == 1 ) ? 1 : 0;

			$args = array(
				'orderby'    => $orderby,
				'order'      => $order,
				'hide_empty' => $hide_empty,
				'include'    => $ids,
				'pad_counts' => true,
				'child_of'   => $parent
			);

			$product_categories = get_terms( 'product_cat', $args );

			if ( '' !== $parent ) {
				$product_categories = wp_list_filter( $product_categories, array( 'parent' => $parent ) );
			}

			if ( $hide_empty ) {
				foreach ( $product_categories as $key => $category ) {
					if ( $category->count == 0 ) {
						unset( $product_categories[ $key ] );
					}
				}
			}

			if ( $number ) { $product_categories = array_slice( $product_categories, 0, $number ); }

			$woocommerce_loop['columns'] = $columns;
			$woocommerce_loop['loop'] = $woocommerce_loop['column'] = '';

			if ( $product_categories ) {
				foreach ( $product_categories as $category ) {

					echo '<div class="swiper-slide">';
					wc_get_template( 'content-product_cat.php', array( 'category' => $category ) );
					echo '</div>';

				}
			}

			?>

		</ul>
		<div class="swiper-pagination"></div>
	</div>
	<div id="cdz-button-arrow-left-<?php echo $rand_num; ?>" class="cdz-button-arrow cdz-button-arrow-left"></div>
	<div id="cdz-button-arrow-right-<?php echo $rand_num; ?>" class="cdz-button-arrow cdz-button-arrow-right"></div>
</div>

<script>
	var mySwiper = new Swiper('#cdz-wc-product-categories-slider-<?php echo $rand_num; ?>', {

		slidesPerView: <?php echo empty( $columns ) ? 4 : $columns; ?>,
		speed: <?php echo empty( $speed ) ? 300 : $speed; ?>,
		autoplay: <?php echo empty( $autoplay ) ? 0 : $autoplay; ?>,

		prevButton: '#cdz-button-arrow-left-<?php echo $rand_num; ?>',
		nextButton: '#cdz-button-arrow-right-<?php echo $rand_num; ?>',
		spaceBetween: 30,
		loop: true,

	}); 
</script>