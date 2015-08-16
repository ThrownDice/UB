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
		// Showe Term Exact.
		if(isset($url[2])) {
			$this->svcTermExact($url);
		} else if (isset($url[1])) {

		} else {
			$this->svcDefault($url);
		}
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

	function svcTermExact($url) {
		if(isset($_SESSION["member"])) {
			$data["entry_exact"] = Core::getInstance("Term_md")->getTermExactWithMemberVote($url[2], $_SESSION["member"]["id"]);
		} else {
			$data["entry_exact"] = Core::getInstance("Term_md")->getTermExact($url[2]);
		}
		$data["entry_pane"] = Core::getInstance("Term_md")->getIndexWordByWord($url[1]);
		$this->view->render("tmpl_term_exact", $data);
	}

}

?>