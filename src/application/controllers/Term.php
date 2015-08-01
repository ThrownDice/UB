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
				//todo : determine which method is requested. (GET or POST)
				//todo : create new term data
				if(strtolower($_SERVER["REQUEST_METHOD"]) == "get"){
					require_once APPPATH.'views'.DS.'templates'.DS.'template_term_edit.php';
				}else{
					$term = array();
					if(isset($_POST["word"])) $term["word"] = $_POST["word"];
					if(isset($_POST["def"])) $term["def"] = $_POST["def"];
					$id = Core::getInstance("Term_md")->addTerm($term);
					$this->redirect("/term");
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
				self::$data = Core::getInstance("Term_md")->getRecentTerm($this->DEFAULT_TERM_COUNT);
				require_once APPPATH.'views'.DS.'templates'.DS.'template_term_list.php';
		}

	}

	function render(){
		//require_once $this->view;
	}

}
?>