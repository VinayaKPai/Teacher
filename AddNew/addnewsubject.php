<?php
	include "../basecode-create_connection.php";

		$subjectName = $_POST["subjectName"];
		$strippedsubjectName = str_replace(' ', '', $subjectName);
		$subjectNameSafe = $mysqli->real_escape_string($subjectName);


		$query = $mysqli->query("SELECT * FROM classes_taught_by_teacher");

		// prepare and bind

			$stmt = $mysqli->prepare("INSERT INTO classes_taught_by_teacher (`Subject`) VALUES (?)");
			$stmt->bind_param("s", $subjectNameSafe);

			//
			if (!$stmt->execute()) {
				if ($stmt->errno) {echo $stmt->errno;}
				if (($stmt->errno) == '1062') {
					$message = "Could not add the Subject as ".$subjectName." already exists for ".$classNumber.$sectionAlpha." in the database!";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}
				else {
					echo "Could not add record. If the error reoccurs, please contact admin";
				}
			}
			else {
				echo $subjectName . "for ".$classNumber.$sectionAlpha ." added to setup";
			}

		$stmt->close();
		$mysqli->close();
	{header('Location: ../SetUpPages/newSubjects.php');}
?>
