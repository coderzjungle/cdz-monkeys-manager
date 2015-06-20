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
 *	cdzTemplate: Single Work
 */

$cdz_work_title				= $post->post_title;
$cdz_work_content			= $post->post_content;

$cdz_work_customer_label	= get_post_meta( $post->ID, 'cdz_work_customer_label', true );
$cdz_work_customer			= get_post_meta( $post->ID, 'cdz_work_customer', true );
$cdz_work_website_label		= get_post_meta( $post->ID, 'cdz_work_website_label', true );
$cdz_work_website_url		= get_post_meta( $post->ID, 'cdz_work_website_url', true );
$cdz_work_skills_label		= get_post_meta( $post->ID, 'cdz_work_skills_label', true );
$cdz_work_skills			= get_post_meta( $post->ID, 'cdz_work_skills', true );

get_header();

do_action( 'cdz_prepost_content', 'cdz-work-single', 'pre' );

if ( is_single() ) : ?>

	<article id="<?php echo cdz_function_to_slug( get_post_type() ); ?>-<?php the_ID(); ?>" <?php post_class( 'cdz-style-big-thumbnail cdz-template-big-thumbnail' ); ?>>

		<?php include dirname( __FILE__ ) . '/parts/big-thumbnail.php'; ?>

		<div class="entry-meta">

			<?php if ( $cdz_work_customer ) : ?>

				<p class="customer">
					<i class="fa fa-user"></i>
					<span class="label"><?php echo $cdz_work_customer_label ? $cdz_work_customer_label : __( 'Customer' ) . ': '; ?></span>
					<span class="text"><?php echo $cdz_work_customer; ?></span>
				</p>

			<?php endif; ?>

			<?php if ( $cdz_work_website_url ) : ?>

				<p class="website">
					<i class="fa fa-globe"></i>
					<span class="label"><?php echo $cdz_work_website_label ? $cdz_work_website_label : __( 'Website' ) . ': '; ?></span>
					<span class="text"><a href="<?php echo esc_url( $cdz_work_website_url ); ?>"><?php echo $cdz_work_website_url; ?></a></span>
				</p>

			<?php endif; ?>

			<?php if ( $cdz_work_skills ) : ?>

				<p class="skills">
					<i class="fa fa-tasks"></i>
					<span class="label"><?php echo $cdz_work_skills_label ? $cdz_work_skills_label : __( 'Skills' ) . ': '; ?></span>
					<span class="text"><?php echo $cdz_work_skills; ?></span>
				</p>

			<?php endif; ?>

		</div>

		<div class="clear"></div>

	</article>

<?php endif;

do_action( 'cdz_prepost_content', 'cdz-work-single', 'post' );

get_footer();