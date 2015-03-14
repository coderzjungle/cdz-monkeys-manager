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
 *	cdzFunction: Theme Options Page
 */

if ( ! function_exists( 'cdz_theme_options_page' ) ) {

	function cdz_theme_options_page() {

		do_action( 'cdz_theme_options_header' );

		//$menu = $this->menu_settings();

		?>

		<div class="wrap">
			<h2 class="title">
				<?php echo __( 'Options', 'cdz' ); ?>
				<a href="<?php echo get_site_url(); ?>" class="add-new-h2" target="_blank"><?php echo __( 'View Website', 'cdz' ); ?></a>
			</h2>
		</div>
		
		<div id="cdz-panel-wrap" class="wrap">
		
			<?php settings_errors( 'options-framework' ); ?>

			<div class="loading">

				<p><?php echo __( 'loading', 'cdz' ); ?>...</p>

			</div>

			<h2 class="nav-tab-wrapper">
				<?php echo cdz_Theme_Options_Panel::get_tabs(); ?>
			</h2>

			<div id="cdz-panel-metabox" class="metabox-holder">
				<div id="cdz-panel" class="postbox">
					<form action="options.php" method="post">

						<input type="hidden" name="page" value="<?php echo isset( $_GET['page'] ) ? $_GET['page'] : ''; ?>" />

						<?php settings_fields( 'optionsframework' ); ?>

						<h2 class="page_title">
							<i class="fa fa-cog"></i> 
							<?php echo __( 'Theme Options', 'cdz' ); ?>
						</h2>

						<div id="cdz-panel-submit">
							<input type="submit" class="button-primary" name="update" value="<?php esc_attr_e( 'Save All Options', 'cdz' ); ?>" />
							<input type="submit" class="reset-button button-secondary" name="reset" value="<?php esc_attr_e( 'Restore Defaults', 'cdz' ); ?>" onclick="return confirm( '<?php print esc_js( __( 'ATTENTION! Your theme settings will be lost.', 'cdz' ) ); ?>' );" />
							<div class="clear"></div>
						</div>

						<?php cdz_Theme_Options_Panel::fields(); /* Settings */ ?>

						<div id="cdz-panel-submit">
							<input type="submit" class="button-primary" name="update" value="<?php esc_attr_e( 'Save All Options', 'cdz' ); ?>" />
							<input type="submit" class="reset-button button-secondary" name="reset" value="<?php esc_attr_e( 'Restore Defaults', 'cdz' ); ?>" onclick="return confirm( '<?php print esc_js( __( 'ATTENTION! Your theme settings will be lost.', 'cdz' ) ); ?>' );" />
							<div class="clear"></div>
						</div>

					</form>
				</div> <!-- / #container -->
			</div>

			<?php do_action( 'optionsframework_after' ); ?>

		</div> <!-- / .wrap -->

	<?php
	}

}