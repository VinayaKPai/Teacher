<?php
	include "../basecode-create_connection.php";

		$subjectName = $_POST["subjectName"];
		$classNumber = $_POST["classNumber"];
		$sectionAlpha = $_POST["sectionAlpha"];
		$teacherName = $_POST["teacherName"];
		echo $teacherName. $classNumber. $sectionAlpha. $subjectName;
		// $strippedsubjectName = str_replace(' ', '', $subjectName);
		// $subjectNameSafe = $mysqli->real_escape_string($subjectName);

		// prepare and bind

			$stmt = $mysqli->prepare("INSERT INTO `classes_taught_by_teacher`(`userId`, `classId`, `sectionId`, `subjectId`) VALUES (?,?,?,?)");
			$stmt->bind_param("iiii", $teacherName, $classNumber, $sectionAlpha, $subjectName);

			//Full texts	 cttId userId Ascending 1 classId sectionId subjectId

			if (!$stmt->execute()) {
				if ($stmt->errno) {echo $stmt->errno;}
				// if (($stmt->errno) == '1062') {
				// 	$message = "Could not add the Subject as ".$subjectName." already exists for ".$classNumber.$sectionAlpha." in the database!";
				// 	echo "<script type='text/javascript'>alert('$message');</script>";
				// }
				// else {
				// 	echo "Could not add record. If the error reoccurs, please contact admin";
				// }
			}
			else {
				echo $subjectName . "for ".$classNumber.$sectionAlpha ." added to setup";
			}

		$stmt->close();
		$mysqli->close();
	// {header('Location: ../SetUpPages/newSubjects.php');}
?>
