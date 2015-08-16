<?php
/**
 * temp_account file.
 */


/**
 * Display wipeout.
 */
	//ob_end_clean();

/**
 * Data preload
 */
	//$title = $data['title'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once APPPATH.'views'.DS.'fragment'.DS.'__head_account.php'; ?>
    <title><?php /*'$this->title*/?> -UB</title>
</head>
<body>
    <!-- header
    ======================================= -->
    <div id="header" class="border-red">
        <?php include_once APPPATH.'views'.DS.'fragment'.DS.'header_plain.php'; ?>
    </div>
    <!-- //header
    ======================================= -->

    <!-- main
    ======================================= -->
    <div id="main" class="border-red">

	    <!-- content
        ======================================= -->
	    <div id="content" class="border-red">
		    <!--
				Divs in content go here. Every page using this template has to have
				#content so you can add "content" divs in here.
			-->
		    <?php include_once APPPATH.'views'.DS.'fragment'.DS.$data['name_controller'].'.php'; ?>
	    </div>
	    <!-- //content
        ======================================= -->

	</div>
    <!-- //main
	======================================= -->

</body>
</html>