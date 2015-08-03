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
	private $css;
	private $div = array();



	/**
	 * View constructor.
	 * @param $file_template Template parameter as a 
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
	 * Controller uses this method to set the divs to show.
	 * Include the divs to be shown.
	 * @param  [type] $div [description]
	 * @return [type]      [description]
	 */
	function setDiv($div) {
		// Set the value of key '$div' 1 so this can be shown in a template file.
		$this->div[$div] = 1;
	}



	/**
	 * Print out everything we loaded into display.
	 * 
	 */
	function toDisplay() {
		
		// Now, get all to display.
		require_once APPPATH.'views'.DS.'templates'.DS.$this->template.'.php';
	}

}



?>