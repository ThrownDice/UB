<?php 
/**
 * View class php file.
 */



class View {

	// Instance ariables.
	
	$template;

	$div = array();
	$css;	
	/**
	 * View constructor.
	 */
	function __construct($file_template) {
		$this->setTemplate($file_template);
	}


	/**
	 * Set the template file.
	 * Use this if needed.
	 */
	function setTemplate($file_template) {
		$this->template = $file_template;
	}


	function setCss($file_css) {
		$this->css = $file_css;
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
	 * Controller calls this method to acutally show the page.
	 * @return [type] [description]
	 */
	function toDisplay() {

		// Need to variable test here.
		

		// Now, show!
		require_once $template;

	}



}




 ?>