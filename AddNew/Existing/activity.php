<?php
	//Script to display existing assessments in the assessments table
	include "../basecode-create_connection.php";
	$curdate = date("Y-m-d");
	$slno = 0;
	$query = $mysqli->query("SELECT * FROM assessments");
	$rowcount=mysqli_num_rows($query);
	    echo "<h6 class='topbanner'>Currently $rowcount Saved Assessments. <small class='whitebg' style='float: right; color: red;'>Remember that these may not all have been deployed yet</small></h6>" ;

			if ($rowcount > 0) {
				//table tag is in the parent page already
          echo "<tr>
									<th>Title<hr>Class/Std</th>
									<th style='width: 50%;'>Questions</th>
									<th style='width: 30%;'>Action</th>
								</tr>";

					while ($row = $query->fetch_assoc())  {
						// {
              $slno++;
              $sid = $row['assessment_Title'];

              $cn = $row['assessment_questions'];
//get the actual questions from questionbank by exploding the coma separated string into a php array
							$qs = explode(",",$row['assessment_questions']);
							$qss = '';
							for ($r=0;$r<count($qs)-1;$r++) {
								$qss = $qss. "`qId` = ".$qs[$r]." OR ";
							}
							$qss = $qss."`qId` = ".$qs[count($qs)-1];
							$qquery = $mysqli->query("SELECT * FROM questionbank WHERE  $qss");

//check if the assessmentId exists in the deployment table
//if msg is yes, then we will need to get the deployment dates, otherwise not
							$aid = $row['assessment_Id'];
							$requery = $mysqli->query("SELECT * FROM deploymentlog WHERE `dep_assessmentId`= $aid AND `depType` = 'T' ");
							$msg = "";

						  echo "<tr>
											<td>".$sid."<hr></td>
											<td style='text-align: left;'>";
                					echo "<div style='min-height: 300px; overflow: scroll; margin bottom: 0px;'>";
                    			  $qno = 0;
                    				while ($qrow=$qquery->fetch_assoc()) {
															$classId = $qrow['qb_classId'];
                    					$qno = $qno + 1;

                    					echo $qno."     <span>".$qrow['question']."</span>";
                    					echo "<div class='left' style='padding: 2px;'><ol style='list-style-type: lower-alpha;'>";
                    					if ($qrow['Option_1']) {
                    						echo "<li>".$qrow['Option_1']."</li>";
                    					}
                    					if ($qrow['Option_2']) {
                    						echo "<li>".$qrow['Option_2']."</li>";
                    					}
                    					if ($qrow['Option_3']) {
                    						echo "<li>".$qrow['Option_3']."</li>";
                    					}
                    					if ($qrow['Option_4']) {
                    						echo "<li>".$qrow['Option_4']."</li>";
                    					}
                    					if ($qrow['Option_5']) {
                    						echo "<li>".$qrow['Option_5']."</li>";
                    					}
                    					if ($qrow['Option_6']) {
                    						echo "<li>".$qrow['Option_6']."</li>";
                    					}
                    					echo "</ol></div>";
                    				}
														$composite = $classId.$aid;
														$dates = "date".$composite;
														$names = "name".$composite;
                				echo "</div>
                        </td>
												<td>
													<div style='tex-align: center; height: 150px; padding: 10px;'>

													<strong>Deploy to Class ".$classId."</strong>
													<br>
													<label for='section".$composite."'>Section: </label>
													<select id='section".$composite."' name=$names>
															<option value='1'>A</option>
															<option value='2'>B</option>
															<option value='3'>C</option>
															<option value='4'>D</option>
															<option value='5'>E</option>
															<option value='6'>F</option>
													</select>
													<br>
												  <label for='as".$composite."'>Type:</label>
												    <select id='as".$composite."' name=".$names.">
												      <option name='A' value='A'>Assignment</option>
												      <option name='Q' value='Q'>Quiz</option>
												      <option name='T' value='T'>Test</option>
														</select>
														<br>
														<label for='".$dates."'>Select Date to deploy:</label>
														<input type='date' id='".$dates."' name=".$names."><br>
													  <button id=".$aid." onclick='deploy(".$classId.",".$aid.")'>Deploy</button>
													</div>
													<hr>
													<h5>Previously deployed?";
//sending 2 parameters with deploy - assessment Id and classId
													if (mysqli_num_rows($requery)>0) { //$requery querries the deployment log for the presence of assessmentId in the dep_assessmentId column
														//get the deployment dates
														echo " <span class='green'>YES</span> </h5><div>";
														echo "<p>This assessment has been set ".mysqli_num_rows($requery)." times as ".$pageHeadSingular;
														$cnt = 0;
														while ($rerow = $requery->fetch_assoc()) {
															if ($rerow['schEndDate']<$curdate) {
																$cnt = $cnt + 1;
																	echo "<ol style='list-style-type: none'>
																					<li>To Sec ".$rerow['dep_sectionId'].": ".$rerow['schStartDate']." - " .$rerow['schEndDate']." as  ".$pageHeadSingular."</li>";

																	echo "</ol>";
															}
														}
														if ($cnt>0) {
															echo "<p> This ".$pageHeadSingular." has been completed $cnt times.</p>";
														}
														else {
															echo "<p> This ".$pageHeadSingular." is still open.</p>";
														}
													}
													else {echo " <span class='red'>No Deployments yet</span></h5><div>";}
													echo "</div>
												</td>
                    </tr>";
						// }
					}

				}
			else {
          echo "No assessments";
        }
			if(!$query) {
					echo "Looks like your set up has not been started. Please add student details to the database, so that you can get the benefit of all the features of the App";
				}

	mysqli_close($mysqli);
?>
