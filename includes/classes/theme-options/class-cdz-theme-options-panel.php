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
 *	cdzClass: Theme Options Panel
 */

if ( ! class_exists( 'cdz_Theme_Options_Panel' ) ) {

	class cdz_Theme_Options_Panel {

		/*
		 *	cdzFunction: Construct
		 */

		public function __construct() {
			
		}

		/*
		 *	cdzFunction: Get Tabs
		 */

		static function get_tabs() {

			$counter = 0;
			$options = cdz_Theme_Options::get_options_array();
			$menu = '';

			foreach ( $options as $value ) {

				// Heading for Navigation
				if ( $value['type'] == "heading" ) {

					$counter++;
					$class = '';
					$class = ! empty( $value['id'] ) ? $value['id'] : $value['name'];
					$class = preg_replace( '/[^a-zA-Z0-9._\-]/', '', strtolower($class) ) . '-tab';
					$menu .= '<a id="options-group-'.  $counter . '-tab" class="nav-tab ' . $class .'" title="' . esc_attr( $value['name'] ) . '" href="' . esc_attr( '#options-group-'.  $counter ) . '">' . esc_html( $value['name'] ) . '</a>';

				}

			}

			return $menu;

		}

		/*
		 *	cdzFunction: Fields
		 */

		static function fields() {

			global $allowedtags;

			$cdz_theme_options_settings = get_option( 'optionsframework' );
			$option_name = isset( $cdz_theme_options_settings['id'] ) ? $cdz_theme_options_settings['id'] : 'optionsframework';

			$settings = get_option( $option_name );
			$options = cdz_Theme_Options::get_options_array();

			$counter = 0;
			$menu = '';

			foreach ( $options as $value ) {

				$val = '';
				$select_value = '';
				$output = '';

				/*
				 *	Wrap all options
				 */

				if ( ( $value['type'] != "heading" ) && ( $value['type'] != "info" ) ) {

					/*
					 *	Keep all ids lowercase with no spaces
					 */

					$value['id'] = preg_replace( '/[^a-zA-Z0-9._\-]/', '', strtolower($value['id']) );

					$id = 'section-' . $value['id'];

					$class = 'section';

					if ( isset( $value['type'] ) ) { $class .= ' section-' . $value['type']; }
					if ( isset( $value['class'] ) ) { $class .= ' ' . $value['class']; }
					if ( ! isset( $value['std'] ) ) { $class .= ' no-std'; }

					$output .= '<div id="' . esc_attr( $id ) .'" class="' . esc_attr( $class ) . '">'."\n";

					if ( isset( $value['name'] ) ) { $output .= '<h4 class="heading">' . esc_html( $value['name'] ) . '</h4>' . "\n"; }

					if ( $value['type'] != 'editor' ) { $output .= '<div class="option">' . "\n" . '<div class="controls">' . "\n"; }
					else { $output .= '<div class="option">' . "\n" . '<div>' . "\n"; }

				}

				/*
				 *	Set default value to $val
				 */

				if ( isset( $value['std'] ) ) { $val = $value['std']; }

				/*
				 *	If the option is already saved, override $val
				 */

				if ( ( $value['type'] != 'heading' ) && ( $value['type'] != 'info') && isset( $settings[($value['id'])]) ) {

					$val = $settings[($value['id'])];
					if ( !is_array($val) ) { $val = stripslashes( $val ); }
				}

				/*
				 *	If there is a description save it for labels
				 */

				$explain_value = '';
				if ( isset( $value['desc'] ) ) { $explain_value = $value['desc']; }

				if ( has_filter( 'optionsframework_' . $value['type'] ) ) { $output .= apply_filters( 'optionsframework_' . $value['type'], $option_name, $value, $val ); }

				/*
				 *	Switch types
				 */

				switch ( $value['type'] ) {

					/*
					 *	Empty
					 */

					case 'empty':
						$output .= '';
						break;

					/*
					 *	Basic text input
					 */

					case 'text':
						$output .= '<input id="' . esc_attr( $value['id'] ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" type="text" value="' . esc_attr( $val ) . '" />';
						break;

					/*
					 *	Password input
					 */

					case 'password':
						$output .= '<input id="' . esc_attr( $value['id'] ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" type="password" value="' . esc_attr( $val ) . '" />';
						break;

					/*
					 *	Number
					 */

					case 'number':
						$output .= '<input id="' . esc_attr( $value['id'] ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" type="number" min="' . $value['restrict']['min'] . '" max="' . $value['restrict']['max'] . '" step="' . $value['restrict']['step'] . '" value="' . esc_attr( $val ) . '" />';
						break;

					/*
					 *	Textarea
					 */

					case 'textarea':
						$rows = '8';
						if ( isset( $value['settings']['rows'] ) ) {
							$custom_rows = $value['settings']['rows'];
							if ( is_numeric( $custom_rows ) ) { $rows = $custom_rows; }
						}
						$val = stripslashes( $val );
						$output .= '<textarea id="' . esc_attr( $value['id'] ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" rows="' . $rows . '">' . esc_textarea( $val ) . '</textarea>';
						break;

					/*
					 *	Select Box
					 */

					case 'select':
						if ( is_array( $value['options'] ) ) {
							$output .= '<select class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" id="' . esc_attr( $value['id'] ) . '">';
							foreach ( $value['options'] as $key => $option ) {
								$output .= '<option'. selected( $val, $key, false ) .' value="' . esc_attr( $key ) . '">' . esc_html( $option ) . '</option>';
							}
							$output .= '</select>';
						}
						break;

					/*
					 *	Select Page
					 */

					case 'select_page':
						$args = array(
							'name'       => esc_attr( $option_name . '[' . $value['id'] . ']' ),
							'id'         => esc_attr( $value['id'] ),
							'sort_order' => 'ASC',
							'echo'       => 0,
							'selected'   => ( $val ) ? $val : $value['std'],
						);
						$output .= str_replace( "'>", "'><option>-</option>", wp_dropdown_pages( $args ) ); 
						break;


					/*
					 *	Radio Box
					 */

					case "radio":
						$name = $option_name .'['. $value['id'] .']';
						foreach ($value['options'] as $key => $option) {
							$id = $option_name . '-' . $value['id'] .'-'. $key;
							$output .= '<input class="of-input of-radio" type="radio" name="' . esc_attr( $name ) . '" id="' . esc_attr( $id ) . '" value="'. esc_attr( $key ) . '" '. checked( $val, $key, false) .' /><label for="' . esc_attr( $id ) . '">' . esc_html( $option ) . '</label>';
						}
						break;

					/*
					 *	Image Selectors
					 */

					case "images":
						$name = $option_name .'['. $value['id'] .']';
						foreach ( $value['options'] as $key => $option ) {
							$selected = '';
							if ( $val != '' && ($val == $key) ) { $selected = ' of-radio-img-selected'; }
							$output .= '<input type="radio" id="' . esc_attr( $value['id'] .'_'. $key) . '" class="of-radio-img-radio" value="' . esc_attr( $key ) . '" name="' . esc_attr( $name ) . '" '. checked( $val, $key, false ) .' />';
							$output .= '<div class="of-radio-img-label">' . esc_html( $key ) . '</div>';
							$output .= '<img src="' . esc_url( $option ) . '" alt="' . $option .'" class="of-radio-img-img' . $selected .'" onclick="document.getElementById(\''. esc_attr($value['id'] .'_'. $key) .'\').checked=true;" />';
						}
						break;

					/*
					 *	Checkbox
					 */

					case "checkbox":
						$output .= '<input id="' . esc_attr( $value['id'] ) . '" class="checkbox of-input" type="checkbox" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" '. checked( $val, 1, false) .' />';
						$output .= '<label class="explain" for="' . esc_attr( $value['id'] ) . '">' . wp_kses( $explain_value, $allowedtags) . '</label>';
						break;

					/*
					 *	Multicheck
					 */

					case "multicheck":
						foreach ($value['options'] as $key => $option) {
							$checked = '';
							$label = $option;
							$option = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($key));

							$id = $option_name . '-' . $value['id'] . '-'. $option;
							$name = $option_name . '[' . $value['id'] . '][' . $option .']';

							if ( isset($val[$option]) ) { $checked = checked($val[$option], 1, false); }

							$output .= '<input id="' . esc_attr( $id ) . '" class="checkbox of-input" type="checkbox" name="' . esc_attr( $name ) . '" ' . $checked . ' /><label for="' . esc_attr( $id ) . '">' . esc_html( $label ) . '</label>';
						}
						break;

					/*
					 *	Color picker
					 */

					case "color":
						$default_color = '';
						if ( isset($value['std']) && $val !=  $value['std'] ) {	$default_color = ' data-default-color="' .$value['std'] . '" '; }
						$output .= '<input name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" id="' . esc_attr( $value['id'] ) . '" class="of-color"  type="text" value="' . esc_attr( $val ) . '"' . $default_color .' />';
						break;

					/*
					 *	Upload
					 */

					case "upload":
						$output .= self::upload( $value['id'], $val, null );
						break;

					/*
					 *	Typography
					 */

					case 'typography':

						unset( $font_size, $font_style, $font_face, $font_color );
						$typography_defaults = array(
							'size' => '',
							'face' => '',
							'style' => '',
							'color' => ''
						);
						$typography_stored = wp_parse_args( $val, $typography_defaults );
						$typography_options = array(
							'sizes' => of_recognized_font_sizes(),
							'faces' => of_recognized_font_faces(),
							'styles' => of_recognized_font_styles(),
							'color' => true
						);

						if ( isset( $value['options'] ) ) {
							$typography_options = wp_parse_args( $value['options'], $typography_options );
						}

						/*
						 *	Font Size
						 */

						if ( $typography_options['sizes'] ) {
							$font_size = '<select class="of-typography of-typography-size" name="' . esc_attr( $option_name . '[' . $value['id'] . '][size]' ) . '" id="' . esc_attr( $value['id'] . '_size' ) . '">';
							$sizes = $typography_options['sizes'];
							foreach ( $sizes as $i ) {
								$size = $i . 'px';
								$font_size .= '<option value="' . esc_attr( $size ) . '" ' . selected( $typography_stored['size'], $size, false ) . '>' . esc_html( $size ) . '</option>';
							}
							$font_size .= '</select>';
						}

						/*
						 *	Font Face
						 */

						if ( $typography_options['faces'] ) {
							$font_face = '<select class="of-typography of-typography-face" name="' . esc_attr( $option_name . '[' . $value['id'] . '][face]' ) . '" id="' . esc_attr( $value['id'] . '_face' ) . '">';
							$faces = $typography_options['faces'];
							foreach ( $faces as $key => $face ) {
								$font_face .= '<option value="' . esc_attr( $key ) . '" ' . selected( $typography_stored['face'], $key, false ) . '>' . esc_html( $face ) . '</option>';
							}
							$font_face .= '</select>';
						}

						/*
						 *	Font Styles
						 */

						if ( $typography_options['styles'] ) {
							$font_style = '<select class="of-typography of-typography-style" name="'.$option_name.'['.$value['id'].'][style]" id="'. $value['id'].'_style">';
							$styles = $typography_options['styles'];
							foreach ( $styles as $key => $style ) {
								$font_style .= '<option value="' . esc_attr( $key ) . '" ' . selected( $typography_stored['style'], $key, false ) . '>'. $style .'</option>';
							}
							$font_style .= '</select>';
						}

						/*
						 *	Font Color
						 */

						if ( $typography_options['color'] ) {
							$default_color = '';
							if ( isset($value['std']['color']) && $val !=  $value['std']['color'] ) { $default_color = ' data-default-color="' .$value['std']['color'] . '" '; }
							$font_color = '<input name="' . esc_attr( $option_name . '[' . $value['id'] . '][color]' ) . '" id="' . esc_attr( $value['id'] . '_color' ) . '" class="of-color of-typography-color  type="text" value="' . esc_attr( $typography_stored['color'] ) . '"' . $default_color .' />';
						}

						/*
						 *	Allow modification/injection of typography fields
						 */

						$typography_fields = compact( 'font_size', 'font_face', 'font_style', 'font_color' );
						$typography_fields = apply_filters( 'of_typography_fields', $typography_fields, $typography_stored, $option_name, $value );
						$output .= implode( '', $typography_fields );

						break;

					/*
					 *	Background
					 */

					case 'background':

						$background = $val;

						if ( $background == '' ) {

							$background = array(
								'color'			=>	'transparent',
								'image'			=>	'',
								'repeat'		=>	'',
								'position'		=>	'',
								'attachment'	=>	''
							);

						}

						/*
						 *	Background Color
						 */

						$default_color = '';
						if ( isset( $value['std']['color'] ) && $val !=  $value['std']['color'] ) { $default_color = ' data-default-color="' .$value['std']['color'] . '" '; }
						$output .= '<input name="' . esc_attr( $option_name . '[' . $value['id'] . '][color]' ) . '" id="' . esc_attr( $value['id'] . '_color' ) . '" class="of-color of-background-color"  type="text" value="' . esc_attr( $background['color'] ) . '"' . $default_color .' />';

						/*
						 *	Background Image
						 */

						if ( !isset($background['image']) ) { $background['image'] = ''; }
						$output .= self::upload( $value['id'], $background['image'], null, esc_attr( $option_name . '[' . $value['id'] . '][image]' ) );
						$class = 'of-background-properties';
						if ( '' == $background['image'] ) { $class .= ' hide'; }
						$output .= '<div class="' . esc_attr( $class ) . '">';

						/*
						 *	Background Repeat
						 */

						$output .= '<select class="of-background of-background-repeat" name="' . esc_attr( $option_name . '[' . $value['id'] . '][repeat]'  ) . '" id="' . esc_attr( $value['id'] . '_repeat' ) . '">';
						$repeats = of_recognized_background_repeat();
						foreach ($repeats as $key => $repeat) {
							$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $background['repeat'], $key, false ) . '>'. esc_html( $repeat ) . '</option>';
						}
						$output .= '</select>';

						/*
						 *	Background Position
						 */

						$output .= '<select class="of-background of-background-position" name="' . esc_attr( $option_name . '[' . $value['id'] . '][position]' ) . '" id="' . esc_attr( $value['id'] . '_position' ) . '">';
						$positions = of_recognized_background_position();
						foreach ($positions as $key=>$position) {
							$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $background['position'], $key, false ) . '>'. esc_html( $position ) . '</option>';
						}
						$output .= '</select>';

						/*
						 *	Background Attachment
						 */

						$output .= '<select class="of-background of-background-attachment" name="' . esc_attr( $option_name . '[' . $value['id'] . '][attachment]' ) . '" id="' . esc_attr( $value['id'] . '_attachment' ) . '">';
						$attachments = of_recognized_background_attachment();
						foreach ($attachments as $key => $attachment) {
							$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $background['attachment'], $key, false ) . '>' . esc_html( $attachment ) . '</option>';
						}
						$output .= '</select>';
						$output .= '</div>';

						break;

					/*
					 *	Editor
					 */

					case 'editor':
						$output .= '<div class="explain">' . wp_kses( $explain_value, $allowedtags ) . '</div>'."\n";
						echo $output;
						$textarea_name = esc_attr( $option_name . '[' . $value['id'] . ']' );
						$default_editor_settings = array(
							'textarea_name' => $textarea_name,
							'media_buttons' => false,
							'tinymce' => array( 'plugins' => 'wordpress' )
						);
						$editor_settings = array();
						if ( isset( $value['settings'] ) ) { $editor_settings = $value['settings']; }
						$editor_settings = array_merge( $default_editor_settings, $editor_settings );
						wp_editor( $val, $value['id'], $editor_settings );
						$output = '';
						break;

					/*
					 *	Info
					 */

					case "info":
						$id = '';
						$class = 'section';
						if ( isset( $value['id'] ) ) { $id = 'id="' . esc_attr( $value['id'] ) . '" '; }
						if ( isset( $value['type'] ) ) { $class .= ' section-' . $value['type']; }
						if ( isset( $value['class'] ) ) { $class .= ' ' . $value['class']; }
						$output .= '<div ' . $id . 'class="' . esc_attr( $class ) . '">' . "\n";
						if ( isset($value['name']) ) { $output .= '<h4 class="heading">' . esc_html( $value['name'] ) . '</h4>' . "\n"; }
						if ( isset( $value['desc'] ) ) { $output .= apply_filters('of_sanitize_info', $value['desc'] ) . "\n"; }
						$output .= '</div>' . "\n";
						break;

					/*
					 *	Heading for Navigation
					 */

					case "heading":
						$counter++;
						if ( $counter >= 2 ) { $output .= '</div>'."\n"; }
						$class = '';
						$class = ! empty( $value['id'] ) ? $value['id'] : $value['name'];
						$class = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($class) );
						$output .= '<div id="options-group-' . $counter . '" class="group ' . $class . '">';
						$output .= '<h3>' . esc_html( $value['name'] ) . '</h3>' . "\n";
						break;
				}

				if ( ( $value['type'] != "heading" ) && ( $value['type'] != "info" ) ) {
					$output .= '</div>';
					if ( ( $value['type'] != "checkbox" ) && ( $value['type'] != "editor" ) ) {
						$output .= '<div class="explain">' . wp_kses( $explain_value, $allowedtags) . '</div>'."\n";
					}
					$output .= '</div></div>'."\n";
				}

				echo $output;

			}

			/*
			 *	Outputs closing div if there tabs
			 */

			if ( cdz_Theme_Options_Panel::get_tabs() != '' ) { echo '</div>'; }
			
		}

		static function upload( $_id, $_value, $_desc = '', $_name = '' ) {

			$optionsframework_settings = get_option( 'optionsframework' );

			/*
			 *	Gets the unique option id
			 */

			$option_name = $optionsframework_settings['id'];

			$output = '';
			$id = '';
			$class = '';
			$int = '';
			$value = '';
			$name = '';

			$id = strip_tags( strtolower( $_id ) );

			/*
			 *	If a value is passed and we don't have a stored value, use the value that's passed through.
			 */

			if ( $_value != '' && $value == '' ) { $value = $_value; }

			if ($_name != '') {

				$name = $_name;

			} else {

				$name = $option_name.'['.$id.']';

			}

			if ( $value ) { $class = ' has-file'; }

			$output .= '<input id="' . $id . '" class="upload' . $class . '" type="text" name="'.$name.'" value="' . $value . '" placeholder="' . __('No file chosen', 'cdz') .'" />' . "\n";
			
			if ( function_exists( 'wp_enqueue_media' ) ) {

				if ( ( $value == '' ) ) {

					$output .= '<input id="upload-' . $id . '" class="upload-button button" type="button" value="' . __( 'Upload', 'cdz' ) . '" />' . "\n";

				} else {

					$output .= '<input id="remove-' . $id . '" class="remove-file button" type="button" value="' . __( 'Remove', 'cdz' ) . '" />' . "\n";

				}

			} else {

				$output .= '<p><i>' . __( 'Upgrade your version of WordPress for full media support.', 'cdz' ) . '</i></p>';

			}

			if ( $_desc != '' ) { $output .= '<span class="of-metabox-desc">' . $_desc . '</span>' . "\n"; }

			$output .= '<div class="screenshot" id="' . $id . '-image">' . "\n";

			if ( $value != '' ) {

				$remove = '<a class="remove-image">Remove</a>';
				$image = preg_match( '/(^.*\.jpg|jpeg|png|gif|ico*)/i', $value );

				if ( $image ) {

					$output .= '<img src="' . $value . '" alt="" />' . $remove;

				} else {

					$parts = explode( "/", $value );

					for( $i = 0; $i < sizeof( $parts ); ++$i ) { $title = $parts[$i]; }

					/*
					 *	No output preview if it's not an image.
					 */

					$output .= '';

					/*
					 *	Standard generic output if it's not an image.
					 */

					$title = __( 'View File', 'cdz' );
					$output .= '<div class="no-image"><span class="file_link"><a href="' . $value . '" target="_blank" rel="external">' . $title . '</a></span></div>';

				}
				
			}

			$output .= '</div>' . "\n";
			return $output;

		}

	}

}