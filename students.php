<?php
	include "basecode-create_connection.php";
	$query = $mysqli->query("SELECT * FROM studentdetails");
	
			if ($query) {
			while ($row = $query->fetch_assoc())  {
			
			  echo $row['rollNumber']." - ".$row['firstName']." - ".$row['lastName']."<br/>";

			  }
			}
			if(!$query) {
				echo "Oh no";
			}

			
mysqli_close($mysqli);
?>