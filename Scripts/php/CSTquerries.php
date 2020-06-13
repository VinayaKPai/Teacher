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


    			if(!$query) {
    					echo "Looks like your set up has not been started. Please add the classes and sections you are teaching to the database, so that you can get the benefit of all the features of the App";
    				}


    	// //mysqli_close($mysqli);

  }
?>
