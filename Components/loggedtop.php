	<div class="col-sm-4 topbanner left"  style="background: var(--BodGradtop); padding: 5px;">
		Prashnavali
		<span class="col-sm-4" style="float: right;">
    	<img class="svg image-responsive" src="../Images/logo-purple.png" alt="LOGO" width="15%" />
  	</span>
	</div>
	<div class="col-sm-8 topbanner" style="background: var(--BodGradtop);  text-align: center;">
		<?php
				echo "Welcome " . $_SESSION['user'];
				if ($pageCode=='S') {echo "Class ".$_SESSION['c']. " Sec ".$_SESSION['d'];}
		?>
		<form style="float: right; padding-bottom: 0px" action="/Scripts/php/logout.php" method="post">
			<button type="submit" value="logout">
				<span class="glyphicon glyphicon-off red" style="margin-bottom: 0px"></span>
			</button>
		</form>
	</div>
