<?php

/*
 *	Plugin Name: cdz Monkeys Manager
 *	Plugin URI: https://github.com/coderzjungle/cdz-monkeys-manager
 *	Author: CoderzJungle
 *	Author URI: http://www.coderzjungle.com
 *	Description: This Wordpress plugin allow you to add a lot of features on your website.
 *	License: GPL3
 *	Version: 1.0.0
 *
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
 *
 *	Copyright 2014 CoderzJungle ( mail@coderzjungle.com )
 *
 *	This program is free software; you can redistribute it and/or modify
 *	it under the terms of the GNU General Public License, version 2, as 
 *	published by the Free Software Foundation.
 *	
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU General Public License for more details.
 */

defined( 'ABSPATH' ) or exit;

/*
 *	Define constants
 */

if ( ! defined( 'CDZ_PLUGIN' ) { define( 'CDZ_PLUGIN', TRUE ); }

define( 'CDZ_MONKEYS_MANAGER',	TRUE );

define( 'CDZ_PLUGIN_VERSION',	'1.0.0' );
define( 'CDZ_PLUGIN_URL',		rtrim( plugin_dir_url( __FILE__ ), '/') );
define( 'CDZ_PLUGIN_PATH',		rtrim( plugin_dir_path( __FILE__ ), '/') );
define( 'CDZ_THEME_URL',		get_template_directory_uri() );
define( 'CDZ_THEME_PATH',		get_template_directory() );

/*
 *	Init
 */

require_once 'includes/classes/class-cdz-monkeys-manager.php';