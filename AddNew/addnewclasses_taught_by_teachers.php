<?php include "../basecode-create_connection.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
print_r($_POST);
//Adding a single record
if (isset($_POST["classNumber"]) && !empty($_POST["classNumber"]) && isset($_POST["sectionAlpha"]) && !empty($_POST["sectionAlpha"]) && isset($_POST["subjectName"]) && !empty($_POST["subjectName"]) && isset($_POST["teacherId"]) && !empty($_POST["teacherId"])) {
	$classNumber = $_POST["classNumber"];
	$classNumberSafe = $mysqli->real_escape_string($classNumber);


	$sectionAlpha = $_POST["sectionAlpha"];
	$sectionAlphaSafe = $mysqli->real_escape_string($sectionAlpha);


	$subjectName = $_POST["subjectName"];
	$subjectNameSafe = $mysqli->real_escape_string($subjectName);


	$teacherId = $_POST["teacherId"];
	$teacherIdSafe = $mysqli->real_escape_string($teacherId);


	$stmt = $mysqli->prepare("INSERT INTO `classes_taught_by_teacher` (`teacherId`, `classId`, `sectionId`, `subjectId`) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("iiii", $teacherIdSafe, $classNumberSafe, $sectionAlphaSafe, $subjectNameSafe);

	
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

	{header('Location: ../SetUpPages/newteachers.php');}
?>
