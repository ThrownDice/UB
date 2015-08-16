
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
			width: 30%;

		}

		.form_pane div {
			padding: 5px;
		}

		.form_pane input {
			width: 90%;
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
			<h2><?php echo $data['name_controller'];?></h2>
		</div>

		<div>
			fe
		</div>
	</div>
	<!-- //content -->


</div>
<!-- //login
    ======================================= -->


<script>
	$('.photo').on('change', function(){
		var data = $(this).val();
		$('.preview').attr('src', data);
	});
</script>



