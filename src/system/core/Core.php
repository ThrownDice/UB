<?php  
/**
 * Core object file.
 */

// Check the mode. Only acts when debugging.
if($__debug) echo 'Core loaded <br>';


/**
 * Sanity Check 
 */
// defined('SYSPATH') OR exit('SYSPATH not defined. Unwanted Access to this file.');
// defined('APPPATH') OR exit('APPPATH not defined. Unwanted Access to this file.');


/**
 * Core class.
 * This serves as a managing object of the entire program.
 */
class Core {
	
	// Instance variables.
	// This retains the objects constructed in this program and makes it accessible when needed.
	private static $instance = array();
	
	// Disable constructor.
	private function __construct() {}

	/**
	 * Create an instance and assign it to the static variable.
	 * @return [type] [description]
	 */
	public static function getInstance($class) {
		// If the instance has been made before, return the existing one..
		if(isset(self::$instance[$class]))
			return self::$instance[$class];
		else{
			// Check if the class has been defined before, load if not.
			if(!class_exists($class)){
				self::__autoload($class);
			}
			// Create an instance and return it.
			self::$instance[$class] = new $class();
			return self::$instance[$class];
		}
	}	
	

	/**
	 * Load the class information, that is, define it.
	 * @param  [type] $class [description]
	 * @return [type]        [description]
	 */
	static function __autoload($class) {
		// Set path. The location of where the file-to-read is.
		$paths = array(APPPATH.'config', APPPATH.'controllers', APPPATH.'models', APPPATH.'views', SYSPATH.'core');
		$found = false;

		// Iterate over the possible paths, and include if detected.
		foreach($paths as $path){
			$file = $path.DS.$class.'.php';
			
			// If found, load it.
			if(file_exists($file)){
				require_once $file;
				$found = true;
			}		
		}
		// Error reporting.
		if(!$found) echo "Could not find $class object";
	}


	/**
	 * Main method.
	 */
	function main() {

		// Create an instance of Config.
		// Core::getInstance();
		
		
	}

}
	
	


?>