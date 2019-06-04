<?php
	include "../basecode-create_connection.php";
	//TO ADD NEW QUESTIONS TO THE DATABASE
	//CURRENTLY NO CODE TO SAVE, ONLY GETTING TOPIC NAME
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
			
		//echo "</form></div>";
/*SAMPLE FOR ADDING MULTIPLE RECORDS IN ONE GO
$sql = "INSERT INTO mytable (first_name, last_name, age)  
           VALUES('raj', 'sharma', '15'), 
    ('kapil', 'verma', '42'), 
    ('monty', 'singh', '29'), 
    ('arjun', 'patel', '32') "; 
    if ($mysqli->query($sql) == = true) 
{ 
    echo "Records inserted successfully."; 
} 
else
{ 
    echo "ERROR: Could not able to execute $sql. "
        .$mysqli->error; 
} 
  
$mysqli->close(); 
*/		
?>