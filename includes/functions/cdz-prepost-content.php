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
 *	cdzFunction: Prepost Content
 */

if ( ! function_exists( 'cdz_prepost_content' ) ) {

	function cdz_prepost_content( $template, $prepost ) {

		/*
		 *	Get slider, slogans and sidebars
		 */

		if ( CDZ_THEME ) {

			$slider = cdz_get_slider( $template );
			$slogans = cdz_get_slogans( $template );
			$sidebars = cdz_get_sidebars( $template );

		} else { $slider =  $slogans =  $sidebars = NULL; }

		if ( $prepost == 'pre' ) : ?>

			<div id="cdz-slider" class="<?php echo $template; ?>-slider">
				<?php if ( isset( $slider ) && ! empty( $slider ) && $slider != 'none' ) { echo $slider; } ?>
			</div>

			<?php if ( isset( $slogans['img'] ) && ! empty( $slogans['img'] ) ) : ?>
				<div id="cdz-slogan" class="<?php echo $template; ?>-slogan">
					<img src="<?php echo $slogans['img']; ?>" alt="Slogan" class="slogan-img" />
					<!--
					<p class="slogan-text"><?php echo $slogans['text']; ?></p>
					<p class="slogan-subtext"><?php echo $slogans['subtext']; ?></p>
					-->
				</div>
			<?php endif; ?>

			<?php

			$middle_classes = '';
			if ( isset( $sidebars['left'] ) && $sidebars['left'] != 'none' && $sidebars['left'] != FALSE && $sidebars['left_cols'] > 0 ) { $middle_classes .= ' left-sidebar'; }
			if ( isset( $sidebars['right'] ) && $sidebars['right'] != 'none' && $sidebars['right'] != FALSE && $sidebars['right_cols'] > 0 ) { $middle_classes .= ' right-sidebar'; }

			?>

			<div id="cdz-middle" class="<?php echo $middle_classes; ?>">
				<div class="grid_container">
					<div class="row">

						<?php cdz_sidebar( 'left', $sidebars['left'], $sidebars['left_cols'] ); ?>

						<div id="main-content" class="main-content<?php echo $sidebars['content_cols'] == 12 ? '' : ' col_' . $sidebars['content_cols']; ?>">
							<div id="primary" class="content-area">
								<div id="content" class="site-content"  role="main">

		<?php elseif ( $prepost == 'post' ) : ?>

								</div>
							</div>
						</div>

						<?php cdz_sidebar( 'right', $sidebars['right'], $sidebars['right_cols'] ); ?>
						
					</div>
				</div>
			</div>

		<?php

		endif;

	}

}