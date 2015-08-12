
<!-- entry_pane -->
<div class="entry_pane">
<?php
$entries = $data['entry'];

foreach($entries as $entry){
    echo '<div class="entry term-', $entry["id"], '">';

    echo '<div class="entry_header">';
    echo '<ul>';
    echo '<li>';
    echo '<span class="date">', $entry["date"], '</span>';
    echo '<span class="btn-delete ui-icon ui-icon-close" term-id="', $entry["id"], '"></span>';
    echo '<span class="btn-modify ui-icon ui-icon-pencil" term-id="', $entry["id"], '"></span>';
    echo '</li>';
    echo '</div>';

    echo '<div class="entry_content">';
    echo '<div class="word">', $entry["word"], '</div>';
    echo '<div class="def">', $entry["def"], '</div>';
    echo '</div>';

    echo '<div class="entry_content_menu">';
    echo '<span class="dislike">', $entry["dislike"], '</span>';
    echo '<span class="like">', $entry["like"], '</span>';
    echo '</div>';

    echo '</div>';
}
?>
</div>
<!-- //entry_pane -->

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

</script>
