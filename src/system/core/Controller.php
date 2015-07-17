<?php
/**
 * Controller file.
 */

	// Debugging.
	__debug_load(__FILE__);





/**
 * Controller Class.
 */
class Controller {
	
	// Instance variables.
	// URL information parsed at Router
	public static $url = array();
	
	// Models that a particular controller needs.
	public static $model = array();
	
	public function main($url) {
		// Assign the URL transferred to $url.
		$this->url = $url;

	}


	/**
	 * [getModel description]
	 * @param  [type] $modelsToload [description]
	 * @return [type]               [description]
	 */
	public function getModel($modelsToload) {
		foreach($modelsToload as $model){
			$this->model[$model] = Core::getInstance($model);

		}
	}

	
}





?>