<?php
    include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
    $depTest = $_GET['depTest'];
    $depType = $_GET['depType'];
    $dateToDeploy = $_GET['dateToDeploy'];

    if ($_GET){
    	$stmt = $mysqli->prepare("INSERT INTO `deploymentlog` (`depType`,`testId`, `schStartDate`) VALUES (?, ?)");
    	$stmt->bind_param("sss", $depTest, $dateToDeploy );

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
    echo $depTest." ".$dateToDeploy." from php";
?>
