<?php include "../basecode-create_connection.php";
session_start();
print_r($_POST);
//Adding a single record
if (isset($_POST["classNumber"]) && !empty($_POST["classNumber"]) && isset($_POST["sectionAlpha"]) && !empty($_POST["sectionAlpha"])) {
	$classNumber = $_POST["classNumber"];
	$classNumberSafe = $mysqli->real_escape_string($classNumber);

	$sectionAlpha = $_POST["sectionAlpha"];
	$sectionAlphaSafe = $mysqli->real_escape_string($sectionAlpha);

	$query = $mysqli->query("SELECT * FROM classes_taught_by_teachers");


	// // prepare and bind
	$newId = $classNumberSafe.$sectionAlphaSafe;
	$stmt = $mysqli->prepare("INSERT INTO classes_taught_by_teachers (classNumber, sectionAlpha) VALUES (?, ?)");
	$stmt->bind_param("ss", $classNumberSafe, $sectionAlphaSafe);

	$stmt->execute();
}
 else {
    trigger_error('U-U!!!! Looks like some fields were empty! :-(');
}

	if (!$stmt->execute()) {
		$errno = $stmt->errno;
		$message = "Could not add $classNumberSafe $sectionAlphaSafe - If the error reoccurs, please contact admin with $errno";
	}
	else {
		$message = $classNumberSafe."-".$sectionAlphaSafe." has been added to the database";
	}


$stmt->close();
$mysqli->close();


	{header('Location: ../SetUpPages/newclasses_taught_by_teachers.php');}
?>
