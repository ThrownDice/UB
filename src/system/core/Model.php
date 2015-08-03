<?php  
/**
 * Model file.
 */

// Debugging.
__debug_load(__FILE__);

/**
 * Model class
 */
class Model {
	// Instance variables.
	// data array which holds different types of data.
	public static $data = array();
	public static $db;



	/**
	 * Get the instance of Database object and connect.
	 * @return connection to the database.
	 */
	public static function getDatabase(){
		self::$db = Core::getInstance("Database")->getConnection();
		return Core::getInstance("Database")->getConnection();
	}
}

?>