<?php  

// Check the mode. Only acts when debugging.
if($__debug) echo 'Config initiated <br>';



/**
 * Config class
 * Singleton Object
 */
class Config {
	
	// Instance variables.
	private static $instance;

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
		
		return self::$instance;
	}



}







?>