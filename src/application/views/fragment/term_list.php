<style>
    #container #resultPane .result{
        border : 3px solid #2D79B2;
        -webkit-border-radius : 5px;
        -moz-border-radius : 5px;
        border-radius : 5px;
        margin : 10px 0px 10px 0px;
        width : 600px;
        padding : 10px 0px 10px 0px;
        background : white;
    }

    #container #resultPane .result:hover{
        border : 3px solid #FFAD0B;
    }

    #container .result_header{
        font-size : 9pt;
        color : gray;
        text-align : left;
    }

    #container .result_header .date{
        margin-left : 20px;
    }

    #container .result_header ul{
        margin : 0px;
        padding : 0px;
    }

    #container .result_content .word{
        font-size : 25pt;
        color : #2D79B2;
        margin-left : 10px;
        height : 50px;
        line-height : 50px;
    }

    #container .result_content .def{
        font-size : 10pt;
        margin-left : 20px;
    }

    #container .result_content_menu{
        height : 25px;
    }

    #container .result_content_menu span{
        width : 70px;
        height : 20px;
        margin : 0px 10px 0px 10px;
        float : right;
        text-align : right;
        line-height : 20px;
        cursor : pointer;
        font-size : 9pt;
        opacity : 0.8;
        color : gray;
    }

    #container .result_content_menu span:hover{
        opacity : 1.0;
        color : dimgray;
    }

    #container .result_content_menu .like{
        background : url(../img/thumbs-up-icon-blue-hi_s_b.png) no-repeat;
    }

    #container .result_content_menu .dislike{
        background : url(../img/thumbs-down-icon-blue-hi_s_b.png) no-repeat;
    }

</style>

<?php
$data = Term::$data;
foreach($data as $term){
    echo '<div class="result">';

    echo '<div class="result_header">';
    echo '<ul>';
    echo '<li><span class="date">', $term["date"], '</span></li>';
    echo '<li>', '<span class="ui-icon ui-icon-arrowthick-1-n"></span>', '</li>';
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