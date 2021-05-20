<?php
  //component to display the activity header for A?Q?T for a particular teacher
  //Get the classes taught by this teacher from session variable 'c'
  //ONLY unique class values because we do not want to repeat the class
  $sessionCarray = array_values(array_unique($_SESSION['c']));//so that we can create class areas easily
  for ($s=0;$s<count($sessionCarray);$s++) {
    $sessionClassId = $sessionCarray[$s];
    $toggleClassId = $sessionClassId.$status;

    echo "<div class='h5'>";
      echo "<a data-toggle='collapse' href='#".$toggleClassId."'>";
        echo "Class Id ".$sessionClassId;
      echo "</a>";
    echo "</div>";
    echo "<div class='panel panel-default collapse' id='".$toggleClassId."'>";
      // classLevelPanels($sessionClassId, $result, $queryAssQ,$toggleClassId);
      include $_SERVER['DOCUMENT_ROOT']."/Components/ActivityComponents/ActivityClassPanel.php";
    echo "</div>";
  }
 ?>
