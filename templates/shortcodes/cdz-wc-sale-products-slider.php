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
 *	cdzTemplate: WooCommerce Sale Products Slider
 */

$rand_num = rand( 00000, 99999 );


if ( ! empty( $title ) ) { echo '<h2>' . $title . '</h2>'; }

?>

<div class="cdz-buttons-wrapper">
	<div id="cdz-wc-sale-products-slider-<?php echo $rand_num; ?>" class="cdz-wc-sale-products-slider swiper-container">

		<ul class="products swiper-wrapper">
			<?php

			$product_ids_on_sale = wc_get_product_ids_on_sale();
			$meta_query = WC()->query->get_meta_query();

			$args = array(
				'post_type'				=> 'product',
				'post_status'			=> 'publish',
				'ignore_sticky_posts'	=> 1,
				'meta_key'				=> 'total_sales',
				'orderby'				=> 'meta_value_num',
				'posts_per_page'		=> $number,
				'meta_query' 			=> $meta_query,
				'post__in'				=> array_merge( array( 0 ), $product_ids_on_sale ),
			);

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

	</div>

	<div id="cdz-button-arrow-left-<?php echo $rand_num; ?>" class="cdz-button-arrow cdz-button-arrow-left"></div>
	<div id="cdz-button-arrow-right-<?php echo $rand_num; ?>" class="cdz-button-arrow cdz-button-arrow-right"></div>

</div>

<script>
	var mySwiper = new Swiper('#cdz-wc-sale-products-slider-<?php echo $rand_num; ?>', {

		slidesPerView: <?php echo empty( $columns ) ? 4 : $columns; ?>,
		speed: <?php echo empty( $speed ) ? 300 : $speed; ?>,
		autoplay: <?php echo empty( $autoplay ) ? 0 : $autoplay; ?>,

		prevButton: '#cdz-button-arrow-left-<?php echo $rand_num; ?>',
		nextButton: '#cdz-button-arrow-right-<?php echo $rand_num; ?>',
		spaceBetween: 30,
		loop: true,

	}); 
</script>