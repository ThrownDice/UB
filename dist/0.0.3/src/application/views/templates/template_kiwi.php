<?php  
/**
 * Template file.
 * name: kiwi.
 *
 * @since July 30
 * @author Engine, Jihyeon
 */


/**
 * Display wipeout.
 */
	ob_end_clean();
    //echo 'display cleared <br>';


/**
 * Load variables.
 * @var $view[]
 * @var $data[]
 */
	$test = $this->test;
	//$view = $this->view;
	//$data = $this->data;


?>

<!-- html upper -->
<!DOCTYPE html>
<html>
<head>
<title><?=$this->test['title']?></title>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="apple-touch-icon" href="apple-touch-icon.png">

<!-- Place favicon.ico in the root directory -->

<!-- todo : static resource should be served by routing -->

<link rel="stylesheet" type="text/css" href="application/views/css/normalize.css">
<link rel="stylesheet" type="text/css" href="application/views/css/reset.css">
<link rel="stylesheet" type="text/css" href="application/views/css/index.css">

<script src="js/vendor/modernizr-2.8.3.min.js"></script>
<script src="js/vendor/jquery-1.11.3.min.js"></script>

</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- //html upper-->


<?php  

//echo $test['a'];
/**
 * Inside the body element, we include another file (of which the name matches with that of controller's).
 */
    require_once APPPATH.'views'.DS.'term.php'; 
    //require_once APPPATH.'views'.DS.$view['file'].'php';

?>

<!--html lower-->
</body>
</html>
<!--//html lower-->