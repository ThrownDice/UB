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
	
	private $view;
	private $model;

	public function __construct($view = null){
		if($view) $this->view = $view;
	}

	public abstract function main($url = null);
	public abstract function render();

	public function getView(){
		return $this->view;
	}

	public function setView($view){
		$this->view = $view;
	}

	public function getModel(){
		return $this->model;
	}
	public function setModel($model){
		$this->model = $model;
	}

	public function __set($name, $value){
		try{
			//echo "Setting '$name' to '$value'\n";
			$this->$name = $value;
		}catch(Exception $e){
			throw new Exception("Can't set '$name' to member variable. <br>");
		}
	}

	public function __get($name){
		try{
			//echo "Getting '$name'\n";
			return $this->$name;
		}catch(Exception $e){
			throw new Exception("Can't return '$name' member variable. <br>");
		}

	}
}
?>