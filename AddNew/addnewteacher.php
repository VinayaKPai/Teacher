<?php
	include "../basecode-create_connection.php";

		$firstName = $_POST["firstName"];
		$firstNameSafe = $mysqli->real_escape_string($firstName);

		$middleName = $_POST["middleName"];
		$middleNameSafe = $mysqli->real_escape_string($middleName);

		$lastName = $_POST["lastName"];
		$lastNameSafe = $mysqli->real_escape_string($lastName);

		$email = $_POST["email"];
		$emailSafe = $mysqli->real_escape_string($email);

		$phoneMobile = $_POST["phoneMobile"];
		$phoneMobileSafe = $mysqli->real_escape_string($phoneMobile);

		$joinYear = $_POST["joinYear"];
		$joinYearSafe = $mysqli->real_escape_string($joinYear);

		$endYear = $_POST["endYear"];
		$endYearSafe = $mysqli->real_escape_string($endYear);

		$systemEmail = $firstNameSafe.$middleNameSafe.$lastNameSafe."@mydomain.com" ;

			$query = $mysqli->query("SELECT * FROM users");

			if ($query) {
				$rowcount=mysqli_num_rows($query);

			}
		// prepare and bind

			$stmt = $mysqli->prepare("INSERT INTO users (firstName, middleName, lastName, Email, systemEmail, phoneNumber, joinYear, 	leftYear, visibility) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

			$stmt->bind_param("sssssssss", $firstNameSafe, $middleNameSafe, $lastNameSafe, $emailSafe, $systemEmail, $phoneMobileSafe, $joinYearSafe, $endYearSafe, 'Y');

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
		$mysqli->close();
	{header('Location: ../SetUpPages/newTeachers.php');}
?>
