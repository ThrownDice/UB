<?php  
/**
 * Database Object file.
 */

	// Debugging.
	__debug_load(__FILE__);




/**
 * Database class.
 */
class Database {
	
	// Instance variables.
	public static $db = null;



	/**
	 * [__construct description]
	 */
	function __construct() {
		/*
		 * For Configuration files, customized preset will be loaded directly, 
		 * rather than through autoload method defined in Core
		 */
		require_once APPPATH.'config'.DS.'database.php';
		
		$this->db = null;
		self::connect();

	}



	public function connect() {
		echo 'power<br>';
		if(!isset($this->db)){
			global $server_name;
			echo $server_name;
			// $db = 
		}
	}



	/**
	 * [setTable description]
	 * @param [type] $table_name [description]
	 */
	public function setTable($table_name) {

	}

}




?>