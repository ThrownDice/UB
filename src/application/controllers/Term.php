<?php
/**
 * Term file.
 */

	// Debugging.
	__debug_load(__FILE__);

/**
 * Term controller
 *
 */
class Term extends Controller {

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
		if(isset($_SESSION["member"])) {
			$data['entry_pane'] = Core::getInstance("Term_md")->getRecentTermWithMemberVote($this->DEFAULT_TERM_COUNT, $_SESSION["member"]["id"]);
		} else {
			$data['entry_pane'] = Core::getInstance("Term_md")->getRecentTerm($this->DEFAULT_TERM_COUNT);
		}
		$this->view->render("tmpl_term", $data);
	}

}

?>