<?php
ob_end_clean();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> UB </title>
    <?php
    include_once APPPATH.'views'.DS.'fragment'.DS.'include.php';
    ?>
</head>
<body>

<div id="wrap">
    <div id="header">
        <?php include_once APPPATH.'views'.DS.'fragment'.DS.'header.php'; ?>
    </div>

    <div id="container">

        <div class="aside">
            <!--todo : add advertise or recommended term node-->
            <div class="ad">
                <div class="ad_node">
                    <img src="http://placehold.it/200x300">
                </div>
                <div class="ad_node">
                    <img src="http://placehold.it/200x150">
                </div>
            </div>
        </div>

        <div id="resultPane">
            <?php include_once APPPATH.'views'.DS.'fragment'.DS.'member_add.php'; ?>
        </div>

    </div>

</div>
</body>
</html>