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
 *	cdzFunction: Options Framework custom scripts
 */

if ( ! function_exists( 'cdz_theme_options_scripts' ) ) {

	function cdz_theme_options_scripts() {

		?>
		
			<script type="text/javascript">

				jQuery( document ).ready( function() {

					/*
					 *	Checkbox Show Hide Feature
					 */

					<?php

					$array = array();


					$array['adv_options']				= array( '.advo' );

					$array['header']					= array( 'header_layout' );
					$array['custom_logo']				= array( 'custom_logo_uploader', 'custom_logo_width', 'custom_logo_height', 'custom_logo_crop' );
					$array['custom_icons_touch']		= array( 'custom_icons_touch_152', 'custom_icons_touch_144', 'custom_icons_touch_120', 'custom_icons_touch_114', 'custom_icons_touch_76', 'custom_icons_touch_72', 'custom_icons_touch_57' );
					$array['custom_icons_ie_10']		= array( 'custom_icons_ie_10_metro_tile_color', 'custom_icons_ie_10_metro_tile_image' );
					
					// Sliders
					$array['slider_home']				= array( 'slider_home_type' );
					$array['slider_blog']				= array( 'slider_blog_type' );
					$array['slider_search']				= array( 'slider_search_type' );
					$array['slider_error404']			= array( 'slider_error404_type' );
					$array['slider_single']				= array( 'slider_single_type' );
					$array['slider_shop']				= array( 'slider_shop_type' );
					$array['slider_product']			= array( 'slider_product_type' );
					$array['slider_page']				= array( 'slider_page_type' );

					// Slogans
					$array['slogan_home']				= array( 'slogan_home_img', 'slogan_home_text', 'slogan_home_subtext' );
					$array['slogan_blog']				= array( 'slogan_blog_img', 'slogan_blog_text', 'slogan_blog_subtext' );
					$array['slogan_search']				= array( 'slogan_search_img', 'slogan_search_text', 'slogan_search_subtext' );
					$array['slogan_error404']			= array( 'slogan_error404_img', 'slogan_error404_text', 'slogan_error404_subtext' );
					$array['slogan_single']				= array( 'slogan_single_img', 'slogan_single_text', 'slogan_single_subtext' );
					$array['slogan_page']				= array( 'slogan_page_img', 'slogan_page_text', 'slogan_page_subtext' );

					// Sidebars
					$array['sidebar_home']				= array( 'sidebar_home_left', 'sidebar_home_left_cols', 'sidebar_home_right', 'sidebar_home_right_cols' );
					$array['sidebar_blog']				= array( 'sidebar_blog_left', 'sidebar_blog_left_cols', 'sidebar_blog_right', 'sidebar_blog_right_cols' );
					$array['sidebar_search']			= array( 'sidebar_search_left', 'sidebar_search_left_cols', 'sidebar_search_right', 'sidebar_search_right_cols' );
					$array['sidebar_error404']			= array( 'sidebar_error404_left', 'sidebar_error404_left_cols', 'sidebar_error404_right', 'sidebar_error404_right_cols' );
					$array['sidebar_single']			= array( 'sidebar_single_left', 'sidebar_single_left_cols', 'sidebar_single_right', 'sidebar_single_right_cols' );
					$array['sidebar_shop']				= array( 'sidebar_shop_left', 'sidebar_shop_left_cols', 'sidebar_shop_right', 'sidebar_shop_right_cols' );
					$array['sidebar_product']			= array( 'sidebar_product_left', 'sidebar_product_left_cols', 'sidebar_product_right', 'sidebar_product_right_cols' );
					$array['sidebar_page']				= array( 'sidebar_page_left', 'sidebar_page_left_cols', 'sidebar_page_right', 'sidebar_page_right_cols' );
					
					// Testimonials
					// $array['slider_plugin_lt']			= array( 'slider_plugin_lt_type' );
					// $array['slogan_plugin_lt']			= array( 'slogan_plugin_lt_img', 'slogan_plugin_lt_text', 'slogan_plugin_lt_subtext' );
					// $array['sidebar_plugin_lt']			= array( 'sidebar_plugin_lt_left', 'sidebar_plugin_lt_left_cols', 'sidebar_plugin_lt_right', 'sidebar_plugin_lt_right_cols' );

					$array['footer']					= array( 'footer_widgets_cols' );
					$array['copyright']					= array( 'copyright_layout', 'copyright_left_text', 'copyright_right_text' );

					echo cdz_to_checkbox_show( $array );

					?>

					/*
					 *	Select Show Hide Feature
					 */

					<?php

					$array = array( 'general', 'home', 'blog', 'search', 'error404', 'single', 'page', 'plugin_lt' );
					echo cdz_to_sliders_select_show( $array );

					?>

					/*
					 *	Sidebars manager
					 */

					<?php

					$js_sidebars_html = '<div id="cdz-sidebars-manager">';
					$js_sidebars_html .= '<form id="cdz-sidebars-manager-form"><table><tr></tr>';

					foreach ( cdz_to_get_sidebars_list() as $slug => $name) {
						if ( $slug != 'none' && $slug != 'default-sidebar' ) {
							$js_sidebars_html .= '<tr class="cdz-srow">';
							$js_sidebars_html .= '<td><i class="fa fa-cog"></i></td>';
							$js_sidebars_html .= '<td><input type="text" name="x" value="' . $name . '" class="name" /></td>';
							//$js_sidebars_html .= '<td><input type="text" name="y" value="' . $desc . '" class="desc" /></td>';
							$js_sidebars_html .= '<td>' . ( ( $slug != 'default' ) ? '<span class="cdz-del"><i class="fa fa-trash-o"></i>' . __( 'Delete', 'cdz') . '</span>' : '' ) . '</td>';
							$js_sidebars_html .= '</tr>';
						}
					}

					$js_sidebars_html .= '</table><span class="cdz-add"><i class="fa fa-plus"></i>' . __( 'Add new sidebar', 'cdz') . '</span></form>';
					$js_sidebars_html .= '<div id="optionsframework-submit"><input type="submit" class="button-primary" name="update" value="Save Sidebars"></div></div>';

					?>
					
					jQuery('#section-opt_sidebar_custom > h4.heading').before('<?php echo $js_sidebars_html; ?>');

					/*
					 *	Hide option field
					 */

					jQuery('#section-opt_sidebar_custom > h4.heading').fadeOut();
					jQuery('#section-opt_sidebar_custom > div.option').fadeOut();

					/*
					 *	Add sidebar
					 */
					 
					jQuery( '.cdz-add' ).click( function() {
						str = '<tr class="cdz-srow">';
						str += '<td><i class="fa fa-cog"></i></td>';
						str += '<td><input type="text" name="x" value="" class="name" /></td>';
						//str += '<td><input type="text" name="y" value="" class="desc" /></td>';
						str += '<td><span class="cdz-del"><i class="fa fa-trash-o"></i><?php echo __( 'Delete', 'cdz'); ?></span></td>';
						str += '</tr>';
						jQuery( '#cdz-sidebars-manager table tr:last' ).after( str );
					});

					/*
					 *	Update sidebars
					 */

					function update_sidebars() {
						var str = jQuery( 'form#cdz-sidebars-manager-form' ).serialize();
						jQuery( 'textarea#opt_sidebar_custom' ).val( str );
					}
					jQuery( 'input[type=text]' ).live( 'change', function() { update_sidebars(); } );
					update_sidebars();

					/*
					 *	Delete sidebar
					 */
					 
					jQuery( '.cdz-del' ).live( 'click', function() {
						jQuery( this ).parent().parent().fadeOut( '', function(){
							jQuery( this ).remove();
							update_sidebars();
						});
					});

				});

			</script>

		<?php
	}

}