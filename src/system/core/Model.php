<?php  

// Check the mode. Only acts when debugging.
if($__debug) echo 'Model initiated <br>';


class Model {
	
	function __construct() {
		load = new Load();
		$this->load->database();
	}

	function default_method() {

	}

}


class Load() {
	
	/**
	 * ##
	 * @param  [type] $nameOfDatabase [description]
	 * @return [type]                 [description]
	 */
	function database($nameOfDatabase) {
		$nameOfDatabase = database object;
	}
}





?>