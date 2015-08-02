<?php
echo "test";
    ob_end_clean();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>

    <link rel="stylesheet" type="text/css" href="application/views/test/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="application/views/test/thema/thema-default.css">

</head>
<body>

<div id="wrap">
    <div id="header">
        <div class="gnb">
            <ul class="header_menu">
                <li> <div class="logo"> 타이틀 미정 </div></li>
                <li><!--About--></li>
                <li><!--Rules--></li>
            </ul>
            <ul class="search_bar">
                <li> <input type="text" class="search_input"> </li>
                <li> <div class="btn">검색</div> </li>
                <li> <div class="btn"> 단어 추가 </div></li>
            </ul>
        </div>
    </div>

    <div id="container">

        <div class="aside">
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
            <?php
                $data = Term::$data;
                foreach($data as $term){
                    echo '<div class="result">';

                    echo '<div class="result_header">';
                    echo '<ul>';
                    echo '<li>', $term["date"], '</li>';
                    echo '<li>', '</li>';
                    echo '</ul>';
                    echo '</div>';

                    echo '<div class="result_content">';
                    echo '<div class="word">', $term["word"], '</div>';
                    echo '<div class="def">', $term["def"], '</div>';
                    echo '</div>';

                    echo '<div class="result_content_menu">';
                    echo '<span> Dislike', $term["dislike"], '</span>';
                    echo '<span> Like', $term["like"], '</span>';
                    echo '</div>';

                    echo '</div>';
                }
            ?>
        </div>

    </div>

</div>
</body>
</html>