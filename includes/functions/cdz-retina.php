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
 *	cdzFunction: Retina
 */

if ( ! function_exists( 'cdz_retina' ) ) {

	function cdz_retina() {

		global $cdz_is_retina;

		if ( !is_admin() && $GLOBALS['pagenow'] != 'wp-login.php' ) {

			if ( isset( $_COOKIE['device_pixel_ratio'] ) ) {

				if ( $_COOKIE['device_pixel_ratio'] >= 2 ) {

					$cdz_is_retina = TRUE;

				} else {

					$cdz_is_retina = FALSE;

				}

			} else {

				// http://stackoverflow.com/questions/15234519/detect-retina-display-in-php

				$js_min = '(function(){if(document.cookie.indexOf("device_pixel_ratio")==-1&&"devicePixelRatio"in window&&window.devicePixelRatio==2){var e=new Date;e.setTime(e.getTime()+36e5);document.cookie="device_pixel_ratio="+window.devicePixelRatio+";"+" expires="+e.toUTCString()+"; path=/";if(document.cookie.indexOf("device_pixel_ratio")!=-1){window.location.reload()}}})()';
				echo '<script language="javascript">' . $js_min . '</script>';

				/*
				<script language="javascript">
					(function(){
						if( document.cookie.indexOf('device_pixel_ratio') == -1 && 'devicePixelRatio' in window && window.devicePixelRatio == 2 ) {

							var date = new Date();
							date.setTime( date.getTime() + 3600000 );

							document.cookie = 'device_pixel_ratio=' + window.devicePixelRatio + ';' +  ' expires=' + date.toUTCString() +'; path=/';
							//if cookies are not blocked, reload the page
							if(document.cookie.indexOf('device_pixel_ratio') != -1) { window.location.reload(); }
						}
					})();
				</script>
				*/

			}

		}

	}

}