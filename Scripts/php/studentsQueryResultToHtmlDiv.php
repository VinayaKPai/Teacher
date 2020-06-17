<?php
function stuDiv( $result,$pageHeading ) {
  // IF REQ COMING FROM STUDENTS PAGE, THEN $RESULT IS A MYSQLI RESULT AND NEEDS TO A FETCH_***()
  // IF $RESULT IS FROM TEACHERS, IT IS A SINGLE TEACHER DATA

    $result->fetch_array( MYSQLI_ASSOC );
    if ($result) {
      $rowcount=mysqli_num_rows($result);
      if ($rowcount > 0) {
        $cls = "text-align: center; ";
      }
      else { $cls = "background-color: Red; text-align: center; ";}
    }
    echo "<h4 class='th' style='".$cls."'>Currently $rowcount active Classes in your setup</h4>" ;
    //Outermost collapsible for each class/std with clickable heading
    echo "<div class='th_even' style='width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';'>";
    foreach ( $result as $class ) { //$class is now data of a single class - including ALL sections
      $cId = $class['C Id'];
      $cNum = $class['Class / Std'];
      $togCId = "c".$cId;
      $secs = json_decode( $class['Sections'], true);
      // $studs = json_decode( $class['Students'], true);
      // $STUDS AND $SECS ARE NOW ARRAYS
        echo "<a data-toggle='collapse' href='#".$togCId."' style='color: #fff'><h6 class='th_odd' style='text-align: center;'>
        Class / STD : <span class='blue'>".$cNum."</span> has <span class='blue'>".$class['Count']."</span> Students</h6></a>";
        echo "<div id='".$togCId."'class='panel panel-default panel-collapse collapse'>";
        echo "<div>";
          secsDivCollapsible( $pageHeading,$secs,$cId,$cNum, $class['Students']);
        echo "</div>";
        echo "</div>";
    }
  echo '</div>';
}

function secsDivCollapsible( $pageHeading,$secs,$cId,$cNum, $classstuds) {//$secs id json decoded $class['Sections'] AND $studs is json decoded for $class['Students']
  $studs = json_decode( $classstuds, true);
      foreach ($secs as $cntr => $secArr) {
        $secId = $secArr['SD sectionId'];
        $secName = $secArr['Stu Sec name'];
        $secClsId = "sec".$cId.$secId;
              echo "<a  data-toggle='collapse' href='#".$secClsId."'><h6 class='panel-heading' style='text-align: center; color: Blue;'>
                Students for Class ".$cNum." Section ".$secName."
              </h6></a>";

              echo "<div id='".$secClsId."' class='panel panel-default panel-collapse collapse'>";

                displayStudentsForClassSec($studs,$cId,$cNum,$secId,$pageHeading);

              echo "</div>";
      }
    }

function displayStudentsForClassSec($studs,$cId,$cNum,$secId,$pageHeading) {
      // $cId is the classId for the student $cIdIn is the specific class Id coming from the teacher

      echo "<ul style='color: #000;'>";
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
//8888888888888888888888888888888888888888888
//
function stuDiv1 ($mysqli, $pageHeading) {
  print_r(students($mysqli, $pageHeading));
}
function collapsibleClass($key,$value,$classId,$className) {


}
?>
