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

jQuery(document).ready( function($) {

	var current_page_url = document.URL;

	//if ( current_page_url.indexOf( 'cdz-theme-options' ) > 0 ) {
	if ( 1 ) {

		/*
		 *	Loads the color pickers
		 */

		$('.of-color').wpColorPicker();

		/*
		 *	Image Options
		 */

		$('.of-radio-img-img').click(function(){

			$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
			$(this).addClass('of-radio-img-selected');

		});

		$('.of-radio-img-label').hide();
		$('.of-radio-img-img').show();
		$('.of-radio-img-radio').hide();

		/*
		 *	Loads tabbed sections if they exist
		 */

		function options_framework_tabs() {

			var $group = $('.group'),
				$navtabs = $('.nav-tab-wrapper a'),
				active_tab = '',
				cdz_theme_options_tab = '';

			/*
			 *	Hides all the .group sections to start
			 */

			$group.hide();

			/*
			 *	Find if a selected tab is saved in localStorage
			 */

			if ( typeof( localStorage ) != 'undefined' && localStorage.getItem('active_tab') != null ) {

				active_tab = localStorage.getItem('active_tab');
				cdz_theme_options_tab = active_tab.indexOf( 'options-group-' );

			}

			/*
			 *	If active tab is saved and exists, load it's .group
			 */

			if ( active_tab != '' && cdz_theme_options_tab == 1 ) {

				$(active_tab).fadeIn();
				$(active_tab + '-tab').addClass('nav-tab-active');

			} else {

				$('.group:first').fadeIn();
				$('.nav-tab-wrapper a:first').addClass('nav-tab-active');

			}

			/*
			 *	Bind tabs clicks
			 */

			$navtabs.click( function(e) {

				e.preventDefault();

				/*
				 *	Remove active class from all tabs
				 */

				$navtabs.removeClass('nav-tab-active');

				$(this).addClass('nav-tab-active').blur();

				if (typeof(localStorage) != 'undefined' ) { localStorage.setItem('active_tab', $(this).attr('href') ); }

				var selected = $(this).attr('href');

				$group.hide();
				$(selected).fadeIn();

			});

		}

		if ( $('.nav-tab-wrapper').length > 0 ) { options_framework_tabs(); }

		/*
		 *	Loading
		 */

		$('#cdz-panel-wrap .loading').fadeOut( 'slow', function(){

			$('#cdz-panel-wrap h2.nav-tab-wrapper').fadeIn( 'slow' );
			$('#cdz-panel-wrap #cdz-panel-metabox').fadeIn( 'slow' );
			$('.wrap .updated').fadeIn( 'slow' );

		});

	}

});