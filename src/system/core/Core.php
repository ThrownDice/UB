<?php  

/**
 * Sanity Check 
 */
defined('SYSPATH') OR exit('SYSPATH not defined. Unwanted Access to this file.');
defined('APPPATH') OR exit('APPPATH not defined. Unwanted Access to this file.');


// Debugging
echo 'Core loaded <br>';

// Load the information of objects to contain.
require_once SYSPATH.'core'.DS.'Config.php';
require_once SYSPATH.'core'.DS.'Router.php';


/**
 * Core class
 */
class Core {
	
	// Instance variables.
	private static $instance;
	
	public $config;
	// var $router;

	// Disable constructor
	private function __construct() {}

	/**
	 * Create an instance and assign it to the static variable.
	 * @return [type] [description]
	 */
	public function getInstance() {
		// If not made before,
		if(!self::$instance)
			self::$instance = new static();
		
		// Assign instances
		$config = Config::getInstance();
		$router = Router::getInstance();
		
		return self::$instance;
	}

	
	/**
	 * Load the configuration object.
	 * Create and assign in to a new instance
	 */
	

	// echo 'require'.' '.SYSPATH.'core'.DS.'Config.php';
	// require_once SYSPATH.'core'.DS.'Config.php';


	/**
	 * Set the route.
	 */
	// echo 'require'.' '.SYSPATH.'core'.DS.'Router.php';
	// require_once SYSPATH.'core'.DS.'Router.php';
	
}

?>