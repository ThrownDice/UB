<?php  
/**
 * Login file.
 */
	// Debugging.
	__debug_load(__FILE__);

/**
 * 
 */
class Login extends Controller {

	function __construct($view = null) {
		parent::__construct();
	}

	function main($url = null) {
		$method = strtolower($_SERVER["REQUEST_METHOD"]);
		if( $method == "get") {
			$this->doGet($url);
		}
		else if($method == "post") {
			$this->doPost($url);
		} else{
			//todo : redirect invalid method error page
		}
	}

	/**
	 * @param $url
	 */
	function doGet($url) {
		// Declare parameters and retrieve, if exists.
		$do = null;

		switch($do) {
			default: {
				$data["name_controller"] = "login";
				$this->view->render("tmpl_account", $data);
				break;
			}
		}
	}

	function doPost($url = null){
		if(isset($_POST["email"]) && isset($_POST["password"])) {
			$email = $_POST["email"];
			$password = $_POST["password"];

			$member = Core::getInstance("Member_md")->getMember($email, $password);
			if($member) {
				//todo : redirect main page
				$_SESSION["member"] = $member[0];
				$this->redirect("/term");
			} else {
				//todo : invalid user information,
			}
		}
	}

}
?>