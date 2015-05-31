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
 *	cdzTemplate: WooCommerce Products Slider
 */

$rand_num = rand( 00000, 99999 );


if ( ! empty( $title ) ) { echo '<h2>' . $title . '</h2>'; }

?>

<div id="cdz-wc-products-slider-<?php echo $rand_num; ?>" class="cdz-wc-products-slider swiper-container">


	<ul class="products swiper-wrapper">
		<?php

		$args = array(
			'post_type'				=> 'product',
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1,
			'orderby'				=> $orderby,
			'order'					=> $order,
			'posts_per_page'		=> $number,
		);

		if ( ! empty( $skus ) ) {
			$skus = explode( ',', $skus );
			$skus = array_map( 'trim', $skus );
			$args['meta_query'][] = array(
				'key' 		=> '_sku',
				'value' 	=> $skus,
				'compare' 	=> 'IN'
			);
		}

		if ( ! empty( $ids ) ) {
			$ids = explode( ',', $ids );
			$ids = array_map( 'trim', $ids );
			$args['post__in'] = $ids;
		}

		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();

				echo '<div class="swiper-slide">';
				wc_get_template_part( 'content', 'product' );
				echo '</div>';

			endwhile;
		} else { echo __( 'No products found!', 'cdz' ); }
		wp_reset_postdata();

		?>
	</ul>

	<div class="swiper-pagination"></div>
	<div id="cdz-wc-products-slider-button-prev-<?php echo $rand_num; ?>" class="swiper-button-prev"></div>
	<div id="cdz-wc-products-slider-button-next-<?php echo $rand_num; ?>" class="swiper-button-next"></div>

</div>

<script>
	var mySwiper = new Swiper('#cdz-wc-products-slider-<?php echo $rand_num; ?>', {

		loop: true,
		slidesPerView: <?php echo empty( $columns ) ? 4 : $columns; ?>,
		speed: <?php echo empty( $speed ) ? 300 : $speed; ?>,

        nextButton: '#cdz-wc-products-slider-button-next-<?php echo $rand_num; ?>',
        prevButton: '#cdz-wc-products-slider-button-prev-<?php echo $rand_num; ?>',
		spaceBetween: 30,

	}); 
</script>