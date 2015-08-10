<?php 

/**
 * View class file.
 * 
 * 
 */

	// Debugging.
	__debug_load(__FILE__);


/**
 * View class.
 * 
 */
class View {

	// Instance variables.
	private $template;
	public $divs = array();
	private $_CONSTANT = array();


	/**
	 * View constructor.
	 * @param $file_template Template file.
	 */
	function __construct($file_template = null) {
		$this->setTemplate($file_template);
	}


	/**
	 * Set the template file for this view object.
	 * @param $file_template Template file.
	 */
	function setTemplate($file_template) {
		$this->template = $file_template;
	}


	/**
	 * Set value to $_CONSTANT array with key being "$key".
 	 * @param $key
	 * @param $value
	 * @throws Exception
	 */
	public function __set($key, $value){
		try{
			//echo "Setting '$name' to '$value'\n";
			$this->_CONSTANT[$key] = $value;
		}catch(Exception $e){
			throw new Exception("Can't set '$key' to member variable. <br>");
		}
	}

	/**
	 * Get value from $_CONSTANT array by key being $key.
	 * @param  $key
	 * @return
	 * @throws Exception
	 */
	public function __get($key){
		try{
			//echo "Getting '$name'\n";
			return $this->_CONSTANT[$key];
		}catch(Exception $e){
			throw new Exception("Can't return '$key' member variable. <br>");
		}
	}

	/**
	 * Check if this View has been set a div to show.
	 * @param $div
	 */
	public function hasDiv($div) {
		$result = false;
		foreach($this->divs as $divSet) {
			if($divSet == $div) $result = true;
		}
		return $result;

	}


	/**
	 * Include the divs to be shown.
	 * Divs that are class not id.
	 * @param  $div Array of divs.
	 */
	function setDiv($divs) {
		// to be commented
		$this->divs = $divs;
	}


	/**
	 * Print out everything we loaded into display.
	 * 
	 */
	function render($file_template, $data) {
		
		// Now, get all to display.
		require_once APPPATH.'views'.DS.'templates'.DS.$file_template.'.php';
	}

}



?>