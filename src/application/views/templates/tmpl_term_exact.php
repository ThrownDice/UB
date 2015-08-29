<?php
/**
 * temp_term file.
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
    <?php include_once APPPATH.'views'.DS.'fragment'.DS.'__head_default.php'; ?>
	<?php include_once APPPATH.'views'.DS.'fragment'.DS.'__head_common.php'; ?>
    <title><?php /*'$this->title*/?> -UB</title>
</head>
<body>
    <!-- header
    ======================================= -->
    <div id="header" class="border-red">
        <?php include_once APPPATH.'views'.DS.'fragment'.DS.'header.php'; ?>
    </div>
    <!-- //header
    ======================================= -->

    <!-- main
    ======================================= -->
    <div id="main" class="border-red">
	    <!-- aside
        ======================================= -->
	    <div id="aside" class="border-red">
		    <?php include_once APPPATH.'views'.DS.'fragment'.DS.'index_pane.php'; ?>
		    <?php include_once APPPATH.'views'.DS.'fragment'.DS.'ad_aside.php'; ?>
		    <?php include_once APPPATH.'views'.DS.'fragment'.DS.'sns.php'; ?>
	    </div>
	    <!-- //aside
        ======================================= -->

	    <!-- content
        ======================================= -->
	    <div id="content" class="border-red">
		    <!--
				Divs in content go here. Every page using this template has to have
				#content so you can add "content" divs in here.
			-->
		    <?php include_once APPPATH.'views'.DS.'fragment'.DS.'ad_top.php'; ?>
		    <?php include_once APPPATH.'views'.DS.'fragment'.DS.'entry_exact.php'; ?>
	    </div>
	    <!-- //content
        ======================================= -->

	</div>
    <!-- //main
	======================================= -->

</body>
</html>