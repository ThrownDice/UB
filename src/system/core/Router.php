<?php  
/**
 * Router file.
 */


// Debugging.
__debug_load(__FILE__);


/**
 * Router class
 */
class Router{

	private $_map = array();

	function __construct($routing = null) {
		try{
			//Using array setting file for configuration and initializing
			if($routing){
				$maps = $routing->mapping;
				foreach($maps as $map){
					$this->attach($map->url, $map->controller["name"], $map->method);
				}
			}
		}catch(Exception $e){
			throw new Exception("Exception occurred while generating Router Class");
		}
	}

	function route() {
		// check if the url parameter is set
		if(isset($_GET['url'])){

			echo $_GET['url'];
			foreach($this->_map as $route){
				echo $route["url"], preg_match()
			}


		}
	}

	/**
	 * @param	String	$url
	 * @param	String 	$ctr
	 * @param	String	$method
	 */
	function attach($url, $ctr, $method = "GET"){
		$route = array();
		$route["url"] = $url;
		$route["controller"] = $ctr;
		$route["method"] = $method;
		array_push($this->_map, $route);
	}
}

?>