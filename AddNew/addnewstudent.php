<?php
	include "../basecode-create_connection.php";
	print_r($_POST);

		$firstName = $_POST["firstName"];
		$firstNameSafe = $mysqli->real_escape_string($firstName);

		$lastName = $_POST["lastName"];
		$lastNameSafe = $mysqli->real_escape_string($lastName);

		$classNumber = $_POST["classNumber"];
		$classNumberSafe = $mysqli->real_escape_string($classNumber);

		$sectionAlpha = $_POST["sectionAlpha"];
		$sectionAlphaSafe = $mysqli->real_escape_string($sectionAlpha);

		$email = $_POST["email"];
		$emailSafe = $mysqli->real_escape_string($email);

		$phoneMobile = $_POST["phoneMobile"];
		$phoneMobileSafe = $mysqli->real_escape_string($phoneMobile);

		$joinYear = $_POST["joinYear"];
		$joinYearSafe = $mysqli->real_escape_string($joinYear);

		$endYear = $_POST["endYear"];
		$endYearSafe = $mysqli->real_escape_string($endYear);

		$systemEmail = $firstNameSafe.$lastNameSafe."@mydomain.com" ;

		$newId = $classNumberSafe.$lastName.$phoneMobileSafe;
		$query = $mysqli->query("SELECT * FROM studentdetails");

			if ($query) {
				$rowcount=mysqli_num_rows($query);
				//echo "Currently ".$rowcount." students<br />";
			}
		// prepare and bind

			$stmt = $mysqli->prepare("INSERT INTO studentdetails (Id, firstName, lastName, joinYear, endYear, email, systemEmail, phoneMobile) VALUES (?,?, ?, ?, ?, ?, ?,?)");
			$stmt->bind_param("ssssssss", $newId, $firstNameSafe, $lastNameSafe, $joinYearSafe, $endYearSafe, $emailSafe, $systemEmail, $phoneMobileSafe);

			//$stmt->execute();
			if (!$stmt->execute()) {
				if (($stmt->errno) == '1062') {
					$message = "Could not add the Class-Section as ".$firstNameSafe." ".$lastNameSafe." and ".$email." and ".$phoneMobile." already exists in the database!";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}
				else {
					echo "Could not add record. If the error reoccurs, please contact admin";
				}
			}
			else {
				echo $firstNameSafe . $lastNameSafe . "added to setup";
			}

		$stmt->close();
		$mysqli->close();
	{header('Location: ../SetUpPages/newStudents.php');}
?>
