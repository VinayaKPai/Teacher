<?php
  //$sessionClassId is available from the mother Components
  //This $sessionClassId is the class Id picked up from the sessions variable 'c'
  // echo $sessionClassId;
    for ($cs=0;$cs<count($_SESSION['clsec']);$cs++) {
      $sec = explode("-",$_SESSION['clsec'][$cs]);
      $sectionId = $sec[3];
      echo "<div>";
        if ($sec[0]==$sessionClassId){//$sec[0] is class id from eg 1-I-B-2
          $secClassId = $sec[0];
          $secClassName = $sec[1];
          $secSectionId = $sec[3];
          $toggleClassSectionId = $toggleClassId.$sec[3];
          echo "<a data-toggle='collapse' href='#".$toggleClassSectionId."'>";
          echo "<h6 class='card cards white'>Section: ".$sec[2]."</h6>";
          // echo $toggleClassSectionId;
          echo "</a>";
          echo "<div class='panel panel-default collapse' id='".$toggleClassSectionId."'>";
            // echo "<br>".$toggleClassSectionId;
            include $_SERVER['DOCUMENT_ROOT']."/Components/StudentComponents/StudentDisplaySectionPanel.php";
          echo "</div>";

        }
      echo "</div>";
    }

?>
