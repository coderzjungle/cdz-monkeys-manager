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
 *	cdzTemplate: Single Service
 */

$cdz_service_title				= $post->post_title;
$cdz_service_content			= $post->post_content;

$cdz_service_custom_url_label	= get_post_meta( $post->ID, 'cdz_service_custom_url_label', true );
$cdz_service_custom_url			= get_post_meta( $post->ID, 'cdz_service_custom_url', true );

get_header();

do_action( 'cdz_prepost_content', 'cdz-service-single', 'pre' );

if ( is_single() ) : ?>

	<article id="<?php echo cdz_function_to_slug( get_post_type() ); ?>-<?php the_ID(); ?>" <?php post_class( 'cdz-style-small-thumbnail cdz-template-small-thumbnail' ); ?>>

		<?php include dirname( __FILE__ ) . '/parts/small-thumbnail.php'; ?>

		<div class="entry-meta">

			<?php if ( $cdz_service_custom_url ) : ?>

				<p class="url">
					<i class="fa fa-globe"></i>
					<span class="label"><?php echo $cdz_service_custom_url_label ? $cdz_service_custom_url_label : __( 'URL' ) . ': '; ?></span>
					<span class="text"><a href="<?php echo esc_url( $cdz_service_custom_url ); ?>"><?php echo $cdz_service_custom_url; ?></a></span>
				</p>

			<?php endif; ?>

		</div>

		<div class="clear"></div>

	</article>

<?php endif;

do_action( 'cdz_prepost_content', 'cdz-service-single', 'post' );

get_footer();