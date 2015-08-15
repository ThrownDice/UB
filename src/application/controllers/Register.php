<?php

/**
 * Class Register
 */
class Register extends Controller
{
    function __construct($view = null){
	    parent::__construct();
    }

    public function main($url = null){
		$this->view->render("tmpl_account", null);
    }

}