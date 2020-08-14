<html>


<?php
include $_SERVER['DOCUMENT_ROOT']."/Components/header.php";
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
  // include $_SERVER['DOCUMENT_ROOT']."/Scripts\php\sqlQueryResultToHtmlTable.php";
  include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/questioResponseDisplay.php";

  $depId = $_POST['submit'];
  // $query = $mysqli->query("SELECT qt.qId, qt.typeName, qt.displayInstructions, qt.displayInputType, qt.displayInputAttributes, qt.maxLength, qb.question, qb.Option_1, qb.Option_2, qb.Option_3, qb.Option_4, qb.Option_5, qb.Option_6 FROM questionbank AS qb INNER JOIN questiontype as qt ON qt.qtId = qb.typeId WHERE qb.qId = '30' OR qb.qId = '1' OR qb.qId = '138' OR qb.qId = '24' OR qb.qId = '448' OR qb.qId = '58' OR qb.qId = '65' OR qb.qId = '124' OR qb.qId = '50' OR qb.qId = '277' OR qb.qId = '188' OR qb.qId = '479'");
  //
  $query = $mysqli->query("SELECT deplog.depId, a.assessment_title, qb.qId, qt.typeName, qt.displayInstructions, qt.displayInputType, qt.displayInputAttributes, qt.maxLength, qb.question, qb.Option_1, qb.Option_2, qb.Option_3, qb.Option_4, qb.Option_5, qb.Option_6
    FROM questionbank AS qb INNER JOIN assessment_questions as aq ON aq.question_id = qb.qId INNER JOIN assessments as a ON a.assessment_Id = aq.assessment_Id INNER JOIN deploymentlog as deplog ON deplog.assessmentId = a.assessment_Id INNER JOIN questiontype as qt ON qt.qtId = qb.typeId WHERE deplog.depId = '$depId' ");
  // $rows = $query->fetch_assoc();

  $cnt = 0;
  echo "<form action='../../Scripts/php/saveResponse.php' method='post'>";
    while ($row = $query->fetch_assoc()) {
      $cnt = $cnt + 1;
      echo "<div class='topbanner'>".$row['assessment_title']." Question ".$cnt."</div>";
      qpDisplay($row);
    }
  echo "<button class='btn btn-primary' type='submit'>Submit My Response</button>";
  echo "</form>";

 ?>
</html>
