<?php
/**
 * Term file.
 */

	// Debugging.
	__debug_load(__FILE__);

/**
 * 
 */
class Term extends Controller {

	function __construct($view = null) {
		parent::__construct();
		self::$_info["Controller"] = "Term";
	}

	function main($url = null) {
		if(isset($_GET["action"])){
			$action = $_GET["action"];
		}else{
			$action = "read";
		}

		switch($action){
			case "create" :
				//if GET method is requested, then response adding term page
				//or POST method is requested, then add new term and redirect page
				if(strtolower($_SERVER["REQUEST_METHOD"]) == "get"){
					require_once APPPATH.'views'.DS.'templates'.DS.'template_term_edit.php';
				}else{
					$term = array();
					if(isset($_POST["word"])) $term["word"] = $_POST["word"];
					if(isset($_POST["def"])) $term["def"] = $_POST["def"];
					$id = Core::getInstance("Term_md")->addTerm($term);
					$this->redirect("/term/".$id);
				}
				break;
			case "update" :
				//todo : update term data
				var_dump($_SERVER);
				break;
			case "delete" :
				//todo : delete term data
				break;
			case "read" :
			default :
				//todo : select term data
				$seg = explode("/", $_GET["url"]);
				if( (sizeof($seg)>1) && is_numeric($seg[1])){
					self::$data = Core::getInstance("Term_md")->getTermExact($seg[1]);
					require_once APPPATH.'views'.DS.'templates'.DS.'template_term_list.php';
				}else{
					self::$data = Core::getInstance("Term_md")->getRecentTerm($this->DEFAULT_TERM_COUNT);
					require_once APPPATH.'views'.DS.'templates'.DS.'template_term_list.php';
				}
		}

	}

	function render(){
		//require_once $this->view;
	}

}
?>