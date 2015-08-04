<?php  
/**
 * Router file.
 * description needed.
 */

// Debugging.
__debug_load(__FILE__);


/**
 * Router class
 * description needed.
 */
class Router{

	// Instance variables.
	// $_routes holds multiple routes that can be directed by route function.
	private $_routes = array();

	/**
	 * Router constructor.
	 * @param $config "Router" element from config.xml
	 */
	function __construct($config = null) {
		try{
			if($config){
				// Create a local variable and assign "route" elements from config.xml.
				$routes = $config->route;
		
				// Iterate over each 'route' element.
				foreach($routes as $route){
					// Append scanned information of "route" elements into $_route array.	
					$this->toRoutes($route->url, (string)$route->controller["name"], $route->method);
				}
			}
		}catch(Exception $e){
			throw new Exception("Exception occurred while generating Router Class");
		}
	}

	/**
	 * [route description]
	 * @return [type] [description]
	 */
	function route() {
		try{
			// Check if the url parameter is set
			if(isset($_GET["url"])) {
				foreach ($this->_routes as $_route) {
					if ($this->match($_route, $_GET["url"], $_SERVER["REQUEST_METHOD"]))
						return Core::getInstance($_route["controller"])->main();
					
				}
			}
			// If there is no mapped controller, route to 404 page.
			include ERROR404;
		}catch(Exception $e){
			//todo : routing error, route to error page.
		}
	}

	/**
	 * toRoute. Assign scanned information into a designated variable ($_route).
	 * @param	String	$url
	 * @param	String 	$ctr
	 * @param	String	$method
	 */
	function toRoutes($url, $ctr, $method = "GET"){
		// Create a local variable of array to add to $this->_route.
		$route = array();
		
		// Take each of data from parameters into an array.
		$route["url"] = '#'.trim($url).'#';
		$route["controller"] = $ctr;
		$route["method"] = trim(strtolower($method));

		// Save the array of data.
		array_push($this->_routes, $route);
	}

	/**
	 * Compares $_route with two other (url, method) parameters.
	 * @param  [type] $_route [description]
	 * @param  [type] $url    [description]
	 * @param  [type] $method [description]
	 * @return bool
	 */
	function match($_route, $url, $method){
		// Compares regular expression set from configuration with the actual url.
		preg_match($_route["url"], $url, $match);
		
		// If there is a match, return true, otherwise false
		if(isset($match[0])){
			return (!strcmp($match[0], $url) && (!strcmp($_route["method"], strtolower($method))));
		}else{
			return false;
		}
	}
}
?>