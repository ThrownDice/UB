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
	public static $db;
	public static $data = array();


	function __construct() {
		Core::getInstance('database');
	}

	function main() {

	}

}

?>