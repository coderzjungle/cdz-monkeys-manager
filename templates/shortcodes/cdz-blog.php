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
 *	cdzTemplate: Blog
 */

$rand_num = rand( 00000, 99999 );

if ( ! empty( $title ) ) { echo '<h2>' . $title . '</h2>'; }

?>

<div class="cdz-blog">

	<?php

	$args = array(
		'post_type'				=> 'post',
		'post_status'			=> 'publish',
		'ignore_sticky_posts'	=> 1,
		'orderby'				=> 'meta_value_num',
		'posts_per_page'		=> $number,
	);

	$post = new WP_Query( $args );
	if ( $post->have_posts() ) {
		while ( $post->have_posts() ) : $post->the_post(); ?>

			<article id="<?php echo cdz_function_to_slug( get_post_type() ); ?>-<?php the_ID(); ?>" <?php post_class( 'cdz-style-' . $style . ' cdz-template-' . cdz_get_template_part_name( $style ) ); ?>>
				<?php include cdz_get_template( '', 'parts/' . cdz_get_template_part_name( $style ) . '.php' ); ?>
				<div class="clear"></div>
			</article>

		<?php endwhile;
	} else { echo __( 'No posts found!', 'cdz' ); }
	// wp_reset_postdata();

	?>

	<div class="cdz-blog-pagination"></div>

</div>

<script>
	
</script>