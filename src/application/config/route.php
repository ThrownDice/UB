<?php  

	$route = array();

	function read($nameOfController) {
		require(PATH.$nameOfController);
	}


	/**
	 *
	 *
	 * SEGMENT1 = controller's name
	 * SEGMENT2 = parameter1
	 * SEGMENT(N) = parameter(n-1)
	 * 
	 * URL: localhost/SEGMENT1/SEGMENT2/...
	 * ex) URL: localhost/controller/p1
	 */
	if(SEGMENT[1]=='controller' && $controller==null){
		read(controller);	
		//create an instance and assign it to variable so that it can be used again and again.
		$route[controller] = new controller();
		$route[controller]->$default_method(p1);
	}


	// When there is an instance already,
	// We reuse the instance already created and call the default_method.
	if(SEGMENT[2]=='controller' && $controller!=null){
		$route[controller]->$default_method(p1);
	}





?>