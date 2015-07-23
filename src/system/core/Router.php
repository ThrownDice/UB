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
					$this->attach($map->url, (string)$map->controller["name"], $map->method);
					//var_dump($map->controller["name"]);
				}
			}
		}catch(Exception $e){
			throw new Exception("Exception occurred while generating Router Class");
		}
	}

	function route() {
		// check if the url parameter is set
		try{
			if(isset($_GET["url"])) {
				foreach ($this->_map as $route) {
					if ($this->match($route, $_GET["url"], $_SERVER["REQUEST_METHOD"])) {
						//echo $route["controller"], " will be staged.<br>";
						return Core::getInstance($route["controller"])->main();
					}
				}
			}
			//todo : no mapped controller, route to 404 page
			echo "404";
		}catch(Exception $e){
			//todo : routing error, route to error page.
		}
	}

	/**
	 * @param	String	$url
	 * @param	String 	$ctr
	 * @param	String	$method
	 */
	function attach($url, $ctr, $method = "GET"){
		$route = array();
		$route["url"] = '#'.trim($url).'#';
		$route["controller"] = $ctr;
		$route["method"] = trim(strtolower($method));
		array_push($this->_map, $route);
	}

	function match($route, $url, $method){
		preg_match($route["url"], $url, $match);
		if(isset($match[0])){
			return (!strcmp($match[0], $url) && (!strcmp($route["method"], strtolower($method))));
		}else{
			return false;
		}
	}
}
?>