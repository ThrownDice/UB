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

	public function __construct($view = null){
		if($view) $this->view = $view;
	}

	public abstract function main($url = null);
	public abstract function render();

	/**
	 * [getModel description]
	 * @param  [type] $modelsToload [description]
	 * @return [type]               [description]
	 */
	/*public function getModel($modelsToload) {
		foreach($modelsToload as $model){
			$this->model[$model] = Core::getInstance($model);
		}
	}*/

	public function getView(){
		return $this->view;
	}

	public function setView($view){
		$this->view = $view;
	}


}





?>