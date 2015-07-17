<?php
/**
 * UB
 * @author Engine, Jihyeon
 * @since 06.25.2015 
 */

/**
 * Gateway file.
 * @root/index.php
 *
 *
 *
 */


/**
 * Error reporting on/off.
 */
	//error_reporting($param);
	

/**
 * Set the path.
 */
	// Directory separator. For use of different OS.
	define('DS',DIRECTORY_SEPARATOR);
	
	// Set the system folder path.
	define('SYSPATH', 'system'.DS);
	
	// Set the application folder path.
	define('APPPATH', 'application'.DS);
	

/**
 * Load the files.
 */
	// Debugging preset.
	require_once SYSPATH.'core'.DS.'debug.php';

	// Load the information of Core object.
	require_once SYSPATH.'core'.DS.'Core.php';


	// Create an object and initiate the program.
	$core = Core::getInstance('Core');
	$core->main();


?>

