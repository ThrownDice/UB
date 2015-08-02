<?php
$data = Term::$data;
foreach($data as $term){
    echo '<div class="result">';

    echo '<div class="result_header">';
    echo '<ul>';
    echo '<li><span class="date">', $term["date"], '</span></li>';
    echo '<li>', '</li>';
    echo '</ul>';
    echo '</div>';

    echo '<div class="result_content">';
    echo '<div class="word">', $term["word"], '</div>';
    echo '<div class="def">', $term["def"], '</div>';
    echo '</div>';

    echo '<div class="result_content_menu">';
    echo '<span class="dislike">', $term["dislike"], '</span>';
    echo '<span class="like">', $term["like"], '</span>';
    echo '</div>';

    echo '</div>';
}
?>