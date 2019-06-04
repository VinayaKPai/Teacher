<?php
	echo "The following students are already registered in the database";
	include "basecode-create_connection.php";
	$query = $mysqli->query("SELECT * FROM studentdetails");
	
			if ($query) {
			
				while ($row = $query->fetch_assoc())  {
			
				 	echo $row['Id']." - ".$row['firstName']." - ".$row['lastName']."<br/>";

				 }
			}
			if(!$query) {
				echo "Oh no";
			} 

			
mysqli_close($mysqli);
?>