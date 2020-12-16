<?php

  echo "<h5>My to do list</h5>";
  $query = $mysqli->query("SELECT * FROM todolist");
  echo "<ul>";
  while ($row = $query->fetch_assoc()) {
    $todoId = $row['todoId'];
    if ($row['userId']==$_SESSION['userId']) {
      echo "<form action='../../Scripts/php/newToDo.php' method='POST'><li style='padding: 2px;'>"
              .$row['todoText'].
              "<a href='../../RemoveRecords/RemoveToDo.php?recordId=".$todoId."' style='float: right;'><span class='glyphicon glyphicon-trash' style='background-color: Red; color: White;' ></a>
              </span>
          </li></form>";
      }
  }
  echo "</ul>";
?>
