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
	//error_reporting(E_ALL);


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

	// Define preset.
	require_once APPPATH.'config'.DS.'define.php';

	// Load the information of Core object.
	require_once SYSPATH.'core'.DS.'Core.php';

	// Create a core object with configuration file as parameter,
	// and execute main method.
	$core = new Core(APPPATH.'config'.DS.'config.xml');
	$core->main();

?>

