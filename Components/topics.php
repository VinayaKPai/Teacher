<?php include "../basecode-create_connection.php";
	$query = $mysqli->query("SELECT * FROM topics");
			if ($query) {
				echo "<select id='topic' onchange='topicchange(this)'><option name='blank'></option>";
				while ($row = $query->fetch_assoc())  {
					$optionName = $row['unitName'];
					echo "<option name=$optionName id=$optionName>".$optionName."<option/>";
				}
				echo "</select>";
			}
?>