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
 *	cdzTemplatePart: Small Thumbnail
 */

if ( get_post_thumbnail_id() ) : ?>

	<div class="thumb">

		<?php

		if ( ! isset( $style ) ) { $style = 'small-thumbnail'; }

		$thumb = cdz_image(
			get_post_thumbnail_id(),
			'',
			apply_filters( 'cdz_thumb_width_' . $style, '300' ),
			apply_filters( 'cdz_thumb_height_' . $style, '300' ),
			apply_filters( 'cdz_thumb_margin_' . $style, '' ),
			apply_filters( 'cdz_thumb_crop_' . $style, TRUE )
		);
		$thumb = '<img src="' . $thumb['url'] . '" width="' . $thumb['width'] . '" height="' . $thumb['height'] . '" alt="' . get_the_title() . '" class="thumb-img" />';

		if ( is_single() ) {echo $thumb; }
		else { echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $thumb . '</a>'; }

		?>

	</div>

<?php endif; ?>

<header class="entry-header">

	<?php

	if ( is_single() ) { the_title( '<h1 class="entry-title">', '</h1>' ); }
	else { the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); }

	?>

</header>

<?php if ( is_single() ) : ?>

	<div class="entry-content"><?php echo do_shortcode( wpautop( $post->post_content ) ); ?></div>

<?php else : ?>

	<div class="entry-summary"><?php global $more; $more = 0; the_content('Read more'); ?></div>

<?php endif; ?>