<?php
    include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
    $depActivity = $_GET['depActivity'];  //the id of the assessment
    $depType = $_GET['depType'];
    $dateToDeploy = $_GET['dateToDeploy'];
    $classId = $_GET['classId'];
    $sectionId = $_GET['sectionId'];

    if ($_GET){
    	$stmt = $mysqli->prepare("INSERT INTO `deploymentlog` (`depType`,`assessmentId`, `schStartDate`, `classId`, `sectionId`) VALUES (?,?,?,?,?)");
    	$stmt->bind_param("sisii", $depType, $depActivity, $dateToDeploy, $classId, $sectionId );

    	
    }
     else {
        trigger_error('U-U!!!! Looks like some fields were empty! :-(');
    }

    	if (!$stmt->execute()) {
    		$errno = $stmt->errno;
    		$message = "Could not add $depActivity - If the error reoccurs, please contact admin with $errno";
    	}
    	else {
    		$message = $depActivity." has been added to the database";
    	}


    $stmt->close();
    $mysqli->close();
    // echo $depTest." ".$dateToDeploy." from php";
    // {header('Location: ../Activity/completedTests.php');}
?>
