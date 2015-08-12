<?php
/**
 * Login file.
 */
// Debugging.
__debug_load(__FILE__);

/**
 *
 */
class Logout extends Controller {

    function __construct($view = null){
        parent::__construct();
    }

    function main($url = null) {
        //todo : destroy session data, session id
        $_SESSION = array();
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-42000, '/');
        }
        session_destroy();
        $this->redirect("/term");
    }

    function render($file_template){

    }

}
?>