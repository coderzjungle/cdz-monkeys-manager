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
 *	cdzFunction: Admin Update Notifier Page
 */

if ( ! function_exists( 'cdz_admin_update_notifier_page' ) ) {

	function cdz_admin_update_notifier_page() {

		do_action( 'cdz_theme_options_header' );

		?>

		<div class="wrap">
			<h2 class="title">
				<?php echo __( 'Theme Update', 'cdz' ); ?>
			</h2>
		</div>

		<div id="cdz-panel-wrap" class="wrap">

			<div id="update-notifier">

				<div class="notice">
					<div data-code="f463" class="dashicons dashicons-update"></div>
					<strong>A new theme version is available!</strong>
					<div data-code="f139" class="dashicons dashicons-arrow-right"></div>
					<a href="#update-log" title="ChangeLog"><?php echo CDZ_THEME_NAME . ' ' . cdz_get_latest_theme_version(); ?></a>
				</div>

				<h2 class="page-title">How to update this theme</h1>

				<div id="update-info"></div>

				<div id="update-log">

					<h3>Theme ChangeLog</h3>

					<?php

					$remote_changelog = 'http://demo.coderzjungle.com/wp-content/themes/' . CDZ_THEME_SLUG . '/cdz-theme/changelog.txt';
					$remote_get = wp_remote_get( $remote_changelog );
					$changelog_text = wp_remote_retrieve_body( $remote_get );
					echo wpautop( $changelog_text );

					?>

				</div>

			</div>
			
		</div>

		<script>
			jQuery('#update-info').load('<?php echo get_template_directory_uri() ?>/cdz-theme/doc/parts/update.html');
			/*jQuery('#update-log').load('<?php echo get_template_directory_uri(); ?>/changelog.txt', function() {
				var before = '<h3>Theme ChangeLog</h3><p>';
				var after = '</p>';
				jQuery(this).html( before + jQuery(this).html().replace( /\n/g, '<br />') + after );
			});*/
		</script>

		<?php

	}

}