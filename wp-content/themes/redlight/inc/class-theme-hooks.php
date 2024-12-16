<?php
//Theme Hook class
if (!defined('ABSPATH')){
	exit(); //exit if access directly
}

if (!class_exists('Redlight_hook')){

	class Redlight_hook{

		private static $instance;

		public function __construct() {
			add_action( 'redlight_before_site_content', array($this,'breadcrumb') );
		}

		public static function getInstance(){
			if (null == self::$instance){
				self::$instance = new self();
			}
			return self::$instance;
		}

		

	} //end class

	if (class_exists('Redlight_hook')){
		Redlight_hook::getInstance();
	}

} //endif