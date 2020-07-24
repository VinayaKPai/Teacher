<?php
	include "../basecode-create_connection.php";
	//TO ADD NEW QUESTIONS TO THE DATABASE
	echo "Added New Question";
print_r($_POST);
		$classNumber = $_POST['classNumber'];

		$subjectName = $_POST['subjectName'];

		$topicName = $_POST['topicName'];

		$typeName = $_POST['typeName'];

		$question = $_POST['qn'];

		$option1 = $_POST['option1'];
		$option2 = $_POST['option2'];
		$option3 = $_POST['option3'];
		$option4 = $_POST['option4'];
		$option5 = $_POST['option5'];
		$option6 = $_POST['option6'];


		$stmt = $mysqli->prepare("INSERT INTO `questionbank`(`classId`, `subjectId`, `topicId`, `typeId`, `question`, `Option_1`, `Option_2`, `Option_3`, `Option_4`, `Option_5`, `Option_6`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
		print_r($stmt);

		$stmt->bind_param("iiiisssssss", $classNumber, $subjectName, $topicName, $typeName, $question, $option1, $option2, $option3, $option4, $option5, $option6);
		$stmt->execute();
		echo ("Errorcode: " . $mysqli -> errno);

$mysqli->close();
?>
