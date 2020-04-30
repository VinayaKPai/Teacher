<?php
    include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
    $depTest = $_GET['depTest'];  //the id of the deployment
    $depType = $_GET['depType'];
    $dateToDeploy = $_GET['dateToDeploy'];
    $classId = $_GET['classId'];
    $subjectId = $_GET['subjectId'];

    if ($_GET){
    	$stmt = $mysqli->prepare("INSERT INTO `deploymentlog` (`depType`,`dep_IdInActivityTable`, `schStartDate`, `dep_classId`, `dep_subjectId`) VALUES (?,?,?,?,?)");
    	$stmt->bind_param("sisss", $depType, $depTest, $dateToDeploy, $classId, $subjectId );

    	$stmt->execute();
    }
     else {
        trigger_error('U-U!!!! Looks like some fields were empty! :-(');
    }

    	if (!$stmt->execute()) {
    		$errno = $stmt->errno;
    		$message = "Could not add $depTest - If the error reoccurs, please contact admin with $errno";
    	}
    	else {
    		$message = $depTest." has been added to the database";
    	}


    $stmt->close();
    $mysqli->close();
    // echo $depTest." ".$dateToDeploy." from php";
    // {header('Location: ../Activity/administeredTests.php');}
?>