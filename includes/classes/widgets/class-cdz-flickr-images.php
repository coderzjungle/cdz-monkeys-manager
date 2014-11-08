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
 *	cdzWidget: Flickr Images
 */

if ( ! class_exists( 'cdz_Flickr_Images' ) ) {

	class cdz_Flickr_Images extends WP_Widget {

		/*
		 *	Register widget with WordPress.
		 */

		function __construct() {
			parent::__construct(
				'cdz-flickr-images',										// Base ID
				__('cdz Flickr Images', 'cdz'),								// Name
				array( 'description' => __( 'Get Flickr images', 'cdz' ), )	// Args
			);
		}

		/*
		 *	Back-end widget form.
		 */

		public function form( $instance ) {

			$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
			$flickr_id = isset( $instance[ 'flickr_id' ] ) ? $instance[ 'flickr_id' ] : '';
			$img_size = isset( $instance[ 'img_size' ] ) ? $instance[ 'img_size' ] : 's';
			$img_numb = isset( $instance[ 'img_numb' ] ) ? $instance[ 'img_numb' ] : '6';

			?>

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'cdz' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'flickr_id' ); ?>"><?php _e( 'Flickr ID', 'cdz' ); ?> ( <a href="//idgettr.com" target="_blank">idgettr.com</a> ):</label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'flickr_id' ); ?>" name="<?php echo $this->get_field_name( 'flickr_id' ); ?>" type="text" value="<?php echo esc_attr( $flickr_id ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'img_size' ); ?>"><?php _e( 'Image thumbnail', 'cdz' ); ?>:</label>
				<select id="<?php echo $this->get_field_id( 'img_size' ); ?>" name="<?php echo $this->get_field_name( 'img_size' ); ?>">
					<option value="s" <?php selected( $img_size, 's' ); ?>>Small</option>
					<option value="m" <?php selected( $img_size, 'm' ); ?>>Medium</option>
				</select>

				<!--<input class="widefat" id="<?php echo $this->get_field_id( 'img_size' ); ?>" name="<?php echo $this->get_field_name( 'img_size' ); ?>" type="text" value="<?php echo esc_attr( $img_size ); ?>" />-->
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'img_numb' ); ?>"><?php _e( 'Number of images to show', 'cdz' ); ?>:</label> 
				<input id="<?php echo $this->get_field_id( 'img_numb' ); ?>" name="<?php echo $this->get_field_name( 'img_numb' ); ?>" type="text" value="<?php echo (int) $img_numb; ?>" size="3" />
			</p>
			
			<?php 
		}

		/*
		 *	Sanitize widget form values as they are saved
		 */

		public function update( $new_instance, $old_instance ) {

			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['flickr_id'] = ( ! empty( $new_instance['flickr_id'] ) ) ? strip_tags( $new_instance['flickr_id'] ) : '';
			$instance['img_size'] = ( ! empty( $new_instance['img_size'] ) ) ? strip_tags( $new_instance['img_size'] ) : '';
			$instance['img_numb'] = ( ! empty( $new_instance['img_numb'] ) ) ? strip_tags( $new_instance['img_numb'] ) : '';

			return $instance;

		}

		/*
		 *	Front-end display of widget.
		 */

		public function widget( $args, $instance ) {

			echo $args['before_widget'];
			
			?>

			<h3><?php echo ( isset( $instance['title'] ) && $instance['title'] != '' ) ? $instance['title'] : 'Flickr Images'; ?></h3>

			<ul class="cdz-flickr-images cclear"></ul>

			<script type="text/javascript">

				jQuery( document ).ready( function() {

					var flickrID = "<?php echo ( isset( $instance['flickr_id'] ) && $instance['flickr_id'] != '' ) ? $instance['flickr_id'] : '52617155@N08'; ?>"; // idgettr.com
					var img_size = "<?php echo ( isset( $instance['img_size'] ) && $instance['img_size'] != '' ) ? $instance['img_size'] : s; ?>";
					var img_numb = <?php echo ( isset( $instance['img_numb'] ) && $instance['img_numb'] != '' ) ? (int) $instance['img_numb'] : '6'; ?>;

					jQuery.getJSON( 'http://api.flickr.com/services/feeds/photos_public.gne?id=' + flickrID + '&size=b&lang=en-us&format=json&jsoncallback=?', function(data) {
						jQuery.each( data.items, function( i, item ) {

							var img = ( item.media.m );
							if ( img_size == 's' ) { img = img.replace( '_m.jpg', '_s.jpg' ); }

							var imageID = img.split('_');
							imageID = imageID[0].split('/');
							imageID = imageID[imageID.length-1];

							var html = '<li class="size-' + img_size + '"><a href="//www.flickr.com/photos/' + flickrID + '/' + imageID + '" target="_blank"><img src="' + img + '"/></li></a>';
							jQuery('.cdz-flickr-images').append( html );

							if ( img_numb == ( i + 1 ) ) { return false; }

						});
					});
				});

			</script>

			<?php

			echo $args['after_widget'];

		}

	}

	/*
	 *	Register Widget
	 */

	add_action( 'widgets_init', create_function( '', 'register_widget( "cdz_Flickr_Images" );' ) );

}