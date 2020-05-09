<?php
    include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
    // echo "GET";
    $classId = $_GET['classId'];
    $subjectId = $_GET['subjectId'];
    $questions = $_GET['saveTest'];
    $inpTitle = $_GET['inpTitle'];
    $newTest = explode(",",$_GET['saveTest']);
    // print_r($newTest);
    // echo "<br>".$classId;
    // echo "<br>".$subjectId;

    $stmt = $mysqli->prepare("INSERT INTO tests (testTitle, teclassId, tesubjectId, tequestions) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $inpTitle, $classId, $subjectId,$questions);

    $stmt->execute();

    $stmt->close();
    $mysqli->close();
?>
