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
				//todo : create new term data
				break;
			case "update" :
				//todo : update term data
				break;
			case "delete" :
				//todo : delete term data
				break;
			case "read" :
			default :
				//todo : select term data
				self::$data = $this->getModel()->getRecentTerm($this->DEFAULT_TERM_COUNT);
				$this->render();
		}

	}

	function render(){
		require_once $this->view;
	}

}
?>