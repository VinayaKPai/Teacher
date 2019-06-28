<div id="top" class="row" style="padding: 1px;">
	<div class="col-sm-4 topbanner left">
		<span style="float: left;">
			<i class="glyphicon glyphicon-home"></i>
		</span><span style="float: right;">
    <img class="svg" src="../Images/logo-purple.png" alt="LOGO" width="20" height="20">
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
<style>
	.topbanner {
		background-color: #9B797B;
		font-size: 18px;
		color: White;
		padding: 10px;
	}
	.left {
		border-right: 1px	solid #2E1114;
	}
	.right {
		border-left: 1px solid #2E1114;
	}
</style>
