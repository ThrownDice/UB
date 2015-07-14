<?php  

// Debugging
echo 'Router loaded <br>';


$ex = "ex";


/**
 * Router class
 * Singleton Object
 */
class Router {
	
	// Instance variables.
	private static $instance;

	// Disable constructor
	private function __construct() {}

	/**
	 * Create an instance and assign it to the static variable.
	 * @return [type] [description]
	 */
	public function getInstance() {
		// If not made before,
		if(!self::$instance)
			self::$instance = new static();
		
		echo 'Router created <br>';
		return self::$instance;
	}

	public function ex1() {
		echo $ex;
	}









}





?>