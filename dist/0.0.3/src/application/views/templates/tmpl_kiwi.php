<?php
//ob_end_clean();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once APPPATH.'views'.DS.'fragment'.DS.'head_default.php'; ?>
    <title> <?=$this->title?> </title>
</head>
<body>
<div id="wrap">
    <!-- header -->
	<div id="header">
        <?php include_once APPPATH.'views'.DS.'fragment'.DS.'div_header.php'; ?>
    </div>
	<!-- //header -->
	<!-- container -->
	<div id="container">
		<!-- content -->
		<div id="content">
			<?php if($this->hasDiv("entry_pane")) include_once APPPATH.'views'.DS.'fragment'.DS.'div_entry_pane.php'; ?>
			<!--
				Divs in content go here.
				every page using this template has to have #content so you can add
				"content" divs in here.
			-->
		</div>
		<!-- //content -->


		<!--
			Something out of #content area.
			For example, some page needs aside div, then it goes here.
		-->
		<?php include_once APPPATH.'views'.DS.'fragment'.DS.'div_spot.php'; ?>
	    <?php include_once APPPATH.'views'.DS.'fragment'.DS.'div_aside.php'; ?>

    </div>
	<!-- //container -->


</div>
</body>
</html>