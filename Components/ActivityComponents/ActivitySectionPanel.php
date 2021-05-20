<?php
  $depQuery = aqtActivityQuery($type,$status,$secClassId, $secSectionId, $pageHeading, $mysqli);
  $count = mysqli_num_rows($depQuery);
  echo $count." ".$status." ".$pageHeading."<br>";
  for ($i=0;$i<$count;$i++) {
    while ($row=$depQuery->fetch_assoc()){
      $assId = $row['Assessment ID'];
      $depQuestions = aqtActivityQuestions($assId,$mysqli);
      $depTitle = aqtDepTitle($assId,$mysqli);
      $toggleActivityId = $toggleClassSectionId.$assId;
      echo "<a data-toggle='collapse' href='#".$toggleActivityId."'>";
        echo "<div class='green col-sm-6 left-align' style='background: #DDDDDD; padding: 2px;'>".$depTitle['assessment_Title']."</div>
          <div class='red col-sm-6 right-align' style='background: #DDDDDD; padding: 2px;'> Open From: ".$row['Open From']." || Closes On : ".$row['Open Till']."</div>";
      echo "</a>";
      $countQS = mysqli_num_rows($depQuestions);
      echo "<hr>";
      echo "<div id=".$toggleActivityId." class='panel panel-default collapse'>";
        include $_SERVER['DOCUMENT_ROOT']."/Components/ActivityComponents/ActivityDeploymentPanel.php";
      echo "</div>";
      echo "<hr>";
    }
  }
?>
