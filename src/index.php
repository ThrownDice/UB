<?php
/**
 * UB
 * @author Engine, Jihyeon
 * @since 06.25.2015 
 */

/**
 * This index.php serves as a gateway.
 * 
 */


/**
 * Error reporting on/off.
 * Also sets the debugging/regular mode
 */
	//error_reporting($param);
	$__debug = true;


/**
 * Set the path.
 */
	// Directory separator. For use of different OS.
	define('DS',DIRECTORY_SEPARATOR);
	
	// Set the system folder path.
	define('SYSPATH', 'system'.DS);
	
	// Set the application folder path.
	define('APPPATH', 'application'.DS);
	
	// Load the information of Core object.
	require_once SYSPATH.'core'.DS.'Core.php';


	// Create an object and initiate the program.
	$core = Core::getInstance();
	$core->main();

?>

