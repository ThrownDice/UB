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

	public static $data;

	function __construct($view = null) {
		parent::__construct();
	}

	function main($url = null) {
		//echo "Term main executed";
		//include "application/views/backup/index.html";
		/*$db = Core::getInstance("Database")->getConnection();
		$stmt = $db->prepare("select * from term");
		$stmt->execute();
		$result = $stmt->fetch();
		var_dump($result);*/
		/*echo "Inside of Term main", "<br>";*/
		if(isset($_GET["action"])){
			$action = $_GET["action"];
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
		}else{
			//todo : no action, 404 error or default action;
			//self::$data = $this->getModel()->getTermExact(14);
			//self::$data = $this->getModel()->deleteTerm(22);
			//var_dump($this->getModel()->deleteTerm(24));
			//include $this->view;
			echo "Inside of Term main", "<br>";
		}
	}

	function render(){

	}

}

?>