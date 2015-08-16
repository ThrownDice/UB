
<!-- index_pane
    ======================================= -->
<div class="index_pane border-black">
	<style scoped>
		* {
			margin: 0px;
			padding: 0px;
			text-decoration: none;
			list-style: none;
		}

		.index_pane {
			padding: 10px 0;
			border-bottom: 1px solid gray;
		}

		.index_pane ul {
			background: white;
		}

		.title {
			padding: 5px 2px;
		}

		.term {
			display: block;
			padding: 5px 2px;
		}
	</style>

	<ul>
		<div class="title border-gray">Index</div>

<?php
	/**
	 * Load data processed in Controller.
	 */
	//$indices = $data['index_pane'];

	## Testing
	$indices = isset($data['entry_pane']) ? $data['entry_pane'] : null;

	if($indices){
		foreach($indices as $index) {
			echo "<li>
				<a href='' class='term term-{$index['id']} border-gray'>{$index['word']}</a>
			</li>";
		}
	}
?>

	</ul>
</div>
<!-- //index_pane
    ======================================= -->