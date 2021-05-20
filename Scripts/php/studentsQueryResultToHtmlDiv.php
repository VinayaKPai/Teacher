<?php
  function teacherStudentDiv( $query ) {
    //Used in TeacherViews/myStudents.php
    //Take the query result, which will have the class blocks arrayaggs
    //And create collapsible class panels
    //Using foreach for each class block, call the next function
    //This function, takes the data for all sections in the class block
    //And creates section panels
    //Using foreach for each section block, call the next function
    //This function takes the data for each student in the section
    //And creates the div for displaying each student data
    //Using foreach(?) / for(?) display the student data
    $arr = $_SESSION['clsec'];
    print_r($query);
      while ($result = $query->fetch_assoc()) {
        for ($i=0;$i<count($arr);$i++) {
        $cs = explode('-',$arr[$i]);
          if($cs[0]==$result['CId'] && $cs[3]==$result['Sec Id']) {
            $togId = $result['CId'].$result['Sec Id'];
            echo "<a data-toggle='collapse' href='#".$togId."'><h5>STD: ".$cs[1]."-".$cs[2]."</h5></a>";
            // echo gettype($result['CSections']);
            createClassBlock($result['CSections'],$togId);
          }
        }
      }
  }
  function createClassBlock($CSection,$togId) {
    echo "<div id='".$togId."' class='collapse' style='padding: 4px;'>";
    $CSec = json_decode($CSection,true);
    for ($i=0;$i<count($CSec);$i++) {
        createStudentHolderBlock($CSec[$i]);
    }
  echo "</div>";
  }

  function createStudentHolderBlock($s) {
    $stId = "s".$s['User Id'];
    echo "<a data-toggle='collapse' href='#".$stId." '><p style='background-color: #554a5f; font-size: 12px; color: White; padding: 1px;'>";
      echo $s['St FN']." ";
      if ($s['St MN']!="" || $s['St MN']=NULL) {echo $s['St MN']." ";}
      echo $s['St LN'];
    echo "</p></a>";
    // print_r($s);
    echo "<div id='".$stId."' class='collapse'>";
          displayStudentDetails($s);
    echo "</div>";
  }
  function displayStudentDetails($s) {
    echo "<ul>";
    foreach ($s as $k=>$v) {
      if ($k=="User Id" || $k=="ST RN") {
        echo "<li>".$k." => ".$v."</li>";
      }
    }
    echo "</ul><hr>";

  }
?>
