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
 *	cdzClass: WP Stats
 */

if ( ! class_exists( 'cdz_WP_Stats' ) ) {

	class cdz_WP_Stats {

		private $average_option;

		function __construct() {

			add_action( 'init', array( &$this, 'init' ) );
			add_action( 'wp_footer', array( &$this, 'display' ) );
			add_action( 'admin_footer', array( &$this, 'display' ) );

			$this->average_option = is_admin() ? 'cdz_wp_stats_admin_load_times' : 'cdz_wp_stats_load_times';

		}

		function init() {

			//load_plugin_textdomain( 'cdz_wp_stats', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

			if ( isset( $_GET['reset_cdz_wp_stats'] ) && $_GET['reset_cdz_wp_stats'] == 1 ) {

				update_option( $this->average_option, array() );
				wp_safe_redirect(  wp_get_referer() );
				exit;

			}

		}

		function display() {

			$timer_stop 		= timer_stop(0);
			$query_count 		= get_num_queries();
			$memory_usage 		= round( $this->convert_bytes_to_hr( memory_get_usage() ), 2 );
			$memory_peak_usage 	= round( $this->convert_bytes_to_hr( memory_get_peak_usage() ), 2 );
			$memory_limit 		= round( $this->convert_bytes_to_hr( $this->let_to_num( WP_MEMORY_LIMIT ) ), 2 );
			$load_times			= array_filter( (array) get_option( $this->average_option ) );

			$load_times[]		= $timer_stop;

			update_option( $this->average_option, $load_times );

			if ( sizeof( $load_times ) > 0 ) { $average_load_time = round( array_sum( $load_times ) / sizeof( $load_times ), 4 ); }

			?>
			<div id="cdz-wp-stats">

				<div class="cj-logo">
					<a href="//www.coderzjungle.com" title="Coderz Jungle" target="_blank">
						<img src="<?php echo CDZ_PLUGIN_URL; ?>/assets/img/cj-logo-dark.png" title="Coderz Jungle" width="200" height="40" />
					</a>
				</div>

				<div class="stats">
					<ul>
						<li>
							<strong><?php echo $query_count; ?></strong> <?php echo __( 'queries in', 'cdz' ); ?> <strong><?php echo $timer_stop; ?></strong> <?php echo __( 'seconds', 'cdz' ); ?> 
							<?php echo __( 'average load time of', 'cdz' ); ?> <strong><?php echo $average_load_time; ?></strong> <?php echo __( 'seconds', 'cdz' ); ?> (<?php echo sizeof( $load_times ); ?> <?php echo __( 'runs', 'cdz' ); ?>)
						</li>
						<li>
							<strong><?php echo $memory_usage; ?></strong> <?php echo __( 'out of', 'cdz' ); ?> 
							<strong><?php echo $memory_limit; ?></strong> MB (<?php echo round( ( $memory_usage / $memory_limit ), 2 ) * 100 . '%'; ?>) 
							<?php echo __( 'memory used', 'cdz' ); ?>, 
							<?php echo __( 'peak memory usage', 'cdz' ); ?>: <strong><?php echo $memory_peak_usage; ?></strong> MB
						</li>
					</ul>
				</div>

			</div>
			<?php

		}

		function let_to_num( $size ) {

			$l 		= substr( $size, -1 );
			$ret 	= substr( $size, 0, -1 );

			switch( strtoupper( $l ) ) {
				case 'P': $ret *= 1024;
				case 'T': $ret *= 1024;
				case 'G': $ret *= 1024;
				case 'M': $ret *= 1024;
				case 'K': $ret *= 1024;
			}

			return $ret;

		}

		function convert_bytes_to_hr( $bytes ) {

			$units = array( 0 => 'B', 1 => 'kB', 2 => 'MB', 3 => 'GB' );
			$log = log( $bytes, 1024 );
			$power = (int) $log;
			$size = pow(1024, $log - $power);

			return $size . $units[$power];

		}

	}

}

$cdz_wp_stats = new cdz_WP_Stats();