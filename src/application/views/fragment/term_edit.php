
<!-- term_edit
   ======================================= -->
<div class="term_edit">
	<style scoped>
		.term_edit{
			border : 3px solid #2D79B2;
			border-radius : 5px;
			background : white;
			width : 90%;
		}

		.info{
			width : 90%;
			margin : 10px 0px 20px 0px;
		}
		.info_header{
			width : 80%;
			border-bottom : 2px solid #2D79B2;
			margin-bottom : 5px;
			margin-left : 5px;
			font-size : 15pt;
		}

		.info_subtitle{
			margin-left : 10px;
			font-size : 10pt;
		}

		.fm-add-term div{
			margin : 10px 0px 10px 10px;
			color : #FFAD0B;
			font-weight: bold;
		}

		.fm-add-term input, textarea{
			width : 90%;
			border : 2px solid #2D79B2;
			border-radius : 5px;
			color : black;
			box-shadow: 5px 5px 5px #DBDBDB;
		}

		.fm-add-term textarea{
			height : 100px;
		}

		.fm-add-term .btn{
			height : 40px;
			background : #2D79B2;
			color : white;
			line-height : 40px;
			text-align : center;
			margin : 10px;
			padding : 0px 10px 0px 10px;
			-webkit-border-radius : 5px;
			-moz-border-radius : 5px;
			border-radius : 5px;
			font-size : 11pt;
			cursor : pointer;
		}

		.fm-add-term .btn:hover{
			background : #74C3FF;
		}

	</style>

	<?php
		// Data preload.
		$toEdit = $data['toEdit'];
		$term = isset($toEdit[0]) ? $toEdit[0] : null;
	?>

    <div class="info">
        <div class="info_header"> 단어 추가 </div>
        <div class="info_subtitle"> UB의 모든 단어들은 사용자들과 함게 만들어갑니다. 당신의 손으로 단어를 추가해보세요. </div>
    </div>

    <?php
    if($term) echo '<form action="/term?action=update" method="post" class="fm-add-term">';
    else echo '<form action="/term?action=create" method="post" class="fm-add-term">';
    ?>
        <div class="dv_word">
            *단어 <br>
            <input type="text" class="word" name="word" value="<?php echo isset($term['word']) ? $term['word'] : null ?>">
        </div>
        <div class="dv_lemma">
            기본형 <br>
            <input type="text" class="lemma" name="lemma" value="<?php echo isset($term['lemma']) ? $term['lemma'] : null ?>">
        </div>
        <div class="dv_pos">
            품사 <br>
            <input type="text" class="pos" name="pos" value="<?php echo isset($term['pos']) ? $term['pos'] : null ?>">
        </div>
        <div class="dv_definition">
            *뜻 <br>
            <textarea class="definition" name="def"><?php echo isset($term['def']) ? $term['def'] : null ?></textarea>
        </div>
        <div class="dv_usage">
            용례 <br>
            <textarea class="usage" name="usage"> <?php echo isset($term['usage']) ? $term['usage'] : null ?> </textarea>
        </div>
        <?php
            if($term){
                echo '<div class="btn submit"> 수정하기 </div>';
                echo '<input type="hidden" name="id" value="', $term['id'], '">';
            }else{
                echo '<div class="btn submit"> 추가하기 </div>';
            }
        ?>

    </form>
</div>
<!-- term_edit
   ======================================= -->

<script>
    $('.submit').on('click', function(){
        //todo : validate form data
        $('.fm-add-term').submit();
    });
</script>
