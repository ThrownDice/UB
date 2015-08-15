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
        <?php include_once APPPATH.'views'.DS.'fragment'.DS.'login.php'; ?>
    </div>

</div>
</body>
</html>