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
 *	cdzWidget: Social Widget
 */

if ( ! class_exists( 'cdz_Social_Widget' ) ) {

	class cdz_Social_Widget extends WP_Widget {

		/*
		 *	Register widget with WordPress.
		 */

		function __construct() {
			parent::__construct(
				'cdz-social-widget',										// Base ID
				__('cdz Social Widget', 'cdz'),								// Name
				array( 'description' => __( 'A sample widget', 'cdz' ), )	// Args
			);
		}

		/*
		 *	Back-end widget form.
		 */

		public function form( $instance ) {

			$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
			$facebook_username = isset( $instance[ 'facebook_username' ] ) ? $instance[ 'facebook_username' ] : '';
			$twitter_username = isset( $instance[ 'twitter_username' ] ) ? $instance[ 'twitter_username' ] : '';
			$feed_rss_link = isset( $instance[ 'feed_rss_link' ] ) ? $instance[ 'feed_rss_link' ] : '';

			?>

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'cdz' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'facebook_username' ); ?>"><?php _e( 'Facebook page username', 'cdz' ); ?>:</label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'facebook_username' ); ?>" name="<?php echo $this->get_field_name( 'facebook_username' ); ?>" type="text" value="<?php echo esc_attr( $facebook_username ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'twitter_username' ); ?>"><?php _e( 'Twitter username', 'cdz' ); ?>:</label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'twitter_username' ); ?>" name="<?php echo $this->get_field_name( 'twitter_username' ); ?>" type="text" value="<?php echo esc_attr( $twitter_username ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'feed_rss_link' ); ?>"><?php _e( 'Feed RSS link', 'cdz' ); ?>:</label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'feed_rss_link' ); ?>" name="<?php echo $this->get_field_name( 'feed_rss_link' ); ?>" type="text" value="<?php echo esc_attr( $feed_rss_link ); ?>" />
			</p>
			
			<?php 
		}

		/*
		 *	Sanitize widget form values as they are saved
		 */

		public function update( $new_instance, $old_instance ) {

			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['facebook_username'] = ( ! empty( $new_instance['facebook_username'] ) ) ? strip_tags( $new_instance['facebook_username'] ) : '';
			$instance['twitter_username'] = ( ! empty( $new_instance['twitter_username'] ) ) ? strip_tags( $new_instance['twitter_username'] ) : '';
			$instance['feed_rss_link'] = ( ! empty( $new_instance['feed_rss_link'] ) ) ? strip_tags( $new_instance['feed_rss_link'] ) : '';

			return $instance;
		}

		/*
		 *	Front-end display of widget.
		 */

		public function widget( $args, $instance ) {

			echo $args['before_widget'];
			
			?>

			<h3><?php echo ( isset( $instance['title'] ) && $instance['title'] != '' ) ? $instance['title'] : 'Socials'; ?></h3>

			<ul class="cdz-social-widget">
				<li class="facebook cclear">
					<a href="//facebook.com/<?php echo $instance['facebook_username']; ?>" class="button" target="_blank">Like</a>
					<h4>Become a fan</h4>
					<p>on Facebook</p>
				</li>
				<li class="twitter cclear">
					<a href="//twitter.com/<?php echo $instance['twitter_username']; ?>" class="button" target="_blank">Follow</a>
					<h4>Follow us</h4>
					<p>on Twitter</p>
				</li>
				<li class="rss cclear">
					<a href="<?php echo $instance['feed_rss_link']; ?>" class="button" target="_blank">Subscribe</a>
					<h4>Subscribe us</h4>
					<p>to RSS Feed</p>
				</li>
			</ul>

			<?php

			echo $args['after_widget'];

		}

	}

	/*
	 *	Register Widget
	 */

	add_action( 'widgets_init', create_function( '', 'register_widget( "cdz_Social_Widget" );' ) );

}