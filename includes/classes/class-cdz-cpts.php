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
 *	cdzClass: Main
 */

if ( ! class_exists( 'cdz_Cpts' ) ) {

	class cdz_Cpts {

		/*
		 *	Custom Post Types
		 */

		var $location				= NULL;
		var $location_category		= NULL;
		var $location_group			= NULL;

		var $service				= NULL;
		var $service_category		= NULL;
		var $service_group			= NULL;

		var $testimonial			= NULL;
		var $testimonial_category	= NULL;
		var $testimonial_group		= NULL;

		var $work					= NULL;
		var $work_category			= NULL;
		var $work_portfolio			= NULL;

		/*
		 *	cdzFunction: Construct
		 */

		public function __construct() {

			$this->objects();

		}

		/*
		 *	cdzFunction: Objects
		 */

		function objects() {

			$this->location				= new cdz_Location();
			$this->location_category	= new cdz_Location_Category();
			$this->location_group		= new cdz_Location_Group();

			$this->service				= new cdz_Service();
			$this->service_category		= new cdz_Service_Category();
			$this->service_group		= new cdz_Service_Group();

			$this->testimonial			= new cdz_Testimonial();
			$this->testimonial_category	= new cdz_Testimonial_Category();
			$this->testimonial_group	= new cdz_Testimonial_Group();

			$this->work					= new cdz_Work();
			$this->work_category		= new cdz_Work_Category();
			$this->work_portfolio		= new cdz_Work_Portfolio();

		}

	}

}