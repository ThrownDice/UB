<?php  
/**
 * Debug configuration
 */


// Set parameters.
// Debug on/off.
	$__debug = true;

// Display current setting.
	echo '$__debug = '.var_export($__debug,true).'<br>';
	// echo 'other settings,,.<br>';
	echo '========================================<br>';



	/**
	 * [debug_load description]
	 * @param  [type] $class [description]
	 * @return [type]        [description]
	 */
	function __debug_load($path) {
		global $__debug;
		if($__debug) {
			// Trim the path so that only the last segment would be left.
			$path = substr(strrchr($path, '\\'), 1);
			echo $path.' loaded <br>';
		}
	}


?>