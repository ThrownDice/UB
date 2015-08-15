
<!-- register
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
			margin: 30px 0px;
			width: 43%;
			float: right;
		}

		.form_pane div {
			padding: 5px;
		}
		.form_pane input {
			height: 20px;
			padding: 2px;
		}

		.submit_box {

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

	<div class="content border-black">
		<div class="title border-blue">
			Register to UB
		</div>

		<div class="info border-blue">
			<img src="http://placehold.it/400x400" alt="no-name">
			information of site
		</div>

		<div class="form_pane border-blue">
			<form action="/member?action=create" method="post" enctype="multipart/form-data">
				<div class="email_box">
					<label for="email" class="border-gray">Email</label>
					<input type="text" name="email" class="email">
				</div>
				<div class="password_box">
					<label for="password" class="border-gray">Password</label>
					<input type="password" name="password"  class="password">
				</div>
				<div class="password_confirm_box">
					<label for="password_confirm" class="border-gray">Password Confirm</label>
					<input type="password" name="password_confirm" class="password_confirm">
				</div>
				<div class="name_box">
					<label for="name" class="border-gray">name</label>
					<input type="text" name="name" class="name">
				</div>
					<div class="submit_box">
					<input type="submit" value="register">
				</div>

			</form>
		</div>
	</div>
	<div class="footer border-blue">
		<ul class="border-black">
			<li class="border-red"><a href="" class="border-gray">about</a></li>
			<li class="border-red"><a href="" class="border-gray">rules</a></li>
			<li class="border-red"><a href="" class="border-gray">terms of service</a></li>
			<li class="border-red"><a href="" class="border-gray">privacy</a></li>
			<li class="border-red"><a href="" class="border-gray">feedback</a></li>
		</ul>

	</div>




</div>
<!-- //register
    ======================================= -->


<script>
	$('.photo').on('change', function(){
		var data = $(this).val();
		$('.preview').attr('src', data);
	});
</script>

<!--				<div class="dv_photo">-->
<!--					Photo <br>-->
<!--					<input type="file" class="photo" name="photo">-->
<!--					<div class="dv_preview"> <img class="preview"> </div>-->
<!--				</div>-->