<?php
    include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
		// $query = $mysqli->query("SELECT classes.classNumber as `Class`, subjects.Subject as `Subject`, questionbank.questions as `Questions`,  FROM tests, classes, subjects, questionbank WHERE classes.Id = tests.classId AND subjects.Id = tests.subjectId");
    $query = $mysqli->query("SELECT * FROM tests ORDER BY `classId` ASC");
		while ($row=$query->fetch_assoc()) {
			$testId = $row['Id'];
			echo "<div class='row'><div class='col-sm-3'>";
					echo "<h5>Title:   <span style='color: Navy;'>".$row['testTilte']."</span></h5>";
			echo "</div>";
			echo "<div class='col-sm-3'>";
							$cquery = $mysqli->query("SELECT * FROM classes");
							while ($crow = $cquery->fetch_assoc()){
								if ($row['classId']==$crow['Id']) {
									echo "<h5>Class/Std:   <span style='color: Navy;'>".$crow['classNumber']."</span></h5>";
								}
							}
			echo "</div>";
			echo "<div class='col-sm-3'>";
			$squery = $mysqli->query("SELECT * FROM subjects");
			while ($srow = $squery->fetch_assoc()){
				if ($row['subjectId']==$srow['Id']) {
					echo "<h5>Subject:   <span style='color: Navy;'>".$srow['Subject']."</span></h5>";
				}
			}
			echo "</div>";
			echo "<div class='col-sm-3'>";
			echo "Start Date <input name=$testId type='date' />";
			echo "<button id=$testId onclick='deploy(this)'>Deploy</button></h5>";
			echo "</div>";
			echo "</div>";
					$qs = explode(",",$row['questions']);
					$qss = '';
					for ($r=0;$r<count($qs)-1;$r++) {
						$qss = $qss. "`Id` = ".$qs[$r]." OR ";
					}
					$qss = $qss."`Id` = ".$qs[count($qs)-1];
					$qquery = $mysqli->query("SELECT `question`,`Option_1`,`Option_2`,`Option_3`,`Option_4`,`Option_5`,`Option_6` FROM questionbank WHERE  $qss");
			echo "<div class='jumbotron'>";
			$qno = 0;
				while ($qrow=$qquery->fetch_assoc()) {
					$qno = $qno + 1;
					echo $qno.")     <span>".$qrow['question']."</span>";
					echo "<div class='container'><ol style='list-style-type: lower-alpha;'>";
					if ($qrow['Option_1']) {
						echo "<li>".$qrow['Option_1']."</li>";
					}
					if ($qrow['Option_2']) {
						echo "<li>".$qrow['Option_2']."</li>";
					}
					if ($qrow['Option_3']) {
						echo "<li>".$qrow['Option_3']."</li>";
					}
					if ($qrow['Option_4']) {
						echo "<li>".$qrow['Option_4']."</li>";
					}
					if ($qrow['Option_5']) {
						echo "<li>".$qrow['Option_5']."</li>";
					}
					if ($qrow['Option_6']) {
						echo "<li>".$qrow['Option_6']."</li>";
					}
					echo "</ol></div>";
				}
				echo "</div>";
				echo "<hr style='border:solid 1px green;'>";
		}
    $mysqli->close();
?>
