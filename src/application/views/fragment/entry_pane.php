
<!-- entry_pane
    ======================================= -->
<div class="entry_pane border-blue">
	<style scoped>
		* {
			margin: 0px;
			padding: 0px;
			text-decoration: none;
			overflow: hidden;

		}

		.entry_pane {

		}

		.entry {
			margin : 15px auto;
			padding : 10px 0px 10px 0px;
			width : 650px;
			border : 1px solid #2D79B2;
			-webkit-border-radius : 5px;
			-moz-border-radius : 5px;
			border-radius : 5px;
			background : white;

		}

		.entry a {
			display: block;
		}

		.entry > div {
			margin: 5px 5px;
		}
		.entry .header {
			height: 30px;
		}

		.entry .header a,i {
			margin: 5px 10px 0px 0px;
			display: block;
			float: left;
		}

		.entry .header div {
			height: 30px;
		}

		.entry .header .top_menu {
			width: 170px;
			height: 30px;
			float: right;

		}

		.entry .header .status {
			float: left;
		}

		.entry .def {
			overflow: hidden;
			word-wrap: break-word;
			height: 100px;
		}

		.entry .sub_info {
			font-size: 0.7em;

		}

		.entry .usage {
			font-style: italic;
		}

		.entry .footer a {
			float: left;
			margin: 5px 5px 0px 0px;
		}

		.entry .vote {
			width: auto;
			float: left;
		}

		.entry .sns {
			width: 200px;
			float: right;
		}


		.entry .btn {
			padding : 0px;
			width: 40px;
			height : 20px;
			font-size: 1.0em;
			border:1px solid #2D79B2;
			line-height : 20px;
			text-align : center;
			-webkit-border-radius : 5px;
			-moz-border-radius : 5px;
			border-radius : 5px;
			cursor : pointer;
		}

		.btn:hover{
			background : #74C3FF;
		}

		.entry .like{
			background : url(/application/views/img/thumbs-up-icon-blue-hi_s_b.png) no-repeat;
		}

		.entry .dislike{
			background : url(/application/views/img/thumbs-down-icon-blue-hi_s_b.png) no-repeat;
		}


	</style>
<?php
/**
 * Load data processed in Controller.
 */
	$entries = $data['entry_pane'];
	$i = 1;

	foreach($entries as $entry) {
		echo "<div class='entry term-{$entry['id']}'>
				<div class='header border-blue'>
					<a href='#' class='rank border-gray'>{$i}</a>
					<a href='#' class='word border-gray'>\$entry['word']</a>
					<a href='#' class='pronounce border-gray'>prn</a>
					<div class='status border-blue'>
						<i class='hot border-gray'>hot</i>
					</div>
					<div class='top_menu border-gray'>
						<a href='#' class='btn favorite'>fav</a>
						<a href='#' class='btn modify'>mod</a>
						<a href='#' class='btn delete'>del</a>
					</div>
				</div>
				<div class='content border-blue'>
					<div class='def border-gray'>\$entry['def']</div>
					<div class='img border-gray'>\$entry['img']</div>
					<div class='usage border-gray'>\$entry['usage']</div>
					<div class='sub_info'>\$entry['date'] by \$entry['author'] (last edit: \$entry['last_edit'])</div>
				</div>
				<div class='footer border-blue'>
					<div class='vote border-gray'>
						<a href='#' class='like border-gray'><i class='up'>up</i>\$entry['like']</a>
						<a href='#' class='dislike border-gray'><i class='down'>dn</i>\$entry['dislike']</a>
					</div>
					<div class='sns border-gray'>
						<a href='#' class='btn twitter'>twt</a>
						<a href='#' class='btn instagram'>ist</a>
						<a href='#' class='btn facebook'>fcb</a>
						<a href='#' class='btn naver'>nvr</a>
					</div>
				</div>
			</div>";
		$i++;
	}


//foreach($entries as $entry) {
//
//    echo '<div class="entry term-', $entry["id"], '">';
//
//    echo '<div class="entry_header">';
//    echo '<ul>';
//    echo '<li>';
//    echo '<span class="date">', $entry["date"], '</span>';
//    echo '<span class="btn-delete ui-icon ui-icon-close" term-id="', $entry["id"], '"></span>';
//    echo '<span class="btn-modify ui-icon ui-icon-pencil" term-id="', $entry["id"], '"></span>';
//    echo '</li>';
//    echo '</div>';
//
//    echo '<div class="entry_content">';
//    echo '<div class="word">', $entry["word"], '</div>';
//    echo '<div class="def">', $entry["def"], '</div>';
//    echo '</div>';
//
//    echo '<div class="entry_content_menu">';
//    echo '<span class="dislike">', $entry["dislike"], '</span>';
//    echo '<span class="like">', $entry["like"], '</span>';
//    echo '</div>';
//
//    echo '</div>';
//}
//?>

</div>
<!-- //entry_pane
    ======================================= -->

<script>
    $('.btn-delete').on('click', function(){
        //todo : show message box of confirm deletion
	    var id = $(this).attr('term-id');
        $.ajax({
            url : '/term?do=delete&id='+id,
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
        location.href = '/term?do=modify&id='+id;
    });

</script>
