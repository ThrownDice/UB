<?php  

// Check the mode. Only acts when debugging.
if($__debug) echo 'Router initiated <br>';



/**
 * Router class
 * Singleton Object
 */
class Router {
	
	// Instance variables.
	private static $instance;

	// Disable constructor
	private function __construct() {}

	function route() {
		echo 'route()';
	}

}

?>