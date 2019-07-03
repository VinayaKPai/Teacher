<div id="top" class="row" style="padding: 1px;">
	<div class="col-sm-4 topbanner left">
		<span style="float: left;">
			<a href="/index.php"><i class="glyphicon glyphicon-home" style="color: White;"></i></a>
		</span><span style="float: right;">
    <img class="svg" src="../Images/logo-purple.png" alt="LOGO" width="7%">
  Logo</span>
	</div>
	<div class="col-sm-4 topbanner">
		<?php echo $pageHeading; ?>
	</div>
	<div class="col-sm-4 topbanner right">
		<a href="">
			<span style="float: left; color: White;" onclick="loginalert()">Login</span>
			<script>
			function loginalert () {
				alert ('login not enabled yet');}
			</script>
		</a>
		<span style="float: right;">Search</span>
	</div>
</div>
