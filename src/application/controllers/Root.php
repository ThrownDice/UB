<?php
/**
 * Root file.
 */
	// Debugging.
	__debug_load(__FILE__);


/**
 * Root Controller.
 * URL: context_root/ (Exception for Root. No controller name after context_root)
 *
 *
 */
class Root extends Controller {

	function __construct() {
		parent::__construct();
	}


	function main($url = null) {
		if(strtolower($_SERVER["REQUEST_METHOD"]) == "get") {
			$this->doGet($url);
		}
		else if(strtolower($_SERVER["REQUEST_METHOD"]) == "post") {
			$this->doPost($url);
		}
	}


	/**
	 *
	 */
	function doGet($url) {
		switch($url) {

			// URL: context_root/
			// No request ever, just a plain entry point call.
			default:
				$this->svcDefault();
		}
	}


	/**
	 * Default service
	 *
	 */
	function svcDefault() {
		// Process Data I/O.
		$data["entry_pane"] = Core::getInstance("Term_md")->getRecentTerm(15);

		// Rendering preset.
		$this->view->title = "UB Root";


		//
		$this->view->render("tmpl_default", $data);

	}




}






?>