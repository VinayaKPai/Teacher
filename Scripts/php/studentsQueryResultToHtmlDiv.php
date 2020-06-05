<?php
function stuDiv( $result,$pageHeading ) {
  // IF REQ COMING FROM STUDENTS PAGE, THEN $RESULT IS A MYSQLI RESULT AND NEEDS TO A FETCH_***()
  // IF $RESULT IS FROM TEACHERS, IT IS AN ARRAY
  // $studs = [];
  if ($pageHeading=='Students') {
    $result->fetch_array( MYSQLI_ASSOC );
    if ($result) {
      $rowcount=mysqli_num_rows($result);
      if ($rowcount > 0) {
        $cls = "background-color: Green; text-align: center; ";
      }
      else { $cls = "background-color: Red; text-align: center; ";}
    }
    echo "<h4 class='topbanner' style='".$cls."'>Currently $rowcount active Classes in your setup</h4>" ;
    //Outermost collapsible for each class/std with clickable heading
    echo "<div style='width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';'>";
    foreach ( $result as $class ) { //$class is now data of a single class - including ALL sections
      $cId = $class['C Id'];
      $cNum = $class['Class / Std'];
      $togCId = "c".$cId;
      $secs = json_decode( $class['Sections'], true);
      // $studs = json_decode( $class['Students'], true);
      // $STUDS AND $SECS ARE NOW ARRAYS
      if ($pageHeading=='Students') {
        echo "<h5 style='text-align: center; color: Blue;'>
        <a data-toggle='collapse' href='#".$togCId."'>Class / STD : ".$cNum." has ".$class['Count']." Students</a></h5>";
        echo "<div id='".$togCId."'class='panel panel-default panel-collapse collapse'>";
        echo "<div>";
        secsDivCollapsible( $pageHeading,$secs,$cId,$cNum, $class['Students']);
        echo "</div>";
        echo "</div>";

      }
    }
  }
  else {//IE IF $PAGEHEADING IS TEACHERS
    //CURRENTLY $RESULT FROM TEACHERS PAGE IS A SINGLE TEACHER'S DATA, WHICH HAS CSSections, from where we need to pick up the 'CSSections'
    //T Id, T First Name, T Middle Name, T Last Name, T External Email, T Internal Email, T Mobile, Current, CSSubjects, CSSections
    // $secs = json_decode( $teacherData['CSSections'], true);
      foreach ($result as $teacherkey => $teacherData) {

          // echo $teacherkey . " = " . $teacherData . "<br>";
          if ($teacherkey == 'CSSections') {
            $secs = json_decode($teacherData, true);
            foreach ($secs as $secKey => $secValue) {
              print_r($secValue);
              foreach ($secValue as $itemKey => $itemValue ) {
                  $cId = $secValue['SD C Id'];
                  $cNum = $secValue['SD Class Num'];
                  $togCId = "c".$cId;
                  echo $togCId . "<br>";
                  echo "<h5 style='text-align: center; color: Blue;'>
                  <a data-toggle='collapse' href='#".$togCId."'>Class / STD : ".$cId."</a></h5>";
                  echo "<div id='".$togCId."'class='panel panel-default panel-collapse collapse'>";
                  echo "<div>";
                  secsDivCollapsible( $pageHeading,$secs,$cId,$cNum, $class['Students']);
                  echo "</div>";
                  echo "</div>";
              }
            }
          }
      }

  }
  echo '</div>';
}
    //$cId is $class['C Id'] and $cIdIn is the class Id coming from the teachers page
    //difference in teachers page and
function secsDivCollapsible( $pageHeading,$secs,$cId,$cNum, $classstuds) {//$secs id json decoded $class['Sections'] AND $studs is json decoded for $class['Students']
  $studs = json_decode( $classstuds, true);
      echo $pageHeading;
      foreach ($secs as $cntr => $secArr) {
        $secId = $secArr['SD sectionId'];
        $secName = $secArr['Stu Sec name'];
        $secClsId = "sec".$cId.$secId;
              echo "<h6 class='panel-heading' style='text-align: center; color: Blue;'><a  data-toggle='collapse' href='#".$secClsId."'>Students for Class ".$cNum." Section ".$secName."</a></h6>";

              echo "<div id='".$secClsId."' class='panel panel-default panel-collapse collapse'>";

                displayStudentsForClassSec($studs,$cId,$cNum,$secId,$pageHeading);

              echo "</div>";
      }
    }

function displayStudentsForClassSec($studs,$cId,$cNum,$secId,$pageHeading) {
      // $cId is the classId for the student $cIdIn is the specific class Id coming from the teacher

      echo "<ul>";
        foreach ($studs as $cnt => $studets) {
          if ($pageHeading=='Students') {
              if ($studets['Stu C Id']==$cId && $studets['Stu sectionId']==$secId) {
              $dets = "<li>Id : "
                  .$studets['Stu Id']
                  ."<ul><li>"
                  ." Roll number : "
                  .$studets['Stu RN']
                  ."</li><li>Name : "
                  .$studets['S First Name']
                  ." "
                  .$studets['S Middle Name']
                  ." "
                  .$studets['S Last Name']
                  ."</li></ul>"
              ."</li>";
                echo $dets;
              }
          }
          else { // ie page heading is teachers
            //
            echo "last else of student disaplay";
          }
        }
      echo "</ul>";
}


?>
