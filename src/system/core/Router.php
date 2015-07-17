<?php  
/**
 * Router file.
 */


// Debugging.
__debug_load("Router");



/**
 * Router class
 */
class Router {

	/**
	 * [$url description]
	 *
	 * URL: segment[0]/segment[1]/segment[2]/...
	 * URL: localhost/url[1]/url[2]/url[3]/...
	 * @var array
	 */
	public static $url = array();
	public static $urlToUse = array();

	/**
	 * [route description]
	 * @return [type] [description]
	 */
	function route() {
		// check if the url parameter is set
		if(isset($_GET['url'])){
			// Load the url into urlToUse variable.
			$urlToUse = $_GET['url'];
			
			// Trim the urlToUse to remove slashes on right
			$urlToUse = rtrim($urlToUse,'/');
			
			// Break the urlToUse into fragments
			$urlToUse = explode('/',$urlToUse);
			
			// Increment every indices by 1 and assign to a new $url.
			foreach($urlToUse as $key => $value){
				$this->url[$key+1] = $value;
			}
			
			
			// Call the controller. Controller then will do from there on.
			if(isset($this->url[1])){
				echo $this->url[1];
				Core::callObject($this->url[1]);	
			}
			
			
			
		}			
	}


	/**
	 * [set description]
	 * Helper function.
	 * @param [type] $key   [description]
	 * @param [type] $value [description]
	 */
	function set($key, $value) {
		$this->$key = $value;
	}

}

?>