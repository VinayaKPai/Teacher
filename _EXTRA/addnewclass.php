<?php include "../basecode-create_connection.php";
session_start();
print_r($_POST);
//Adding a single record
if (isset($_POST["classNumber"]) && !empty($_POST["classNumber"]) && isset($_POST["sectionAlpha"]) && !empty($_POST["sectionAlpha"]) && isset($_POST["teacherName"]) && !empty($_POST["teacherName"]) && isset($_POST["subjectName"]) && !empty($_POST["subjectName"])) {

	$teacherName = $_POST["teacherName"];
	$teacherNameSafe = $mysqli->real_escape_string($teacherName);

	$subjectName = $_POST["subjectName"];
	$subjectNameSafe = $mysqli->real_escape_string($subjectName);

	$classNumber = $_POST["classNumber"];
	$classNumberSafe = $mysqli->real_escape_string($classNumber);

	$sectionAlpha = $_POST["sectionAlpha"];
	$sectionAlphaSafe = $mysqli->real_escape_string($sectionAlpha);

	// // prepare and bind
	$stmt = $mysqli->prepare("INSERT INTO `classes_taught_by_teacher`(`userId`, `classId`, `sectionId`, `subjectId`) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("iiii", $teacherNameSafe, $classNumberSafe, $sectionAlphaSafe, $subjectNameSafe);

	//
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
