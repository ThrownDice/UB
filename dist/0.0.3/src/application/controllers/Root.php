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
		$this->doGet($url);
	}


	/**
	 *
	 */
	function doGet($url) {
		switch($url) {
			// URL: Test.
			case "test":
				$this->svcTest();

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
		$data["entry"] = Core::getInstance("Term_md")->getRecentTerm(15);

		// Rendering preset.
		$this->view->title = "UB Root";

		$this->view->setDiv(array("entry_pane"));

		//$this->view->div("power");
		$this->view->render("tmpl_kiwi", $data);

	}

	/**
	 *
	 */
	function svcTest() {
		echo "test";
	}


}






?>