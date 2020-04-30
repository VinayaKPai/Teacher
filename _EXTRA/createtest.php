<?php
    include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
    include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/queryBuilder.php";
    // code to insert a new assignment into the db
    $arrayGET = $_GET['qarray'];
//MODIFY BELOW CODE FOR INSERTING ASSIGNMENT INTO THE DB
    $classId = $_GET['classId'];
    $subjectName = $_GET['subjectName'];//the data on subjects comes as the name and not the Id
    $inpTitle = $_GET['inpTitle'];
    // $newAssignment = explode(",",$_GET['qarray']);
    $newAssignment = $_GET['qarray'];
    $query = $mysqli->query("SELECT `subjectId` FROM subjects WHERE `Subject` = '$subjectName'");
    $row = $query->fetch_assoc();
    $subjectId = $row['subjectId'];
    $assessmentType = "T";
    $stmt = $mysqli->prepare("INSERT INTO assessments (assessment_Type, assessment_Title, assessment_classId, assessment_subjectId, assessment_questions) VALUES (?, ?, ?, ?, ?)");


    $stmt->bind_param("sssss", $assessmentType, $inpTitle, $classId, $subjectId, $newAssignment);

    $stmt->execute();

    $stmt->close();
    $mysqli->close();
?>
