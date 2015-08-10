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

	function __construct($view = null){
		parent::__construct();
	}

	function main($url = null) {
		if(strtolower($_SERVER["REQUEST_METHOD"]) == "get"){
			//todo : if request method is get,
			require_once APPPATH.'views'.DS.'templates'.DS.'template_login.php';
		}else{
			//todo : if request method is post
			//todo : should we set session time out?
			if(isset($_POST["email"]) && isset($_POST["password"])){
				$email = $_POST["email"];
				$password = $_POST["password"];

				$member = Core::getInstance("Member_md")->getMember($email, $password);
				if($member){
					//todo : redirect main page
					$_SESSION["member"] = $member[0];
					$SID = session_id();
					echo '1 : ', $SID;
					$this->redirect("/term");
					//require_once APPPATH.'views'.DS.'templates'.DS.'template_term_list.php';
				}else{
					//todo : invalid user information,
				}

			}
		}
	}

	function render($file_template){

	}

}
?>