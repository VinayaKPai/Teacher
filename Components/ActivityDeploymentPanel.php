<?php
$i = 0;
  // $depQuestions = aqtActivityQuestions($assId,$mysqli);
  // $toggleActivityId = $toggleClassSectionId.$assId;
  // echo "<a data-toggle='collapse' href='#".$toggleActivityId."'>";
  //   echo "<div class='green col-sm-6 left-align' style='background: #DDDDDD; padding: 2px;'>
  //     Ass Id ".$assId."</div>
  //     <div class='red col-sm-6 right-align' style='background: #DDDDDD; padding: 2px;'> Open From: ".$row['Open From']." || Closes On : ".$row['Open Till']."</div>";
  // echo "</a>";
  // $countQS = mysqli_num_rows($depQuestions);
  // echo "<hr>";
  // echo "<div id=".$toggleActivityId." class='panel panel-default collapse'>";
    while ($rowAssQ=$depQuestions->fetch_assoc()) {
        echo "<p class='h6'>Question <span class='red'>";
        echo $i + 1;
        echo "</span></p><div>";
            displayDepDetails($rowAssQ);
            $i = $i + 1;
        echo "</div>";
    }
    // echo "</div>";
?>
