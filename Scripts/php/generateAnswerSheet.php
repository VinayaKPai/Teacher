<html>
<script>
function cancel() {
  alert ("Your responses will not be saved");
}
</script>

<?php
session_start();
  include $_SERVER['DOCUMENT_ROOT']."/Components/header.php";
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
  include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/questioResponseDisplay.php";
  echo "<div class='container'>";
  include $_SERVER['DOCUMENT_ROOT']."/Components/starttime.php";
  echo "</div>";
  $sub = $_GET['sub'];
  $href = "../../StudentViews/explore.php?sub=".$sub;
  $depId = $_POST['submit'];
  $query = $mysqli->query("SELECT
        deplog.depId,
        deplog.schStartDate,
        deplog.schEndDate,
        a.subjectId,
        a.assessment_title,
        sub.subjectName,
        qb.qId,
        qt.typeName,
        qt.displayInstructions,
        qt.displayInputType,
        qt.displayInputAttributes,
        qt.maxLength,
        qb.question,
        qb.Option_1,
        qb.Option_2,
        qb.Option_3,
        qb.Option_4,
        qb.Option_5,
        qb.Option_6
    FROM questionbank AS qb
    INNER JOIN assessment_questions as aq ON aq.question_id = qb.qId
    INNER JOIN assessments as a ON a.assessment_Id = aq.assessment_Id
    INNER JOIN deploymentlog as deplog ON deplog.assessmentId = a.assessment_Id
    INNER JOIN questiontype as qt ON qt.qtId = qb.typeId
    INNER JOIN subjects as sub ON sub.subjectId = a.subjectId
    WHERE deplog.depId = '$depId' ");
  $cnt = 0;
  $row = $query->fetch_assoc();
  echo "<div class='topbanner' >Class ";
  echo $_SESSION['c'] . " Section " . $_SESSION['d'];
  echo "<span style='float: right;'>Open: ".$row['schStartDate']." To: ".$row['schEndDate']."</span>";
  echo "<span style='float: right;' class='col-sm-4'>Subject: ".$row['subjectName']."</span></div>";
  echo "<h4>".$_GET['aname']."</h4>";
  echo "<form action='../../Scripts/php/saveResponse.php' method='post'>";
    while ($row = $query->fetch_assoc()) {
      $cnt = $cnt + 1;
      echo "<div class='topbanner'>Question ".$cnt."</div>";
      qpDisplay($row);
    }
  echo "<button class='btn btn-primary' type='submit' onsubmit='emptyResponseAlert()'>Submit My Response</button>";
  echo "</form>";
  echo "<a class='btn btn-default pull-right' href='$href' onclick='cancel()'>Cancel (response will not be saved)</a>";

 ?>
</html>
