<?php
  include "../basecode-create_connection.php";
  $slno = 0;
  $query = $mysqli->query("SELECT * FROM classsections");
while ($row = $query->fetch_assoc())
{
  $slno++;
  $remIdDB = $row['classNumber']."-".$row['sectionAlpha'];
  echo "<tr><td>".$slno."</td> <td>".($row['classNumber'])."</td><td >".($row['sectionAlpha'])."</td><td><button type='submit' id=$remIdDB name=$remIdDB onclick='ajaxPostRemoveClass(this)'><span class='glyphicon glyphicon-trash' style='color: Blue;'></span></button></td></tr>";

}
?>
