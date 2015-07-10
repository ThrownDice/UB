<?php

/**
 *UB Project
 * @author Engine and Kang Jihyeon
 * @copyright Copyright 2015 UB
 */


class Index extends X_Controller {
	
	/**
	 * default call. when URL localhost is called
	 * @return [type] [description]
	 */
	function index() {
		$this->load->view('top');
		$this->load->view('main');
		$this->load->view('bottom');
	}

	/**
	 * When user queries with a string
	 * @param  [type] $term [description]
	 * @return [type]       [description]
	 */
	function getTerm($term) {

	}

	/**
	 * When user tries to access with only an id.
	 * This covers when queried with both an id and a string.
	 * @param  [type] $tId [description]
	 * @return [type]      [description]
	 */
	function getId($tId) {

	}

	/*
	 * 
	 * @param  [type] $term [description]
	 * @param  [type] $tId  [description]
	 * @return [type]       [description]
	function getTermAndId($term, $tId) {
		$this->view($term, $tId);
	}
	*/

	/**
	 * Directs to About.
	 * @return [type] [description]
	 */
	function getAbout() {

	}

	function 
}


?>