<?php  
/**
 * Configuration file.
 * This has auxiliary information regarding the general implementation of the program.
 * 
 */

// Debugging.
__debug_load('Config');



/**
 * For Configuration files, customized preset will be loaded directly.
 */
	require_once APPPATH.'config'.DS.'config.php';

/**
 * Config class
 */
class Config {
	
	/**
	 * [$config description]
	 * @var array
	 */
	public $config = array();


	/**
	 * Setter. Assign the value to $config array.
	 * @param [type] $key   [description]
	 * @param [type] $value [description]
	 */
	function set($key, $value) {
		$this->config[$key] = $value;
	}


}







?>