
<!-- gnb
    ======================================= -->
<div class="gnb border-black">
    <style scoped>
	    * {
		    margin: 0px;
		    padding: 0px;
		    text-decoration: none;
	    }

	    .gnb {
		    width : 900px;
		    height: 60px;
		    margin: 0px auto;
		    -moz-box-shadow: 0px 9px 11px #DBDBDB;
		    -webkit-box-shadow: 0px 9px 11px #DBDBDB;
		    box-shadow: 0px 9px 11px #DBDBDB;
	    }

	    .logo {
		    height:60px;
		    display: block;
		    float: left;
		    line-height: 60px;
	    }

	    ul {
		    width: 700px;
		    height: 60px;
		    margin: 0;
		    padding: 0px;
		    display: block;
		    float: right;
		    vertical-align: middle;
	    }

	    li{
		    display: block;
		    list-style: none;
			float: left;
		    height: 60px;
		    border:1px solid red;
			line-height: 10px;


	    }

	    li a {
			display: block;
		    margin-top: 0px;
		    vertical-align: middle;
		    height: 40px;
		    line-height: 60px;
		    border: 1px solid black;

	    }

	    .search_bar {
			width: 400px;
		    padding: 0px 5px;
		    line-height: 40px;
		    margin-top: 10px;
			/*background: url(../img/index.jpg) no-repeat;*/
		}

	    .btn {
		    vertical-align: middle;
		    font-size: 1.0em;
		    margin: 10px 5px 0px 5px;
	        padding : 0px;
		    width: 40px;
		    height : 40px;
		    border:1px solid #2D79B2;
		    line-height : 40px;
		    text-align : center;
		    -webkit-border-radius : 5px;
		    -moz-border-radius : 5px;
		    border-radius : 5px;
		    cursor : pointer;
	    }

	    .btn:hover{
		    background : #74C3FF;
	    }

		.account {
			margin-left: 120px;
		}

		.account_box{
			width : 150px;
			height : 150px;
			border:1px solid #2D79B2;
			border-radius : 5px;
			display : none;
			position : absolute;
		}

    </style>

	<?php
        if(isset($_SESSION["member"])) $member = $_SESSION["member"];
        else $member = null;
    ?>

    <a class="logo btn border-black">UB</a>
	<ul class="border-black">
		<li>
			<input type="text" placeholder="검색어를 입력하세요." list="auto-complete" class="search_bar">
			<datalist id="auto-complete">
			</datalist>
		</li>
		<li><a href="#" class="btn add-term">+</a></li>
		<li><a href="#" class="btn search-random">rnd</a></li>
		<li><a href="#" class="btn account">acc</a></li>
	</ul>

	<div class="account_box">
		<?php
		if (!empty( $member )) {
			echo $member["nickname"], '<br>';
			echo '<a href="/logout"> 로그아웃 </a>';
		} else {
			echo '<a href="/login"> 로그인 </a>';
			echo '<a href="/register"> 회원가입 </a>';
		}
		?>
	</div>
</div>
<!-- gnb
    ======================================= -->

<script>
	(function(window, document){
		//Event Handling
		$( '.logo' ).on( 'click' , function() {
			location.href = '/';
		});
		$( '.sign-up' ).on( 'click' , function(){
			location.href = '/member?action=create';
		});
		$( '.login' ).on( 'click' , function(){
			location.href = '/login';
		});
		$( '.logout' ).on( 'click' , function(){
			location.href = '/logout';
		});
		$( '.add-term' ).on( 'click' , function(){
			location.href='/addTerm';
		});
		$( '.account' ).on( 'click' , function(){
			$('.account_box').show().position({
				my : 'right top',
				at : 'right bottom',
				of : '.account'
			});
		});

		$( '.search_bar' ).keydown(function( event ) {
			var keyword = $(this).val();
			if (event.which == 13) {
				//enter key pressed
				location.href = '/term/' + encodeURIComponent( keyword );
			} else {

				//todo : FF와 Opera의 경우에는 한글 keydown, keyup에 대한 이벤트 핸들링 이슈가 있음
				$.ajax({
					url: '/autoCompleteTerm?keyword=' + encodeURIComponent( keyword ),
					type: 'GET'
				}).done(function(data) {
					var result = JSON.parse(data);
					var terms = result.data;
					var len = terms.length;
					var html = '';
					for (var i=0; i<len; i++) {
						html = html + "<option value='" + terms[i].word + "'>";
					}
					$('#auto-complete').html(html);
					//alert(result.keyword);
				}).fail(function(jqXHR, textStatus) {
					console.log('ERROR : fail to auto-complete, ' + textStatus);
				});
			}
		});

	})(window, document);

</script>
