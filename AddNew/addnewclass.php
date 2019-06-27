<?php include "../basecode-create_connection.php";
session_start();

//Adding a single record
if (isset($_POST["classNumber"]) && !empty($_POST["classNumber"]) && isset($_POST["sectionAlpha"]) && !empty($_POST["sectionAlpha"])) {
	$classNumber = $_POST["classNumber"];
	$classNumberSafe = $mysqli->real_escape_string($classNumber);

	$sectionAlpha = $_POST["sectionAlpha"];
	$sectionAlphaSafe = $mysqli->real_escape_string($sectionAlpha);
		$array = [];
	$query = $mysqli->query("SELECT * FROM classsections");


	// // prepare and bind
	$newId = $classNumberSafe.$sectionAlphaSafe;
	$stmt = $mysqli->prepare("INSERT INTO classsections (Id, classNumber, sectionAlpha) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $newId, $classNumberSafe, $sectionAlphaSafe);

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

//Adding multiple records
// if (isset($_POST["classNumber"]) && !empty($_POST["classNumber"]) && isset($_POST["sectionAlpha"]) && !empty($_POST["sectionAlpha"])) {}

	{header('Location: ../SetUpPages/newClasssections.php');}
?>
