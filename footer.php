<?php
	
	require 'vendor/autoload.php';

	use Carbon\Carbon;

?>

</main>
<footer>
	<div class='stripe'>
	<?php 
		//Package here for a clock
		printf("<div class='clock'>Session time: %s</div>", Carbon::now('GMT-4')); 
	?>
	<h4>Website By Tyler Trout</h4>
	</div>
</footer>
</body>
</html>