
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
	$indices = isset($data['index_pane']) ? $data['index_pane'] : null;

	if($indices){
		foreach($indices as $index) {
			//todo : class 에 왜 index id를 썻지? (여러 단어가 존재 할 수 있으므로 id 값은 의미가 없음)
			echo "<li>
				<a href='/term/{$index['word']}' class='term term-{$index['id']} border-gray'>{$index['word']}</a>
			</li>";
		}
	}
?>

	</ul>
</div>
<!-- //index_pane
    ======================================= -->