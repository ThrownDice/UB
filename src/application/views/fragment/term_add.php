
<!-- term_add
   ======================================= -->
<div class="term_add border-blue">
	<style scoped>
		.term_add{
			margin: 10px auto;
			width : 90%;
			border-radius : 5px;
			background : white;

		}

		label {
			display: block;
		}

		form div {
			margin: 10px; 0;
		}

		.def, .usage {
			width: 400px;
			height: 100px;
		}

		.fm-add-term input, textarea{
			width : 90%;
			border : 2px solid #2D79B2;
			border-radius : 5px;
			color : black;
			box-shadow: 5px 5px 5px #DBDBDB;
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
//	$term = 0;
//	if(isset($data['term_add']))
//		$term = $data['term_add'];

//	if($term != 0) {
//		echo '<form action="/updateTerm" method="post" class="border-black">';
//	} else {
//		echo '<form action="/addTerm" method="post" class="border-black">';
//	}
	$term = isset($data['toEdit']) ? $data['toEdit'] : null;
?>

	<div class="title">
		<h2 class="">
			<?php
				if (!empty($term))
					echo "단어 수정";
				else
					echo "단어 추가";
			?>
		</h2>
		<p class="subtitle"> UB의 모든 단어들은 사용자들과 함게 만들어갑니다. 당신의 손으로 단어를 추가해보세요.
	</div>

	<form action="<?php echo isset($term) ? "/editTerm" : "/addTerm" ?>" method="post" class="border-black">
		<input type="hidden" name="id" value="<?php echo isset($term['id']) ? $term['id'] : null ?>">
        <div class="word_box">
	        <label for="word" class="border-gray test">단어<i>*</i></label>
	        <p class="word_description">단어란..</p>
            <input type="text" name="word" class="word" value="<?php echo isset($term['word']) ? $term['word'] : null ?>">
	        <div class="word_recommend">word recommend</div>
        </div>
        <div class="lemma_box">
	        <label for="lemma" class="border-gray">Lemma</label>
	        <p class="lemma_description">Lemma란..<a href="" class="lemma_show_more">더 보기</a></p>
            <input type="text" name="lemma" class="lemma" value="<?php echo isset($term['lemma']) ? $term['lemma'] : null ?>">
        </div>
		<div class="pos_box">
			<label for="" class="border-gray">품사</label>
			<p class="word_description">품사란..<a href="" class="pos_show_more">더 보기</a></p>
			<input type="text" name="lemma"  class="pos" value="<?php echo isset($term['lemma']) ? $term['lemma'] : null ?>">
		</div>
		<div class="def_box">
			<label for="" class="border-gray">의미<i>*</i></label>
			<p class="word_description">여기는 의미를 이렇게 써주세요.</p>
			<input type="text" name="def" class="def" value="<?php echo isset($term['def']) ? $term['def'] : null ?>">
		</div>
        <div class="usage_box">
	        <label for="" class="border-gray">용례</label>
	        <p class="word_description">용례가 있으면 좋습니다.</p>
	        <input type="text" name="usage" class="usage" > <?php echo isset($term['usage']) ? $term['usage'] : null ?> </input>
        </div>

		<div class="submit_box">
			<input type="submit" value="<?php echo $term!=null ? "수정" : "추가"?>" class="submit">
			<input type="submit" value="다시 쓰기" class="submit">
		</div>
    </form>

</div>
<!-- term_edit
   ======================================= -->

<script>
    $('.submit').on('click', function(){
        //todo : validate form data
        //$('.fm-add-term').submit();
    });
</script>
