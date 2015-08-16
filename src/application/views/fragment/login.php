
<!-- login
    ======================================= -->
<div class="register border-red">
	<style scoped>
		* {
			margin: 0px;
			padding: 0px;
			text-decoration: none;
			list-style: none;
			overflow: auto;
		}

		.register a {
			display: block;
		}

		.content {

		}

		.content label {
			display: block;
			float: left;
		}

		.title {
			text-align: center;
			padding: 20px;
		}

		.info {
			width: 55%;
			float: left;
			text-align: center;
		}

		.info img {
			vertical-align: bottom;
		}

		.form_pane {
			margin: 30px auto;
			width: 35%;

		}

		.form_pane div {
			padding: 5px;
		}

		.form_pane input {
			width: 95%;
			height: 20px;
			padding: 2px;
		}

		.submit_box {
			margin: 10px auto;
			text-align: center;
		}

		.find_password {
			float: right;
		}

		.register_box {
			text-align: center;
		}
		.footer {
			margin: 10px 0px;
			height: 50px;
		}

		.footer ul {
			margin: 0px auto;
			width: 60%;

		}

		.footer li {
			float: left;
		}

		.footer a {
			margin: 10px;

		}

	</style>

	<!-- content -->
	<div class="content border-black">
		<div class="title border-blue">
			<h2>Login to UB</h2>
		</div>

		<div class="form_pane border-blue">
			<form action="/login" method="post" enctype="multipart/form-data" class="form_login">
				<div class="email_box">
					<label for="email" class="border-gray">Email</label>
					<a href="" class="find_password">find email</a>
					<input type="text" name="email" class="email">
				</div>
				<div class="password_box">
					<label for="password" class="border-gray">Password</label>
					<a href="" class="find_password">find password</a>
					<input type="password" name="password"  class="password">
				</div>
				<div class="submit_box border-gray">
					<input type="submit" value="login" class="btn-login">
				</div>
			</form>
			<div class="register_box border-black">
				<a href="" class="register">create an account</a>
			</div>
		</div>
	</div>
	<!-- //content -->
	<!-- footer -->
	<div class="footer border-blue">
		<ul class="border-black">
			<li class="border-red"><a href="" class="border-gray">about</a></li>
			<li class="border-red"><a href="" class="border-gray">rules</a></li>
			<li class="border-red"><a href="" class="border-gray">terms of service</a></li>
			<li class="border-red"><a href="" class="border-gray">privacy</a></li>
			<li class="border-red"><a href="" class="border-gray">feedback</a></li>
		</ul>
	</div>
	<!-- //footer -->

</div>
<!-- //login
    ======================================= -->


<script>
	(function(window, document){
		$('.btn-login').on('click', function(){
			$('.form_login').submit();
		});
	})(window, document);
</script>



