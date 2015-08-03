<?php
//ob_end_clean();
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
                    <img src="http://placehold.it/200x300" alt="no-name">
                </div>
                <div class="ad_node">
                    <img src="http://placehold.it/200x150" alt="no-name">
                </div>
            </div>
        </div>

        <div id="resultPane">
            <?php include_once APPPATH.'views'.DS.'fragment'.DS.'term_list.php'; ?>
        </div>

    </div>

</div>
</body>
</html>