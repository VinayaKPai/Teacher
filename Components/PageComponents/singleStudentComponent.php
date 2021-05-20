<?php
print_r($_SESSION);
  $link = "../../TeacherViews/SingleStudentDetails.php?stId=".$row['User Id']."&f=".$row['St FN']."&l=".$row['St LN'];

  echo "<div class='cards white'><a href=".$link." class='white'>
    <h5>Name: ".$row['St FN']." ".$row['St MN']." ".$row['St LN']."</h5>
    <p>Roll No:".$row['ST RN']."</p>
    <p class='right-align'> More....</p>";

  echo "</a></div>";
?>
