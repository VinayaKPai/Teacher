<?php
include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
  $todoText = $_POST['todoText'];
  echo $todoText;
            $stmt = $mysqli->prepare("INSERT INTO todolist (todoText) VALUES (?)");
          	$stmt->bind_param("s", $todoText);

          	$stmt->execute();

            	{header('Location: ../../index.php');}
?>
