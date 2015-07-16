<?php  

// Debugging
if($__debug) echo 'Router loaded <br>';



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