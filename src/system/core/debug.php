<?php  
/**
 * Debug configuration
 */


// Set parameters.
// Debug on/off.
	$__debug = true;

// Display current setting.
	echo '$__debug = '.var_export($__debug,true).'<br>';





	/**
	 * [debug_load description]
	 * @param  [type] $class [description]
	 * @return [type]        [description]
	 */
	function __debug_load($class) {
		global $__debug;
		if($__debug) echo $class.' loaded<br>';
	}


?>