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
 *	cdzShortcode: Testimonials
 */

if ( ! function_exists( 'cdz_sc_testimonials' ) ) {

	function cdz_sc_testimonials( $atts = NULL ) {
		
		/*
		 *	Values
		 */

		extract( shortcode_atts( array(

			'style'	=> 'small-thumbnail',

		), $atts) );

		/*
		 *	Shortcode
		 */

		global $post;

		$the_query = new WP_Query( array(

			'post_type' => 'cdz_testimonial',
			'posts_per_page' => 10,

		));

		ob_start();

		if ( $the_query->have_posts() ) : ?>

			<div class="cdz-shortcode cdz-testimonials">

				<?php

				while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<article id="<?php echo cdz_function_to_slug( get_post_type() ); ?>-<?php the_ID(); ?>" <?php post_class( 'cdz-style-' . $style . ' cdz-template-' . cdz_get_template_part_name( $style ) ); ?>>

						<?php include CDZ_PLUGIN_PATH . '/templates/parts/' . cdz_get_template_part_name( $style ) . '.php'; ?>

						<div class="clear"></div>

					</article>
					
				<?php endwhile; ?>
				
				<div class="clear"></div>

			</div>

		<?php else : ?>

			<div class="cdz-shortcode no-posts"><p><?php echo __( 'No testimonials' ); ?>...</p></div>

		<?php

		endif;

		return ob_get_clean();

	}

	add_shortcode( 'cdz_testimonials', 'cdz_sc_testimonials' );

}