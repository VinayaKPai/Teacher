<style>
table tr:nth-child(even){background-color: #C5B2B3; color: #000}
table tr:nth-child(odd){background-color: #b69092; color: #000}
table th {background-color: #684654; color: #fff}
table td, th {text-align: center;}
table {width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';}
p {background-color: #684654; color: #fff}
</style>


<?php
include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
include $_SERVER['DOCUMENT_ROOT'].'../Scripts/php/queryBuilder.php';
include $_SERVER['DOCUMENT_ROOT']."../Scripts/php/sqlQueryResultToHtmlTable.php";
include $_SERVER['DOCUMENT_ROOT']."../Scripts/php/basequery_testpreview.php";
include $_SERVER['DOCUMENT_ROOT']."../Datafiles/subjects-php-array.php";
// $subjectsRow and $subjectsOutput can be accessed from subjects-php-array.php
include $_SERVER['DOCUMENT_ROOT']."../Datafiles/classes-php-array.php";
// $classesRow and $classesOutput can be accessed from class-php-array.php
// print_r($_GET);
if ($_GET){
      $classId =  $_GET['classNumber'];
      $subjectId =  $_GET['subjectName'];


      $classQuery = $mysqli->query("SELECT * FROM `classes` WHERE `id` = $classId");
      $classRow = $classQuery->fetch_assoc();
      $class =  $classRow['classNumber'];


      $subjectQuery = $mysqli->query("SELECT * FROM `subjects` WHERE `id` = $subjectId");
      $subjectRow = $subjectQuery->fetch_assoc();
      $subject = $subjectRow['Subject'];


      $typeQuery = $mysqli->query("SELECT * FROM `questiontype`");
      $typeRow = $typeQuery->fetch_assoc();

      $queryString = $mysqli->query("SELECT `Id`, `topicId`, `typeId`, `question`, `Option_1`, `Option_2`, `Option_3`, `Option_4`, `Option_5`, `Option_6` FROM `questionbank` WHERE `classId` = $classId AND `subjectId` = $subjectId");


      echo "<hr>
        <h5 class='centered'>
        <div class='col-sm-4'>Class </div>
        <div class='col-sm-4' id='$classId' name='classId'>".$class."</div>
        <div class='col-sm-3' id='$subjectId' name='subjectId'>".$subject."</div>
        </h5>";


      echo "<table>";

      while ($row=$queryString->fetch_assoc()) {
            $id = $row['Id'];
            $typeName = '';
            for ($i=0;$i<mysqli_num_rows($typeQuery);$i++) {
              if ($typeRow['Id']==$row['typeId']) {
                $typeName = $typeRow['typeName'];
              }
        }
        echo "<tr>";
          echo "<td>";
            echo "<input type='checkbox' id = '$id' onchange='addToPreview(this)'/>";
          echo "</td>";
          echo "<td name='$id'>";
            echo $row['question'];
            if ($row['Option_1']) {
  						echo "<li>A)".$row['Option_1']."</li>";
  					}
  					if ($row['Option_2']) {
  						echo "<li>B)".$row['Option_2']."</li>";
  					}
  					if ($row['Option_3']) {
  						echo "<li>C)".$row['Option_3']."</li>";
  					}
  					if ($row['Option_4']) {
  						echo "<li>D)".$row['Option_4']."</li>";
  					}
  					if ($row['Option_5']) {
  						echo "<li>E)".$row['Option_5']."</li>";
  					}
  					if ($row['Option_6']) {
  						echo "<li>F)".$row['Option_6']."</li>";
  					}
          echo "</td>";
          echo "<td>";
            echo $typeName;
          echo "</td>";
        echo "</tr>";

      }
      echo "</table>";
}

  // {header('Location: ../SetUpPages/newQuestions.php');}
	mysqli_close($mysqli);
?>
