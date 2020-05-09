<?php
  include "../basecode-create_connection.php";
  include $_SERVER['DOCUMENT_ROOT']."/TEST/sqlQueryResultToHtmlTable.php";
  //Undeployed
  $query = $mysqli->query("SELECT * FROM deploymentlog, assessments WHERE deploymentlog.depType = 'Q' AND  deploymentlog.deploySuccess = 0 AND assessments.assessment_Id = deploymentlog.assessmentId");
  //Ongoing
  $query1 = $mysqli->query("SELECT * FROM deploymentlog, assessments WHERE deploymentlog.depType = 'Q' AND deploymentlog.schStartDate < curdate() AND deploymentlog.schEndDate > curdate() AND deploymentlog.deploySuccess = 1 AND assessments.assessment_Id = deploymentlog.assessmentId");
  //Completed
  $query2 = $mysqli->query("SELECT * FROM deploymentalog, assessments WHERE deploymentlog.depType = 'Q' AND deploymentlog.schEndDate < CURDATE() AND deploymentlog.deploySuccess = 1 AND assessments.assessment_Id = deploymentlog.assessmentId");

  // $requery = $mysqli->query("SELECT * FROM deploymentlog WHERE `assessmentId`= $aid ");
// table($queryResult); // this is the function to call for creating a table out of the query result

$a = "A";$b = "B";$c = "C";

  if ($query) {
    print_r ($a);
    $a = table($query);
  }
  else {$a = "Something went wrong";}
  if ($query1) {
    print_r ($b);
    $b = table($query1);
  }
  else {$b = "Something went wrong";}
  if ($query2) {
    print_r ($c);
    $c = table($query2);
  }
  else {$c = "C <br>Something went wrong";}
?>
