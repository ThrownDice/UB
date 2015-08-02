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
    <?php if(isset($this->div['header']) include_once APPPATH.'views'.DS.'fragment'.DS.'header.php';?>
    <div id="container">
        <?php if(isset($this->div['entry_pane']) include_once APPPATH.'views'.DS.'fragment'.DS.'entry_pane.php';?>
        <?php if(isset($this->div['aside']) include_once APPPATH.'views'.DS.'fragment'.DS.'aside.php';?>
    </div>

</div>
</body>
</html>