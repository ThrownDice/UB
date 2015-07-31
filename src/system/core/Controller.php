<?php
/**
 * Controller file.
 */

	// Debugging.
	__debug_load(__FILE__);





/**
 * Controller Class.
 */
abstract class Controller {

	public static $data = array();
	public static $_info = array();

	private $_CONSTANT = array();

	public function __construct($view = null){
		if($view) $this->view = $view;
	}

	public abstract function main($url = null);
	public abstract function render();

	public function __set($name, $value){
		try{
			//echo "Setting '$name' to '$value'\n";
			$this->_CONSTANT[$name] = $value;
		}catch(Exception $e){
			throw new Exception("Can't set '$name' to member variable. <br>");
		}
	}

	public function __get($name){
		try{
			//echo "Getting '$name'\n";
			return $this->_CONSTANT[$name];
		}catch(Exception $e){
			throw new Exception("Can't return '$name' member variable. <br>");
		}

	}
}
?>