	<div class="col-sm-4 topbanner left"  style="background: var(--BodGradtop); padding: 5px;">
		<!-- <span class="col-sm-3" style="float: left;">
			<a href="/index.php"><i class="glyphicon glyphicon-home" style="color: White;"></i></a>
		</span> -->
		Prashnavali
		<span class="col-sm-4" style="float: right;">
    	<img class="svg image-responsive" src="../Images/logo-purple.png" alt="LOGO" width="15%" />
  	</span>
	</div>
	<div class="col-sm-8 topbanner dropdown" style="background: var(--BodGradtop);  padding: 5px; text-align: center;">
		<?php
				echo "Welcome " . $_SESSION['user'];
		?>
		<form style="float: right; padding: 0px;" action="/Scripts/php/logout.php" method="post"><button type="submit" value="logout"><span class="glyphicon glyphicon-off red"></button></form></span>
	</div>
