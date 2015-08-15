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
		else if(strtolower($_SERVER["REQUEST_METHOD"]) == "post") {
			$this->doPost($url);
		}
	}


	/**
	 * @param null $url
	 */
	function doGet($url = null) {
		// Declare parameters and retrieve, if exist.
		$do = null;
		if(isset($_GET["do"])) $do = $_GET["do"];

		// Decide which service to provide,
		switch($do) {
			case "add": {
				$this->svcAddTerm($url);
				break;
			}
			case "modify": {
				$this->svcModifyTerm($url);
				break;
			}
			case "delete": {
				$this->svcDeleteTerm($url);
				break;
			}
			case "vote": {
				$this->svcVote($url);
				break;
			}
			default: {
				$this->svcDefault($url);
				break;
			}
		}
	}


	/**
	 * @param null $url
	 */
	function doPost($url = null) {
		// Declare parameters and retrieve, if exists.
		$do = null;
		if(isset($_GET['do'])) $do = $_GET["do"];

		switch($do) {
			case "add": {
				$this->svcAdded($url);
				break;
			}

			case "update": {
				$this->svcUpdated($url);
				break;
			}

			default: {
				break;
			}

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
		$this->view->render("tmpl_term_add", $data);
	}


	/**
	 * @param $url
	 */
	function svcAddTerm($url) {
		$this->view->setElems(array("term_edit"));
		$this->view->render("tmpl_kiwi", null);
	}

	/**
	 * @param $url
	 */
	function svcModifyTerm($url) {
		if(isset($_GET["id"])){
			$id = $_GET["id"];
			//self::$data = Core::getInstance("Term_md")->getTermExact($id);
			$data["toEdit"] = Core::getInstance("Term_md")->getTermExact($id);

			$this->view->setElems(array("term_edit"));
			$this->view->render("tmpl_kiwi", $data);
		}
	}


	/**
	 * @param $url
	 */
	function svcDeleteTerm($url) {
		//todo : delete term data, confirm user session, auth etc
		$response = array();
		if(isset($_GET["id"])){
			$id = $_GET["id"];
			try{
				if(Core::getInstance("Term_md")->deleteTerm($id)){
					$response["status"] = "success";
					$response["text"] = "SUCCESS : ".$id." term is deleted.";
				}
			}catch(Exception $e){
				$response["text"] = "ERROR : fail to delete ".$id." term. ".$e;
			}
		}else{
			$response["status"] = "error";
			$response["text"] = "ERROR : Can't get id parameter";
		}
		print json_encode($response);
	}


	/**
	 * @param $url
	 */
	function svcVote($url) {
		//todo : action of like, dislike term, (ajax action)
		$response = array();
		if(isset($_SESSION["member"])){
			if(isset($_GET["term_id"]) && isset($_GET["vote"])){
				$member_id = $_SESSION["member"]["id"];
				$term_id = $_GET["term_id"];
				$vote = $_GET["vote"];
				try{
					//todo : need to refactoring
					//todo : need to catch exception (e.g cant like multiple time)
					$Vote_md = Core::getInstance("Vote_md");
					$Term_md = Core::getInstance("Term_md");
					switch($vote){
						case "like":
							$Vote_md->likeTerm($term_id, $member_id);
							$Term_md->likeTerm($term_id);
							$response["status"] = "success";
							break;
						case "dislike":
							$Vote_md->dislikeTerm($term_id, $member_id);
							$Term_md->dislikeTerm($term_id);
							$response["status"] = "success";
							break;
						case "change":
							if(isset($_GET["flag"])){
								$flag = $_GET["flag"];
								$Vote_md->changeTermLog($term_id, $member_id);
								$Term_md->changeVoteTerm($term_id, $flag);
								$response["status"] = "success";
							}else{
								$response["status"] = "ERROR";
								$response["text"] = "ERROR(009) : invalid parameter";
							}
							break;
						case "cancel":
							if(isset($_GET["flag"])){
								$flag = (int)$_GET["flag"];
								if($flag==1) $Term_md->decreaseLike($term_id);
								else $Term_md->decreaseDislike($term_id);
								$Vote_md->deleteTermLog($term_id, $member_id);
								$response["status"] = "success";
							}else{
								$response["status"] = "ERROR";
								$response["text"] = "ERROR(004) : invalid parameter";
							}
							break;
						default:
							//todo : invalid vote parameter
							$response["status"] = "ERROR";
							$response["text"] = "ERROR(010) : invalid parameter";
					}
				}catch(Exception $e){
					$response["status"] = "error";
					$response["text"] = "ERROR(011) : server error";
				}
			}else{
				$response["status"] = "error";
				$response["text"] = "ERROR(012) : Invalid parameter";
			}
		}else{
			//todo : need to login
			$response["status"] = "error";
			$response["text"] = "ERROR(013) : Need to login";
		}
		print json_encode($response);
	}

	/**
	 *
	 */
	function svcAdded($url) {
		$term = array();
		if(isset($_POST["word"])) $term["word"] = $_POST["word"];
		if(isset($_POST["def"])) $term["def"] = $_POST["def"];
		$id = Core::getInstance("Term_md")->addTerm($term);
		$this->redirect("/term/".$id);
	}

	function svcUpdated($url) {
		$term = array();
		if(isset($_POST["word"])) $term["word"] = $_POST["word"];
		if(isset($_POST["def"])) $term["def"] = $_POST["def"];
		if(isset($_POST["id"])) $term["id"] = $_POST["id"];
		$result = Core::getInstance("Term_md")->updateTerm($term);
		var_dump($term);
		var_dump($result);
		if($result){
			//todo : redirect term exact page
			$this->redirect("/term/".$term["id"]);
		} else {
			//todo : redirect error page
		}
	}


}

?>