<?php  
/**
 * Configuration file.
 * This has auxiliary information regarding the general implementation of the program.
 * It loads the values set in application/config.php.
 */

// Debugging.
__debug_load(__FILE__);



/**
 * Config class
 */
class Config {


	/**
	 * [$config description]
	 * @var array
	 */
	public static $config = array();


	/**
	 * [__construct description]
	 * Set the configuration.
	 */
	function __construct() {
		
		/*
		 * For Configuration files, customized preset will be loaded directly, 
		 * rather than through autoload method defined in Core
		 */
		require_once APPPATH.'config'.DS.'config.php';


		// Presets.
		//$this->config['test'] = $option0;
		//$this->config['db_connection'] = $db_connection;

	}

	/**
	 * Setter. Assign the value to $config array.
	 * @param [type] $key   [description]
	 * @param [type] $value [description]
	 */
	function set($key, $value) {
		$this->config[$key] = $value;
	}


	/**
	 * [getConfig description]
	 * returns config array.
	 * @return [type] [description]
	 */
	function getConfig() {
		return $this->config;
	}


}







?>