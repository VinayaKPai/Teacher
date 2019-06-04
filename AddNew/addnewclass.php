<?php include "../basecode-create_connection.php";
session_start(); 

$_SESSION["classNumber"] = $_POST["classNumber"]; 
$_SESSION["sectionAlpha"] = $_POST["sectionAlpha"]; 

$_SESSION["addAll"] = $_POST["sendArray"];
print_r($_SESSION) ;

/*
$classNumber = $_POST["classNumber"];
$classNumberSafe = $mysqli->real_escape_string($classNumber);

$sectionAlpha = $_POST["sectionAlpha"];
$sectionAlphaSafe = $mysqli->real_escape_string($sectionAlpha);

	$query = $mysqli->query("SELECT * FROM classsections");

	if ($query) {
		$rowcount=mysqli_num_rows($query);
	}

// prepare and bind

	if (($_SESSION["classNumber"] == "") || ($_SESSION["sectionAlpha"] == "")) {
		
		$message = "Access Violation <br /> Go to <a href = '../../'>Home</a>";
		exit($message);
		}
	}
	else {
		$stmt = $mysqli->prepare("INSERT INTO classsections (classNumber, sectionAlpha) VALUES (?, ?)");
		$stmt->bind_param("ss", $classNumberSafe, $sectionAlphaSafe);
	} 
	$stmt->execute();

	if (!$stmt->execute()) {
		$errno = $stmt->errno;
		$message = "Could not add $classNumberSafe $sectionAlphaSafe - If the error reoccurs, please contact admin with $errno";
	}
	else {
		$message = $classNumberSafe."-".$sectionAlphaSafe." has been added to the database";
	}


$stmt->close();
$mysqli->close();
	//echo "<h4><a href='../../SetUpPages/newClasses.php'>Add More</a></h4>";
	header('Location: ../SetUpPages/newClasses.php');*/
?>

				
			