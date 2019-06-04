<?php
							echo "List of Subjects available in the App";
							$query = $mysqli->query("SELECT * FROM subjects");

									if ($query) {
										while ($row = $query->fetch_assoc())  {
											$row['subjectName']."<br/>";
										}
									}
									if(!$query) {
										echo "Oh no";
									} 
?>