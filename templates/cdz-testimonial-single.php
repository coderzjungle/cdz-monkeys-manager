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
 *	cdzTemplate: Single Testimonial
 */

$cdz_testimonial_title			= $post->post_title;
$cdz_testimonial_content		= $post->post_content;

$cdz_testimonial_author_name	= get_post_meta( $post->ID, 'cdz_testimonial_author_name', true );
$cdz_testimonial_author_role	= get_post_meta( $post->ID, 'cdz_testimonial_author_role', true );
$cdz_testimonial_author_vote	= get_post_meta( $post->ID, 'cdz_testimonial_author_vote', true );
$cdz_testimonial_website_url	= get_post_meta( $post->ID, 'cdz_testimonial_website_url', true );

get_header();

do_action( 'cdz_prepost_content', 'cdz-testimonial-single', 'pre' );

if ( is_single() ) : ?>

	<article id="<?php echo cdz_function_to_slug( get_post_type() ); ?>-<?php the_ID(); ?>" <?php post_class( 'cdz-style-small-thumbnail cdz-template-small-thumbnail' ); ?>>

		<?php include dirname( __FILE__ ) . '/parts/small-thumbnail.php'; ?>

		<div class="entry-meta">

			<?php if ( $cdz_testimonial_author_vote ) : ?>

				<p class="vote stars-<?php echo $cdz_testimonial_author_vote; ?>">
					<i class="fa fa-star"></i>
					<span class="label"><?php echo __( 'Vote' ); ?>:</span>
					<span class="text"><?php echo $cdz_testimonial_author_vote; ?></span>
				</p>

			<?php endif; ?>

			<?php if ( $cdz_testimonial_author_name ) : ?>

				<p class="author">
					<i class="fa fa-user"></i>
					<span class="label"><?php echo __( 'Author' ); ?>:</span>
					<span class="text"><?php echo $cdz_testimonial_author_name; ?></span>
				</p>

			<?php endif; ?>

			<?php if ( $cdz_testimonial_author_role ) : ?>

				<p class="role">
					<i class="fa fa-briefcase"></i>
					<span class="label"><?php echo __( 'Role' ); ?>:</span>
					<span class="text"><?php echo $cdz_testimonial_author_role; ?></span>
				</p>

			<?php endif; ?>

			<?php if ( $cdz_testimonial_website_url ) : ?>

				<p class="website">
					<i class="fa fa-globe"></i>
					<span class="label"><?php echo __( 'Website' ); ?>:</span>
					<span class="text"><a href="<?php echo esc_url( $cdz_testimonial_website_url ); ?>"><?php echo $cdz_testimonial_website_url; ?></a></span>
				</p>

			<?php endif; ?>

		</div>

		<div class="clear"></div>

	</article>

<?php endif;

do_action( 'cdz_prepost_content', 'cdz-testimonial-single', 'post' );

get_footer();