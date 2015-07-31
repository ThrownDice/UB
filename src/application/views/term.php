<?php  
/**
 * term view file.
 * 
 */

//echo $test['title'];
?>

<div id="wrap">
	<!-- header -->
	<div id="header" >
		<?php require_once APPPATH.'views'.DS.'contents'.DS.'header.php'; ?>
	</div>
	<!-- //header -->
	<!-- container -->
	<div id="container">
		<!-- entry_pane -->
		<div id="entry_pane">
			<?php require_once APPPATH.'views'.DS.'contents'.DS.'entry_pane.php'; ?>
		</div>
		<!-- //entry_pane -->
		<!-- aside -->
		<div id="aside">
			<!-- sgt_term -->
			<div class="sgt_term">
				<?php require_once APPPATH.'views'.DS.'contents'.DS.'sgt_term.php'; ?>
			</div>
			<!-- sgt_term -->
			<!-- ad -->
			<div class="ad_aside">
				<?php require_once APPPATH.'views'.DS.'contents'.DS.'ad_aside.php'; ?>
			</div>
			<!-- //ad -->
			<!-- term_in_context -->
			<div class="term_in_context">
				<?php require_once APPPATH.'views'.DS.'contents'.DS.'term_context.php'; ?>
			</div>
			<!-- //term_in_context -->
		</div>
		<!-- //aside -->
		
	</div>
	<!-- //container -->
</div>