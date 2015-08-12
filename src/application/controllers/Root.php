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
		$this->doPost($url);
		$this->doGet($url);

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

		// Set divs to show: entry_pane, navigation, campaign, ad_aside, sns, ad_top.
		$this->view->setElems(array("entry_pane", "navigation", "campaign", "ad_aside", "sns", "ad_top"));

		$this->view->render("tmpl_kiwi", $data);

	}




}






?>