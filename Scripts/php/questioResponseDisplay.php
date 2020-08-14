<?php
  function qpDisplay ($eachRow) {
      //TypeName	QId DisplayInstructions	displayInputType displayInputAttributes	MaxLength	Question	Option_1	Option_2	Option_3	Option_4	Option_5	Option_6
    $assessment_title = $eachRow['assessment_title'];
    $qId = $eachRow['qId'];
    $typeName = $eachRow['typeName'];
    $displayInstructions = $eachRow['displayInstructions'];
    $DisplayInputType = $eachRow['displayInputType'];
    $displayInputAttributes = $eachRow['displayInputAttributes'];
    $MaxLength	= $eachRow['maxLength'];
    $Question	 = $eachRow['question'];
    $Option_1	= $eachRow['Option_1'];
    $Option_2	= $eachRow['Option_2'];
    $Option_3	= $eachRow['Option_3'];
    $Option_4	= $eachRow['Option_4'];
    $Option_5	= $eachRow['Option_5'];
    $Option_6 = $eachRow['Option_6'];
    echo "<div class='container cards white'>".$assessment_title  ;
      echo "<div class='panel panel-heading normal'>".$displayInstructions."</div>";//for instruction
      echo "<div class='panel-heading' style='border: 1px solid #fff;'><span style='font-size: 14px;'>". $Question	."</div>";
      echo "<div class='container'>Your Answer:";
      if ($typeName=="MCQ"){
        if ($Option_1 != "") {
            echo "<br><".  $DisplayInputType . $displayInputAttributes ."name=".$qId." value=".$Option_1.">".$Option_1	."</".$DisplayInputType."><br>";
        }
        if ($Option_2 != "") {
            echo "<".  $DisplayInputType . $displayInputAttributes ."name=".$qId." value=".$Option_2.">".$Option_2	."</".$DisplayInputType."><br>";
        }
        if ($Option_3 != "") {
            echo "<".  $DisplayInputType . $displayInputAttributes ." name=".$qId." value=".$Option_3.">".$Option_3	."</".$DisplayInputType."><br>";
        }
        if ($Option_4 != "") {
            echo "<".  $DisplayInputType . $displayInputAttributes ."name=".$qId." value=".$Option_4.">".$Option_4	."</".$DisplayInputType."><br>";
        }
        if ($Option_5 != "") {
            echo "<".  $DisplayInputType . $displayInputAttributes ."name=".$qId." value=".$Option_5.">".$Option_5	."</".$DisplayInputType."><br>";
        }
        if ($Option_6 != "") {
            echo "<".  $DisplayInputType . $displayInputAttributes ."name=".$qId." value=".$Option_6.">".$Option_6	."</".$DisplayInputType.">";
        }
      }
      else {
        echo "<".  $DisplayInputType . $displayInputAttributes ."></".$DisplayInputType.">";
      }
      echo "</div>";//for question
    echo "</div>";
  }

 ?>
