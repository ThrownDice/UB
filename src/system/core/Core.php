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
	// $instance retains objects constructed in this program and makes it accessible.
	private static $instance = array();
	private static $config;

	/**
	 * Core constructor.
	 * @param $file_config app/config.xml
	 */
	public function __construct($file_config) {
		
		// Set autoloader as closure inside the constructor.
		spl_autoload_register(function ($class) {
			// Set paths. The location of where the files-to-read are.
			// Paths include app/controllers, models, sys/core but NOT app/config.
			$paths = array(APPPATH . 'controllers', APPPATH . 'models', SYSPATH . 'core');

			// Iterate over the paths set, and include if any file is detected.
			foreach ($paths as $path) {
				$file = $path . DS . $class . '.php';
				if (file_exists($file)) require_once $file;
			}
		});

		/**
		 *  Load Configuration. 
		 *  This refers to an external config.xml file.
		 */
		if($file_config){
			$config = simplexml_load_file($file_config);
			self::$config = $config;
			
			// Create instances with information from config.xml.
			if($config->Router) self::$instance["Router"] = new Router($config->Router);
			if($config->Database) self::$instance["Database"] = new Database($config->Database);
		}
		
		// Also create a Core instance.
		self::$instance["Core"] = $this;
	}


	/**
	 * Create an instance and assign it to the static variable.
	 * @return [type] [description]
	 */
	public static function getInstance($class) {
		// If the instance has been made before, return the existing one.
		try {
			if(isset(self::$instance[$class]))
				return self::$instance[$class];
			else{
				// Create an instance and return it.
				$new_class = new $class();
				if($params = self::getControllerParameter($class)){
					//todo : set configuration using config.xml parameter
					//echo "controller : ", $class, "<br>";
					foreach($params as $param){
						$param_name = trim((string)$param["name"]);
						$param_value = trim((string)$param);
						//echo "'$param_name' and '$param_value'\n","<br>";
						//todo : implement set(key, value), get(key, value) so that we set and get parameters more flexible
						switch($param_name){
							case "view" :
								//$new_class->setView(new $param_value());
								$new_class->view = $param_value;
								break;
							case "model" :
								$new_class->setModel(new $param_value());
								//$new_class->model = new $param_value();
								break;
						}
					}
				}
				self::$instance[$class] = $new_class;
				return self::$instance[$class];
			}
		} catch(Exception $e) {
			//todo : throw or route 500 error
			echo $e, "<br>";
		}
	}

	public static function getControllerParameter($class){
		if(self::$config){
			$maps = self::$config->Router->route;
			foreach($maps as $map){
				if(!strcmp($class, (string)$map->controller["name"])){
					return $map->controller->param;
				}
			}
		}else{
			return null;
		}
	}

	/**
	 * Main method.
	 */
	function main() {
		
		// Create a Router instance and execute route(). Ignition.
		$router = Core::getInstance("Router");
		$router->route();

	}
}
?>