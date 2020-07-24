<div id="top" class="row" style="padding: 1px;">
	<div class="col-sm-4 topbanner left"  style="background: var(--BodGradtop); padding: 5px;">
		<span class="col-sm-3" style="float: left;">
			<a href="/index.php"><i class="glyphicon glyphicon-home" style="color: White;"></i></a>
		</span>
		<span class="col-sm-5" style="float: center;"> Prashnavali </span>
		<span class="col-sm-4" style="float: right;">
    	<img class="svg image-responsive" src="../Images/logo-purple.png" alt="LOGO" width="25%" />
  	</span>
	</div>
	<div class="col-sm-4 topbanner dropdown" style="background: var(--BodGradtop);  padding: 5px; text-align: center;">
		<?php echo $pageHeading; ?>

	</div>
	<div class="col-sm-4 topbanner right"  style="background: var(--BodGradtop);">
		<small class="white"><form action="../../Scripts/php/login.php" method="post">
			<div class="col-sm-8">
				<label for="#username" style="float: left;">User Name</label><input id="username" name="username" style="float: right;"  class="green"/><br>
				<label for="#password" style="float: left;">Password</label><input id="password"  type="password" name="password"style="float: right;" class="green"/>
			</div>
			<div class="col-sm-4" style="padding: 4px 4px;">
				<button class="btn btn-info btn-sm" type="Submit" name="Submit">Login</button>
			</div>
		</form></small>

		<span style="float: right; padding: 0px;">

		</span>

	</div>
</div>
