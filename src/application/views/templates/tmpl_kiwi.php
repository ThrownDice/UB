<?php
//ob_end_clean();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once APPPATH.'views'.DS.'fragment'.DS.'head-default.php'; ?>
    <title> <?=$this->title?> </title>
</head>
<body>
    <!-- header
    ==============================================-->
    <header>
        <?php include_once APPPATH.'views'.DS.'fragment'.DS.'header-default.php'; ?>
    </header>

    <!-- main
    ==============================================-->
    <main>
    <div id="content">
            <?php if($this->hasElem("entry_pane")) include_once APPPATH.'views'.DS.'fragment'.DS.'div_entry_pane.php'; ?>
            <!--
                Divs in content go here.
                every page using this template has to have #content so you can add
                "content" divs in here.
            -->
        </div>



        <!--
            Something out of #content area.
            For example, some page needs aside div, then it goes here.
        -->
        <?php include_once APPPATH.'views'.DS.'fragment'.DS.'div_spot.php'; ?>
        <?php include_once APPPATH.'views'.DS.'fragment'.DS.'div_aside.php'; ?>

    </main>
</body>
</html>