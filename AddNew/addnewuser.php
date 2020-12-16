<?php
	include "../basecode-create_connection.php";
//A new user will have entries in two tables - the users table and the studentdetails/classes_taught_by_teacher table.
//First create the user in users tables
//Then query the users table to get the userId
//Then insert into the studentdetails/classes_taught_by_teacher table the remaining details

		$firstName = $_POST["firstName"];
		$firstNameSafe = $mysqli->real_escape_string($firstName);

		$middleName = $_POST["middleName"];
		$lastNameSafe = $mysqli->real_escape_string($middleName);

		$lastName = $_POST["lastName"];
		$lastNameSafe = $mysqli->real_escape_string($lastName);

		$classId = $_POST["classId"];
		$classIdSafe = $mysqli->real_escape_string($classId);

		$sectionId = $_POST["sectionId"];
		$sectionIdSafe = $mysqli->real_escape_string($sectionId);

		$email = $_POST["email"];
		$emailSafe = $mysqli->real_escape_string($email);

		$phoneMobile = $_POST["phoneMobile"];
		$phoneMobileSafe = $mysqli->real_escape_string($phoneMobile);

		$joinYear = $_POST["joinYear"];
		$joinYearSafe = $mysqli->real_escape_string($joinYear);

		$endYear = $_POST["endYear"];
		$endYearSafe = $mysqli->real_escape_string($endYear);

		$systemEmail = $firstNameSafe.$lastNameSafe."@mydomain.com" ;

		$role = "S";

		// prepare and bind

			$stmt = $mysqli->prepare("INSERT INTO users (role, firstName, lastName, joinYear, endYear, email, systemEmail, phoneMobile, pw) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sssssssss", $role, $firstNameSafe, $lastNameSafe, $joinYearSafe, $endYearSafe, $emailSafe, $systemEmail, $phoneMobileSafe, $phoneMobileSafe);

			//
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


			$last = $mysqli->query("SELECT last_insert_id() FROM users");
			$lastId = $last->fetch_assoc();
			$stmts = $mysqli->prepare("INSERT INTO studentdetails (userId, classId, sectionId) VALUES (?,?, ?)");
			$stmts->bind_param("iii", $lastId, $classIdSafe, $sectionIdSafe);

			if (!$stmts->execute()) {
				echo "Cannot add student details. Contact administrator with this message.";
			}
echo $stmts->errno;
		$mysqli->close();
	// {header('Location: ../SetUpPages/newStudents.php');}
?>
