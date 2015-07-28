<?php  
/**
 * 
 */

	// Debugging.
	__debug_load(__FILE__);




/**
 * 
 */
class Data {





	function set($key, $value) {
		$this->$key = $value;
	}
	


	function get($key) {
		return $this->$key;
	}

}









?>