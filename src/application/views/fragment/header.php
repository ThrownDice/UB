
<!-- gnb
    ======================================= -->
<div class="gnb">
    <style scoped>

	    .gnb {
		    width : 100%;
		    height : 60px;
		    -moz-box-shadow: 0px 9px 11px #DBDBDB;
		    -webkit-box-shadow: 0px 9px 11px #DBDBDB;
		    box-shadow: 0px 9px 11px #DBDBDB;
		    line-height : 60px;
		    background : white;
	    }

	    .logo {
		    display: inline;
		    color : #2D79B2;
		    font-size : 30pt;
		    margin : 0px 30px 0px 30px;
	    }

	    #header li{
		    list-style: none;
		    float : left;
	    }

	    ul{
		    padding : 100px;
		    margin : 0px;
	    }

	    #header .search_bar li{
		    line-height : 60px;
	    }

	    #header .search_bar .search_input{
		    border : 5px solid #2D79B2;
		    width : 400px;
		    height : 30px;
	    }

	    #header .search_bar{
		    float : left;
	    }

	    #header .btn{
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

	    #header .btn:hover{
		    background : #74C3FF;
	    }

    </style>

	<?php
        if(isset($_SESSION["member"])) $member = $_SESSION["member"];
        else $member = null;
    ?>

    <div class="logo showBorder" onclick="location.href='/'"> UB </div>
    <ul class="search_bar">
        <li><input type="text" class="search_input"> </li>
        <li><div class="btn">검색</div> </li>
        <li><div class="btn add-term"> 단어 추가 </div></li>
    </ul>
    <ul>
        <li>
            <?php
            if($member){
                echo '<div class="btn logout"> 로그아웃 </div> ';
            }else{
                echo '<div class="btn login">  로그인 </div> ';
            }
            ?>
        </li>
        <li>
            <div class="btn sign-up"> 회원가입 </div>
        </li>
    </ul>
    <ul class="member_info">
	    <?php
	    if($member){
		    echo "<li>", $_SESSION["member"]["nickname"], " 환영한다.", "</li>";
	    }
	    ?>
    </ul>
</div>
<!-- gnb
    ======================================= -->


<script>
	(function(window, document){
		//Event Handling
		$('.sign-up').on('click', function(){
			location.href = '/member?action=create';
		});
		$('.login').on('click', function(){
			location.href = '/login';
		});
		$('.logout').on('click', function(){
			location.href = '/logout';
		});
		$('.add-term').on('click', function(){
			location.href="term?do=add"
		});
	})(window, document);

</script>
