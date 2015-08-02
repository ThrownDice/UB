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

<<<<<<< HEAD
	public static $data;
	
	// ## for testing. (this is to be deleted)
	public $test = array();

	function __construct($view = null) {
		parent::__construct();
		
		// ## for testing. (this is to be deleted)
		$this->test['title'] = "term";
		$this->test['a'] = 1;
=======
	function __construct($view = null) {
		parent::__construct();
		self::$_info["Controller"] = "Term";
>>>>>>> bf3ef61118ecf410e7e95de876fa0bcdfd0d4560
	}

	function main($url = null) {
		if(isset($_GET["action"])){
			$action = $_GET["action"];
<<<<<<< HEAD
			switch($action){
				case "create" :
					//todo : create new term data
					echo "action : create", ",<br>";
					break;
				case "update" :
					//todo : update term data
					echo "action : update", ",<br>";
					break;
				case "delete" :
					//todo : delete term data
					echo "action : delete", ",<br>";
					break;
				case "read" :
				default :
					//todo : select term data
					echo "action : select", ",<br>";
			}
		} else {
			//todo : no action, 404 error or default action;
			//self::$data = $this->getModel()->getTermExact(14);
			//self::$data = $this->getModel()->deleteTerm(22);
			//var_dump($this->getModel()->deleteTerm(24));
			//include $this->view;
			echo "Inside of Term main", "<br>";
			$this->render();
=======
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
>>>>>>> bf3ef61118ecf410e7e95de876fa0bcdfd0d4560
		}

	}

	function render(){
<<<<<<< HEAD
		// ## for testing. (this is to be deleted)
		require_once APPPATH.'views'.DS.'templates'.DS.'template_kiwi.php';
=======
		//require_once $this->view;
>>>>>>> bf3ef61118ecf410e7e95de876fa0bcdfd0d4560
	}

}
?>