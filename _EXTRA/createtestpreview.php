<?php
include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
include $_SERVER['DOCUMENT_ROOT'].'../Scripts/php/queryBuilder.php';
include $_SERVER['DOCUMENT_ROOT']."../Scripts/php/sqlQueryResultToHtmlTable.php";
// print_r($_GET);
$classId = "";
$subjectId = "";
if ($_GET){
      $classId =  $_GET['classNumber'];
      $subjectId =  $_GET['subjectName'];

      $queryString = $mysqli->query("SELECT classes.classNumber AS 'Class', subjects.subjectName, questiontype.typeName AS 'Type', questionbank.question AS 'Question', questionbank.qId, questionbank.Option_1 AS 'Option 1', questionbank.Option_2 AS 'Option 2', questionbank.Option_3 AS 'Option 3', questionbank.Option_4 AS 'Option 4', questionbank.Option_5 AS 'Option 5', questionbank.Option_6 AS 'Option 6', questiontype.typeName AS 'Type'  FROM questionbank, classes, subjects, questiontype WHERE `classId` = $classId AND `subjectId` = $subjectId AND classes.classId = questionbank.classId AND subjects.subjectId = questionbank.subjectId AND questiontype.qtId = questionbank.typeId");

// $queryString = $mysqli->query("SELECT *  FROM questionbank, classes, subjects, questiontype WHERE `classId` = $classId AND `subjectId` = $subjectId AND classes.classId = questionbank.classId AND subjects.subjectId = questionbank.subjectId AND questiontype.qtId = questionbank.typeId");
      if (mysqli_num_rows($queryString)>0) {
        echo mysqli_num_rows($queryString)." questions available";

      $row=$queryString->fetch_assoc();
      // echo "<hr>
      //   <h5 class='centered'>
      //   <div class='col-sm-4'>Class </div>
      //   <div class='col-sm-4' id='$classId' name='classId'>".$row['Class']."</div>
      //   <div class='col-sm-3' id='$subjectId' name='subjectId'>".$row['subjectName']."</div>
      //   </h5>";
      echo "<hr>
        <h5 class='centered'>
        <div class='col-sm-4'>Class </div>
        <div class='col-sm-4' id='$classId' name='classId'>".$row['Class']."</div>
        <div class='col-sm-3' id='$subjectId' name='subjectId'>".$row['subjectName']."</div>
        </h5>";

      echo "<table>";

      while ($row=$queryString->fetch_assoc()) {
            $id = $row['qId'];
            $typeName = $row['Type'];
        echo "<tr>";
          echo "<td>";
            echo "<input type='checkbox' id = '$id' onchange='addToPreview(this)'/>";
          echo "</td>";
          echo "<td name='$id'>";
            echo $row['Question'];
            if ($row['Option 1']) {
  						echo "<li>A)".$row['Option 1']."</li>";
  					}
  					if ($row['Option 2']) {
  						echo "<li>B)".$row['Option 2']."</li>";
  					}
  					if ($row['Option 3']) {
  						echo "<li>C)".$row['Option 3']."</li>";
  					}
  					if ($row['Option 4']) {
  						echo "<li>D)".$row['Option 4']."</li>";
  					}
  					if ($row['Option 5']) {
  						echo "<li>E)".$row['Option 5']."</li>";
  					}
  					if ($row['Option 6']) {
  						echo "<li>F)".$row['Option 6']."</li>";
  					}
          echo "</td>";
          echo "<td>";
            echo $typeName;
          echo "</td>";
        echo "</tr>";

      }
      echo "</table>";
    }
    else {
      echo "no data for ".$classId ."  ".$subjectId;
    }
}

  // {header('Location: ../SetUpPages/newQuestions.php');}
	//mysqli_close($mysqli);
?>
