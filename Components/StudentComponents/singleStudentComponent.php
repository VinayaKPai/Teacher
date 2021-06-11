<?php

$userId = $_SESSION['userId'];
$students = studentsForATeacher($mysqli,$userId,$sessionClassId,$secSectionId);
$count = mysqli_num_rows($students);
  while ($row=$students->fetch_assoc()) {
    echo "<div class='cards white' id='".$row['ST RN']."'>
      <h5>Name: ".$row['St FN']." ".$row['St MN']." ".$row['St LN']."</h5>
      <p>Roll No:".$row['ST RN']."</p>
      <p class='right-align' onclick='alerto(this)'> More....</p>";

    echo "</div>";
    echo "<div id='bkbtn' class='centered'></div>";
  }
?>
