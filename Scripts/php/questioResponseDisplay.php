<?php
  function questionBlockDisplay($query,$mysqli) {
    $cnt = 0;
    $href = "href";
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
    echo "<button class='btn btn-primary' type='submit' name='Submit' onsubmit='emptyResponseAlert()'>Submit My Response</button>";
    echo "<button class='btn btn-secondary' type='submit' name='Save' onsubmit='emptyResponseAlert()'>Save My Response</button>";
    echo "</form>";
    echo "<a class='btn btn-default pull-right' href='$href' onclick='cancel()'>Cancel (response will not be saved)</a>";
  }


  function qpDisplay ($eachRow) {
      //TypeName	QId DisplayInstructions	displayInputType displayInputAttributes	MaxLength	Question	Option_1	Option_2	Option_3	Option_4	Option_5	Option_6
    $assessment_title = $eachRow['assessment_title'];
    $qId = $eachRow['qId'];
    $typeName = $eachRow['typeName'];
    $displayInstructions = $eachRow['displayInstructions'];
    $DisplayInputType = $eachRow['displayInputType'];
    $displayInputAttributes = $eachRow['displayInputAttributes'];
    $MaxLength	= $eachRow['maxLength'];
    $MinLength	= $eachRow['minLength'];
    $Question	 = $eachRow['question'];
    $Option_1	= $eachRow['Option_1'];
    $Option_2	= $eachRow['Option_2'];
    $Option_3	= $eachRow['Option_3'];
    $Option_4	= $eachRow['Option_4'];
    $Option_5	= $eachRow['Option_5'];
    $Option_6 = $eachRow['Option_6'];
    echo "<div class='container-flex cards white'>"  ;
    echo "<div class='panel-heading' style='border: 1px solid #fff;'><span style='font-size: 16px;'>". $Question	."</span><span style='float: right; background: #fff; color: Maroon;'>".$displayInstructions."</span></div>";
        echo "<div>Your Answer:</div><div class='row'>
              <div class='blue col-9'>";
                if ($typeName=="MCQ"){
                  if ($Option_1 != "") {
                      echo "<".  $DisplayInputType ." ". $displayInputAttributes ." name=".$qId." value=".$Option_1.">".$Option_1	."</".$DisplayInputType.">";
                  }
                  if ($Option_2 != "") {
                      echo "<".  $DisplayInputType ." ". $displayInputAttributes ."name=".$qId." value=".$Option_2.">".$Option_2	."</".$DisplayInputType.">";
                  }
                  if ($Option_3 != "") {
                      echo "<".  $DisplayInputType ." ". $displayInputAttributes ." name=".$qId." value=".$Option_3.">".$Option_3	."</".$DisplayInputType.">";
                  }
                  if ($Option_4 != "") {
                      echo "<".  $DisplayInputType ." ". $displayInputAttributes ."name=".$qId." value=".$Option_4.">".$Option_4	."</".$DisplayInputType.">";
                  }
                  if ($Option_5 != "") {
                      echo "<".  $DisplayInputType ." ". $displayInputAttributes ."name=".$qId." value=".$Option_5.">".$Option_5	."</".$DisplayInputType.">";
                  }
                  if ($Option_6 != "") {
                      echo "<".  $DisplayInputType ." ". $displayInputAttributes ."name=".$qId." value=".$Option_6.">".$Option_6	."</".$DisplayInputType.">";
                  }
                }
                else {
                  echo "<". $DisplayInputType . " " . $displayInputAttributes ." id=".$qId." onkeyup='len(".$qId.",".$MaxLength.$MinLength.")' name='".$qId."'></".$DisplayInputType.">
              </div>
              <div class='col-3 white'><span id='chars".$qId."' style='float: right; color: white; margin: 5px;'></span>";
                }
      echo "</div></div>";//for question
    echo "</div>";
  }

 ?>
<script>
  function len(e,f,g){//id of the textarea is e
  // var inputId = e;
  // alert (e+8hb  ","+f);
    var spanId = "chars" + e;
    var inputTextArea = document.getElementById(e)/*.innerHTML*/;
    var inputTextStr =  inputTextArea.value;
    // alert (inputText);
    var inputLength = inputTextArea.value.length;
    // alert (inputLength);

    // alert (inputText.id);
    document.getElementById(spanId).innerHTML = "Current length = " + inputLength;
    if (inputLength>f) {
      document.getElementById(spanId).setAttribute("style","float: right; color: red; margin: 5px;");
    }
    else {
      document.getElementById(spanId).setAttribute("style","float: right; color: white; margin: 5px;");
    }

  }
</script>
