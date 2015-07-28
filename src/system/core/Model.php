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
	public static function getDatabase(){
		return Core::getInstance("Database")->getConnection();
	}
}

?>