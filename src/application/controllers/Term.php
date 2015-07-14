<?php

/**
 *UB Project
 * @author Engine and Kang Jihyeon
 * @copyright Copyright 2015 UB
 */


class Term extends Controller {
	
	function __construct() {
		$this->load->model('Term.php')
	}
	
	
	/**
	 * Default call.
	 * @return [type] [description]
	 */
	function default_method(X) {
		$this->Term_md->method1(X);
		$this->load->view(X);
	}

	/**
	 * @overload 
	 */
	function default_method(X,Y) {
		$this->Term_md->method1(X,Y);
		$this->load->view(X,Y)
	}



?>