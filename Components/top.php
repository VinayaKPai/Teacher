	<div class="col-sm-4 topbanner left"  style="background: var(--BodGradtop); padding: 5px;">
		<span class="col-sm-3" style="float: left;">
			<a href="/index.php"><i class="glyphicon glyphicon-home" style="color: White;"></i></a>
		</span>
		<span class="col-sm-5" style="float: center;"> Prashnavali </span>
		<span class="col-sm-4" style="float: right;">
    	<img class="svg image-responsive" src="../Images/logo-purple.png" alt="LOGO" width="25%" />
  	</span>
	</div>
	<div class="col-sm-8 topbanner dropdown" style="background: var(--BodGradtop);  padding: 5px; text-align: center;">
		<?php
			if ($userType != "" && $loggedInUserName != "") {
				echo "Welcome ".$userType . " " . $loggedInUserName;
			}
			else {
				echo "Happy ".date('l \!');
				}

		?>

	</div>
