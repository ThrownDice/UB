
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
			background : url(/application/views/img/thumbs-up-icon-hi_s_b.png) no-repeat;
		}

		.entry .dislike{
			background : url(/application/views/img/thumbs-down-icon-hi_s_b.png) no-repeat;
		}

		.del-confirm-dialog{
			display : none;
		}

	</style>

<?php
/**
 * Load data processed in Controller.
 */
	$entries = $data['entry_exact'];

		echo "<div class='entry' term-id='term-{$entry['id']}'>
				<div class='header border-blue'>
					<a href='#' class='rank border-gray'>{$i}</a>
					<a href='#' class='word border-gray'> {$entry['word']} </a>
					<a href='#' class='pronounce border-gray'>prn</a>
					<div class='status border-blue'>
						<i class='hot border-gray'>hot</i>
					</div>
					<div class='top_menu border-gray'>
						<a href='#' class='btn favorite'>fav</a>
						<a href='/editTerm?id={$entry['id']}' class='btn modify'>mod</a>
						<a href='#' class='btn delete' onclick='delTerm({$entry['id']})'>del</a>
					</div>
				</div>
				<div class='content border-blue'>
					<div class='def border-gray'>{$entry['def']}</div>
					<div class='img border-gray'>\$entry['img']\</div>
					<div class='usage border-gray'>\$entry['usage']</div>
					<div class='sub_info'>{$entry['date']} by \$entry['author'] (last edit: \$entry['last_edit'])</div>
				</div>
				<div class='footer border-blue'>
					<div class='vote border-gray'>
						<a href='#' class='like border-gray'><i class='up'><!--up--></i>{$entry['like']}</a>
						<a href='#' class='dislike border-gray'><i class='down'><!--dn--></i>{$entry['dislike']}</a>
					</div>
					<div class='sns border-gray'>
						<a href='#' class='btn twitter'>twt</a>
						<a href='#' class='btn instagram'>ist</a>
						<a href='#' class='btn facebook'>fcb</a>
						<a href='#' class='btn naver'>nvr</a>
					</div>
				</div>
			</div>";


	//modal창을 위한 코드
	echo "<div class='del-confirm-dialog' title='확인'> 단어를 정말 삭제하시겠습니까? </div> "


//?>

</div>
<!-- //entry_pane
    ======================================= -->

<script>

	//임시로 TAG에 바로 onclick 이벤트 핸들링을 했지만 나중에 global namespace 오염문제와
	//html 코드와 javascript 코드 혼재를 줄이기 위해 다시 이벤트 핸들링 코드를 작성할 것

	/**
	 * delTerm
	 * 단어의 id를 받아서 단어를 삭제함
	 * @param {Number} id Term id 값
	 */
	function delTerm(id){
		$( '.del-confirm-dialog' ).dialog({
			resizable: false,
			height: 140,
			modal: true,
			buttons: {
				"삭제": function(){
					var $this = $(this);
					$.ajax({
						url: '/delTerm?id='+id,
						type: 'POST'
					}).done(function(data){
						//서버로부터 반환되는 결과 데이터는 JSON형식이므로 JSON.parse를 통해
						//파싱을 먼저 한다.
						var result = JSON.parse(data);
						if(result && result.status == 'success') {
							$this.dialog( 'close' );
							$('.term-'+id).hide(500);
						}
					}).fail(function(data){
						//실패했을 때
						$this.dialog( 'close' );
					});
				},
				"취소": function(){
					$(this).dialog( 'close' );
				}
			}
		});
	}
</script>
