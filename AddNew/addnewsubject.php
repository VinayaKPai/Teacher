<?php
	include "../basecode-create_connection.php";

		$classNumber = $_POST["classNumber"];
		$classNumberSafe = $mysqli->real_escape_string($classNumber);

		$sectionAlpha = $_POST["sectionAlpha"];
		$sectionAlphaSafe = $mysqli->real_escape_string($sectionAlpha);

		$subjectName = $_POST["subjectName"];
		$subjectNameSafe = $mysqli->real_escape_string($subjectName);

		$newId = $subjectNameSafe.$classNumberSafe.$sectionAlphaSafe;

		$query = $mysqli->query("SELECT * FROM subjects");

		// prepare and bind

			$stmt = $mysqli->prepare("INSERT INTO subjects (Id, subjectName, classNumber, sectionAlpha) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssss", $newId, $subjectNameSafe, $classNumberSafe, $sectionAlphaSafe);

			//$stmt->execute();
			if (!$stmt->execute()) {
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
