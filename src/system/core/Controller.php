<?php
/**
 * Controller file.
 */

	// Debugging.
	__debug_load(__FILE__);


/**
 * Controller Class.
 * 
 */
abstract class Controller {

	// Instance variables.
	public $view;
	public static $model = array();
	public static $data = array();
	private $_CONSTANT = array();



	/**
	 * Controller constructor
	 * @param [type] $view [description]
	 */
	public function __construct($view = null){
		if($view) $this->view = $view;
		$this->view = Core::getInstance("View");
		
	}


	/**
	 * [main description]
     * @param  [type] $url [description]
	 * @return [type]      [description]
	 */
	public abstract function main($url = null);


	/**
	 * [render description]
	 * @return [type] [description]
	 */
	public abstract function render($file_template);



	/**
	 * [__set description]
	 * @param [type] $name  [description]
	 * @param [type] $value [description]
	 */
	public function __set($name, $value){
		try{
			//echo "Setting '$name' to '$value'\n";
			$this->_CONSTANT[$name] = $value;
		}catch(Exception $e){
			throw new Exception("Can't set '$name' to member variable. <br>");
		}
	}

	/**
	 * [__get description]
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function __get($name){
		try{
			//echo "Getting '$name'\n";
			return $this->_CONSTANT[$name];
		}catch(Exception $e){
			throw new Exception("Can't return '$name' member variable. <br>");
		}
	}


	/**
	 * [redirect description]
	 * @param  [type]  $url       [description]
	 * @param  boolean $permanent [description]
	 * @return [type]             [description]
	 */
	public function redirect($url, $permanent = false){
		if (headers_sent() === false)
		{
			header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
		}
		exit();
	}


}
?>