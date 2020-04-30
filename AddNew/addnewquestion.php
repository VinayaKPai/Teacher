<?php
	include "../basecode-create_connection.php";
	//TO ADD NEW QUESTIONS TO THE DATABASE
	echo "Added New Question";

			$query = $mysqli->query("SELECT * FROM topics");
			if ($query) {
				echo "<select>";
				while ($row = $query->fetch_assoc())  {
					$optionName = $row['unitName'];
					echo "<option name=$optionName>".$optionName."<option/>";
				}
				echo "</select>";
			}

$mysqli->close();
?>
