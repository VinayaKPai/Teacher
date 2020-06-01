<?php
function stuDiv( $result,$pageHeading,$cIdIn,$secIdIn ) {
  // $cId and $scId from the calling function are $ciDIn and $secIdIn here
    $result->fetch_array( MYSQLI_ASSOC );
    if ($result) {
        $rowcount=mysqli_num_rows($result);
        if ($rowcount > 0) {
          $cls = "background-color: Green; text-align: center; ";
        }
        else { $cls = "background-color: Red; text-align: center; ";}
      }
      if ($pageHeading=='Students') {
      echo "<h4 class='topbanner' style='".$cls."'>Currently $rowcount active Classes in your setup</h4>" ;
      }

      //Outermost collapsible for each class/std with clickable heading
      echo "<div style='width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';'>";
        foreach ( $result as $class ) { //$class is now data of a single class - including ALL sections
          $cId = $class['C Id'];
          $cNum = $class['Class / Std'];
          $togCId = "c".$cId;
          // On teachers page, the display is directly by class+section - so we don't need a all-class-sections bucket
          // the display therefore, should not have the data toggle for class
          $secs = json_decode( $class['Sections'], true);
          $studs = json_decode( $class['Students'], true);
          if ($pageHeading=='Students') {
          echo "<h5 style='text-align: center; color: Blue;'>
            <a data-toggle='collapse' href='#".$togCId."'>Class / STD : ".$cNum." has ".$class['Count']." Students</a></h5>";
            echo "<div id='".$togCId."'class='panel panel-default panel-collapse collapse'>";
            echo "<div>";
            secsDivCollapsible( $pageHeading,$secs,$cId,$cIdIn,$secIdIn,$cNum, $studs);
            echo "</div>";
            echo "</div>";
          }
          else {
            if ($cId=$cIdIn) {
            secsDivCollapsible( $pageHeading,$secs,$cId,$cIdIn,$secIdIn,$cNum, $studs);
            }
          }

      }
      echo '</div>';
    }
    //$cId is $class['C Id'] and $cIdIn is the class Id coming from the teachers page
    //difference in teachers page and
    function secsDivCollapsible( $pageHeading,$secs,$cId,$cIdIn,$secIdIn,$cNum, $studs) {//$secs id json decoded $class['Sections'] AND $studs is json decoded for $class['Students']
      foreach ($secs as $cntr => $secArr) {
        $secId = $secArr['SD sectionId'];
        $secName = $secArr['Stu Sec name'];
        $secClsId = "sec".$cId.$secId;
        $secClsIdIn = "sec".$cIdIn.$secIdIn;
              echo "<h6 class='panel-heading' style='text-align: center; color: Blue;'><a  data-toggle='collapse' href='#".$secClsId."'>Students for Class ".$cNum." Section ".$secName."</a></h6>";

              echo "<div id='".$secClsId."' class='panel panel-default panel-collapse collapse'>";
              echo $secClsId."*****".$secClsIdIn;
              echo $pageHeading;
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
          else {
            print_r($studs);

          }
        }
      echo "</ul>";
    }


?>
