<?php
//ob_end_clean();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once APPPATH.'views'.DS.'fragment'.DS.'__head.php'; ?>
    <title> <?=$this->title?> </title>
</head>
<body>
    <!-- header
    ======================================= -->
    <div id="header">
        <?php include_once APPPATH.'views'.DS.'fragment'.DS.'header.php'; ?>
    </div>
    <!-- //header
    ======================================= -->

    <!-- main
    ======================================= -->
    <div id="main">
	    <?php include_once APPPATH.'views'.DS.'fragment'.DS.'ad_top.php'; ?>
	    <div id="content">
		    <!--
				Divs in content go here.
				every page using this template has to have #content so you can add
				"content" divs in here.
			-->
		    <?php if($this->hasElem('entry_pane')) include_once APPPATH.'views'.DS.'fragment'.DS.'entry_pane.php'; ?>
		    <?php if($this->hasElem('term_edit')) include_once APPPATH.'views'.DS.'fragment'.DS.'term_edit.php'; ?>
		    <?php if($this->hasElem('login')) include_once APPPATH.'views'.DS.'fragment'.DS.'login.php'; ?>
	    </div>
	    <?php include_once APPPATH.'views'.DS.'fragment'.DS.'aside.php'; ?>

    </div>
    <!-- //main
	======================================= -->

</body>
</html>