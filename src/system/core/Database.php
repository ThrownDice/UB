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

	//PDO object
	private $db;


	/**
	 * 
	 * @param $config "Database" element from config.xml
	 */
	function __construct($config) {
		
		try{
			$this->name = trim((string)$config->name);
			$this->host = trim((string)$config->host);

			$this->port = trim((string)$config->port);
			$this->user = trim((string)$config->user);
			$this->password = trim((string)$config->password);

			$db = new PDO("mysql:host=".$this->host.";dbname=".$this->name.";charset=utf8", $this->user, $this->password);

			$db->exec("set session character_set_connection=utf8;");
			$db->exec("set session character_set_results=utf8;");
			$db->exec("set session character_set_client=utf8;");
			$db->exec("set names utf8;");

			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$this->db = $db;
		}catch(Exception $e){
			throw new Exception("Failed to generate Database Class.".$e);
		}
	}

	public function getConnection() {
		return $this->db;
	}

	public function __clone(){}

}


?>