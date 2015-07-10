<?php  




/**
 *
 * shares a term model with Term.php controller.
 */
class Index extends X_Controller{

	function __construct() {
		$this->load->model('Term_md.php');
		$data = $this->Term_md->getRecent(10);
	}

	function index() {
		$this->load->view('top.php');
		$this->load->view('header.php');
		$this->load->view('pane.php', $data);

		$temp = array('rt', 'ad', 'sn');
		$this->load->view('aside.php', $temp);
	}


}






?>