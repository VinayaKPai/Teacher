<?php
	session_start();
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
	$loggedInUserName = $_SESSION['user'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

		<?php
	    include $_SERVER['DOCUMENT_ROOT']."/Components/header.php";
	  ?>
	<script>
		function commingSoon(t) {
			alert (t.innerText + " coming soon!!")
			t.style.color="white";
		}
	</script>
	<body class="body" style="background: var(--BodyGradient);">
		<div class="container">
			<h3 class="centered" style="background: var(--BodyGradient);">
				<?php include $_SERVER['DOCUMENT_ROOT']."/Components/loggedtop.php"; ?>
			</h3>
			<?php echo $datetime1;
			$classes = explode(",",$_GET['c']);
			echo "<h5>You have ".count($classes)." classes: </h5>";
			echo "<h6 class='container'><ul class='list-group list-group-horizontal'  style='justify-content: space-between;'>";
				foreach ($classes as $key => $value) {
					echo "<li class='list-group-item'>Class - Section: ".$value."</li>";
				}
			echo "</ul></h6>";

			?>

			<div class="container" style="background: var(--BodyGradient);">
				<div class="row" style="flex-wrap: wrap; padding: 5%; justify-content: space-between;">
					<h4 class="btn btn-block topbanner">Activity</h4>
						<div class="card cards col-md-5 col-xs-12">
							<h5>Assessment</h5>
							<?php
							include $_SERVER['DOCUMENT_ROOT']."/Components/activityList.php";
							?>
							<hr style="border-top: 1px solid maroon;">
						</div>
						<div class="card cards col-md-5 col-xs-12">
						<h5>Practice</h5>
						<ul class="left-align" style="list-style-type: none;">
							<li>
								<a href="#" onclick="commingSoon(this)">CBSE Practice</a>
							</li>
						</ul>
					</div>
					<h4 class="btn btn-block topbanner">Reports</h4>
						<div class="card cards col-md-3 col-xs-12">
							<h5>Assignments</h5>
							<ul  class="left-align" style="list-style-type: none;">
								<?php
									include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
								?>
							</ul>
						</div>
						<div class="card cards col-md-3 col-xs-12">
							<h5>Quizzes</h5>
							<div class="left-align" id="quizzes">
								<ul class="left-align" style="list-style-type: none;">
									<?php
										include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
									?>
								</ul>
							</div>
						</div>
						<div class="card cards col-md-3 col-xs-12">
							<h5>Tests</h5>
							<ul  class="left-align" style="list-style-type: none;">
								<?php
									include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
								?>
							</ul>
						</div>
						<div class="card cards col-md-3 col-xs-12">
							<h5>Students</h5>
							<ul  class="left-align" style="list-style-type: none;">
								<?php
									include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
								?>
							</ul>
					</div>
				</div>
					<?php include $_SERVER['DOCUMENT_ROOT']."/Components/todolist.php"; ?>
			</div>
		</div>

  </body>
</html>
