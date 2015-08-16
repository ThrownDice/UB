<?php  
/**
 * About file.
 */

	// Debugging.
	__debug_load(__FILE__);





/**
 * 
 */
class About extends Controller {

	/**
	 * [__construct description]
	 * @param [type] $view [description]
	 */
	function __construct($view = null) {
		parent::__construct();
	}

	function main($url = null) {
		if(strtolower($_SERVER["REQUEST_METHOD"]) == "get") {
			$this->doGet($url);
		}
	}

	/**
	 * @param null $url
	 */
	function doGet($url = null) {
		// Declare parameters and retrieve, if exist.
		$this->svcDefault($url);
	}

	/**
	 * @param $url
	 */
	function svcDefault($url) {
		$data['name_controller'] = "about";
		$this->view->render("tmpl_doc", $data);
	}




}



?>