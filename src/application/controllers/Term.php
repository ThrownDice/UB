<?php
/**
 * Term file.
 */

	// Debugging.
	__debug_load(__FILE__);




/**
 * 
 */
class Term extends Controller {

	/**
	 * [__construct description]
	 */
	function __construct() {
		$this->getModel(array('Term_md', 'Comment_md'));
		
	}


	/**
	 * [main description]
	 * @param  [type] $url [description]
	 * @return [type]      [description]
	 */
	function main($url) {
		parent::main($url);
		
		// $this->model['Term_md']->
	}


	




}
	

?>