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
	private $name;
	private $host;
	private $port;
	private $user;
	private $password;

	function __construct($config) {
		try{
			$this->name = trim((string)$config->name);
			$this->host = trim((string)$config->host);
			$this->port = trim((string)$config->port);
			$this->user = trim((string)$config->user);
			$this->password = trim((string)$config->password);
		}catch(Exception $e){
			throw new Exception("Failed to generating Database Class.");
		}
	}

	public function connect() {
	}



	/**
	 * [setTable description]
	 * @param [type] $table_name [description]
	 */
	public function setTable($table_name) {

	}

}




?>