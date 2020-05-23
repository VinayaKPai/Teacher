<?php

// include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
//This is not required. You will instead be included on the page where the display will happen
  include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/CSTQueryResultToHtmlTable.php";


  function classes_sections_teachers($a,$mysqli,$pageHeading) {

    	//Script to display existing classes and sections in the class section table
    	include "../basecode-create_connection.php";

    	echo "<div>";

    	$slno = 0;
      // $num = 0;
    	$query = $mysqli->query("SELECT
                users.userId AS 'Id',
                users.firstName AS 'First Name',
                users.middleName AS 'Middle Name',
                users.lastName AS 'Last Name',
                classes.classNumber AS 'Class',
                sections.Sections AS 'Section',
                subjects.Subject AS 'Subject'
                FROM
                  users, classes_taught_by_teacher, classes, sections, subjects
                WHERE
                  classes.classId = '$a' AND
                  users.userId = classes_taught_by_teacher.userId AND classes.classId = classes_taught_by_teacher.classId AND sections.sectionId = classes_taught_by_teacher.sectionId AND classes_taught_by_teacher.subjectId = subjects.subjectId
                ORDER BY classes.classId ASC, sections.Sections ASC,  subjects.Subject ASC");

table( $a, $query,$pageHeading );

    				// if ($rowcount > 0) {
    				// 	while ($row = $query->fetch_assoc())  {
            //
            //               $rescn = strip_tags($row['classNumber']);
            //               $ressa = $row['Sections'];
            // 						  $slno++;
            //               $cn = $rescn;
            //               $sa = $ressa;
            //               $sb = $row['Subject'];
            //               $tch = $row['firstName'].$row['middleName'].$row['lastName'];
            //
            // 						  $remIdDB = $rescn."-".$ressa;
            //
            //             //  $paras = $cn.",".$sa;
            //               $url = "../../RemoveRecords/RemoveClass.php?cn=".$rescn."&sa=".$ressa;
            // 						  echo "<tr id=trname".$row['userId']." title=".$tch.">
            //                       <td>".$slno."</td>
            //                       <td><a style='color: #fff;' name=".$tch." onclick='filterByTeacher(this.name)'>".$row['firstName']." ".$row['middleName']." ".$row['lastName']."</td>
            //
            //                       <td><a style='color: #fff;' name=".$cn." onclick='filterByClass(this.name)'>".$row['classNumber']."-".$row['Sections']."</a></td>
            //                       <td><a href='#' style='color: #fff;' name=".$sb." onclick='filterBySubjecT(this.name)'>".$sb." </a></td>
            //                       <td title='Delete $cn $sa from Database'>
            //                         <a id=$remIdDB name=$remIdDB  href='$url'><span class='glyphicon glyphicon-trash' style='background-color: Red; color: White; padding: 4px;'></span></a>
            //                       </td>
            //                     </tr>";
            //
    				// 		}
    				// 	}

    			if(!$query) {
    					echo "Looks like your set up has not been started. Please add the classes and sections you are teaching to the database, so that you can get the benefit of all the features of the App";
    				}


    	mysqli_close($mysqli);

  }
?>
