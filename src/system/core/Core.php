<?php  
/**
 * Entire program managing file.
 * Contains a core engine of the program.
 */

// Debugging.
__debug_load(__FILE__);


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

	// When configuration data is needed in Core object, use this.
	public static $config = array();

	public function __construct($config = null) {
		//Auto Class loader closure setting
		spl_autoload_register(function ($class) {
			// Set path. The location of where the file-to-read is.
			// Iterate over app/controllers, models, views, sys/core but NOT app/config.
			$paths = array(APPPATH . 'controllers', APPPATH . 'models', APPPATH . 'views', SYSPATH . 'core');
			$found = false;

			// Iterate over the possible paths, and include if detected.
			foreach ($paths as $path) {
				$file = $path . DS . $class . '.php';

				// If found, load it.
				if (file_exists($file)) {
					require_once $file;
					$found = true;
				}
			}
			// Error reporting.
			if (!$found) echo "Could not find the $class object";
		});

		if($config){
			$xml = simplexml_load_file($config);
			//Core Class load
			if($xml->route) self::$instance["Router"] = new Router($xml->route);
			if($xml->database) self::$instance["Database"] = new Database($xml->database);

		}
		self::$instance["Core"] = $this;
	}

	/**
	 * Create an instance and assign it to the static variable.
	 * @return [type] [description]
	 */
	public static function getInstance($class) {
		// If the instance has been made before, return the existing one..
		try{
			if(isset(self::$instance[$class]))
				return self::$instance[$class];
			else{
				// Create an instance and return it.
				self::$instance[$class] = new $class();
				return self::$instance[$class];
			}
		}catch(Exception $e){
			//todo : throw or route 500 error
		}
	}

	/**
	 * Main method.
	 */
	function main() {
		
		// Engine preheat.
		// Create a Config instance and fetch configuration.
		//$configuration = Core::getInstance('Config');
		//$this->config = $configuration->getConfig();
		// Load two objects that are essential in MVC.
		//Core::getInstance('Controller');
		//Core::getInstance('Model');

		// Create a Router instance and execute route(). Ignition.
		$router = Core::getInstance("Router");
		$router->route();


	}
}
?>