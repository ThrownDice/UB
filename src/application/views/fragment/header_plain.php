
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
		    margin: 0px 70px 0px 0px;
		    list-style: none;
			float: right;
		    height: 60px;
		    border:1px solid red;
			line-height: 10px;


	    }

	    li a {
			display: block;
		    margin: 0px;
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
			margin-left: 0px;
		}



    </style>

	<?php
        if(isset($_SESSION["member"])) $member = $_SESSION["member"];
        else $member = null;
    ?>

    <a class="logo btn border-black">UB</a>
	<ul class="border-black">
		<li><a href="#" class="btn account">acc</a></li>
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
