<?php
    include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
    include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/queryBuilder.php";
    // code to insert a new assignment into the db
    $arrayGET = $_GET['qarray'];
//MODIFY BELOW CODE FOR INSERTING ASSIGNMENT INTO THE DB

    $inpTitle = $_GET['inpTitle'];

    $stmt = $mysqli->prepare("INSERT INTO assessments (assessment_Title, assessment_questions) VALUES (?, ?)");


    $stmt->bind_param("ss", $inpTitle,  $arrayGET);

    $stmt->execute();

    $stmt->close();
    $mysqli->close();
?>
