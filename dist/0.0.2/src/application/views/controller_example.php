<?php  
/**
 * controller exmaple
 */




class Controller_example {


	$View;

	function __construct() {
		$this->View = new View($file_template);
	}

	function main() {
		
		$this->render();


	}

	function render() {
		

		$this->View('tempate');
		$this->toDisplay()
		// First, set the divs to show.
		// List of divs
		$this->View->setDiv('header');
		$this->View->setDiv('entry_pane');
		

		$this->View->setDiv('aside');	
			// sub divs of aside
			$this->View->setDiv('other_definition');
			$this->View->setDiv('ad_1')
			$this->View->setDiv('ad_2');
		

		// Get these to display.
		$this->View->toDisplay();

	}

}





?>