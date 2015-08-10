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

    #container .result_header .ui-icon{
        float : right;
        margin : 0px 5px 0px 5px;
        opacity : 0.5;
        cursor : pointer;
    }

    #container .result_header .ui-icon:hover{
        opacity : 0.8;
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

    #container .result_content_menu .thumbs-up{
        background : url(/application/views/img/thumbs-up-icon-hi_s_b.png) no-repeat;
    }

    #container .result_content_menu .thumbs-down{
        background : url(/application/views/img/thumbs-down-icon-hi_s_b.png) no-repeat;
    }

    #container .result_content_menu .thumbs-up-b{
        background : url(/application/views/img/thumbs-up-icon-blue-hi_s.png) no-repeat;
    }

    #container .result_content_menu .thumbs-down-b{
        background : url(/application/views/img/thumbs-down-icon-blue-hi_s.png) no-repeat;
    }

</style>

<?php
$data = Term::$data;
foreach($data as $term){
    echo '<div class="result" term-id="', $term["id"], '">';

    echo '<div class="result_header">';
    echo '<ul>';
    echo '<li>';
    echo '<span class="date">', $term["date"], '</span>';
    echo '<span class="btn-delete ui-icon ui-icon-close" term-id="', $term["id"], '"></span>';
    echo '<span class="btn-modify ui-icon ui-icon-pencil" term-id="', $term["id"], '"></span>';
    echo '</li>';
    echo '</ul>';
    echo '</div>';

    echo '<div class="result_content">';
    echo '<div class="word">', $term["word"], '</div>';
    echo '<div class="def">', $term["def"], '</div>';
    echo '</div>';

    echo '<div class="result_content_menu">';
    echo '<span class="dislike thumbs-down">', $term["dislike"], '</span>';
    echo '<span class="like thumbs-up">', $term["like"], '</span>';
    echo '</div>';

    echo '</div>';
}
?>

<script>
    $('.btn-delete').on('click', function(){
        //todo : show message box of confirm deletion
        var id = $(this).attr('term-id');
        $.ajax({
            url : '/term?action=delete&id='+id,
            type : 'DELETE',
            success : function(result){}
        }).done(function(data){
            var result = JSON.parse(data);
            if(result && result.status === 'success'){
                //$('.term-'+id).hide('drop', {}, 500);
                $('.term-'+id).hide(500);
            }
        }).fail(function(jqXHR, textStatus){
            console.log('ERROR : fail to delete,' + textStatus);
        });
    });

    $('.btn-modify').on('click', function(){
        var id = $(this).attr('term-id');
        location.href = '/term?action=update&id='+id;
    });

    $('.like').on('click', function(){
        var term_id = $(this).parent().parent().attr('term-id');
        var $_this = $(this);
        var count = $_this.text();
        if($_this.hasClass('voted')){
            $.ajax({
                url : '/term?action=vote&term_id='+term_id+'&vote=0',
                type : 'GET',
            }).done(function(data){
                var result = JSON.parse(data);
                if(result && result.status === 'success'){
                    $_this.removeClass('thumbs-up-b').addClass('thumbs-up').removeClass('voted');
                    $_this.text(Number(count)-1);
                }
            }).fail(function(jqXHR, textStatus){
                console.log('ERROR : fail to vote,' + textStatus);
            });
        }else{
            $.ajax({
                url : '/term?action=vote&term_id='+term_id+'&vote=1',
                type : 'GET',
            }).done(function(data){
                var result = JSON.parse(data);
                if(result && result.status === 'success'){
                    $_this.removeClass('thumbs-up').addClass('thumbs-up-b').addClass('voted');
                    $_this.text(Number(count)+1);
                }
            }).fail(function(jqXHR, textStatus){
                console.log('ERROR : fail to vote,' + textStatus);
            });
        }
    });

    $('.dislike').on('click', function(){
        var term_id = $(this).parent().parent().attr('term-id');
        var $_this = $(this);
        var count = $_this.text();
        if($_this.hasClass('voted')){
            $.ajax({
                url : '/term?action=vote&term_id='+term_id+'&vote=0',
                type : 'GET',
            }).done(function(data){
                var result = JSON.parse(data);
                if(result && result.status === 'success'){
                    $_this.removeClass('thumbs-down-b').addClass('thumbs-down').removeClass('voted');
                    $_this.text(Number(count)-1);
                }
            }).fail(function(jqXHR, textStatus){
                console.log('ERROR : fail to vote,' + textStatus);
            });
        }else{
            $.ajax({
                url : '/term?action=vote&term_id='+term_id+'&vote=-1',
                type : 'GET',
            }).done(function(data){
                var result = JSON.parse(data);
                if(result && result.status === 'success'){
                    $_this.removeClass('thumbs-down').addClass('thumbs-down-b').addClass('voted');
                    $_this.text(Number(count)+1);
                }
            }).fail(function(jqXHR, textStatus){
                console.log('ERROR : fail to vote,' + textStatus);
            });
        }
    });



</script>
