<?php
	include "../basecode-create_connection.php";
	
		$firstName = $_POST["firstName"];
		$firstNameSafe = $mysqli->real_escape_string($firstName);

		$lastName = $_POST["lastName"];
		$lastNameSafe = $mysqli->real_escape_string($lastName);

		$email = $_POST["email"];
		$emailSafe = $mysqli->real_escape_string($email);

		$phoneMobile = $_POST["phoneMobile"];
		$phoneMobileSafe = $mysqli->real_escape_string($phoneMobile);

	
		echo "UNsafe first Name ".$firstName." and safe first Name ".$firstNameSafe."<br /><br />"; 
		echo "UNsafe last Name ".$lastName." and safe last Name ".$lastNameSafe."<br /><br />";


			$query = $mysqli->query("SELECT * FROM studentdetails");

			if ($query) {
				echo "table found  ";
				$rowcount=mysqli_num_rows($query);
				echo "Currently ".$rowcount." students<br />"; 
			}
		// prepare and bind

			$stmt = $mysqli->prepare("INSERT INTO studentdetails (firstName, lastName, email, phoneMobile) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssss", $firstNameSafe, $lastNameSafe, $email, $phoneMobile);

			//$stmt->execute();
			if (!$stmt->execute()) {
				if (($stmt->errno) == '1062') {
					//echo "Could not add the Class-Section as ".$firstNameSafe." ".$lastNameSafe." and ".$email." and ".$phoneMobile." already exists in the database!";
					$message = "Could not add the Class-Section as ".$firstNameSafe." ".$lastNameSafe." and ".$email." and ".$phoneMobile." already exists in the database!";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}
				else {
					echo "Could not add record. If the error reoccurs, please contact admin";
				}
			}
			else {
				echo "Done";
			}

		$stmt->close();
		$mysqli->close();
			
mysqli_close($mysqli);
?>