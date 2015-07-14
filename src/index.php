<?php


/**
 * UB
 * @author Engine, Jihyeon
 * @since 06.25.2015 
 *
 *
 * This index.php serves as a gateway.
 */


/**
 * Set the path.
 */
	// Directory separator. For use of different OS.
	define('DS',DIRECTORY_SEPARATOR);
	
	// Set the system folder path.
	define('SYSPATH', 'system'.DS);
	
	// Set the application folder path.
	define('APPPATH', 'application'.DS);
	
	// Read the information of Core
	// Debugging printer_logical_fontheight(printer_handle, height)
	echo 'require'.' '.SYSPATH.'core'.DS.'Core.php <br>';
	
	// Load the information of Core object.
	require_once SYSPATH.'core'.DS.'Core.php';

	$core = Core::getInstance();
	
	$routes = array();
	$url = $_GET['url'];
	$url = rtrim($url,'/');
	$url = explode('/', $url);
	//var_dump($url);

	foreach($url as $key => $value)
		$routes[$key] = $value;

	var_dump($routes);



?>

