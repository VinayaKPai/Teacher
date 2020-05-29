<?php
function stuDiv( $result ) {

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
          echo "<h5 style='text-align: center; color: Blue;'>
            <a data-toggle='collapse' href='#".$togCId."'>Class / STD : ".$cNum." has ".$class['Count']." Students</a></h5>";
            echo "<div id='".$togCId."'class='panel panel-default panel-collapse collapse'>";
                  $secs = json_decode( $class['Sections'], true);
                  $studs = json_decode( $class['Students'], true);
                      echo "<div>";
                        secsDivCollapsible( $secs,$cId,$cNum, $studs);
                      echo "</div>";


            echo "</div>";
      }
      echo '</div>';
    }
    function secsDivCollapsible( $secs,$cId,$cNum, $studs) {//$secs id json decoded $class['Sections'] AND $studs is json decoded for $class['Students']
      foreach ($secs as $cntr => $secArr) {
        $secId = $secArr['SD sectionId'];
        $secName = $secArr['Stu Sec name'];
        $secClsId = "sec".$cId.$secId;
            echo "
            <h6 class='panel-heading' style='text-align: center; color: Blue;'><a  data-toggle='collapse' href='#".$secClsId."'>Students for Class ".$cNum." Section ".$secName."</a></h6>";
            echo "<div id='".$secClsId."' class='panel panel-default panel-collapse collapse'>";
              displayStudentsForClassSec($studs,$cId,$cNum,$secId);
            echo "</div>";
      }
    }

    function displayStudentsForClassSec($studs,$cId,$cNum,$secId) {
      echo "<ul>";
        foreach ($studs as $cnt => $studets) {
          if ($studets['Stu C Id']==$cId && $studets['Stu sectionId']==$secId) {
            echo "<li>Id : "
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
          }
        }
      echo "</ul>";
    }
