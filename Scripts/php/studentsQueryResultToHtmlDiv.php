<?php
  function teacherStudentDiv( $query ) {
    //Used in TeacherViews/myStudents.php
    //takes the session array clsec, which holds the data about the classes taken by this particulat teacher, to create separate sections for each class+section combo using the for loop
    $arr = $_SESSION['clsec'];
    $no = mysqli_num_rows($query);
$result = "";
    for ($i=0;$i<count($arr);$i++){
      $exp = explode('-',$arr[$i]);
      echo "<div class='card cards white'>".$exp[1]." - ".$exp[2]."</div>";
      $togId = $exp[0]."cs".$exp[3];
      echo "<div class='h5 boxshadow' id='$togId'>";
      while ($result = $query->fetch_assoc()){
        if ($result['CId']==$exp[0] && $result['Sec Id']==$exp[3]) {
          createClassBlock($togId,$exp[0],$exp[3],$result);
          print_r($result);
          }
        }
      echo "</div>";
    }
  }

  function createClassBlock($togId,$cId,$sId,$result) {
      displayStudent($result);
      print_r($result);

  }

  function displayStudent($result) {
    echo "<br>HAHAHAHAHAHAH<br>";
  }
?>
