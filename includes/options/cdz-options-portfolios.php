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

function cdz_options_portfolios() {
	
	$options = array();

	/*
	 *	Tab title
	 */

	$options[] = array(
		'name'			=> __('Manage Portfolios', 'cdz'),
		'type'			=> 'heading',
	);

	/*
	 *	General Colors
	 */

	$options[] = array(
		'name'			=> __('Portfolios', 'cdz'),
		'desc'			=> __('Manage all your portfolios', 'cdz'),
		'type'			=> 'info',
	);

	$options[] = array(
		'name'			=>	__('Custom portfolios', 'cdz'),
		'id'			=>	'opt_m_portfolios',
		'type'			=>	'textarea',
		'std'			=>	'Need install plugin first!',
		// Filter -> edit.php?post_type=cdz_work&cdz_work_portfolio=portfolio-2
	);

	return $options;
}