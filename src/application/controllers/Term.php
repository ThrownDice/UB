<?php

/**
 *UB Project
 * @author Engine and Kang Jihyeon
 * @copyright Copyright 2015 UB
 */


class Term extends X_Controller {
	
	function __construct() {
		$this->load->model('Term_md.php')
	}
	
	/**
	 * Default call.
	 * @return [type] [description]
	 */
	function index() {
		
		$this->load->view('top');
		$this->load->view('main');
		$this->load->view('bottom');
	}

	function index($term) {
		$this->load->model
	}

	function index($term, $tid) {

	}
}


?>